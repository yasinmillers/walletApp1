<?php
/* @var $this yii\web\View */

use tuyakhov\youtube\EmbedWidget;
echo Yii::getAlias("@uploads");
?>
<?= EmbedWidget::widget([
'code' => 'vs5ZF9fRDzA',
'playerParameters' => [
'controls' => 2
],
'iframeOptions' => [
'width' => '600',
'height' => '450'
]
]);
?>