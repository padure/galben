<?php
    require_once "vendor/autoload.php";
    use app\DataBase;
    $config = require_once "../config.php";
    $db = new DataBase($config);

    $query = $db->prepare('Select * from pasageri', [], PDO::FETCH_OBJ);
    if(isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['loc']) && isset($_POST['zbor'])){
        $insert = $db->query("Insert into pasageri(nume, prenume, loc, zbor) values(:nume, :prenume)", [
            'nume'      => $_POST['nume'],
            'prenume'   => $_POST['prenume'],
            'zbor'   => $_POST['prenume'],
        ]);
        unset($_POST['nume']);
        unset($_POST['prenume']);
        header('location:pasageri.php');
    }

    require 'views/elevi.view.php';

    $db = null;