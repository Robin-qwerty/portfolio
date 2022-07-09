      <form action="php/aanmelden.php" method="POST">
        <div class="container">
          <h1>account aanmaken</h1>
          <p>Maak een account aan</p>

          <?php include 'php/error.php'; ?>

          <hr>

          <label for="psw-repeat"><b>naam *</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="naam" name="naam" id="naam" required>
            <p>
          <label for="psw-repeat"><b>tussenvoegsel</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="tussenvoegsel" name="tussenvoegsel" id="tussenvoegsel">
            <p>
          <label for="psw-repeat"><b>achternaam *</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="achternaam" name="achternaam" id="achternaam" required>
            <p>
          <label for="psw-repeat"><b>woonplaats *</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="woonplaats" name="woonplaats" id="woonplaats" required>
            <p>
          <label for="psw-repeat"><b>straat *</b></label> <label style="margin-left: 980px;" for="psw-repeat"><b>huisnummer *</b></label>
            <p>
          <input style="width: 60%;" type="text" placeholder="straat" name="straat" id="straat" required>
          <input style="width: 10%;" type="number" placeholder="huisnummer" name="huisnummer" id="huisnummer" min="1" required>
            <p>

          <label for="psw-repeat"><b>postcode *</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="postcode" name="postcode" id="postcode" required>
            <p>
          <label for="psw-repeat"><b>geboortendatum *</b></label>
            <p>
          <input type="date" placeholder="geboortendatum" name="geboortendatum" id="geboortendatum" required>
          <hr>
          <label for="email"><b>email *</b></label>
            <p>
          <input style="width: 70%;" type="text" placeholder="Enter Email" name="email" id="email" required>
            <p>
          <label for="psw"><b>Password *</b></label>
            <p>
          <input style="width: 70%;" type="password" placeholder="Enter Password" name="psw" id="psw" required>
          <hr>

          <?php include 'php/error.php'; ?>

          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

          <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
          <p>Already have an account? <a href="index.php?page=inloggen">Sign in!</a>.</p>
        </div>
      </form>

    </body>
</html>
