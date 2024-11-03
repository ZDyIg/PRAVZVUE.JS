<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 

    curl_close($curl);

    if ($response === false) {
        echo "Error en la solicitud: " . curl_error($curl);
        exit();
    }

    $result = json_decode($response, true);
   if ($result['code'] === 2) {
        $_SESSION['data'] = $result;
        header('Location: tarjetas7Boop.html'); 
        exit();
    } else {
        header('Location: AutoController.php?error=1'); 
        exit();
    }
} else {
    header('Location: tarjetas7Boop.php'); 
    exit();
}

class AutoController {
    public function login() {
        echo "hola";
    }
}
?>
