<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoueTaLoc'</title>
     <link rel="icon" href="https://raw.githubusercontent.com/ahmedinho22/test/main/logo-removebg-preview.png" type="image/x-icon">
</head>
<body>
    
</body>
</html>



<?php
try {
 include 'navbar.php';  
include("connexion.php");
    // définir le mode d'erreur PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // Récupérer l'ID de la marque de l'URL
$id_marque = $_GET['id'];
$gamme = isset($_GET['gamme']) ? $_GET['gamme'] : 'all';

if ($gamme === 'all') {
    $stmt = $conn->prepare("SELECT * FROM produits WHERE id_marque = :id_marque");
    $stmt->bindParam(':id_marque', $id_marque);
} else {
    $stmt = $conn->prepare("SELECT * FROM produits WHERE id_marque = :id_marque AND gamme = :gamme");
    $stmt->bindParam(':id_marque', $id_marque);
    $stmt->bindParam(':gamme', $gamme);
}
$stmt->execute();

// Récupère toutes les lignes en tant que tableau associatif
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("o5auX76m14Fe2pXsd"); // Votre clé publique
   })();
</script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald&display=swap">
<section id="produits" class="produits-section">
    <div class="container">
        <h2>Nos voitures</h2>
        <select id="filterGamme">
    <option value="">Afficher toutes les gammes</option>
    <option value="berline">Berline</option>
    <option value="coupe">Coupe</option>
    <option value="suv">SUV</option>
</select>

<script>
document.getElementById('filterGamme').addEventListener('change', function() {
    var gamme = this.value;
    if (gamme === '') {
        gamme = 'all';
    }
    location.href = "?id=<?= $id_marque ?>&gamme=" + gamme;
});

// Définissez l'option sélectionnée en fonction de la valeur de gamme dans l'URL
var gammeInUrl = new URL(window.location.href).searchParams.get('gamme');
if (gammeInUrl === 'all') {
    gammeInUrl = '';
}
document.getElementById('filterGamme').value = gammeInUrl;
</script>

        <div id="reservationDialogOverlay" style="display: none;">
        <div id="reservationDialog" style="display: none;">
        <span id="reservationDialogClose">&times;</span>
        <form id="reservationDetailsForm">
    <label>
        Prénom:
        <input type="text" name="prenom" required>
    </label>
    <label>
        Nom:
        <input type="text" name="nom" required>
    </label>
    <label>
        Téléphone:
        <input type="text" name="telephone" required>
    </label>
    <label>
        Mail:
        <input type="email" name="mail" required>
    </label>
    <label>
        Ville:
        <input type="text" name="ville" required>
    </label>
    <label>
        Date de début:
        <input type="date" name="date_start" required>
    </label>
    <label>
        Date de fin:
        <input type="date" name="date_finish" required>
    </label>
    <input type="submit" value="Réserver">
</form>
    </div>
</div>


        <form id="reservationForm">
    <div class="produits-grid">
        <?php
        if (count($result) > 0) {
            // Output data of each row
            foreach ($result as $row) {
                echo '<div class="produit-item">';
                echo '<h3>' . $row["nom"] . '</h3>';
                echo '<img src='. $row["photo"].'/>';
                echo '<p>' . $row["description"] . '</p>';
                echo '<p>Prix: ' . $row["prix"] . '€</p>';
                echo '<input type="checkbox" name="produit" value="' . $row["id"] . '"> Sélectionner';
                echo '</div>';
            }
        } else {
            echo "Aucun produit pour cette marque";
        }
        ?>
    </div>
    <button class="btn-reservation" type="submit"><img src="https://th.bing.com/th/id/R.6d6cf3f76a5d6cac253d5f6295b58429?rik=b2jBAIELJULC%2fw&pid=ImgRaw&r=0" alt="Panier"> Réserver</button>
</form>
    </div>
</section>


