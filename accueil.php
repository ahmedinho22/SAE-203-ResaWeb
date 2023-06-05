<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LoueTaLoc'</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald&display=swap">
    <link rel="icon" href="https://raw.githubusercontent.com/ahmedinho22/test/main/logo-removebg-preview.png" type="image/x-icon">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("o5auX76m14Fe2pXsd"); // Votre clé publique
   })();
</script>

</head>

<body>
      

    
<section id="accueil">
  <nav class="navbar">
  <div class="navbar-container">
  <a href="#" class="logo">
  <img src="https://raw.githubusercontent.com/ahmedinho22/test/main/logo-removebg-preview.png" alt="Logo">
</a>

    </div>
    <ul class="nav-menu">
      <li class="nav-item"><a href="#accueil">Accueil</a></li>
      <li class="nav-item"><a href="#apropos">À propos</a></li>
      <li class="nav-item"><a href="#reservation">Services</a></li>
      <li class="nav-item"><a href="#contact">Contact</a></li>


    </ul>
  </div>
</nav>

    <div class="carrousel-container">
        <div class="carrousel-slide active" style="background-image: url('https://www.flatoutmag.co.uk/wp-content/uploads/2019/02/SC07782-2-1024x702.jpg');" data-index="1"></div>
        <div class="carrousel-slide" style="background-image: url('https://th.bing.com/th/id/R.80aa56ea4a343a94b4604769c7d031fa?rik=IhodrEpfTgvKhg&pid=ImgRaw&r=0');" data-index="2"></div>
        <div class="carrousel-slide" style="background-image: url('https://www.flatoutmag.co.uk/wp-content/uploads/2018/04/1548551_P90298669-highRes.jpg');" data-index="3"></div>
        <div class="carrousel-text">
     
<h2>BIENVENUE CHEZ LA MEILLEURE AGENCE DE LOCATION</h2>


<a href="#apropos" class="scroll-down-button">↓ DÉCOUVRIR ↓</a>


        </div>
    <script src="slider.js"></script>
</section>

<section id="apropos" class="about-section">
    <div class="container">
        <h2>À propos de notre service de location de voiture</h2>
        <div class="about-content">
            <div class="about-item">
                <img src="https://www.flatoutmag.co.uk/wp-content/uploads/2016/12/29R3755.jpg" alt="Image 1">
                <p>Chez LoueTaLoc', nous mettons un point d'honneur à offrir un service de location de voiture fiable et sécurisé.</p>
            </div>
            <div class="about-item">
                <img src="https://th.bing.com/th/id/R.6709fe9738d7b5cc06562cdb2ab31530?rik=dgJJhiw5Rwy%2fhA&pid=ImgRaw&r=0" alt="Image 2">
                <p>Nous comprenons que chaque voyage est unique, c'est pourquoi nous avons une flotte variée de voitures adaptées à tous les goûts et toutes les préférences.</p>
            </div>
            <div class="about-item">
                <img src="https://th.bing.com/th/id/R.68149f5a64a16a0686826c9d27d46a1e?rik=4KJ4JKuhAu2PCA&pid=ImgRaw&r=0" alt="Image 3">
                <p>Nous sommes impatients de vous accueillir avec enthousiasme afin que votre location de voiture soit une expérience inoubliable.</p>
            </div> 
        </div>
    </div>
</section>

<?php

try {
    include("connexion.php");
   
    // définir le mode d'erreur PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prépare une déclaration SQL pour récupérer toutes les marques
    $stmt = $conn->prepare("SELECT * FROM marques");
    $stmt->execute();

    // Récupère toutes les lignes en tant que tableau associatif
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<section id="reservation" class="reservation-section">
    <div class="container">
        <h2>Réservez votre voiture</h2>
        <div class="reservation-grid">
            <?php
            if (count($result) > 0) {
                // Output data of each row
                foreach ($result as $row) {
                    echo '<div class="reservation-item">';
                    echo '<img src="' . $row["logo"] . '" alt="' . $row["nom"] . '">';
                    echo '<h3>' . $row["nom"] . '</h3>';
                    echo '<a href="details-marque.php?id=' . $row["id"] .'&gamme=all'.'">';
                    echo '<button class="btn-reservation"><img src="https://th.bing.com/th/id/R.6d6cf3f76a5d6cac253d5f6295b58429?rik=b2jBAIELJULC%2fw&pid=ImgRaw&r=0" alt="Panier"> Réserver</button>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</section>


<section id="contact" class="contact-section">
    <div class="container">
        <h2>Contactez-nous</h2>
        <form id="myForm" class="contact-form" method="POST">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button class="btn-contact" type="submit">Envoyer</button>
        </form>
    </div>
</section>


<script>
document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var serviceID = 'service_q0dbjqj';
    var templateID = 'template_esi6yk8';

    emailjs.sendForm(serviceID, templateID, this)
    .then(function() { 
        console.log('SUCCESS!');
        alert('Le mail a été envoyé avec succès !');
        document.getElementById('myForm').reset(); // Réinitialiser le formulaire
    }, function(error) {
        console.log('FAILED...', error);
        alert('L\'envoi du mail a échoué...');
    });
});
</script>

<?php
include("footer.php"); 
?>