<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    #frm-create-post label.error {
        color: red;
    }
    </style>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twilio/2.0/twilio.min.js"></script> -->
</head>

<body>

    <div class="container" style="margin-top: 50px;">
        <h4 style="text-align: center;"> Make Calls</h4>
        
         <a href="{{url('twowaycall')}}">   <button type="button" class="btn btn-primary" id="mailbox">Start Call</button> </a>

         <a href="{{url('voicecall')}}">   <button type="button" class="btn btn-primary" id="mailbox">Start Single Call</button> </a>

         <a href="{{url('directcall')}}">   <button type="button" class="btn btn-primary" id="mailbox">Start Direct Call</button> </a>
         <button type="button" class="btn btn-primary" id="make-call">Make Call</button>
          
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twilio.js/1.2.0/twilio.min.js"></script> -->
    <!-- <script type="text/javascript" src="{{ URL::asset('twilio-voice.js-2.7.1/dist/twilio.min.js') }}" src="twilio.min.js"></script> -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script>
    
          // Replace with your Twilio Account SID and Twilio Auth Token
        const accountSid = 'ACfce17b569210699908ac8ccf4d44f004';
        const authToken = '643451d0575d7bac14b8301f84f5a1a9';

       

        // Initialize Twilio Client
        // Twilio.Device.setup(accountSid, authToken);

        // Event handler for the "Make Call" button
        document.getElementById('make-call').addEventListener('click', () => {

            // make_twilio_call(accountSid, authToken);
            // const recipientPhoneNumber = '+917719462335'; // Replace with the recipient's phone number in E.164 format

            // // Make the call
            // const connection = twilioClient.connect({
            //     to: recipientPhoneNumber
            // });

            // // Event handler for when the call is connected
            // connection.on('connect', () => {
            //     console.log('Connected to call');
            // });

            // // Event handler for when the call ends
            // connection.on('disconnect', () => {
            //     console.log('Call ended');
            // });
        });
        
    </script>
    
</body>

</html>