<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%professor}}".
 *
 * @property int $id
 * @property string|null $nome
 *
 * @property Disciplinaturma[] $disciplinaturmas
 * @property User $id0
 * @property Recado[] $recados
 * @property Teste[] $testes
 * @property Tpc[] $tpcs
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%professor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 255],
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaturmas()
    {
        return $this->hasMany(Disciplinaturma::className(), ['id_professor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_professor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['id_professor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpcs()
    {
        return $this->hasMany(Tpc::className(), ['id_professor' => 'id']);
    }
}
