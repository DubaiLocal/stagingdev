<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522%2C151.1957362&radius=1500&type=restaurant&keyword=cruise&key=AIzaSyAMr1y9Ha7HkirmQzOMJ0xuannNxmlZFSk");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
// echo $output;
print("<pre>".print_r($output,true)."</pre>");
?>