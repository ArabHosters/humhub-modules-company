<div class="form-group col-md-10">
        <div class="col-sm-3">
            <?php 
            if($model->isNewRecord){
                echo CHtml::hiddenField(get_class($model)."[$index][_n]");
            }else{
                echo CHtml::hiddenField(get_class($model)."[$index][_u]",$model->primaryKey);
            }
            ?>
            <?php echo CHtml::activeTextField($model, "[$index]amount", array('class' => 'form-control')); ?>
        </div>
        <div class="col-sm-4">
            <?php
            $this->widget('ext.widgets.XJuiDatePicker', array(
                'options' => array(
                    'showAnim' => 'fold',
                ),
                'model' => $model,
                'attribute' => "[$index]effect_date",
                'htmlOptions' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Effective Date'
                ),
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'showButtonPanel' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                ),
            ));
            ?>
        </div>
        <div class="col-sm-5">
            <?php echo CHtml::activeDropDownList($model, "[$index]component_id", CHtml::listData(SalaryComponent::model()->findAllByAttributes(array('type' => 0)), 'id', 'name'), array('empty' => 'Select Component', 'class' => 'form-control')); ?>
        </div>
    </div>