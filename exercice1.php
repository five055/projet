
<?php
//tableau
$infos = array('nom'=> 'zitouni',
              'prenom'=> 'helmi',
              'adresse' => 'CAMPUS MARTELET',
              'cp'=> '69400',
              'ville' => 'villefranche sur saone',
              'email'=> 'helmi.zitouni@gmail.com',
              'telephone'=> '0621548754',
              'dateNaissance'=>'1984/07/14');


//declaration de la variable date
$date = new DateTime('1984/07/14');
// echo $date->format('d-m-Y');

//afficher dans un tableau html
// tableau html avec un boucle forech avec ul et li
echo '<table>';
foreach($infos as $cle=>$valeur){
//afficher toute les ligne a part celle de la date de naissance
if($cle!='dateNaissance'){

  echo'<tr><ul>
        <td><li>'.ucfirst($cle).'</li></td>
        <td>'.$valeur.'</td>
       </ul></tr>';
//inversion de la date sous forme francaise
}else {
  echo'<tr><ul>
        <td><li>'.ucfirst($cle).'</li></td>
        <td>'.$date->format('d-m-Y').'</td>
       </ul></tr>';
}

}
echo '<table>';
?>
