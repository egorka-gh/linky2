<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\PublicationsSearch */
/* @var $form yii\widgets\ActiveForm */

$catList = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
?>

<div class="publications-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'order')->radioList( 
        [0=>'Recent', 1 => 'Best', 2 => 'Favorites', 3 => 'My links'] ,
        ['itemOptions' => ['labelOptions' => ['class' =>'fb']]]
        ); ?>

    <?php // echo $form->field($model, 'category') ?>
    <?php echo $form->field($model, 'category')
        ->dropDownList(
            $catList,         
            ['prompt'=>'']    // options
        );?>
    <?php // echo $form->field($model, 'user') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'post_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    <div class="form-group"> ttt
         <?php echo ($model->sql); ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
