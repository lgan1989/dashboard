<?php


App::uses('AppController', 'Controller');


class AjaxController extends AppController {


	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

	public $uses = array('Category' , 'Achievement' , 'Item');

	public function index() {
        
	   
    }

    public function newcategory(){


        if ($this->RequestHandler->isAjax()){

            $data = array(
                'title' => $this->data['new_value']
            );
            $permalink = $this->Category->newCategory($data);
            $data['permalink'] = $permalink;

            echo json_encode($data);

            $this->autoRender = false;
            exit();
        }
        
    
    }
    public function loadachievement(){

        
        if ($this->RequestHandler->isAjax()){

            $slug = $this->data['slug'];
            $achievement = $this->Achievement->getAchievementBySlug($slug);
            $itemList = $this->Item->getAchievementItemList($achievement['Achievement']['aid']);
            $html = '';
            $i = 0;
            if ($itemList){
                foreach ($itemList as $item){
                    $i = 1 - $i;
                    if ($i == 0)$alter = ' alter';
                    else $alter = '';
                    $html .= '<span class="listitem'.$alter.'" id="i'.$item['Item']['id'].'">'.$item['Item']['title'].'</span>';
                    $description = $item['Item']['description'];
                    if ($description != '')$description = '<span>'.$description.'</span>';
                    $html .= '<div class="itemdetail" id="i'.$item['Item']['id'].'detail">';
                    if ($item['Item']['image'])
                        $html .= '<img src="'.$this->webroot.'img/'.$item['Item']['image'].'" alt="'.$item['Item']['title'].'"/>';
                    $html .= $description.'</div>';
                }
            }
            $ret = array(
                'title' => $achievement['Achievement']['title'],
                'icon' => $achievement['Achievement']['icon'],
                'description' => $achievement['Achievement']['description'],
                'itemList' => $html
            );

            echo json_encode($ret);

            $this->autoRender = false;
            exit();
        }              

        
    }

}
