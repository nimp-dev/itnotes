<?php

use yii\helpers\Html;
?>
<div class="order-update">

    <h1>Редактирование:  <?= $model->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelcat' => $modelcat,
    ]) ?>

    <div>
        <?php foreach ($model->categories as $one) : ?>
        <?=$one->title ?>
        <?php endforeach; ?>
    </div>

</div>