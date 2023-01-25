<?php
$url = $_POST['url'];
$apiKey = '';
$apiUrl = 'https://whatcms.org/API/Tech';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "$apiUrl?key=$apiKey&url=$url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
    $name = $data->results[0]->name;
    $version = $data->results[0]->version;
    echo json_encode(array("name" => $name, "version" => $version));
}
