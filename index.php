<?php
ob_start();
require_once __DIR__ . "/components/plugins_loader.php";
do_action("init_routes");
handle_routes();
require_once __DIR__ . '/core/init.php';

// Om INTE inloggad → skicka till /home (login)
if (!Auth::check()) {
    header("Location: /home");
    exit;
}

// Om admin → till adminpanel
if (Auth::isAdmin()) {
    header("Location: /admin");
    exit;
}

// Vanlig användare → chatten
header("Location: /chat");
exit;
