<?php 

$access_token="eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6InBhd2EiLCJpc3MiOiJodHRwczovL2R5bmFtb2RpZ2l0YWwta2UuY29tIn0.eyJhdWQiOlsicGF3YV92ZW5kb3IiXSwiZW52aXJvbm1lbnQiOiJTQU5EQk9YIiwicmVxdWVzdGVkQXQiOiIyMDIwLTA1LTAxIDAyOjEyOjMzIiwib3JnX2lkIjoiTzdEUFIiLCJzY29wZSI6WyJwYXdhX3ZlbmRvcl9yZWFkIiwicGF3YV92ZW5kb3Jfd3JpdGUiXSwiZXhwIjoxNTg4MzI2NzUzLCJhdXRob3JpdGllcyI6WyJWRU5ET1JfV1JJVEUiXSwianRpIjoiMmE2MDEyNzEtOGJkZC00MWJjLTg5NmMtOGNhZmY2MTdjODNkIiwiY2xpZW50X2lkIjoiV0tVV1dRSUpCRFlMUU5ORE9JRksifQ.EOc98Mu3uegTljAN7uCNjlmoR_aqmpakBlPr6226MUA4OOzpqtKB32Rm1QMFIZGnjj2TNCw5dk0gxOP9xpTsJPFtXVNt06H1gPFBxqTTARxscPA5Dca_fPotNABBBh33EBbYXSX8PCQBlJqT0ofjPV3BEO3uxcmqvTNhr9WbL-ZAeyw0tr5ACbxaikUevIYvIpN1rgSvTpIfmBeYbFplaWOwJ4rS_6QBX8Pu0A8vpksGxBzlgXIxEi6nV-uL6TFVioUKFN6EXCK4YrpUw-lLxkqmmLJoZjIAjc21oHiXQQjTCtVElKft5wIEkUXxbUOleFPPqy8YN9Lse9Moa3mpZA";

$url = 'https://docs.dynamodigital-ke.com/vendor/v2/vendor/user/request';


$amount=250;
$metre_no='04987653232';


$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header

        $curl_post_data = array(
            'clientSecret' => 'tKUyDjVSIY0v96sWrYQsofAemS3kWaKPiJdtitDI',
            'clientId' => 'WKUWWQIJBDYLQNNDOIFK',
            'meterNumber' => $metre_no,
            'amount' => 230.00,
            'paymentMode' => 'WALLET',
            'vendType' => 'NORMAL',
            'address' => 'http://fedcorpsystem.com/fedcorp/klpc_tokens.php',
            'environment' => 'SANDBOX',
            
        );
        
        $curl_post_data;

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HEADER, false);
        
        echo $curl_response = curl_exec($curl);
        
        echo '</br>';
        
        $data_string_array = json_decode($curl_response);
        
        
                echo $data_string_array->status;
        
        
                echo '</br>';
        
        
        echo $data_string_array->info->reference;
        
        
        echo '</br>';
        
        
                
        echo $data_string_array->message;
        
        
        
        
        
        
        
        
        
        
        
        
        
        

?>