<?php
$form_page_name = str_replace('.html','', basename($_SERVER['HTTP_REFERER']));

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$subjects = $_REQUEST['subject'];
$message = $_REQUEST['message'];

$to = "info@cnelindia.com";
$subject = "CNELINDIA: Contact Us";

$message = "<html>
<head>
<title>Contact Us Details</title>
</head>
<body>
<table>
<tr>
    <td>Name: </td> <td>".$username."</td>
</tr>
<tr>
    <td>Email: </td> <td>".$email."</td>
</tr>
<tr>
    <td>Subject: </td> <td>".$subjects."</td>
</tr>
<tr>
    <td>Message: </td> <td>".$message."</td>
</tr>
<tr>
    <td>User IP: </td> <td>".get_client_ip()."</td>
</tr>
<tr>
    <td>Form Page Name: </td> <td>".$form_page_name."</td>
</tr>
</table>
</body>
</html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:'.$username.' <info@cnelindia.com>' . "\r\n";
$headers .= 'Reply-To: '.$email . "\r\n";

if(mail($to,$subject,$message,$headers))
{
   echo "<script>";
   echo 'window.location.replace("thankyou.html");';
   echo "</script>";
}
else
{
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