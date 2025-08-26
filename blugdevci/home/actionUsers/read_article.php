<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - Les nouveautés JavaScript 2024</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .areader-main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
        }

        .areader-article-wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        .areader-back-button {
            display: inline-flex;
            align-items: center;
            color: #00ff88;
            text-decoration: none;
            margin-bottom: 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            gap: 0.5rem;
        }

        .areader-back-button:hover {
            transform: translateX(-5px);
            color: #ffffff;
        }

        .areader-hero-image {
            width: 100%;
            height: 400px;
            background: linear-gradient(45deg, #2a2a2a, #3a3a3a);
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        }

        .areader-hero-image::after {
            content: '🖼️';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            opacity: 0.3;
        }

        .areader-article-meta {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .areader-article-category {
            display: inline-block;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .areader-article-title {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ffffff, #b0b0b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .areader-meta-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .areader-meta-item {
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        .areader-meta-label {
            color: #00d4ff;
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .areader-article-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .areader-stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .areader-stat-button {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }

        .areader-stat-button:hover {
            border-color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
        }

        .areader-stat-button.areader-liked {
            border-color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
        }

        .areader-stat-button.areader-disliked {
            border-color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .areader-article-content {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .areader-article-content h2 {
            color: #00ff88;
            margin: 2rem 0 1rem 0;
            font-size: 1.5rem;
        }

        .areader-article-content p {
            margin-bottom: 1.5rem;
            color: #e0e0e0;
        }

        .areader-comments-section {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .areader-comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .areader-comments-title {
            font-size: 1.5rem;
            color: #ffffff;
        }

        .areader-toggle-comments {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .areader-toggle-comments:hover {
            transform: scale(1.05);
        }

        .areader-comment-form {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .areader-comment-input {
            width: 100%;
            min-height: 100px;
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 1rem;
            color: #ffffff;
            font-family: inherit;
            font-size: 1rem;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .areader-comment-input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .areader-submit-comment {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000000;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .areader-submit-comment:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 255, 136, 0.3);
        }

        .areader-comments-list {
            display: none;
        }

        .areader-comments-list.areader-visible {
            display: block;
        }

        .areader-comment-item {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .areader-comment-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
        }

        .areader-comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .areader-comment-author {
            font-weight: 600;
            color: #00d4ff;
        }

        .areader-comment-date {
            color: #888;
            font-size: 0.9rem;
        }

        .areader-comment-text {
            color: #e0e0e0;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .areader-comment-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .areader-comment-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            padding: 0.3rem 0.8rem;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.9rem;
        }

        .areader-comment-btn:hover {
            border-color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
        }

        .areader-comment-btn.areader-liked {
            border-color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
        }

        .areader-comment-btn.areader-disliked {
            border-color: #ff6b6b;
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .areader-article-wrapper {
                padding: 1rem;
            }

            .areader-article-title {
                font-size: 2rem;
            }

            .areader-hero-image {
                height: 250px;
            }

            .areader-article-stats {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="areader-main-container">
        <div class="areader-article-wrapper">
            <!-- Bouton retour -->
            <a href="#" class="areader-back-button">
                ← Retour aux articles
            </a>

            <!-- Image principale -->
            <div class="areader-hero-image"></div>

            <!-- Métadonnées de l'article -->
            <div class="areader-article-meta">
                <span class="areader-article-category">Tech</span>
                <h1 class="areader-article-title">Les nouveautés JavaScript en 2024</h1>
                
                <div class="areader-meta-info">
                    <div class="areader-meta-item">
                        <span class="areader-meta-label">Auteur:</span>
                        <span>Alexandre Dupont</span>
                    </div>
                    <div class="areader-meta-item">
                        <span class="areader-meta-label">Publié le:</span>
                        <span>15 Mars 2024</span>
                    </div>
                    <div class="areader-meta-item">
                        <span class="areader-meta-label">Mis à jour le:</span>
                        <span>20 Mars 2024</span>
                    </div>
                    <div class="areader-meta-item">
                        <span class="areader-meta-label">Temps de lecture:</span>
                        <span>5 minutes</span>
                    </div>
                </div>

                <div class="areader-article-stats">
                    <div class="areader-stat-item">
                        <button class="areader-stat-button" id="likeBtn">
                            <span>❤️</span>
                            <span id="likeCount">42</span>
                        </button>
                    </div>
                    <div class="areader-stat-item">
                        <button class="areader-stat-button" id="dislikeBtn">
                            <span>👎</span>
                            <span id="dislikeCount">3</span>
                        </button>
                    </div>
                    <div class="areader-stat-item">
                        <span style="color: #b0b0b0;">💬 <span id="commentCount">8</span> commentaires</span>
                    </div>
                </div>
            </div>

            <!-- Contenu de l'article -->
            <div class="areader-article-content">
                <p>JavaScript continue d'évoluer rapidement, et 2024 apporte son lot de nouveautés passionnantes qui vont révolutionner notre façon de développer. Dans cet article, nous explorerons les fonctionnalités les plus importantes qui arrivent cette année.</p>

                <h2>Les nouvelles fonctionnalités syntaxiques</h2>
                <p>L'une des améliorations les plus attendues concerne la gestion des types avec des propositions comme le pattern matching et les types optionnels. Ces fonctionnalités permettront d'écrire du code plus robuste et plus expressif.</p>

                <p>Le pattern matching, inspiré de langages fonctionnels, offre une syntaxe élégante pour traiter différents cas de figure dans nos applications. Couplé aux nouveaux opérateurs de nullish coalescing étendus, il devient possible d'écrire du code beaucoup plus concis.</p>

                <h2>Performance et optimisations</h2>
                <p>Les moteurs JavaScript ont également bénéficié d'optimisations significatives. Les nouvelles APIs de Web Workers permettent maintenant une meilleure gestion du multithreading, tandis que les améliorations du garbage collector réduisent les pauses lors de l'exécution.</p>

                <p>Ces avancées ouvrent la voie à des applications web plus performantes et plus réactives, capables de rivaliser avec les applications natives sur de nombreux aspects.</p>

                <h2>Écosystème et tooling</h2>
                <p>L'écosystème JavaScript s'enrichit constamment avec de nouveaux outils et frameworks. Les build tools deviennent plus rapides, les frameworks plus légers, et l'expérience développeur continue de s'améliorer.</p>

                <p>En conclusion, 2024 s'annonce comme une année charnière pour JavaScript, avec des innovations qui vont faciliter le développement tout en améliorant les performances des applications web.</p>
            </div>

            <!-- Section commentaires -->
            <div class="areader-comments-section">
                <div class="areader-comments-header">
                    <h3 class="areader-comments-title">Commentaires (8)</h3>
                    <button class="areader-toggle-comments" id="toggleComments">
                        Afficher les commentaires
                    </button>
                </div>

                <!-- Formulaire d'ajout de commentaire -->
                <div class="areader-comment-form">
                    <textarea 
                        class="areader-comment-input" 
                        placeholder="Partagez votre avis sur cet article..."
                        id="commentInput"
                    ></textarea>
                    <button class="areader-submit-comment" id="submitComment">
                        Publier le commentaire
                    </button>
                </div>

                <!-- Liste des commentaires -->
                <div class="areader-comments-list" id="commentsList">
                    <div class="areader-comment-item">
                        <div class="areader-comment-header">
                            <span class="areader-comment-author">Marie Dubois</span>
                            <span class="areader-comment-date">Il y a 2 heures</span>
                        </div>
                        <div class="areader-comment-text">
                            Excellent article ! J'ai hâte de tester ces nouvelles fonctionnalités. Le pattern matching va vraiment changer la donne pour la lisibilité du code.
                        </div>
                        <div class="areader-comment-actions">
                            <button class="areader-comment-btn" data-action="like">
                                <span>❤️</span>
                                <span>12</span>
                            </button>
                            <button class="areader-comment-btn" data-action="dislike">
                                <span>👎</span>
                                <span>0</span>
                            </button>
                        </div>
                    </div>

                    <div class="areader-comment-item">
                        <div class="areader-comment-header">
                            <span class="areader-comment-author">Pierre Martin</span>
                            <span class="areader-comment-date">Il y a 4 heures</span>
                        </div>
                        <div class="areader-comment-text">
                            Très informatif, merci ! Avez-vous des exemples concrets d'utilisation du pattern matching ? J'aimerais voir comment l'implémenter dans mes projets actuels.
                        </div>
                        <div class="areader-comment-actions">
                            <button class="areader-comment-btn" data-action="like">
                                <span>❤️</span>
                                <span>8</span>
                            </button>
                            <button class="areader-comment-btn" data-action="dislike">
                                <span>👎</span>
                                <span>1</span>
                            </button>
                        </div>
                    </div>

                    <div class="areader-comment-item">
                        <div class="areader-comment-header">
                            <span class="areader-comment-author">Sophie Chen</span>
                            <span class="areader-comment-date">Il y a 6 heures</span>
                        </div>
                        <div class="areader-comment-text">
                            Les améliorations de performance mentionnées sont vraiment prometteuses. J'espère que les navigateurs vont rapidement adopter ces nouveautés.
                        </div>
                        <div class="areader-comment-actions">
                            <button class="areader-comment-btn areader-liked" data-action="like">
                                <span>❤️</span>
                                <span>15</span>
                            </button>
                            <button class="areader-comment-btn" data-action="dislike">
                                <span>👎</span>
                                <span>0</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Gestion des likes/dislikes de l'article
        const likeBtn = document.getElementById('likeBtn');
        const dislikeBtn = document.getElementById('dislikeBtn');
        const likeCount = document.getElementById('likeCount');
        const dislikeCount = document.getElementById('dislikeCount');

        let isLiked = false;
        let isDisliked = false;
        let likes = 42;
        let dislikes = 3;

        likeBtn.addEventListener('click', () => {
            if (isLiked) {
                // Retirer le like
                isLiked = false;
                likes--;
                likeBtn.classList.remove('areader-liked');
            } else {
                // Ajouter le like
                if (isDisliked) {
                    isDisliked = false;
                    dislikes--;
                    dislikeBtn.classList.remove('areader-disliked');
                }
                isLiked = true;
                likes++;
                likeBtn.classList.add('areader-liked');
            }
            likeCount.textContent = likes;
            dislikeCount.textContent = dislikes;
        });

        dislikeBtn.addEventListener('click', () => {
            if (isDisliked) {
                // Retirer le dislike
                isDisliked = false;
                dislikes--;
                dislikeBtn.classList.remove('areader-disliked');
            } else {
                // Ajouter le dislike
                if (isLiked) {
                    isLiked = false;
                    likes--;
                    likeBtn.classList.remove('areader-liked');
                }
                isDisliked = true;
                dislikes++;
                dislikeBtn.classList.add('areader-disliked');
            }
            likeCount.textContent = likes;
            dislikeCount.textContent = dislikes;
        });

        // Gestion de l'affichage des commentaires
        const toggleComments = document.getElementById('toggleComments');
        const commentsList = document.getElementById('commentsList');
        let commentsVisible = false;

        toggleComments.addEventListener('click', () => {
            commentsVisible = !commentsVisible;
            if (commentsVisible) {
                commentsList.classList.add('areader-visible');
                toggleComments.textContent = 'Masquer les commentaires';
            } else {
                commentsList.classList.remove('areader-visible');
                toggleComments.textContent = 'Afficher les commentaires';
            }
        });

        // Gestion des likes/dislikes des commentaires
        document.addEventListener('click', (e) => {
            if (e.target.closest('.areader-comment-btn')) {
                const btn = e.target.closest('.areader-comment-btn');
                const action = btn.dataset.action;
                const countSpan = btn.querySelector('span:last-child');
                let count = parseInt(countSpan.textContent);
                
                const commentActions = btn.parentElement;
                const otherBtn = commentActions.querySelector(`[data-action="${action === 'like' ? 'dislike' : 'like'}"]`);
                const otherCountSpan = otherBtn.querySelector('span:last-child');
                let otherCount = parseInt(otherCountSpan.textContent);

                if (btn.classList.contains(`areader-${action}d`)) {
                    // Retirer l'action
                    btn.classList.remove(`areader-${action}d`);
                    count--;
                } else {
                    // Ajouter l'action
                    if (otherBtn.classList.contains(`areader-${action === 'like' ? 'dislike' : 'like'}d`)) {
                        otherBtn.classList.remove(`areader-${action === 'like' ? 'dislike' : 'like'}d`);
                        otherCount--;
                        otherCountSpan.textContent = otherCount;
                    }
                    btn.classList.add(`areader-${action}d`);
                    count++;
                }
                countSpan.textContent = count;
            }
        });

        // Gestion de l'ajout de commentaires
        const submitComment = document.getElementById('submitComment');
        const commentInput = document.getElementById('commentInput');
        const commentCount = document.getElementById('commentCount');

        submitComment.addEventListener('click', () => {
            const commentText = commentInput.value.trim();
            if (commentText) {
                // Créer un nouveau commentaire
                const newComment = document.createElement('div');
                newComment.className = 'areader-comment-item';
                newComment.innerHTML = `
                    <div class="areader-comment-header">
                        <span class="areader-comment-author">Vous</span>
                        <span class="areader-comment-date">À l'instant</span>
                    </div>
                    <div class="areader-comment-text">
                        ${commentText}
                    </div>
                    <div class="areader-comment-actions">
                        <button class="areader-comment-btn" data-action="like">
                            <span>❤️</span>
                            <span>0</span>
                        </button>
                        <button class="areader-comment-btn" data-action="dislike">
                            <span>👎</span>
                            <span>0</span>
                        </button>
                    </div>
                `;
                
                // Ajouter le commentaire en haut de la liste
                commentsList.insertBefore(newComment, commentsList.firstChild);
                
                // Mettre à jour le compteur
                const currentCount = parseInt(commentCount.textContent);
                commentCount.textContent = currentCount + 1;
                
                // Vider le champ de saisie
                commentInput.value = '';
                
                // Afficher les commentaires si ils sont cachés
                if (!commentsVisible) {
                    commentsVisible = true;
                    commentsList.classList.add('areader-visible');
                    toggleComments.textContent = 'Masquer les commentaires';
                }
            }
        });

        // Permettre l'envoi avec Ctrl+Enter
        commentInput.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 'Enter') {
                submitComment.click();
            }
        });
    </script>
</body>
</html>