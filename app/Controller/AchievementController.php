<?php


App::uses('AppController', 'Controller');


class AchievementController extends AppController {


	public $name = 'Achievement';

	public $helpers = array('Html',  'Session' );

    public $components = array('RequestHandler');

	public $uses = array('Category' , 'Achievement', 'Item');

	public function index() {
        
        $this->set('categories' , $this->Category->getAllCategories());

        $slugCategory = '';
        $slugAchievement = '';
        if (array_key_exists(0 , $this->params['pass'])){
            $slugCategory = $this->params['pass'][0];
        }
        if (array_key_exists(1 , $this->params['pass'])){
            $slugAchievement = $this->params['pass'][1];
        }
        

        $data = array();
        $data['category'] = $slugCategory;
        $data['title'] = 'Ganlu | Achievement';

        $category = $this->Category->getCategoryBySlug($slugCategory);
        $cid = $category['Category']['cid'];

        $offset = 0;
        $achievementList = $this->Achievement->getAchievementList($offset , $cid);

        $currentAchievement = $this->Achievement->getAchievementBySlug($slugAchievement);

        $itemList = $this->Item->getAchievementItemList($currentAchievement['Achievement']['aid']);
        
        $this->set('achievementList' , $achievementList);
        $this->set('currentAchievement' , $currentAchievement);
        $this->set('itemList' , $itemList);
        $this->set('currentCategory' , $category);

		$this->set('data' , $data);
	   
    }


}
