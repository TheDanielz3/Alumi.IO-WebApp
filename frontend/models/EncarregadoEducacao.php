<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "encarregadoEducacao".
 *
 * @property int $Contacto
 * @property int $id
 *
 * @property Aluno[] $alunos
 * @property User $id0
 */
class EncarregadoEducacao extends \yii\db\ActiveRecord
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
            [['Contacto', 'id'], 'required'],
            [['Contacto', 'id'], 'integer'],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Contacto' => 'Contacto',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_Encarregado_de_educação' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
