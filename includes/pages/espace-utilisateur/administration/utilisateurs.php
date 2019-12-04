<div class="row">
    <div class="col panel-outline">
        <?php 
        $query = mysqli_query($connection, "SELECT * FROM kioui_accounts");
        $res = "<table class='table'>";
        $res .= "<thead class='thead'>";

        $res .= "<th style='width:auto'>Nom de l'utilisateur</th>";
        $res .= "<th style='width:25%'>Niveau d'accès</th>";
        $res .= "<th style='width:25%'>Quota</th>";
        $res .= "<th style='width:15%'>Actions</th>";

        $res .= "</thead>";

        while ($user = mysqli_fetch_assoc($query)) {

            $accesslevel = "";

            switch ($user["access_level"]) {
                case "ADMINISTRATOR":
                    $accesslevel = "<span class='badge badge-warning'>Administrateur</span>";
                    break;
                case "USER":
                    $accesslevel = "<span class='badge badge-primary'>Utilisateur</span>";
                    break;
                case "GUEST":
                    $accesslevel = "<span class='badge badge-secondary'>Invité</span>";
                    break;
            }



            $res .= "<tr>";
            //Affichage du nom de l'utilisateur
            $res .= "<td>";
            $res .= htmlspecialchars($user["username"]);
            $res .= "</td>";
            //Affichage du niveau d'accès
            $res .= "<td>";
            $res .= $accesslevel;
            $res .= "</td>";
            //Affichage du quota
            $res .= "<td>";
            $res .= convertUnits($user["quota"]);
            $res .= "</td>";
            //Action
            $res .= "<td>";
            $res .= "<a href='#' title=\"Modifier le quota\" data-toggle='modal' data-target='#modalChangeQuota' onclick='editModalQuota(" . $user['id'] . ")'><i class='fas fa-tachometer-alt edit'></i></a>&nbsp;&nbsp;&nbsp;";
            $res .= "<a href='#' title=\"Modifier le niveau d'access\" data-toggle='modal' data-target='#modalChangeAccessLevel' onclick='editModalAccessLevel(" . $user['id'] . ")'><i class='far fa-id-card edit'></i></i></a>";
            $res .= "</td>";

            $res .= "</tr>";
        }

        $res .="</table>";
        echo($res);
        include("./includes/pages/modals/change-access-level.php");
        include("./includes/pages/modals/change-quota.php");
        ?>
    </div>
</div>