<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property int $id
 * @property int $id_Encarregado_de_educação
 * @property int $id_Turma
 *
 * @property User $id0
 * @property EncarregadoEducacao $encarregadoDeEducação
 * @property Turma $turma
 * @property Recado[] $recados
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_Encarregado_de_educação', 'id_Turma'], 'required'],
            [['id', 'id_Encarregado_de_educação', 'id_Turma'], 'integer'],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['id_Encarregado_de_educação'], 'exist', 'skipOnError' => true, 'targetClass' => EncarregadoEducacao::className(), 'targetAttribute' => ['id_Encarregado_de_educação' => 'id']],
            [['id_Turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_Turma' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Encarregado_de_educação' => 'Id Encarregado De Educação',
            'id_Turma' => 'Id Turma',
        ];
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
    public function getEncarregadoDeEducação()
    {
        return $this->hasOne(EncarregadoEducacao::className(), ['id' => 'id_Encarregado_de_educação']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_Turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_Aluno' => 'id']);
    }
}
