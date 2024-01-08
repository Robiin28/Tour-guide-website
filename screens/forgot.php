<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }

    h1 {
      text-align: center;
    }

    .message {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #e2f2ff;
      border-radius: 5px;
    }

    .error-message {
      color: #ff0000;
    }

    .success-message {
      color: #008000;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button[type="submit"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Forgot Password</h1>

    <?php if (isset($successMessage)): ?>
      <div class="message success-message"><?php echo $successMessage; ?></div>
    <?php elseif (isset($errorMessage)): ?>
      <div class="message error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
