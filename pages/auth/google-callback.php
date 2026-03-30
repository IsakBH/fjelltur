<?php
/*
DOKUMENTASJON JEG HAR BRUKT:
https://github.com/googleapis/google-api-php-client/blob/main/examples/idtoken.php
*/

require_once dirname(__DIR__, 2) . "/config/database.php";
require_once dirname(__DIR__, 2) . "/vendor/autoload.php";

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope("email");
$client->addScope("profile");

if(!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit;
} else {
    /************************************************
     * If we have a code back from the OAuth 2.0 flow,
     * we need to exchange that with the
     * Google\Client::fetchAccessTokenWithAuthCode()
     * function. We store the resultant access token
     * bundle in the session, and redirect to ourself.
     ************************************************/
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code'], $_SESSION['code_verifier']);

    // store in the session also
    $_SESSION['id_token_token'] = $token;

    // redirect back to the example
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URI, FILTER_SANITIZE_URL));
    return;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (!empty($_SESSION['id_token_token']) && isset($_SESSION['id_token_token']['id_token'])) {
    $client->setAccessToken($_SESSION['id_token_token']);
} else {
    $_SESSION['code_verifier'] = $client->getOAuth2Service()->generateCodeVerifier();
    $authUrl = $client->createAuthUrl();
}

if ($client->getAccessToken()) {
    $token_data = $client->verifyIdToken();
}
?>

<div class="box">
<?php if (isset($authUrl)) : ?>
  <div class="request">
    <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
  </div>
<?php else : ?>
  <div class="data">
    <p>Here is the data from your Id Token:</p>
    <pre><?php var_export($token_data) ?></pre>
  </div>
<?php endif ?>
</div>