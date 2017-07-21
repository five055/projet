<?php

  // script ajoutfilme.php
include 'include/connexion.php';
include 'include/header.php';
 ?>

<!-- //creation du formulaire avec tout les champ necessaire  -->

 <div class="row">
   <div class="col-md-offset-3 col-md-6">
     <form action="ajoutfilme2.php" method="post">

       <div class="form-group">
         <label for="Titre">Titre</label>
         <div class="input-group">
           <div class="input-group-addon"></div>
           <input type="text" class="form-control" name="titre" >
         </div>
       </div>

       <div class="form-group">
         <label for="prenom">le nom du réalisateur</label>
         <input type="text" class="form-control" name="director" >
       </div>

       <div class="form-group">
         <label for="actors ">Acteurs</label>
         <div class="input-group">
           <div class="input-group-addon"></div>
           <input type="text" class="form-control" name="actors" >
         </div>
       </div>


       <div class="form-group">
         <label for="actors ">Producer</label>
         <div class="input-group">
           <div class="input-group-addon"></div>
           <input type="text" class="form-control" name="producer" >
         </div>
       </div>


        <div class="form-group">
          <label for="storyline">Storyline </label>
          <div class="input-group">
            <div class="input-group-addon"></div>
            <input type="text" class="form-control" name="storyline" >
          </div>
        </div>

<!-- creation des oction pour le menu deroulant -->
<select name="annee" required >
    <option selected="selected">Année</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2016</option>
</select>

<select name="langue" required >
    <option selected="selected">langue</option>
    <option value="francais">francais</option>
    <option value="anglais">anglais</option>
    <option value="russe">anglais</option>
</select>

<select name="category" required >
    <option selected="selected">category</option>
    <option value="action">action</option>
    <option value="horreur">horreur</option>
    <option value="guerre">guerre</option>
    <option value="comique">comique</option>
      <option value="documentaire">documentaire</option>
</select>
<br>
<br>
       <div class="form-group text-center">
         <input type="submit" class="btn btn-success" name="btnSub" value="Ajouter">
       </div>

     </form>
   </div>
 </div>


 <?php

  ?>
