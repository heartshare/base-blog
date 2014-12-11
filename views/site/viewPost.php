<?php

use app\widgets\LatestPosts;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title . ' - ' . Yii::$app->name;
?>

<div class="row">
	<div class="col-sm-8 col-md-9">
		<section>
			<article class="post">
				<header class="post-header">
					<h1><?= $model->title; ?></h1>
					<div class="post-meta">
						<time class="post-time"><?= $model->displayDate() ?></time>
						<span class="post-tags"><?= $model->displayTags() ?></span>
					</div>
				</header>
				<?= $model->content; ?>
			</article>
			<?php if ($model->commentCount > 0): ?>
				<?php echo $this->render('_commentList', ['comments' => $model->comments]); ?>
			<?php endif; ?>
		</section>
	</div>
	<div class="col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-1">
		<?= LatestPosts::widget() ?>
	</div>
</div>
