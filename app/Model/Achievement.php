<?php

class Achievement extends AppModel {
    public $name = 'Achievement';
    public $useTable = 'achievement';
    public $primaryKey = 'aid';


    function makeSlug($string){

        $pattern = '/[^\w\s]+/';
        $replacement = '';
        $slug = preg_replace($pattern, $replacement, $string);
         
        //change the space with -	
        $not_allowed = array(" "); 
        $slug = strtolower(str_replace($not_allowed, "-", $slug));

        return $slug;
    }
    public function newAchievement($data){

        $title = $data['title'];

        $slug = $this->makeSlug($title);

        $condition = array(
            "Achievement.slug LIKE" => "$slug%"
        );
        $result = $this->find('all' , array('conditions' => $condition));
    
        if (sizeof($result) > 0){
            for ($i = 1 ; ; $i ++){
                if ($i > 1){
                    $slug = $slug . '-' . $i;
                }
                $valid = 1;
                foreach ($result as $item){
                    if ($item['Achievement']['slug'] == $slug){
                        $valid = 0;
                        break;
                    }
                }
                if ($valid == 1)break;
            }
        }
        $data['slug'] = $slug;
        $this->save($data);

        return $slug;
    
    }

    public function getAchievementList($offset = 0 , $cid = 0 , $num = 9){

        $result = $this->find('all' , array(
            'conditions' => array('Achievement.cid' => $cid) , 
            'limit'  => $num,
            'offset' => $offset
        ));                                     

        return $result;
    }

    public function getAchievementBySlug($slug = ''){

        $slug = addslashes($slug);
        $result = $this->findBySlug($slug);
        return $result;  


    }
    public function getAchievementById($cid = -1){

        $result = $this->findByCid($cid);
        return $result;

    }  

}   

?>
