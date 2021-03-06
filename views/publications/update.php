<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Publications */

$this->title = 'Update Publications: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit "'.$model->name.'"';
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'editmode' => 'true',
    ]) ?>

</div>
