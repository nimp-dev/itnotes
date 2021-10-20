
<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;

?>

<div class="order-form">

        <?php $form = ActiveForm::begin([
            'options' => ['enctype'=>'multipart/form-data'],
        ]); ?>
        <!--    <div class="form-group field-category-parent_id has-success">-->
        <!--        <label class="control-label" for="category-parent_id">Родительская категория</label>-->
        <!--        <select id="category-parent_id" class="form-control" name="Category[parent_id]">-->
        <!--            <option value="0">Самостоятельная категория</option>-->
        <!--            -->
        <!--        </select>-->
        <!--    </div>-->
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'categories_array')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Categories::find()->all(),'id','title'),
                'language' => 'ru',
                'options' => ['placeholder' => 'категории...','multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags'=>true,
                ],
            ]);?>
        </div>
        <div class="col-md-4">

        <?= $form->field($model, 'type')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <?= $form->field($model, 'lemma')->textarea(['rows' => '2']) ?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <?php
        echo $form->field($model, 'content')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'imageUpload' => Url::to(['/post/save-redactor-img']),
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'fontcolor',
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ],
            ],
        ]);
        ?>
        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'img/*'],
        ]); ?>

    </div>
    </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
