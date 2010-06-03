<?php
/*s
delReq.php: sends delete file request to admin
*/

include_once('config.php');
$from="From: <".$adminEmail.">";
$to = $adminEmail;
 $subject = "File Deletion Request";
 $body = "A user would like to delete a file from the Class Repository. Here is the reason:\n".$_POST['delReason'];
 if (mail($to, $subject, $body, $from)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   die("Message delivery failed...");
  }






?>