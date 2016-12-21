<?php

// var testData = [
//    {id: 1, name: 'My Organization', parent: 0},
//    {id: 2, name: 'CEO Office', parent: 1},
//    {id: 3, name: 'Division 1', parent: 1},
//    {id: 4, name: 'Division 2', parent: 1},
//    {id: 6, name: 'Division 3', parent: 1},
//    {id: 7, name: 'Division 4', parent: 1},
//    {id: 8, name: 'Division 5', parent: 1},
//    {id: 5, name: 'Sub Division', parent: 3},
//];
$charts = CompanyStructures::model()->findAll();
$chart = array();
foreach ($charts as $key => $value) {
    $chart[] = array(
        'id' => $value->id,
        'name' => $value->title,
        'parent' => ($value->parent == NULL) ? 0 : $value->parent,
    );
}

$this->widget('application.modules.company.widgets.OrgChartWidget', array(
    'selectors' => CJSON::encode($chart)
));
?>