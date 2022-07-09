<?php
  if ($_SESSION['user'] == '') {
    echo'
    <div id="midel2">
      <h1>je bent niet ingelogt</h1>
      <p>log in om een besteling te kunnen plaatsen</p>
    </div>';
  } else {
    echo'
    <form action="php/bestellen.php" method="POST">
      <div class="container">
        <div id="midel2">
          <h1><b>bestelling plaatsen</b></h1>
          <p>Vul de gegevens in  en plaats je bestelling</p>';

        include 'php/error.php';

        $sql = "SELECT * FROM users WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
          echo '
            </div>
            <div id="left">
              <hr>
              <label for="psw-repeat"><b>naam *</b></label>
                <p>
              <input  type="text" placeholder="naam" name="naam" id="naam" value="'.$row->naam.'" required>
                <p>
              <label for="psw-repeat"><b>tussenvoegsel</b></label>
                <p>
              <input type="text" placeholder="tussenvoegsel" name="tussenvoegsel" id="tussenvoegsel"  value="'.$row->tussenvoegsel.'">
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
              <label for="psw-repeat"><b>straat *</b></label> <label style="float: right;" for="psw-repeat"><b>huisnummer *</b></label>
                <p>
              <input style="width: 84%;" type="text" placeholder="straat" name="straat" id="straat" value="'.$row->straat.'" required>
              <input style="width: 14%;" type="number" placeholder="huisnummer" name="huisnummer" id="huisnummer" value="'.$row->huisnummer.'" min="1" required>
                <p>
              <label for="psw-repeat"><b>postcode *</b></label>
                <p>
              <input type="text" placeholder="postcode" name="postcode" id="postcode" value="'.$row->postcode.'" required>
                <hr>
            </div>';


            echo '
            <div id="right">
              <hr>
                <div id="color">
                <div id="bestellen">
                  <table>
                    <tr>
                      <th>product</th>
                      <th>prijs</th>
                      <th>aantal</th>
                    </tr>';

        $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':FK_userid', $_SESSION['user']);
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

        $sql = "  SELECT COUNT(FK_userid) AS totproduct FROM winkelmandje WHERE FK_userid = :FK_userid;";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':FK_userid', $_SESSION['user']);
        $sth->execute();

        if ($totproduct = $sth->fetch(PDO::FETCH_OBJ)) {
          echo '
            <tr>
              <td>totaal: '.$totproduct->totproduct.'</td>
          ';
        }

        $_SESSION['prijs'] = 0;
        $_SESSION['amount'] = 0;

        $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':FK_userid', $_SESSION['user']);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
          $_SESSION['prijs'] = $_SESSION['prijs'] + $row->prijs * $row->amount;
          $_SESSION['amount'] = $_SESSION['amount'] + $row->amount;
        }

        $_SESSION['totprijs'] = $_SESSION['prijs'];
        $_SESSION['totaalprijs'] = $_SESSION['totprijs'] + 4.99;
        $_SESSION['totamount'] = $_SESSION['amount'];

        echo'
                    <td>totaal: €'.$_SESSION['totprijs'].'</td>
                    <td>totaal: '.$_SESSION['totamount'].'</td>
                  <tr>
                </table>
              </div>
              </div>
                <hr>

              <h4>producten: €'.$_SESSION['totprijs'].'</h4>
              <h4>verzendkosten: €4,99</h4>

              <label for="psw-repeat"><b>kortingscode: </b></label>';
                if (isset($_POST['kortingscode']) && $_POST['kortingscode'] != '') {
                  $_SESSION['kortingscode'] = $_POST['kortingscode'];
                  echo $_SESSION['kortingscode'];

                  $sql = "SELECT * FROM kortingscode WHERE kortingscode = :kortingscode";
                  $sth = $conn->prepare($sql);
                  $sth->bindParam(':kortingscode', $_POST['kortingscode']);
                  $sth->execute();

                  if ($kortingscode = $sth->fetch(PDO::FETCH_OBJ)) {
                    echo " <b>waarde:</b> €" . $kortingscode->waarde;
                    $_SESSION['totaalprijs'] = $_SESSION['totaalprijs'] - $kortingscode->waarde;
                  }
                } else {echo '(none)';}
                echo '</p>

                <hr>
              <h2>totaal bedrag: €'.$_SESSION['totaalprijs'].'</h2>
                <hr>
              <label for="psw-repeat"><b>betaal methode</b></label>
                <p>
              <select name="betaalmethode" style="width: 50%;">
                <option type="dropdown" placeholder="betaalmethode" value="Ideal">Ideal</option>
                <option type="dropdown" placeholder="betaalmethode" value="bank transfer">bank transfer</option>
                <option type="dropdown" placeholder="betaalmethode" value="creditcard">creditcard</option>
                <option type="dropdown" placeholder="betaalmethode" value="paypal">paypal</option>
              </select>
                <p>
              <label for="psw-repeat"><b>bank</b></label>
                <p>
                <select name="bank" style="width: 50%;">
                  <option type="dropdown" placeholder="bank" value="ASN">ASN</option>
                  <option type="dropdown" placeholder="bank" value="ING">ING</option>
                  <option type="dropdown" placeholder="bank" value="ABN AMRO">ABN AMRO</option>
                </select>
                <hr>
            </div>
            <button type="submit" class="registerbtn">bestellen</button>
          </div>
        </form>
        ';
      }
    }
  ?>
