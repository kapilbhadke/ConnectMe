<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode("Add new address") ?></h3>
    </div>
    <div class="panel-body">
        <div class="organization-address-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'address1')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'address2')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'landmark')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pincode')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>