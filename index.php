<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table_alias = '<table style="width: 99%">
    <thead>
        <tr>
            <td style="width: 80px; text-align: center;">Дата</td>
            <td style="text-align: center;">Расписание</td>
        </tr>
    </thead>
    <tbody>';

/////////////////////////////////////////////////////////////
/*
$url = 'http://rabota-na-domy.ru/OpenBatches/Index/';
$data = array('username' => 'SFrolova', 
              'password' => 'xqsmvHTb', 
              'rememberMe'=> 'false',
              'X-Requested-With' => 'XMLHttpRequest');

$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data)
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: ".$response;
*/
/*

$url = 'http://yandex.ru';
$proxy = 'srv-isa.akado.local:8080';
$proxyauth = 'SVFrolov:Pr0gamer';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);

echo $curl_scraped_page;
*/

$url = 'http://rabota-na-domy.ru';

$info = file_get_contents($url);

$cookies = array();
foreach ($http_response_header as $hdr) {
    if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
        parse_str($matches[1], $tmp);
        $cookies += $tmp;
    }
}
print_r($cookies);

$cookies_str = 'Cookie: ';
foreach ($cookies as $cook =>$value ) {
  $cookies_str .=  $cook.'='.$value.';';
} 

$cookies_str .= ' _ym_visorc_12394123=w';
print_r($cookies_str);
//echo $info;


$data = array('username' => 'SFrolova', 
              'password' => 'xqsmvHTb', 
              'rememberMe'=> 'false',
              'X-Requested-With' => 'XMLHttpRequest');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded; charset=UTF-8; ".$cookies_str,
        'request_fulluri' => true,            
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url/*.'/Account/AjaxLogOn'*/, false, $context);

echo $result;

/////////////////////////////////////////////////////////////
//&username=SFrolova&password=xqsmvHTb&rememberMe=false&X-Requested-With=XMLHttpRequest
/*
$url = 'http://rabota-na-domy.ru';
$params = array(
    'username' => 'SFrolova', 
    'password' => 'xqsmvHTb', 
    'rememberMe'=> 'false',
    'X-Requested-With' => 'XMLHttpRequest'
);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params),
        
    )
)));

echo $result;
*/
/////////////////////////////////////////////////////////////

//$auth = base64_encode('SVFrolov:Pr0gamer');
/*
$url = 'http://rabota-na-domy.ru';
$params = array(
    'username' => 'SFrolova', 
    'password' => 'xqsmvHTb', 
    'rememberMe'=> 'false',
    'X-Requested-With' => 'XMLHttpRequest'
);

$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params),
        //'proxy' => 'tcp://srv-isa.akado.local:8080',
        'request_fulluri' => true,
        //'header' => "Proxy-Authorization: Basic $auth",        
    )
)));

echo $result;
*/
/*
$info = file_get_contents("http://rabota-na-domy.ru");

print_r($info);
*/
/*
$info = file_get_contents("http://rabota-na-domy.ru/OpenBatches/Index/");

if (($pos = strpos($info, $table_alias)) !== false) {
 $rest = substr($info, $pos); 
}
 
print_r($rest);
*/