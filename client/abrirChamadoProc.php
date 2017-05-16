<?php

include('httpful.phar');
 
$json = json_encode($_POST);
 
$get_request = 'http://localhost/webproject/op001?';
 
$response = \Httpful\Request::post($get_request)
->sendsJson()
->body($json)
->send();

echo $response;
echo 'Chamado aberto (talvez)';