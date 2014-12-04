<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
	<div class="col-sm-8 col-md-9">
		<section>
			<?= ListView::widget([
				'dataProvider' => $dataProvider,
				'itemOptions' => [
					'tag' => 'article',
					'class' => 'post-short',
				],
				'itemView' => '_viewPost',
				'layout' => "{items}\n{pager}",
			]) ?>
		</section>
	</div>
	<div class="col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-1">
		
	</div>
</div>
