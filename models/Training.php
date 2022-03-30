<?php

namespace app\models;

use Carbon\Carbon;
use Yii;

/**
 * This is the model class for table "trainings".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $created_at
 * @property string|null $modified_at
 * @property string|null $deleted_at
 */
class Training extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date', 'created_at', 'modified_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date' => Yii::t('app', 'Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }
}
