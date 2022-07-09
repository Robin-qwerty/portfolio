<form method="POST" action="php/login.php" method="POST">
  <div class="container">
    <h1>Login</h1>
    <p>Log in als klant of medewerker</p>
    <hr>

    <label for="email"><b>email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <?php include 'php/error.php'; ?>

    <button type="submit" class="registerbtn">Login</button>
  </div>

  <div class="container signin">
    <p>don't have an account? <a href="index.php?page=aanmelden">Sign up!</a>.</p>
  </div>
</form>
