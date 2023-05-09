<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
          
         <?php

if (isset ($_POST ['rechercher']))
{
        $rech = $_POST ['t_rechercher' ];
        if(empty($rech))
        {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez entrer un Numero ou un nom s\'il vous plaît !');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
        }
        else
        {
     ?>
    <html>
     <head>
      <meta charset="utf-8">
      <style type="text/css">
       body {background-color: #DFAF2C;}
       table{text-align: center; margin: auto; border-collapse: collapse;}
       td{border: 1px solid #FFFFFF;}
       h1{text-align: center;}
      </style>
     </head>
     <body>
         <h1>Résulat de la recherche:</h1>
         <table>
         <tr>
         <td width ="90" ><strong> Numero</strong></td>
         <td width ="90" > <strong>Nom</strong></td>
         <td width ="120" ><strong> Adresse</strong></td>
         <td width ="90" ><strong>Sexe</strong></td >
         <td width ="90" ><strong> Niveau</strong></td >
         <td width ="90" > <strong>Annee</strong></td >
        </tr>
         </table>
     </body>
    </html>
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM etudiant WHERE Nom = '$rech'|| Num_inscription = '$rech' ") ;

         if ($data= $reponse->fetch())
         {
            ?>
              <table>

             <tr>
             <td width ="90"> <?php echo $data['Num_inscription']; ?></td>
             <td  width ="90"><?php echo $data['Nom']; ?></td>
              <td width ="120"><?php echo $data['Adresse']; ?></td>
              <td width ="90"><?php echo $data['Sexe']; ?></td>
              <td width ="90"><?php echo $data['Niveau']; ?></td>
              <td width ="90"><?php echo $data['Annee']; ?></td>
              <tr>
              </table>
            <?php
         }
        else
        {
         
          ?>
           <script language="JavaScript">
           alert ('Etudiant introuvable!');
            </script>
          <?php
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
        }
        }
      
}
 if (isset ($_POST ['ajouter']))
 {
            $numero= $_POST [ "t_numero"];
            $nom= $_POST [ "t_nom" ];
            $adresse= $_POST [ "t_adresse" ];
            $sexe = $_POST [ "t_sexe" ];
            $niveau= $_POST [ "t_niveau" ];
            $date= $_POST [ "t_date" ];
            
            if(empty($nom & $adresse & $sexe & $niveau & $date))
            {
                ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
            }
    
            else if($numero < 1)
                {
                    ?>
                  <script language="JavaScript">
                  alert ('Désolé, ce numero n\'existe pas!');
                  </script>
                  <?php
                  echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
                }
  
            else
            {
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            
           
            $requete = $bdd->query("INSERT INTO etudiant VALUES('$numero','$nom','$adresse','$sexe','$niveau','$date')") ;
            
            if($requete)
            {
                ?>
                  <script language="JavaScript">
                  alert ('Ajout effectué');
                  </script>
                <?php
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">";
            }
              
           else
            {
                ?>
                  <script language="JavaScript">
                  alert ('Désolé, ce numero existe déja');
                   </script>
                  <?php
                   echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
              
            }
                }
}

 if (isset ($_POST ['afficher']))
 {
        ?>
         <html>
          <head>
        <style type="text/css">
       .body {background-color: #DFAF2C;}
        table{text-align: center; margin: auto; border-collapse: collapse;}
        .td{border: 1px solid #FFFFFF;}
        h1{text-align: center;}
      </style>
          </head>
          <body class="body">
            <h1>Liste des étudiants</h1>
         <table>
         <tr>
         <td width ="90" class="td"> <strong>Numero</strong></td>
         <td width ="90" class="td"> <strong>Nom</strong></td>
         <td width ="120" class="td"> <strong>Adresse</strong></td>
         <td width ="90" class="td"> <strong>Sexe</strong></td>
         <td width ="90" class="td"> <strong>Niveau</strong></td>
         <td width ="90" class="td"> <strong>Annee</strong></td>
         
        </tr>
         </table>
       </body>
       </html>
         <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM etudiant ORDER BY Niveau DESC ") ;
         $req= $bdd->query("SELECT COUNT(*) AS Total FROM etudiant ") ;
         while ($data= $reponse->fetch())
         {
            ?>
             <link rel="stylesheet" href="style.css">
              <table class="table">

             <tr>
             <td width ="90" class="td"> <?php echo $data['Num_inscription']; ?></td>
             <td  width ="90" class="td"><?php echo $data['Nom']; ?></td>
              <td width ="120" class="td"><?php echo $data['Adresse']; ?></td>
              <td width ="90" class="td"><?php echo $data['Sexe']; ?></td>
              <td width ="90" class="td"><?php echo $data['Niveau']; ?></td>
              <td width ="90" class="td"><?php echo $data['Annee']; ?></td>
              <tr>
              </table>
            <?php
         }
         if($don= $req->fetch())
         {
          ?>
         <style type="text/css">
        .total
        {
                text-align: right;
                margin: auto;
                width: 435px;
        }
        .tot
       {
                text-align: right;
                margin: auto;
                width: 80px;
       }
       .tbl
       {
                text-align: right;
                margin: auto;
        }
        </style>
          <table class="tbl">
           <tr>
          <td class="total"><strong><?php echo "Effectif";?></strong></td>
          <td class="tot"><?php echo $don['Total'];?></td>
          </tr>
          </table>
          <?php
         }

 }
if (isset ($_POST ['modifier']))
{
        $rech = $_POST ['t_rechercher' ];
        if(empty($rech))
       {
             ?>
                  <script language="JavaScript">
                   alert ('Veuillez d\'abord rechercher le Nom ou le Numero puis cliquer sur modifier!');
                  </script>
            <?php
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
        }
        else
        {
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM etudiant WHERE Nom = '$rech'|| Num_inscription = '$rech' ") ;

         if ($data= $reponse->fetch())
    {
     ?>       
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="mystyle.css">
            <title>SAVE</title>
        </head>
        <body>
                <fieldset class="champ">
                <legend align="center" class="legend">Informations sur l'étudiant</legend>
                <form method="post" action="modifier.php">
                <table class="table">
                    
    <tr>
        <td width ="169"><label>
        <input name= "rechercher" type ="submit" class="rech" id = "rechercher" value ="Rechercher">
        </label> </td>
        <td width ="369"><label>
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer le nom ou le numero d'inscription " value = "<?php  $rech = $_POST ['t_rechercher' ]; echo "$rech";?>" />
    </tr>
    
    <tr>
        <td >Numero d'inscription:</td>
        <td ><label>
        <input name = "t_numero" type = "number" value ="<?php echo $data['Num_inscription']; ?>"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Nom:</td>
        <td ><label>
        <input name = "t_nom" type = "text" value = "<?php echo $data['Nom']; ?>" />
        </label></td>
    </tr>
    
    <tr>
        <td >Adresse:</td>
        <td ><label>
        <input name = "t_adresse" type = "text" value = "<?php echo $data['Adresse']; ?>" />
        </label></td>
    </tr>
    
    <tr>
        <td >Sexe:</td>
        <td ><label for="Masculin">Masculin
        <input name = "t_sexe" type = "radio" id ="Masculin"  value = "Masculin" <?php  $sex = $data['Sexe'];  if($sex == "Masculin" ) echo "checked" ;?>/>
        <label for="Feminin">Feminin
        <input name = "t_sexe" type = "radio" id ="Feminin"   value = "Feminin" <?php   $sex = $data['Sexe'];  if($sex == "Feminin" ) echo "checked" ;?>/>
      </label></label></td>
    </tr>
  
    <tr>
        <td >Niveau:</td>
        <td ><label for="L1">L1
        <input name = "t_niveau" type = "radio" value ="L1" id = "L1" <?php  $Niv = $data['Niveau'];  if($Niv== "L1" ) echo "checked" ;?>/>
         </label>
        <label for="L2">L2
        <input name = "t_niveau" type = "radio" value ="L2" id = "L2" <?php  $Niv = $data['Niveau'];  if($Niv== "L2" ) echo "checked" ;?>/>
        </label>
       <label for="L3">L3
        <input name = "t_niveau" type = "radio" value ="L3" id = "L3" <?php  $Niv = $data['Niveau'];  if($Niv== "L3" ) echo "checked" ;?>/>
         </label>
        <label for="M1">M1
        <input name = "t_niveau" type = "radio" value ="M1" id = "M1" <?php  $Niv = $data['Niveau'];  if($Niv== "M1" ) echo "checked" ;?>/>
         </label>
        <label for="M2">M2
        <input name = "t_niveau" type = "radio" value ="M2" id = "M2" <?php  $Niv = $data['Niveau'];  if($Niv== "M2" ) echo "checked" ;?>/>
         </label></td>
    </tr>
    
      <tr>
        <td >Année:</td>
        <td ><label>
         <select name = "t_date" id = "t_date" placeholder="Année" />
        <option value= "1980"  <?php  $An = $data['Annee']; if($An== "1980" ) echo "selected" ;?>> 1980 </option>
        <option value=  "1981" <?php  $An = $data['Annee']; if($An== "1981" ) echo "selected" ;?>> 1981 </option>
        <option value=  "1982" <?php  $An = $data['Annee']; if($An== "1982" )echo "selected" ;?>> 1982 </option>
        <option value=  "1983" <?php  $An = $data['Annee']; if($An== "1983" )echo "selected" ;?>> 1983 </option>
        <option value=  "1984" <?php  $An = $data['Annee']; if($An== "1984" )echo "selected" ;?>> 1984 </option>
        <option value=  "1985" <?php  $An = $data['Annee']; if($An== "1985" )echo "selected" ;?>> 1985 </option>
        <option value=  "1986" <?php  $An = $data['Annee']; if($An== "1986" )echo "selected" ;?>> 1986 </option>
        <option value=  "1987" <?php  $An = $data['Annee']; if($An== "1987" )echo "selected" ;?>> 1987 </option>
        <option value=  "1988" <?php  $An = $data['Annee']; if($An== "1988" )echo "selected" ;?>> 1988 </option>
        <option value=  "1989" <?php  $An = $data['Annee']; if($An== "1989" )echo "selected" ;?>> 1989 </option>
        <option value=  "1990" <?php  $An = $data['Annee']; if($An== "1990" )echo "selected" ;?>> 1990 </option>
        <option value=  "1991" <?php  $An = $data['Annee']; if($An== "1991" )echo "selected" ;?>> 1991 </option>
        <option value=  "1992" <?php  $An = $data['Annee']; if($An== "1992" )echo "selected" ;?>> 1992 </option>
        <option value=  "1993" <?php  $An = $data['Annee']; if($An== "1993" )echo "selected" ;?>> 1993 </option>
        <option value=  "1994" <?php  $An = $data['Annee']; if($An== "1994" )echo "selected" ;?>> 1994 </option>
        <option value=  "1995" <?php  $An = $data['Annee']; if($An== "1995" )echo "selected" ;?>>1995</option>
         <option value=  "1996" <?php  $An = $data['Annee']; if($An== "1996" )echo "selected" ;?>> 1996</option>
         <option value=  "1997" <?php  $An = $data['Annee']; if($An== "1997" )echo "selected" ;?>>1997</option>
       <option value=  "1998" <?php  $An = $data['Annee']; if($An== "1998" )echo "selected" ;?>> 1998 </option>
        <option value=  "1999" <?php  $An = $data['Annee']; if($An== "1999" )echo "selected" ;?>> 1999</option>
        <option value=  "2000" <?php  $An = $data['Annee']; if($An== "2000" )echo "selected" ;?>> 2000 </option>
        <option value=  "2001" <?php  $An = $data['Annee']; if($An== "2001" )echo "selected" ;?>> 2001</option>
        <option value=  "2002" <?php  $An = $data['Annee']; if($An== "2002" )echo "selected" ;?>> 2002 </option>
        <option value=  "2003" <?php  $An = $data['Annee']; if($An== "2003" )echo "selected" ;?>> 2003 </option>
        <option value=  "2004" <?php  $An = $data['Annee']; if($An== "2004" )echo "selected" ;?>> 2004 </option>
        <option value=  "2005" <?php  $An = $data['Annee']; if($An== "2005" )echo "selected" ;?>> 2005 </option>
        <option value=  "2006" <?php  $An = $data['Annee']; if($An== "2006" )echo "selected" ;?>> 2006 </option>
        <option value=  "2007" <?php  $An = $data['Annee']; if($An== "2007" )echo "selected" ;?>> 2007 </option>
        <option value=  "2008" <?php  $An = $data['Annee']; if($An== "2008" )echo "selected" ;?>> 2008 </option>
        <option value=  "2009" <?php  $An = $data['Annee']; if($An== "2009" )echo "selected" ;?>> 2009 </option>
        <option value=  "2010" <?php  $An = $data['Annee']; if($An== "2010" )echo "selected" ;?>> 2010 </option>
        <option value=  "2011" <?php  $An = $data['Annee']; if($An== "2011" )echo "selected" ;?>> 2011 </option>
        <option value=  "2012" <?php  $An = $data['Annee']; if($An== "2012" )echo "selected" ;?>> 2012 </option>
        <option value=  "2013" <?php  $An = $data['Annee']; if($An== "2013" )echo "selected" ;?>> 2013 </option>
        <option value=  "2014" <?php  $An = $data['Annee']; if($An== "2014" )echo "selected" ;?>> 2014 </option>
        <option value=  "2015" <?php  $An = $data['Annee']; if($An== "2015" )echo "selected" ;?>> 2015 </option>
        <option value=  "2016" <?php  $An = $data['Annee']; if($An== "2016" )echo "selected" ;?>> 2016 </option>
        <option value=  "2017" <?php  $An = $data['Annee']; if($An== "2017" )echo "selected" ;?>> 2017 </option>
        <option value=  "2018" <?php  $An = $data['Annee']; if($An== "2018" )echo "selected" ;?>> 2018 </option>
        <option value=  "2019" <?php  $An = $data['Annee']; if($An== "2019" )echo "selected" ;?>> 2019 </option>
        <option value=  "2020" <?php  $An = $data['Annee']; if($An== "2020" )echo "selected" ;?>> 2020 </option>
        
        </label></td>
    </tr>
    <tr>
    <td colspan = "2" ><label>
    <input name = "save" type ="submit" class="modif" id = "save" value ="Enregistrer" onclick='return modif();'/>
    <script language="Javascript">
    function modif()
    {
        var a = confirm("Vous confirmez la modification?");
        if (a == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    </script>
    </label></td>
    </tr>
    </table>
    </form>
    </fieldset>
    </body>
    </html>
    <?php
    }
    else
    {
        ?>
          <script language="JavaScript">
           alert ('Etudiant introuvable!');
          </script>
        <?php
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
    }
    }
}
if (isset ($_POST ['supprimer']))
{
        $rech = $_POST ['t_rechercher' ];
        if(empty($rech))
       {
             ?>
                  <script langage="JavaScript">
                  alert ('Veuillez d\'abord rechercher le Nom ou le Numero puis cliquer sur Supprimer!');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;
        }
       else
       {
        ?>
       <script language="Javascript">
        function ok()
            {
             if(confirm)
             {
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            $requete = $bdd->query("DELETE FROM etudiant WHERE Nom = '$rech'|| Num_inscription = '$rech'");
            if($requete)
            ?>
            alert("Etudiant supprimé");
            return true;
             }
             }
       ok();
       </script>
       <?php echo "<meta http-equiv=\"refresh\" content=\"0;URL=etudiant.php\">" ;?>
       <?php
       }
}   

?>
</body>
</html>