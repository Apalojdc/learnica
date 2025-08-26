<?php 
// error_reporting(E_ALL);
// ini_set('display_errors',1);
include('config.php');
//include('imageconfig.php');
// function assets($path){
//         return BASE_URL.'/'. ltrim($path,'/');
//      }
//include(__DIR__.'/login/connexion.php');

?>
<?php 
// include(__DIR__.'/../../header/header.php');
?>
<body>
 <?php 
//  include(__DIR__.'/../../navbar/NavBarIndex.php');
 ?>
    <div class="container">
        <h1>Qu'est-ce que le Machine Learning ?</h1>
        <div class="description">
            <p>
                Le <strong>Machine Learning</strong> (apprentissage automatique) est une branche de l’intelligence artificielle 
                qui permet aux machines d'apprendre et de s’améliorer à partir de données, sans être explicitement programmées.
                Il repose sur des algorithmes qui utilisent des données pour identifier des patterns et des relations, permettant 
                ainsi de prédire ou de prendre des décisions.
            </p>
        </div>

        <h2>Langages de Programmation pour le Machine Learning</h2>
        <div class="languages">
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/JavaScript_logo_2.svg" alt="Python">
                <h3>Python</h3>
                <p>Python est le langage le plus populaire en Machine Learning grâce à sa simplicité et ses bibliothèques comme 
                    <code>scikit-learn</code>, <code>TensorFlow</code>, et <code>PyTorch</code>.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/Swift_logo.svg" alt="R">
                <h3>R</h3>
                <p>R est utilisé dans les statistiques et l’analyse de données. Il est largement utilisé pour les algorithmes 
                    statistiques et les visualisations avancées.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/47/JavaLogo.svg" alt="Java">
                <h3>Java</h3>
                <p>Java est populaire pour les applications à grande échelle et les systèmes d'apprentissage automatisé en raison 
                    de sa performance et de sa stabilité.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/73/C%2B%2B_logo.svg" alt="C++">
                <h3>C++</h3>
                <p>C++ est souvent utilisé dans des systèmes où les performances sont critiques, comme les applications en temps réel.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Julia_logo.svg" alt="Julia">
                <h3>Julia</h3>
                <p>Julia est un langage à haute performance pour le calcul scientifique et est utilisé dans les systèmes complexes 
                    de Machine Learning.</p>
            </div>
            <div class="language-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Matlab_Logo.png" alt="MATLAB">
                <h3>MATLAB</h3>
                <p>MATLAB est couramment utilisé dans la recherche et l'analyse numérique pour le Machine Learning et l’optimisation.</p>
            </div>
        </div>
        <h1>10 Concepts Clés sur le Machine Learning</h1>
        <div class="concepts">
            <div class="concept-card">
                <h3>1. Définition</h3>
                <p>Le Machine Learning (ML) est une branche de l'intelligence artificielle qui permet aux machines d'apprendre à partir des données sans être explicitement programmées.</p>
            </div>
            <div class="concept-card">
                <h3>2. Supervised Learning</h3>
                <p>Un type d'apprentissage où le modèle est entraîné sur des données étiquetées (entrée et sortie connues).</p>
            </div>
            <div class="concept-card">
                <h3>3. Unsupervised Learning</h3>
                <p>Dans ce cas, le modèle explore des données non étiquetées pour trouver des structures ou des relations.</p>
            </div>
            <div class="concept-card">
                <h3>4. Algorithms</h3>
                <p>Les algorithmes populaires incluent les régressions, les arbres de décision, les réseaux neuronaux, etc.</p>
            </div>
            <div class="concept-card">
                <h3>5. Dataset</h3>
                <p>Les données sont au cœur du Machine Learning. La qualité et la quantité des données influencent fortement les performances.</p>
            </div>
            <div class="concept-card">
                <h3>6. Overfitting</h3>
                <p>Se produit lorsque le modèle est trop complexe et qu'il apprend le bruit des données au lieu des tendances.</p>
            </div>
            <div class="concept-card">
                <h3>7. Cross-validation</h3>
                <p>Une technique pour évaluer les performances d'un modèle en le testant sur des parties des données non utilisées pour l'entraînement.</p>
            </div>
            <div class="concept-card">
                <h3>8. Feature Engineering</h3>
                <p>Le processus de sélection, création ou transformation de caractéristiques (features) pour améliorer les performances du modèle.</p>
            </div>
            <div class="concept-card">
                <h3>9. Hyperparameters</h3>
                <p>Les hyperparamètres sont des valeurs définies avant l'entraînement qui contrôlent le comportement du modèle.</p>
            </div>
            <div class="concept-card">
                <h3>10. Applications</h3>
                <p>Le Machine Learning est utilisé dans de nombreux domaines, tels que la reconnaissance d'images, les systèmes de recommandation, et plus encore.</p>
            </div>
        </div>
    </div>
 <?php include(__DIR__.'/../../navbar/footer.php'); ?>
</body>
</html>
