<?php 
//print_r($postData);
print_r($data);
exit;
?>
<div style="height: 7px; background-color: #535353;"></div>

<div style="background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;"><div style="text-align:center; font-size:24px; font-weight:bold; color:#535353;">Ticket <?php echo $postData['status']; ?></div>

<div style="border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;"><p>Hello <?php echo $postData['client_email']; ?>,<br><br></p>

<p>Your ticket has been opened with us.<br><br>Ticket #<?php echo $postData['ticket_code']; ?><br>Status : Open<br><br>Click on the below link to see the ticket details and post additional comments.<br><br><big><b><a href="<?php echo $postData['link']; ?>">View Ticket</a></b></big><br><br>Regards,</p>
<p>Technical Support<br>The <?php echo PROJECT_NAME; ?> Team<br></p>

</div>

</div>