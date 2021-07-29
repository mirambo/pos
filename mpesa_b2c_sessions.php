<?php

$string="MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEArv9yxA69XQKBo24BaF/D+fvlqmGdYjqLQ5WtNBb5tquqGvAvG3WMFETVUSow/LizQalxj2ElMVrUmzu5mGGkxK08bWEXF7a1DEvtVJs6nppIlFJc2SnrU14AOrIrB28ogm58JjAl5BOQawOXD5dfSk7MaAA82pVHoIqEu0FxA8BOKU+RGTihRU+ptw1j4bsAJYiPbSX6i71gfPvwHPYamM0bfI4CmlsUUR3KvCG24rB6FNPcRBhM3jDuv8ae2kC33w9hEq8qNB55uw51vK7hyXoAa+U7IqP1y6nBdlN25gkxEA8yrsl1678cspeXr+3ciRyqoRgj9RD/ONbJhhxFvt1cLBh+qwK2eqISfBb06eRnNeC71oBokDm3zyCnkOtMDGl7IvnMfZfEPFCfg5QgJVk1msPpRvQxmEsrX9MQRyFVzgy2CWNIb7c+jPapyrNwoUbANlN8adU1m6yOuoX7F49x+OjiG2se0EJ6nafeKUXw/+hiJZvELUYgzKUtMAZVTNZfT8jjb58j8GVtuS+6TM2AutbejaCV84ZK58E2CRJqhmjQibEUO6KPdD7oTlEkFy52Y1uOOBXgYpqMzufNPmfdqqqSM4dU70PO8ogyKGiLAIxCetMjjm6FCMEA3Kc8K0Ig7/XtFm9By6VxTJK1Mg36TlHaZKP6VzVLXMtesJECAwEAAQ==";


echo base64_decode($string);


f/* unction encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}


$encoded = encode("JkjSbtNlrxaVD3jAr0zE4657CrD1pVcr7cwZospvUYwSo9/M+Ou+jvcV1/QeB51DflqHmzxFP2NH7pwbVM3rzMblb9T6UvJje3veLxJdHnWkzkaMj6RnB0mh4eprJ4WT55JmV5KrIYApl75IEYGYXKOSqWyKQAykxgwGBd59deVATv0d5CWv5aNtW3twnPHTAjrO277CfO/GaqiGRuuzilpfZ5cwdI7Amq6OmRNlb98PaC7T9YbO+MRqmCvOfMwQHZojzdM65c3gnLWovRw80NqFfsWN3tsuFNyEql8iB+ZHMlj8Vod71UWeMdPytU5XmUPqK3nbI4gjTsx0XDQS0cbiebjGluG3J4M8E1TrDqt2ZvdHpeJ2eIhWUODCkR6vHx+B+5QxZqax8FY/ijRlFyZoidy6oupq3jBXX/p7WZB31Wuwh2APjkfIYLfODW8AA/uKkUM2MuyY07lxnomDdR/BJA/k+xn2i/4VrPCsaS0GT1p3wNWGW4oTnN6QH3uEwr3RwtfTihMD33vNXoqVuGELwsHSYfqbTzOUvUmJESSYVEkOLIQiDuvy9bb5/3K3dMB8aRUWf6nor1IfYwUZ0RS34yVb7QAf4MlCDt2FnTfGkrt1uQ2bmYVudY15rAmJztUMlTXdNl7cRGOkVpPA0G9O7yTtGcuoCDKFR3qe/Zs=" , "AX9WRspdJqrdElkeF81zp9OcKwZAm3Kf");

echo $encoded; */










?>