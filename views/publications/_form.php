<?php

use app\models\Publications;
use app\models\Categories;
use app\widgets\ImgPickerWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Publications */
/* @var $form yii\widgets\ActiveForm */

$catList = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
?>

<div class="publications-form">

    <?php $form = ActiveForm::begin();?>

    <?php //$form->field($model, 'category')->textInput()?>
    <?php echo $form->field($model, 'category')
        ->dropDownList(
            $catList,         
            ['prompt'=>'Select category']    // options
        );?>


    <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'description')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'url')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user')->textInput(['maxlength' => true, 'readonly' => true])?>
    <?=$form->field($model, 'post_date')->textInput(['readonly' => true])?>

    <div class="form-group">
        <?=Html::label('Image', 'image')?>
        <?=ImgPickerWidget::widget([
            'name' => 'Publications[image]',
            'id' => 'image',
            'current' => $model['image'],
            'imgsPath' => '/web/img/covers/',
            'imgClass' => 'square',
            'imgs' => Publications::covers(),
        ])?>
    </div>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </div>

    <?php ActiveForm::end();?>

</div>
