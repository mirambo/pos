<?php 
$url = 'https://openapi.m-pesa.com/sandbox/ipg/v2/vodacomTZN/getSession/';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);


//$credentials = base64_encode('JkjSbtNlrxaVD3jAr0zE4657CrD1pVcr7cwZospvUYwSo9/M+Ou+jvcV1/QeB51DflqHmzxFP2NH7pwbVM3rzMblb9T6UvJje3veLxJdHnWkzkaMj6RnB0mh4eprJ4WT55JmV5KrIYApl75IEYGYXKOSqWyKQAykxgwGBd59deVATv0d5CWv5aNtW3twnPHTAjrO277CfO/GaqiGRuuzilpfZ5cwdI7Amq6OmRNlb98PaC7T9YbO+MRqmCvOfMwQHZojzdM65c3gnLWovRw80NqFfsWN3tsuFNyEql8iB+ZHMlj8Vod71UWeMdPytU5XmUPqK3nbI4gjTsx0XDQS0cbiebjGluG3J4M8E1TrDqt2ZvdHpeJ2eIhWUODCkR6vHx+B+5QxZqax8FY/ijRlFyZoidy6oupq3jBXX/p7WZB31Wuwh2APjkfIYLfODW8AA/uKkUM2MuyY07lxnomDdR/BJA/k+xn2i/4VrPCsaS0GT1p3wNWGW4oTnN6QH3uEwr3RwtfTihMD33vNXoqVuGELwsHSYfqbTzOUvUmJESSYVEkOLIQiDuvy9bb5/3K3dMB8aRUWf6nor1IfYwUZ0RS34yVb7QAf4MlCDt2FnTfGkrt1uQ2bmYVudY15rAmJztUMlTXdNl7cRGOkVpPA0G9O7yTtGcuoCDKFR3qe/Zs=:AX9WRspdJqrdElkeF81zp9OcKwZAm3Kf');
$credentials = "K2sf0ne61AocJqWxO3kTHMBmLl0fQyBQWV7GfH3z1kMxVqMCB7sMXn+CKigIPIawHoNr2IrGdjBdFugyHNxRnGkrfSDkC9PFBhR/D9ePdw15jgggnG8FItGpw4TEwECgzk0sEmYmKaB9K6lgvs4rs7TMPpTom7uX72+tZ+qMqRVt7LrGsngBrkXjbOxc19fkImVHjehzjVCOSOsROsx4nRlM9wtl4KSLgKCBzmLePRmwu/IOCF3NrIQLVYYqUDDSgYbHURk1L6d4kxJffFM/wa2BPoeuG59gcgldyEaQ5Sv5VnaGKDh1XTBrvKS+J9Efwg7s1CWLQxhtYdr+Z2eorC1QjbxwW+LbiIChiu/wSVRY6/9p41QbXEsBoIEESPD8JIfxGM/HFRhRmiVN2LGiUX8+5O1piXq4JRrBz+VrQ1HXpDKQj4+MAipVPqL4jsQhbbOQ/OvZa3uA18oA9FXpsC41siVApduLOlK8OxJPvygtB1gMlSisOHLWiZGWjY7uEu9CvW9LPlcz4MzHhIg6/Vemj5KyT/Mcn/874K8LgZG8eTnzBac3nvrsl2k5BnMUa/4JoBUOjqrJUe4cckYPIjw2sw9rUFqfOqh9LiG76dCFvgBOKqZU3ZrEGT7/yE+VlMkHV+rON26+XWIet5nGZobPXZFm9gAgIkAav3b//X4=";

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

echo $curl_response = curl_exec($curl);


$response = json_decode($curl_response);

echo $access_token = $response->access_token;
echo $access_token_expiry = $response->expires_in;



?>