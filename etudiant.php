<?php
?>

    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="mystyle.css">
            <title>ETUDIANT</title>
        </head>
        <body>
    
            <fieldset class="champ">
                <legend   align="center" class="legend">Informations sur l'étudiant</legend>
                <form method="post" action="t_etudiant.php">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                 <table class="table">
                    
    <tr>
        <td width ="169"><label>
        <input name= "rechercher" type ="submit" class="rech" id = "rechercher" value ="Rechercher">
        </label> </td>
        <td width ="369"><label>
        <input name= "t_rechercher" type = "text" class="search" id = "t_rechercher" placeholder="Entrer un Nom ou un Numero d'inscription " />
    </tr>
    
    <tr>
        <td >Numero d'inscription:</td>
        <td ><label>
        <input name = "t_numero" type = "number" id ="t_numero" placeholder="Numero"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Nom:</td>
        <td ><label>
        <input name = "t_nom" type = "text" id = "t_nom" placeholder="Nom"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Adresse:</td>
        <td ><label>
        <input name = "t_adresse" type = "text" id = "t_adresse" placeholder="Adresse"/>
        </label></td>
    </tr>
    
    <tr>
        <td >Sexe:</td>
        <td ><label for="Masculin">Masculin
        <input name = "t_sexe" type = "radio" value ="Masculin" id = "Masculin"/>
        <label for="Feminin">Feminin
        <input name = "t_sexe" type = "radio" value ="Feminin" id = "Feminin" />
      </label></label></td>
    </tr>
    
    <tr>
        <td >Niveau:</td>
        <td ><label for="L1">L1
        <input name = "t_niveau" type = "radio" value ="L1" id = "L1" />
         </label>
        <label for="L2">L2
        <input name = "t_niveau" type = "radio" value ="L2" id = "L2" />
        </label>
       <label for="L3">L3
        <input name = "t_niveau" type = "radio" value ="L3" id = "L3" />
         </label>
        <label for="M1">M1
        <input name = "t_niveau" type = "radio" value ="M1" id = "M1" />
         </label>
        <label for="M2">M2
        <input name = "t_niveau" type = "radio" value ="M2" id = "M2" />
         </label></td>
    </tr>
    
      <tr>
        <td >Année scolaire:</td>
        <td ><label>
        <select name = "t_date" id = "t_date" />
        <option value="1980"> 1980 </option>
        <option value="1981"> 1981 </option>
        <option value="1982"> 1982 </option>
       <option value="1983"> 1983 </option>
        <option value="1984"> 1984 </option>
        <option value="1985"> 1985 </option>
        <option value="1986"> 1986 </option>
        <option value="1987"> 1987 </option>
        <option value="1988"> 1988 </option>
        <option value="1989"> 1989 </option>
        <option value="1990"> 1990 </option>
        <option value="1991"> 1991 </option>
        <option value="1992"> 1992 </option>
        <option value="1993"> 1993 </option>
        <option value="1994"> 1994 </option>
        <option value="1995">1995</option>
        <option value="1996"> 1996</option>
       <option value="1997">1997</option>
       <option value="1998"> 1998 </option>
        <option value="1999"> 1999</option>
        <option value="2000"> 2000 </option>
        <option value="2001"> 2001</option>
        <option value="2002"> 2002 </option>
        <option value="2003"> 2003 </option>
        <option value="2004"> 2004 </option>
        <option value="2005"> 2005 </option>
        <option value="2006"> 2006 </option>
        <option value="2007"> 2007 </option>
        <option value="2008"> 2008 </option>
        <option value="2009"> 2009 </option>
        <option value="2010"> 2010 </option>
        <option value="2011"> 2011 </option>
        <option value="2012"> 2012 </option>
        <option value="2013"> 2013 </option>
        <option value="2014"> 2014 </option>
        <option value="2015"> 2015 </option>
        <option value="2016"> 2016 </option>
        <option value="2017"> 2017 </option>
        <option value="2018"> 2018 </option>
        <option value="2019"> 2019 </option>
        <option value="2020"> 2020 </option>
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
<a class="suivant" href="matiere.php" >Suivant ></a>
</body>
</html>
<?php
?>

    
    
    
           
            
         