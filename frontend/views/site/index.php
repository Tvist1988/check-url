<?php

/** @var yii\web\View $this */
/** @var \app\models\Hosts $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Проверка URL';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Сервис проверки URL</h1>

        <p class="lead">Проверьте доступность URL</p>

    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'url') ?>

        <?= $form->field($model, 'interval')->dropDownList($model->getIntervals(), ['prompt' => 'Выберите интервал']) ?>

        <?= $form->field($model, 'repeat')->dropDownList($model->getRepeats(), ['prompt' => 'Выберите количество попыток']) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>
