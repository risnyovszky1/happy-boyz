<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="training-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['class' => 'date-time-picker form-control']); ?>

    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">
                <a href="<?= \yii\helpers\Url::toRoute(['/training']) ?>" class="btn btn-block btn-light"><i class="fa-solid fa-angles-left"></i> <?= Yii::t('app', 'Cancel') ?></a>
            </div>
        </div>

        <div class="col-lg-10">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
