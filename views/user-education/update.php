<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserEducation */

$this->title = 'Update User Education: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
