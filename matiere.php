<?php
?>

    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="mystyle.css">
            <title>MATIERE</title>
        </head>
        <body>
    
            <fieldset class="champ">
                <legend   align="center" class="legend">Informations sur la matière</legend>
                <form method="post" action="t_matiere.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                 <table class="tbl">
                    
    <tr>
        <td width ="169"><label>
        <input name= "rechercher" type ="submit" class="rech" id = "rechercher" value ="Rechercher">
        </label> </td>
        <td width ="369"><label>
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer un Code matière ou un Libelle " />
    </tr>
    
    <tr>
        <td >Code Matière:</td>
        <td ><label>
        <input name = "t_code" type = "text" id ="t_code" placeholder="Code matière"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Libelle:</td>
        <td ><label>
        <input name = "t_libelle" type = "text" id = "t_libelle" placeholder="Libelle"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Coefficient:</td>
        <td ><label>
        <input name = "t_coef" type = "number" id = "t_coef" placeholder="Coefficient"/>
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
        var a = confirm("Vous confirmez la suppression?");
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
<a class="prec" href="etudiant.php" >< Précédent</a> <a class="suivant" href="note.php" >Suivant ></a>
</body>
</html>
<?php
?>