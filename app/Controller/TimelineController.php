<?php


App::uses('AppController', 'Controller');


class TimelineController extends AppController {


	public $name = 'Timeline';

	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

	public $uses = array('Category');

	public function index() {
        
        $this->set('categories' , $this->Category->find('all' , array( 'order' => array('Category.cid ASC') ) ));

        $permalink = '';
        if (array_key_exists(0 , $this->params['pass'])){
            $permalink = $this->params['pass'][0];
        }
        

        $data = array();
        $data['permalink'] = $permalink;
        $data['title'] = 'Achievement';
        
	  
		$this->set('data' , $data);
	   
    }

}
