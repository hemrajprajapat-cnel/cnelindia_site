<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone_number = $_REQUEST['phone_number'];
$profile = $_REQUEST['profile'];

// recipient email address
$to = "info@cnelindia.com";

// subject of the email
$subject = "CNELINDIA: Hire Developers";

//file upload

$dir_path = dirname(__FILE__);

if (!file_exists($dir_path.'/resume_cv')) {
    mkdir($dir_path.'/resume_cv', 0777, true);
}

$uploaddir = 'resume_cv/';
$uploadfile_hwe = $uploaddir .str_replace(' ','-',$name).'_'.time().basename($_FILES['resume_cv']['name']);

//upload file in folder.
move_uploaded_file($_FILES['resume_cv']['tmp_name'], $uploadfile_hwe);

$file = $uploadfile_hwe;


// from
$from = 'info@cnelindia.com';
$fromName = $name;

// Email body content 
$htmlContent = " <html>
<head>
<title>Hire Developers Details</title>
</head>
<body>
<table>
<tr>
    <td>Name: </td> <td>".$name."</td>
</tr>
<tr>
    <td>Email: </td> <td>".$email."</td>
</tr>
<tr>
    <td>Phone Number: </td> <td>".$phone_number."</td>
</tr>
<tr>
    <td>Profile: </td> <td>".$profile."</td>
</tr>
<tr>
    <td>User IP: </td> <td>".get_client_ip()."</td>
</tr>
</table>
</body>
</html>"; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">";
$headers .= "\nReply-To: ".$email; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $email; 

// send email
if (mail($to, $subject, $message, $headers, $returnpath)) {
    echo "<script>";
    echo 'window.location.replace("thankyou.html");';
    echo "</script>";
} else {
    echo "<script>";
    echo 'window.location.replace("thankyou.html");';
    echo "</script>";
}


////get user ip
function get_client_ip() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
die();        
?>