<meta name="robots" content="noindex" />
<meta http-equiv="refresh" content="3;URL='https://fourty60.net/equitysolutions.com/'" />
<?php
require 'contact-form/Exception.php';require 'contact-form/PHPMailer.php';require 'contact-form/SMTP.php';require 'contact-form/OAuth.php';use PHPMailer\PHPMailer\PHPMailer;use PHPMailer\PHPMailer\Exception;
$gSmtp = "smtp.gmail.com"; $gMail = "fahad@pentagoat.com"; $gPass = "qzim vbmp arng xbck"; $gSender = "New Inquiry!";
$yStmp = "smtp.mail.yahoo.com"; $yMail = "fahad@pentagoat.com"; $yPass = "qzim vbmp arng xbck"; $ySender = "New Inquiry!";
$myEmail = "fahad@pentagoat.com";
$emailSubject = "Enquiry - New Mail";
$errorMsg = 'Error. We couldnt recieve the message. Please contact us on <a href="mailto:'.$myEmail.'">'.$myEmail.'</a>';
$successMsg = '<div class="alert alert-success" style="margin:0;"><strong>Success!</strong> Message sent successfully. Someone from our team will revert back as soon as possible.</div>';
$dateVar = date(DATE_RFC2822);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$addinfo = $_POST['addinfo'];
$checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : '';
$checkbox2 = isset($_POST['checkbox2']) ? $_POST['checkbox2'] : '';
$checkbox3 = isset($_POST['checkbox3']) ? $_POST['checkbox3'] : '';
$checkbox4 = isset($_POST['checkbox4']) ? $_POST['checkbox4'] : '';
$checkbox5 = isset($_POST['checkbox5']) ? $_POST['checkbox5'] : '';
$validation = "";
$filename = "cgi.html";
$iferror = "<ul><li>$dateVar</li><li>$name</li><li>$phone</li><li>$email</li><li>$message</li><li>$addinfo</li><li>$checkbox1</li><li>$checkbox2</li><li>$checkbox3</li><li>$checkbox4</li><li>$checkbox5</li><li>$subject</li><li>Error</li></ul>";
$ifsuccess = "<ul><li>$dateVar</li><li>$name</li><li>$phone</li><li>$email</li><li>$message</li><li>$addinfo</li><li>$checkbox1</li><li>$checkbox2</li><li>$checkbox3</li><li>$checkbox4</li><li>$checkbox5</li><li>$subject</li><li>Success</li></ul>";



if(isset($_POST['subject'])){$validation  = $_POST['subject'];} 
$email_content = "";
if($name !=''){$email_content .= "<b>Name: </b>".$name."<br/>";}
if($email !=''){$email_content .= "<b>Email ID: </b>".$email."<br/>";}

if($phone !=''){$email_content .= "<b>Phone Number: </b>".$phone."<br/>";}
if($message !=''){$email_content .= "<b>Message: </b>".$message."<br/><br/>";}
if (isset($checkbox1) && $checkbox1 != '') {
    $email_content .= "<b>Checkbox 1: </b>" . htmlspecialchars($checkbox1) . "<br/><br/>";
}

if (isset($checkbox2) && $checkbox2 != '') {
    $email_content .= "<b>Checkbox 2: </b>" . htmlspecialchars($checkbox2) . "<br/><br/>";
}


if (isset($checkbox3) && $checkbox3 != '') {
    $email_content .= "<b>Checkbox 3: </b>" . htmlspecialchars($checkbox3) . "<br/><br/>";
}


if (isset($checkbox4) && $checkbox4 != '') {
    $email_content .= "<b>Checkbox 4: </b>" . htmlspecialchars($checkbox4) . "<br/><br/>";
}


if (isset($checkbox5) && $checkbox5 != '') {
    $email_content .= "<b>Checkbox 5: </b>" . htmlspecialchars($checkbox5) . "<br/><br/>";
}
if($addinfo !=''){$email_content .= "<b>Additional Information: </b>".$addinfo."<br/>";}
if($subject !=''){$email_content .= "<b>Security Question: </b>".$subject."<br/><br/>";}


// File upload handling
$file_tmp_name = $_FILES['uploadedFile']['tmp_name'];
$file_name = $_FILES['uploadedFile']['name'];
$file_size = $_FILES['uploadedFile']['size'];
$file_error = $_FILES['uploadedFile']['error'];



if($validation == '6') {
if($email_content !=''){
$email_content .= 'Click on this Email or Phone Number to respond to them quickly. <br/><br/> <p><font size="1" color="#c4c4c4">This is an auto-generated email. AWS or Gmail, does not hold any control or responsibility of the content provided. For more details, you can contact your service provider.</font></p>';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = $gSmtp;
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = $gMail;
$mail->Password = $gPass;
//from
$mail->setFrom($gMail, $gSender);
$mail->Subject = $emailSubject;;
$mail->Body = $email_content;
//to
$mail->AddAddress($myEmail);
$mail->AddBcc($gMail);
	
	// Attach the uploaded file
        if ($file_error === 0) {
            $mail->addAttachment($file_tmp_name, $file_name);
        }

if(!$mail->Send()) {
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = $yStmp;
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = $yMail;
$mail->Password = $yPass;
//from
$mail->setFrom($yMail, $ySender);
$mail->Subject = $emailSubject;;
$mail->Body = $email_content;
//to
$mail->AddAddress($myEmail);
$mail->AddBcc($yMail);
if(!$mail->Send()) {echo $errorMsg;
    file_put_contents($filename, $iferror.PHP_EOL , FILE_APPEND | LOCK_EX);
}
else{echo $successMsg;include('');
file_put_contents($filename, $ifsuccess.PHP_EOL , FILE_APPEND | LOCK_EX);
}}
else {echo $successMsg;('include_path = index.php');
file_put_contents($filename, $ifsuccess.PHP_EOL , FILE_APPEND | LOCK_EX);
}
}
else{echo $errorMsg;
    file_put_contents($filename,$iferror.PHP_EOL , FILE_APPEND | LOCK_EX);
}
}
else{
echo $errorMsg;
file_put_contents($filename,$iferror.PHP_EOL , FILE_APPEND | LOCK_EX);
}
    
?>
