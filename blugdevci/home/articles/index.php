<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - DevBlog Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #fff;
            overflow-x: hidden;
        }

        /* Layout Principal */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg,rgb(17, 6, 1) 0%,rgb(0, 0, 0) 50%,rgb(44, 14, 3) 100%);
            box-shadow: 4px 0 20px rgba(255, 107, 53, 0.3);
            position: fixed;
            height: 100vh;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .admin-info {
            margin-top: 15px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .admin-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 10px;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #ff6b35;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .admin-name {
            font-size: 14px;
            font-weight: 500;
            color: white;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin: 5px 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
            transform: translateX(5px);
        }

        .nav-link i {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            background: #1a1a1a;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #2d2d2d 0%, #1a1a1a 100%);
            padding: 25px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 107, 53, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b35, #ffa500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .dashboard-subtitle {
            color: #ccc;
            font-size: 16px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff6b35, #ffa500);
            color: #000;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff8c42, #ffb84d);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: rgba(255, 107, 53, 0.1);
            color: #ff6b35;
            border: 1px solid #ff6b35;
        }

        .btn-secondary:hover {
            background: rgba(255, 107, 53, 0.2);
        }

        .btn-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .btn-danger:hover {
            background: rgba(220, 53, 69, 0.2);
        }

        .btn-success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .btn-success:hover {
            background: rgba(40, 167, 69, 0.2);
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* Content Section */
        .content-section {
            background: linear-gradient(135deg, #2d2d2d 0%, #1a1a1a 100%);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 107, 53, 0.2);
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #ff6b35;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 107, 53, 0.3);
        }

        /* Articles Table */
        .articles-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .articles-table th,
        .articles-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 107, 53, 0.1);
        }

        .articles-table th {
            background: rgba(255, 107, 53, 0.1);
            color: #ff6b35;
            font-weight: 600;
        }

        .articles-table tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .article-title-cell {
            font-weight: 600;
            color: #fff;
        }

        .article-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-published {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .status-draft {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .status-archived {
            background: rgba(108, 117, 125, 0.2);
            color: #6c757d;
        }

        .article-actions {
            display: flex;
            gap: 8px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: linear-gradient(135deg, #2d2d2d 0%, #1a1a1a 100%);
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 107, 53, 0.2);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(255, 107, 53, 0.3);
        }

        .modal-title {
            font-size: 24px;
            font-weight: 600;
            color: #ff6b35;
        }

        .close {
            color: #ccc;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #ff6b35;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #fff;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 107, 53, 0.3);
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #ff6b35;
            box-shadow: 0 0 0 2px rgba(255, 107, 53, 0.2);
        }

        .form-control::placeholder {
            color: #ccc;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-col {
            flex: 1;
        }

        .modal-footer {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 107, 53, 0.2);
        }

        /* Search and Filter */
        .search-filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 107, 53, 0.3);
            border-radius: 8px;
            padding: 8px 15px;
            min-width: 300px;
        }

        .search-box input {
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            padding: 8px;
            width: 100%;
        }

        .search-box i {
            color: #ff6b35;
            margin-right: 10px;
        }

        .filter-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .filter-select {
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 107, 53, 0.3);
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
        }

        .filter-select option {
            background: #1a1a1a;
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 250px;
            }
            
            .main-content {
                margin-left: 250px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                min-width: 100%;
            }

            .filter-group {
                justify-content: space-between;
            }

            .articles-table {
                font-size: 14px;
            }

            .articles-table th,
            .articles-table td {
                padding: 10px;
            }

            .article-actions {
                flex-direction: column;
            }

            .modal-content {
                width: 95%;
                margin: 2% auto;
                padding: 20px;
            }

            .form-row {
                flex-direction: column;
            }
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: linear-gradient(45deg, #ff6b35, #ffa500);
            color: #000;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            .dashboard-header {
                margin-top: 60px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #ff6b35, #ffa500);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #ff8c42, #ffb84d);
        }
    </style>
