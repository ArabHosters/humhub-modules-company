<?php

class SalarySettingsController extends Controller {

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

    /*
     * apply salary deduction for Late attendance 
     */
    public function actionIndex() {
        $form = new SalarySettings;
        $form->scenario = 'late_attendance';
        $form->late_attendance = HSetting::Get('late_attendance', 'company');
        $form->late_attendance_component = HSetting::Get('late_attendance_component', 'company');
        $form->late_attendance_amount = HSetting::Get('late_attendance_amount', 'company');
        $form->late_attendance_triger = HSetting::Get('late_attendance_triger', 'company');
        $form->late_attendance_from = HSetting::Get('late_attendance_from', 'company');
        $form->late_attendance_to = HSetting::Get('late_attendance_to', 'company');
        $form->late_attendance_note = HSetting::Get('late_attendance_note', 'company');
        $form->late_attendance_amount_fixed = HSetting::Get('late_attendance_amount_fixed', 'company');
        $form->late_attendance_amount_specified = HSetting::Get('late_attendance_amount_specified', 'company');
        
        if (isset($_POST['SalarySettings'])) {
            $_POST['SalarySettings'] = Yii::app()->input->stripClean($_POST['SalarySettings']);
            $form->attributes = $_POST['SalarySettings'];

            if ($form->validate()) {
                $form->late_attendance = HSetting::Set('late_attendance', $form->late_attendance, 'company');
                $form->late_attendance_component = HSetting::Set('late_attendance_component', $form->late_attendance_component, 'company');
                $form->late_attendance_amount = HSetting::Set('late_attendance_amount', $form->late_attendance_amount, 'company');
                $form->late_attendance_amount_fixed = HSetting::Set('late_attendance_amount_fixed', $form->late_attendance_amount_fixed, 'company');
                $form->late_attendance_amount_specified = HSetting::Set('late_attendance_amount_specified', $form->late_attendance_amount_specified, 'company');
                $form->late_attendance_triger = HSetting::Set('late_attendance_triger', $form->late_attendance_triger, 'company');
                $form->late_attendance_from = HSetting::Set('late_attendance_from', $form->late_attendance_from, 'company');
                $form->late_attendance_to = HSetting::Set('late_attendance_to', $form->late_attendance_to, 'company');
                $form->late_attendance_note = HSetting::Set('late_attendance_note', $form->late_attendance_note, 'company');
                // set flash message
                Yii::app()->user->setFlash('data-saved', Yii::t('AdminModule.controllers_SettingController', 'Saved'));

                $this->redirect(Yii::app()->createUrl('//company/salarySettings'));
            }
        }

        $this->render('index', array('model' => $form));
    }
    
    /*
     * apply salary deduction for absence
     */
    public function actionAbsence() {
        $form = new SalarySettings;
        $form->scenario = 'absence';
        $form->absence_add_to = HSetting::Get('absence_add_to', 'company');
        $form->absence_component = HSetting::Get('absence_component', 'company');
        $form->absence_amount = HSetting::Get('absence_amount', 'company');
        $form->absence_triger = HSetting::Get('absence_triger', 'company');
        $form->absence_note = HSetting::Get('absence_note', 'company');
        $form->absence_amount_fixed = HSetting::Get('absence_amount_fixed', 'company');
        $form->absence_amount_specified = HSetting::Get('absence_amount_specified', 'company');
        
        if (isset($_POST['SalarySettings'])) {
            $_POST['SalarySettings'] = Yii::app()->input->stripClean($_POST['SalarySettings']);
            $form->attributes = $_POST['SalarySettings'];

            if ($form->validate()) {
                $form->absence_add_to = HSetting::Set('absence_add_to', $form->absence_add_to, 'company');
                $form->absence_component = HSetting::Set('absence_component', $form->absence_component, 'company');
                $form->absence_amount = HSetting::Set('absence_amount', $form->absence_amount, 'company');
                $form->absence_amount_fixed = HSetting::Set('absence_amount_fixed', $form->absence_amount_fixed, 'company');
                $form->absence_amount_specified = HSetting::Set('absence_amount_specified', $form->absence_amount_specified, 'company');
                $form->absence_triger = HSetting::Set('absence_triger', $form->absence_triger, 'company');
                $form->absence_note = HSetting::Set('absence_note', $form->absence_note, 'company');
                // set flash message
                Yii::app()->user->setFlash('data-saved', Yii::t('AdminModule.controllers_SettingController', 'Saved'));

                $this->redirect(Yii::app()->createUrl('//company/salarySettings/absence'));
            }
        }

        $this->render('absence', array('model' => $form));
    }

    /**
     * Performs the AJAX validation.
     * @param SalaryComponent $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'salary-component-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
