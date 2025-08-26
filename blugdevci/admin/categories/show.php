<?php
    include(__DIR__.'/../../login/connexion.php');
    $categorie_recupe = $pdo->prepare('SELECT * FROM categorie');
    $categorie_recupe->execute();
    $categories = $categorie_recupe->fetchAll();
?>
<div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-tags"></i>
                            Gestion des Catégories
                        </h2>
                        <div class="section-actions">
                            <button class="btn btn-success" id="btn-open-cat-popup">
                                <i class="fas fa-plus"></i>
                                Nouvelle catégorie
                            </button>
                            <!-- <button class="btn btn-success" onclick="openModal('category-modal')" id="btn-open-cat-popup">
                                <i class="fas fa-plus"></i>
                                Nouvelle catégorie
                            </button> -->
                        </div>
                    </div>

                    <div class="data-table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date d'ajout</th>
                                    <th>Date de modification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $categorie): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($categorie['id_categorie']); ?></td>
                                        <td><?= htmlspecialchars($categorie['titre_categorie']); ?></td>
                                        <td><?= htmlspecialchars($categorie['description_cat']); ?></td>
                                        <td><?= htmlspecialchars($categorie['date_ajoute']); ?></td>
                                        <td><?= htmlspecialchars($categorie['date_modif']); ?></td>
                                        <td><div style="width: 20px; height: 20px; background: #e74c3c; border-radius: 3px;"></div></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                               <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Bouton d'ouverture -->
<!-- <button id="btn-open-cat-popup">Ajouter une catégorie</button> -->

                        <!-- Section popup -->
                        <section id="cat-popup-container">
                            <div id="cat-popup-box">
                                <h2>Ajouter une catégorie</h2>
                                <form id="cat-form" method="POST" action="/monblug/admin/categorie/script_ajout_categorie">
                                <label for="cat-title">Titre de la catégorie</label>
                                <input type="text" id="cat-title" name="titre" required>

                                <label for="cat-desc">Description</label>
                                <textarea id="cat-desc" name="description" rows="4" required></textarea>

                                <div class="cat-popup-actions">
                                    <button type="submit" name="envoyer">Ajouter</button>
                                    <button type="button" id="btn-close-cat-popup">Annuler</button>
                                </div>
                                </form>
                            </div>
                        </section>

                    </div>