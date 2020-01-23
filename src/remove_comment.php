<?php
include "Templates/login.inc.php";

$cid = $_POST['comment_id'];
$name = $_POST['name'];

$ps = $mysqli->prepare("SELECT id FROM comments WHERE id = ?");
$ps->bind_param("i", $cid);
$ps->execute();
$result = $ps->get_result();

if (mysqli_num_rows($result) == 0) {
    header("Location: https://abizeitung.rubidium.ml/comment.php?name=" . $name);
} else {
    $ps = $mysqli->prepare("DELETE FROM comments WHERE id = ?");
    $ps->bind_param("i",  $cid);
    $ps->execute();
}

header("Location: https://abizeitung.rubidium.ml/comment.php?name=" . $name);
