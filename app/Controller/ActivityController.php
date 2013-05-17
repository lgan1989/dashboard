<?php


App::uses('AppController', 'Controller');


class ActivityController extends AppController {


	public $name = 'Activity';

	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

    public $uses = array('Category' , 'Config' , 'ActivityCache' , 'Verse');

	public function index() {
        
        $type = '';
        if (array_key_exists(0 , $this->params['pass'])){
            $type = $this->params['pass'][0];
        }

        if ($type == 'track'){
            $trackList = $this->getTrackList();
            $this->set('trackList' , $trackList);
        }
        else if ($type == 'book'){
            $bookList = $this->getBookList();
            $this->set('bookList' , $bookList);
        } 
        else if ($type == 'movie'){
            $movieList = $this->getMovieList();
            $this->set('movieList' , $movieList);
        }
        else{
            $verseList = $this->Verse->getVerseList();
            $this->set('verseList' , $verseList);
        }
        $data = array();          
       
        $data['title'] = 'Ganlu | Activities';
        $data['type'] = $type;

		$this->set('data' , $data);
	   
    }

    public function getTrackList(){
        
        $user = 'g5025578';
        $apikey = 'ef7ec92f54208003015ddf0cfd0438da';
        $url = 'http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user='.$user.'&api_key='.$apikey.'&format=json'; 

        $ch = curl_init();  
        $timeout = 5;  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
        $contents = curl_exec($ch);  
        curl_close($ch);  

        $contents = str_replace('#text' , 'text' , $contents);

        $trackList = array();
        $trackList = json_decode($contents);

        $trackList = $trackList->recenttracks->track;    
        return $trackList;       
    }

    public function getMovieList(){
        $user = 'ganlu.cs';
        $apikey = '0432ec3e433188bb0c98c4bac9949a31';
        $url = 'http://api.douban.com/people/'.$user.'/collection?cat=movie&apikey='.$apikey; 

        $config = $this->Config->getConfig();
        $lastUpdate = $config['Config']['movie_last_update'];
        $currentTime = time();
        if ($currentTime - $lastUpdate > 86400){
            $lastUpdate = $currentTime;
            $contents =  file_get_contents($url);
            $contents = str_replace('db:' , 'db' , $contents);
            $xml = simpleXML_load_string($contents);

            $movieList = array();
            foreach ($xml->entry as $entry){
                $movie = array();
                $movie['type'] = 0;
                $movie['title'] = $entry->dbsubject->title;
                $movie['link'] = $entry->dbsubject->link[1]['href'];
                $movie['cover'] = $entry->dbsubject->link[2]['href'];
                $movie['comment'] = $entry->summary;
                $movie['author'] = $entry->dbsubject->author->name;
                array_push($movieList , $movie);
            }
            $this->Config->updateMovie();
            $this->ActivityCache->updateMovieCache($movieList);
        }
        $movieList = $this->ActivityCache->getMovieList(); 
        return $movieList;        
    
    }

    public function getBookList(){
        
        $user = 'ganlu.cs';
        $apikey = '0432ec3e433188bb0c98c4bac9949a31';
        $url = 'http://api.douban.com/people/'.$user.'/collection?cat=book&apikey='.$apikey; 

        $config = $this->Config->getConfig();
        $lastUpdate = $config['Config']['book_last_update'];
        $currentTime = time();
        if ($currentTime - $lastUpdate > 86400){
            $lastUpdate = $currentTime;
            $contents =  file_get_contents($url);
            $contents = str_replace('db:' , 'db' , $contents);
            $xml = simpleXML_load_string($contents);

            $bookList = array();
            foreach ($xml->entry as $entry){
                $book = array();
                $book['type'] = 1;
                $book['title'] = $entry->dbsubject->title;
                $book['link'] = $entry->dbsubject->link[1]['href'];
                $book['cover'] = $entry->dbsubject->link[2]['href'];
                $book['comment'] = $entry->summary;
                $book['author'] = $entry->dbsubject->author->name;
                array_push($bookList , $book);
            }
            $this->Config->updateBook();
            $this->ActivityCache->updateBookCache($bookList);
        }
        $bookList = $this->ActivityCache->getBookList(); 
        return $bookList;     

    }
}
