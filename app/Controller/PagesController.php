<?php


App::uses('AppController', 'Controller');

class PagesController extends AppController {


	public $name = 'Pages';


	public $helpers = array('Html', 'Session');


	public $uses = array();

	public function index() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
	  
        $title = 'HOME';
		$this->set('title' , $title);
		$this->render(implode('/', $path));
	}
}
