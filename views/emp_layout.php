<div class="container">
    <div class="row">
        <div class="col-md-2">
            <?php $this->widget('application.modules_core.user.widgets.AccountMenuWidget', array()); ?>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php $this->renderPartial('/emp_menu'); ?>
                </div>
                <div class="panel-body">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>
