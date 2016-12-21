<?php

class EmployeeSalaryController extends ContentContainerController {

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
     * Lists all models.
     */
    public function actionIndex() {
        $this->checkContainerAccess();
        $user = new Employee();
        $earnings = SalaryComponent::model()->findAllByAttributes(array('type' => 0));
        $deductions = SalaryComponent::model()->findAllByAttributes(array('type' => 1));
        $this->render('index', array('user' => $user, 'earnings' => $earnings, 'deductions' => $deductions));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->checkContainerAccess();
        $user = new Employee();
        if (isset($_POST['EmployeeSalary'])) {
            $has_errors = false;
            $error_message = 'Faild <br/><ul>';
            foreach ($_POST['EmployeeSalary'] as $value) {
                if ($value['amount'] > 0 && $value['amount'] != '' && $value['effect_date'] != '' && $value['component_id'] != '') {
                    if (isset($value['_u'])) {
                        $emp_sal = $value['_u'];
                        $employee_salary = EmployeeSalary::model()->findByPk($emp_sal);
                    } else {
                        $employee_salary = new EmployeeSalary;
                        $employee_salary->emp_id = $user->user->id;
                    }
                    $employee_salary->component_id = $value['component_id'];
                    $employee_salary->amount = $value['amount'];
                    $employee_salary->effect_date = $value['effect_date'];
                    $employee_salary->details = $value['details'];
                    if(!is_numeric($value['amount'])){
                        $has_errors = true;
                        $error_message .= '<li>Amount must be a valid number</li>';
                    }
                    if (isset($value['_u']) && $value['_field'] == '0') {
                        $employee_salary->delete();
                    }else{
                        $employee_salary->save(false);
                    }
                }
                else{
                    $has_errors = true;
                    if($value['amount'] == ''){
                        $error_message .= '<li>Amount missing</li>';
                    }
                    if($value['amount'] < 0){
                        $error_message .= '<li>Amount can not be less than zero</li>';
                    }
                    if($value['effect_date'] == ''){
                        $error_message .= '<li>effect date missing</li>';
                    }
                    if($value['component_id'] == ''){
                        $error_message .= '<li>component missing</li>';
                    }
                }
            }
            $error_message .= '</ul>';
            if (!$has_errors) {
                // set success message
                Yii::app()->user->setFlash('data-saved', 'Saved');
            } else {
                Yii::app()->user->setFlash('data-failed', $error_message);
            }
            $this->refresh();
        }
        $earnings = SalaryComponent::model()->findAllByAttributes(array('type' => 0));
        $deductions = SalaryComponent::model()->findAllByAttributes(array('type' => 1));
        $this->render('admin', array('user' => $user, 'earnings' => $earnings, 'deductions' => $deductions));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EmployeeSalary the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EmployeeSalary::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EmployeeSalary $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employee-salary-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddSalaryInputs() {
        $this->checkContainerAccess();
        if (Yii::app()->request->isAjaxRequest && isset($_GET['index'])) {
            $this->renderPartial('_salaryInput', array(
                'model' => new EmployeeSalary,
                'index' => $_GET['index']
            ));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAddDeductionInputs() {
        $this->checkContainerAccess();
        if (Yii::app()->request->isAjaxRequest && isset($_GET['index'])) {
            $this->renderPartial('_deductionInput', array(
                'model' => new EmployeeSalary,
                'index' => $_GET['index']
            ));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAddEarningInputs() {
        $this->checkContainerAccess();
        if (Yii::app()->request->isAjaxRequest && isset($_GET['index'])) {
            $this->renderPartial('_earningInput', array(
                'model' => new EmployeeSalary,
                'index' => $_GET['index']
            ));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

}
