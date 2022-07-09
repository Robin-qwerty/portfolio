<form action="php/kortingscodetoevoegen.php" method="POST">
  <div class="container">
    <h1>kortingscode toevoegen</h1>
    <p>Voeg een nieuwe kortingscode toe aan het systeem</p>

    <?php include 'php/error.php'; ?>

    <hr>
    <label for="psw-repeat"><b>kortingscode</b></label>
    <input type="text" placeholder="kortingscode" name="kortingscode" id="kortingscode" required>

    <label for="email"><b>waarde</b></label>
    <input type="text" placeholder="waarde" name="waarde" id="waarde" required>
    <hr>

    <button type="submit" class="registerbtn">kortingscode maken</button>
  </div>
</form>
