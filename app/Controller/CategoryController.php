<?php


App::uses('AppController', 'Controller');


class CategoryController extends AppController {


	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

	public $uses = array('Category');

	public function index() {
        
	   
    }

    public function newcategory(){

        $data['title'] = 'ahha';
       $this->Category->newCategory($data);     

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
}
