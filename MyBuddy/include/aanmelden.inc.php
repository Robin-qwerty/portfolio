      <form action="php/aanmelden.php" method="POST">
        <div class="aanmelden">
          <div id="name"><h1><a href="index.php?page=home" class="projectc">MyBuddy</a></h1></div>

          <?php include 'php/error.php'; ?>

          <hr>
          <div id="L">
            <label for="psw-repeat"><b>naam *</b></label>
              <p>
            <input style="width: 80%;" type="text" placeholder="name" name="name" id="name" required>
              <p>
            <label for="psw-repeat"><b>tussenvoegsel</b></label>
              <p>
            <input style="width: 80%;" type="text" placeholder="tussenvoegsel" name="tussenvoegsel" id="tussenvoegsel">
              <p>
            <label for="psw-repeat"><b>achternaam *</b></label>
              <p>
            <input style="width: 80%;" type="text" placeholder="achternaam" name="achternaam" id="achternaam" required>
          </div>
          <div id="R">
            <label for="psw-repeat"><b>bankrekening nummer *</b></label>
              <p>
            <input style="width: 80%;" type="text" placeholder="bankrekeningnummer" name="bankrekeningnummer" id="bankrekeningnummer" required>
              <p>
            <label for="email"><b>email *</b></label>
              <p>
            <input style="width: 80%;" type="text" placeholder="Enter Email" name="email" id="email" required>
              <p>
            <label for="psw"><b>Password *</b></label>
              <p>
            <input style="width: 80%;" type="password" placeholder="Enter Password" name="psw" id="psw" required>
          </div>
          <hr>

          <?php include 'php/error.php'; ?>
          <div id="name"><p><a href="index.php?page=inloggen">already have an account? login!</a></p></div>
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

          <button type="submit" class="registerbtn">Register</button>
        </div>
      </form>

    </body>
</html>
