<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Comment;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'post.title:text:Post',
            'content:ntext',
            [
				'attribute' => 'status',
				'format' => 'html',
				'value' => function ($model, $key, $index, $column) {
				    return $model->status === Comment::STATUS_PUBLISHED ? 'Published' : Html::a('Approve', ['approve', 'id' => $model->comment_id]);
				},
				'filter' => [
					Comment::STATUS_PUBLISHED => 'Published',
					Comment::STATUS_PENDING => 'Pending',
				],
            ],
            'author',
            'email:email',
            'url:url',
            [
				'attribute' => 'create_time',
				'format' => ['date', 'medium'],
				'filter' => false,
            ],
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}{delete}',
			],
        ],
    ]); ?>

</div>
