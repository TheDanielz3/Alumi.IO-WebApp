<?php

namespace frontend\controllers;

use app\models\Aluno;
use app\models\Disciplinaturma;
use Yii;
use app\models\TesteStudent;
use app\models\TesteStudentSeach;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TesteStudentController implements the CRUD actions for TesteStudent model.
 */
class TesteStudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['student', 'admin'],
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all TesteStudent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TesteStudentSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TesteStudent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {
        $currentStudent =  Aluno::find()->andWhere('id=' . \Yii::$app->user->id)->one();
        $currentDisciplinasTurmas = Disciplinaturma::find()->andWhere(['id_turma' => $currentStudent->id_turma])->all();

        for ($i = 0; $i < count($currentDisciplinasTurmas); $i++){
            $currentDisciplinasTurmasIDS[$i] = $currentDisciplinasTurmas[$i]->id;
        }

        if (!in_array($this->findModel($id)->id_disciplina_turma,$currentDisciplinasTurmasIDS)) {
            throw new ForbiddenHttpException("You don't have permission do view this Teste");
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the TesteStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TesteStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TesteStudent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
