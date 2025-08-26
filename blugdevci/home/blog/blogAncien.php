<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevForum & Blog - Communauté de Développeurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
            --info-color: #3b82f6;
            --like-color: #e91e63;
            
            --bg-primary: #0f0f23;
            --bg-secondary: #1a1a2e;
            --bg-tertiary: #16213e;
            --bg-card: #1e1e3f;
            --bg-code: #2d2d44;
            --bg-comment: #252547;
            
            --text-primary: #ffffff;
            --text-secondary: #e2e8f0;
            --text-muted: #94a3b8;
            --text-accent: #667eea;
            
            --border-color: rgba(255, 255, 255, 0.1);
            --border-hover: rgba(255, 255, 255, 0.2);
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-tertiary) 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.5rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .nav-tabs {
            display: flex;
            gap: 1rem;
        }

        .nav-tab {
            padding: 0.75rem 1.5rem;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .nav-tab:hover,
        .nav-tab.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            cursor: pointer;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Blog Section */
        .blog-section {
            margin-bottom: 3rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }

        .toggle-btn {
            padding: 0.5rem;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
        }

        .toggle-btn:hover,
        .toggle-btn.active {
            background: var(--primary-color);
            color: white;
        }

        /* Article Grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .article-card {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--border-hover);
        }

        .article-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .article-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .article-card:hover .article-image::before {
            left: 100%;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
            line-height: 1.4;
        }

        .article-excerpt {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .article-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tag {
            background: var(--bg-code);
            color: var(--text-accent);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid var(--border-color);
        }

        .tag.javascript { background: rgba(247, 223, 30, 0.1); color: #f7df1e; }
        .tag.python { background: rgba(55, 118, 171, 0.1); color: #3776ab; }
        .tag.react { background: rgba(97, 218, 251, 0.1); color: #61dafb; }
        .tag.vue { background: rgba(79, 192, 141, 0.1); color: #4fc08d; }
        .tag.php { background: rgba(119, 123, 180, 0.1); color: #777bb4; }
        .tag.laravel { background: rgba(255, 45, 32, 0.1); color: #ff2d20; }

        .article-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .like-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: var(--radius-md);
        }

        .like-btn:hover {
            background: rgba(233, 30, 99, 0.1);
            color: var(--like-color);
        }

        .like-btn.liked {
            color: var(--like-color);
            animation: likeAnimation 0.3s ease;
        }

        @keyframes likeAnimation {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .comment-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: var(--radius-md);
        }

        .comment-btn:hover {
            background: rgba(102, 126, 234, 0.1);
            color: var(--primary-color);
        }

        /* Article Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            border: 1px solid var(--border-color);
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-header {
            padding: 2rem;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            background: var(--bg-secondary);
            border: none;
            border-radius: 50%;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-btn:hover {
            background: var(--error-color);
            color: white;
        }

        .modal-body {
            padding: 2rem;
        }

        .article-full-content {
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .article-full-content h3 {
            color: var(--text-accent);
            margin: 1.5rem 0 1rem;
        }

        .article-full-content p {
            margin-bottom: 1rem;
        }

        .article-full-content code {
            background: var(--bg-code);
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-sm);
            font-family: 'Fira Code', monospace;
        }

        /* Comments Section */
        .comments-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .comments-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .comments-title {
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .comment-form {
            margin-bottom: 2rem;
        }

        .comment-input {
            width: 100%;
            min-height: 120px;
            padding: 1rem;
            background: var(--bg-comment);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            color: var(--text-primary);
            font-family: inherit;
            resize: vertical;
            transition: var(--transition);
        }

        .comment-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .comment-form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .comment-options {
            display: flex;
            gap: 1rem;
        }

        .emoji-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: var(--radius-md);
        }

        .emoji-btn:hover {
            background: var(--bg-secondary);
        }

        .submit-comment-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-lg);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-comment-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .comments-list {
            space: 1.5rem;
        }

        .comment {
            background: var(--bg-comment);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .comment:hover {
            border-color: var(--border-hover);
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }

        .comment-info {
            flex: 1;
        }

        .comment-author {
            font-weight: 600;
            color: var(--text-primary);
        }

        .comment-time {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .comment-content {
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .comment-actions {
            display: flex;
            gap: 1rem;
        }

        .comment-action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
        }

        .comment-action-btn:hover {
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .comment-action-btn.liked {
            color: var(--like-color);
        }

        .reply-form {
            margin-top: 1rem;
            margin-left: 3rem;
            display: none;
        }

        .reply-form.active {
            display: block;
        }

        .reply-input {
            width: 100%;
            padding: 0.75rem;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            color: var(--text-primary);
            font-family: inherit;
            resize: vertical;
            min-height: 80px;
        }

        .reply-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .reply-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .reply-btn.cancel {
            background: var(--bg-secondary);
            color: var(--text-muted);
        }

        .reply-btn.submit {
            background: var(--primary-color);
            color: white;
        }

        .replies {
            margin-left: 3rem;
            margin-top: 1rem;
            border-left: 2px solid var(--border-color);
            padding-left: 1rem;
        }

        /* Forum Section */
        .forum-section {
            display: none;
        }

        .forum-section.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .articles-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .header-container {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .nav-tabs {
                order: 3;
                width: 100%;
                justify-content: center;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .modal-content {
                width: 95%;
                margin: 1rem;
            }

            .modal-header,
            .modal-body {
                padding: 1rem;
            }

            .replies {
                margin-left: 1rem;
            }

            .reply-form {
                margin-left: 1rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--border-color);
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Toast Notifications */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--bg-card);
            color: var(--text-primary);
            padding: 1rem 1.5rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            backdrop-filter: blur(20px);
            z-index: 3000;
            animation: slideInUp 0.3s ease-out;
            max-width: 300px;
            box-shadow: var(--shadow-xl);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .toast.success {
            border-left: 4px solid var(--success-color);
        }

        .toast.error {
            border-left: 4px solid var(--error-color);
        }

        .toast.info {
            border-left: 4px solid var(--info-color);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-code"></i>
                </div>
                <span>DevForum & Blog</span>
            </a>
            
            <div class="nav-tabs">
                <div class="nav-tab active" data-section="blog">
                    <i class="fas fa-blog"></i> Blog
                </div>
                <div class="nav-tab" data-section="forum">
                    <i class="fas fa-comments"></i> Forum
                </div>
            </div>
            
            <div class="user-menu">
                <div class="user-avatar">JD</div>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Blog Section -->
        <section class="blog-section active" id="blog-section">
            <div class="section-header">
                <h1 class="section-title">
                    <i class="fas fa-blog"></i>
                    Articles de développement
                </h1>
                <div class="view-toggle">
                    <button class="toggle-btn active" data-view="grid">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="toggle-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <div class="articles-grid" id="articles-container">
                <!-- Article 1 -->
                <article class="article-card" data-article-id="1">
                    <div class="article-image">
                        <i class="fab fa-react"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Sarah Dev</span>
                            <span><i class="fas fa-calendar"></i> 15 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 8 min</span>
                        </div>
                        <h2 class="article-title">Guide complet de React Hooks en 2025</h2>
                        <p class="article-excerpt">
                            Découvrez les dernières fonctionnalités des React Hooks et comment les utiliser efficacement dans vos projets modernes...
                        </p>
                        <div class="article-tags">
                            <span class="tag react">React</span>
                            <span class="tag javascript">JavaScript</span>
                            <span class="tag">Hooks</span>
                            <span class="tag">Frontend</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="24">
                                <i class="fas fa-heart"></i>
                                <span>24</span>
                            </button>
                            <button class="comment-btn" data-comments="12">
                                <i class="fas fa-comment"></i>
                                <span>12</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="article-card" data-article-id="2">
                    <div class="article-image">
                        <i class="fab fa-python"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Alex Python</span>
                            <span><i class="fas fa-calendar"></i> 14 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 12 min</span>
                        </div>
                        <h2 class="article-title">Machine Learning avec Python : Les bases essentielles</h2>
                        <p class="article-excerpt">
                            Apprenez les concepts fondamentaux du machine learning et comment implémenter vos premiers modèles avec Python...
                        </p>
                        <div class="article-tags">
                            <span class="tag python">Python</span>
                            <span class="tag">Machine Learning</span>
                            <span class="tag">IA</span>
                            <span class="tag">Data Science</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="18">
                                <i class="fas fa-heart"></i>
                                <span>18</span>
                            </button>
                            <button class="comment-btn" data-comments="8">
                                <i class="fas fa-comment"></i>
                                <span>8</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="article-card" data-article-id="3">
                    <div class="article-image">
                        <i class="fab fa-laravel"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Marie Laravel</span>
                            <span><i class="fas fa-calendar"></i> 13 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 15 min</span>
                        </div>
                        <h2 class="article-title">API REST sécurisée avec Laravel 11</h2>
                        <p class="article-excerpt">
                            Créez une API REST robuste et sécurisée avec Laravel 11, incluant l'authentification JWT et les meilleures pratiques...
                        </p>
                        <div class="article-tags">
                            <span class="tag php">PHP</span>
                            <span class="tag laravel">Laravel</span>
                            <span class="tag">API</span>
                            <span class="tag">Backend</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="32">
                                <i class="fas fa-heart"></i>
                                <span>32</span>
                            </button>
                            <button class="comment-btn" data-comments="15">
                                <i class="fas fa-comment"></i>
                                <span>15</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="article-card" data-article-id="4">
                    <div class="article-image">
                        <i class="fab fa-vuejs"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Tom Vue</span>
                            <span><i class="fas fa-calendar"></i> 12 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 10 min</span>
                        </div>
                        <h2 class="article-title">Vue.js 3 : Composition API vs Options API</h2>
                        <p class="article-excerpt">
                            Comparaison détaillée entre les deux approches de Vue.js 3 avec des exemples concrets et des recommandations d'usage...
                        </p>
                        <div class="article-tags">
                            <span class="tag vue">Vue.js</span>
                            <span class="tag javascript">JavaScript</span>
                            <span class="tag">Composition API</span>
                            <span class="tag">Frontend</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="27">
                                <i class="fas fa-heart"></i>
                                <span>27</span>
                            </button>
                            <button class="comment-btn" data-comments="9">
                                <i class="fas fa-comment"></i>
                                <span>9</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="article-card" data-article-id="5">
                    <div class="article-image">
                        <i class="fab fa-node-js"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Kevin Node</span>
                            <span><i class="fas fa-calendar"></i> 11 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 14 min</span>
                        </div>
                        <h2 class="article-title">Microservices avec Node.js et Docker</h2>
                        <p class="article-excerpt">
                            Architecture microservices moderne avec Node.js, Docker et Kubernetes pour des applications scalables...
                        </p>
                        <div class="article-tags">
                            <span class="tag">Node.js</span>
                            <span class="tag">Docker</span>
                            <span class="tag">Microservices</span>
                            <span class="tag">DevOps</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="41">
                                <i class="fas fa-heart"></i>
                                <span>41</span>
                            </button>
                            <button class="comment-btn" data-comments="22">
                                <i class="fas fa-comment"></i>
                                <span>22</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Article 6 -->
                <article class="article-card" data-article-id="6">
                    <div class="article-image">
                        <i class="fab fa-css3-alt"></i>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> Lisa Design</span>
                            <span><i class="fas fa-calendar"></i> 10 juillet 2025</span>
                            <span><i class="fas fa-clock"></i> 7 min</span>
                        </div>
                        <h2 class="article-title">CSS Grid et Flexbox : Le guide ultime</h2>
                        <p class="article-excerpt">
                            Maîtrisez parfaitement CSS Grid et Flexbox avec des exemples pratiques et des techniques avancées de layout...
                        </p>
                        <div class="article-tags">
                            <span class="tag">CSS</span>
                            <span class="tag">Grid</span>
                            <span class="tag">Flexbox</span>
                            <span class="tag">Layout</span>
                        </div>
                        <div class="article-actions">
                            <button class="like-btn" data-likes="35">
                                <i class="fas fa-heart"></i>
                                <span>35</span>
                            </button>
                            <button class="comment-btn" data-comments="18">
                                <i class="fas fa-comment"></i>
                                <span>18</span>
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- Forum Section -->
        <section class="forum-section" id="forum-section">
            <div class="section-header">
                <h1 class="section-title">
                    <i class="fas fa-comments"></i>
                    Forum de discussion
                </h1>
            </div>
            <div class="loading">
                <div class="spinner"></div>
            </div>
        </section>
    </div>

    <!-- Article Modal -->
    <div class="modal" id="article-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close-btn" id="close-modal">
                    <i class="fas fa-times"></i>
                </button>
                <div id="modal-article-meta"></div>
                <h1 id="modal-article-title"></h1>
                <div id="modal-article-tags"></div>
            </div>
            <div class="modal-body">
                <div id="modal-article-content"></div>
                
                <div class="article-actions" style="margin: 2rem 0; padding: 1rem 0; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
                    <button class="like-btn" id="modal-like-btn">
                        <i class="fas fa-heart"></i>
                        <span>0</span>
                    </button>
                    <div style="display: flex; gap: 1rem;">
                        <button class="comment-btn">
                            <i class="fas fa-share"></i>
                            Partager
                        </button>
                        <button class="comment-btn">
                            <i class="fas fa-bookmark"></i>
                            Sauvegarder
                        </button>
                    </div>
                </div>

                <div class="comments-section">
                    <div class="comments-header">
                        <h3 class="comments-title">
                            <i class="fas fa-comments"></i>
                            Commentaires (<span id="comments-count">0</span>)
                        </h3>
                    </div>

                    <div class="comment-form">
                        <textarea class="comment-input" placeholder="Écrivez votre commentaire..." id="new-comment"></textarea>
                        <div class="comment-form-actions">
                            <div class="comment-options">
                                <button class="emoji-btn">😀</button>
                                <button class="emoji-btn">👍</button>
                                <button class="emoji-btn">❤️</button>
                                <button class="emoji-btn">🚀</button>
                                <button class="emoji-btn">💡</button>
                            </div>
                            <button class="submit-comment-btn" id="submit-comment">
                                <i class="fas fa-paper-plane"></i>
                                Commenter
                            </button>
                        </div>
                    </div>

                    <div class="comments-list" id="comments-list">
                        <!-- Comments will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        class BlogForumApp {
            constructor() {
                this.currentSection = 'blog';
                this.currentView = 'grid';
                this.articles = this.initArticlesData();
                this.comments = this.initCommentsData();
                this.users = this.initUsersData();
                this.currentUser = { id: 1, name: 'John Doe', avatar: 'JD' };
                
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupViewToggle();
                this.setupModal();
                this.loadArticles();
            }

            initArticlesData() {
                return {
                    1: {
                        id: 1,
                        title: "Guide complet de React Hooks en 2025",
                        author: "Sarah Dev",
                        date: "15 juillet 2025",
                        readTime: "8 min",
                        content: `
                            <h3>Introduction aux React Hooks</h3>
                            <p>Les React Hooks ont révolutionné la façon dont nous écrivons des composants React. Depuis leur introduction en React 16.8, ils permettent d'utiliser l'état et d'autres fonctionnalités de React sans écrire de classe.</p>
                            
                            <h3>Les Hooks essentiels</h3>
                            <p><strong>useState</strong> : Pour gérer l'état local dans vos composants fonctionnels.</p>
                            <p><strong>useEffect</strong> : Pour effectuer des effets de bord comme les appels d'API.</p>
                            <p><strong>useContext</strong> : Pour consommer un contexte React directement.</p>
                            
                            <h3>Exemple pratique</h3>
                            <p>Voici un exemple simple d'utilisation de <code>useState</code> :</p>
                            <pre><code>const [count, setCount] = useState(0);</code></pre>
                            
                            <h3>Bonnes pratiques</h3>
                            <p>• Toujours utiliser les Hooks au niveau supérieur de vos composants</p>
                            <p>• Ne pas utiliser les Hooks dans des boucles ou des conditions</p>
                            <p>• Créer des Hooks personnalisés pour la logique réutilisable</p>
                        `,
                        tags: ['react', 'javascript', 'hooks', 'frontend'],
                        likes: 24,
                        comments: 12
                    },
                    2: {
                        id: 2,
                        title: "Machine Learning avec Python : Les bases essentielles",
                        author: "Alex Python",
                        date: "14 juillet 2025",
                        readTime: "12 min",
                        content: `
                            <h3>Qu'est-ce que le Machine Learning ?</h3>
                            <p>Le Machine Learning est une branche de l'intelligence artificielle qui permet aux ordinateurs d'apprendre sans être explicitement programmés.</p>
                            
                            <h3>Types d'apprentissage</h3>
                            <p><strong>Apprentissage supervisé</strong> : Utilise des données étiquetées pour entraîner le modèle.</p>
                            <p><strong>Apprentissage non supervisé</strong> : Trouve des patterns dans des données non étiquetées.</p>
                            <p><strong>Apprentissage par renforcement</strong> : Apprend par essai-erreur avec un système de récompenses.</p>
                            
                            <h3>Librairies Python essentielles</h3>
                            <p>• <strong>Scikit-learn</strong> : Pour les algorithmes de base</p>
                            <p>• <strong>TensorFlow</strong> : Pour le deep learning</p>
                            <p>• <strong>Pandas</strong> : Pour la manipulation de données</p>
                            <p>• <strong>NumPy</strong> : Pour les calculs numériques</p>
                        `,
                        tags: ['python', 'machine-learning', 'ia', 'data-science'],
                        likes: 18,
                        comments: 8
                    },
                    3: {
                        id: 3,
                        title: "API REST sécurisée avec Laravel 11",
                        author: "Marie Laravel",
                        date: "13 juillet 2025",
                        readTime: "15 min",
                        content: `
                            <h3>Pourquoi sécuriser son API ?</h3>
                            <p>La sécurité d'une API est cruciale pour protéger vos données et celles de vos utilisateurs. Laravel 11 offre de nombreux outils pour créer des APIs sécurisées.</p>
                            
                            <h3>Authentification JWT</h3>
                            <p>JSON Web Tokens (JWT) est un standard pour la transmission sécurisée d'informations entre parties.</p>
                            
                            <h3>Middleware de sécurité</h3>
                            <p>Laravel propose plusieurs middlewares pour sécuriser vos routes :</p>
                            <p>• <code>auth:api</code> pour l'authentification</p>
                            <p>• <code>throttle</code> pour limiter le taux de requêtes</p>
                            <p>• <code>cors</code> pour gérer les origines autorisées</p>
                            
                            <h3>Validation des données</h3>
                            <p>Toujours valider les données entrantes avec les Form Requests de Laravel.</p>
                        `,
                        tags: ['php', 'laravel', 'api', 'backend'],
                        likes: 32,
                        comments: 15
                    }
                };
            }

            initCommentsData() {
                return {
                    1: [
                        {
                            id: 1,
                            userId: 2,
                            content: "Excellent article ! Les exemples sont très clairs.",
                            timestamp: "Il y a 2h",
                            likes: 5,
                            replies: [
                                {
                                    id: 2,
                                    userId: 1,
                                    content: "Merci beaucoup ! 😊",
                                    timestamp: "Il y a 1h",
                                    likes: 2
                                }
                            ]
                        },
                        {
                            id: 3,
                            userId: 3,
                            content: "Pourriez-vous faire un article sur les Hooks personnalisés ?",
                            timestamp: "Il y a 4h",
                            likes: 8,
                            replies: []
                        }
                    ],
                    2: [
                        {
                            id: 4,
                            userId: 4,
                            content: "Très bon pour débuter en ML ! Des ressources pour approfondir ?",
                            timestamp: "Il y a 3h",
                            likes: 3,
                            replies: []
                        }
                    ],
                    3: [
                        {
                            id: 5,
                            userId: 5,
                            content: "La partie sur JWT est particulièrement utile. Merci !",
                            timestamp: "Il y a 5h",
                            likes: 6,
                            replies: []
                        }
                    ]
                };
            }

            initUsersData() {
                return {
                    1: { name: "John Doe", avatar: "JD" },
                    2: { name: "Alice Martin", avatar: "AM" },
                    3: { name: "Bob Wilson", avatar: "BW" },
                    4: { name: "Claire Dubois", avatar: "CD" },
                    5: { name: "David Lee", avatar: "DL" }
                };
            }

            setupEventListeners() {
                // Navigation tabs
                document.querySelectorAll('.nav-tab').forEach(tab => {
                    tab.addEventListener('click', () => {
                        this.switchSection(tab.dataset.section);
                    });
                });

                // Article cards
                document.querySelectorAll('.article-card').forEach(card => {
                    card.addEventListener('click', (e) => {
                        if (!e.target.closest('.article-actions')) {
                            this.openArticle(card.dataset.articleId);
                        }
                    });
                });

                // Like buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.like-btn')) {
                        this.toggleLike(e.target.closest('.like-btn'));
                    }
                });

                // Comment buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.comment-btn')) {
                        const card = e.target.closest('.article-card');
                        if (card) {
                            this.openArticle(card.dataset.articleId);
                        }
                    }
                });

                // Emoji buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.emoji-btn')) {
                        this.insertEmoji(e.target.textContent);
                    }
                });
            }

            setupViewToggle() {
                document.querySelectorAll('.toggle-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        this.currentView = btn.dataset.view;
                        this.updateView();
                    });
                });
            }

            setupModal() {
                const modal = document.getElementById('article-modal');
                const closeBtn = document.getElementById('close-modal');
                const submitBtn = document.getElementById('submit-comment');

                closeBtn.addEventListener('click', () => {
                    this.closeModal();
                });

                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        this.closeModal();
                    }
                });

                submitBtn.addEventListener('click', () => {
                    this.submitComment();
                });

                // Reply buttons
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.comment-action-btn')) {
                        const btn = e.target.closest('.comment-action-btn');
                        if (btn.textContent.includes('Répondre')) {
                            this.toggleReplyForm(btn);
                        } else if (btn.textContent.includes('J\'aime')) {
                            this.toggleCommentLike(btn);
                        }
                    }
                });

                // Reply form submissions
                document.addEventListener('click', (e) => {
                    if (e.target.closest('.reply-btn')) {
                        const btn = e.target.closest('.reply-btn');
                        if (btn.classList.contains('submit')) {
                            this.submitReply(btn);
                        } else if (btn.classList.contains('cancel')) {
                            this.cancelReply(btn);
                        }
                    }
                });
            }

            switchSection(section) {
                document.querySelectorAll('.nav-tab').forEach(tab => {
                    tab.classList.remove('active');
                });
                document.querySelector(`[data-section="${section}"]`).classList.add('active');

                document.querySelectorAll('.blog-section, .forum-section').forEach(sec => {
                    sec.classList.remove('active');
                });
                document.getElementById(`${section}-section`).classList.add('active');

                this.currentSection = section;
            }

            updateView() {
                const container = document.getElementById('articles-container');
                if (this.currentView === 'list') {
                    container.style.gridTemplateColumns = '1fr';
                } else {
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(350px, 1fr))';
                }
            }

            loadArticles() {
                // Articles are already in the HTML
                // This method could be used to load from an API
            }

            openArticle(articleId) {
                const article = this.articles[articleId];
                if (!article) return;

                const modal = document.getElementById('article-modal');
                
                // Update modal content
                document.getElementById('modal-article-title').textContent = article.title;
                document.getElementById('modal-article-meta').innerHTML = `
                    <div class="article-meta">
                        <span><i class="fas fa-user"></i> ${article.author}</span>
                        <span><i class="fas fa-calendar"></i> ${article.date}</span>
                        <span><i class="fas fa-clock"></i> ${article.readTime}</span>
                    </div>
                `;
                document.getElementById('modal-article-tags').innerHTML = 
                    article.tags.map(tag => `<span class="tag ${tag}">${tag}</span>`).join('');
                document.getElementById('modal-article-content').innerHTML = article.content;
                
                // Update like button
                const modalLikeBtn = document.getElementById('modal-like-btn');
                modalLikeBtn.dataset.likes = article.likes;
                modalLikeBtn.querySelector('span').textContent = article.likes;
                modalLikeBtn.dataset.articleId = articleId;

                // Load comments
                this.loadComments(articleId);

                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            closeModal() {
                document.getElementById('article-modal').classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            loadComments(articleId) {
                const comments = this.comments[articleId] || [];
                const commentsList = document.getElementById('comments-list');
                const commentsCount = document.getElementById('comments-count');
                
                commentsCount.textContent = this.getTotalCommentsCount(comments);

                commentsList.innerHTML = comments.map(comment => this.renderComment(comment)).join('');
            }

            getTotalCommentsCount(comments) {
                return comments.reduce((total, comment) => {
                    return total + 1 + (comment.replies ? comment.replies.length : 0);
                }, 0);
            }

            renderComment(comment) {
                const user = this.users[comment.userId];
                const replies = comment.replies || [];
                
                return `
                    <div class="comment" data-comment-id="${comment.id}">
                        <div class="comment-header">
                            <div class="comment-avatar">${user.avatar}</div>
                            <div class="comment-info">
                                <div class="comment-author">${user.name}</div>
                                <div class="comment-time">${comment.timestamp}</div>
                            </div>
                        </div>
                        <div class="comment-content">${comment.content}</div>
                        <div class="comment-actions">
                            <button class="comment-action-btn ${comment.userLiked ? 'liked' : ''}">
                                <i class="fas fa-heart"></i>
                                J'aime (${comment.likes || 0})
                            </button>
                            <button class="comment-action-btn">
                                <i class="fas fa-reply"></i>
                                Répondre
                            </button>
                        </div>
                        <div class="reply-form">
                            <textarea class="reply-input" placeholder="Écrivez votre réponse..."></textarea>
                            <div class="reply-actions">
                                <button class="reply-btn cancel">Annuler</button>
                                <button class="reply-btn submit">Répondre</button>
                            </div>
                        </div>
                        ${replies.length > 0 ? `
                            <div class="replies">
                                ${replies.map(reply => this.renderComment(reply)).join('')}
                            </div>
                        ` : ''}
                    </div>
                `;
            }

            toggleLike(likeBtn) {
                const currentLikes = parseInt(likeBtn.dataset.likes || likeBtn.querySelector('span').textContent);
                const isLiked = likeBtn.classList.contains('liked');
                
                if (isLiked) {
                    likeBtn.classList.remove('liked');
                    likeBtn.querySelector('span').textContent = currentLikes - 1;
                    this.showToast('Like retiré', 'info');
                } else {
                    likeBtn.classList.add('liked');
                    likeBtn.querySelector('span').textContent = currentLikes + 1;
                    this.showToast('Article aimé !', 'success');
                }

                // Update article data if in modal
                if (likeBtn.dataset.articleId) {
                    const articleId = likeBtn.dataset.articleId;
                    this.articles[articleId].likes = parseInt(likeBtn.querySelector('span').textContent);
                    
                    // Update corresponding card
                    const card = document.querySelector(`[data-article-id="${articleId}"]`);
                    if (card) {
                        const cardLikeBtn = card.querySelector('.like-btn');
                        cardLikeBtn.querySelector('span').textContent = this.articles[articleId].likes;
                        if (isLiked) {
                            cardLikeBtn.classList.remove('liked');
                        } else {
                            cardLikeBtn.classList.add('liked');
                        }
                    }
                }
            }

            submitComment() {
                const textarea = document.getElementById('new-comment');
                const content = textarea.value.trim();
                
                if (!content) {
                    this.showToast('Veuillez écrire un commentaire', 'error');
                    return;
                }

                // Get current article ID from modal
                const modalLikeBtn = document.getElementById('modal-like-btn');
                const articleId = modalLikeBtn.dataset.articleId;
                
                if (!this.comments[articleId]) {
                    this.comments[articleId] = [];
                }

                const newComment = {
                    id: Date.now(),
                    userId: this.currentUser.id,
                    content: content,
                    timestamp: 'À l\'instant',
                    likes: 0,
                    replies: []
                };

                this.comments[articleId].unshift(newComment);
                textarea.value = '';
                
                this.loadComments(articleId);
                this.showToast('Commentaire ajouté !', 'success');

                // Update comment count in article card
                const card = document.querySelector(`[data-article-id="${articleId}"]`);
                if (card) {
                    const commentBtn = card.querySelector('.comment-btn');
                    const currentCount = parseInt(commentBtn.dataset.comments);
                    commentBtn.dataset.comments = currentCount + 1;
                    commentBtn.querySelector('span').textContent = currentCount + 1;
                }
            }

            toggleReplyForm(btn) {
                const comment = btn.closest('.comment');
                const replyForm = comment.querySelector('.reply-form');
                
                if (replyForm.classList.contains('active')) {
                    replyForm.classList.remove('active');
                } else {
                    // Close other reply forms
                    document.querySelectorAll('.reply-form.active').forEach(form => {
                        form.classList.remove('active');
                    });
                    replyForm.classList.add('active');
                    replyForm.querySelector('.reply-input').focus();
                }
            }

            toggleCommentLike(btn) {
                const currentText = btn.textContent;
                const likesMatch = currentText.match(/\((\d+)\)/);
                const currentLikes = likesMatch ? parseInt(likesMatch[1]) : 0;
                const isLiked = btn.classList.contains('liked');
                
                if (isLiked) {
                    btn.classList.remove('liked');
                    btn.innerHTML = `<i class="fas fa-heart"></i> J'aime (${currentLikes - 1})`;
                } else {
                    btn.classList.add('liked');
                    btn.innerHTML = `<i class="fas fa-heart"></i> J'aime (${currentLikes + 1})`;
                }
            }

            submitReply(btn) {
                const replyForm = btn.closest('.reply-form');
                const textarea = replyForm.querySelector('.reply-input');
                const content = textarea.value.trim();
                
                if (!content) {
                    this.showToast('Veuillez écrire une réponse', 'error');
                    return;
                }

                const comment = btn.closest('.comment');
                const commentId = comment.dataset.commentId;
                
                // Add reply logic here
                textarea.value = '';
                replyForm.classList.remove('active');
                this.showToast('Réponse ajoutée !', 'success');
            }

            cancelReply(btn) {
                const replyForm = btn.closest('.reply-form');
                replyForm.classList.remove('active');
                replyForm.querySelector('.reply-input').value = '';
            }

            insertEmoji(emoji) {
                const textarea = document.getElementById('new-comment');
                const cursorPos = textarea.selectionStart;
                const textBefore = textarea.value.substring(0, cursorPos);
                const textAfter = textarea.value.substring(cursorPos);
                
                textarea.value = textBefore + emoji + textAfter;
                textarea.focus();
                textarea.setSelectionRange(cursorPos + emoji.length, cursorPos + emoji.length);
            }

            showToast(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                toast.textContent = message;
                
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.style.animation = 'slideOutDown 0.3s ease-out';
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }, 3000);
            }
        }

        // Initialize the app
        document.addEventListener('DOMContentLoaded', () => {
            new BlogForumApp();
        });

        // Add slideOutDown animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOutDown {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateY(100%);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>