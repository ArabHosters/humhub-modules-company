<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Employee {

    public $user = null;
    public $profile = null;

    public function __construct($guid = '') {
        if ($guid == "") {
            // Workaround for older version
            $guid = Yii::app()->request->getQuery('uguid');
        }
        $this->user = User::model()->findByAttributes(array('guid' => $guid));
        $this->profile = $this->user->profile;
    }

    public function subordinates() {
        $criteria = new CDbCriteria;

        $criteria->compare('userProfile.emp_supervisor', $this->user->id);
        $criteria->with = 'userProfile';
//        $criteria->join = 'JOIN CompanyStructures s';
        return new CActiveDataProvider('User', array(
            'criteria' => $criteria,
        ));
    }
    public function getsalary($component_id,$curent) {
        $salary = EmployeeSalary::model()->findAll(array(
        'condition' => "emp_id =:user_id and component_id =:component_id and DATE_FORMAT( effect_date,  '%Y-%m' ) =:currdate",
        'params' => array(
            ':user_id' => $this->user->id,
            'component_id'=>$component_id,
            ':currdate' => $curent
        )
    ));
        return $salary;
    }
    
    public function shiftswaps() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'user_id =:user_id or swap_with=:swap_with';
        $criteria->params = array(':user_id'=>$this->user->id,':swap_with'=>$this->user->id);
        //$criteria->compare('status', 'Pending');
        return new CActiveDataProvider('WorkdaysSwap', array(
            'criteria' => $criteria,
        ));
    }
    
    public function loadModel($id) {
        $model = WorkdaysSwap::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        WorkdaysSwapdays::model()->deleteAll('Workdays_swap =:Workdays_swap', array(':Workdays_swap'=>$id));
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

}
