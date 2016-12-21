<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <strong>Fetching</strong> Mail
            </h4>
        </div>
        <div class="modal-body">
            <?php
            $username = HSetting::Get('imapusername', 'mailing');
            $password = HSetting::Get('imappassword', 'mailing');
            $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';

            Yii::import('ext.EIMap.EIMap', true);
            $imap = new EIMap($hostname, $username, $password);

            if ($imap->connect()) {

                $ahly = $imap->searchmails('UNSEEN SUBJECT AlAhliSMS');
                if ($ahly && is_array($ahly)) { // do we have any?
                    foreach ($ahly as $one_email) {
                        $mail = $imap->getMail($one_email);
                        preg_match('/إيداع في حساب(.*) مبلغ(.*) في(.*)/', $mail->textPlain, $matches);
                        $newmail = new Fetchmail;
                        $newmail->mailid = $mail->UID;
                        $newmail->bank = 'AlAhli';
                        $newmail->amount = $matches[2];
                        $newmail->time = $mail->date;
                        $newmail->save();
                    }
                } else {
                    echo 'New new AlAhliSMS trans found <br/>';
                }

                $rajhi = $imap->searchmails('UNSEEN SUBJECT AlRajhiBank');
                if ($rajhi && is_array($rajhi)) { // do we have any?
                    foreach ($rajhi as $one_email) {
                        $mail = $imap->getMail($one_email);
                        preg_match('/تم اضافة (.*) الى حسابك (.*) في (.*) - تحويل/', $mail->textPlain, $matches);
                        $newmail = new Fetchmail;
                        $newmail->mailid = $mail->UID;
                        $newmail->bank = 'AlRajhi';
                        $newmail->amount = $matches[1];
                        $newmail->time = $mail->date;
                        $newmail->save();
                    }
                } else {
                    echo 'New new AlRajhiBank trans found <br/>';
                }


                $imap->close(); // close connection     
            }
            ?>
            <script>
                $('#mail-grid').yiiGridView('update', {
                    data: $(this).serialize()
                });
            </script>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary"
                    data-dismiss="modal"><?php echo Yii::t('CalendarModule.views_entry_edit', 'Close'); ?></button>
            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>