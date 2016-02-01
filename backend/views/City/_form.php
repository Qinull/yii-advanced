<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Country;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
    
    <?php 
    
//     echo $form->field($model, 'CountryCode')->dropdownList(
//         Country::find()->select(['Name', 'Code'])->indexBy('Code')->column(),
//         ['prompt'=>'Select...']);
    
//     echo $form->field($model, 'CountryCode')->dropdownList(
//         ArrayHelper::map(Country::find()->all(), 'Code', 'Name'),
//         ['prompt'=>'Select...']);
    
    echo $form->field($model, 'CountryCode')->widget(Select2::classname(), [
        //'hideSearch' => true,
        'data' => Country::find()->select(['Name', 'Code'])->indexBy('Code')->column(),
        'options' => ['placeholder' => 'Select a code ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    
    ?>

    <?= $form->field($model, 'District')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Population')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
