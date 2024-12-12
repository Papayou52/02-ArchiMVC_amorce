<?php
require_once 'controller.php';

try{
    
    if (!isset($_GET["action"])) {
        
        liste_stagiaires();

    }else if(isset($_GET["action"])){
        
        if($_GET["action"]=="suppr"){          
            if(isset($_GET["id"])){
                supprimer_stagiaire($_GET["id"]);
            }else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }
        elseif ($_GET['action']=="mod") {
            if(isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prenom'])){
                $id = getParametre($_GET,'id');
                $nom = getParametre($_GET,'nom');
                $prenom = getParametre($_GET,'prenom');

                $validation = controle_saisi($prenom,$nom);
                if ($validation === true) {
                modifier_stagiaire($id,$prenom,$nom);
                } else {
                    $erreur = $validation;
                    $_GET['type']="mod";
                    include "templates/form.php";
                }
            }else {
                throw new Exception("<span style='color:red'>Erreur de modification</span>");
            }
        }
        elseif ($_GET['action']=="add"){
            if(isset($_GET['nom']) && isset($_GET['prenom'])) {
            $nom = getParametre($_GET,'nom');
            $prenom = getParametre($_GET,'prenom');

            $validation = controle_saisi($prenom,$nom);
//var_dump($validation);
            if ($validation === true) {
            ajouter_stagiaire($prenom,$nom);
        } else {
            $erreur = $validation;
            $_GET['type']="add";
            include "templates/form.php";
        }
        } else {
            throw new Exception("<span style='color:red'>Erreur lors de l'ajout </span>");

        }
        }
     else {

        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }

    }
        }catch(Exception $e){

    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}

function getParametre($tableau,$nom) {
    if (isset($tableau[$nom])){
        return $tableau[$nom];
    } else
        throw new Exception("Paramètre '$nom' absent");
}



?>
