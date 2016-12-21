<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter      
                </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => $this->createUrl('filter'),
                        'method' => 'get',
                        'id' => 'filter-form'
                    ));
                    ?>
                    <div class="form-group">
                        <div class="radio"><label><input id="rdb1" class="toggler" type="radio" name="filter_by" value="1" />Company</label></div>
                        <div class="radio"><label><input id="rdb3" class="toggler" type="radio" name="filter_by" value="3" />Department</label></div>
                        <div class="radio"><label><input id="rdb4" class="toggler" type="radio" name="filter_by" value="4" />Team</label></div>
                        <div class="radio"><label><input id="rdb2" class="toggler" type="radio" name="filter_by" value="2" />Employee</label></div>
                    </div>
                    <div id="blk-1" class="form-group options">
                        <?php echo CHtml::label('Company', 'company_id'); ?>
                        <?php
                        $comanies_list = CHtml::listData(CompanyStructures::model()->findAllByAttributes(array('type' => 'Company')), 'id', 'title');
                        $company_selected = '';

                        echo CHtml::dropDownList(
                                'company_id', $company_selected, $comanies_list, array(
                            'empty' => 'Select Company',
                            'key' => 'company_id',
                            'class' => 'form-control'
                                )
                        );
                        ?>
                    </div>
                    <div id="blk-3" class="form-group options">
                        <?php echo CHtml::label('Department', 'dept_id'); ?>
                        <?php
                        $dept_list = CHtml::listData(CompanyStructures::model()->findAllByAttributes(array('type' => 'Department')), 'id', 'title');
                        $dept_selected = '';
                        echo CHtml::dropDownList(
                                'dept_id', $dept_selected, $dept_list, array(
                            'empty' => 'Select Department',
                            'key' => 'dept_id',
                            'class' => 'form-control'
                                )
                        );
                        ?>
                    </div>
                    <div id="blk-4" class="form-group options">
                        <?php echo CHtml::label('Team', 'team_id'); ?>
                        <?php
                        $team_list = CHtml::listData(CompanyStructures::model()->findAllByAttributes(array('type' => 'Team')), 'id', 'title');
                        $team_selected = '';
                        echo CHtml::dropDownList(
                                'team_id', $team_selected, $team_list, array(
                            'empty' => 'Select Team',
                            'key' => 'team_id',
                            'class' => 'form-control'
                                )
                        );
                        ?>
                    </div> 
                    <div id="blk-2" class="form-group options">
                        <?php echo CHtml::label('Employee', 'user_id'); ?>
                        <?php
                        $user_list = CHtml::listData(User::model()->findAll(), 'id', 'displayName');
                        echo CHtml::dropDownList(
                                'user_id', '', $user_list, array(
                            'empty' => 'Select User',
                            'key' => 'user_id',
                            'class' => 'form-control'
                                )
                        );
                        ?>
                    </div> 
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Filter', array('class' => 'btn btn-success')); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('toggleassign', "
    $('.options').hide();
$('.toggler').click(function(){
            $('.options').hide();
            $('#blk-'+$(this).val()).show('slow');
    });
");
