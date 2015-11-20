<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JobContactPerson */

$this->title = 'Create Job Contact Person';
$this->params['breadcrumbs'][] = ['label' => 'Job Contact People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-contact-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
