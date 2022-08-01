<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 * @property int $host_id
 * @property int $code
 * @property int $attempt
 * @property string|null $date_time
 *
 * @property Hosts $host
 */
class Checks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['host_id', 'code', 'attempt'], 'required'],
            [['host_id', 'code', 'attempt'], 'integer'],
            [['date_time'], 'safe'],
            [['host_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hosts::class, 'targetAttribute' => ['host_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host_id' => 'Host ID',
            'code' => 'Code',
            'attempt' => 'Attempt',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * Gets query for [[Host]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHost()
    {
        return $this->hasOne(Hosts::class, ['id' => 'host_id']);
    }
}
