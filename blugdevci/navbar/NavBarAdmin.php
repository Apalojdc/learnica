
<div class="pageHaut">
    <div class="logo">⟨ BlugDev-CI /⟩</div>
    <p><img src="../imagesite/simplecodeurlogo.jpg" class="logoMilieu" alt=""></p>
    <p class="name-Users">
                        <?php
                            session_start();

                            if (isset($_SESSION['user'])) {
                                echo "<p>Bienvenue," . "<b> ". htmlspecialchars($_SESSION['user']['nom']) . "</b>" . "!</p>";
                                echo "<p>Votre spécialité : ". "<b> " . htmlspecialchars($_SESSION['user']['specialite']). "</b>" . "</p>";
                            } else {
                                echo "Vous n'êtes pas connecté.";
                            }
                        ?>
    </p>
</div>

<header>
    <div class="menu-toggle" id="menuToggle">☰</div>
    <nav class="navS">
      <ul class="menu-nav-links" id="menuNavLinks">
        <li>
            <a href="#accueil">Accueil</a>
        </li>
        <li>
            <a href="#">Tutoriels</a>
        </li>
        <li>
            <a href="#">Logiciels gratuits</a>
        </li>
        <li>
            <a href="#Document"><i data-lucide="book-open"></i> Document PDF gratuit</a>
        </li>
        <li>
            <a href="../SimpleCodeur/simplecodeur.php">A propos</a>
        </li>
        <li>
            <a href="../cours/testAlgo.php"><i data-lucide="settings"></i> Ajouter un exercice d'algolgorithme</a>
        </li>
        <li>
            <a href="PDFPart.php"><i data-lucide="life-buoy"></i> Ajouter un pdf</a>
        </li>
        <li class="">
            <a href="../logout/logout.php" class="deconnexion">Se déconnecter</a>
        </li>
      </ul>
    </nav>
  </header>

  <script>
  /*
    (function() {
  let menuToggle = document.getElementById('menuToggle');
  let menuNavLinks = document.getElementById('menuNavLinks');

  function OuvertureFermeture() {
    menuNavLinks.classList.toggle('show'); // Ajoute ou retire la classe "show"
  }

  menuToggle.addEventListener('click', OuvertureFermeture);
})();
*/

(function(){
let menuToggle = document.getElementById('menuToggle');
let menuNavLinks = document.getElementById('menuNavLinks');

function OuvertureFermeture(){
if (menuNavLinks.style.display === "none" || menuNavLinks.style.display === "") {
menuNavLinks.style.display = "block";
} else {
menuNavLinks.style.display = "none";
}
}

menuToggle.addEventListener('click', OuvertureFermeture);
})();

  </script>
