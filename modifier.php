<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
          
<?php
if (isset ($_POST ['save']))
{
            $numero= $_POST [ "t_numero"];
            $nom= $_POST [ "t_nom" ];
            $adresse= $_POST [ "t_adresse" ];
            $sexe= $_POST [ "t_sexe" ];
            $niveau= $_POST [ "t_niveau" ];
            $date= $_POST [ "t_date" ];
            $rech = $_POST ['t_rechercher' ];
           if(empty($numero & $nom & $adresse))
            {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
            }
           else
           {
              ?>
               <script langage="JavaScript">
                function modif()
                {
                if(confirm)
                {
                <?php
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            $requete = $bdd->query("UPDATE etudiant SET Num_inscription = '$numero', Nom = '$nom', Adresse = '$adresse', Sexe = '$sexe', Niveau = '$niveau', Annee = '$date' WHERE Nom = '$rech'|| Num_inscription = '$rech'");
             if($requete)
             {
                ?>
                alert("Etudiant modifié");
                
                 return true;
                  }
                   }
                 modif();
                </script>
               
               <?php
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
             }
           }
     
        

}


if (isset ($_POST ['enreg']))
{
            $code= $_POST [ "t_code"];
            $lib= $_POST [ "t_libelle" ];
            $coef= $_POST [ "t_coef" ];
            $rech = $_POST ['t_rechercher' ];
            if(empty($code & $lib & $coef))
            {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
            }
            else
            {
              ?>
               <script langage="JavaScript">
                function up()
                {
                if(confirm)
                {
              <?php
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            $requete = $bdd->query("UPDATE matiere SET CodeMat = '$code', Libelle = '$lib', Coeff = '$coef' WHERE CodeMat = '$rech'|| Libelle = '$rech' ");
             if($requete)
             {
             ?>
                alert("Modification Effectuée");
                 return true;
                }
                }
                up();
                </script>
               
            <?php
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
            }
            }

}
if (isset ($_POST ['Enregistrer']))
{
            $code= $_POST [ "t_code"];
            $num= $_POST [ "t_numero" ];
            $note= $_POST [ "t_note" ];
            
            $rech = $_POST ['t_rechercher' ];
            $search = $_POST ['t_rech' ];
            if(empty($note))
            {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
            }
            else
            {
              ?>
               <script langage="JavaScript">
                function down()
                {
                if(confirm)
                {
              <?php
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            $requete = $bdd->query("UPDATE notes SET CodeMat = '$code', Num_inscription = '$num', Note = '$note' WHERE CodeMat = '$rech' AND Num_inscription  = '$search' ");
             if($requete)
               ?>
            alert("Modification Effectuée");
                 return true;
                }
                }
                down();
                </script>
               
            <?php
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
            }

}
?>
</body>
</html>