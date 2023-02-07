<?php

namespace app\controllers;

use app\common\controllers\WebController;
use app\models\Due;
use app\models\DueSearch;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * DueController implements the CRUD actions for Due model.
 */
class DueController extends WebController{

	/**
	 * @inheritDoc
	 */
	public function behaviors(){
		return array_merge(
			parent::behaviors(),
			[
				'verbs' => [
					'class'   => VerbFilter::className(),
					'actions' => [
						'delete' => ['POST'],
					],
				],
			]
		);
	}

	/**
	 * Lists all Due models.
	 *
	 * @return string
	 */
	public function actionIndex(){
		$searchModel  = new DueSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Due model.
	 *
	 * @param int $id ID
	 *
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id){
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Due model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return string|\yii\web\Response
	 */
	public function actionCreate(){
		$model = new Due();

		if ($this->request->isPost){
			if ($model->load($this->request->post()) && $model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
		}else{
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Due model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param int $id ID
	 *
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id){
		$model = $this->findModel($id);

		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()){
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Due model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param int $id ID
	 *
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id){
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Due model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $id ID
	 *
	 * @return Due the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id){
		if (($model = Due::findOne(['id' => $id])) !== NULL){
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
