<?php
require_once '../model/pdo-users.php';
require_once '../controller/session.php';

if (isset($_POST['eliminar'])) {
    if (deleteUserById(getSessionUserId())) {
        logout();
    } else {
        $error = "Error al eliminar el usuari";
    };
}

include_once '../view/close-account.view.php';
?>