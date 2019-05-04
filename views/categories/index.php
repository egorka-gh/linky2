<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Categories</h1>
<ul>
<?php foreach ($categories as $category): ?>
    <li>
        <?= Html::encode("{$category->name}") ?>:
        <?= $category->name ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>