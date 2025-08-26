<?php 
/*
 * This file is part of the MonBlug project.
 *
 * (c) BlugDevCI <contact@blugdevci.com>
 */
     include(__DIR__.'/../../login/connexion.php');

    //   $recupe_forum = $pdo->prepare('SELECT * FROM articles ORDER BY id_article DESC');
     $recupe_article = $pdo->prepare('SELECT * FROM articles WHERE id_article = :id');
     $recupe_article->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
     $recupe_article->execute();
     $article = $recupe_article->fetch();


 if(isset($_POST['modifier_article'])){
        if(!empty($_POST['titre_article']) && !empty($_POST['categorie']) && !empty($_POST['courte_description']) && !empty($_POST['contenue_doc']) && !empty($_POST['statut'])){
           $titre = htmlspecialchars($_POST['titre_article']);
           $categorie = htmlspecialchars($_POST['categorie']);
           $courte_description = htmlspecialchars($_POST['courte_description']);
           $contenue_doc = htmlspecialchars($_POST['contenue_doc']);
           $statut = htmlspecialchars($_POST['statut']);
           $id_article = htmlspecialchars($_POST['id_article']);

           $articleprepared = $pdo->prepare('UPDATE articles SET titre_article = :titre, categorie = :categorie, courte_description = :courte_description, contenue_doc = :contenue_doc, statut = :statut WHERE id_article = :id');
           $articleprepared->bindValue(':titre', $titre);
           $articleprepared->bindValue(':categorie', $categorie);
           $articleprepared->bindValue(':courte_description', $courte_description);
           $articleprepared->bindValue(':contenue_doc', $contenue_doc);
           $articleprepared->bindValue(':statut', $statut);
           $articleprepared->bindValue(':id', $id_article);
           $succes = $articleprepared->execute();

           if( $succes ){
                $message = ['success' => true, 'message' => 'Article ajouté avec succès'];
           }else{
                $message = ['success' => false, 'message' => 'Erreur lors de l\'ajout de l\'article'];
           }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }

        .toast {
            position: fixed;
            top: 30px;
            transform: translateX(-50%);
            background-color: green;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            width: 90%;
            text-align:center;
            margin-left: 20%;
            }
        .toast.show {
            opacity: 1;
            pointer-events: auto;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Modifier un article</h2>
    <form id="articleForm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="number" id="id_article" name="id_article" hidden value="<?= $article['id_article'] ?>">
        </div>
        <div class="form-group">
            <label for="titre_article">Titre de l'article :</label>
            <input type="text" id="titre_article" name="titre_article" required value="<?= $article['titre_article'] ?>">
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie" required>
                <option value="">Sélectionner une catégorie</option>
                <option value="technologie" <?= $article['categorie'] == 'technologie' ? 'selected' : '' ?>>Technologie</option>
                <option value="santé" <?= $article['categorie'] == 'santé' ? 'selected' : '' ?>>Santé</option>
                <option value="education" <?= $article['categorie'] == 'education' ? 'selected' : '' ?>>Éducation</option>
                <option value="divers" <?= $article['categorie'] == 'divers' ? 'selected' : '' ?>>Divers</option>
            </select>
        </div>
        <div class="form-group">
            <label for="courte_description">Courte description :</label>
            <textarea id="courte_description" name="courte_description" rows="3" required><?= $article['courte_description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="contenue_doc">Contenu de l'article :</label>
            <textarea id="contenue_doc" name="contenue_doc" rows="6" required><?= $article['contenue_doc'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="url_image">Image :</label>
            <img src="#" alt="image" id='img' style="max-width: 100%; height: auto;">
            <input type="file" id="url_image" name="url_image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="statut">Statut :</label>
            <select id="statut" name="statut" required>
                <option value="publié" <?= $article['statut'] == 'publié' ? 'selected' : '' ?>>Publié</option>
                <option value="brouillon" <?= $article['statut'] == 'brouillon' ? 'selected' : '' ?>>Brouillon</option>
                <option value="archivé" <?= $article['statut'] == 'archivé' ? 'selected' : '' ?>>Archivé</option>
            </select>
        </div>
        <button type="submit" name="modifier_article" onclick="Voirtoast('Article modifié')">Modifier l'article</button>
    </form>
    <div id="message" class="message" style="display: none;"></div>
    <div id="toast" class="toast"></div>

    <script>
// generation d'un toast
     function Voirtoast(message){
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.classList.add('show');

        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
     }



        let urlim = document.getElementById('url_image');
        let img = document.getElementById('img');


        urlim.addEventListener('change', function(){
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event){
                    img.src = event.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });


        // document.getElementById('articleForm').addEventListener('submit', async function(e) {
        //     // e.preventDefault();
            
        //     const formData = new FormData(this);
        //     const messageDiv = document.getElementById('message');
            
        //     try {
        //         const response = await fetch('add_article.php', {
        //             method: 'POST',
        //             body: formData
        //         });
                
        //         const result = await response.json();
                
        //         messageDiv.style.display = 'block';
        //         if (result.success) {
        //             messageDiv.className = 'message success';
        //             messageDiv.textContent = 'Article ajouté avec succès !';
        //             this.reset();
        //         } else {
        //             messageDiv.className = 'message error';
        //             messageDiv.textContent = result.message || 'Erreur lors de l\'ajout de l\'article';
        //         }
        //     } catch (error) {
        //         messageDiv.style.display = 'block';
        //         messageDiv.className = 'message error';
        //         messageDiv.textContent = 'Erreur de connexion au serveur';
        //     }
        // });
    </script>
</body>
</html>