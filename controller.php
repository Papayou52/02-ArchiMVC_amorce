<?php
require_once 'modele.php';

function liste_stagiaires(){
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

function supprimer_stagiaire($id){

    delete_stagiaire_by_id($id);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
   
}

function modifier_stagiaire($id,$prenom,$nom){

    controle_saisi($prenom,$nom);
    update_stagiaire_by_id($id,$prenom,$nom);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

function ajouter_stagiaire($prenom,$nom){
    
    
    add_stagiaire($prenom,$nom);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
    
}


function controle_saisi($prenom,$nom){
    $erreur=[];
    $regex = '/^[A-Za-z]{2,}$/';
    $action = isset($_GET['type']) ? ($_GET['type']) : '';
    if (empty($prenom)){
        $erreur['prenom'] = 'Champ vide';
    } elseif (strlen($prenom) < 2){
        $erreur['prenom'] = 'Le prénom doit comporter au moins 2 caractére';
    } elseif (!preg_match($regex, $prenom)){
        $erreur ['prenom'] = 'Ne peut contenir que des lettres';
    }

    if (empty($nom)){
        $erreur['nom'] = 'Champ vide';
    } elseif (strlen($nom) < 2){
        $erreur['nom'] = 'Le prénom doit comporter au moins 2 caractére';
    } elseif (!preg_match($regex, $nom)){
        $erreur ['nom'] = 'Ne peut contenir que des lettres';
    }

    return empty($erreur) ? true : $erreur;

    }
        

        
    


// Affiche une erreur dans une vue erreur.php 
// qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur) {
    require 'templates/erreur.php';
}
?>



