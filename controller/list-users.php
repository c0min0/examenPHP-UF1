<?php
//Ex5
require_once '../model/pdo-users.php';
require_once '../controller/session.php';

session_start();
$userId = getSessionUserId();
if (!$userId) {
    header('Location: ../controller/login.php');
}

$listUsers = '';

if (getUserRoleById($userId) === 'admin') {
    $users = getUserNicknamesExept($userId);
    foreach ($users as $user) {
        $listUsers .= '<li>' . $user['nickname'] . '</li>';
    }
} else {
    header('Location: ../controller/index.php');
}

include_once '../view/list-users.view.php';
?>