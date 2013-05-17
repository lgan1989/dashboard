<?php


App::uses('AppController', 'Controller');


class StepController extends AppController {


	public $name = 'Step';

	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

	public $uses = array('Step');

	public function index() {
        
        $this->set('steps' , $this->Step->find('all' , array( 'order' => array('Step.startYear ASC') ) ));

        $permalink = '';
        if (array_key_exists(0 , $this->params['pass'])){
            $permalink = $this->params['pass'][0];
        }


        $data = array();
        $data['permalink'] = $permalink;
        $data['title'] = 'Ganlu | Step';
        
	  
		$this->set('data' , $data);
	   
    }

    public function post(){

        $this->layout = '';
        $this->Step->id = $this->request->data['pk'];

        $field = $this->params['pass'][0];
        
        if ($this->Step->id != ''){
            $this->Step->saveField($field , $this->request->data['value']);
        }
    }

}
