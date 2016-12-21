<?php

class EmployeeController extends ContentContainerController {

    
    public function actionIndex() {
        $user = new Employee();
        $this->render('index', array('user' => $user));
    }
    
    public function actionWarnings() {
        $warning = ReportContent::model()->findAllByAttributes(array('object_id'=>  Yii::app()->user->id,'object_model'=>'User'));
        $this->render('warnings', array('warning' => $warning));
    }
    
    public function actionShiftswaps(){
        $user = new Employee();
        $this->render('shiftswap', array('user' => $user));
    }

}
