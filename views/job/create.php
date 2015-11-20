<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Post a Task / Job';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-create">

    <div class="row">
        <div class="col-md-9 col-md-offset-1-half">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
