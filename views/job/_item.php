<?php
/**
 * Created by PhpStorm.
 * User: kbhadke
 * Date: 25/10/15
 * Time: 1:02 PM
 */
use app\models\Lookup;
use yii\helpers\Html;

?>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">

            <h4><b><?= Html::a( $model['title'], ['view', 'id'=>$model['id']], ['title' => $model['title'], 'target' => '_blank'] ) ?></b></h4>
            <p><?=$model['description'];?></p>
            <p><?= Lookup::item('JobType', $model['job_type']) ?></p>
            <hr/>
            <p><?= Lookup::item('EmploymentType', $model['employment_type']) ?> | <?= $model['start_date']?> to <?= $model['end_date']?> <?= Html::a('Apply', [''], ['class'=>'btn btn-default pull-right']) ?></p>

        </div>
    </div>
</div>
