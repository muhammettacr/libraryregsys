<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=lrs", "root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
session_start();
