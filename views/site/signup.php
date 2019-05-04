<?php

use app\widgets\ImgPickerWidget;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
/* @var $form ActiveForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-signup">
    <h1><?=Html::encode($this->title)?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']);?>

        <?=$form->field($model, 'id')->textInput(['autofocus' => true])?>
        <?=$form->field($model, 'email')?>
        <?=$form->field($model, 'password')->passwordInput()?>
        <?=$form->field($model, 'password_repeat')->passwordInput()?>
        <?=$form->field($model, 'firstname')?>
        <?=$form->field($model, 'lastname')?>
        <?=$form->field($model, 'info')?>
        <?=Html::label('Avatar','avatar') ?>
        <?=ImgPickerWidget::widget([
            'name' => 'User[avatar]',
            'id' => 'avatar',
            'imgsPath' => '/web/img/user/',
            'imgs' => User::avartas(),
        ])?>
        <?=$form->field($model, 'captcha')->widget(Captcha::className())?>
        <div class="form-group">
        <?=Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
        </div>
    <?php ActiveForm::end();?>
        </div>
    </div>
</div><!-- signup -->
