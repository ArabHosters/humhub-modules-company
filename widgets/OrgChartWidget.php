<?php
/**
 * Description of OrgChartWidget
 *
 * @author nedal
 */
class OrgChartWidget extends HWidget
{

    public $canWrite = true;
    
    public $loadUrl = "";
    public $createUrl = "";
    
    public $selectors = array();
    
    public function init()
    {

        $calendarModule = Yii::app()->getModule('company');

        Yii::app()->clientScript->registerCssFile($calendarModule->getAssetsUrl() . '/orgchart/jquery.orgchart.css');

        Yii::app()->clientScript->registerScriptFile($calendarModule->getAssetsUrl() . '/orgchart/jquery.orgchart.js');
    }

    public function run()
    {

        $this->render('orgchart', array(
            'chart'=>$this->selectors
        ));
    }

}

?>
