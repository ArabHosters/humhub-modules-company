<?php

class SupervisorController extends Controller {

    public $subLayout = "_layout";

    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'users' => array('@', (HSetting::Get('allowGuestAccess', 'authentication_internal')) ? "?" : "@"),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $model = new EmployeeLeaves();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EmployeeLeaves']))
            $model->attributes = $_GET['EmployeeLeaves'];
        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    public function actionShiftswap() {
        $model = new WorkdaysSwap();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['WorkdaysSwap']))
            $model->attributes = $_GET['WorkdaysSwap'];
        $this->render('shiftswap', array(
            'model' => $model,
        ));
    }
    
    public function actionManage() {
        $user = new Employee(Yii::app()->user->guid);
        $this->render('manage', array('user' => $user));
    }

    public function actionReport() {
        $json = array();
        $json['success'] = false;

        $userId = (int) Yii::app()->request->getParam('id');
        $user = User::model()->findByPk($userId);
        $form = new ReportReasonForm();

        if (isset($_POST['ReportReasonForm'])) {
            $_POST['ReportReasonForm'] = Yii::app()->input->stripClean($_POST['ReportReasonForm']);
            $form->attributes = $_POST['ReportReasonForm'];
            if ($form->validate()) {

                $report = new ReportContent();
                $report->content->user_id = Yii::app()->user->id;
                $report->created_by = Yii::app()->user->id;
                $report->reason = $form->reason;
                $report->object_model = 'User';
                $report->object_id = $form->object_id;
                $report->save();
                $this->renderModalClose();
                $json['success'] = true;
                return;
            }
        }
        $this->renderPartial('report', array(
            'object' => $user,
            'model' => new ReportReasonForm()
                ), false, true);
    }

}
