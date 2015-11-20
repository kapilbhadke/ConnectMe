<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lookup;
use kartik\ipinfo\IpInfo;
use kartik\popover\PopoverX;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'ConnectMe - Volunteer, Work, Intern, Organise, Connect';
?>
<div class="site-index">

    <!--<div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>We connect idealists with opportunities for action.</h2>
            </div>
        </div>
    </div>-->

    <!--<?= IpInfo::widget(); ?>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?= Html::a('Post a Task', ['/job/create'], ['class'=>'btn btn-default pull-right']) ?>
                <?= Html::a('Add an Org', ['/organization/create'], ['class'=>'btn btn-default pull-right']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>We connect idealists with opportunities for action.</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center"><?= Html::encode("What are you looking for?") ?></h4>
                        <div class="organization-form">

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'search_type')->dropDownList(Lookup::items('SearchType'))->label(false); ?>

                            <?= $form->field($model, 'search_keyword', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Name or Keyword or interest']])->textInput(['maxlength' => true])->label(false) ?>

                            <?= $form->field($model, 'search_location', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Where?']])->textInput(['maxlength' => true])->label(false) ?>

                            <div class="form-group text-center">
                                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="col-md-4 col-md-offset-1">
                <br/>
                <h4>Recent Activities</h4>
                <?php Pjax::begin(); ?>
                <?=
                is_null($dataProvider) ? 'No results found.' :
                    ListView::widget( [
                        'dataProvider' => $dataProvider,
                        'itemView' => '_job_item',
                        'summary' => '',
                        'layout' => "{items}\n{summary}\n{pager}",
                    ] )
                ?>
                <?php Pjax::end(); ?>
            </div>-->
        </div>

        <hr style="border-color: #00838F"/>

        <div class="row text-center">
            <div class="col-lg-4">
                <h3>Vision</h3>
                <p>Connect Me  is all about connecting idealists - people who want to do good - with opportunities for action and collaboration.</p>
            </div>

            <div class="col-lg-4">
                <h3>Mission</h3>
                <p>Connect people, organizations, and resources to help build a world where all people can work collaboratively to make happy changes in lives of needy people.</p>
            </div>

            <div class="col-lg-4">
                <h3>Values</h3>
                <p>To act in a spirit of generosity and mutual respect: no violence; no action against anyone on the basis of their identity; no action about you without you.</p>
            </div>
        </div>

    </div>
</div>
