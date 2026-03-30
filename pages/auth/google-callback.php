<?php
/*
DOKUMENTASJON JEG HAR BRUKT:
https://github.com/googleapis/google-api-php-client/blob/main/examples/idtoken.php
*/

session_start();
require_once dirname(__DIR__, 2) . "/config/database.php";
require_once dirname(__DIR__, 2) . "/vendor/autoload.php";

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope("email");
$client->addScope("profile");

// hvis $_GET['code'] er satt, fetch en access token med fetchAccessTokenWithAuthCode() og lagre den i session
if(isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code'], $_SESSION['code_verifier']);
        $_SESSION['id_token_token'] = $token;

        // hvis tokenen er satt
        if (!empty($_SESSION['id_token_token']) && isset($_SESSION['id_token_token']['id_token'])) {
            $token_data = $client->verifyIdToken($token['id_token']);
            $client->setAccessToken($_SESSION['id_token_token']);
            print_r(array_keys($token_data));
            echo "<br> <br>";
            echo $token_data['name'];
            echo "<img src='{$token_data['picture']}'>";
            $username = $token_data['name'];
            $email = $token_data['email'];
            $profilepicture = $token_data['picture'];
            $oauthprovider = "google";
            $oauth_uid = $token_data['sub'];

            $sql = "SELECT * FROM person WHERE oauth_uid = ? AND oauth_provider = 'google';";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $token_data['sub']);
            $stmt->execute();
            $result = $stmt->get_result();

            // hvis resultatet fra sql queryen var tom, så betyr jo det at brukeren ikke finnes og at den må opprettes i databasen
            if($result->num_rows == 0){
                $sql = "INSERT INTO person (brukernavn, epost, profilbilde, oauth_provider, oauth_uid) VALUES (?, ?, ?, ?, ?);";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sssss", $username, $email, $profilepicture, $oauthprovider, $oauth_uid);
                $stmt->execute();
                $user_id = $mysqli->insert_id;
            }

            $_SESSION['user'] = [
                'id' => $user_id,
                'name' => $username,
                'email' => $email,
                'profilepicture' => $profilepicture,
            ];

            header('Location: ../profil.php');
        }
        else { // hvis id_token_token IKKE er satt,
            $_SESSION['code_verifier'] = $client->getOAuth2Service()->generateCodeVerifier();
            $authUrl = $client->createAuthUrl();
        }
    } catch (Exception $e) {
        session_destroy();
        exit("Authentication failed: " . $e->getMessage());
    }

} else {
    $_SESSION['code_verifier'] = $client->getOAuth2Service()->generateCodeVerifier();
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit;
}