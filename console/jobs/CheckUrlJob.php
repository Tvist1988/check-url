<?php

namespace console\jobs;

use common\models\Checks;
use common\models\Hosts;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use yii\base\ErrorException;
use yii\queue\RetryableJobInterface;


class CheckUrlJob extends \yii\base\BaseObject implements \yii\queue\JobInterface
{
    public string $host;
    public int $host_id;
    public int $repeat;
    public int $interval;
    public int $attempt;


    /**
     * @inheritDoc
     */
    public function execute($queue)
    {
        $check = new Checks();
        $check->host_id = $this->host_id;
        $check->attempt = $this->attempt;
        $check->date_time = date('Y-m-d H:i:s');

        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->host,
        ]);
        try {
            $response = $client->request('GET');
            $code = $response->getStatusCode();
            $check->code = $code;
            if ($check->validate()) {
                $check->save();
            }
            if ($code === 200) {
                return true;
            }
        } catch (ClientException|ConnectException $e) {
            $check->code = $e->getCode();
            $check->save();
            $this->checkRepeat();
            throw $e;
        }
    }

    private function checkRepeat()
    {
        if ($this->repeat > $this->interval) {
            $this->repeat = $this->interval;
        }
        if ($this->attempt < $this->repeat) {
            $attempt = $this->attempt + 1;
            \Yii::$app->queue->delay(30)->push(new CheckUrlJob([
                'host' => $this->host,
                'host_id' => $this->host_id,
                'repeat' => $this->repeat,
                'interval' => $this->interval,
                'attempt' => $attempt,
            ]));
        }
    }

}