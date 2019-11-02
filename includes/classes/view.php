<?php
#Header
include("./includes/pages/header.php");

$page = (isset($_GET['page'])) ? $_GET['page'] : "";

switch ($page) {
    #Pages "vitrine"
    case "":
    case "index":
    case "accueil":
        include("./includes/pages/accueil.php");
        break;
    
    case "espace-utilisateur":
        include("./includes/pages/espace-utilisateur.php");
        break;

    case "ajout":
        include("./includes/pages/ajout.php");
        break;

    case "ajout-ok":
        include("./includes/pages/ajout-ok.php");
        break;

    case "ajout-nok":
        echo "e";
        include("./includes/pages/ajout-nok.php");
        break;

    case "403":
        include("./includes/pages/403.php");
        break;

    case "401":
        include("./includes/pages/401.php");
        break;

    case "404":
    default:
        include("./includes/pages/404.php");
        break;
}


#Footer
include("./includes/pages/footer.php");
?>