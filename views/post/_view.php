<?php

use yii\helpers\Html;
?>

<header class="post-header">
	<h2><?= Html::a($model->title, ['post/view', 'id' => $model->post_id, 'slug' => $model->slug]); ?></h2>
	<div class="post-meta">
		<time class="post-time"><?= $model->displayDate() ?></time> -
		<span class="post-tags"><?= $model->displayTags() ?></span> -
		<span class="post-comments-link"><?= $model->displayCommentsLink() ?></span>
	</div>
</header>
<?= $model->description; ?>
