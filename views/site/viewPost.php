<?php

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
						<time class="post-time"><?= $model->create_time ?></time>
					</div>
				</header>
				<?= $model->content; ?>
			</article>
	</div>
	<div class="col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-1">
		
	</div>
</div>
