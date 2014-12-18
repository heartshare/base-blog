<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Post;
use app\modules\admin\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['validateOnBlur' => false]); ?>

    <div class="row">
		<div class="col-sm-6">
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			 <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>
		</div>
	</div>
   
    <div class="row">
		<div class="col-sm-3">
			 <?= $form->field($model, 'status')->dropDownList([Post::STATUS_PUBLISHED => 'Published', Post::STATUS_ARCHIVED => 'Archived']) ?>
		</div>
    </div>
    
    <div class="row">
		<div class="col-sm-10">
			<?= $form->field($model, 'tags')->checkboxList(Tag::tagList()) ?>
		</div>
	</div>
   
	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>	

    <?= $form->field($model, 'content')->textarea(['rows' => 12]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
