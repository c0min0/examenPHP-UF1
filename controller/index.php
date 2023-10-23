<?php

require_once '../model/pdo-articles.php';
require_once '../controller/session.php';

//Ex7.1
// $postsPerPage = 10;
function getPostsPerPage()
{
    if (isset($_POST['postsPerPage'])) {
        setcookie('postsPerPage', $_POST['postsPerPage'], time() + 60 * 60 * 24 * 30);
        $postsPerPage = $_POST['postsPerPage'];
    } else if (isset($_COOKIE['postsPerPage'])) {
        $postsPerPage = $_COOKIE['postsPerPage'];
    } else {
        $postsPerPage = 10;
    }

    return $postsPerPage;
}
$postsPerPage = getPostsPerPage();


// Ex 7.2
// $orderBy = 'date-desc';
function getOrder()
{
    if (isset($_POST['orderBy'])) {
        setcookie('orderBy', $_POST['orderBy'], time() + 60 * 60 * 24 * 30);
        $orderBy = $_POST['orderBy'];
    } else if (isset($_COOKIE['orderBy'])) {
        $orderBy = $_COOKIE['orderBy'];
    } else {
        $orderBy = 'date-desc';
    }

    return $orderBy;
}
$orderBy = getOrder();

$searchTerm = "";
if (isset($_GET['search'])) $searchTerm = $_GET['search'];

session_start();
$userId = getSessionUserId();

$nArticles = getCountOfPosts($userId, $searchTerm); 
$nPages = ceil($nArticles / $postsPerPage); 

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

if ($nArticles > 0 && ($currentPage > $nPages || $currentPage < 1)) {
    header("Location: index.php");
}

$ndxArticle = $postsPerPage * ($currentPage - 1);

$articles = getPosts($userId, $ndxArticle, $postsPerPage, $orderBy, $searchTerm); 

if ($currentPage <= 3) $backScope = $currentPage - 1;
else $backScope = 3;
if ($currentPage + 3 > $nPages) $frontScope = $nPages - $currentPage;
else $frontScope = 3;


$firstPage = $currentPage == 1;
$lastPage = $currentPage == $nPages;

$firstPageClass = $firstPage ? 'disabled' : '';
$lastPageClass = $lastPage ? 'disabled' : '';

$searchQuery = !empty($searchTerm) ? "?search=$searchTerm&" : "?";
$nextPageLink = $lastPage ? "#" : $searchQuery . "page=" . ($currentPage + 1);
$previousPageLink = $firstPage ? "#" : $searchQuery . "page=" . ($currentPage - 1);
$firstPageLink = $firstPage ? "#" : $searchQuery . "page=1";
$lastPageLink = $lastPage ? "#" : $searchQuery . "page=$nPages";

//Ex2
// require_once '../view/index.view.php';
include_once '../view/index.view.php';