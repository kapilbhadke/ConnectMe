<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrganizationWork */

$this->title = 'Add more details';
$this->params['breadcrumbs'][] = ['label' => 'Organization Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-work-create col-md-9 col-md-offset-1-half">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
