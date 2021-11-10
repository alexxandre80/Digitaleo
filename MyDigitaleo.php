<?php

/**
 * Simple use API Digitaleo
 *
 * Hello this a extremly simple code for use Digitaleo in your development
 *
 * @author  Alexandre Mandra <alexandre.mandra17(at)gmail(dot)com>
 * @version MyDigitaleo.php, 2021/11/10
 * 
 *
 */

//You can download the API here : https://github.com/digitaleo/Digitaleo-api-php
//Check the API documentation : https://www.digitaleo.fr/wp-content/uploads/2020/11/V3-GUIDE-API-SMS.pdf

include 'Digitaleo-api-php/v2/Digitaleo.php';

function get($url,$token){
     
    /* Init cURL resource */
    $ch = curl_init($url);
        
    /* set the content type json */
    $headers = [];
    $headers[] = 'Content-Type:application/json';
    $headers[] = "Authorization: Bearer ".$token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
    /* set return type json */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    /* execute request */
    $result = curl_exec($ch);
    $infos = json_decode($result);

    return $infos;
    /* close cURL resource */
    curl_close($ch);
}

function post($url,$token,$data){

    /* Init cURL resource */
    $ch = curl_init($url);

    $myObj = new stdClass();
    $myObj->text = "Dear #civility# #firstName# #lastName#.";

    //For sender the limited is maximum 11 alphabet characters and digits.
    //For legal reasons, Digitaleo has to approve each TPOA. So if you want to customize the sender id, please contact them
    $myObj->sender = "<Your_TPOA>";
    $myObj->contacts = [["civility" => "M.", "firstName" => "firstName", "lastName" => "lastName", "recipient" => "+33600000000"]];
    $data = json_encode($myObj);

    /* pass encoded JSON string to the POST fields */
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
    /* set the content type json */
    $headers = [];
    $headers[] = 'Content-Type:application/json';

    $headers[] = "Authorization: Bearer ".$token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
    /* set return type json */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    /* execute request */
    $result = curl_exec($ch);
    $infos = json_decode($result);

    return $infos;
    /* close cURL resource */
    curl_close($ch);
}

    $httpClient  = new Digitaleo();
    $httpClient->setOauthClientCredentials(
        'https://oauth.messengeo.net/token',
        '<Your_clientId>',
        '<Your_clientSecret>');

    //Generate a token for the bearer authorization
    $callGetToken = $httpClient->callGetToken();

    //Get all Campaing
    //$campaing = get("https://api.messengeo.net/rest/campaigns",$callGetToken->token);

    $data = ['text' => 'Text message to be sent'];

    //Send a simple SMS
    //You can use the variable $data or use "myObj->text" in this example i use "myObj->text"
    //$sms = post("https://sms.messengeo.net/rest/sms",$callGetToken->token,$data);

    if (isset($sms->status)) {
        echo "Sms not send";
    }else{
        echo "Sms is send";
    }

?>