<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationWork */

$this->title = 'Update Organization details';
$this->params['breadcrumbs'][] = ['label' => 'Organization Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->org_id, 'url' => ['view', 'id' => $model->org_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
