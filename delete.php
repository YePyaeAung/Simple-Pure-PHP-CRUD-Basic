<?php
require 'config.php';

$sql = "DELETE FROM users WHERE id=".$_GET['id'];
$statement = $pdo->prepare($sql);
$statement->execute();

header('location: index.php');