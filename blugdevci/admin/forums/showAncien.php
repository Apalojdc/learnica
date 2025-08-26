<?php
     include_once '../../longin/connexion.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .article-container {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .article-container img {
            max-width: 100%;
            height: auto;
            margin: 15px 0;
        }
        .article-container p {
            margin: 10px 0;
        }
        .actions {
            margin-top: 20px;
        }
        .actions button, .actions a {
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
        }
        .edit-btn {
            background-color: #007bff;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .back-btn {
            background-color: #6c757d;
        }
        .back-btn:hover {
            background-color: #5a6268;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 4px;
            width: 80%;
            max-width: 600px;
        }
        .modal-content h3 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="article-container">
        <h1>Titre de l'article</h1>
        <p><strong>Catégorie :</strong> Technologie</p>
        <p><strong>Description :</strong> Une courte description de l'article.</p>
        <p><strong>Contenu :</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <img src="https://via.placeholder.com/600x300" alt="Image de l'article">
        <p><strong>Statut :</strong> Publié</p>
        <div class="actions">
            <button class="edit-btn">Modifier</button>
            <button class="delete-btn">Supprimer</button>
            <a href="#" class="back-btn">Retour à la liste</a>
        </div>
    </div>

    <!-- Modal pour la modification -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h3>Modifier l'article</h3>
            <form id="editForm">
                <div class="form-group">
                    <label for="titre_article">Titre de l'article :</label>
                    <input type="text" id="titre_article" name="titre_article" value="Titre de l'article" required>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie :</label>
                    <select id="categorie" name="categorie" required>
                        <option value="technologie" selected>Technologie</option>
                        <option value="santé">Santé</option>
                        <option value="education">Éducation</option>
                        <option value="divers">Divers</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="courte_description">Courte description :</label>
                    <textarea id="courte_description" name="courte_description" rows="3" required>Une courte description de l'article.</textarea>
                </div>
                <div class="form-group">
                    <label for="contenue_doc">Contenu de l'article :</label>
                    <textarea id="contenue_doc" name="contenue_doc" rows="6" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                </div>
                <div class="form-group">
                    <label for="url_image">URL de l'image :</label>
                    <input type="url" id="url_image" name="url_image" value="https://via.placeholder.com/600x300">
                </div>
                <div class="form-group">
                    <label for="statut">Statut :</label>
                    <select id="statut" name="statut" required>
                        <option value="publié" selected>Publié</option>
                        <option value="brouillon">Brouillon</option>
                        <option value="archivé">Archivé</option>
                    </select>
                </div>
                <button type="submit" class="edit-btn">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</body>
</html>