<?php
/* @var $this CompanyStructuresController */
/* @var $model CompanyStructures */

$this->breadcrumbs = array(
    'Company Structures' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Company Structures', 'url' => array('index')),
    array('label' => 'Create Company Structures', 'url' => array('create')),
    array('label' => 'Update Company Structures', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Company Structures', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Company Structures #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'description',
        'address',
        'type',
        array(
            'label' => 'Country',
            'value' => isset($model->compan_country->name) ? $model->compan_country->name : 'No country assigned',
        ),
        array(
            'label' => 'Parent',
            'value' => isset($model->parent_company->title) ? $model->parent_company->title : 'No Parent',
        )
    ),
));
?>
<?php if ($model->type == 'Team' || $model->type == 'Department'): ?>
<h4>Members</h4>
    <ul class="media-list">
        <?php
        if ($model->type == 'Team') {
            foreach ($model->teamMembers as $member) {
                $user = $member->user;
                ?>
                <li>
                    <a href="<?php echo $user->getUrl(); ?>">

                        <div class="media">
                            <img class="media-object img-rounded pull-left"
                                 src="<?php echo $user->getProfileImage()->getUrl(); ?>" width="50"
                                 height="50" alt="50x50" data-src="holder.js/50x50"
                                 style="width: 50px; height: 50px;">


                            <div class="media-body">
                                <h4 class="media-heading"><?php echo CHtml::encode($user->displayName); ?></h4>
                                <h5><?php echo CHtml::encode($user->profile->title); ?></h5>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
        }
        if ($model->type == 'Department') {
            foreach ($model->departmentMembers as $member) {
                $user = $member->user;
                ?>
                <li>
                    <a href="<?php echo $user->getUrl(); ?>">

                        <div class="media">
                            <img class="media-object img-rounded pull-left"
                                 src="<?php echo $user->getProfileImage()->getUrl(); ?>" width="50"
                                 height="50" alt="50x50" data-src="holder.js/50x50"
                                 style="width: 50px; height: 50px;">


                            <div class="media-body">
                                <h4 class="media-heading"><?php echo CHtml::encode($user->displayName); ?></h4>
                                <h5><?php echo CHtml::encode($user->profile->title); ?></h5>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
<?php endif; ?>
