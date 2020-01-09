<?php

namespace api\models;

use api\models\query\TpcQuery;
use app\mosquitto\phpMQTT;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%tpc}}".
 *
 * @property int $id
 * @property string $descricao
 * @property int $id_disciplina_turma
 * @property int $id_professor
 *
 * @property Disciplinaturma $disciplinaTurma
 * @property Professor $professor
 */
class Tpc extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tpc}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'id_disciplina_turma'], 'required'],
            [['id_disciplina_turma', 'id_professor'], 'integer'],
            [['descricao'], 'string', 'max' => 45],
            [['id_disciplina_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplinaturma::className(), 'targetAttribute' => ['id_disciplina_turma' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'id_disciplina_turma' => 'Id Disciplina Turma',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'id_professor',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDisciplinaTurma()
    {
        return $this->hasOne(Disciplinaturma::className(), ['id' => 'id_disciplina_turma']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id' => 'id_professor']);
    }

    /**
     * {@inheritdoc}
     * @return TpcQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TpcQuery(get_called_class());
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $myObj = new Tpc();

        $myObj->id = $this->id;
        $myObj->descricao = $this->descricao;
        $myObj->id_disciplina_turma = $this->id_disciplina_turma;
        $myObj->id_professor = $this->id_professor;
        $myJSON = Json::encode($myObj);

        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id = $this->id;
        $myObj= new Tpc();
        $myObj->id=$prod_id;
        $myJSON = Json::encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg){
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = uniqid(); // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }
}
