<?php
$Webservice = 'Login.vonmedia.ir/webservice/server';
$param = array
(
    'Action'=>'Send',
    'username'=>'9170509996',
    'password'=>'2452319120',
    'type'=>1,
    'from'=>'50005125',
    'text'=>'This is a test Message .',
    'receivers'=>'9336042785',
    'file'=>0
);
$handler = curl_init($Webservice);
curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
$Response = json_decode(curl_exec($handler));
$ResponseCode = $Response->Result;
if($ResponseCode==1){
    echo "Your SendID : ".$Response->SendID;
} else {
    echo "Error : $ResponseCode";
}
?>