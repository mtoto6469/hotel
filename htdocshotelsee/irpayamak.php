<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://hotelsee.ir/common/components/cronjob.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch, CURLOPT_AUTOREFERER,true);
echo curl_exec($ch);
curl_close($ch);