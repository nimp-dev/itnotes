<?php
use kartik\grid\GridView;
use kartik\select2\Select2;
/* @var $this yii\web\View */


?>
<div class="site-index">

        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="box">
        <div class="box-body">
            <div class="body-content">
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'id' => 'grid-traffic-pjax',
                'pjax' => true,
                'pjaxSettings' => [
                    'options' => [
                        'id' => 'grid-article-pjax',
                    ],
                ],
                'columns' => [
                    'id',
                    'title',
                    'lemma',
                    'type',
                    ['class' => 'yii\grid\ActionColumn'],
                ]
            ]);
            ?>
        </div>
    </div>
</div>