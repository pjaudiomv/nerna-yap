<?php
include 'functions.php';
require_once 'vendor/autoload.php';
require_once 'vendor/PHPMailer/Exception.php';
require_once 'vendor/PHPMailer/PHPMailer.php';
require_once 'vendor/PHPMailer/SMTP.php';
use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0; //2 = client and server messages
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465; 
$mail->SMTPAuth = true;
$mail->Username = "FROM@EMAIL.COM";
$mail->Password = "FROM_PASS";
$mail->setFrom('FROM@EMAIL.COM', 'NERNA Admin');
$mail->IsHTML(true);


$serviceBodyConfiguration = getServiceBodyConfiguration(setting("service_body_id"));

if ($serviceBodyConfiguration->primary_contact_enabled) {
    $sid                        = $GLOBALS['twilio_account_sid'];
    $token                      = $GLOBALS['twilio_auth_token'];
    try {
        $client = new Client( $sid, $token );
    } catch ( \Twilio\Exceptions\ConfigurationException $e ) {
        error_log("Missing Twilio Credentials");
    }

    $serviceBodyName = getServiceBody(setting("service_body_id"))->name;
    $serviceBodyEmail = getServiceBody(setting("service_body_id"))->contact_email;
 
    $client->messages->create(
        $serviceBodyConfiguration->primary_contact_number,
        array(
            "from" => $_REQUEST["called_number"],
            "body" => "You have a message from the " . $serviceBodyName . " helpline from caller " . $_REQUEST["caller_number"] . ", " . $_REQUEST["RecordingUrl"]
        )
    );
 
$mail->addStringAttachment(file_get_contents($_REQUEST["RecordingUrl"] . ".wav"), $_REQUEST["RecordingUrl"] . ".wav");
$mail->Subject = "NERNA Voicemail " . $serviceBodyName;
$mail->addAddress($serviceBodyEmail, $serviceBodyName);
$mail->Body = "You have a message from the " . $serviceBodyName . " helpline from caller " . $_REQUEST["caller_number"] . ", " . $_REQUEST["RecordingUrl"];
if (!$mail->send()) {
    error_log( $mail->ErrorInfo );
} else {
    error_log( "Message sent to " . $serviceBodyName );
}
 
}
