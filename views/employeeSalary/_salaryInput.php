<div class="form-group col-md-10">
    <div class="col-sm-3">
        <?php
        if ($model->isNewRecord) {
            echo CHtml::hiddenField(get_class($model) . "[$index][_n]");
            echo CHtml::hiddenField(get_class($model) . "[$index][_field]", '0',array('class'=>'update-type'));
        } else {
            echo CHtml::hiddenField(get_class($model) . "[$index][_u]", $model->primaryKey);
            echo CHtml::hiddenField(get_class($model) . "[$index][_field]", '1',array('class'=>'update-type'));
        }
        ?>
        <?php echo CHtml::activeTextField($model, "[$index]amount", array('placeholder' => 'Amount', 'class' => 'form-control')); ?>
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
        <?php
        $all_components = SalaryComponent::model()->findAll();
        $components_out = array();
        foreach ($all_components as $component) {
            $type = ($component->type == 0) ? '(Earning)' : '(Deduction)';
            $components_out[$component->id]=$component->name.' '.$type;
        }
        ?>
        <?php echo CHtml::activeDropDownList($model, "[$index]component_id", $components_out, array('empty' => 'Select Component', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group col-md-10">
    <div class="col-md-12">
        <?php echo CHtml::activeTextArea($model, "[$index]details", array('placeholder' => 'Description', 'class' => 'form-control')); ?>
    </div>
</div>