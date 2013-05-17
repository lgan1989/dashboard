<?php


class Verse extends AppModel {
    public $name = 'Verse';
    public $useTable = 'verse';
    public $primaryKey = 'vid';

 
    public function getVerseList(){
    
        $result = $this->find('all' , array('limit' => 10 , 'order' => 'Verse.date DESC'));
        return $result;   
    }       
}   

?>


