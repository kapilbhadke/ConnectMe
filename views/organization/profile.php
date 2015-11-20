<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\detail\DetailView;
use app\models\Lookup;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view col-md-9 col-md-offset-1-half">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'hAlign'=>DetailView::ALIGN_LEFT,
        'vAlign'=>DetailView::ALIGN_TOP,
        'panel'=>[
            'heading'=> 'Organization details',
            'type'=>DetailView::TYPE_INFO,
        ],
        'buttons1'=>'{update}',
        'buttons2'=>'{reset} {save}',
        'attributes'=>[
            'name',
            'description',
            ['attribute'=>'org_type', 'value'=>Lookup::item('OrganizationType', $model->org_type),'type'=>DetailView::INPUT_DROPDOWN_LIST, 'items'=>Lookup::items('OrganizationType')],
            ['attribute'=>'work_domain', 'value'=>Lookup::item('WorkDomain', $model->work_domain),'type'=>DetailView::INPUT_DROPDOWN_LIST, 'items'=>Lookup::items('WorkDomain')],
            'website',
            ['attribute'=>'found_date', 'type'=>DetailView::INPUT_DATE, 'widgetOptions' => ['pluginOptions'=>['autoclose'=>true,'format'=>'yyyy-mm-dd']]],
        ]
    ]);
    ?>
    <br/>

    <?php
    echo DetailView::widget([
        'model'=>$workModel,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'hAlign'=>DetailView::ALIGN_LEFT,
        'vAlign'=>DetailView::ALIGN_TOP,
        'panel'=>[
            'heading'=> 'Work details',
            'type'=>DetailView::TYPE_INFO,
        ],
        'buttons1'=>'{update}',
        'buttons2'=>'{reset} {save}',
        'attributes'=>[
            'vision',
            'mission',
            'who',
            'what',
            'why',
            'how',
            'short_term_goals',
            'long_term_goals'
        ]
    ]);
    ?>
    <br/>

    <h2>Locations</h2>
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
            'heading'=> 'Add new location',
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
    <?php
    $i = 1;
    foreach ($addressDataProvider->models as $address) {
        echo "<div class=\"col-md-4\"><h5 style=\"font-weight:600\">" . "Address: " . $i . "</h5>";
        echo $address['address1'] . "<br/>";
        echo $address['landmark'] . "<br/>";
        echo $address['city'] . ", ";
        echo $address['state'] . "<br/>";
        echo $address['country'] . "<br/><br/></div>";
        $i++;
    }
    ?>

    <?php
    /*
     * Tabs
    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-home"></i> Profile',
            'content'=>$this->render('_form', [ 'model' => $model ]),
            'active'=>true
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Work details',
            'content'=>$this->render('/organization-work/_form', [ 'model' => $workModel ]),
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Locations',
            'content'=>'<p>Content 3</p>',
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-king"></i> Disabled',
            'headerOptions' => ['class'=>'disabled']
        ],
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_LEFT,
        'encodeLabels'=>false
    ]);
    */
    ?>

</div>
