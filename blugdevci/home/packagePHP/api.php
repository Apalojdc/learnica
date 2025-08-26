<?php
header('Content-Type: application/json');

$apiKey = 'AIzaSyBNG1awXqDp8_5RbbGUdc9Ms0LZJ3DvBcA';
// $apiKey = 'PLwLsbqvBlImFB8AuT6ENIg-s87ys4yGWI';

// ==========================================
// CONFIGURATION DES PLAYLISTS PAR CATÉGORIE
// ==========================================
// Pour ajouter une nouvelle catégorie :
// 1. Ajoute une ligne ici avec l'ID de ta playlist YouTube
// 2. Mets à jour le JavaScript (available: true)
// 3. Teste l'endpoint avec ?category=ta_categorie

$playlists = [
    // ✅ DISPONIBLE - Playlist configurée
    'php' => 'PLjwdMgw5TTLVDv-ceONHM_C19dPW1MAMD', // Ta playlist PHP actuelle
    'javascript' => 'PLwLsbqvBlImFB8AuT6ENIg-s87ys4yGWI', // Ta playlist PHP actuelle
    
    // ❌ PAS ENCORE CONFIGURÉ - Remplace par tes vraies playlists
    //'javascript' => 'PLxxxxxxxxxxxxxxxxxxxxxx', // Remplace par ton ID playlist JavaScript
    'python' => 'PLxxxxxxxxxxxxxxxxxxxxxx',     // Remplace par ton ID playlist Python
    'react' => 'PLxxxxxxxxxxxxxxxxxxxxxx',      // Remplace par ton ID playlist React
    'nodejs' => 'PLxxxxxxxxxxxxxxxxxxxxxx',     // Remplace par ton ID playlist Node.js
    'vue' => 'PLxxxxxxxxxxxxxxxxxxxxxx',        // Remplace par ton ID playlist Vue.js
    'angular' => 'PLxxxxxxxxxxxxxxxxxxxxxx',    // Remplace par ton ID playlist Angular
    'laravel' => 'PLxxxxxxxxxxxxxxxxxxxxxx',    // Remplace par ton ID playlist Laravel
    
    // ==========================================
    // COMMENT AJOUTER UNE NOUVELLE CATÉGORIE :
    // ==========================================
    // 'docker' => 'PLyour_docker_playlist_id',
    // 'aws' => 'PLyour_aws_playlist_id',
    // 'typescript' => 'PLyour_typescript_playlist_id',
];

// ==========================================
// RÉCUPÉRATION ET VALIDATION DE LA CATÉGORIE
// ==========================================
$category = $_GET['category'] ?? 'php'; // Défaut : PHP si pas de catégorie spécifiée

// Log de débogage (optionnel - retire en production)
error_log("API appelée pour la catégorie: " . $category);

// Vérification si la catégorie existe dans notre configuration
if (!isset($playlists[$category])) {
    http_response_code(400);
    echo json_encode([
        'error' => 'Catégorie non trouvée',
        'category_requested' => $category,
        'available_categories' => array_keys($playlists),
        'message' => 'Utilisez ?category=php pour tester'
    ]);
    exit;
}

$playlistId = $playlists[$category];

// Vérification que l'ID de playlist n'est pas un placeholder
if (strpos($playlistId, 'PLxxxxx') !== false) {
    http_response_code(503);
    echo json_encode([
        'error' => 'Catégorie non configurée',
        'category' => $category,
        'message' => 'Cette catégorie n\'a pas encore de playlist configurée. Mettez à jour le tableau $playlists dans le PHP.',
        'instruction' => 'Remplacez PLxxxxxxxxxxxxxxxxxxxxxx par votre vraie playlist ID'
    ]);
    exit;
}

// ==========================================
// SYSTÈME DE CACHE PAR CATÉGORIE
// ==========================================
$cacheFile = __DIR__ . "/cache_playlist_{$category}.json";
$cacheDuration = 3600; // 1 heure

function fetchPlaylistVideos($apiKey, $playlistId, $category) {
    $videos = [];
    $nextPageToken = '';
    
    do {
        $url = "https://www.googleapis.com/youtube/v3/playlistItems?key={$apiKey}&playlistId={$playlistId}&part=snippet&maxResults=50&pageToken={$nextPageToken}";
        $response = @file_get_contents($url);
        
        if ($response === false) {
            error_log("Erreur API YouTube pour la catégorie: {$category}");
            break;
        }
        
        $data = json_decode($response, true);
        if (!isset($data['items'])) {
            error_log("Pas d'items dans la réponse API pour: {$category}");
            break;
        }

        foreach ($data['items'] as $item) {
            $snippet = $item['snippet'];
            // Vérifie que la vidéo n'est pas supprimée / privée
            if (isset($snippet['resourceId']['videoId'])) {
                $videos[] = [
                    'videoId' => $snippet['resourceId']['videoId'],
                    'title' => $snippet['title'],
                    'description' => $snippet['description'],
                    'thumbnail' => $snippet['thumbnails']['medium']['url'],
                    'publishedAt' => $snippet['publishedAt'],
                    'category' => $category // Ajout de la catégorie pour le suivi
                ];
            }
        }

        $nextPageToken = $data['nextPageToken'] ?? '';
    } while ($nextPageToken != '');

    return $videos;
}

// ==========================================
// GESTION DU CACHE
// ==========================================
// Vérifie si on a un cache valide pour cette catégorie
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheDuration) {
    // Utilise le cache existant
    echo file_get_contents($cacheFile);
    exit;
}

// ==========================================
// RÉCUPÉRATION DES VIDÉOS DEPUIS YOUTUBE
// ==========================================
$videos = fetchPlaylistVideos($apiKey, $playlistId, $category);

// Vérification que des vidéos ont été récupérées
if (empty($videos)) {
    http_response_code(404);
    echo json_encode([
        'error' => 'Aucune vidéo trouvée',
        'category' => $category,
        'playlist_id' => $playlistId,
        'message' => 'Vérifiez que votre playlist ID est correct et que la playlist est publique'
    ]);
    exit;
}

// ==========================================
// SAUVEGARDE EN CACHE ET RETOUR DES DONNÉES
// ==========================================
$jsonData = json_encode($videos);
file_put_contents($cacheFile, $jsonData);

// Log de succès (optionnel)
error_log("Succès: {count($videos)} vidéos récupérées pour {$category}");

echo $jsonData;

/*
==========================================
GUIDE D'UTILISATION :
==========================================

1. TESTER L'API :
   - http://votre-site.com/path/to/api.php?category=php (✅ marche)
   - http://votre-site.com/path/to/api.php?category=javascript (❌ pas encore configuré)

2. AJOUTER UNE NOUVELLE CATÉGORIE :
   - Trouve l'ID de ta playlist YouTube (après /playlist?list=)
   - Remplace PLxxxxxxxxxxxxxxxxxxxxxx par ton ID réel
   - Met available: true dans le JavaScript
   - Teste l'endpoint

3. DÉBOGUER :
   - Regarde les logs d'erreur PHP
   - Vérifie que ta playlist est publique
   - Teste directement l'URL YouTube API dans ton navigateur

4. OPTIMISATIONS POSSIBLES :
   - Augmenter le cacheDuration pour moins d'appels API
   - Ajouter une validation de l'API key
   - Implémenter un système de refresh du cache

==========================================
*/