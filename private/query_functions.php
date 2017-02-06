<?php

  // Check user uniqueness
  function checkUsernameUniqueness($username = '') {
      global $db;

      $sql = "SELECT username from users WHERE username='$username'";

      return db_query($db, $sql);
  }

  // Insert user into users table
  function insertUser($first_name, $last_name, $email, $username) {
      global $db;

      // Write SQL INSERT statement
      $sql = 'INSERT INTO `users` VALUES (NULL, "' . $first_name . '", "' . $last_name . '", ' . "'$email', '$username', NOW())";

      // For INSERT statments, $result is just true/false
      return db_query($db, $sql);
  }

?>
