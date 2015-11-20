<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\detail\DetailView;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view col-md-9 col-md-offset-1-half">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php
    echo DetailView::widget([
        'model'=>$profileModel,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'hAlign'=>DetailView::ALIGN_LEFT,
        'vAlign'=>DetailView::ALIGN_TOP,
        'panel'=>[
            'heading'=>'Summary',
            'type'=>DetailView::TYPE_INFO,
        ],
        'buttons1'=>'{update}',
        'buttons2'=>'{reset} {save}',
        'labelColOptions' => ['style' => 'display: none'],
        'attributes'=>[
            ['attribute'=>'about', 'label'=>''],
        ]
    ]);
    ?>

    <?php
    echo DetailView::widget([
        'model'=>$profileModel,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'hAlign'=>DetailView::ALIGN_LEFT,
        'vAlign'=>DetailView::ALIGN_TOP,
        'panel'=>[
            'heading'=>'Skills',
            'type'=>DetailView::TYPE_INFO,
        ],
        'buttons1'=>'{update}',
        'buttons2'=>'{reset} {save}',
        'labelColOptions' => ['style' => 'display: none'],
        'attributes'=>[
            ['attribute'=>'skills', 'label'=>''],
        ]
    ]);
    ?>


    <div class="page">
        <h3>Work Experience</h3>
        <hr/>

        <?php Pjax::begin(); ?>
        <?=
        is_null($workDataProvider) ? 'No results found.' :
            ListView::widget( [
                'dataProvider' => $workDataProvider,
                'itemView' => '_work_ex_item',
                'summary' => '',
                'layout' => "{items}\n{summary}\n{pager}",
            ] )
        ?>
        <?php Pjax::end(); ?>

        <?php
        echo DetailView::widget([
            'model'=>$workModel,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'hAlign'=>DetailView::ALIGN_LEFT,
            'vAlign'=>DetailView::ALIGN_TOP,
            'hideIfEmpty'=>true,
            'panel'=>[
                'heading'=> 'Add work experience',
                'type'=>DetailView::TYPE_INFO,
            ],
            'buttons1'=>'{update}',
            'updateOptions'=>['label'=>'<span class="glyphicon glyphicon-plus"></span>'],
            'buttons2'=>'{reset} {save}',
            'attributes'=>[
                'organization',
                'position',
                'description',
                'location',
                ['attribute'=>'start_date', 'type'=>DetailView::INPUT_DATE, 'widgetOptions' => ['pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']]],
                ['attribute'=>'end_date', 'type'=>DetailView::INPUT_DATE, 'widgetOptions' => ['pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']]],
            ]
        ]);
        ?>
    </div>

    <div class="page">
        <h3>Education</h3>
        <hr/>

        <?php Pjax::begin(); ?>
        <?=
        is_null($educationDataProvider) ? 'No results found.' :
            ListView::widget( [
                'dataProvider' => $educationDataProvider,
                'itemView' => '_education_item',
                'summary' => '',
                'layout' => "{items}",
            ] )
        ?>
        <?php Pjax::end(); ?>

        <?php
        echo DetailView::widget([
            'model'=>$educationModel,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'hAlign'=>DetailView::ALIGN_LEFT,
            'vAlign'=>DetailView::ALIGN_TOP,
            'hideIfEmpty'=>true,
            'panel'=>[
                'heading'=> 'Add education',
                'type'=>DetailView::TYPE_INFO,
            ],
            'buttons1'=>'{update}',
            'updateOptions'=>['label'=>'<span class="glyphicon glyphicon-plus"></span>'],
            'buttons2'=>'{reset} {save}',
            'attributes'=>[
                'institute',
                'degree',
                'area',
                'location',
                ['attribute'=>'start_date', 'type'=>DetailView::INPUT_DATE, 'widgetOptions' => ['pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']]],
                ['attribute'=>'end_date', 'type'=>DetailView::INPUT_DATE, 'widgetOptions' => ['pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']]],
            ]
        ]);
        ?>
    </div>

    <div class="page">
        <h3>Address</h3>
        <hr/>
        <?php Pjax::begin(); ?>
        <?=
        is_null($addressDataProvider) ? 'No results found.' :
            ListView::widget( [
                'dataProvider' => $addressDataProvider,
                'itemView' => '_address_item',
                'summary' => '',
                'layout' => "{items}",
            ] )
        ?>
        <?php Pjax::end(); ?>

        <?php
        echo DetailView::widget([
            'model'=>$addressModel,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'hAlign'=>DetailView::ALIGN_LEFT,
            'vAlign'=>DetailView::ALIGN_TOP,
            'hideIfEmpty'=>true,
            'panel'=>[
                'heading'=> 'Add new address',
                'type'=>DetailView::TYPE_INFO,
            ],
            'buttons1'=>'{update}',
            'updateOptions'=>['label'=>'<span class="glyphicon glyphicon-plus"></span>'],
            'buttons2'=>'{reset} {save}',
            'attributes'=>[
                'address1',
                'address2',
                'landmark',
                'city',
                'state',
                'country',
                'pincode',
            ]
        ]);
        ?>
    </div>

</div>
