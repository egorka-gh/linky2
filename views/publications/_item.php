<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
//implement
$ownlike=0;

?>
    <div class="cardpic" style="background-image: url('/web/img/covers/<?php echo ($model->image) ?>');"></div>
        <?php if((getUserLevel() > 0  && getUserId() == $model->user) || getUserLevel() > 10 ) {?>
            <div class="cardEdit" data-pid='<?php echo ($model->id) ?>' >
                <?= Html::a('Edit', ['update', 'id' => $model->id]) ?>
            </div>
            <form id="frmEdit<?php echo ($model->id); ?>" target="" action="" method="POST">
                <input id="edit_postId" name="edit_postId" type="hidden" value="<?php echo ($model->id); ?>"/>
            </form>
        <?php }?>
        <div class="cardcategory"><?php echo ($model->categoryobj->name) ?></div>
        <div class="item" style="position: relative; width:85%; height:65%; margin: -45% 7.5% 10% 7.5%; ">
            <div class="cardTitleS"><?php echo ($model->name) ?></div>
            <div class="userS"><?php echo ($model->user) ?></div>
            <a class="linkS" href="<?php echo ($model->url) ?>" target="_blank"><?php echo ($model->url) ?></a>
            <div class="cardContentS"><?php echo ($model->description) ?></div>
            <div style="position: absolute; margin-top: 65%; display: flex; flex-flow: row; padding: 0 5%; width:10%;">
            <div class="date" style='padding-right: 18vw'><?php echo ($model->post_date) ?></div>
            <div class="favorites" style="display: flex; flex-flow: row">
                <div class="date" >
                <input id="toggleLike<?php echo ($model->id) ?>" type="checkbox" 
                    <?php if($model->ownlike ==1 ) echo ('checked') ?> <?php if(getUserLevel() == 0 ) echo ('disabled') ?> data-pid='<?php echo ($model->id) ?>'/> 
                <label for="toggleLike<?php echo ($model->id) ?>" aria-label="like">❤</label>
                </div>
                    <div id="labelLike<?php echo ($model->id) ?>" class="date"  style='margin: 0 15%'><?php echo ($model->favorites_cnt) ?></div>
                </div>
            </div>
        </div>
