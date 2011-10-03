<?php
/**
*@author  XuDing
*@email   hello@startutorial.com
*@website http://www.startutorial.com
**/
//process only if data is posted
if(isset($_REQUEST['url'])&&!empty($_REQUEST['url'])){
	
	//This is the URL you want to shorten
	$longUrl = $_REQUEST['url'];
	$apiKey  = 'AIzaSyC-au_vqcST44BnxRIRCjy1eIcFwrJcSh4';
	//Get API key from : http://code.google.com/apis/console/
	 
	$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
	$jsonData = json_encode($postData);
	 
	$curlObj = curl_init();
	 
	curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
	curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curlObj, CURLOPT_HEADER, 0);
	curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
	curl_setopt($curlObj, CURLOPT_POST, 1);
	curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
	 
	$response = curl_exec($curlObj);
	 
	//convert reponse to a json object
	$json = json_decode($response);
	 
	curl_close($curlObj);
	
	//echo result
	if(isset($json->error)){
		echo $json->error->message;
	}else{
		echo $json->id;
	}	

}else{
	echo 'Please enter a URL';
}
?>