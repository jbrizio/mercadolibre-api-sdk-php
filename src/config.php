<?php
  $meli = new Meli('PUT_YOUR_APP_ID_HERE', 'PUT_YOUR_SECRET_KEY_HERE', isset($_SESSION['access_token']), isset($_SESSION['refresh_token']));
  if (isset($_GET['code']) || isset($_SESSION['access_token'])) {
    // If code exist and session is empty
    if (isset($_GET['code']) && !(isset($_SESSION['access_token']))) {
      // If the code was in get parameter we authorize
      $user = $meli->authorize($_GET['code'], 'http://develop.com/mercadolibre/login.php');

      // Now we create the sessions with the authenticated user
      $_SESSION['access_token'] = $user['body']->access_token;
      $_SESSION['expires_in'] = time() + $user['body']->expires_in;
      $_SESSION['refresh_token'] = $user['body']->refresh_token;
    } else {
      // We can check if the access token in invalid checking the time
      if ($_SESSION['expires_in'] < time()) {
        try {
          // Make the refresh proccess
          $refresh = $meli->refreshAccessToken();

          // Now we create the sessions with the new parameters
          $_SESSION['access_token'] = $refresh['body']->access_token;
          $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
          $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
        } catch (Exception $e) {
          echo "Exception: ", $e->getMessage(), "\n";
        }
      }
    }
    $params = array('access_token' => $_SESSION['access_token']);
    $user = $meli->get('/users/me', $params);
  } else {
    header('http://develop.com/mercadolibre/');
  }
?>