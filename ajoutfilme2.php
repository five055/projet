<?php
  // script ajoutfilme2.php

  include 'include/header.php';

  //Mr propre
  $safe = array_map('strip_tags', $_POST);
  $errors = array();
  // contôles

  // controle sur les champ moins de 5 caractère
  $title = $safe['titre'];
  $producer  = $safe['producer'];
  $director = $safe['director'];
  $actors = $safe['actors'];
  $storyline = $safe['storyline'];


  $longueur1 = strlen($title);
    $longueur2 = strlen($producer);
      $longueur3 = strlen($director);
        $longueur4 = strlen($actors);
          $longueur5 = strlen($storyline);

  if (($longueur1 or $longueur2 or $longueur3 or $longueur4 or $longueur5)  < 5) {
      $errors[] = '“verifier titre ou nom du réalisateur ou acteur ou producteur ou synopsis';
  }


  if (count($errors) == 0) {

    // ajout BDD
    $req = "INSERT INTO exercice_3(title,producer,director,actors,storyline,year_of_prod,language,category)
            VALUES (:title, :producer, :director, :actors, :storyline,:year_of_prod,:language,:category)";
    // préparation
    $stmt = $dbh->prepare($req);
    // parametres
    $params = array(':title' => $safe['titre'],
                    ':producer' => $safe['producer'],
                    ':director' => $safe['director'],
                    ':actors' => $safe['actors'],
                    ':storyline' => $safe['storyline'],
                    ':year_of_prod' => $safe['annee'],
                    ':language' => $safe['langue'],
                    ':category' => $safe['category']);
    // execution
    if ($stmt->execute($params)) {
        // Message retour
      echo '<div class="alert alert-success">Filme ajouté</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur de requête</div>';
    }
  }
  // Message d'erreur
  else {
      $liste = '';  //chaine vide
    // pour chaque erreur
    foreach ($errors as $error) {
        $liste = '<li>' . $error . '</li>';
    }
      echo '<div class="alert alert-danger">Des erreurs sont à corriger: <ul>' . $liste . '</ul></div>';
  }
