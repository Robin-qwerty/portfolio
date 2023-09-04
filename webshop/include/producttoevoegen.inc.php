<form action="php/producte.php" method="POST">
  <div class="container">
    <h1>product toevoegen</h1>
    <p>voeg een nieuwe product toe aan het systeem</p>

    <?php include 'php/error.php'; ?>

    <hr>

    <label for="naam"><b>naam</b></label>
    <input type="text" placeholder="name" name="name" id="name" required>

    <label for="prijs"><b>prijs</b></label>
      <p>
    <input type="number" placeholder="prijs" name="prijs" id="prijs" min="0" required>
      <p>
    <label for="voorraad"><b>voorraad</b></label>
      <p>
    <input type="number" placeholder="voorraad" name="voorraad" id="voorraad" min="0" required>
      <p>
    <label for="beschrijving"><b>beschrijving</b></label>
    <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" required>

    <?php
      $sql = 'SELECT name FROM catagorie';
      $sth = $conn->prepare($sql);
      $sth->execute();
      echo'
        <label for="catagire"><b>kies een catagorie</b></label>
        <select name="catagorie" >';
      while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo '<option type="dropdown" placeholder="catagorie" value="'.$row['name'].'">'.$row['name'].'</option>';
      }
      echo '</select>

      <hr>

      <button type="submit" class="registerbtn">product maken</button>
      </div>
      </form>
      ';
    ?>
