<?php
$title = "Liste des Stagiaires";
ob_start();
?>
<h1>Liste des Stagiaires</h1>
    <table class="montableau">
        <tr>
            <th> ID Membre </th>
            <th> Prénom Membre </th>
            <th> Nom Membre </th>
            <th> Suppression </th>
            <th> Modifier </th>
        </tr>
        <?php
            foreach($stagiaires as $stagiaire){
                echo "<tr>";
                echo "<td class='colid'> $stagiaire[id_membre] </td>";
                echo "<td> $stagiaire[login_membre] </td>";
                echo "<td> $stagiaire[nom_membre] </td>";
                echo "<td class='colsuppr'><a href=index.php?action=suppr&id=$stagiaire[id_membre]>Supprimer</a></td>";
                echo "<td class='colsuppr'><a href=templates/form.php?id=$stagiaire[id_membre]&type=mod>Modifier</a></td>";
            }  
        ?>
            <tr class="bg-secondary-subtle"> <td colspan="5" class="text-center" text-center><a href="templates/form.php?type=add">Ajouter Stagiaire</a></td> </tr>
        </tr>
    </table>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>