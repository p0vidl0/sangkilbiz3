<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use biz\master\models\Customer;
use biz\behaviors\StatusBehavior;

/**
 * @var yii\web\View $this
 * @var biz\master\models\Customer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="customer-form col-lg-6" style="padding-left: 0px;">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            New Cutomer
        </div>
        <div class="panel-body">
            <?= $form->field($model, 'cd_customer')->textInput(['maxlength' => 13, 'style' => 'width:120px;']) ?>

            <?= $form->field($model, 'nm_customer')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($model, 'contact_name')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => 64]) ?>

            <?=
            $form->field($model, 'status')->dropDownList([
                Customer::STATUS_INACTIVE => 'Inactive',
                Customer::STATUS_ACTIVE => 'Active',
                Customer::STATUS_BLOCKED => 'Blocked',
                ], ['style' => 'width:200px;']);
            ?>

        </div>
    </div>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
