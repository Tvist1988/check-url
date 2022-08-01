<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hosts".
 *
 * @property int $id
 * @property string $url
 * @property int $interval
 * @property int $repeat
 */
class Hosts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hosts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'interval', 'repeat'], 'required'],
            [['interval', 'repeat'], 'integer', 'min' => 1, 'max' => 10],
            [['url'], 'string', 'max' => 128],
            [['interval'], 'in', 'range' => [ 1, 2, 10]],
            [['url'], 'url', 'defaultScheme' => 'https'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'interval' => 'Интервал',
            'repeat' => 'Попыток',
        ];
    }

    public function getIntervals():array {
        return [
            1 => 'одна минута',
            2 => '2 минуты',
            10 => '10 минут',
        ];
    }

    public function getRepeats():array {
        return [
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
        ];
    }
}
