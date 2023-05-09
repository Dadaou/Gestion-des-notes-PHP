<?php
?>
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
                  alert ('Veuillez entrer un Code matiere ou un Libelle s\'il vous plaît !');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
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
         <td width ="120"> <strong>Code Matière</strong></td>
         <td width ="90" ><strong> Libelle</strong></td>
         <td width ="90" ><strong>Coefficient</strong></td>
        </tr>
         </table>
     </body>
    </html>
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM matiere WHERE CodeMat = '$rech'|| Libelle = '$rech' ") ;

         if ($data= $reponse->fetch())
         {
            ?>
              <table

             <tr>
              <td width ="120"> <?php echo $data['CodeMat']; ?></td>
              <td  width ="90"><?php echo $data['Libelle']; ?></td>
              <td width ="90"><?php echo $data['Coeff']; ?></td>
              <tr>
              </table>
            <?php
         }
        else
        {
         
          ?>
           <script language="JavaScript">
           alert ('Introuvable!');
            </script>
          <?php
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
        }
        }
      
}
 if (isset ($_POST ['ajouter']))
 {
            $code= $_POST [ "t_code"];
            $lib= $_POST [ "t_libelle" ];
            $coef= $_POST [ "t_coef" ];
            
            if(empty($code & $lib & $coef))
            {
                ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
            }
    
            else if($coef < 1)
                {
                    ?>
                  <script language="JavaScript">
                  alert ('Entrez un coefficient correcte!');
                  </script>
                  <?php
                  echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
                }
  
            else
            {
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            
           
            $requete = $bdd->query("INSERT INTO matiere VALUES('$code','$lib','$coef')") ;
            
            if($requete)
            {
                ?>
                  <script language="JavaScript">
                  alert ('Ajout effectué');
                  </script>
                <?php
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">";
            }
              
           else
            {
                ?>
                  <script language="JavaScript">
                  alert ('Ce code matiere existe déjà');
                   </script>
                  <?php
                   echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
              
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
        td{border: 1px solid #FFFFFF;}
        h1{text-align: center;}
      </style>
          </head>
          <body class="body">
             <h1>Liste des matières</h1>
         <table>
         <tr>
         <td width ="120"> <strong>Code Matière</strong></td>
         <td width ="90" ><strong> Libelle</strong></td>
         <td width ="90" ><strong>Coefficient</strong></td>
        </tr>
         </table>
       </body>
       </html>
         <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM matiere ORDER BY CodeMat") ;
         while ($data= $reponse->fetch())
         {
            ?>
             <link rel="stylesheet" href="style.css">
              <table class="table">

             <tr>
             <td width ="120"> <?php echo $data['CodeMat']; ?></td>
             <td  width ="90"><?php echo $data['Libelle']; ?></td>
              <td width ="90"><?php echo $data['Coeff']; ?></td>
              <tr>
              </table>
            <?php
         }

}
 if (isset ($_POST ['supprimer']))
{
        $rech = $_POST ['t_rechercher' ];
        if(empty($rech))
       {
             ?>
                  <script langage="JavaScript">
                  alert ('Veuillez entrer un Code matiere ou un Libelle puis cliquer sur Supprimer!');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
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
            $requete = $bdd->query("DELETE FROM matiere WHERE CodeMat = '$rech'|| Libelle = '$rech'");
            if($requete)
            ?>
            alert("Suppession éffectuée ");
            return true;
             }
             }
       ok();
       </script>
       <?php echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;?>
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
                   alert ('Veuillez entrer un Code matiere ou un Libelle puis cliquer sur modifier!');
                  </script>
            <?php
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
        }
        else
        {
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $rep = $bdd->query("SELECT * FROM matiere WHERE CodeMat = '$rech'|| Libelle = '$rech' ") ;

        if($data= $rep->fetch())
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
                <legend   align="center" class="legend">Informations sur la matière</legend>
                <form method="post" action="modifier.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                 <table class="tbl">
                    
    <tr>
        <td width ="169"><label>
        <input name= "rechercher" type ="submit" class="rech" id = "rechercher" value ="Rechercher">
        </label> </td>
        <td width ="369"><label>
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer un nom ou un numero d'inscription " value = "<?php  $rech = $_POST ['t_rechercher' ]; echo "$rech";?>" />
    </tr>
    
    <tr>
        <td >Code Matière:</td>
        <td ><label>
        <input name = "t_code" type = "text" id ="t_code" placeholder="Code matière" value ="<?php echo $data['CodeMat']; ?>"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Libelle:</td>
        <td ><label>
        <input name = "t_libelle" type = "text" id = "t_libelle" placeholder="Libelle" value ="<?php echo $data['Libelle']; ?>"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Coefficient:</td>
        <td ><label>
        <input name = "t_coef" type = "number" id = "t_coef" placeholder="Coefficient" value ="<?php echo $data['Coeff']; ?>"/>
        </label></td>
    </tr>
    <tr>
    <td colspan = "2" ><label>
   <input name = "enreg"  type ="submit" class="modif" id = "enreg" value ="Enregistrer" onclick='return up();'/>
    <script language="Javascript">
    function up()
    {
        var g = confirm("Vous confirmez la modification?");
        if (g == true)
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
        alert ('Introuvable!');
        </script>
    <?php
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=matiere.php\">" ;
    }

    }
}
?>
</body>
</html>
<?php

?>