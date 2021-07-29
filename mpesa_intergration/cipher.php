<?php

include 'Crypt/RSA.php';

$rsa = new Crypt_RSA();
extract($rsa->createKey());

$plaintext = '0‚"0  *†H†÷ ‚0‚ ‚®ÿrÄ½]£nh_Ãùûåªab:‹C•­4ù¶«ªð/uŒDÕQ*0ü¸³A©qa%1ZÔ›;¹˜a¤Ä­Œö©Ê³p¡FÀ6S|iÕ5›¬Žº…ûqøèâkÐBz§Þ)Eðÿèb%›Ä-F Ì¥-0ULÖ_OÈãoŸ#ðem¹/ºLÍ€ºÖÞ •ó†JçÁ6 j†hÐ‰±;¢t>èNQ$.vc[Ž8àbšŒÎçÍ>gÝªª’3‡TïCÎòˆ2(h‹ŒBzÓ#Žn…ÁÜ§<+B ïõíoAË¥qL’µ2 úNQÚd£úW5K\Ë^°‘';

$rsa->loadKey($privatekey);

echo $ciphertext = $rsa->encrypt($plaintext);

$rsa->loadKey($publickey);

$rsa->decrypt($ciphertext);
 ?>





