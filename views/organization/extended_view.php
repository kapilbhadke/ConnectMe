<?php

use yii\helpers\Html;
use app\models\Lookup;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <table class="col-md-offset-half">
        <tr>
            <td class="col-md-5">
                <h1><?= Html::encode($this->title) ?></h1>
                <h5><?= Lookup::item('WorkDomain', $model->work_domain)?> | <?= Lookup::item('OrganizationType', $model->org_type) ?></h5>
                <?= Html::a('Follow', [''], ['class'=>'btn btn-default']) ?>
                <br/><br/>
            </td>

            <td class="col-md-2">
                <?php
                if($model->logo)
                    echo '<img src='.Yii::$app->urlManager->createUrl($model->logo).' height="116" width="116" alt="Logo">';
                ?>
            </td>


            <td class="col-md-3 col-md-offset-half">
                &nbsp;&nbsp;Tasks posted by <?= $this->title ?>
            </td>
        </tr>
    </table>
</div>

<div class="organization-view col-md-8 col-md-offset-half">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 style="font-weight: 600">About Us</h4>
                <?= $model->description ?>
                <br/><br/>
                <?= Html::a( $model->website, $model->website, ['title' => $model->name, 'target' => '_blank', 'alt' => $model->website] ) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 style="font-weight: 600">Details</h4>

                <?php

                if(!is_null($workModel))
                {
                    if(!is_null($workModel->vision) && strlen($workModel->vision)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('vision');
                        echo "</h4>";
                        echo $workModel->vision;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->mission) && strlen($workModel->mission)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('mission');
                        echo "</h4>";
                        echo $workModel->mission;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->who) && strlen($workModel->who)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('who');
                        echo "</h4>";
                        echo $workModel->who;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->what) && strlen($workModel->what)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('what');
                        echo "</h4>";
                        echo $workModel->what;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->why) && strlen($workModel->why)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('why');
                        echo "</h4>";
                        echo $workModel->why;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->how) && strlen($workModel->how)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('how');
                        echo "</h4>";
                        echo $workModel->how;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->short_term_goals) && strlen($workModel->short_term_goals)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('short_term_goals');
                        echo "</h4>";
                        echo $workModel->short_term_goals;
                        echo "<br/><br/>";
                    }

                    if(!is_null($workModel->long_term_goals) && strlen($workModel->long_term_goals)>0)
                    {
                        echo "<h4 style=\"font-weight: 600\">";
                        echo $workModel->getAttributeLabel('long_term_goals');
                        echo "</h4>";
                        echo $workModel->long_term_goals;
                        echo "<br/><br/>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 style="font-weight: 600">Locations</h4>
                <div class="col-md-4">
                    <?php
                    $i = 1;
                    foreach ($addressDataProvider->models as $address) {
                        echo "<h5 style=\"font-weight:600\">" . "Address: " . $i . "</h5>";
                        echo $address['address1'] . "<br/>";
                        echo $address['landmark'] . "<br/>";
                        echo $address['city'] . ", ";
                        echo $address['state'] . "<br/>";
                        echo $address['country'] . "<br/><br/>";
                        $i++;
                    }
                    ?>
                </div>
                <div class="col-md-8">

                    <?php

                    $coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
                    $map = new Map([
                        'center' => $coord,
                        'zoom' => 14,
                    ]);

                    foreach ($addressDataProvider->models as $address) {
                        if(!is_null($address['latitude']))
                        {
                            $latitude = $address['latitude'];
                            $longitude = $address['longitude'];
                            $coord = new LatLng(['lat' => $latitude, 'lng' => $longitude]);
                            $marker = new Marker([
                                'position' => $coord,
                                'title' => $model->name,
                            ]);
                            $marker->attachInfoWindow(
                                new InfoWindow([
                                    'content' => '<p>'.$address['address1'].'</p>'
                                ])
                            );
                            $map->addOverlay($marker);
                        }
                    }
                    echo $map->display();
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="organization-job-view col-md-3 col-md-offset-half">
    <?=
    is_null($jobDataProvider) ? 'No tasks posted.' :
        ListView::widget( [
            'dataProvider' => $jobDataProvider,
            'itemView' => '_job_item',
            'summary' => '',
            'layout' => "{items}\n{summary}\n{pager}",
        ] )
    ?>
</div>
