## General info
Hello this a extremly simple code for use Digitaleo in your development
```
$ git clone https://github.com/alexxandre80/Digitaleo.git
```

## Setup

You can download the API here : <a href="https://github.com/digitaleo/Digitaleo-api-php" target="_blank">https://github.com/digitaleo/Digitaleo-api-php</a> <br>
or
```
$ git clone https://github.com/digitaleo/Digitaleo-api-php.git
```
<br>

Please check the API documentation : <a href="https://www.digitaleo.fr/wp-content/uploads/2020/11/V3-GUIDE-API-SMS.pdf" target="_blank">https://www.digitaleo.fr/wp-content/uploads/2020/11/V3-GUIDE-API-SMS.pdf</a>

<br>

Init Digitaleo Class<br>

```php
include 'Digitaleo-api-php/v2/Digitaleo.php';
```
Add your client credentials
```php
$httpClient  = new Digitaleo();
$httpClient->setOauthClientCredentials(
        'https://oauth.messengeo.net/token',
        '<Your_clientId>',
        '<Your_clientSecret>');
```
Generate a token for the bearer authorization
```php
$callGetToken = $httpClient->callGetToken();
```
