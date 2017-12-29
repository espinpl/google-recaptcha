<?php

/* send.php */

define("SECRET_KEY","6Lc4STcUAAAAAOj5ghNprt8g7PCr4B6UQwMtiU3H"); // ustawiamy secret key
$recaptcha = filter_var($_REQUEST['recaptcha'],FILTER_SANITIZE_STRING); // filtrujemy dane z recaptcha

// odwołanie do zewnętrznych zasobów
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response=".$recaptcha);
$response = json_decode($response, true);
     
if ($response["success"] != true) {
    echo 'error_captcha'; // użytkownik nie zaznaczył "Nie jestem robotem"
} else {        
    // wysłanie formularza, inne zdarzenie...
    echo 'ok';
}

?>