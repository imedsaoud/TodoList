<?php

require_once "../data/queries.php";
require_once "../conf.php";



function render(array $content): string   {
    ob_start();
    require_once __ROOT_DIR__ . "/templates/base.php";
    return ob_get_clean();
}




function DefaultState (PDO $pdo): string  {
    $todosContent = getTodo($pdo);

    $dataTodos = ([
        "content" => $todosContent
    ]);

    ob_start();
    require_once __ROOT_DIR__ . "/templates/home.php";
    $content = ob_get_clean();


    return render(["content" => $content]);
}


function queryCheckAdd (array $post , PDO $pdo){


    $newtodo = [
        'task' => $post["task"],
        'url' => $post["url"],
        'category' => $post["category"],
        'priority' => $post["priority"],
        'state' => $post["state"]
    ];

    addTodo( $pdo  , $newtodo );
}

/*
function formCheck () {

}
if (!preg_match($pattern_nom_prenom, $nom))
{
    $erreurs["nom"] = "Veuillez entrer un nom valide.";
}

if (!preg_match($pattern_nom_prenom, $prenom))
{
    $erreurs["prenom"] = "Veuillez entrer un prénom valide.";
}

if (!preg_match($pattern_tel, $tel))
{
    $erreurs["tel"] = "Veuillez entrer un numéro de téléphone valide.";
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $erreurs["email"] = "Veuillez entrer un email valide.";
}

if (!preg_match($pattern_date_naissance, $date_naissance))
{
    $erreurs["date_naissance"] = "Veuillez entrer une date de naissance valide";
}

if (!preg_match($pattern_commune, $commune))
{
    $erreurs["commune"] = "Veuillez entrer une commune valide.";
}

if (!preg_match($pattern_cp_habitation, $cp_habitation))
{
    $erreurs["cp_habitation"] = "Veuillez entrer un code postal valide.";
}
<// S'il y a des erreurs, on les affiche
if (!empty($erreurs))
{
    foreach( $erreurs as $erreur )
    {
        echo $erreur, '<br>';
    }

}// Sinon, s'il n'y a pas d'erreur, on affiche les données
else
{
    $affichage = array(
        "civilite"  => $civilite,
        "nom"    => $nom,
        "prénom" => $prenom,
        "tel" => $tel,
        "email" => $email,
        "date de naissance" => $date_naissance,
        "commune" => $commune,
        "code postal" => $cp_habitation,
        "type de residence" => $type_residence,
        "meuble" => $meuble,
        "type d'habitation" => $type_habitation,
        "etage" => $etage,
        "proprietaire choix" => $proprietaire_choix,
        "proprietaire" => $proprietaire,
        "locataire choix" => $locataire_choix,
        "assureur" => $assureur,
        "chambres" => $chambres,
        "cheminee" => $cheminee,
        "piscine" => $piscine,
        "installation" => $installation,
        "capitaux à couvrir" => $capitaux_couvrir,
        "objet à couvrir" => $objet_couvrir,
        "commentaire" => $commentaire,
    );
    print_r($affichage);
}
*/







