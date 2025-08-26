 
 <?php
     include(__DIR__.'/../../login/connexion.php');

     $recupe_documents = $pdo->prepare('SELECT * FROM documentpdf ORDER BY idPDF DESC');
    //  $recupe_forum = $pdo->prepare('SELECT * FROM forum ORDER BY id_forum DESC WHERE id_forum = :id');
    //  $recupe_forum->bindValue(':id', $_GET['id_forum']);
     $recupe_documents->execute();
     $documents = $recupe_documents->fetchAll();

?>

 <div class="section-header">
    <h2 class="section-title">
        <i class="fas fa-file-alt"></i>
        Gestion des Documents
    </h2>
    <div class="section-actions">
        <a href="/monblug/admin/documents/create" class="btn btn-success" onclick="openModal('document-modal')">
            <i class="fas fa-plus"></i>
            Ajouter un document
        </a>
    </div>
    <!-- <div class="section-actions">
        <button class="btn btn-success" onclick="openModal('document-modal')">
            <i class="fas fa-plus"></i>
            Ajouter un document
        </button>
    </div> -->
</div>

<div class="search-filter-bar">
    <input type="text" class="search-input" placeholder="Rechercher un document...">
    <select class="filter-select">
        <option>Toutes les catégories</option>
        <option>Mathématiques</option>
        <option>Sciences</option>
        <option>Histoire</option>
        <option>Langues</option>
    </select>
    <select class="filter-select">
        <option>Tous les types</option>
        <option>Gratuit</option>
        <option>Payant</option>
        <option>Premium</option>
    </select>
    <button class="btn btn-primary">
        <i class="fas fa-search"></i>
        Rechercher
    </button>
</div>

<div class="data-table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Chemin du document</th>
                <th>Chemin de l'image</th>
                <th>Likes</th>
                <th>Nombre de téléchargements</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
            <tr>
                <td><?=htmlspecialchars($document['IdPDF'])?></td>
                <td><?=htmlspecialchars($document['NomPDF'])?></td>
                <td><?=htmlspecialchars($document['Contenue'])?></td>
                <td><?=htmlspecialchars($document['cheminimage'])?></td>
                <td><?=htmlspecialchars($document['descriptions'])?></td>
                <td><?=htmlspecialchars($document['doc_likes'])?></td>
                <td><?=htmlspecialchars($document['nbr_telecharge'])?></td>
                <td><?=htmlspecialchars($document['date_pub'])?></td>
                <td><span class="status-badge status-active">Actif</span></td>
                <td>
                    <div class="action-buttons">
                        <a href="/monblug/admin/documents/update" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/monblug/admin/documents/show" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/monblug/admin/documents/delete" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>