<script>
document.getElementById('reservationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let selectedProducts = [];
    let checkboxes = document.querySelectorAll('input[name="produit"]:checked');
    checkboxes.forEach((checkbox) => {
        selectedProducts.push(checkbox.value);
    });
    document.getElementById('reservationDialog').style.display = 'block';
    document.getElementById('reservationDialogOverlay').style.display = 'block';
    document.getElementById('reservationDetailsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('produits', JSON.stringify(selectedProducts));
        console.log (formData)
        fetch('insert_reservation.php', {
    method: 'POST',
    body: formData
})



.then(response => response.json())
.then(data => {
    alert(data.message);
})
.catch((error) => {
    console.error('Erreur:', error);
});
    });
});




document.getElementById('reservationDialogClose').addEventListener('click', function() {
    document.getElementById('reservationDialog').style.display = 'none';
    document.getElementById('reservationDialogOverlay').style.display = 'none';
});

</script>





<style>
    /* Style général */
.container {
  max-width: 960px;
  margin: 0 auto;
  padding: 20px;
}

h2 {
  text-align: center;
  font-size: 24px;
}

.produits-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
}

.produit-item {
  background-color: #f7f7f7;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

.produit-item h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

.produit-item p {
  margin-bottom: 10px;
}

.produit-item img{


width: 50%; /* Rapetisse l'image à 50% de la largeur parente */
 height: 50px; /* Maintient le rapport largeur/hauteur de l'image */

}


.btn-reservation {
  background-color: #4285f4;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.btn-reservation img {
  vertical-align: middle;
  margin-right: 5px;
  filter:invert(1);
}

/* Style pour la section produits */
#produits {
  background-color: #fff;
  padding: 40px 0;
}

<style>
    /* Style du formulaire */
    #reservationDetailsForm {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    #reservationDetailsForm label {
        display: block;
        margin-bottom: 10px;
    }

    #reservationDetailsForm input[type="text"],
    #reservationDetailsForm input[type="email"],
    #reservationDetailsForm input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    #reservationDetailsForm input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Style des messages d'erreur */
    #reservationDetailsForm input:invalid {
        border-color: red;
    }

    #reservationDetailsForm input:invalid:focus {
        outline: none;
    }

    #reservationDetailsForm input:invalid + span::before {
        content: "⚠ ";
    }

    #reservationDetailsForm input:invalid + span {
        color: red;
        font-size: 12px;
        font-style: italic;
    }


#reservationDetailsForm label {
  display: block;
  margin-bottom: 10px;
}

#reservationDetailsForm input[type="text"],
#reservationDetailsForm input[type="email"],
#reservationDetailsForm input[type="date"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#reservationDetailsForm input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

#reservationDetailsForm input[type="submit"]:hover {
  background-color: #45a049;
}



#reservationDialogOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Couleur de fond semi-transparente */
    z-index: 9999;
}

#reservationDialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    z-index: 10000;
}

#reservationDialogClose {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #aaa;
}

/* Style de survol pour le bouton de fermeture */
#reservationDialogClose:hover {
    color: #000;
}




.produit-item {
  background-color: #f5f5f5;
  border-radius: 5px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.produit-item h3 {
  font-size: 18px;
  margin-top: 0;
}

.produit-item img {
  width: 100%;
  height: auto;
  margin-bottom: 10px;
}

.produit-item p {
  margin-bottom: 10px;
}

.produit-item input[type="checkbox"] {
  margin-top: 10px;
}



</style>





<script>
document.getElementById('reservationDetailsForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var serviceID = 'service_q0dbjqj';
    var templateID = 'template_08gkcgj';

    emailjs.sendForm(serviceID, templateID, this)
    .then(function() { 
        console.log('SUCCESS!');
        alert('La réservation a été faite avec succès ! Un e-mail de confirmation vous a été envoyé.');
        document.getElementById('reservationDetailsForm').reset(); // Réinitialiser le formulaire
    }, function(error) {
        console.log('FAILED...', error);
        alert('La réservation a échoué...');
    });
});


</script>

<?php
include("footer.php"); 
?>