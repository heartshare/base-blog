<?php

use yii\helpers\Html;

?>

<div id="latest-posts" class="widget">
	<h3>Latest Posts</h3>
	<ul>
	<?php foreach ($posts as $post): ?>
		<li>
			<?= Html::a($post->title, ['site/view', 'id' => $post->post_id, 'slug' => $post->slug]) ?>
			<time><?= $post->displayDate() ?></time>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
