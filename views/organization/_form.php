<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("Organization_logo").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lookup;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <!--<div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode("Organization details") ?></h3>
    </div>-->
    <div class="panel-body">
        <div class="organization-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'org_type')->dropDownList(Lookup::items('OrganizationType')); ?>

            <?= $form->field($model, 'work_domain')->dropDownList(Lookup::items('WorkDomain')); ?>

            <?= $form->field($model, 'website')->textInput(['maxlength' => true]); ?>

            <?= $form->field($model, 'found_date')->widget(DatePicker::classname(), [
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => 'btn btn-success pull-right']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
