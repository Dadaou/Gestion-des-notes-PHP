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
        $search = $_POST ['t_rech' ];
        if(empty($rech &   $search))
        {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez entrer un Code matière et un Numero d\'inscription s\'il vous plaît !');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
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
     <body class="body">
          <h1>Résulat de la recherche:</h1>
         <table>
         <tr>
         <td width ="120"><strong> Code Matière</strong> </td>
         <td width ="150" > <strong>Numero d'inscription</strong> </td>
         <td width ="90" > <strong>Notes</strong> </td>
        </tr>
         </table>
     </body>
    </html>
      <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM notes WHERE CodeMat = '$rech' AND Num_inscription = '$search' ") ;

         if ($data= $reponse->fetch())
         {
            ?>
              <table

             <tr>
              <td width ="120"> <?php echo $data['CodeMat']; ?></td>
              <td  width ="150"><?php echo $data['Num_inscription']; ?></td>
              <td width ="90"><?php echo $data['Note']; ?></td>
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
          echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
        }
        }
      
}
if (isset ($_POST ['ajouter']))
{
            $code= $_POST [ "t_code"];
            $num= $_POST [ "t_numero" ];
            $note= $_POST [ "t_note" ];
            
            if(empty($code & $num & $note))
            {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez remplir tous les champs s\il vous plaît!');
                  </script>
               <?php
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
            }
    
            else if($note < 0)
                {
                    ?>
                  <script language="JavaScript">
                  alert ('Entrez un coefficient correcte!');
                  </script>
                  <?php
                  echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
                }
  
            else
            {
            $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
            
           
            $requete = $bdd->query("INSERT INTO notes VALUES('$code','$num','$note')") ;
            
            if($requete)
            {
                ?>
                  <script language="JavaScript">
                  alert ('Ajout effectué');
                  </script>
                <?php
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">";
            }
             else
            {
                ?>
                  <script language="JavaScript">
                  alert ('Ce code matiere et  ce numero d\'inscription existe déjà!');
                   </script>
                  <?php
                   echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
              
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
         <td width ="120" > <strong>Code Matière</strong></td>
         <td width ="150" ><strong>Numero d'inscription</strong></td>
         <td width ="90" ><strong>Note</strong></td>
         
        </tr>
         </table>
       </body>
       </html>
         <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT * FROM notes ORDER BY CodeMat") ;
         while ($data= $reponse->fetch())
         {
            ?>
             <link rel="stylesheet" href="style.css">
              <table class="table">

             <tr>
             <td width ="120"> <?php echo $data['CodeMat']; ?></td>
             <td  width ="150"><?php echo $data['Num_inscription']; ?></td>
              <td width ="90"><?php echo $data['Note']; ?></td>
              <tr>
              </table>
            <?php
         }

}
 if (isset ($_POST ['supprimer']))
{
        $rech = $_POST ['t_rechercher' ];
        $search = $_POST ['t_rech' ];
        if(empty($rech & $search))
       {
             ?>
                  <script langage="JavaScript">
                  alert ('Veuillez entrer un Code matière et un Numero d\'inscription puis cliquer sur Supprimer!');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
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
            $requete = $bdd->query("DELETE FROM notes WHERE CodeMat = '$rech' AND Num_inscription = '$search'");
            if($requete)
             ?>
            alert("Suppession éffectuée ");
            return true;
             }
             }
       ok();
       </script>
       <?php echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;?>
        <?php
        
       }
   
}

if (isset ($_POST ['modifier']))
{
        $rech = $_POST ['t_rechercher' ];
        $search = $_POST ['t_rech' ];
        if(empty($rech &  $search ))
       {
             ?>
                  <script language="JavaScript">
                   alert ('Veuillez entrer un code matiere ou un numero d\'inscription puis cliquer sur modifier!');
                  </script>
            <?php
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
        }
        else
        {
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $rep = $bdd->query("SELECT * FROM notes WHERE CodeMat = '$rech' AND Num_inscription = '$search' ") ;

        if($don= $rep->fetch())
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
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer un Code matière " value = "<?php  $rech = $_POST ['t_rechercher' ]; echo "$rech";?>" />
       </label> </td>
         <td width ="369"><label>
        <input name= "t_rech" type = "text" class="search" id = "t_rech" placeholder="Entrer un Numero d'inscription" value = "<?php   $search = $_POST ['t_rech' ];; echo "$search";?>" />
        </label> </td>
    </tr>
 
    
    <tr>
        <td >Code Matière:</td>
        <td ><label>
        <select name = "t_code">
           <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT CodeMat FROM matiere ") ;
         while ($data= $reponse->fetch())
           {
             ?>
             <option value="<?php echo $data['CodeMat']?>"<?php  $CODE = $don['CodeMat']; if($CODE== $data['CodeMat'] ) echo "selected" ;?>> <?php echo $data['CodeMat']?> </option>
             <?php
           }
         ?>
        </select>
        </label></td>
    </tr>
    
    <tr>
      <td >Numero d'inscription:</td>
        <td ><label>
        <select name ="t_numero">
         <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT Num_inscription FROM etudiant ") ;
         while ($data= $reponse->fetch())
           {
             ?>
             <option value="<?php echo $data['Num_inscription']?>"<?php  $NUM = $don['Num_inscription']; if($NUM == $data['Num_inscription'] ) echo "selected" ;?>> <?php echo $data['Num_inscription']?> </option>
             <?php
           }
         ?>
        </select>
        </label></td>
    </tr>
    
    <tr>
        <td >Note:</td>
        <td ><label>
        <input name = "t_note" type = "number" id = "t_note" placeholder="Note"  value ="<?php echo $don['Note']; ?>"/>
        </label></td>
    </tr>
    <tr>
    <td colspan = "2" ><label>
   <input name = "Enregistrer"  type ="submit" class="modif" id = "Enregistrer" value ="Enregistrer" onclick='return down();'/>
    <script language="Javascript">
    function down()
    {
        var f= confirm("Vous confirmer la modification?");
        if (f == true)
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
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=note.php\">" ;
    }

    }
}
?>
</body>
</html>
<?php

?>