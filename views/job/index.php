<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use app\models\Lookup;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks / Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="organization-index col-md-3 col-vertical-offset-1">

    <div class="organization-search-form">
        <?php $form = ActiveForm::begin(['enableClientValidation'=>false]); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <?= $form->field($model, 'employment_type')->checkboxList(Lookup::items('EmploymentType'), ['separator' => '<br>']); ?>
                <div class="form-group">
                    <?= Html::submitButton('Filter', ['class' => 'btn btn-success margin-left-1 pull-right']) ?>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <?= $form->field($model, 'job_type')->checkboxList(Lookup::items('JobType'), ['separator' => '<br>']); ?>
                <div class="form-group">
                    <?= Html::submitButton('Filter', ['class' => 'btn btn-success margin-left-1 pull-right']) ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <?= $form->field($model, 'work_domain')->checkboxList(Lookup::items('WorkDomain'), ['separator' => '<br>']); ?>
                <div class="form-group">
                    <?= Html::submitButton('Filter', ['class' => 'btn btn-success margin-left-1 pull-right']) ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

<div class="job-index col-md-9">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php Pjax::begin(); ?>
    <?=
    is_null($dataProvider) ? 'No results found.' :
        ListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'summary' => '<h4 class="pull-right">Showing ' . $dataProvider->count . ' of total ' . $dataProvider->totalCount . ' jobs / tasks' . '</h4>',
            'layout' => "{items}\n{summary}\n{pager}",
        ] )
    ?>
    <?php Pjax::end(); ?>

</div>