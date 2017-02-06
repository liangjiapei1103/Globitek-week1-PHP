<?php

  // is_blank('abcd')
  function is_blank($value='') {
    // TODO
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    // TODO
    $length = strlen($value);

    if (isset($options['max']) && ($length > $options['max'])) {
        return false;
    } elseif (isset($options['min']) && ($length < $options['min'])) {
        return false;
    } elseif (isset($options['exact']) && ($length != $options['exact'])) {
        return false;
    } else {
        return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // TODO
    return strpos($value, '@') !== false;
  }
  

  // validate all inputs
  function validateAll($first_name = '', $last_name = '', $email = '', $username = '', $errors = []) {
      // Perform Validations
      // Hint: Write these in private/validation_functions.php
      if (is_blank($first_name)) {
          $errors[] = h("First name cannot be blank.");
      } elseif (!has_length($first_name, ['min' => 2, 'max' => 255])) {
          $errors[] = h("First name must be between 2 and 255 characters.");
      } elseif (!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $first_name)) {
          $errors[] = h("First name can only contains letters, spaces, minus(-), comma(,), period(.), single quote(').");
      }

      if (is_blank($last_name)) {
          $errors[] = h("Last name cannot be blank.");
      } elseif (!has_length($last_name, ['min' => 2, 'max' => 255])) {
          $errors[] = h("Last name must be between 2 and 255 characters.");
      } elseif (!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $last_name)) {
          $errors[] = h("Last name can only contains letters, spaces, minus(-), comma(,), period(.), single quote(').");
      }

      if (is_blank($email)) {
          $errors[] = h("Email cannot be blank.");
      } elseif (!has_length($email, ['min' => 5, 'max' => 255])) {
          $errors[] = h("Email must be between 5 and 255 characters.");
      } elseif (!has_valid_email_format($email)) {
          $errors[] = h("Email must contain '@'.");
      } elseif (!preg_match('/\A[A-Za-z0-9_\.]+@[A-Za-z0-9_\.]+\Z/', $email)) {
          $errors[] = h("Email can only contains letters, numbers, underscore(_), at(@), period(.), and the format should be xxx@xxx");
      }

      if (is_blank($username)) {
          $errors[] = h("Username cannot be blank.");
      } elseif (!has_length($username, ['min' => 8, 'max' => 255])) {
          $errors[] = h("Username must be between 8 and 255 characters.");
      } elseif (!preg_match('/\A[A-Za-z0-9_]+\Z/', $username)) {
          $errors[] = h("Username can only contains letters, numbers, underscore(_).");
      }

      return $errors;
  }



?>
