<?php
// outbound-call.php - TwiML script for initiating the call
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>
<Response>
    <Dial>
        <Number>+917719462335</Number> 
    </Dial>
</Response>';
?>
