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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    #frm-create-post label.error {
        color: red;
    }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 50px;">
        <h4 style="text-align: center;"> RackSpace Apis Call</h4>
        
            <button type="button" class="btn btn-primary" id="mailbox" onclick="getMailboxes()">Get Mailboxes</button>
            <button type="button" class="btn btn-primary" id="adddomain" onclick="addDomain()">Add Domains</button>
            <button type="button" class="btn btn-primary" id="getdomain" onclick="getDomain()">Show Domains</button>
            <button type="button" class="btn btn-primary" id="getdomain" onclick="getDomainWithSubdomain()">Show Domains with Subdomains</button>
            <button type="button" class="btn btn-primary" id="createEmail" onclick="getDomainWithSubdomain()">Show Domains with Subdomains</button>
            
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script type="text/javascript">

        function getMailboxes() {

                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Accept': 'text/xml',
                                'User-Agent': 'Rackspace Management Interface',
                                'X-Api-Signature': 'eGbq9/2hcZsRlr1JV1Pi:20010317143725:HKUn0aajpSDx7qqGK3vqzn3FglI=',
                            }
                        });

                    $.ajax({
                            url: "http://api.emailsrvr.com/v1/customers/1725523/domains/virtualdealer360.com/rs/mailboxes",
                            type: 'GET',
                            success: function(data) {
                            console.log(data);
                            }
                        });
        }

        function addDomain() {
            // https://dns.api.rackspacecloud.com/v1.0/1234/
            // https://lon.dns.api.rackspacecloud.com/v1.0/1234/
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            "X-Auth-Token" : "",
                            "X-Project-Id" : "",
                            "Content-Type" : "application/json"
                        }
                    });

                $.ajax({
                        url: "http://api.emailsrvr.com/v1/customers/1725523/domains",
                        type: 'POST',
                        dataType: "json",
                        data: {
                            "domains" : [ {
                            "name" : "your_domain_name",
                            "comment" : "Optional domain comment...",
                            "subdomains" : {
                                "domains" : [ {
                                    "name" : "sub1.your_domain_name",
                                    "comment" : "1st sample subdomain",
                                    "emailAddress" : "sample@rackspace.com"
                                }, {
                                    "name" : "sub2.your_domain_name",
                                    "comment" : "1st sample subdomain",
                                    "emailAddress" : "sample@rackspace.com"

                                } ]
                            },
                            "ttl" : 3600,
                            "emailAddress" : "sample@rackspace.com"
                            } ]
                        },
                        success: function(data) {
                        console.log(data);
                        }
                    });
        }


        function getDomain() {
           // https://dns.api.rackspacecloud.com/v1.0/1234/
            // https://lon.dns.api.rackspacecloud.com/v1.0/1234/
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "X-Auth-Token" : "",
                        "X-Project-Id" : "",
                        "Content-Type" : "application/json"
                }});

            $.ajax({
                    url: "http://api.emailsrvr.com/v1/customers/1725523/domains/domain_id",
                    type: 'GET',
                    success: function(data) {
                    console.log(data);
                    }
                });
        }

        function getDomainWithSubdomain() {
           // https://dns.api.rackspacecloud.com/v1.0/1234/
            // https://lon.dns.api.rackspacecloud.com/v1.0/1234/
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "X-Auth-Token" : "",
                        "X-Project-Id" : "",
                        "Content-Type" : "application/json"
                }});

            $.ajax({
                    url: "http://api.emailsrvr.com/v1/customers/1725523/domains/domain_id?showRecords=false&showSubdomains=true",
                    type: 'GET',
                    success: function(data) {
                    console.log(data);
                    }
                });
        }


        function createemailaccount() {
           // https://dns.api.rackspacecloud.com/v1.0/1234/
            // https://lon.dns.api.rackspacecloud.com/v1.0/1234/
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "X-Auth-Token" : "",
                        "X-Project-Id" : "",
                        "Content-Type" : "application/json"
                }});

            $.ajax({
                    url: "http://api.emailsrvr.com/v1/customers/1725523/domains/domain_id?showRecords=false&showSubdomains=true",
                    type: 'GET',
                    success: function(data) {
                    console.log(data);
                    }
                });
        }
        

        
        

    </script>
</body>

</html>