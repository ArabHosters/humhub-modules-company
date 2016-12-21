<form method="post">
     <input type="hidden" name="<?php echo Yii::app()->request->csrfTokenName; ?>" value="<?php echo Yii::app()->request->csrfToken; ?>" />
    <div class="form-group">
        <?php
        $month = Yii::app()->request->getParam('month', date('m'));
        $year = Yii::app()->request->getParam('year', date('Y'));
        $curent = $year . "-" . $month;
        ?>
        <div class="col-md-2">
            <?php
            echo CHtml::dropDownList('month', $month, array(
                '01' => 'Jan.',
                '02' => 'Feb.',
                '03' => 'Mar.',
                '04' => 'Apr.',
                '05' => 'May',
                '06' => 'Jun.',
                '07' => 'Jul.',
                '08' => 'Aug.',
                '09' => 'Sep.',
                '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.'), array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-2">
            <?php
            $years = array_combine(range(date("Y"), 2020), range(date("Y"), 2020));
            echo CHtml::dropDownList('year', $year, $years, array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-2">
            <input type="submit" value="GO" class="btn btn-info" />
        </div>
    </div>
</form>