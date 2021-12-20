<?php
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="box">
    <div class="box-body">
        <div class="row">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <div class="col-md-4">
                <?= $form->field($model, 'title')->widget(Select2::classname(), [
                    'data' => \backend\models\Articles::getListTitle(),
                    'language' => 'ru',
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Заголовок','multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'maximumInputLength' => 15
                    ]
                ])->label(false);?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'lemma')->widget(Select2::classname(), [
                    'data' => \backend\models\Articles::getListLemma(),
                    'language' => 'ru',
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Краткое описание','multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'maximumInputLength' => 10
                    ]
                ])->label(false);?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary w-50p']) ?>
                <?= Html::a('Reset', '/post/index', ['class' => 'btn btn-default w-50p']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'limit')->widget(Select2::classname(), [
                    'data' => [10 => 10, 15 => 15, 20 => 20],
                    'language' => 'ru',
                    'options' => ['placeholder' => 'количество записей'],
                ])->label(false);?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
