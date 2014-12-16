<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Comment;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comment */

$this->title = 'Comment';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?php if ($model->status === Comment::STATUS_PENDING): ?>
			<?= Html::a('Approve', ['approve', 'id' => $model->comment_id], [
				'class' => 'btn btn-sm btn-success',
			]) ?>
		<?php endif; ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->comment_id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'comment_id',
            'post.title:text:Post',
            [
				'attribute' => 'status',
				'value' => Comment::STATUS_PUBLISHED ? 'Published' : 'Pending',
            ],
            'author',
            'email:email',
            'url:url',
            [
				'attribute' => 'create_time',
				'format' => ['date', 'long'],
            ],
            'content:ntext',
        ],
    ]) ?>

</div>
