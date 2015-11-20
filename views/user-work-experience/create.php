<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserWorkExperience */

$this->title = 'Create User Work Experience';
$this->params['breadcrumbs'][] = ['label' => 'User Work Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-work-experience-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
