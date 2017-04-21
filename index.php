<?php

//ini_set("display_errors", 1);
//ini_set("error_reporting", E_ALL);

$channels = require_once("channels.php");

$prefix = "‏"; // HACK TO PREVENT PING-PONG USING U+200F Right-To-Left Mark &#8207;         "‏" http://stackoverflow.com/questions/17978720/invisible-characters-ascii

// Only registered channels can broadcast.
if (empty($channels[$_POST["token"]])) die;

// Prevent reposting bot texts.
if (substr($_POST["text"], 0, strlen($prefix)) === $prefix) die;

foreach ($channels as $token => $url) {

    // Skip the channel that is broadcasting.
    if ($_POST["token"] === $token) continue;
    
    // Post to all other channels.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        "payload" => json_encode([
            "text" => "{$prefix}{$_POST['text']}",
            "username" => "Fwd: {$_POST['user_name']} ({$_POST['team_domain']}#{$_POST['channel_name']})",
        ])
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);
    
}