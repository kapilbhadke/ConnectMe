<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobContactPerson */

$this->title = 'Update Job Contact Person: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Job Contact People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-contact-person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
