<form action="php/aanmelden.php" method="POST">
  <div class="container">
    <div id="midel2">
      <h1>bestelling plaatsen</h1>
      <p>vul de gegevens in  en plaats je bestelling</p>
    </div>

    <?php
      include 'php/error.php';

      $sql = "SELECT * FROM users WHERE id = :id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':id', $_SESSION['user']);
      $sth->execute();

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '
          <div id="left">
            <hr>
            <label for="psw-repeat"><b>naam *</b></label>
              <p>
            <input  type="text" placeholder="naam" name="naam" id="naam" value="'.$row->naam.'" required>
              <p>
            <label for="psw-repeat"><b>tussenvoegsel</b></label>
              <p>
            <input type="text" placeholder="tussenvoegsel" name="tussenvoegsel" id="tussenvoegsel  value="'.$row->tussenvoegsel.'"">
              <p>
            <label for="psw-repeat"><b>achternaam *</b></label>
              <p>
            <input type="text" placeholder="achternaam" name="achternaam" id="achternaam" value="'.$row->achternaam.'" required>
              <p>
            <label for="psw-repeat"><b>geboortendatum *</b></label>
              <p>
            <input type="date" placeholder="geboortendatum" name="geboortendatum" id="geboortendatum" value="'.$row->geboortendatum.'" required>
              <hr>
            <label for="psw-repeat"><b>woonplaats *</b></label>
              <p>
            <input type="text" placeholder="woonplaats" name="woonplaats" id="woonplaats" value="'.$row->woonplaats.'" required>
              <p>
            <label for="psw-repeat"><b>straat *</b></label>
              <p>
            <input type="text" placeholder="straat" name="straat" id="straat" value="'.$row->straat.'" required>
              <p>
            <label for="psw-repeat"><b>huisnummer *</b></label>
              <p>
            <input type="number" placeholder="huisnummer" name="huisnummer" id="huisnummer" value="'.$row->huisnummer.'" min="1" required>
              <p>
            <label for="psw-repeat"><b>postcode *</b></label>
              <p>
            <input type="text" placeholder="postcode" name="postcode" id="postcode" value="'.$row->postcode.'" required>
              <hr>
          </div>';


          echo '
          <div id="right">
            <hr>
            <label for="psw-repeat"><b>betaal methode</b></label>
              <p>
            <select name="betaalmethode" style="width: 50%;">
              <option type="dropdown" placeholder="betaalmethode" value="selecteer een betaalmethode">selecteer een betaalmethode</option>
              <option type="dropdown" placeholder="betaalmethode" value="Ideal">Ideal</option>
              <option type="dropdown" placeholder="betaalmethode" value="bank transfer">bank transfer</option>
              <option type="dropdown" placeholder="betaalmethode" value="creditcard">creditcard</option>
              <option type="dropdown" placeholder="betaalmethode" value="paypal">paypal</option>
            </select>
              <p>
            <label for="psw-repeat"><b>bank</b></label>
              <p>
              <select name="bank" style="width: 50%;">
                <option type="dropdown" placeholder="bank" value="selecteer een bank">selecteer een bank</option>
                <option type="dropdown" placeholder="bank" value="Ideal">Ideal</option>
                <option type="dropdown" placeholder="bank" value="bank transfer">bank transfer</option>
                <option type="dropdown" placeholder="bank" value="creditcard">creditcard</option>
                <option type="dropdown" placeholder="bank" value="paypal">paypal</option>
              </select>
              <hr>
              <div id="color">
              <div id="bestellen">
                <table>
                  <tr>
                    <th>product</th>
                    <th>prijs</th>
                    <th>aantal</th>
                  </tr>';

      $sql = "SELECT * FROM winkelmandje WHERE userid = :userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':userid', $_SESSION['user']);
      $sth->execute();

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '
        <tr>
          <td>'.$row->product.'</td>
          <td>'.$row->prijs.'</td>
          <td>'.$row->amount.'</td>
        <tr>
        ';
      }

      include "php/error.php";

      $sql = "  SELECT COUNT(userid) AS totproduct FROM winkelmandje WHERE userid = :userid;";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':userid', $_SESSION['user']);
      $sth->execute();

      if ($totproduct = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '
          <tr>
            <td>totaal: '.$totproduct->totproduct.'</td>
        ';
      }

      $_SESSION['prijs'] = 0;
      $_SESSION['amount'] = 0;

      $sql = "SELECT * FROM winkelmandje WHERE userid = :userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':userid', $_SESSION['user']);
      $sth->execute();

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['prijs'] = $_SESSION['prijs'] + $row->prijs * $row->amount;
        $_SESSION['amount'] = $_SESSION['amount'] + $row->amount;
      }

      $_SESSION['totprijs'] = $_SESSION['prijs'];
      $_SESSION['totamount'] = $_SESSION['amount'];

      echo'
                  <td>totaal: €'.$_SESSION['totprijs'].'</td>
                  <td>totaal: '.$_SESSION['totamount'].'</td>
                <tr>
              </table>
            </div>
            </div>
            <hr>
          </div>
          <button type="submit" class="registerbtn">bestellen</button>
        </div>
      </form>
      ';
    }
  ?>
