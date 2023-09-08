<?php
// handle-key.php - TwiML script for handling user input
$digit = $_REQUEST['Digits'];

if ($digit == '1') {
    echo '<Response><Dial><Number>+917719462335</Number></Dial></Response>'; // Connect to another number
} else {
    echo '<Response><Say>Sorry, I don\'t understand that choice.</Say><Redirect method="GET">http://127.0.0.1:8000/outbound-call.php</Redirect></Response>';
}
