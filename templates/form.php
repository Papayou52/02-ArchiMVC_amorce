<?php
    $title = 'Modifier Stagiaire';
    $id = isset($_GET['id']) ? ($_GET['id']) : '';
    $action = isset($_GET['type']) ? ($_GET['type']) : ''; 
?>
<?php ob_start();?>


<form action="http://php/02-ArchiMVC_amorce/index.php" method="GET">

    
    <label for="fname">Prenom:</label><br>
    <input type="text" id="prenom" name="prenom" require >
    <?php if (isset($erreur['prenom'])): ?>
    <p style="color: red;"><?= $erreur['prenom']; ?></p>
    <?php endif; ?><br>

    <label for="lname">Nom:</label><br>
    <input type="text" id="nom" name="nom" require ><br><br>
    <?php if (isset($erreur['nom'])): ?>
    <p style="color: red;"><?= $erreur['nom']; ?></p>
    <?php endif; ?><br>


    <input type="hidden" name="id" value ="<?=$id?>">
    <input type="hidden" name="action" value="<?=$action?>">
    <input type="submit" value="Submit">
  
</form> 
<?php
    $content = ob_get_clean();?>
<?php
    include "baselayout.php";
?>