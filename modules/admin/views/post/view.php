<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

<div class="row">
	<div class="col-sm-8 col-md-9">
		<section>
			<article class="post">
				<header class="post-header">
					<h1><?= $model->title; ?></h1>
				</header>
				<?= $model->content; ?>
			</article>
		</section>
	</div>
	<div class="col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-1">
		<div class="post-info">
			<ul>
				<li>Published: <?= $model->displayCreatedDate() ?></li>
				<li>Updated: <?= $model->displayUpdatedDate() ?></li>
				<li>Number of comments: <?= $model->getCommentCount() ?></li>
				<li>Tags: <?= $model->displayTags() ?></li>
			</ul>
			<?= Html::a('Update', ['update', 'id' => $model->post_id], ['class' => 'btn btn-sm btn-block btn-primary']) ?>
			
			<?= Html::a('Delete', ['delete', 'id' => $model->post_id], [
				'class' => 'btn btn-sm btn-block btn-danger',
				'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
				],
			]) ?>
			
		</div>
	</div>
</div>

</div>
