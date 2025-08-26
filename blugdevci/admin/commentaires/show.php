                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-comment-dots"></i>
                            Gestion des Commentaires
                        </h2>
                    </div>

                    <div class="search-filter-bar">
                        <input type="text" class="search-input" placeholder="Rechercher dans les commentaires...">
                        <select class="filter-select">
                            <option>Tous les statuts</option>
                            <option>Approuvés</option>
                            <option>En attente</option>
                            <option>Signalés</option>
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
                                    <th>Auteur</th>
                                    <th>Document/Article</th>
                                    <th>Commentaire</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>COM001</td>
                                    <td>Paul Bernard</td>
                                    <td>Guide Python débutant</td>
                                    <td>Excellent tutoriel, très bien expliqué !</td>
                                    <td>25/07/2025 12:30</td>
                                    <td><span class="status-badge status-active">Approuvé</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-sm btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>COM002</td>
                                    <td>Julie Moreau</td>
                                    <td>Cours de mathématiques</td>
                                    <td>Il manque des exemples dans ce cours...</td>
                                    <td>24/07/2025 16:45</td>
                                    <td><span class="status-badge status-pending">En attente</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
