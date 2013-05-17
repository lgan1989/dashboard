<?php

class Config extends AppModel {
    public $name = 'Config';
    public $useTable = 'config';
    public $primaryKey = 'cid';


 
    public function getConfig(){

        $result = $this->find('first') ;
        return $result;
    
    }

    public function updateMovie(){

        $this->updateAll(array(
            'movie_last_update' => time()
        ) , array(
            'cid' => 1
        ));
        
    }
    public function updateBook(){

        $this->updateAll(array(
            'book_last_update' => time()
        ) , array(
            'cid' => 1
        ));
        
    }        
}   

?>

