<?php
session_start();
// Liste des catégorie d'exercice de mon site

$categories = [
    [
        "num" => 1,
        "url_image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKYxUh-GFGjj34k2dgfUaACH9-SO9N0pDhKw&s",
        "Titre" => "Algorithme",
        "Description" => "Exercices sur les algorithmes."
    ],
    [
        "num" => 2,
        "url_image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtSjtynhlJLcf-snjNi9wi5tmQ_ZNZBnqObQ&s",
        "Titre" => "Javascript",
        "Description" => "Exercices sur le Javascript."
    ],
    [
        "num" => 3,
        "url_image" => "https://www.devopsschool.com/blog/wp-content/uploads/2022/03/php-programming-language.jpg",
        "Titre" => "PHP",
        "Description" => "Exercices sur le PHP."
    ],
    [
        "num" => 4,
        "url_image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlRgYF5hlKAy6OF6MeJ1u-0pAV-cXuf_ZVZw&s",
        "Titre" => "Langage C",
        "Description" => "Exercices sur le Langage C."
    ],
    [
        "num" => 5,
        "url_image" => "https://cdn.activestate.com/wp-content/uploads/2021/12/python-coding-mistakes.jpg",
        "Titre" => "Python",
        "Description" => "Exercices sur le Python."
    ],
    [
        "num" => 6,
        "url_image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLEhkzJgoJCZ4p-rT-2L5thU8eb_rd6pi-Hw&s",
        "Titre" => "JAVA",
        "Description" => "Exercices sur le JAVA."
    ],
]

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices par Catégorie - DevCommunity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            color: #00ff88;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .header p {
            color: #b0b0b0;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .stats-bar {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
            padding: 1.5rem;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            color: #00d4ff;
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .category-card:hover {
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.03), transparent);
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-icon {
            width: 100%;
            /* height: 80px; */
            /* background: linear-gradient(45deg, #00ff88, #00d4ff); */
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            /* box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3); */
        }

        .category-icon img{
            /* margin: 0 auto; */
            max-width: 100%;
            /* max-height: 100%; */
        }

        .category-title {
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .category-description {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .category-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .info-item {
            text-align: center;
        }

        .info-number {
            color: #00d4ff;
            font-size: 1.2rem;
            font-weight: 600;
            display: block;
        }

        .info-label {
            color: #888;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .difficulty-badges {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .difficulty-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .difficulty-beginner {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        .difficulty-intermediate {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .difficulty-advanced {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .access-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .access-btn:hover {
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.4);
        }

        .search-bar {
            max-width: 500px;
            margin: 0 auto 2rem;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.5rem;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 25px;
            color: #ffffff;
            font-size: 1rem;
        }

        .search-input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .search-input::placeholder {
            color: #888;
        }

        .filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.7rem 1.5rem;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .filter-btn:hover, .filter-btn.active {
            background: rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.5);
        }

        .recent-exercises {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .recent-title {
            color: #00ff88;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .recent-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
        }

        .recent-item {
            background: rgba(0, 255, 136, 0.05);
            padding: 1rem;
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .recent-item-title {
            color: #ffffff;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .recent-item-meta {
            color: #888;
            font-size: 0.8rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .stats-bar {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .category-info {
                flex-direction: column;
                gap: 1rem;
            }

            .filters {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
         <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
        
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>

        <div class="header">
            <h1>Exercices de Programmation</h1>
            <p>Améliorez vos compétences avec nos exercices pratiques organisés par catégorie et niveau de difficulté</p>
        </div>

        <!-- <div class="stats-bar">
            <div class="stat-item">
                <span class="stat-number">1,247</span>
                <span class="stat-label">Exercices</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">15</span>
                <span class="stat-label">Catégories</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">8,934</span>
                <span class="stat-label">Solutions</span>
            </div>
        </div> -->

        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Rechercher une catégorie d'exercices...">
        </div>

        <div class="filters">
            <a href="#" class="filter-btn active">Toutes</a>
            <a href="#" class="filter-btn">Débutant</a>
            <a href="#" class="filter-btn">Intermédiaire</a>
            <a href="#" class="filter-btn">Avancé</a>
            <a href="#" class="filter-btn">Avec corrigés</a>
        </div>

        <div class="categories-grid">
            <!-- Catégorie Algorithmes -->
            <?php foreach ($categories as $category): ?>
                <div class="category-card">
                    <div class="category-icon">
                        <img src="<?= $category['url_image']; ?>" alt="Image de la catégorie ">
                    </div>
                    <h2 class="category-title"><?php echo $category['Titre']; ?></h2>
                    <p class="category-description">
                        <?php echo $category['Description']; ?>
                    </p>
                    <!-- <div class="category-info">
                        <div class="info-item">
                            <span class="info-number">156</span>
                            <span class="info-label">Exercices</span>
                        </div>
                        <div class="info-item">
                            <span class="info-number">12</span>
                            <span class="info-label">Chapitres</span>
                        </div>
                        <div class="info-item">
                            <span class="info-number">89%</span>
                            <span class="info-label">Corrigés</span>
                        </div>
                    </div> -->
                    <!-- <div class="difficulty-badges">
                        <span class="difficulty-badge difficulty-beginner">Débutant</span>
                        <span class="difficulty-badge difficulty-intermediate">Intermédiaire</span>
                        <span class="difficulty-badge difficulty-advanced">Avancé</span>
                    </div> -->
                    <a href="/monblug/exercices/list/content/page?num=<?php echo $category['num']; ?>" class="access-btn">Accéder aux exercices</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
        <?php
            if(!empty($_SESSION['user'])){
                include(__DIR__.'/../../navbar/footer.php');
            }
        ?>
    <script>
        // Filtres
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                console.log('Filtre sélectionné:', this.textContent);
            });
        });

        // Recherche
        document.querySelector('.search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.category-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.category-title').textContent.toLowerCase();
                const description = card.querySelector('.category-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = searchTerm ? 'none' : 'block';
                }
            });
        });

        // Boutons d'accès
        document.querySelectorAll('.access-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    const categoryTitle = this.closest('.category-card').querySelector('.category-title').textContent;
                    alert(`Redirection vers les exercices: ${categoryTitle}`);
                }
            });
        });
    </script>
</body>
</html>