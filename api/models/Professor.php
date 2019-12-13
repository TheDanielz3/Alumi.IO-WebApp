<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%professor}}".
 *
 * @property int $id
 * @property int|null $id_disciplina
 * @property string|null $nome
 *
 * @property Disciplina $disciplina
 * @property User $id0
 * @property Recado[] $recados
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
            [['id_disciplina'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id']],
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
            'id_disciplina' => 'Id Disciplina',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
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
     * {@inheritdoc}
     * @return \api\models\query\ProfessorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\ProfessorQuery(get_called_class());
    }
}
