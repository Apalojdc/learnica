<?php
    // Connexion a la base de données
    // session_start();
    include(__DIR__."/../../../phpqrcode/qrlib.php");
    include(__DIR__."/../../login/connexion.php");

    $query = $pdo->prepare('SELECT * FROM exercices_algo ORDER BY id_exercice DESC');
    $query->execute();
    $exercices = $query->fetchAll(PDO::FETCH_ASSOC);

    // $recup_corrige = $pdo->prepare('SELECT corrige FROM exercices_algo WHERE id_exercice = :num');
    // include(__DIR__."/../../../phpqrcode/qrlib.php");

    // Le contenue du QR code
    $contenu = 'Salut, je suis Coulibaly Apalo, developpeur informatique. n/ Pour me joindre, contactez le +2250506938224';
    // $contenu_json = json_encode($contenu);

    //Enregistrer le qr code dans un dossier
    $fichier= __DIR__."/../../../code/codeqr.png";

    // Generation du qr code

    QRcode::png($contenu, $fichier, QR_ECLEVEL_L, 2, 2);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices d'Algorithme</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #ffffff;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Particles Background Effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 255, 136, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .header {
            text-align: center;
            padding: 80px 0 60px 0;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .header p {
            font-size: 1.3rem;
            color: #b0b0b0;
            margin-bottom: 2.5rem;
            font-weight: 300;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .filters {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }

        .filter-btn {
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 255, 136, 0.3);
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            color: #b0b0b0;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .filter-btn:hover::before {
            left: 100%;
        }

        .filter-btn:hover, .filter-btn.active {
            color: #00ff88;
            border-color: rgba(0, 255, 136, 0.6);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        }

        .filter-btn.active {
            background: linear-gradient(45deg, rgba(0, 255, 136, 0.1), rgba(0, 212, 255, 0.1));
        }

        .exercises-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-bottom: 80px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .exercise-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 25px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
        }

        .exercise-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
            border-radius: 25px 25px 0 0;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .exercise-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 255, 136, 0.4);
            border-color: rgba(0, 255, 136, 0.6);
        }

        .card-header {
            padding: 30px;
            border-bottom: 1px solid rgba(0, 255, 136, 0.1);
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .card-meta {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .difficulty-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .difficulty-easy {
            background: linear-gradient(45deg, rgba(0, 255, 136, 0.2), rgba(0, 255, 136, 0.1));
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        .difficulty-medium {
            background: linear-gradient(45deg, rgba(255, 193, 7, 0.2), rgba(255, 193, 7, 0.1));
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .difficulty-hard {
            background: linear-gradient(45deg, rgba(220, 53, 69, 0.2), rgba(220, 53, 69, 0.1));
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .category-tag {
            padding: 6px 14px;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            color: #00d4ff;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid rgba(0, 212, 255, 0.2);
        }

        .card-description {
            font-size: 14px;
            color: #b0b0b0;
            line-height: 1.7;
        }

        .card-footer {
            padding: 20px 30px;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .time-estimate {
            font-size: 12px;
            color: #b0b0b0;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            font-weight: 700;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        .btn-secondary:hover {
            border-color: rgba(0, 255, 136, 0.6);
            background: linear-gradient(45deg, rgba(0, 255, 136, 0.1), rgba(0, 212, 255, 0.1));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.2);
        }
        /* Corrige part */
        .corrige{
            padding: 12px 16px;
            background: #fff;
            color: #000;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 134, 134, 0.47);
            margin-top: 12px;
            display: none;
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .header h1 {
                font-size: 2.5rem;
            }

            .header p {
                font-size: 1.1rem;
            }

            .exercises-list {
                gap: 20px;
                max-width: 100%;
            }

            .filters {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .card-footer {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .card-header {
                padding: 20px;
            }

            .card-footer {
                padding: 15px 20px;
            }
        }

        @media (max-width: 480px) {
            .header {
                padding: 60px 0 40px 0;
            }

            .header h1 {
                font-size: 2rem;
            }

            .exercises-list {
                gap: 15px;
            }

            .exercise-card {
                border-radius: 20px;
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
            <h1>Exercices pour Développeurs et Passionnés</h1>
            <p>Explorez une collection d'exercices variés pour tous les niveaux : algorithmes, logique, programmation et défis créatifs. 
            Progressez à votre rythme, améliorez vos compétences et préparez-vous à résoudre de vrais problèmes techniques.</p>
            
            <div class="filters">
                <a href="#" class="filter-btn active">Tous</a>
                <a href="#" class="filter-btn">Facile</a>
                <a href="#" class="filter-btn">Moyen</a>
                <a href="#" class="filter-btn">Difficile</a>
                <!-- <a href="#" class="filter-btn">Tri</a>
                <a href="#" class="filter-btn">Graphes</a>
                <a href="#" class="filter-btn">Programmation Dynamique</a>
                <a href="#" class="filter-btn">Structures de Données</a> -->
            </div>
        </div>

        <div class="exercises-list">
            <!-- Exercice 1 -->
             <?php foreach($exercices as $exercice): ?>
                <div class="exercise-card fade-in">
                    <div class="card-header">
                        <h3 class="card-title"><?= htmlspecialchars($exercice['titre']) ?></h3>
                        <div class="card-meta">
                            <span class="difficulty-badge difficulty-easy">Facile</span>
                            <span class="category-tag">Arrays</span>
                        </div>
                        <p class="card-description">
                            <?= htmlspecialchars($exercice['libelle']) ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="time-estimate">
                            ⏱️ ~<?= htmlspecialchars($exercice['temps']) ?>
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-secondary" id="corrigeBtn<?= $exercice['id_exercice'] ?>" onclick="showCorrection(<?= $exercice['id_exercice'] ?>)">corrigé</button>
                            <a href="#" class="btn btn-primary" style="display:none">Résoudre</a>
                        </div>
                    </div>
                </div>
                    <div class="corrige" style="display:none" id="corrigePopup<?= $exercice['id_exercice'] ?>">
                        <div class="corrige_content">
                            <h3 class="card-title">Voici la correction de l'exercice :</h3>
                            <pre>
                                <code>
                                    <?= htmlspecialchars_decode($exercice['corrige']) ?>
                                </code>
                            </pre>
                            <div class="qr-code">
                                <h4>QR Code de l'exercice :</h4>
                                <img src="../../../code/codeqr.png" alt="QR Code">
                            </div>
                        </div>
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

        function showCorrection(id){
            const popup = document.getElementById(`corrigePopup${id}`);
            const btnSecondary = document.getElementById(`corrigeBtn${id}`);
            btnSecondary.textContent = (popup.style.display === "block") ? "corrigé" : "fermer x";
            if(popup.style.display==="block"){
                popup.style.display = 'none';
            }else{
                popup.style.display = 'block';
            }
            // popup.style.display = 'block';
        }
        // Système de filtrage
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Retirer la classe active de tous les boutons
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                
                const filter = this.textContent.toLowerCase();
                const cards = document.querySelectorAll('.exercise-card');
                
                cards.forEach(card => {
                    const difficulty = card.querySelector('.difficulty-badge').textContent.toLowerCase();
                    const category = card.querySelector('.category-tag').textContent.toLowerCase();
                    
                    if (filter === 'tous' || 
                        difficulty.includes(filter) || 
                        category.includes(filter.replace('programmation dynamique', 'dp'))) {
                        card.style.display = 'block';
                        card.style.animation = 'fadeInUp 0.6s ease-out';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Animation d'apparition au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Animation au clic sur les cartes
        document.querySelectorAll('.exercise-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Éviter le clic si on clique sur un bouton
                if (e.target.classList.contains('btn') || e.target.closest('.btn')) {
                    return;
                }
                
                // Animation de clic
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                console.log('Exercice sélectionné:', this.querySelector('.card-title').textContent);
            });
        });

        // Effet de particules amélioré
        function createParticle() {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.width = '2px';
            particle.style.height = '2px';
            particle.style.background = Math.random() > 0.5 ? '#00ff88' : '#00d4ff';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '1';
            particle.style.opacity = '0.6';
            
            const startX = Math.random() * window.innerWidth;
            const startY = Math.random() * window.innerHeight;
            
            particle.style.left = startX + 'px';
            particle.style.top = startY + 'px';
            
            document.body.appendChild(particle);
            
            const duration = 3000 + Math.random() * 2000;
            const distance = 100 + Math.random() * 200;
            const angle = Math.random() * Math.PI * 2;
            
            const endX = startX + Math.cos(angle) * distance;
            const endY = startY + Math.sin(angle) * distance;
            
            particle.animate([
                { 
                    transform: 'translate(0, 0) scale(0)', 
                    opacity: 0 
                },
                { 
                    transform: `translate(${(endX - startX) * 0.5}px, ${(endY - startY) * 0.5}px) scale(1)`, 
                    opacity: 0.6 
                },
                { 
                    transform: `translate(${endX - startX}px, ${endY - startY}px) scale(0)`, 
                    opacity: 0 
                }
            ], {
                duration: duration,
                easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
            }).onfinish = () => {
                particle.remove();
            };
        }

        // Créer des particules périodiquement
        setInterval(createParticle, 2000);
    </script>
</body>
</html>