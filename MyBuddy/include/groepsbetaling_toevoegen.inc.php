<form action="php/groepsbetaling_toevoegen.php" method="POST">
  <div class="betaling">
    <h1 style="text-align: center;">groeps betaling toevoegen</h1>
    <p style="text-align: center;">maak een groeps betaling aan</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="naam"><b>bedrag</b></label>
      <p>
    <label for="naam">€ </label><input type="number" min="0.1" step="0.1" placeholder="bedrag" name="bedrag" id="bedrag" required>
      <p>
      <p>

      <hr>
    <button type="submit" class="registerbtn">Groeps betaling maken</button>
  </div>
</form>
