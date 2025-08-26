<?php
// Démarrer la session

    //session_start();
//    echo "<pre>".print_r($_SESSION, true)."</pre>";
        include(__DIR__.'/../../include_fichiers/if_no_connect.php');
// session_start();
// error_reporting(E_ALL);
// ini_set('display_errors',1);
include('config.php');
//include('imageconfig.php');
// function assets($path){
//         return BASE_URL.'/'. ltrim($path,'/');
//      }
include(__DIR__.'/../../login/connexion.php');

$DocsParPage = 9;

$PageCourrent = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Recuperation du numéro de page
$Offset = ($PageCourrent - 1) * $DocsParPage; // Calcul du Offset, c'est le fait de calculer combien sera sur chaque page

// recuperation des données depuis la bd

// $sqlprepar= "SELECT * FROM documentpdf ORDER BY IdPDF DESC LIMIT :limitdoc OFFSET :offsetdoc";
$sqlprepar= "SELECT * FROM documentpdf ORDER BY IdPDF DESC";
$RecupeDonnees = $pdo->prepare($sqlprepar);
// $RecupeDonnees->bindValue(':limitdoc', $DocsParPage,PDO::PARAM_INT);
// $RecupeDonnees->bindValue(':offsetdoc', $Offset, PDO::PARAM_INT);
$RecupeDonnees->execute();

$MesPdf = $RecupeDonnees->fetchAll();





