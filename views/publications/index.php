<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\assets\PubsAsset;

PubsAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\PublicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publications';
$this->params['breadcrumbs'][] = $this->title;

//implement
function getUserLevel(){
    $lvl=0;
    if (!Yii::$app->user->isGuest){
        $lvl = Yii::$app->user->identity->role;
    }
    return $lvl;
}
function getUserId(){
    return  Yii::$app->user->id;
}

?>
<div class="publications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publications', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'cards',
            'id' => 'pub-list',
        ],        
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_item'
    ]) ?>


</div>
