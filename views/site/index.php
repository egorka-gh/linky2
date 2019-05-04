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
            <a class="bttn" style="padding: 0.85% 2.5%; text-decoration: none" name="linkit" id="linkit"
                href="index_create.php"> Link it!</a>
        </div>
    </div>

    <div id="principle">
        <h1 class="principleH">How does it work?</h1>
        <div class="cards2">
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">1</div>
                <div class="cardTitle2 smallText2">
                    <?= Html::a('Discover',['publications/index']) ?>
                    </div>
                <div class="cardContent2">Look through the link lists provided <br /> by other users, you may filter
                    them <br /> up by categories or tags.</div>
            </div>
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">2</div>
                <div class="cardTitle2">Join us</div>
                <div class="cardContent2">Sign up to get more opportunities <br /> in your way.</div>
            </div>
            <div class="card2">
                <div class="semicircle2"></div>
                <div class="cardNumber2">3</div>
                <div class="cardTitle2">Link it!</div>
                <div class="cardContent2">Share the most useful links with <br /> others, stay creative and enjoy.</div>
            </div>
            <div></div>
        </div>
    </div>

    <!--     <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>