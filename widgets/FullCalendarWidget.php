<?php

/**
 * HumHub
 * Copyright © 2014 The HumHub Project
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 */

/**
 * Description of FullCalendarWidget
 *
 * @author luke
 */
class FullCalendarWidget extends HWidget
{

    public $canWrite = false;
    
    public $loadUrl = "";
    public $createUrl = "";
    
    public $selectors = array();
    public $filters = array();
    
    public function init()
    {

        $companyModule = Yii::app()->getModule('company');

        Yii::app()->clientScript->registerCssFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.css');
        Yii::app()->clientScript->registerCssFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.print.css', 'print');

        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lib/moment.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lib/jquery-ui.custom.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/fullcalendar.min.js');
        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar/lang-all.js');

        Yii::app()->clientScript->registerScriptFile($companyModule->getAssetsUrl() . '/fullcalendar.js');
        
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarCanWrite', $this->canWrite ? 'true' : 'false');
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarTimezone', date_default_timezone_get());
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarLanguage', Yii::app()->language);
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarLoadUrl', $this->loadUrl);
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarCreateUrl', $this->createUrl);
        
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarSelectors', CHtml::encode(join(",",$this->selectors)));
        Yii::app()->clientScript->setJavascriptVariable('fullCalendarFilters', CHtml::encode(join(",",$this->filters)));
    }

    public function run()
    {

        $this->render('fullCalendar');
    }

}

?>
