<?php require_once("../../../wp-load.php"); 
header('Content-Type: text/html; charset=utf-8');

$main = new Main();
extract($_REQUEST);
if ($action == 'moreJob') {
    return $main->init("Job", 'ajax_job', [ 'count' => 18, 'offset' => $count_items ])->view('list_job');
}
if ($action == 'moreInternship') {
    return $main->init("Job", 'ajax_internship', [ 'count' => 18, 'offset' => $count_items ])->view('list_job');
}
// Tools::mdd($_REQUEST);
if ($action == 'moreNews') {
    return $main->init("News", 'news', [ 'count' => 3, 'offset' => $count_items ])->view('list_news');
}