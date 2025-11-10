                   
                    
 <?php
     include(__DIR__.'/../../login/connexion.php');

     $recupe_users = $pdo->prepare('SELECT * FROM Users ORDER BY Id_User DESC');
    //  $recupe_forum = $pdo->prepare('SELECT * FROM forum ORDER BY id_forum DESC WHERE id_forum = :id');
    //  $recupe_forum->bindValue(':id', $_GET['id_forum']);
     $recupe_users->execute();
     $users = $recupe_users->fetchAll();

?>
                   <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-users"></i>
                            Gestion des Utilisateurs
                        </h2>
                        <div class="section-actions">
                            <a href="/monblug/inscription/page" class="btn btn-success">
                                <i class="fas fa-user-plus"></i>
                                Nouvel utilisateur
                            </a>
                        </div>
                    </div>

                    <div class="search-filter-bar">
                        <input type="text" class="search-input" placeholder="Rechercher un utilisateur...">
                        <select class="filter-select">
                            <option>Tous les rôles</option>
                            <option>Utilisateur</option>
                            <option>Modérateur</option>
                            <option>Administrateur</option>
                        </select>
                        <select class="filter-select">
                            <option>Tous les statuts</option>
                            <option>Actif</option>
                            <option>Inactif</option>
                            <option>Suspendu</option>
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
                                    <th>Photo de profile</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Sexe</th>
                                    <th>Statut</th>
                                    <th>Téléphone</th>
                                    <th>Date de création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?=htmlspecialchars($user['Id_User']) ?></td>
                                    <td><?=htmlspecialchars($user['nom_complet']) ?></td>
                                    <td><?=htmlspecialchars($user['mel']) ?></td>
                                    <td><?=htmlspecialchars($user['role']) ?></td>
                                    <td><?=htmlspecialchars($user['genre']) ?></td>
                                    <td><?=htmlspecialchars($user['statut']) ?></td>
                                    <td><?=htmlspecialchars($user['numero']) ?></td>
                                    <td><?=$user['temps'] ?></td>
                                    <td><span class="status-badge status-active">Actif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="/monblug/admin/user/update?id=<?=htmlspecialchars($user['Id_User']) ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/monblug/admin/user/show?id=<?=htmlspecialchars($user['Id_User']) ?>" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/monblug/admin/user/delete?id=<?=htmlspecialchars($user['Id_User']) ?>" class="btn btn-sm btn-danger">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
