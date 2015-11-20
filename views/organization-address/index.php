<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organization Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Organization Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'org_id',
            'address1:ntext',
            'address2:ntext',
            'landmark',
            // 'city',
            // 'state',
            // 'country',
            // 'pincode',
            // 'latitude',
            // 'longitude',
            // 'location',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
            ],
        ],
    ]); ?>

</div>
