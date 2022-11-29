<?php
ob_start();
$db = new PDO("sqlite:db.db");
$query =  "SELECT * FROM inbounds";
foreach ($db->query($query) as $key => $value) {
$value['settings'] = json_decode($value['settings'], true);
$value['stream_settings'] = json_decode($value['stream_settings'], true);
$value['sniffing'] = json_decode($value['sniffing'], true);
$removeKeys = range(0, 14);
foreach($removeKeys as $key) {
   unset($value[$key]);
}
$arr[] = $value;
}
echo json_encode($arr,true);
header("Content-type:application/json; charset=utf-8");
ob_end_flush();
?>
