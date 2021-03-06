<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%aluno}}".
 *
 * @property int $id
 * @property int|null $id_encarregado_de_educacao
 * @property int|null $id_turma
 * @property string|null $nome
 * @property int|null $numero_estudante
 *
 * @property Encarregadoeducacao $encarregadoDeEducacao
 * @property Turma $turma
 * @property User $id0
 * @property RecadoTeacher[] $recados
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%aluno}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id_encarregado_de_educacao', 'id_turma', 'numero_estudante'], 'integer'],
            [['nome'], 'string', 'max' => 255],
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
            'nome' => 'Nome',
            'numero_estudante' => 'Numero Estudante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncarregadoDeEducacao()
    {
        return $this->hasOne(Encarregadoeducacao::className(), ['id' => 'id_encarregado_de_educacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_turma']);
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
        return $this->hasMany(RecadoTeacher::className(), ['id_aluno' => 'id']);
    }

    public static function getSubCatList($cat_id)
    {

        $subCategories = self::find()
            ->select(['id', 'nome as name'])
            ->andWhere(['id_turma' => $cat_id])
            ->asArray()
            ->all();

        return $subCategories;
    }

    public static function getSubCategories($cat_id)
    {
        return self::find()
            ->select(['nome as name', 'id'])
            ->andWhere(['id_turma' => $cat_id])
            ->indexBy('id')
            ->column();
    }
}
