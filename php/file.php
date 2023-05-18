<?php
function convertXmlToJson($url) {
  $xmlString = file_get_contents($url);
  $xml = simplexml_load_string($xmlString);
  $json = json_encode($xml);
  return $json;
}

// Usage:
$xmlUrl = file_get_contents('http://www.example.com/test.xml'); 
$jsonData = convertXmlToJson($xmlUrl);
echo $jsonData;