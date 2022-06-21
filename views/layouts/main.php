<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOChtml>TYPE
<html lang="<?= Yii::$app->language ?>" class="h-100" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    /*https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css*/
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<div class="wrap h=100 d-flex flex-column">
    <?= $this->render('header') ?>

    <main role="main" class="row w-100 pt-2 mt-5">
        <?= $this->render('sidebar') ?>
        <div class="content-wrapper clearfix col-10 ">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
</div>


<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy;youtube <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
