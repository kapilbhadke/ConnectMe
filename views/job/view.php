<?php

use yii\helpers\Html;
use app\models\Lookup;


/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

    <div class="organization-view col-md-9 col-md-offset-1-half">

        <div class="row">
            <h1><?= Html::encode($this->title) ?></h1>
            <h5><?= Lookup::item('JobType', $model->job_type)?> | <?= Lookup::item('WorkDomain', $model->work_domain)?></h5>
            <?php
            if($model->user_id == Yii::$app->user->id)
                echo Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            else
            {
                echo Html::a('Apply', [''], ['class'=>'btn btn-default']);
                echo ' Apply before ' . $model->deadline_date;
            }

            ?>
            <br/><br/>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="font-weight: 600">Description</h4>
                    <?= $model->description ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="font-weight: 600">When ?</h4>
                    <b><?= $model->start_date ?></b> to <b><?= $model->end_date ?></b>
                    <br/><br/>
                    <h4 style="font-weight: 600">Where ?</h4>
                    <?= $model->location ?>
                    <br/><br/>
                    <h4 style="font-weight: 600">Engagement ?</h4>
                    <?= Lookup::item('EmploymentType', $model->employment_type) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="font-weight: 600">Contact Person</h4>
                </div>
            </div>
        </div>

    </div>

</div>
