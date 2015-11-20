<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organization Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Organization Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'org_id',
            'who:ntext',
            'what:ntext',
            'why:ntext',
            'how:ntext',
            // 'vision:ntext',
            // 'mission:ntext',
            // 'short_term_goals:ntext',
            // 'long_term_goals:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
