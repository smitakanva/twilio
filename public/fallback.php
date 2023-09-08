<?php
// fallback.php - TwiML script for handling fallback or errors

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>
<Response>
    <Say>An error occurred during the call. Please try again later.</Say>
    <Hangup/>
</Response>';
?>