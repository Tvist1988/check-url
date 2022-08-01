<?php

/** @var yii\web\View $this */
/** @var \app\models\Hosts $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Проверка URL';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Успешно</h1>

        <p class="lead">Вы ввели следующую информацию:</p>

    </div>

    <div class="body-content">
        <ul>
            <li><label>URL</label>: <?= Html::encode($model->url) ?></li>
            <li><label>Интервал проверки</label>: <?= Html::encode($model->interval) ?></li>
            <li><label>Количество попыток</label>: <?= Html::encode($model->repeat) ?></li>
        </ul>

        <?= Html::a('Добавить еще url',['site/index'],['class'=>'btn btn-primary']) ?>


    </div>
</div>
