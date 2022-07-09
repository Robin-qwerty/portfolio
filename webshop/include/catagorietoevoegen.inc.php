<form action="php/catagorie.php" method="POST">
  <div class="container">
    <h1>catagorie toevoegen</h1>
    <p>voeg een nieuwe catagorie toe aan het systeem</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="psw-repeat"><b>naam</b></label>
    <input type="text" placeholder="name" name="name" id="name" required>

    <label for="email"><b>beschrijving</b></label>
    <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" required>

    <hr>

    <button type="submit" class="registerbtn">catagorie maken</button>
  </div>
</form>
