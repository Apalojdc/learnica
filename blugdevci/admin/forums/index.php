<?php 
/*
 * This file is part of the MonBlug project.
 *
 * (c) BlugDevCI <contact@blugdevci.com>
 */
        session_start();

     include(__DIR__.'/../../login/connexion.php');
          
    if(isset($_POST['ajouter'])){
        if(!empty($_POST['titre_forum']) && !empty($_POST['slug_forum']) && !empty($_POST['description_forum']) && !empty($_POST['statut_forum'])  && !empty($_POST['categorie_forum'])){
            
            $titre_forum = htmlspecialchars($_POST['titre_forum']);
            $slug_forum = htmlspecialchars($_POST['slug_forum']);
            $description_forum = htmlspecialchars($_POST['description_forum']);
            $statut_forum = htmlspecialchars($_POST['statut_forum']);
            $id_auteur = $_SESSION['user']['id_user'];
            $id_categorie = intval($_POST['categorie_forum']);
            
            // Préparer la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO forum (titre_forum, slug_form, description_forum, statut_forum, id_auteur, id_categorie) VALUES (:titre, :slug, :description_forum, :statut, :id_auteur, :id_categorie)");
            $stmt->bindParam(':titre', $titre_forum);
            $stmt->bindParam(':slug', $slug_forum);
            $stmt->bindParam(':description_forum', $description_forum);
            $stmt->bindParam(':statut', $statut_forum);
            $stmt->bindValue(':id_auteur',$id_auteur, PDO::PARAM_INT);
            $stmt->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
            $success_statut = $stmt->execute();

            // Exécuter la requête
            if($success_statut){
                echo json_encode(['success' => true]);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du forum']);
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs']);
            exit;
        }
    }
            $categorie_recupe = $pdo->prepare('SELECT * FROM categorie');
            $categorie_recupe->execute();
            $categories = $categorie_recupe->fetchAll();
    // echo  $_SESSION['user']['id_user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Forum</title>
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
    </style>
</head>
<body>
    <h2>Ajouter un nouveau forum</h2>
    <form id="forumForm" method="POST">
        <div class="form-group">
            <label for="titre_forum">Titre du forum :</label>
            <input type="text" id="titre_forum" name="titre_forum" required>
        </div>
        <div class="form-group">
            <label for="slug_forum">Slug :</label>
            <input type="text" id="slug_forum" name="slug_forum" required>
        </div>
        <div class="form-group">
            <label for="description_forum">Description :</label>
            <textarea id="description_forum" name="description_forum" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="statut_forum">Statut :</label>
            <select id="statut_forum" name="statut_forum" required>
                <option value="actif">Actif</option>
                <option value="inactif">Inactif</option>
                <option value="brouillon">Brouillon</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categorie_forum">Catégorie :</label>
            <select id="categorie_forum" name="categorie_forum" required>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= htmlspecialchars($categorie['id_categorie']) ?>"><?= htmlspecialchars($categorie['titre_categorie']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="ajouter">Ajouter le forum</button>
    </form>
    <div id="message" class="message" style="display: none;"></div>

    <script>
        document.getElementById('forumForm').addEventListener('submit', async function(e) {
            // e.preventDefault();
            
            const formData = new FormData(this);
            const messageDiv = document.getElementById('message');
            
            try {
                const response = await fetch('add_forum.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                messageDiv.style.display = 'block';
                if (result.success) {
                    messageDiv.className = 'message success';
                    messageDiv.textContent = 'Forum ajouté avec succès !';
                    this.reset();
                } else {
                    messageDiv.className = 'message error';
                    messageDiv.textContent = result.message || 'Erreur lors de l\'ajout du forum';
                }
            } catch (error) {
                messageDiv.style.display = 'block';
                messageDiv.className = 'message error';
                messageDiv.textContent = 'Erreur de connexion au serveur';
            }
        });

        // Génération automatique du slug à partir du titre
        document.getElementById('titre_forum').addEventListener('input', function() {
            const titre = this.value;
            const slug = titre
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
            document.getElementById('slug_forum').value = slug;
        });
    </script>
</body>
</html>