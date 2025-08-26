
<?php
include(__DIR__.'/../../login/connexion.php'); // Assurez-vous que $pdo est une connexion PDO
session_start(); // Démarrer une session

$messageSucces = "";

if (isset($_POST['ajouter'])) {
    // Vérification des champs non vides
    if (!empty($_POST['travailetudiant'])) {
                        // Requête pour récupérer le dernier enregistrement
                        $query = $pdo->query("SELECT * FROM traitement ORDER BY id DESC LIMIT 1");

                        // Récupération des données
                        $lastElement = $query->fetch(PDO::FETCH_ASSOC);        
                    // Récupération et sécurisation des données du formulaire
                    $travailetudiant = $_POST['travailetudiant'];
                    $idusers = $_SESSION['user']['id_user'];
                    $idtestalgo =  $lastElement['id'];
                    $temps = date('Y-m-d H:i:s');

                     // Préparation de la requête d'insertion
                $sql = $pdo->prepare("
                INSERT INTO traitement (idusers, idtestalgo, travailetudiant, temps) 
                VALUES (:idusers, :idtestalgo, :travailetudiant, :temps)
            ");
             // Liaison des paramètres
             $sql->bindValue(':idusers', $idusers);
             $sql->bindValue(':idtestalgo', $idtestalgo);
             $sql->bindValue(':travailetudiant', $travailetudiant);
             $sql->bindValue(':temps', $temps);

                            
                // Exécution de la requête
                $succes = $sql->execute();

                
                if ($succes) {
                    // Récupérer les données de l'utilisateur nouvellement inscrit
                    $testalgoId = $pdo->lastInsertId();
                    $testalgoQuery = $pdo->prepare("SELECT * FROM traitement WHERE id = :id");
                    $testalgoQuery->bindValue(':id', $testalgoId);
                    $testalgoQuery->execute();
                    $testalgoData = $testalgoQuery->fetch(PDO::FETCH_ASSOC);

                    // Stocker les données dans la session
                    $_SESSION['textalgo'] = [
                        'id' => $testalgoData['id'],
                        'idusers' => $testalgoData['idusers'],
                        'idtestalgo' => $testalgoData['idtestalgo'],
                        'travailetudiant' => $testalgoData['travailetudiant']
                    ];

                    // Redirection vers l'accueil
                    header("LOCATION: /monblug/home/algoritme/exercie/send_is_success");
                    exit();
                } else {
                    echo "Erreur lors de l'envoi. Veuillez réessayer ou rassurez-vous d'etre connecté.";
                }
                }

    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Algorithmique</title>
    <style>
        /* Styles de base */
        :root {
            --primary-color: #3f51b5;
            --primary-dark: #303f9f;
            --accent-color: #ff4081;
            --background-color: #f5f7fa;
            --card-color: #ffffff;
            --text-color: #333333;
            --text-light: #757575;
            --border-radius: 8px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            animation: fadeIn 0.8s ease-out;
        }
        
        /* Titre principal */
        .testerAlgo {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(63, 81, 181, 0.2);
            animation: slideDown 0.8s ease-out;
        }
        
        .testerAlgo h1 {
            color: var(--primary-color);
            font-size: 2.8rem;
            margin-bottom: 0.8rem;
            letter-spacing: 0.5px;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }
        
        .testerAlgo h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            transform: translateX(-50%);
            border-radius: 4px;
            animation: expandWidth 1.2s ease-out;
        }
        
        .testerAlgo p {
            color: var(--text-light);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            margin-top: 1.2rem;
        }
        
        /* Contenu principal */
        .main-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        /* Sections communes */
        .exercise-section, .solution-section, .result-section {
            background-color: var(--card-color);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        
        .exercise-section:hover, .solution-section:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        /* Section Exercice */
        .exercise-section {
            position: relative;
            animation: slideUp 0.7s ease-out;
            overflow: hidden;
        }
        
        .exercise-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background-color: var(--primary-color);
            border-top-left-radius: var(--border-radius);
            border-bottom-left-radius: var(--border-radius);
        }
        
        .test {
            display: block;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding-bottom: 0.8rem;
        }
        
        .exercise-section p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-color);
            margin-top: 1rem;
        }
        
        /* Section Solution */
        .solution-section {
            animation: slideUp 1s ease-out;
        }
        
        .solution-section h3 {
            color: var(--primary-color);
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .solution-section h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--accent-color);
            border-radius: 4px;
        }
        
        .solution-input {
            width: 100%;
            height: 240px;
            padding: 1rem;
            font-family: 'Consolas', monospace;
            font-size: 1rem;
            color: #333;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            resize: vertical;
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }
        
        .solution-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(63, 81, 181, 0.2);
        }
        
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: block;
            margin-left: auto;
            position: relative;
            overflow: hidden;
        }
        
        .submit-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
            z-index: 1;
        }
        
        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(63, 81, 181, 0.3);
        }
        
        .submit-btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .submit-btn:active {
            transform: translateY(1px);
        }
        
        .submit-btn span {
            position: relative;
            z-index: 2;
        }
        
        /* Section Résultat */
        .result-section {
            animation: slideUp 1.2s ease-out;
            display: none;
        }
        
        .result-section.hidden {
            display: none;
        }
        
        .result-display {
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 6px;
            font-family: 'Consolas', monospace;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #e2e8f0;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(40px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideDown {
            from { 
                opacity: 0;
                transform: translateY(-30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes expandWidth {
            from { width: 0; }
            to { width: 60px; }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .testerAlgo h1 {
                font-size: 2.2rem;
            }
            
            .testerAlgo p {
                font-size: 1.1rem;
            }
            
            .exercise-section, .solution-section, .result-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="testerAlgo">
        <h1>Test Algorithmique</h1>
        <p>Résolvez l'exercice et soumettez votre solution ci-dessous.</p>
        </div>
        <main class="main-content">
            <section>
            <?php

// Requête pour récupérer le dernier enregistrement
$query = $pdo->query("SELECT * FROM exercices_algo ORDER BY id_exercice DESC LIMIT 1");

// Récupération des données
$lastElement = $query->fetch(PDO::FETCH_ASSOC);

// Affichage du résultat
if ($lastElement) {
    echo '<b class="test">' .$lastElement['titre'].'</b>'; // Affiche les détails du dernier enregistrement
    echo "<p>".$lastElement['libelle']."</p>";
} else {
    echo "Aucun enregistrement trouvé.";
}
?>
            </section>
            
            <!-- Section de Soumission -->
            <section class="solution-section">
                <h3>Soumettez votre solution</h3>
                <form action="" method="POST">
                    <textarea id="user-solution" name="travailetudiant" class="solution-input" placeholder="Écrivez votre code ici..."></textarea>
                    <button id="submit-solution" class="submit-btn" name="ajouter"><span>Envoyer</span></button>
                </form>
            </section>
            
            <!-- Résultat -->
            <section id="result-section" class="result-section hidden">
                <h3>Résultat</h3>
                <pre id="result-display" class="result-display"></pre>
            </section>
        </main>
    </div>

    <script>
        // Animations supplémentaires pour les interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Animation pour le textarea quand l'utilisateur commence à écrire
            const textarea = document.getElementById('user-solution');
            textarea.addEventListener('focus', function() {
                this.style.boxShadow = '0 0 0 3px rgba(63, 81, 181, 0.2)';
            });
            
            textarea.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
            
            // Animation de survol pour les sections
            const sections = document.querySelectorAll('.exercise-section, .solution-section');
            sections.forEach(section => {
                section.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                    this.style.boxShadow = '0 8px 24px rgba(0, 0, 0, 0.12)';
                });
                
                section.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'var(--shadow)';
                });
            });
            
            // Animation pour le bouton de soumission
            const submitBtn = document.getElementById('submit-solution');
            submitBtn.addEventListener('mousedown', function() {
                this.style.transform = 'translateY(2px)';
            });
            
            submitBtn.addEventListener('mouseup', function() {
                this.style.transform = 'translateY(-2px)';
            });
        });
    </script>

    <script src="script.js"></script>
</body>
</html>