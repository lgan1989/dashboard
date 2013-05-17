<?php

define ('TYPE_MOVIE' , 0);
define ('TYPE_BOOK' , 1);
class ActivityCache extends AppModel {
    public $name = 'ActivityCache';
    public $useTable = 'activity_cache';
    public $primaryKey = 'aid';


 
    public function updateMovieCache($data){

        $this->deleteAll(array('type' => TYPE_MOVIE));

        $this->saveMany($data);
    
    }
    public function getMovieList(){
    
        $result = $this->find('all' , array( 'conditions' => array('type' => TYPE_MOVIE) ) ) ;
        return $result;   
    }
    public function updateBookCache($data){

        $this->deleteAll(array('type' => TYPE_BOOK));
        $this->saveMany($data);
    
    }
    public function getBookList(){
    
        $result = $this->find('all' , array( 'conditions' => array('type' => TYPE_BOOK) ) ) ;
        return $result;   
    }       
}   

?>

