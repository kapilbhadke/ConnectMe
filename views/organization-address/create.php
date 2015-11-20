<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrganizationAddress */

$this->title = 'Add an Address';
$this->params['breadcrumbs'][] = ['label' => 'Organization Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-address-create col-md-9 col-md-offset-1-half">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
