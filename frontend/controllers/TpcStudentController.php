<?php

namespace frontend\controllers;

use app\models\Aluno;
use app\models\Disciplinaturma;
use Yii;
use app\models\TpcStudent;
use app\models\TpcStudentSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TpcStudentController implements the CRUD actions for TpcStudent model.
 */
class TpcStudentController extends Controller
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
     * Lists all TpcStudent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TpcStudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TpcStudent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $currentStudent =  Aluno::find()->andWhere('id=' . \Yii::$app->user->id)->one();
        $currentDisciplinasTurmas = Disciplinaturma::find()->andWhere(['id_turma' => $currentStudent->id_turma])->all();

        for ($i = 0; $i < count($currentDisciplinasTurmas); $i++){
            $currentDisciplinasTurmasIDS[$i] = $currentDisciplinasTurmas[$i]->id;
        }

        if (!in_array($this->findModel($id)->id_disciplina_turma,$currentDisciplinasTurmasIDS)) {
            throw new ForbiddenHttpException("You don't have permission do view this TPC");
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the TpcStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TpcStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TpcStudent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
