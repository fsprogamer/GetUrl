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



$url = 'http://localhost/testdrive/index.php?r=site/login';//'http://rabota-na-domy.ru';

/*
$info = file_get_contents($url);
echo $info;

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

//$cookies_str .= ' _ym_visorc_12394123=w';
print_r($cookies_str);

$data = array('username' => 'admin', 
              'password' => 'admin' 
);

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
$result = file_get_contents($url, false, $context);

echo $result;

*/


//create array of data to be posted
$post_data['firstName'] = 'Name';
$post_data['action'] = 'Register';
 
//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . $value;
}
 
//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);
 
//create cURL connection
$curl_connection = 
  curl_init('$url');
 
//set options
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_connection, CURLOPT_USERAGENT, 
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
 
//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
 
//perform our request
$result = curl_exec($curl_connection);
 
//show information regarding the request
print_r(curl_getinfo($curl_connection));
echo curl_errno($curl_connection) . '-' . 
                curl_error($curl_connection);
 
//close the connection
curl_close($curl_connection);
 

