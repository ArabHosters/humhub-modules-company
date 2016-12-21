<?php

class WorkdaysController extends Controller {

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
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'expression' => 'Yii::app()->user->isAdmin()',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $companyModule = Yii::app()->getModule('company');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/required_work_hours.js');
        $model = new User('search');
        $model->super_admin = '';

        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];


        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionSaveWorkDays() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['d'])) {
                $user_days = $_POST['d'];
                $flag = false;
                $month = Yii::app()->request->getPost('month', date('m'));
                $year = Yii::app()->request->getPost('year', date('Y'));
                $curent = $year . "-" . $month;
                foreach ($user_days as $user => $days) {
                    Workdays::model()->deleteAll("user_id =:user_id and DATE_FORMAT( effect_date,  '%Y-%m' ) =:currdate", array(
                        ':user_id' => $user,
                        ':currdate' => $curent
                    ));
                    foreach ($days as $day) {
                        $workday = new Workdays;
                        $workday->user_id = $user;
                        $workday->work_day = $day;
                        if (isset($_POST['mth'][$user]) && isset($_POST['mtm'][$user])) {
                            $workday->min_time = $_POST['mth'][$user] . ":" . $_POST['mtm'][$user] . ":00";
                        }
                        if (isset($_POST['sth'][$user]) && isset($_POST['stm'][$user])) {
                            $workday->start_work = $_POST['sth'][$user] . ":" . $_POST['stm'][$user] . ":00";
                        }
                        if (isset($_POST['bth'][$user]) && isset($_POST['btm'][$user])) {
                            $workday->break_time = $_POST['bth'][$user] . ":" . $_POST['btm'][$user] . ":00";
                        }
                        $workday->effect_date = $curent . "-01";
                        if ($workday->save()) {
                            $flag = true;
                        } else {
                            $flag = false;
                        }
                    }
                }
                if ($flag) {
                    echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong> Something went wrong!</div>';
                }
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Workdays the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Workdays::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Workdays $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'workdays-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
