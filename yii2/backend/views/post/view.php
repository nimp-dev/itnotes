<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */


?>
<div class="site-index">

    <div class="jumbotron">
        <h2>post! <?= $model->title ?></h2>
    </div>

    <div class="body-content">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'created_at',
                'updated_at',
                'title',
                'lemma',
                'content:html',
//                'viewImage:image',
                'type',
            ],
        ]) ?>

    </div>
</div>