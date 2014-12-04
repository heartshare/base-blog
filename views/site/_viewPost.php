<?php

use yii\helpers\Html;
?>

<header class="post-short-header">
	<h2><?= Html::a($model->title, ['site/view', 'id' => $model->post_id, 'slug' => $model->slug]); ?></h2>
	<div class="post-short-meta">
		<time class="post-short-time"><?= $model->displayDate() ?></time>
		<span class="post-short-tags"><?= $model->displayTags() ?></span>
	</div>
</header>
<?= $model->description; ?>
