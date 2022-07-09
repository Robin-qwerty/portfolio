<form action="php/producte.php" method="POST">
  <div class="container">
    <h1>product toevoegen</h1>
    <p>voeg een nieuwe product toe aan het systeem</p>
    <hr>

    <label for="psw-repeat"><b>naam</b></label>
    <input type="text" placeholder="name" name="name" id="name" required>

    <label for="email"><b>catagorie</b></label>
    <input type="text" placeholder="catagorie" name="catagorie" id="catagorie" required>

    <label for="email"><b>prijs</b></label>
    <input type="text" placeholder="prijs" name="prijs" id="prijs" required>

    <label for="email"><b>voorraad</b></label>
    <input type="text" placeholder="voorraad" name="voorraad" id="voorraad" required>

    <label for="email"><b>beschrijving</b></label>
    <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" required>

    <hr>

    <button type="submit" class="registerbtn">product maken</button>
  </div>
</form>
