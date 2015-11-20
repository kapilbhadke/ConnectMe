<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Connect Me',
        //'brandLabel' => Html::img('images/back.jpg'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ],
    ]);

    $itemsRight = array();
    if (Yii::$app->user->isGuest) {
        $itemsRight[] = ['label' => 'Login', 'url' => ['/user/security/login']];
        $itemsRight[] = ['label' => 'Register', 'url' => ['/user/registration/register']];
    } else {

        $itemsRight[] = [
            'label' => Yii::$app->user->identity->username,
            'items' => [
                ['label' => '  Edit Profile', 'url' => ['/connect-me-user/profile', 'id'=>Yii::$app->user->id], 'linkOptions' => ['class'=>'glyphicon glyphicon-user']],
                '<li class="divider"></li>',
                ['label' => 'Add an Organization', 'url' => ['/organization/create']],
                '<li class="divider"></li>',
                ['label' => 'Post a Job/Task', 'url' => ['/job/create']],
                '<li class="divider"></li>',
                ['label' => 'My Organizations', 'url' => ['/organization/index', 'user_id'=>Yii::$app->user->id]],
                '<li class="divider"></li>',
                ['label' => 'My Tasks/Jobs', 'url' => ['/job/index', 'user_id'=>Yii::$app->user->id]],
                '<li class="divider"></li>',
                ['label' => 'Logout',
                    'url' => ['/user/security/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            ],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $itemsRight
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ConnectMe <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
