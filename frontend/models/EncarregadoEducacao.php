<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "encarregadoEducacao".
 *
 * @property int $id
 * @property int $contacto
 *
 * @property User $id0
 */
class EncarregadoEducacao extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encarregadoEducacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contacto'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contacto' => 'Contacto',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
