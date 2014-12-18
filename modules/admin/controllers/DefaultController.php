<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\LoginForm;

class DefaultController extends Controller
{
	public function actions() 
	{
		return [
			'error' => [
				'class' => 'yii\web\errorAction',
			],
		];
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
	 * Logs user into admin panel.
	 */
	public function actionLogin()
    {
		$this->layout = 'login';
		
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('admin/post/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	/**
	 * Logs user out of admin panel.
	 */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->user->returnUrl = ['admin/post/index'];
        return $this->redirect('login');
    }
}
