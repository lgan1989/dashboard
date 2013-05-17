<?php

class Item extends AppModel {
    public $name = 'Item';
    public $useTable = 'item';
    public $primaryKey = 'id';


    function makeSlug($string){

        $pattern = '/[^\w\s]+/';
        $replacement = '';
        $slug = preg_replace($pattern, $replacement, $string);
         
        //change the space with -	
        $not_allowed = array(" "); 
        $slug = strtolower(str_replace($not_allowed, "-", $slug));

        return $slug;
    }
 
    public function getAchievementItemList($aid = -1){

        $aid = intval($aid);
        $result = $this->find('all' , array( 'conditions' => array('Item.aid' => $aid) ) ) ;
        return $result;
    
    }
}   

?>
