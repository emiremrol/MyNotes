<?php

session_start();
spl_autoload_register(
    function ($className){
        require_once $className.".php";
    }
);

$template = new \Core\Template\Template();
$dataBinder = new \Core\DataBinder\DataBinder();

$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['password']);
$db = new \Database\PDODatabase($pdo);

$userRepository = new \App\Repositories\UserRepository\UserRepository($db);
$encryptionService = new \App\Services\Encryption\ArgonEncryptionService();
$userService = new \App\Services\UserService\UserService($userRepository, $encryptionService);
$userHttpHandler = new \App\Http\UserHttpHandler\UserHttpHandler($template, $dataBinder);
$noteRepository = new \App\Repositories\NoteRepository\NoteRepository($db);
$noteService = new \App\Services\NoteService\NoteService($noteRepository, $userService);
$noteHttpHandler = new \App\Http\NoteHttpHandler\NoteHttpHandler($template, $dataBinder);