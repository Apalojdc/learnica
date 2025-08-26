 <?php
    $pdo = new PDO("mysql:host=localhost;dbname=blog_ci;charset=utf8", "root", "");

    // Compter les messages par mois
    $sql = "SELECT MONTH(date_envoie) AS mois, COUNT(*) AS total
            FROM message_users
            GROUP BY mois
            ORDER BY mois";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Séparer les labels et valeurs
    $mois = [];
    $total = [];
    foreach ($data as $row) {
        $mois[] = date("F", mktime(0, 0, 0, $row['mois'], 1)); // Nom du mois
        $total[] = $row['total'];
    }

?>

 <!-- Stats Grid -->
                    <div class="stats-grid">
                        <div class="stat-card documents">
                            <div class="stat-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <span class="stat-number">1,234</span>
                            <div class="stat-label">Documents</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                +12% ce mois
                            </div>
                        </div>

                        <div class="stat-card users">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="stat-number">5,678</span>
                            <div class="stat-label">Utilisateurs</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                +8% ce mois
                            </div>
                        </div>

                        <div class="stat-card articles">
                            <div class="stat-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <span class="stat-number">89</span>
                            <div class="stat-label">Articles</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                +15% ce mois
                            </div>
                        </div>

                        <div class="stat-card revenue">
                            <div class="stat-icon">
                                <i class="fas fa-euro-sign"></i>
                            </div>
                            <span class="stat-number">€12,456</span>
                            <div class="stat-label">Revenus</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                +22% ce mois
                            </div>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="chart-container">
                        <h3 style="color: var(--text-primary); margin-bottom: 1rem;">
                            <i class="fas fa-chart-area" style="color: var(--text-accent); margin-right: 0.5rem;"></i>
                            Activité des 30 derniers jours
                        </h3>
                        <div class="chart-placeholder">
                           <!-- <h3> Graphique des ventes et téléchargements</h3> -->
                            <div>
                                <canvas id="graphMessages" width="400" height="200"></canvas>
                            </div>
                            <div>
                                <?php
                                    // Compter les documents par mois
                                    $count_document = "SELECT MONTH(date_pub) AS months, COUNT(*) AS total_doc
                                            FROM documentpdf
                                            GROUP BY months
                                            ORDER BY months";
                                    $resultat_doc_count = $pdo->query($count_document);
                                    $doc_count_result = $resultat_doc_count->fetchAll(PDO::FETCH_ASSOC);

                                    $resultat_doc_count = $pdo->query($count_document);

                                    // Séparer les labels et valeurs
                                    $mois_doc = [];
                                    $total_doc = [];
                                    foreach ($doc_count_result as $row_doc) {
                                        $mois_doc[] = date("F", mktime(0, 0, 0, $row_doc['months'], 1)); // Nom du mois
                                        $total_doc[] = $row_doc['total_doc'];
                                    }
                                ?>
                                <div>
                                    <canvas id="graphDocuments" width="400" height="200"></canvas>
                                </div>
                                <div><canvas id="graphDocuments" width="50" height="50"></canvas></div>
                            </div>
                        </div>
                        
                    </div>
