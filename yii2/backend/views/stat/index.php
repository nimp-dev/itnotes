<?php
use yii\grid\GridView;


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        'lemma',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ],
]);