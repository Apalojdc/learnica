<?php
           include(__DIR__.'/../../login/connexion.php');
           $recupe_messages = $pdo->prepare('SELECT id_message, Nom_complet, id_forum, texte_message, nbr_likes, nbr_reponses, date_envoie FROM message_users INNER JOIN users ON users.Id_User = message_users.id_user ORDER BY id_message DESC');
           $recupe_messages->execute();
           $messages = $recupe_messages->fetchAll(PDO::FETCH_ASSOC);
    ?>

<div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-envelope"></i>
                            Gestion des Messages
                        </h2>
                    </div>

                    <div class="search-filter-bar">
                        <input type="text" class="search-input" placeholder="Rechercher dans les messages...">
                        <select class="filter-select">
                            <option>Tous les messages</option>
                            <option>Non lus</option>
                            <option>Support</option>
                            <option>Signalements</option>
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
                                    <th>Expéditeur</th>
                                    <th>Sujet</th>
                                    <th>Message</th>
                                    <th>Nombre de likes</th>
                                    <th>Nombre de reponse</th>
                                    <th>Date d'envoie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($messages as $message): ?>
                                    <tr> 
                                        <td><?= htmlspecialchars($message['id_message']) ?></td>
                                        <td><?= htmlspecialchars($message['Nom_complet']) ?></td>
                                        <td><?= htmlspecialchars($message['id_forum']) ?></td>
                                        <td><?= htmlspecialchars($message['texte_message']) ?></td>
                                        <td><?= htmlspecialchars($message['nbr_likes']) ?></td>
                                        <td><?= htmlspecialchars($message['nbr_reponses']) ?></td>
                                        <td><?= $message['date_envoie'] ?></td>
                                        <td><span class="status-badge status-active">Envoyé</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>