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

            <?php Yii::info(".................................."); Yii::info($model['name']); ?>

            <h4><b><?= Html::a( $model['name'], ['view', 'id'=>$model['id']], ['title' => $model['name'], 'target' => '_blank'] ) ?></b></h4>
            <p><?=$model['description'];?></p>
            <hr/>
            <p><?= Lookup::item('WorkDomain', $model['work_domain']) ?> |
                <?= Lookup::item('OrganizationType', $model['org_type']) ?>
                <?= Yii::$app->user->id == $model['user_id']? Html::a( 'Edit', ['profile', 'id'=>$model['id']], ['title' => 'Edit'.$model['name'], 'class'=>'btn btn-default pull-right'] ) : ''?>
            </p>

        </div>
    </div>
</div>
