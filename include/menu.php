<?php
  // fichier include/menu.php
  // Liste des catégories et des sous-categories pour les produits vendus
  $rqSCatMenu = "SELECT s.idSCategorie, s.libSCategorie, c.libCategorie
             FROM scategories AS s
             JOIN categories AS c
             ON c.idCategorie = s.idCategorie
             WHERE idSCategorie IN(
             SELECT DISTINCT idSCategorie FROM produits
              )
             ORDER bY s.idCategorie ASC";
  // pas de parametre donc query
  $stmtSCatMenu = $dbh->query($rqSCatMenu);
  // recuperation de la Liste
  $listeSCatMenu = $stmtSCatMenu ->fetchAll();
 ?>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#monMenu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">Accueil</a>
    </div> <!-- fin navbar-header -->

    <!-- partie dynamique du menu -->
    <div class="collapse navbar-collapse" id="monMenu">
      <!-- liste de sous categorie -->
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!-- liste de sous categorie depuis BDD -->
            <?php
              foreach ($listeSCatMenu as $value) {
                $ref = 'produits.php?id=' . $value['idSCategorie'];
                $libelle = ucfirst($value['libCategorie']) . ' ' . $value['libSCategorie'];
                echo '<li><a href="' . $ref . '">' . $libelle . '</a></li>';
              }
             ?>
          </ul>
        </li>
      </ul> <!-- fin menu gauche-->

      <ul class="nav navbar-nav navbar-right">
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <!-- formulaire de recherche -->
      <form class="navbar-form navbar-right" method="post" action="recherche.php">
        <div class="form-group">
          <input type="text" name="recherche" placeholder="Recherche" class="form-control">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>


      <?php if (isset($_SESSION['auth'])): ?>
      <!-- menu si connecté -->
      <p class="navbar-text">
        <?= 'Bienvenue ' . $_SESSION['prenom']; ?>
      </p>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="panier.php">Panier</a>
        </li>
        <li>
          <a href="quitter.php">Déconnecter</a>
        </li>
      </ul>
      <?php else: ?>
      <!-- menu si non connecté -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="inscription.php">Inscription</a>
        </li>
        <li>
          <a href="login.php">Connexion</a>
        </li>
      </ul>
    <?php endif; ?>



    </div> <!-- fin partie dynamique -->


  </div> <!-- fin container fluid -->
</nav>
