<?php

class Category extends AppModel {
    public $name = 'Category';
    public $useTable = 'category';
    public $primaryKey = 'cid';
    public $displayField = 'title';


    function makeSlug($string){

        $pattern = '/[^\w\s]+/';
        $replacement = '';
        $slug = preg_replace($pattern, $replacement, $string);
         
        //change the space with -	
        $not_allowed = array(" "); 
        $slug = strtolower(str_replace($not_allowed, "-", $slug));

        return $slug;
    }
    public function newCategory($data){

        $title = $data['title'];

        $slug = $this->makeUrl($title);

        $condition = array(
            "Category.slug LIKE" => "$slug%"
        );
        $result = $this->find('all' , array('conditions' => $condition));
    
        if (sizeof($result) > 0){
            for ($i = 1 ; ; $i ++){
                if ($i > 1){
                    $slug = $slug . '-' . $i;
                }
                $valid = 1;
                foreach ($result as $item){
                    if ($item['Category']['slug'] == $slug){
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

    public function getAllCategories(){
        return $this->find('all' , array( 'order' => array('Category.cid ASC') ) ); 
    }

    public function getCategoryById($cid = -1){
    
        $result = $this->findByCid($cid);
        return $result;

    }
    public function getCategoryBySlug($slug = ''){
        $slug = addslashes($slug);
        $result = $this->findBySlug($slug);
        return $result;         
    }

}   

?>
