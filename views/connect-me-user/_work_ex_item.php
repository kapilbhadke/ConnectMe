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
    <div class="panel panel-default panel-without-shadow">
        <div class="panel-body">

            <h4><b><?=$model['position'];?></b></h4>
            <p><?=$model['organization'];?></p>
            <p><?=$model['start_date'];?> - <?=$model['end_date'];?></p>
            <p><?=$model['description'];?></p>
            <hr/>
            <p><?= $model['location'];?></p>

        </div>
    </div>
</div>
