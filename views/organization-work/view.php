<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationWork */

$this->title = $model->org_id;
$this->params['breadcrumbs'][] = ['label' => 'Organization Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-work-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->org_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->org_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'org_id',
            'who:ntext',
            'what:ntext',
            'why:ntext',
            'how:ntext',
            'vision:ntext',
            'mission:ntext',
            'short_term_goals:ntext',
            'long_term_goals:ntext',
        ],
    ]) ?>

</div>
