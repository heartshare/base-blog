<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Post;
use app\models\Comment;

/**
 * PostController displays list of posts and an individual post
 */
class PostController extends Controller
{

	/**
     * Lists all Post models.
	 * @return mixed
	 */
    public function actionIndex()
    {
		$query = Post::find()->where(['status' => Post::STATUS_PUBLISHED]);
		
        $dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'defaultPageSize' => 5,
			],
			'sort' => [
				'attributes' => ['create_time'],
				'defaultOrder' => [
					'create_time' => SORT_DESC,
			     ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Post models that are tagged with $name.
     * @return mixed
     */
    public function actionTag($name)
    {
		$query = Post::find()->joinWith('tags')->where('tag.name = :name', [':name' => $name])->andWhere(['status' => Post::STATUS_PUBLISHED]);
		
        $dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'defaultPageSize' => 5,
			],
			'sort' => [
				'attributes' => ['create_time'],
				'defaultOrder' => [
					'create_time' => SORT_DESC,
			     ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
     /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
		$comment = new Comment;
		
		if($comment->load(Yii::$app->request->post()) && $model->addComment($comment)) {
			if($comment->status === Comment::STATUS_PENDING) {
				Yii::$app->session->setFlash('commentPosted', 'Thanks for posting. Comment will be published when it is approved.');
				return $this->refresh('#comment-posted');
			} else {
				Yii::$app->session->setFlash('commentPosted', 'Thanks for posting.');
				return $this->refresh('#comment-posted');
			}
		}
		
        return $this->render('view', [
            'model' => $model,
            'comment' => $comment,
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
			$model->updateCounters(['views' => 1]);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
