<?php echo'<form action="php/betaling_aanpassen.php?page='.$_SESSION['betaling'].'" method="POST">';?>
  <div class="betaling">
    <h1 style="text-align: center;">bedrag aanpassen</h1>
    <p style="text-align: center;">pas het bedrag van de betaaling aan</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="naam"><b>bedrag</b></label>
      <p>
      <?php
        $sql = "SELECT * FROM groepsbetalingen WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_SESSION['betaling']);
        $sth->execute();

        if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
          echo'<label for="naam">€ </label><input type="number" min="0.1" max="10000" step="0.1" placeholder="bedrag" name="bedrag" id="bedrag" value="'.$row->bedrag.'" required>';
        }
      ?>
      <p>
      <p>

      <hr>
    <button type="submit" class="registerbtn">aanpassen</button>
  </div>
</form>
