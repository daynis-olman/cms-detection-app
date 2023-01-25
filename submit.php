<?php
  // Get the input URL
  $url = $_POST['url'];
  
  // Build the API endpoint
  $api_endpoint = 'https://whatcms.org/API/Tech';
  $api_key = '';
  
  // Use cURL to send a GET request to the API endpoint
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'key=' . $api_key . '&url=' . $url);
  $response = curl_exec($ch);
  curl_close($ch);
  
  // Decode the JSON response
  $data = json_decode($response);
  
  // Extract the necessary information
  $name = $data->results[0]->name;
  $version = $data->results[0]->version;
  
  // Return the information as a JSON object
  echo json_encode(array('name' => $name, 'version' => $version));
?>
