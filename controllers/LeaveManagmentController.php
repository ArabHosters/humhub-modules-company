<?php

class LeaveManagmentController extends ContentContainerController {

    public function actionIndex() {
        $this->checkContainerAccess();
        $this->render('index');
    }

    public function actionLoadAjax()
    {
        $output = array();

        $startDate = new DateTime(Yii::app()->request->getParam('start'));
        $endDate = new DateTime(Yii::app()->request->getParam('end'));

        $entries = EmployeeLeaves::getContainerEntriesByRange($startDate, $endDate, $this->contentContainer);

        foreach ($entries as $entry) {
            $output[] = $entry->getFullCalendarArray();
        }

        echo CJSON::encode($output);
    }
}