</head>
<body>
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-code"></i> DevBlog Admin
                </div>
                <div class="admin-info">
                    <div class="admin-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="admin-name">Administrateur</div>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="#dashboard" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#articles" class="nav-link active">
                        <i class="fas fa-newspaper"></i>
                        <span>Articles</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#documents" class="nav-link">
                        <i class="fas fa-file-pdf"></i>
                        <span>Documents</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#users" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Utilisateurs</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#analytics" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistiques</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#settings" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="dashboard-header fade-in-up">
                <div>
                    <h1 class="dashboard-title">Gestion des Articles</h1>
                    <p class="dashboard-subtitle">Administrez vos articles de blog</p>
                </div>
                <button class="btn btn-primary" onclick="openModal('addArticleModal')">
                    <i class="fas fa-plus"></i> Nouvel Article
                </button>
            </div>

            <!-- Articles Section -->
            <div class="content-section fade-in-up">
                <div class="search-filter-section">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher un article..." id="searchInput">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="published">Publié</option>
                            <option value="draft">Brouillon</option>
                            <option value="archived">Archivé</option>
                        </select>
                        <select class="filter-select" id="categoryFilter">
                            <option value="">Toutes les catégories</option>
                            <option value="php">PHP</option>
                            <option value="javascript">JavaScript</option>
                            <option value="python">Python</option>
                            <option value="laravel">Laravel</option>
                        </select>
                    </div>
                </div>

                <table class="articles-table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Vues</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="articlesTableBody">
                        <tr>
                            <td class="article-title-cell">Apprendre Laravel pas à pas</td>
                            <td>Laravel</td>
                            <td><span class="article-status status-published">Publié</span></td>
                            <td>15 Jan 2025</td>
                            <td>1,234</td>
                            <td>
                                <div class="article-actions">
                                    <button class="btn btn-secondary btn-small" onclick="editArticle(1)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-small" onclick="viewArticle(1)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-small" onclick="deleteArticle(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="article-title-cell">Python pour Machine Learning</td>
                            <td>Python</td>
                            <td><span class="article-status status-published">Publié</span></td>
                            <td>12 Jan 2025</td>
                            <td>890</td>
                            <td>
                                <div class="article-actions">
                                    <button class="btn btn-secondary btn-small" onclick="editArticle(2)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-small" onclick="viewArticle(2)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-small" onclick="deleteArticle(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="article-title-cell">Apprendre PHP de A à Z</td>
                            <td>PHP</td>
                            <td><span class="article-status status-draft">Brouillon</span></td>
                            <td>10 Jan 2025</td>
                            <td>456</td>
                            <td>
                                <div class="article-actions">
                                    <button class="btn btn-secondary btn-small" onclick="editArticle(3)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-small" onclick="viewArticle(3)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-small" onclick="deleteArticle(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="article-title-cell">Introduction à JavaScript</td>
                            <td>JavaScript</td>
                            <td><span class="article-status status-archived">Archivé</span></td>
                            <td>8 Jan 2025</td>
                            <td>2,156</td>
                            <td>
                                <div class="article-actions">
                                    <button class="btn btn-secondary btn-small" onclick="editArticle(4)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-small" onclick="viewArticle(4)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-small" onclick="deleteArticle(4)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal Ajouter/Modifier Article -->
    <div id="addArticleModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Nouvel Article</h2>
                <span class="close" onclick="closeModal('addArticleModal')">&times;</span>
            </div>
            <form id="articleForm">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">Titre de l'article</label>
                            <input type="text" class="form-control" id="articleTitle" placeholder="Entrez le titre..." required>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">Catégorie</label>
                            <select class="form-control" id="articleCategory" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="php">PHP</option>
                                <option value="javascript">JavaScript</option>
                                <option value="python">Python</option>
                                <option value="laravel">Laravel</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description courte</label>
                    <input type="text" class="form-control" id="articleDescription" placeholder="Description courte de l'article...">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Contenu de l'article</label>
                    <textarea class="form-control" id="articleContent" placeholder="Rédigez votre article..." rows="10" required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">URL de l'image</label>
                            <input type="url" class="form-control" id="articleImage" placeholder="https://exemple.com/image.jpg">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">Statut</label>
                            <select class="form-control" id="articleStatus" required>
                                <option value="draft">Brouillon</option>
                                <option value="published">Publié</option>
                                <option value="archived">Archivé</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addArticleModal')">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Variables globales
        let articles = [
            {
                id: 1,
                title: "Apprendre Laravel pas à pas",
                category: "laravel",
                status: "published",
                date: "15 Jan 2025",
                views: 1234,
                description: "Un guide complet pour maîtriser le framework PHP le plus populaire...",
                content: "Contenu de l'article Laravel...",
                image: "https://via.placeholder.com/400x200/ff6b35/ffffff?text=Laravel"
            },
            {
                id: 2,
                title: "Python pour Machine Learning",
                category: "python",
                status: "published",
                date: "12 Jan 2025",
                views: 890,
                description: "Découvrez comment utiliser Python pour l'intelligence artificielle...",
                content: "Contenu de l'article Python ML...",
                image: "https://via.placeholder.com/400x200/ff6b35/ffffff?text=Python+ML"
            },
            {
                id: 3,
                title: "Apprendre PHP de A à Z",
                category: "php",
                status: "draft",
                date: "10 Jan 2025",
                views: 456,
                description: "Maîtrisez le développement web avec PHP...",
                content: "Contenu de l'article PHP...",
                image: "https://via.placeholder.com/400x200/ff6b35/ffffff?text=PHP"
            },
            {
                id: 4,
                title: "Introduction à JavaScript",
                category: "javascript",
                status: "archived",
                date: "8 Jan 2025",
                views: 2156,
                description: "Les bases de JavaScript pour débutants...",
                content: "Contenu de l'article JavaScript...",
                image: "https://via.placeholder.com/400x200/ff6b35/ffffff?text=JavaScript"
            }
        ];

        let currentEditingId = null;

        // Fonctions utilitaires
        function toggleSidebar() {
            const sidebar = document.getElementById('