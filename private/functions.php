<?php

  function h($string="") {
    return htmlspecialchars($string);
  }

  function u($string="") {
    return urlencode($string);
  }

  function raw_u($string="") {
    return rawurlencode($string);
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function display_errors($errors=array()) {
    $output = '';
    if (!empty($errors)) {
      $output .= "<div>";
      $output .= "Please fix the following errors:";
      $output .= '<div class="alert alert-danger">';
      $output .= '<ul>';
      foreach ($errors as $error) {
        // $output .= '<div class="alert alert-danger">';
        $output .= "<li>{$error}</li>";
        // $output .= '</div>';
      }
      $output .= "</ul>";
      $output .= '</div>';
      $output .= "</div>";
    }
    return $output;
  }



  function submitData($first_name, $last_name, $email, $username, $errors = []) {
      global $db;

      $result = checkUsernameUniqueness($username);

      if ($result->num_rows > 0) {
          $errors[] = "Username already exists.";
          return $errors;
      } else {

          $result = insertUser($first_name, $last_name, $email, $username);

          if($result) {
             // db_close($db);
             // TODO redirect user to success page
             redirect_to('registration_success.php');
          } else {
            // The SQL INSERT statement failed.
            // Just show the error, not the form
            echo db_error($db);
            // db_close($db);
            exit;
          }
      }
  }

?>
