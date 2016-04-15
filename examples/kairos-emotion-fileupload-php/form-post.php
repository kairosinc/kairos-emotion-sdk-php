<?php
// include "config.php" file for api_url, app_id, and app_key
$configs = include('config.php');
// make curl request
$request = curl_init($configs[api_url] . "/media");
// set curl options
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
    "app_id:" . $configs[app_id], 
    "app_key:" . $configs[app_key]
    )
);
curl_setopt(
    $request,
    CURLOPT_POSTFIELDS,
    array(
      "source" => "@" . $_FILES["upload"]["tmp_name"]
    ));
// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

$response =  curl_exec($request);

echo $response;

// close the session
curl_close($request);
?>

