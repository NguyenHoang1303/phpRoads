<?php
$soap = new SoapClient('https://www.learnwebservices.com/services/hello?WSDL');
$array = array(
    'HelloRequest'=>array(
        'Name'=>$_POST['full_name']
    )
);

$result = $soap->SayHello($array);
echo $result->HelloResponse->Message;

