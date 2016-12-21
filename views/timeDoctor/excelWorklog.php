<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8">
    </title></head><body>
    <?php if ($model !== null): ?>
        <table border="1">
            <tr><th>Task name</th><th>project name</th><th>Time Worked</th></tr>
            <?php foreach ($model as $value): ?>
                <tr>
                    <td><?php echo $value['task_name']; ?></td>
                    <td><?php echo $value['project_name']; ?></td>
                    <td><?php echo Rizer::seconds_to_hours($value['length']); ?> Hours</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body></html>