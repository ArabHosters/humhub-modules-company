<?php

class CandidatesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '/_layout';
    public $subLayout = "application.modules_core.admin.views._layout";

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Candidates;
        $lastfile = '';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Candidates'])) {
            $model->attributes = $_POST['Candidates'];
            $model->content->user_id = Yii::app()->user->id;
            // Handle uploaded files. array_filter removes empty elements.
            $pre_files = array_filter(explode(",", Yii::app()->request->getParam('fileList')));
            $has_files = ((count($pre_files) > 0));
            $lastfile = array_pop($pre_files);
            // Validate and save item. At least one file needs to be attached.
            if ($model->validate()) {
                if (!$has_files) {
                    $model->addError('file', Yii::t('LibraryModule.base', 'You must upload a file.'));
                }
                if ($has_files && $model->validate()) {
                    $model->save();
                    // Attach the uploaded file. If multiple were uploaded, just attach the last one.
                    // TODO: Fix the ugly mess with multiple uploaded files.
                    File::attachPrecreated($model, $lastfile);
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Candidates'])) {
            $model->attributes = $_POST['Candidates'];
            $files = File::getFilesOfObject($model);
            $has_files = (count($files) > 0);
            $keep_file = array_pop($files);
            foreach ($files as $file)
                $file->delete();
            // Validate and save item. At least one file needs to be attached with documents. Links don't have a file.
            if (isset($_POST['Candidates']) && !$has_files)
                $model->addError('file', Yii::t('LibraryModule.base', 'You must upload a file.'));
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Candidates('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Candidates']))
            $model->attributes = $_GET['Candidates'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Candidates the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Candidates::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Candidates $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'candidates-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
