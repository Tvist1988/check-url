<?php

use console\jobs\CheckUrlJob;
use omnilight\scheduling\Schedule;
use common\models\Hosts;

/**
 * @var Schedule $schedule
 */

$schedule->command('migrate --interactive=0')->everyMinute();

$schedule->command('queue/run')->everyMinute();

$schedule->call(function ()
{
   $hosts = Hosts::find()->where(['interval' => 1])->all();
   foreach($hosts as $host) {
       \Yii::$app->queue->push(new CheckUrlJob([
           'host' => $host->url,
           'host_id' => $host->id,
           'repeat' => $host->repeat,
           'interval' => $host->interval,
           'attempt' => 1,
       ]));
   }
})->everyMinute();

$schedule->call(function ()
{
    $hosts = Hosts::find()->where(['interval' => 2])->all();
    foreach($hosts as $host) {
        \Yii::$app->queue->push(new CheckUrlJob([
            'host' => $host->url,
            'host_id' => $host->id,
            'repeat' => $host->repeat,
            'interval' => $host->interval,
            'attempt' => 1,
        ]));
    }
})->cron('*/2 * * * *');

$schedule->call(function ()
{
    $hosts = Hosts::find()->where(['interval' => 10])->all();
    foreach($hosts as $host) {
        \Yii::$app->queue->push(new CheckUrlJob([
            'host' => $host->url,
            'host_id' => $host->id,
            'repeat' => $host->repeat,
            'interval' => $host->interval,
            'attempt' => 1,
        ]));
    }
})->everyTenMinutes();



