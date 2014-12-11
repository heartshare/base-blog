<div id="comments">
	<?php foreach ($comments as $comment):?>
		<div class="comment">
			<div class="comment-meta">
				<span class="comment-author"><?= $comment->author ?></span>
				<time class="comment-time"><?= $comment->displayDate() ?></time>
			</div>
			<div class="comment-content">
				<?= $comment->content ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
