<?php

use yii\helpers\Html;
use app\assets\SiteAsset;

/* @var $this yii\web\View */

SiteAsset::register($this);
$this->title = 'Linky';

?>
<div class="site-index">


    <div>
        <div class="content">
            <h1>Let's share and discover <br />the world's best links!</h1>
            <p class="smallText">Linky represents the most useful lists of links made for you,<br />
                made by you. Come and get what you deserve. <br />
                Think, make, <span>link.<span></p>
            <?= Html::a('Link it!',['publications/create'], ['class'=>"bttn", 'style'=>"padding: 0.85% 2.5%; text-decoration: none;"]) ?>
        </div>
    </div>

    <div id="principle">
        <h1 class="principleH">How does it work?</h1>
        <div class="cards2">
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">1</div>
                <div class="cardTitle2 smallText2">
                    <?= Html::a('Discover',['publications/index'], ['class'=>"bttn", 'style'=>"padding: 2% 9%; text-decoration: none; font-size: 2.25vw"]) ?>
                </div>
                <div class="cardContent2">Look through the link lists provided <br /> by other users, you may filter
                    them <br /> up by categories or tags.</div>
            </div>
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">2</div>
                <div class="cardTitle2">
                    <?= Html::a('Join us',['/site/signup'], ['class'=>"bttn", 'style'=>"padding: 2% 9%; text-decoration: none; font-size: 2.25vw"]) ?>
                </div>
                <div class="cardContent2">Sign up to get more opportunities <br /> in your way.</div>
            </div>
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">3</div>
                <div class="cardTitle2">
                    <?= Html::a('Link it!',['publications/create'], ['class'=>"bttn", 'style'=>"padding: 2% 9%; text-decoration: none; font-size: 2.25vw"]) ?>
                </div>
                <div class="cardContent2">Share the most useful links with <br /> others, stay creative and enjoy.</div>
            </div>
            <div></div>
        </div>
    </div>

    <div id="principle" style="padding-top: 11%">
        <h1 class="principleH">What our clients say</h1>

        <div class="commentCard">
            <div id='display_comments'>
                <?= $this->render('comments', ['model' => $model ]) ?>
            </div>
            <div id="addCommentContainer" style="margin-top: 2%">
                <form id="addCommentForm" method="post" action="">
                    <div>
                        <label for="comment_content" class="addComment">Leave a comment</label>
                        <textarea class="addCommentCnt" name="Comments[comment]" id="comment_content" cols="110" rows="5"
                            placeholder="Enter your comment"></textarea>
                        <input type="hidden" name="Comments[parent_comment_id]" id="comment_id" value="0" />
                        <input class="bttn" style="width: 10vw; margin-left: 78%; margin-top: 3%;" type="submit"
                            name="submitCom" id="submitCom" value="Post" />
                    </div>
                </form>
                <div id="comment_message" style=""></div>
            </div>
        </div>
    </div>

</div>