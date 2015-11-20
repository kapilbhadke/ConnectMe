<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode("Organization work details") ?></h3>
    </div>
    <div class="panel-body">

        <div class="organization-work-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'vision')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'mission')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'who')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'what')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'why')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'how')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'short_term_goals')->textarea(['rows' => 2]) ?>

            <?= $form->field($model, 'long_term_goals')->textarea(['rows' => 3]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success pull-right']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>