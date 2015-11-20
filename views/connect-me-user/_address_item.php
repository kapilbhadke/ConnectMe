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

            <p><?=$model['address1'];?></p>
            <p><?=$model['address2'];?></p>
            <p><?=$model['city'];?>, <?=$model['state'];?></p>
            <p><?= $model['country'];?></p>

        </div>
    </div>
</div>
