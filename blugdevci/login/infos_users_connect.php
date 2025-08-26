<?php
// Fonction pour détecter l'OS
function detectOS($user_agent) {
    $os_array = array(
        '/windows nt 11/i'     => 'Windows 11',
        '/windows nt 10/i'     => 'Windows 10',
        '/windows nt 6.3/i'    => 'Windows 8.1',
        '/windows nt 6.2/i'    => 'Windows 8',
        '/windows nt 6.1/i'    => 'Windows 7',
        '/macintosh|mac os x/i'=> 'Mac OS X',
        '/linux/i'             => 'Linux',
        '/iphone/i'            => 'iPhone',
        '/android/i'           => 'Android'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            return $value;
        }
    }
    return "OS Inconnu";
}

// Fonction pour détecter le navigateur
function detectBrowser($user_agent) {
    $browser_array = array(
        '/msie/i'    => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i'  => 'Safari',
        '/chrome/i'  => 'Chrome',
        '/edge/i'    => 'Edge',
        '/opera/i'   => 'Opera'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            return $value;
        }
    }
    return "Navigateur Inconnu";
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip         = $_SERVER['REMOTE_ADDR'];
$os         = detectOS($user_agent);
$browser    = detectBrowser($user_agent);
$date       = date("Y-m-d H:i:s");

// Empreinte unique (facultatif)
$empreinte = hash('sha256', $ip . $os . $browser);

// Format de la ligne à écrire
$log = "$date | IP: $ip | OS: $os | Navigateur: $browser | Empreinte: $empreinte" . PHP_EOL;

// Écriture sécurisée dans le fichier
$file = fopen("logs_connexions.txt", "a");
if ($file) {
    flock($file, LOCK_EX); // Verrou pour éviter conflits d'écriture
    fwrite($file, $log);
    flock($file, LOCK_UN);
    fclose($file);
}
?>
