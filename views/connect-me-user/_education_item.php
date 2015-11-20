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

            <h4><b><?=$model['degree'];?></b></h4>
            <p><?=$model['institute'];?></p>
            <p><?=$model['start_date'];?> to <?=$model['end_date'];?></p>
            <p><?=$model['area'];?></p>

        </div>
    </div>
</div>
