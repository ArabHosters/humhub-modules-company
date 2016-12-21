<?php

class PayrollController extends Controller {

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
        $month = Yii::app()->request->getParam('month', date('m'));
        $year = Yii::app()->request->getParam('year', date('Y'));
        $curent = $year . "-" . $month;
        if (isset($_POST['month'])) {
            $components = SalaryComponent::model()->findAll();
            $users = User::model()->findAll();
            Yii::app()->request->sendFile('payroll-' . $curent . '.xls', $this->renderPartial('excelPayroll', array(
                        'components' => $components,
                        'users' => $users,
                        'curent' => $curent
                            ), true)
            );
        }
        $this->render('index');
    }

}
