<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserEducation */

$this->title = 'Create User Education';
$this->params['breadcrumbs'][] = ['label' => 'User Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
