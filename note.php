<?php
?>
        
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="mystyle.css">
            <title>NOTE</title>
        </head>
        <body>
    
            <fieldset class="champ">
                <legend   align="center" class="legend">Informations sur les notes</legend>
                <form method="post" action="t_note.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                 <table class="tbl">
                    
    <tr>
        <td width ="169"><label>
        <input name= "rechercher" type ="submit" class="rech" id = "rechercher" value ="Rechercher">
        </label> </td>
        <td width ="369"><label>
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer un Code matière" />
         </label> </td>
        <td width ="369"><label>
        <input name= "t_rech" type = "text" class="search" id = "t_rech" placeholder="Entrer un Numero d'inscription" />
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
             <option value="<?php echo $data['CodeMat']?>"> <?php echo $data['CodeMat']?> </option>
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
             <option value="<?php echo $data['Num_inscription']?>"> <?php echo $data['Num_inscription']?> </option>
             <?php
           }
         ?>
        </select>
        </label></td>
    </tr>

    <tr>
        <td >Note:</td>
        <td ><label>
        <input name = "t_note" type = "number" id = "t_note" placeholder="Note"/>
        </label></td>
    </tr>
    <tr>
    <td colspan = "2"><label>
    <input name = "ajouter" type ="submit" class="ajout" id = "ajouter" value ="Ajouter" />
    <input name = "modifier" type = "submit" class="modif" id ="modifier" value = "Modifier"/>
    <input name = "supprimer" type = "submit" class="suppr" id = "supprimer" value="Supprimer" onclick='return ok();'/>
    <script language="Javascript">
    function ok()
    {
        var a = confirm("Vous confirmer la suppression?");
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
    <input name = "afficher" type ="submit" class="affic" id = "afficher" value ="Afficher" />
    </label></td>
    </tr>
    </table>
    </form>
            
</fieldset>
<a class="prec" href="matiere.php" >< Précédent</a> <a class="suivant" href="Bulletin.php" >Suivant ></a>
</body>
</html>
<?php
?>