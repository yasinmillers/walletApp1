<?php?>
<div class="list-group col-2 shadow-sm flex=1">
  <a href="<?= \yii\helpers\Url::to(['/']) ?>" class="list-group-item list-group-item-action"> All videos</a>
  <a href="#" class="list-group-item list-group-item-action">Liked</a>
  <a href="#" class="list-group-item list-group-item-action">Saved</a>
  <a href="<?= \yii\helpers\Url::to(['video/create']) ?>" class="list-group-item list-group-item-action">Create</a>
</div>
