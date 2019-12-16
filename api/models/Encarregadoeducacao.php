<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%encarregadoeducacao}}".
 *
 * @property int $id
 * @property int|null $contacto
 * @property string|null $nome
 *
 * @property Aluno[] $alunos
 * @property User $id0
 */
class Encarregadoeducacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%encarregadoeducacao}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contacto'], 'integer'],
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
            'contacto' => 'Contacto',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_encarregado_de_educacao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\EncarregadoeducacaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\EncarregadoeducacaoQuery(get_called_class());
    }
}
