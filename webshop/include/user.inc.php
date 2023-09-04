<div id="boek_2">
  <?
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
    }

    include'private/connections.php';

    $sql = "SELECT * FROM users WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();


      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<h1>welkom '.$row->naam.' '.$row->tussenvoegsel.' '.$row->achternaam.'</h1>
          </table>
          <hr>

          <h3>persoonlijke gegevens:</h3>
          <p>email: '.$row->email.'</p>
          <p>woonplaats: '.$row->woonplaats.'</p>
          <p>straat: '.$row->straat.'</p>
          <p>huisnummer: '.$row->huisnummer.'</p>
          <p>postcode: '.$row->postcode.'</p>
          <p>geboortendatum: '.$row->geboortendatum.'</p>

          <h4> <a href="index.php?page=bestelgeschiedenis" class="button">bestelgeschiedenis bekijken</a>  <a onclick="myFunction()" class="deletebutton">account verwijderen</a> </h4>

          <script>
            function myFunction() {
              var txt;
              if (confirm("Weet je zeker dat je je account wil verwijderen!?")) {
                window.location.href = "php/accountverwijderen.php?page='.$row->id.'";
              }
            }
          </script>
        ';
      }
  ?>
</div>
