<div class="panel panel-default">
    <div
        class="panel-heading">Warnings</div>

    <div class="panel-body">

        <?php
        if(!empty($warning)){
            echo '<ol>';
            foreach ($warning as $warn) {
                echo '<li>'.$warn->reason.' by - '.$warn->user->displayName.'</li>';
            }
            echo '</ol>';
        }else{
            echo 'You have no warnings';
        }
        ?>

    </div>
</div>