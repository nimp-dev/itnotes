<?php

use yii\helpers\Html;


?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelcat' => $modelcat,
    ]) ?>

</div>