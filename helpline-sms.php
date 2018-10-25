<?php
include 'config.php';
include 'functions.php';
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

try {
    $sid                        = $GLOBALS['twilio_account_sid'];
    $token                      = $GLOBALS['twilio_auth_token'];

    try {
        $client = new Client( $sid, $token );
    } catch ( \Twilio\Exceptions\ConfigurationException $e ) {
        log_debug("Missing Twilio Credentials");
    }

    if (isset( $_REQUEST["OriginalCallerId"] )) {
        $original_caller_id = $_REQUEST["OriginalCallerId"];
    }

    $service_body = getServiceBodyCoverage( $_REQUEST['Latitude'], $_REQUEST['Longitude'] );
    $serviceBodyConfiguration   = getServiceBodyConfiguration($service_body->id);
    $tracker                    = !isset( $_REQUEST["tracker"] ) ? 0 : $_REQUEST["tracker"];

    if ($serviceBodyConfiguration->sms_routing_enabled) {
        $phone_numbers = explode(',', getHelplineVolunteer( $serviceBodyConfiguration->service_body_id, $tracker, $serviceBodyConfiguration->sms_strategy, VolunteerType::SMS ));

        $client->messages->create(
            $original_caller_id,
            array(
                "body" => word('your_request_has_been_received'),
                "from" => $_REQUEST['To']
            ) );

        foreach ($phone_numbers as $phone_number) {
            if ($phone_number == SpecialPhoneNumber::UNKNOWN) {
                $phone_number = $serviceBodyConfiguration->primary_contact_number;
            }

            $client->messages->create(
                $phone_number,
                array(
                    "body" => word('helpline') . ": " . word('someone_is_requesting_sms_help_from') . " " . $original_caller_id . ", " . word('please_call_or_text_them_back'),
                    "from" => $_REQUEST['To']
                ) );
        }
    }
} catch ( Exception $e ) {
    $client->messages->create(
        $original_caller_id,
        array(
            "body" => word('could_not_find_a_volunteer'),
            "from" => $_REQUEST['To']
        ) );
}
