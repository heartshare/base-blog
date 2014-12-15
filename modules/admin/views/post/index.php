<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Post;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'slug',
            [
				'attribute' => 'status',
				'value' => function ($model, $key, $index, $column) {
						return $model->status === Post::STATUS_PUBLISHED? 'Published' : 'Archived';
						
					},
				'filter' => [
					Post::STATUS_PUBLISHED => 'Published',
					Post::STATUS_ARCHIVED => 'Archived',
				],
            ],
            'views',
            [
				'attribute' => 'create_time',
				'format' => [
					'date',
					'medium',
				],
				'filter' => false,
            ],
            [
				'attribute' => 'update_time',
				'format' => [
					'date',
					'medium',
				],
				'filter' => false,
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
