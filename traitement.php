<html>
<meta charset="utf-8">
  <style type="text/css">
        h1{text-align: center; color: #ED0000; text-decoration: underline;}
        
  </style>
</head>
<body class="Body">
<?php
if (isset ($_POST ['rechercher']))
{

        $rech = $_POST ['t_rechercher' ];
        if(empty($rech))
        {
             ?>
                  <script language="JavaScript">
                  alert ('Veuillez entrer le Numero de l\'étudiant  s\'il vous plaît !');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=bulletin.php\">" ;
        }
        else
        {
          ?><h1>BULLETIN DE NOTES</h1><br/><?php
     ?>
     <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT Num_inscription, Nom, Annee, Niveau FROM etudiant WHERE Num_inscription = '$rech'");

  if ($data= $reponse->fetch())
  {
    ?>
    <html>
     <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
     </head>
     <body>
    
    <form method="post" action="traitement.php">
    <table class ="table">
    <tr>
    <td ><label for="Numero"><strong>Numero Etudiant:</strong></label></td>
    <td ><input type="text" name="Numero" id="Numero" value="<?php echo $data['Num_inscription'] ?>" readonly/></td>
    </tr>
    <tr>
    <td><label for="Nom"><strong>Nom:</strong></label></td>
    <td><input type="text" name="Nom" id="Nom" value="<?php echo $data['Nom'] ?>" readonly/></td>
    </tr>
    <tr>
    <td><label for="Annee"><strong>Année scolaire:</strong></label></td>
    <td><input type="text" name="Annee" id="Annee" value="<?php echo $data['Annee'] ?>" readonly/></td>
    </tr>
    <tr>
    <td><label for="Niveau"><strong>Niveau:</strong></label></td>
    <td><input type="text" name="Niveau" id="Numero" value="<?php echo $data['Niveau'] ?>" readonly/></td>
    </tr>
    </table>
    </form>
    </body>
    </html>
    
         <html>
          <head>
         <style type="text/css">
          .rich
          {
            text-align: center ;
            margin: auto;
            border-collapse: collapse;
          }
          .tble{ border-collapse: collapse;}
          .td{border: 1px solid black;}
         </style>
         <head>
        <body>
         <table class="rich">
         <tr>
         <td width ="90" class="td"> <strong>Designation</strong> </td>
         <td width ="90" class="td"> <strong>Coefficient</strong></td>
         <td width ="90" class="td"> <strong>Note</strong></td>
         <td width ="200" class="td"><strong> NOTE PONDERE </strong></td>
         </tr>
         </table>
   
    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT matiere.Libelle, matiere.Coeff, notes.Note,matiere.Coeff*notes.Note FROM notes, matiere WHERE Num_inscription = '$rech' AND notes.CodeMat = matiere.CodeMat") ;
         $req= $bdd->query("SELECT SUM(matiere.Coeff*notes.Note)/SUM(matiere.Coeff) AS MOY FROM notes, matiere WHERE Num_inscription = '$rech' AND notes.CodeMat = matiere.CodeMat") ;

         while ($data= $reponse->fetch())
         {
        
            ?>
              <table class="rich">
             <tr>
             <td width ="90" class="td"> <?php echo $data['Libelle']; ?></td>
             <td  width ="90" class="td"><?php echo $data['Coeff']; ?></td>
              <td width ="90" class="td"><?php echo $data['Note']; ?></td>
            <td width ="200" class="td"><?php echo $data['matiere.Coeff*notes.Note']; ?></td>
              <tr>
              </table>
        </body>
         </html>
            <?php
          
         }
         while ($don= $req->fetch())
         {
          ?>
          <link rel="stylesheet" href="style.css">
          <table class="tble">
           <tr>
          <td class="Total"><strong><?php echo "MOYENNE";?></strong></td>
          <td class="Tot"><?php echo $don['MOY'];?></td>
           </tr>
           <tr>
           <td class="Total"><strong><?php echo "OBSERVATION";?></strong></td>
            <td class="Tot"><?php if (empty($don['MOY'])) echo "Aucune"; else if ($don['MOY'] >= 10)  echo "ADMIS"; else if ($don['MOY'] >= 7.5)  echo "REDOUBLANT"; else if ($don['MOY'] < 7.5)  echo "EXCLUS";?></td>
           </tr>
           </table>
          
          <?php
         }
         }
      else
      {
            ?>
                  <script language="JavaScript">
                  alert ('Introuvable!');
                  </script>
            <?php
             echo "<meta http-equiv=\"refresh\" content=\"0;URL=bulletin.php\">" ;
      }
    
        }      
}
 if (isset ($_POST ['rech']))
 {
        ?>
         <html>
          <head>
            <style type="text/css">
        .body {background-color: #DFAF2C;}
        table{text-align: center; margin: auto; border-collapse: collapse;}
        td{border: 1px solid #FFFFFF;}
        h1{text-align: center; color: #000000}
           </style>
          </head>
          <body class="body">
          <h1>Classement des étudiants par ordre de merite</h1>
         <table>
         <tr>
         <td width ="120" > <strong>Numero étudiant</strong></td>
         <td width ="90" ><strong>Nom</strong></td>
         <td width ="90" ><strong>Moyenne</strong></td>
         
        </tr>
         </table>
       </body>
       </html>
         <?php
         $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
         $reponse = $bdd->query("SELECT SUM(matiere.Coeff*notes.Note)/SUM(matiere.Coeff) AS MOY, etudiant.Nom, notes.Num_inscription FROM etudiant,notes,matiere WHERE notes.Num_inscription = etudiant.Num_inscription AND matiere.CodeMat = notes.CodeMat GROUP BY etudiant.Num_inscription ORDER BY MOY DESC ");
         while ($data= $reponse->fetch())
         {
            ?>
             <link rel="stylesheet" href="style.css">
              <table class="table">

             <tr>
             <td width ="120"> <?php echo $data['Nom']; ?></td>
             <td  width ="90"><?php echo $data['Num_inscription']; ?></td>
             <td width ="90"><?php  echo $data['MOY']; ?></td>
             <tr>
              </table>
            <?php
         }

}
?>
</body>
</html>