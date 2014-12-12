<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $comment app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
	<div id="comment-form" class="comment-form col-sm-9">
		<h4>Leave a Comment</h4>
		
		<?php $form = ActiveForm::begin([
			'validateOnBlur' => false,
		]); ?>

		<?= $form->field($comment, 'author')->textInput(['maxlength' => 30, 'placeholder' => 'Your Name']) ?>

		<?= $form->field($comment, 'email')->textInput(['maxlength' => 128, 'placeholder' => 'Your Email']) ?>
		
		<?= $form->field($comment, 'content')->textarea(['rows' => 6, 'placeholder' => 'Your Comment']) ?>

		<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>

		<?php ActiveForm::end(); ?>

	</div>
</div>
