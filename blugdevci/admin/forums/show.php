    <?php
           include(__DIR__.'/../../login/connexion.php');
           $recupe_forums = $pdo->prepare('SELECT * FROM forum ORDER BY id_forum DESC');
           $recupe_forums->execute();
           $forums = $recupe_forums->fetchAll(PDO::FETCH_ASSOC);
    ?>
                   
                   <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-comments"></i>
                            Gestion des Forums
                        </h2>
                        <div class="section-actions">
                            <a href="/monblug/admin/forums/create" class="btn btn-success" onclick="openModal('forum-modal')">
                                <i class="fas fa-plus"></i>
                                Nouveau forum
                        </a>
                        </div>
                    </div>

                    <div class="data-table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Vues</th>
                                    <th>Réponses</th>
                                    <th>Date du dernier post</th>
                                    <th>Statut</th>
                                    <th>Date de creation</th>
                                    <th>Id catégorie</th>
                                    <th>Id auteur</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($forums as $forum): ?>
                                <tr>
                                    <td><?= htmlspecialchars($forum['id_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['titre_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['slug_form']) ?></td>
                                    <td><?= htmlspecialchars($forum['description_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['nbr_vue_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['nbr_reponse_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['dernier_post_a']) ?></td>
                                    <td><?= htmlspecialchars($forum['statut_forum']) ?></td>
                                    <td><?= htmlspecialchars($forum['cree_le']) ?></td>
                                    <td><?= htmlspecialchars($forum['id_categorie']) ?></td>
                                    <td><?= htmlspecialchars($forum['id_auteur']) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button id="btn-open-popup-modification" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="/monblug/admin/forums/view" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" id="btn-open-popup-suppression" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Popup personnalisé -->
                                <div id="popup-suppression-overlay" class="suppression-popup-overlay">
                                    <div class="suppression-popup-box">
                                        <p>Êtes-vous sûr de vouloir supprimer cet élément ?</p>
                                        <button id="btn-annuler-suppression">Annuler</button>
                                        <a href="/monblug/admin/forums/delate?id=<?= htmlspecialchars($forum['id_forum']) ?>" id="btn-confirmer-suppression">Confirmer</a>
                                    </div>
                                </div>
                                <!-- Popup de confirmation pour modification -->
                                <div id="popup-modification-overlay" class="modification-popup-overlay">
                                    <div class="modification-popup-box">
                                        <p>Voulez-vous vraiment modifier cet élément ?</p>
                                        <button id="btn-annuler-modification">Annuler</button>
                                        <a href="/monblug/admin/forums/update?id=<?= htmlspecialchars($forum['id_forum']) ?>" id="btn-confirmer-modification">Confirmer</a>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <script>
                        (function(){
                            const btnOpen = document.getElementById('btn-open-popup-suppression');
                        const popup = document.getElementById('popup-suppression-overlay');
                        const btnAnnuler = document.getElementById('btn-annuler-suppression');
                        const btnConfirmer = document.getElementById('btn-confirmer-suppression');

                        btnOpen.addEventListener('click', () => {
                            popup.style.display = 'flex';
                        });

                        btnAnnuler.addEventListener('click', () => {
                            popup.style.display = 'none';
                        });

                        btnConfirmer.addEventListener('click', () => {
                            popup.style.display = 'none';
                            alert('Suppression confirmée. Tu peux déclencher une action ici.');
                            // Par exemple : window.location.href = 'supprimer.php?id=123';
                        });
                        })();

                        (function(){
                             const btnOpenModif = document.getElementById('btn-open-popup-modification');
                            const popupModif = document.getElementById('popup-modification-overlay');
                            const btnAnnulerModif = document.getElementById('btn-annuler-modification');
                            const btnConfirmerModif = document.getElementById('btn-confirmer-modification');

                            btnOpenModif.addEventListener('click', () => {
                                popupModif.style.display = 'flex';
                            });

                            btnAnnulerModif.addEventListener('click', () => {
                                popupModif.style.display = 'none';
                            });

                            // btnConfirmerModif.addEventListener('click', () => {
                            //     popupModif.style.display = 'none';
                            //     alert("Modification confirmée. Tu peux exécuter une redirection ici.");
                            //     // Exemple : window.location.href = 'modifier.php?id=123';
                            // });
                        })();
                    </script>

