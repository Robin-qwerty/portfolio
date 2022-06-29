<form action="php/groepen_toevoegen.php" method="POST">
  <div class="groepen">
    <h1 style="text-align: center;">groep toevoegen</h1>
    <p style="text-align: center;">maak een groep aan</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="naam"><b>naam</b></label>
      <p>
    <input type="text" placeholder="naam" name="naam" id="naam" required>
      <p>
    <label for="beschrijving"><b>beschrijving</b></label>
      <p>
    <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" required>
      <p>

      <hr>
    <button type="submit" class="registerbtn">Groep maken</button>
  </div>
</form>
