<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8">
    </title></head><body>
    <?php if ($model !== null): ?>
        <table border="1">
            <tr><th>In Time</th><th>Out Time</th><th>Total</th><th>Type</th></tr>
            <?php foreach ($model as $timelog): ?>
                <tr>
                    <td><?php echo $timelog->in_time; ?></td>
                    <td><?php echo $timelog->out_time; ?></td>
                    <td>
                        <?php
                        $timediff = strtotime($timelog->out_time) - strtotime($timelog->in_time);
                        echo Rizer::seconds_to_hours($timediff);
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($timelog->type == 1) {
                            echo 'Working';
                        } else {
                            echo 'Break';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body></html>