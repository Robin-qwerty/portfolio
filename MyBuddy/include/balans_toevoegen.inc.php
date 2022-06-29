<form action="php/belans_toevoegen.php" method="POST">
  <div class="betaling">
    <h1 style="text-align: center;">belans toevoegen</h1>
    <p style="text-align: center;">voeg belans toe aan je account</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="naam"><b>bedrag</b></label>
      <p>
    <label for="naam">€ </label><input type="number" min="0.1" max="10000" step="0.1" placeholder="bedrag" name="bedrag" id="bedrag" required>
      <p>
      <p>

      <hr>
    <button type="submit" class="registerbtn">toevoegen</button>
  </div>
</form>
