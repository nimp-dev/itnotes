<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */


?>
<div class="site-index">

    <div class="jumbotron">
        <h2>post!</h2>
    </div>

    <div class="body-content">
        <p>
            <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['attribute'=>'cat', 'value'=>'catsString'],
                'title',
                'type',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>