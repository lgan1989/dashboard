<?php


class Step extends AppModel {
    public $name = 'Step';
    public $useTable = 'step';
    public $primaryKey = 'sid';

 
    public function getStepList(){
    
        $result = $this->find('all' , array('order' => 'Step.startYear DESC'));
        return $result;   
    }      

}   

?>


