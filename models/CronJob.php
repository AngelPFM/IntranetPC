<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CronJob".
 *
 * @property integer $idNTC_CronJob
 * @property string $ExecuteAfter
 * @property string $ExecutedAt
 * @property integer $Succeeded
 * @property string $Action
 * @property string $Parameters
 * @property string $ExecutionResult
 */
class NTCCronJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CronJob';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ExecuteAfter', 'ExecutedAt'], 'safe'],
            [['Succeeded'], 'integer'],
            [['Action'], 'required'],
            [['Parameters', 'ExecutionResult'], 'string'],
            [['Action'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CronJob' => 'Id Ntc  Cron Job',
            'ExecuteAfter' => 'Execute After',
            'ExecutedAt' => 'Executed At',
            'Succeeded' => 'Succeeded',
            'Action' => 'Action',
            'Parameters' => 'Parameters',
            'ExecutionResult' => 'Execution Result',
        ];
    }
}
