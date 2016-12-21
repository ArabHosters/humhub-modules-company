<?php
/* @var $this JobTitlesController */
/* @var $model JobTitles */

$this->breadcrumbs = array(
    'Job Titles' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List JobTitles', 'url' => array('index')),
    array('label' => 'Create JobTitles', 'url' => array('create')),
    array('label' => 'Update JobTitles', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete JobTitles', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Job Title #<?php echo $model->id; ?></h1>
<div class="row">
    <div class="col-md-12">
        <b>Job Code:</b>
    </div>
    <div class="col-md-12">
        <?php echo $model->code; ?>
    </div>
    <div class="col-md-12">
        <b>Job Title:</b>
    </div>
    <div class="col-md-12">
        <?php echo $model->name; ?>
    </div>
    <div class="col-md-12">
        <b>Job description:</b>
    </div>
    <div class="col-md-12">
        <?php echo nl2br($model->description); ?>
    </div>
    <div class="col-md-12">
        <b>Job specification:</b>
    </div>
    <div class="col-md-12">
        <?php echo nl2br($model->specification); ?>
    </div>
</div>
