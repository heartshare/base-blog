<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Post;

class PopularPosts extends Widget
{
	public $posts;
	
	public function init()
	{
		$this->posts = Post::find(['title', 'create_time'])
					   ->orderBy(['views' => SORT_DESC])
					   ->limit(5)
					   ->all();
	}
	
	public function run()
	{
		return $this->render('popularPosts', [
			'posts' => $this->posts,
		]);
	}
}
