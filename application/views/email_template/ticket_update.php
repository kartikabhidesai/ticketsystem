<div style="width:100%; margin:0px; padding: 0px;">
    <!-- main -->
    <div style="padding: 48px;">
        <div style="width: 560px; margin: 0 auto; display: block; box-shadow: 0px 0px 14px 0px rgba(142, 140, 140, 0.67); background: #fff; padding: 48px;">
            <!-- wrapper -->
            <p style=""><img src="<?php echo IMAGES.'logo.png'; ?>" style="display: block;margin: 0 auto; text-align: center; width: 200px;padding: 10px;"></p>
            <div style="background: linear-gradient(#fff,rgba(222, 13, 0, 0.16)); box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.33); padding: 16px;">
                    <p>Hello ,<br><br></p>
                    <p>Ticket# <?php echo $ticketDetial->ticket_code; ?></p>
                    <p>Status# <?= $ticketDetial->status ?></p>
                    <p>Subject# <?php echo $ticketDetial->subject; ?></p>
                    <p>Replay# <?php echo $replay; ?></p>
                    <p>Regards,</p>
                    <p>Technical Support<br>The <?php echo PROJECT_NAME; ?> Team<br></p>

            </div>
            <!-- content over -->
        </div>
        <!-- wrapper over -->
    </div>
</div>