$messages = "";
    if(isset($_POST['btn_commente'])){
       if(!empty($_POST['document_commente'])){
            $commentaire = htmlspecialchars($_POST['document_commente']);
            $num = htmlspecialchars($_POST['idDoc']);
            $commenter_doc = $pdo->prepare('INSERT INTO commentaire(id_user_commente, id_document_commente, content_commente) VALUES(:id_user, :id_doc, :commentaire)');
            $commenter_doc->bindValue(':id_user', $_SESSION['user']['id_user']);
            $commenter_doc->bindValue(':id_doc', $num);
            $commenter_doc->bindValue(':commentaire', $commentaire);
            $succes = $commenter_doc->execute();

            if($succes){
                $messages = "Votre message a été envoyé avec succès! ";
            }else{
                    $messages = "Erreur lors de l'nvoie";
            }
       }else{
            $error_vide = "Veuillez saisir un texte svp!";
       }
    }
        if (isset($_POST['id_commentaire'])) {
            $id_like = (int) $_POST['id_commentaire'];

            // Incrémenter le compteur
            $add_likes = $pdo->prepare('UPDATE commentaire SET comment_likes = comment_likes + 1 WHERE id_commentaire = :id_comment');
            $add_likes->bindValue(':id_comment', $id_like, PDO::PARAM_INT);
            $succes = $add_likes->execute();

            if ($succes) {
                // Récupérer le nouveau total
                $stmt = $pdo->prepare("SELECT comment_likes FROM commentaire WHERE id_commentaire = ?");
                $stmt->execute([$id_like]);
                $likes = $stmt->fetchColumn();
                echo $likes;
            }
            exit;
        }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les documents</title>
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




        /* Main Content */
        .main-content {
            padding-top: 100px;
            min-height: 100vh;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .page-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }


        /* Document List */
        .documents-list {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .blog-system-img {
            width: 20%;
            height: 30vh;
            object-fit: fill;
            transition: transform var(--transition-normal);
            border-radius: 10px;
            border: 2px solid green;
        }
        /* ..blog-system-img:hover{

        } */

        /* ==========================================================================
            popup document edit
        ========================================================================== */

        .ouverture_doc{
            position: fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100vh;
            Z-index: 9999;
            background: rgba(0, 0, 0, 0.65);
            
        }
        .body_scroll{
            overflow: hidden;
        }
        .document_content{
            width: 90%;
            position: relative;
            left: 5%;
        }

        .document-header:hover .blog-system-img {
            transform: scale(1.05);
        }
        .document-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .document-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .document-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .document-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .document-thumbnail {
            flex-shrink: 0;
            width: 120px;
            height: 150px;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 10px;
            border: 2px solid rgba(0, 255, 136, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00ff88;
            font-size: 2rem;
            position: relative;
            overflow: hidden;
        }

        .document-thumbnail::before {
            content: '📄';
            font-size: 3rem;
        }

        .document-info {
            flex: 1;
        }

        .document-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .document-description {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Document Stats */
        .document-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(0, 255, 136, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .stat-item:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .stat-item.like-btn {
            cursor: pointer;
        }

        .stat-item.like-btn.liked {
            background: rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.5);
            color: #00ff88;
        }

        .stat-item.download-btn {
            background: rgba(0, 212, 255, 0.1);
            border-color: rgba(0, 212, 255, 0.3);
        }

        .stat-item.download-btn:hover {
            background: rgba(0, 212, 255, 0.2);
            border-color: rgba(0, 212, 255, 0.5);
            color: #00d4ff;
        }

        .stat-item.edit-btn {
            background: rgba(255, 165, 0, 0.1);
            border-color: rgba(255, 165, 0, 0.3);
        }

        .stat-item.edit-btn:hover {
            background: rgba(255, 165, 0, 0.2);
            border-color: rgba(255, 165, 0, 0.5);
            color: #ffa500;
        }

        .stat-icon {
            font-size: 1rem;
            color: #00ff88;
        }

        .stat-count {
            color: #fff;
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Comments Section */
        .comments-section {
            border-top: 1px solid rgba(0, 255, 136, 0.2);
            padding-top: 2rem;
        }

        .comments-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .comments-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #00ff88;
        }

        .comments-count {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .comment-form-details {
            margin-bottom: 2rem;
        }

        .comment-form-details summary {
            cursor: pointer;
            padding: 1rem;
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.2);
            color: #00ff88;
            font-weight: 600;
            transition: all 0.3s ease;
            list-style: none;
        }

        .comment-form-details summary:hover {
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .comment-form-details[open] summary {
            border-radius: 10px 10px 0 0;
            border-bottom: none;
        }

        .comment-form {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-top: none;
            border-radius: 0 0 10px 10px;
            padding: 1.5rem;
        }

        .comment-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 10px;
            padding: 1rem;
            color: #fff;
            font-size: 1rem;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .comment-input:focus {
            outline: none;
            border-color: rgba(0, 255, 136, 0.6);
            box-shadow: 0 0 15px rgba(0, 255, 136, 0.2);
        }

        .comment-input::placeholder {
            color: #666;
        }

        .comment-submit {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .comment-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.4);
        }

        /* Comments List */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .comment-item {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            background: rgba(0, 255, 136, 0.05);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .comment-author {
            color: #00ff88;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .comment-like {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(0, 255, 136, 0.1);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .comment-like:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: scale(1.05);
        }

        .comment-like.liked {
            background: rgba(0, 255, 136, 0.3);
            color: #00ff88;
        }

        .comment-content {
            color: #b0b0b0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .document-header {
                flex-direction: column;
                gap: 1rem;
            }

            .document-thumbnail {
                width: 100px;
                height: 120px;
                align-self: center;
            }

            .document-stats {
                gap: 1rem;
            }

            .stat-item {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
        <?php 
            // include(__DIR__.'/forum_nav/forum_nav.php')
        
            if(empty($_SESSION['user']['nom_complet'])){
                include(__DIR__.'/../../navbar/NavBarIndex.php');
            }else{
                include(__DIR__.'/../../navbar/NavBarAcceuil.php');
            }
        ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Documents PDF Disponibles</h1>
            
            <div class="documents-list">
                <!-- Document 1 -->
                <?php foreach ($MesPdf as $data): ?>
                    <div class="document-item">
                        <div class="document-header">
                                <img class="blog-system-img" src="<?= str_replace('../../', '', $data['cheminimage']) ?>" alt="Image non disponible">
                            <div class="document-info">
                                <h2 class="document-title"><?= htmlspecialchars($data['NomPDF']) ?></h2>
                                <p class="document-description">
                                    Un guide complet pour maîtriser les concepts avancés de JavaScript, incluant les closures, 
                                    les promises, l'asynchrone, et les patterns de conception. Ce document de 150 pages couvre 
                                    tous les aspects essentiels pour devenir un développeur JavaScript expert.
                                </p>
                            </div>
                        </div>

                        <div class="document-stats">
                            <div class="stat-item like-btn" onclick="toggleLike(this)">
                                <span class="stat-icon">❤️</span>
                                <span class="stat-count">42</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-icon">⬇️</span>
                                <span class="stat-count">1,234 téléchargements</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-icon">👁️</span>
                                <span class="stat-count">5,678 vues</span>
                            </div>
                            <div class="stat-item" onclick="shareDocument()">
                                <span class="stat-icon">🔗</span>
                                <span class="stat-count">Partager</span>
                            </div>
                            <a class="stat-item download-btn" href="<?= '../files/' . rawurlencode(basename($data['Contenue']))?>">
                                <span class="stat-icon">📥</span>
                                <span class="stat-count">Télécharger</span>
                            </a>
                            <div class="stat-item edit-btn" onclick="openfiles(<?= $data['IdPDF'] ?>)">
                                <span class="stat-icon">✏️</span>
                                <span class="stat-count">Éditer en ligne</span>
                            </div>
                        </div>

                        <div class="comments-section">
                            <div class="comments-header">
                               
                                <h3 class="comments-title">Commentaires</h3>
                                <span class="comments-count">8</span>
                            </div>
                            <details class="comment-form-details">
                                <summary>💬 Ajouter un commentaire</summary>
                                <form action="#" method="POST">
                                    <input type="number" name="idDoc" value="<?= htmlspecialchars($data['IdPDF'])?>" hidden>
                                    <div class="comment-form">
                                        <textarea class="comment-input"  name="document_commente" placeholder="Écrivez votre commentaire..."></textarea>
                                        <button class="comment-submit" name="btn_commente">Envoyer le commentaire</button>
                                    </div>
                                </form>
                                <?php
                                    $recupe_commentes = $pdo->prepare('SELECT id_commentaire, id_user_commente, comment_likes, id_document_commente, content_commente, date_commente, Nom_complet FROM commentaire INNER JOIN users ON users.Id_User = commentaire.id_user_commente WHERE id_document_commente = :id_doc_commente  ORDER BY id_commentaire DESC');
                                    $recupe_commentes->bindValue(':id_doc_commente', $data['IdPDF']);
                                    $recupe_commentes->execute();
                                    $commentaires = $recupe_commentes->fetchAll();
                                ?>
                                <?php foreach($commentaires as $commente): ?>
                                    <div class="comments-list">
                                        <div class="comment-item">
                                            <div class="comment-header">
                                                <span class="comment-author"><?= htmlspecialchars($commente['Nom_complet']) ?></span>
                                                
                                                <button type="button" class="comment-like" onclick="toggleCommentLike(<?= $commente['id_commentaire']?>)">
                                                <div class="comment-like">
                                                    <span id="likes-<?= $commente['id_commentaire']?>"><?= htmlspecialchars($commente['comment_likes']) ?></span>
                                                </div>
                                                <span>❤️</span>
                                                </button>
                                            </div>
                                            <p class="comment-content">
                                               <?= htmlspecialchars($commente['content_commente']) ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?> 
                            </details>
                        </div>
                    </div>
                    <div class="ouverture_doc" id="docOpendoc<?= $data['IdPDF']?>" style="display:none;">
                        <i class="fas fa-times" onclick="closePopups(<?= $data['IdPDF'] ?>)" 
                            style="position:absolute; top:10px; right:10px; cursor:pointer; font-size:20px; color:#fff;">
                        </i>
                        <div class="document_content">
                            <iframe src="<?= '../files/' . rawurlencode(basename($data['Contenue'])) ?>" width="100%" height="600px"></iframe>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </main>
<?php 
    if(!empty($_SESSION['user'])){
        include(__DIR__.'/../../navbar/footer.php');
    }
?> 
    <script>

        function openfiles(id) {
            // document.body.classList.add('body_scroll');
            const docOpendoc = document.getElementById('docOpendoc' + id);
            if (!docOpendoc) return; // si l'élément n'existe pas

            // toggle affichage
            if (docOpendoc.style.display === 'none' || docOpendoc.style.display === '') {
                docOpendoc.style.display = 'block';
                document.body.classList.add('body_scroll');
            } else {
                docOpendoc.style.display = 'none';
                document.body.classList.remove('body_scroll');
            }
        }

        function closePopups(id){
              // document.body.classList.add('body_scroll');
            const docOpendoc = document.getElementById('docOpendoc' + id);
            if (!docOpendoc) return; // si l'élément n'existe pas

            // toggle affichage
            if (docOpendoc.style.display === 'block') {
                docOpendoc.style.display = 'none';
                document.body.classList.remove('body_scroll');
            } 
        }

        // Fonction pour toggle les likes des documents
        function toggleLike(element) {
            element.classList.toggle('liked');
            const countElement = element.querySelector('.stat-count');
            let count = parseInt(countElement.textContent);
            
            if (element.classList.contains('liked')) {
                count++;
                element.style.background = 'rgba(0, 255, 136, 0.3)';
            } else {
                count--;
                element.style.background = 'rgba(0, 255, 136, 0.1)';
            }
            
            countElement.textContent = count;
        }

        // Fonction pour ajouter un commentaire
        // function toggleAddComment(IdDocument){
        //     fetch(window.location.href, {
        //         method: 'POST',
        //         body: new URLSearchParams({id_documen: IdDocument})
        //     })
        //     .then(res => res.text())
        //     .then(nouveaucommentaire =>{

        //     })
        //     .catch(error => console.error('Erreur fetch ici: ', error));
        // }

        // Fonction pour toggle les likes des commentaires
        function toggleCommentLike(IdCommentaire) {
            fetch(window.location.href, {
                method: 'POST',
                body: new URLSearchParams({id_commentaire: IdCommentaire})
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById('likes-' + IdCommentaire).textContent = data;
            })
            .catch(error => console.error('Erreur fetch:', error));
        }

        // Fonction pour partager un document
        function shareDocument() {
            if (navigator.share) {
                navigator.share({
                    title: 'Document PDF',
                    text: 'Découvrez ce document intéressant',
                    url: window.location.href
                });
            } else {
                // Fallback pour copier le lien
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Lien copié dans le presse-papiers !');
                });
            }
        }

        // Fonction pour télécharger un document
        function downloadDocument(button) {
            // Récupérer le titre du document
            const documentItem = button.closest('.document-item');
            const documentTitle = documentItem.querySelector('.document-title').textContent;
            
            // Simuler le téléchargement (à remplacer par votre logique backend)
            const link = document.createElement('a');
            link.href = '#'; // Remplacer par l'URL réelle du PDF
            link.download = documentTitle + '.pdf';
            
            // Animation de feedback
            button.style.background = 'rgba(0, 212, 255, 0.3)';
            button.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                button.style.background = 'rgba(0, 212, 255, 0.1)';
                button.style.transform = 'scale(1)';
                
                // Ici vous pouvez ajouter votre logique de téléchargement
                alert(`Téléchargement démarré : ${documentTitle}`);
                
                // Mettre à jour le compteur de téléchargements
                const downloadCountElement = documentItem.querySelector('.stat-item:nth-child(2) .stat-count');
                const currentCount = parseInt(downloadCountElement.textContent.split(' ')[0]);
                downloadCountElement.textContent = `${currentCount + 1} téléchargements`;
                
            }, 150);
        }

        // Fonction pour éditer un document en ligne
        function editDocument(button) {
            const documentItem = button.closest('.document-item');
            const documentTitle = documentItem.querySelector('.document-title').textContent;
            
            // Animation de feedback
            button.style.background = 'rgba(255, 165, 0, 0.3)';
            button.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                button.style.background = 'rgba(255, 165, 0, 0.1)';
                button.style.transform = 'scale(1)';
                
                // Ici vous pouvez rediriger vers votre éditeur en ligne
                // window.open(`/editor?document=${encodeURIComponent(documentTitle)}`, '_blank');
                alert(`Ouverture de l'éditeur pour : ${documentTitle}`);
                
            }, 150);
        }

        // Fonction pour ajouter un commentaire
        function addComment(button) {
            const form = button.closest('.comment-form');
            const textarea = form.querySelector('.comment-input');
            const commentText = textarea.value.trim();
            
            if (commentText === '') {
                alert('Veuillez saisir un commentaire avant d\'envoyer.');
                return;
            }
            
            // Créer le nouvel élément commentaire
            const commentsList = form.closest('.comments-section').querySelector('.comments-list');
            const newComment = document.createElement('div');
            newComment.className = 'comment-item';
            
            newComment.innerHTML = `
                <div class="comment-header">
                    <span class="comment-author">Utilisateur Anonyme</span>
                    <div class="comment-like" onclick="toggleCommentLike(this)">
                        <span>❤️</span>
                        <span>0</span>
                    </div>
                </div>
                <p class="comment-content">${commentText}</p>
            `;
            
            // Ajouter le commentaire en haut de la liste
            commentsList.insertBefore(newComment, commentsList.firstChild);
            
            // Mettre à jour le compteur de commentaires
            const commentsCount = form.closest('.comments-section').querySelector('.comments-count');
            const currentCount = parseInt(commentsCount.textContent);
            commentsCount.textContent = currentCount + 1;
            
            // Vider le textarea et fermer les détails
            textarea.value = '';
            form.closest('.comment-form-details').removeAttribute('open');
            
            // Animation d'apparition
            newComment.style.opacity = '0';
            newComment.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                newComment.style.transition = 'all 0.3s ease';
                newComment.style.opacity = '1';
                newComment.style.transform = 'translateY(0)';
            }, 100);
        }

        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observer tous les documents
        document.querySelectorAll('.document-item').forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            item.style.transition = 'all 0.6s ease';
            observer.observe(item);
        });
    </script>
</body>
</html>