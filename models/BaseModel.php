<?php

namespace app\models;

use Carbon\Carbon;

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
class BaseModel extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $now = Carbon::now();

        if (!isset($this->created_at)) {
            $this->created_at = $now->format('Y-m-d H:i:s');
        }

        $this->modified_at = $now->format('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }
}