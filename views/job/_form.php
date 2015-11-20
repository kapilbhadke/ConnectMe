<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lookup;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="job-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

            <?= $form->field($model, 'org_id')->dropDownList(\app\models\Organization::getUserOrganizations(Yii::$app->user->id)) ?>

            <?= $form->field($model, 'location')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                'model' => $model,
                'attribute' => 'start_date',
                'attribute2' => 'end_date',
                'options' => ['placeholder' => 'Start date'],
                'options2' => ['placeholder' => 'End date'],
                'type' => DatePicker::TYPE_RANGE,
                'form' => $form,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <?= $form->field($model, 'job_type')->dropDownList(Lookup::items('JobType')); ?>

            <?= $form->field($model, 'employment_type')->dropDownList(Lookup::items('EmploymentType')); ?>

            <?= $form->field($model, 'work_domain')->dropDownList(Lookup::items('WorkDomain')); ?>

            <?= $form->field($model, 'required_skills')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'deadline_date')->widget(DatePicker::classname(), [
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Post', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>