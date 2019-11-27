<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "aluno".
 *
 * @property int $id
 * @property int $id_encarregado_de_educacao
 * @property int $id_turma
 *
 * @property Encarregadoeducacao $encarregadoDeEducacao
 * @property Turma $turma
 * @property User $id0
 * @property Recado[] $recados
 */
class Aluno extends ActiveRecord
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
            [['id_encarregado_de_educacao', 'id_turma'], 'integer'],
            [['id_encarregado_de_educacao'], 'exist', 'skipOnError' => true, 'targetClass' => Encarregadoeducacao::className(), 'targetAttribute' => ['id_encarregado_de_educacao' => 'id']],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id']],
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
            'id_encarregado_de_educacao' => 'Id Encarregado De Educacao',
            'id_turma' => 'Id Turma',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getEncarregadoDeEducacao()
    {
        return $this->hasOne(Encarregadoeducacao::className(), ['id' => 'id_encarregado_de_educacao']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_turma']);
    }

    /**
     * @return ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_aluno' => 'id']);
    }
}
