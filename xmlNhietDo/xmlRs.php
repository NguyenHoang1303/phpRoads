<?php
//$soap = new SoapClient('https://www.learnwebservices.com/services/hello?WSDL');
//$array = array(
//    'TemperatureInCelsius'=>$_POST['value']
//);
//
//$result = $soap->CelsiusToFahrenheitRequest($array);
//echo $result->TemperatureInFahrenheit;
//

$service = new SoapClient('https://www.learnwebservices.com/services/tempconverter?wsdl');
$result = $service->CelsiusToFahrenheit(
    array(
        'TemperatureInCelsius' => 20.1
    )
);
echo $result->TemperatureInFahrenheit;