<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%disciplina}}".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Disciplinaturma[] $disciplinaturmas
 * @property Professor[] $professors
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%disciplina}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
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
        return $this->hasMany(Disciplinaturma::className(), ['id_disciplina' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['id_disciplina' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\DisciplinaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\DisciplinaQuery(get_called_class());
    }
}
