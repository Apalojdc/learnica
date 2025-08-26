<?php
     include(__DIR__.'/../../login/connexion.php');

     $recupe_article = $pdo->prepare('SELECT * FROM articles ORDER BY id_article DESC');
    //  $recupe_forum = $pdo->prepare('SELECT * FROM forum ORDER BY id_forum DESC WHERE id_forum = :id');
    //  $recupe_forum->bindValue(':id', $_GET['id_forum']);
     $recupe_article->execute();
     $articles = $recupe_article->fetchAll();

?>

<div class="section-header">
    <h2 class="section-title">
        <i class="fas fa-newspaper"></i>
        Gestion des Articles
    </h2>
    <div class="section-actions">
        <a href="/monblug/admin/articles/create" class="btn btn-success" > <!-- onclick="openModal('article-modal') -->
            <i class="fas fa-plus"></i>
            Nouvel article
        </a>
    </div>
</div>

<div class="search-filter-bar">
    <input type="text" class="search-input" placeholder="Rechercher un article...">
    <select class="filter-select">
        <option>Toutes les catégories</option>
        <option>Actualités</option>
        <option>Tutoriels</option>
        <option>Conseils</option>
    </select>
    <button class="btn btn-primary">
        <i class="fas fa-search"></i>
        Rechercher
    </button>
</div>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Vues</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?=htmlspecialchars($article['id_article'])?></td>
            <td><?=htmlspecialchars($article['titre_article'])?></td>
            <td>...</td>
            <td><?=htmlspecialchars($article['categorie'])?></td>
            <td><?=$article['date_ajoute']?></td>
            <td><span class="status-badge status-active"><?=htmlspecialchars($article['statut'])?></span></td>
            <td><span class="views-count"><?=htmlspecialchars($article['article_view'])?></span></td>
            <td>
                <div class="action-buttons">
                    <a href="/monblug/admin/articles/update?id=<?=htmlspecialchars($article['id_article'])?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-sm btn-secondary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="/monblug/admin/articles/delete?id=<?=htmlspecialchars($article['id_article'])?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- <div class="message">
                        Vous pouvez modifier ou supprimer cet article en cliquant sur les boutons correspondants.
                        <br>
                        <a href="/monblug/admin/articles/delete?id=<?=htmlspecialchars($article['id_article'])?>">Supprimer cet article</a>
                        <button id="cancel-delete-<?=htmlspecialchars($article['id_article'])?>" class="btn btn-sm btn-secondary">Annuler</button>
                    </div> -->
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
