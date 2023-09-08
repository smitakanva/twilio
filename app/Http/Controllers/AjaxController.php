<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;

class AjaxController extends Controller
{
    public function myPost()
    {
        return view('my-post');
    }

    public function callRackSpaceApi()
    {
       
        return view('reckspaceApi');
    }

    public function fetchEmail(){
        $apiKey = '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';

        $sg = new \SendGrid($apiKey);
        
        $request_body = json_decode('{
            "url": "http://mail.mind2web.com",
            "hostname": "www.mind2web.com",         //Domain Name
            "spam_check": false,
            "send_raw": true
        }');
        
        try {
            $response = $sg->client->user()->webhooks()->parse()->settings()->post($request_body);
            echo "<pre>";
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $ex) {
            echo 'Caught exception: '.  $ex->getMessage();
        }
    }

    public function submitPost(Request $request)
    {
        $input = $request->all();

        return response()->json([
            "status" => true,
            "data" => $input
        ]);
    }   

    public function makeCall(){
        
            // Include the Twilio PHP library
            

            // Set your Twilio Account SID and Auth Token
            $accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
            $authToken = '643451d0575d7bac14b8301f84f5a1a9';

            // Initialize the Twilio client
            $twilio = new Client($accountSid, $authToken);

            // Define the recipient's phone number
            $toPhoneNumber = '+917719462335'; // Replace with the recipient's phone number

            // Define the Twilio phone number from which you want to make the call
            $fromPhoneNumber = '+12512202404'; // Replace with your Twilio phone number

            try {
                // Make a call
                $call = $twilio->calls->create(
                    $toPhoneNumber,
                    $fromPhoneNumber,
                    [
                        'url' => 'http://127.0.0.1:8000/voice.xml' // Replace with a URL that returns TwiML for your call
                    ]
                );

                // Output the call SID
                echo "Call SID: " . $call->sid;
            } catch (Exception $e) {
                // Handle any exceptions
                echo "Error: " . $e->getMessage();
            }


    }

    public function twowaycall(){
                       
               

                // Set your Twilio Account SID and Auth Token
                $accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
                $authToken = '643451d0575d7bac14b8301f84f5a1a9';

                // Initialize the Twilio client
                $twilio = new Client($accountSid, $authToken);

                // Define the recipient's phone number
                // $toPhoneNumber = '+917888536943'; // Replace with the recipient's phone number

                $toPhoneNumber = '+917719462335';

                // Define the Twilio phone number from which you want to make the call
                $fromPhoneNumber = '+12512202404'; // Replace with your Twilio phone number

                // Generate TwiML for the call route('welcome.login')
                $twiml = new VoiceResponse();
                $gather = $twiml->gather(['numDigits' => 1, 'action' => "https://571b-59-144-161-251.ngrok-free.app/sendgrid-call/handle-key.php"]);
               
                $gather->say('Press 1 to connect to a support representative.');
                $twiml->redirect('https://571b-59-144-161-251.ngrok-free.app/sendgrid-call/fallback.php', ['method' => 'GET']);
                // echo "here1";
                // die;
                // Create the call
                $call = $twilio->calls->create(
                    $toPhoneNumber,
                    $fromPhoneNumber,
                    [
                        'url' => "https://571b-59-144-161-251.ngrok-free.app/sendgrid-call/outbound-call.php"
                    ]
                );

                echo $twiml;

    }

    public function handlekey(){
        // echo "here";
        // die;
        // handle-key.php - TwiML script for handling user input
        $digit = $_REQUEST['Digits'];

        if ($digit == '1') {
            echo '<Response><Dial><Number>+917719462335</Number></Dial></Response>'; // Connect to another number
        } else {
            echo '<Response><Say>Sorry, I don\'t understand that choice.</Say><Redirect method="GET">http://127.0.0.1:8000/outbound-call.php</Redirect></Response>';
        }
        // header("Location: http://127.0.0.1:8000/handle-key.php");
 
        // exit;
    }

    public function outbound(){
        // outbound-call.php - TwiML script for initiating the call
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8"?>
        <Response>
            <Dial>
                <Number>+917719462335</Number> 
            </Dial>
        </Response>';
    }

    public function voicecall_view(){
        return view('voicecall');
    }

    public function voicecall(){
              
        // require_once 'vendor/autoload.php'; // Include the Twilio PHP library

        // Your Twilio Account SID and Auth Token
        $accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
        $authToken = '643451d0575d7bac14b8301f84f5a1a9';


        // Initialize Twilio
        $twilio = new Client($accountSid, $authToken);

        // Recipient's phone number (to whom the call will be made)
        $recipientPhoneNumber = '+917719462335'; // Replace with the recipient's actual phone number

        // Your Twilio phone number (the number from which the call will originate)
        $yourPhoneNumber = '+12512202404'; // Replace with your Twilio phone number

        // Create the voice call
        $call = $twilio->calls->create(
            $recipientPhoneNumber,
            $yourPhoneNumber,
            array(
                'url' => 'https://571b-59-144-161-251.ngrok-free.app/sendgrid-call/voice.xml' // URL to your TwiML script
            )
        );

        echo "Call SID: " . $call->sid;

    }

    public function directcall(){

         // require_once 'vendor/autoload.php'; // Include the Twilio PHP library

        // Your Twilio Account SID and Auth Token
        $accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
        $authToken = '643451d0575d7bac14b8301f84f5a1a9';


        // Initialize Twilio
        $twilio = new Client($accountSid, $authToken);

        // Recipient's phone number (to whom the call will be made)
        $recipientPhoneNumber = '+917719462335'; // Replace with the recipient's actual phone number

        // Your Twilio phone number (the number from which the call will originate)
        $yourPhoneNumber = '+12512202404'; // Replace with your Twilio phone number

        
        try {
            // Create the voice call
        $call = $twilio->calls->create(
            $recipientPhoneNumber,
            $yourPhoneNumber,
               // recipient number can be skipped here as we are giving recipient number in voice.xml too
            array(
                'url' => '', // URL to your TwiML script
                'applicationSid' => 'APbf89e185b3fe02dac344b5b635bb3d0b' // SID of your TwiML Application
            )
        );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        echo "Direct Call SID: " . $call->sid;
    }
}
