<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
AppAsset::addScript($this,'/lovestory/font/dist/js/bootstrap.js');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta name="uyan_auth" content="2ac68e0303" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
 <link href="/lovestory/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="/lovestory/Flat/img/favicon.ico">
    <script src="/lovestory/Flat/dist/js/vendor/html5shiv.js"></script>
    <script src="/lovestory/Flat/dist/js/vendor/respond.min.js"></script>
    <script src="/lovestory/Flat/dist/js/vendor/jquery.min.js"></script>
    <script src="/lovestory/Flat/dist/js/vendor/video.js"></script>
    <script src="/lovestory/Flat/dist/js/flat-ui.min.js"></script>
    <script src="/lovestory/Flat/docs/assets/js/application.js"></script>
	<script src="/lovestory/layer-v2.4/layer/layer.js"></script>
<style type="text/css">
.image{
height:38px;
width:38px;
border:1px solid;
border-color:white;
margin-top:-10px;
border-radius:25px;
}
</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<div class="row demo-row">
        <div class="col-xs-12">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="/">Love Story</a>
                </div>
                <div id="navbar-collapse-01">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=Url::toRoute(['/article/index'])?>">主页<span class="badge">3</span></a></li>
			<?php if(Yii::$app->user->isGuest){?>
			<li><a href="#fakelink">关于我们</a></li>
			<li><a href="<?=Url::toRoute(['/site/login'])?>">登录</a></li>
			<?php }else{?>
			<li><a href="<?=Url::toRoute(['/article/create'])?>">发布美文</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img class="image" src="/lovestory/photo/<?php 
					if(Yii::$app->user->identity->photo==null){
					echo "2.jpg";
					}else{
					echo Yii::$app->user->identity->photo;}
					?>"><b class="caret"></b></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;个人信息</a></li>
                              	 <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;我的文章</a></li>
				 <li><a href="#"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;&nbsp;我的收藏</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;&nbsp;我的相册</a></li>
                                <li class="divider"></li>
                        	<li id="tips"><a href="<?=Url::toRoute(['/site/logout'])?>" data-method="post"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;退出登录</a></li>
			     <!--  <li><?php
                                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']);
					 echo Html::submitButton(
                                        '<span class="glyphicon glyphicon-off"></span>&nbsp;退出',
                                        ['class'=>'btn btn-danger btn-block']
                                    );
                                    echo Html::endForm()
                                    ?>
                                </li>-->
                            </ul>
                        </li>
			  
			<?php }?>
                    </ul>
                    <form class="navbar-form navbar-right" action="#" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                                <span class="input-group-btn">
                      <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                            </div>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
           </nav><!-- /navbar -->
        </div>
</div>
<script type="text/javascript">
var tipsi;
        $("#tips").hover(function(){
            tipsi = layer.tips('点击注销登录',this,{tips:[4,'black'],time:0});
        },function(){
            layer.close(tipsi);
        });
</script>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; jj-jameholl <?= date('Y') ?></p>

        <p class="pull-right">Designed For My lover</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
