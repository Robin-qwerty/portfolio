  <form action="php/boektoevoegen.php" method="POST">
    <div class="container">
      <h1>boek toevoegen</h1>
      <p>voeg een nieuwe boek toe aan de winkel</p>
      <hr>

      <label for="psw-repeat"><b>titel</b></label>
      <input type="text" placeholder="titel" name="titel" id="titel" required>

      <label for="psw-repeat"><b>schrijfer</b></label>
      <input type="text" placeholder="schrijfer" name="schrijfer" id="schrijfer" required>

      <label for="psw-repeat"><b>genre</b></label>
      <input type="text" placeholder="genre" name="genre" id="genre" required>

      <label for="psw-repeat"><b>ISBNnummer</b></label>
      <input type="text" placeholder="ISBNnummer" name="ISBNnummer" id="ISBNnummer" required>

      <label for="psw-repeat"><b>taal</b></label>
      <input type="text" placeholder="taal" name="taal" id="taal" required>

      <label for="psw-repeat"><b>aantalpaginas</b></label>
      <input type="text" placeholder="aantalpaginas" name="aantalpaginas" id="aantalpaginas" required>

      <label for="psw-repeat"><b>voorraad</b></label>
      <input type="text" placeholder="voorraad" name="voorraad" id="voorraad" required>

      <label for="psw-repeat"><b>afbeelding</b></label>
      <input type="text" placeholder="afbeelding" name="afbeelding" id="afbeelding" required>

      <label for="email"><b>achterzijden</b></label>
      <input type="text" placeholder="achterzijdeboek" name="achterzijdeboek" id="achterzijdeboek" required>

      <hr>

      <button type="submit" class="registerbtn">boek maken</button>
    </div>
  </form>
