<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $first_name = '';
  $last_name = '';
  $email = '';
  $username = '';
  $errors = [];

  // if this is a POST request, process the form
  // Hint: private/functions.php can help
  if (is_post_request()) {

    // Confirm that POST values are present before accessing them.
    $first_name = isset($_POST['first_name']) ? h($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? h($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? h($_POST['email']) : '';
    $username = isset($_POST['username']) ? h($_POST['username']) : '';

    // validate all inputs, and put errors into $errors if any
    $errors = validateAll($first_name, $last_name, $email, $username, $errors);

    // if there were no errors, submit data to database
    if (count($errors) == 0) {
        // Submit data if no errors
        $errors = submitData($first_name, $last_name, $email, $username, $errors);
    }
  }
?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content" class="col-md-offset-3 col-md-6">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
    echo display_errors($errors);
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="register.php" method="post">
      <div class="form-group ">
          <label for="first_name">First name:</label>
          <input type="text" name="first_name" class="form-control" id="first_name">
      </div>
      <div class="form-group">
          <label for="last_name">Last name:</label>
          <input type="text" name="last_name" class="form-control" id="last_name">
      </div>
      <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" id="email">
      </div>
      <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" class="form-control" id="username">
      </div>

      <button type="submit" name="submit" class="btn btn-success">Register</button>
  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
