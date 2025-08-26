<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressources - DevCommunity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .forum-main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            position: relative;
        }

        /* Particles Background Effect */
        .forum-main-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 255, 136, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        /* Header */
        .forum-header {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .forum-header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .forum-logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
            animation: logoGlow 3s ease-in-out infinite alternate;
            text-decoration: none;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6)); }
        }

        .forum-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .forum-nav-link {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .forum-nav-link:hover, .forum-nav-link.forum-active {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        .forum-user-menu {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .forum-search-bar {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 20px;
            padding: 0.7rem 1.5rem;
            color: #ffffff;
            width: 300px;
            transition: all 0.3s ease;
        }

        .forum-search-bar:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
            transform: scale(1.02);
        }

        .forum-user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 255, 136, 0.3);
        }

        .forum-user-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.5);
        }

        /* Main Content */
        .resources-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Breadcrumb */
        .forum-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888;
            margin-bottom: 2rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 8px;
            border-left: 3px solid #00ff88;
        }

        .forum-breadcrumb a {
            color: #00d4ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forum-breadcrumb a:hover {
            color: #00ff88;
        }

        /* Page Header */
        .resources-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .resources-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .resources-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Stats Section */
        .resources-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0, 212, 255, 0.3);
        }

        .stat-label {
            color: #888;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .action-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .action-btn:hover::before {
            left: 100%;
        }

        .action-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        .action-btn.secondary {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        /* Filters Section */
        .resources-filters {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .filters-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            color: #00ff88;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-input, .filter-select {
            background: #2a2a2a;
            border: 1px solid rgba(0, 255, 136, 0.3);
            border-radius: 8px;
            padding: 0.7rem 1rem;
            color: #ffffff;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .filter-input:focus, .filter-select:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 2px rgba(0, 255, 136, 0.2);
        }

        .filter-btn {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* View Toggle */
        .view-toggle {
            display: flex;
            gap: 0.5rem;
            background: #2a2a2a;
            border-radius: 8px;
            padding: 0.3rem;
        }

        .view-btn {
            background: transparent;
            border: none;
            color: #888;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
        }

        /* Category Navigation */
        .category-nav {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            overflow-x: auto;
            padding: 1rem 0;
        }

        .category-btn {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.1);
            color: #b0b0b0;
            padding: 1rem 2rem;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .category-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .category-btn:hover::before {
            left: 100%;
        }

        .category-btn:hover, .category-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* Resources Grid */
        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .resource-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .resource-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
            z-index: 1;
        }

        .resource-card:hover::before {
            left: 100%;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .resource-thumbnail {
            height: 200px;
            background: linear-gradient(135deg, #00ff88, #00d4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .resource-thumbnail::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
        }

        .resource-content {
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .resource-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .resource-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .resource-type {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .resource-description {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .resource-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .resource-tag {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            font-size: 0.8rem;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .resource-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            color: #888;
            font-size: 0.9rem;
        }

        .resource-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rating-stars {
            color: #ffd700;
        }

        .resource-actions {
            display: flex;
            gap: 0.5rem;
        }

        .resource-btn {
            flex: 1;
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .resource-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .resource-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .resource-btn.favorite {
            background: rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
            color: #ffd700;
        }

        .resource-btn.favorite.active {
            background: rgba(255, 215, 0, 0.2);
        }

        /* Resources List View */
        .resources-list {
            display: none;
            gap: 1rem;
        }

        .resources-list.active {
            display: flex;
            flex-direction: column;
        }

        .resource-list-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .resource-list-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
        }

        .resource-list-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #000;
            flex-shrink: 0;
        }

        .resource-list-content {
            flex: 1;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            gap: 2rem;
            align-items: center;
        }

        .resource-list-main h3 {
            font-size: 1.2rem;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .resource-list-main p {
            color: #888;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .resource-list-info {
            text-align: center;
        }

        .resource-list-info strong {
            display: block;
            color: #00d4ff;
            font-size: 1rem;
            font-weight: 700;
        }

        .resource-list-info span {
            color: #888;
            font-size: 0.8rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 3rem;
        }

        .pagination-btn {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.1);
            color: #ffffff;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .pagination-btn:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateY(-2px);
        }

        .pagination-btn.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-info {
            color: #888;
            margin: 0 1rem;
        }

        /* Loading States */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-overlay.show {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(0, 255, 136, 0.3);
            border-top: 3px solid #00ff88;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 100px;
            right: 20px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .toast.show {
            transform: translateX(0);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            padding: 2rem;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            max-width: 800px;
            width: 100%;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .modal-title {
            font-size: 1.5rem;
            color: #00ff88;
            font-weight: 700;
        }

        .modal-close {
            background: none;
            border: none;
            color: #888;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .modal-close:hover {
            color: #ffffff;
        }

        /* Featured Resources */
        .featured-section {
            margin-bottom: 3rem;
        }

        .featured-title {
            font-size: 2rem;
            color: #00ff88;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .featured-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid #00ff88;
            position: relative;
            transition: all 0.3s ease;
        }

        .featured-card::before {
            content: '⭐ RECOMMANDÉ';
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #000;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            z-index: 2;
        }

        .featured-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 255, 136, 0.3);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .filters-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .resources-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }

            .category-nav {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 768px) {
            .forum-header-content {
                padding: 0 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .forum-search-bar {
                width: 100%;
                order: 3;
                flex-basis: 100%;
            }

            .resources-container {
                padding: 1rem;
            }

            .resources-title {
                font-size: 2rem;
            }

            .resources-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .resources-grid {
                grid-template-columns: 1fr;
            }

            .resource-list-content {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }

            .modal-content {
                margin: 1rem;
                padding: 1.5rem;
            }

            .quick-actions {
                flex-direction: column;
                align-items: center;
            }

            .action-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="forum-main-container">
        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <!-- Toast Notification -->
        <div class="toast" id="toast"></div>

        <!-- Resource Detail Modal -->
        <div class="modal-overlay" id="resourceModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Détails de la ressource</h2>
                    <button class="modal-close" id="modalClose">&times;</button>
                </div>
                <div id="modalBody">
                    <!-- Resource details will be inserted here -->
                </div>
            </div>
        </div>

        <!-- Header -->
        <!-- <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">DevCommunity</a>
                
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link">Forum</a>
                    <a href="#" class="forum-nav-link">Membres</a>
                    <a href="#" class="forum-nav-link forum-active">Ressources</a>
                    <a href="#" class="forum-nav-link">Aide</a>
                </nav>

                <div class="forum-user-menu">
                    <input type="text" class="forum-search-bar" placeholder="Rechercher une ressource..." id="resourceSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header> -->

        <!-- Main Content -->
        <div class="resources-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <span>📚 Ressources</span>
            </div>

            <!-- Page Header -->
            <div class="resources-header">
                <h1 class="resources-title">Bibliothèque de Ressources</h1>
                <p class="resources-subtitle">
                    Découvrez notre collection soigneusement sélectionnée de tutoriels, outils, livres et ressources 
                    pour booster vos compétences en développement et rester à la pointe de la technologie.
                </p>
            </div>

            <!-- Stats Section -->
            <div class="resources-stats">
                <div class="stat-card">
                    <div class="stat-icon">📚</div>
                    <div class="stat-number" id="totalResources">1,247</div>
                    <div class="stat-label">Ressources Total</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🆕</div>
                    <div class="stat-number" id="newResources">42</div>
                    <div class="stat-label">Nouveautés (7j)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-number" id="popularResources">156</div>
                    <div class="stat-label">Populaires</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🏷️</div>
                    <div class="stat-number" id="categories">28</div>
                    <div class="stat-label">Catégories</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" id="addResourceBtn">
                    ➕ Ajouter une ressource
                </button>
                <button class="action-btn secondary" id="suggestResourceBtn">
                    💡 Suggérer une ressource
                </button>
                <button class="action-btn secondary" id="myFavoritesBtn">
                    ⭐ Mes favoris
                </button>
            </div>

            <!-- Category Navigation -->
            <div class="category-nav">
                <button class="category-btn active" data-category="all">🌐 Toutes</button>
                <button class="category-btn" data-category="tutorials">📖 Tutoriels</button>
                <button class="category-btn" data-category="tools">🛠️ Outils</button>
                <button class="category-btn" data-category="books">📚 Livres</button>
                <button class="category-btn" data-category="videos">🎥 Vidéos</button>
                <button class="category-btn" data-category="documentation">📋 Documentation</button>
                <button class="category-btn" data-category="courses">🎓 Cours</button>
                <button class="category-btn" data-category="frameworks">⚡ Frameworks</button>
            </div>

            <!-- Featured Resources -->
            <div class="featured-section">
                <h2 class="featured-title">🌟 Ressources Recommandées</h2>
                <div class="featured-grid" id="featuredGrid">
                    <!-- Featured resources will be inserted here -->
                </div>
            </div>

            <!-- Filters Section -->
            <div class="resources-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Titre, description, technologies..." id="searchFilter">
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Difficulté</label>
                        <select class="filter-select" id="difficultyFilter">
                            <option value="">Toutes</option>
                            <option value="beginner">Débutant</option>
                            <option value="intermediate">Intermédiaire</option>
                            <option value="advanced">Avancé</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Langue</label>
                        <select class="filter-select" id="languageFilter">
                            <option value="">Toutes</option>
                            <option value="fr">Français</option>
                            <option value="en">Anglais</option>
                            <option value="es">Espagnol</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Tri</label>
                        <select class="filter-select" id="sortFilter">
                            <option value="newest">Plus récent</option>
                            <option value="oldest">Plus ancien</option>
                            <option value="rating">Mieux noté</option>
                            <option value="popular">Plus populaire</option>
                            <option value="title">Titre A-Z</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Vue</label>
                        <div class="view-toggle">
                            <button class="view-btn active" id="gridView">🔲</button>
                            <button class="view-btn" id="listView">📋</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resources Grid View -->
            <div class="resources-grid" id="resourcesGrid">
                <!-- Resources will be dynamically inserted here -->
            </div>

            <!-- Resources List View -->
            <div class="resources-list" id="resourcesList">
                <!-- List view resources will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">52</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentView = 'grid';
        let currentCategory = 'all';
        let totalResources = 1247;
        let resourcesPerPage = 12;
        let filteredResources = [];
        let allResources = [];

        // Sample resource data
        const resourceData = [
            {
                id: 1,
                title: "Guide Complet React 18",
                description: "Un tutoriel approfondi couvrant toutes les nouvelles fonctionnalités de React 18, incluant Concurrent Features, Suspense, et les hooks avancés.",
                category: "tutorials",
                type: "Tutoriel",
                difficulty: "intermediate",
                language: "fr",
                rating: 4.8,
                votes: 245,
                views: 12450,
                author: "Marie Dubois",
                date: "2024-01-15",
                tags: ["React", "JavaScript", "Frontend", "Hooks"],
                url: "https://example.com/react-guide",
                icon: "⚛️",
                featured: true,
                free: true
            },
            {
                id: 2,
                title: "Visual Studio Code Pro Tips",
                description: "Collection des meilleures extensions et raccourcis pour maximiser votre productivité avec VS Code.",
                category: "tools",
                type: "Outil",
                difficulty: "beginner",
                language: "fr",
                rating: 4.6,
                votes: 189,
                views: 8930,
                author: "Alex Chen",
                date: "2024-01-10",
                tags: ["VS Code", "Productivité", "Extensions", "IDE"],
                url: "https://example.com/vscode-tips",
                icon: "💻",
                featured: false,
                free: true
            },
            {
                id: 3,
                title: "Clean Code en JavaScript",
                description: "Livre numérique gratuit sur les meilleures pratiques pour écrire du code JavaScript propre, maintenable et performant.",
                category: "books",
                type: "Livre",
                difficulty: "intermediate",
                language: "fr",
                rating: 4.9,
                votes: 567,
                views: 15670,
                author: "Thomas Rodriguez",
                date: "2023-12-20",
                tags: ["JavaScript", "Clean Code", "Bonnes Pratiques", "Architecture"],
                url: "https://example.com/clean-code-js",
                icon: "📖",
                featured: true,
                free: true
            },
            {
                id: 4,
                title: "Docker pour les Développeurs",
                description: "Série de vidéos couvrant Docker de A à Z : conteneurs, images, volumes, networking et orchestration.",
                category: "videos",
                type: "Vidéo",
                difficulty: "intermediate",
                language: "fr",
                rating: 4.7,
                votes: 334,
                views: 9820,
                author: "Sophie Laurent",
                date: "2024-01-08",
                tags: ["Docker", "DevOps", "Conteneurs", "Déploiement"],
                url: "https://example.com/docker-course",
                icon: "🐳",
                featured: false,
                free: false,
                price: "29€"
            },
            {
                id: 5,
                title: "API REST avec Node.js et Express",
                description: "Tutoriel complet pour créer des APIs REST robustes avec Node.js, Express, et MongoDB.",
                category: "tutorials",
                type: "Tutoriel",
                difficulty: "intermediate",
                language: "fr",
                rating: 4.5,
                votes: 278,
                views: 11200,
                author: "Emma Wilson",
                date: "2024-01-05",
                tags: ["Node.js", "Express", "API", "MongoDB", "Backend"],
                url: "https://example.com/nodejs-api",
                icon: "🟢",
                featured: false,
                free: true
            },
            {
                id: 6,
                title: "Figma Design System Kit",
                description: "Kit complet de composants UI/UX pour créer des design systems cohérents dans Figma.",
                category: "tools",
                type: "Ressource",
                difficulty: "beginner",
                language: "en",
                rating: 4.4,
                votes: 156,
                views: 7650,
                author: "Lucas Martin",
                date: "2024-01-03",
                tags: ["Figma", "Design System", "UI/UX", "Composants"],
                url: "https://example.com/figma-kit",
                icon: "🎨",
                featured: false,
                free: true
            },
            {
                id: 7,
                title: "Python Machine Learning",
                description: "Cours complet sur l'apprentissage automatique avec Python, scikit-learn et TensorFlow.",
                category: "courses",
                type: "Cours",
                difficulty: "advanced",
                language: "fr",
                rating: 4.8,
                votes: 445,
                views: 18930,
                author: "Clara Petit",
                date: "2023-12-15",
                tags: ["Python", "Machine Learning", "IA", "TensorFlow", "Data Science"],
                url: "https://example.com/python-ml",
                icon: "🤖",
                featured: true,
                free: false,
                price: "49€"
            },
            {
                id: 8,
                title: "Vue.js 3 Documentation Française",
                description: "Documentation complète de Vue.js 3 traduite en français avec des exemples pratiques.",
                category: "documentation",
                type: "Documentation",
                difficulty: "beginner",
                language: "fr",
                rating: 4.6,
                votes: 198,
                views: 9340,
                author: "Antoine Moreau",
                date: "2024-01-12",
                tags: ["Vue.js", "Documentation", "Frontend", "JavaScript"],
                url: "https://example.com/vue3-docs",
                icon: "💚",
                featured: false,
                free: true
            },
            {
                id: 9,
                title: "Next.js Framework Guide",
                description: "Guide complet du framework Next.js pour créer des applications React performantes et SEO-friendly.",
                category: "frameworks",
                type: "Framework",
                difficulty: "intermediate",
                language: "en",
                rating: 4.7,
                votes: 389,
                views: 14250,
                author: "Léa Rousseau",
                date: "2024-01-07",
                tags: ["Next.js", "React", "SSR", "Framework", "Performance"],
                url: "https://example.com/nextjs-guide",
                icon: "▲",
                featured: false,
                free: true
            },
            {
                id: 10,
                title: "Git & GitHub Mastery",
                description: "Maîtrisez Git et GitHub de fond en comble : branches, merge, rebase, workflows et collaboration.",
                category: "tutorials",
                type: "Tutoriel",
                difficulty: "beginner",
                language: "fr",
                rating: 4.5,
                votes: 267,
                views: 10890,
                author: "David Kim",
                date: "2024-01-09",
                tags: ["Git", "GitHub", "Versioning", "Collaboration", "DevOps"],
                url: "https://example.com/git-mastery",
                icon: "🔀",
                featured: false,
                free: true
            },
            {
                id: 11,
                title: "CSS Grid & Flexbox Guide",
                description: "Guide visuel interactif pour maîtriser CSS Grid et Flexbox avec des exemples pratiques.",
                category: "tutorials",
                type: "Tutoriel",
                difficulty: "beginner",
                language: "fr",
                rating: 4.4,
                votes: 234,
                views: 8760,
                author: "Camille Blanc",
                date: "2024-01-11",
                tags: ["CSS", "Grid", "Flexbox", "Layout", "Frontend"],
                url: "https://example.com/css-layout",
                icon: "🎯",
                featured: false,
                free: true
            },
            {
                id: 12,
                title: "Postman API Testing",
                description: "Outil et guide complet pour tester, documenter et monitorer vos APIs avec Postman.",
                category: "tools",
                type: "Outil",
                difficulty: "intermediate",
                language: "en",
                rating: 4.3,
                votes: 145,
                views: 6540,
                author: "Pierre Garnier",
                date: "2024-01-06",
                tags: ["Postman", "API", "Testing", "Documentation", "Tools"],
                url: "https://example.com/postman-guide",
                icon: "📮",
                featured: false,
                free: true
            }
        ];

        // Initialize the page
        function init() {
            allResources = [...resourceData];
            filteredResources = [...allResources];
            
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                renderFeaturedResources();
                renderResources();
                hideLoading();
                showToast("📚 Page ressources chargée avec succès !", 3000);
            }, 1000);
        }

        // Utility functions
        function showLoading() {
            document.getElementById('loadingOverlay').classList.add('show');
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').classList.remove('show');
        }

        function showToast(message, duration = 3000) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, duration);
        }

        // Setup event listeners
        function setupEventListeners() {
            // Search functionality
            document.getElementById('resourceSearch').addEventListener('input', handleSearch);
            document.getElementById('searchFilter').addEventListener('input', handleSearch);
            
            // Filter functionality
            document.getElementById('difficultyFilter').addEventListener('change', applyFilters);
            document.getElementById('languageFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);
            
            // Category navigation
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.addEventListener('click', () => switchCategory(btn.dataset.category));
            });
            
            // View toggle
            document.getElementById('gridView').addEventListener('click', () => switchView('grid'));
            document.getElementById('listView').addEventListener('click', () => switchView('list'));
            
            // Quick actions
            document.getElementById('addResourceBtn').addEventListener('click', () => showToast('🚀 Ouverture du formulaire d\'ajout...'));
            document.getElementById('suggestResourceBtn').addEventListener('click', () => showToast('💡 Ouverture du formulaire de suggestion...'));
            document.getElementById('myFavoritesBtn').addEventListener('click', showFavorites);
            
            // Pagination
            document.getElementById('prevPage').addEventListener('click', () => changePage(currentPage - 1));
            document.getElementById('nextPage').addEventListener('click', () => changePage(currentPage + 1));
            
            // Modal functionality
            document.getElementById('modalClose').addEventListener('click', closeModal);
            document.getElementById('resourceModal').addEventListener('click', (e) => {
                if (e.target.id === 'resourceModal') closeModal();
            });
        }

        // Search functionality
        function handleSearch() {
            const resourceSearchTerm = document.getElementById('resourceSearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = resourceSearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredResources = allResources.filter(resource => 
                    resource.title.toLowerCase().includes(searchTerm) ||
                    resource.description.toLowerCase().includes(searchTerm) ||
                    resource.tags.some(tag => tag.toLowerCase().includes(searchTerm)) ||
                    resource.author.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredResources = [...allResources];
            }
            
            // Sync search inputs
            document.getElementById('resourceSearch').value = searchTerm;
            document.getElementById('searchFilter').value = searchTerm;
            
            applyFilters();
        }

        // Switch category
        function switchCategory(category) {
            currentCategory = category;
            
            // Update category buttons
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.category === category);
            });
            
            // Filter resources by category
            if (category === 'all') {
                filteredResources = [...allResources];
            } else {
                filteredResources = allResources.filter(resource => resource.category === category);
            }
            
            currentPage = 1;
            applyFilters();
            showToast(`📂 Catégorie "${getCategoryLabel(category)}" sélectionnée`);
        }

        // Apply filters
        function applyFilters() {
            let filtered = [...filteredResources];
            
            // Difficulty filter
            const difficultyFilter = document.getElementById('difficultyFilter').value;
            if (difficultyFilter) {
                filtered = filtered.filter(resource => resource.difficulty === difficultyFilter);
            }
            
            // Language filter
            const languageFilter = document.getElementById('languageFilter').value;
            if (languageFilter) {
                filtered = filtered.filter(resource => resource.language === languageFilter);
            }
            
            // Sort
            const sortBy = document.getElementById('sortFilter').value;
            filtered.sort((a, b) => {
                switch (sortBy) {
                    case 'newest':
                        return new Date(b.date) - new Date(a.date);
                    case 'oldest':
                        return new Date(a.date) - new Date(b.date);
                    case 'rating':
                        return b.rating - a.rating;
                    case 'popular':
                        return b.views - a.views;
                    case 'title':
                        return a.title.localeCompare(b.title);
                    default:
                        return 0;
                }
            });
            
            filteredResources = filtered;
            currentPage = 1;
            renderResources();
        }

        // Switch view
        function switchView(view) {
            currentView = view;
            
            // Update view buttons
            document.getElementById('gridView').classList.toggle('active', view === 'grid');
            document.getElementById('listView').classList.toggle('active', view === 'list');
            
            // Update view containers
            document.getElementById('resourcesGrid').style.display = view === 'grid' ? 'grid' : 'none';
            document.getElementById('resourcesList').classList.toggle('active', view === 'list');
            
            renderResources();
            showToast(`Vue ${view === 'grid' ? 'grille' : 'liste'} activée`);
        }

        // Render featured resources
        function renderFeaturedResources() {
            const featuredGrid = document.getElementById('featuredGrid');
            const featuredResources = allResources.filter(resource => resource.featured).slice(0, 3);
            
            featuredGrid.innerHTML = '';
            
            featuredResources.forEach(resource => {
                const featuredCard = createFeaturedCard(resource);
                featuredGrid.appendChild(featuredCard);
            });
        }

        // Create featured card
        function createFeaturedCard(resource) {
            const card = document.createElement('div');
            card.className = 'featured-card resource-card';
            card.addEventListener('click', () => openResourceDetails(resource));
            
            card.innerHTML = `
                <div class="resource-thumbnail">
                    <span style="font-size: 4rem;">${resource.icon}</span>
                </div>
                <div class="resource-content">
                    <div class="resource-header">
                        <div>
                            <h3 class="resource-title">${resource.title}</h3>
                        </div>
                        <span class="resource-type">${resource.type}</span>
                    </div>
                    <p class="resource-description">${resource.description}</p>
                    <div class="resource-tags">
                        ${resource.tags.slice(0, 3).map(tag => `<span class="resource-tag">${tag}</span>`).join('')}
                    </div>
                    <div class="resource-meta">
                        <div class="resource-rating">
                            <span class="rating-stars">${'★'.repeat(Math.floor(resource.rating))}${'☆'.repeat(5 - Math.floor(resource.rating))}</span>
                            <span>${resource.rating}</span>
                        </div>
                        <span>${resource.views.toLocaleString()} vues</span>
                    </div>
                    <div class="resource-actions">
                        <button class="resource-btn primary" onclick="openResource(${resource.id}, event)">Consulter</button>
                        <button class="resource-btn favorite" onclick="toggleFavorite(${resource.id}, event)">⭐</button>
                    </div>
                </div>
            `;
            
            return card;
        }

        // Render resources
        function renderResources() {
            const startIndex = (currentPage - 1) * resourcesPerPage;
            const endIndex = startIndex + resourcesPerPage;
            const resourcesToShow = filteredResources.slice(startIndex, endIndex);
            
            if (currentView === 'grid') {
                renderGridView(resourcesToShow);
            } else {
                renderListView(resourcesToShow);
            }
            
            updatePagination();
        }

        // Render grid view
        function renderGridView(resources) {
            const grid = document.getElementById('resourcesGrid');
            grid.innerHTML = '';
            
            resources.forEach(resource => {
                const resourceCard = createResourceCard(resource);
                grid.appendChild(resourceCard);
            });
        }

        // Render list view
        function renderListView(resources) {
            const list = document.getElementById('resourcesList');
            list.innerHTML = '';
            
            resources.forEach(resource => {
                const resourceItem = createResourceListItem(resource);
                list.appendChild(resourceItem);
            });
        }

        // Create resource card
        function createResourceCard(resource) {
            const card = document.createElement('div');
            card.className = 'resource-card';
            card.addEventListener('click', () => openResourceDetails(resource));
            
            const difficultyColors = {
                beginner: '#4CAF50',
                intermediate: '#FF9800',
                advanced: '#F44336',
                expert: '#9C27B0'
            };
            
            card.innerHTML = `
                <div class="resource-thumbnail" style="background: linear-gradient(135deg, ${difficultyColors[resource.difficulty] || '#00ff88'}, #00d4ff)">
                    <span style="font-size: 3rem; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));">${resource.icon}</span>
                </div>
                <div class="resource-content">
                    <div class="resource-header">
                        <div>
                            <h3 class="resource-title">${resource.title}</h3>
                        </div>
                        <span class="resource-type">${resource.type}</span>
                    </div>
                    <p class="resource-description">${resource.description}</p>
                    <div class="resource-tags">
                        ${resource.tags.slice(0, 4).map(tag => `<span class="resource-tag">${tag}</span>`).join('')}
                    </div>
                    <div class="resource-meta">
                        <div class="resource-rating">
                            <span class="rating-stars">${'★'.repeat(Math.floor(resource.rating))}${'☆'.repeat(5 - Math.floor(resource.rating))}</span>
                            <span>${resource.rating} (${resource.votes})</span>
                        </div>
                        <span>${resource.views.toLocaleString()} vues</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; font-size: 0.9rem; color: #888;">
                        <span>📅 ${formatDate(resource.date)}</span>
                        <span>👤 ${resource.author}</span>
                        <span>🌐 ${resource.language.toUpperCase()}</span>
                        <span style="color: ${difficultyColors[resource.difficulty]};">📊 ${getDifficultyLabel(resource.difficulty)}</span>
                    </div>
                    <div class="resource-actions">
                        <button class="resource-btn primary" onclick="openResource(${resource.id}, event)">
                            ${resource.free ? 'Gratuit' : resource.price || 'Consulter'}
                        </button>
                        <button class="resource-btn favorite" onclick="toggleFavorite(${resource.id}, event)">⭐</button>
                    </div>
                </div>
            `;
            
            return card;
        }

        // Create resource list item
        function createResourceListItem(resource) {
            const item = document.createElement('div');
            item.className = 'resource-list-item';
            item.addEventListener('click', () => openResourceDetails(resource));
            
            const difficultyColors = {
                beginner: '#4CAF50',
                intermediate: '#FF9800',
                advanced: '#F44336',
                expert: '#9C27B0'
            };
            
            item.innerHTML = `
                <div class="resource-list-icon" style="background: linear-gradient(45deg, ${difficultyColors[resource.difficulty] || '#00ff88'}, #00d4ff)">
                    ${resource.icon}
                </div>
                <div class="resource-list-content">
                    <div class="resource-list-main">
                        <h3>${resource.title}</h3>
                        <p>${resource.description}</p>
                        <div style="margin-top: 0.5rem;">
                            ${resource.tags.slice(0, 3).map(tag => `<span class="resource-tag">${tag}</span>`).join('')}
                        </div>
                    </div>
                    <div class="resource-list-info">
                        <strong>${resource.rating}</strong>
                        <span>Note</span>
                    </div>
                    <div class="resource-list-info">
                        <strong>${resource.views.toLocaleString()}</strong>
                        <span>Vues</span>
                    </div>
                    <div class="resource-list-info">
                        <strong>${getDifficultyLabel(resource.difficulty)}</strong>
                        <span>Niveau</span>
                    </div>
                    <div class="resource-list-info">
                        <strong>${resource.free ? 'Gratuit' : 'Payant'}</strong>
                        <span>Prix</span>
                    </div>
                    <div class="resource-actions">
                        <button class="resource-btn primary" onclick="openResource(${resource.id}, event)">Consulter</button>
                    </div>
                </div>
            `;
            
            return item;
        }

        // Utility functions
        function getCategoryLabel(category) {
            const labels = {
                all: 'Toutes',
                tutorials: 'Tutoriels',
                tools: 'Outils',
                books: 'Livres',
                videos: 'Vidéos',
                documentation: 'Documentation',
                courses: 'Cours',
                frameworks: 'Frameworks'
            };
            return labels[category] || 'Toutes';
        }

        function getDifficultyLabel(difficulty) {
            const labels = {
                beginner: 'Débutant',
                intermediate: 'Intermédiaire',
                advanced: 'Avancé',
                expert: 'Expert'
            };
            return labels[difficulty] || 'Tous niveaux';
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('fr-FR');
        }

        // Resource actions
        function openResource(resourceId, event) {
            event.stopPropagation();
            const resource = allResources.find(r => r.id === resourceId);
            showToast(`🚀 Ouverture de "${resource.title}"...`);
            console.log('Opening resource:', resource.url);
            // In a real app, this would open the resource URL
        }

        function toggleFavorite(resourceId, event) {
            event.stopPropagation();
            const resource = allResources.find(r => r.id === resourceId);
            const btn = event.target;
            
            btn.classList.toggle('active');
            if (btn.classList.contains('active')) {
                btn.textContent = '⭐';
                btn.style.background = 'rgba(255, 215, 0, 0.2)';
                showToast(`⭐ "${resource.title}" ajouté aux favoris !`);
            } else {
                btn.textContent = '☆';
                btn.style.background = 'rgba(255, 215, 0, 0.1)';
                showToast(`💔 "${resource.title}" retiré des favoris`);
            }
        }

        function showFavorites() {
            showToast('⭐ Affichage de vos ressources favorites...');
            // In a real app, this would filter to show only favorited resources
        }

        // Open resource details modal
        function openResourceDetails(resource) {
            const modal = document.getElementById('resourceModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = resource.title;
            
            const difficultyColors = {
                beginner: '#4CAF50',
                intermediate: '#FF9800',
                advanced: '#F44336',
                expert: '#9C27B0'
            };
            
            modalBody.innerHTML = `
                <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
                    <div style="width: 120px; height: 120px; background: linear-gradient(135deg, ${difficultyColors[resource.difficulty]}, #00d4ff); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 3rem; flex-shrink: 0;">
                        ${resource.icon}
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                            <span class="resource-type">${resource.type}</span>
                            <div style="text-align: right;">
                                <div style="color: #00d4ff; font-size: 1.5rem; font-weight: 700;">${resource.rating} ★</div>
                                <div style="color: #888; font-size: 0.9rem;">${resource.votes} votes</div>
                            </div>
                        </div>
                        <p style="color: #b0b0b0; line-height: 1.6; margin-bottom: 1rem;">${resource.description}</p>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 1rem;">
                            <div style="background: rgba(0, 255, 136, 0.05); padding: 1rem; border-radius: 8px; text-align: center;">
                                <strong style="color: #00d4ff; display: block; font-size: 1.2rem;">${resource.views.toLocaleString()}</strong>
                                <span style="color: #888; font-size: 0.9rem;">Vues</span>
                            </div>
                            <div style="background: rgba(0, 255, 136, 0.05); padding: 1rem; border-radius: 8px; text-align: center;">
                                <strong style="color: #00d4ff; display: block; font-size: 1.2rem;">${getDifficultyLabel(resource.difficulty)}</strong>
                                <span style="color: #888; font-size: 0.9rem;">Niveau</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                    <div style="background: rgba(0, 255, 136, 0.05); padding: 1.5rem; border-radius: 10px;">
                        <h3 style="color: #00ff88; margin-bottom: 1rem;">👤 Auteur</h3>
                        <p style="color: #ffffff; font-weight: 600;">${resource.author}</p>
                    </div>
                    <div style="background: rgba(0, 255, 136, 0.05); padding: 1.5rem; border-radius: 10px;">
                        <h3 style="color: #00ff88; margin-bottom: 1rem;">📅 Date</h3>
                        <p style="color: #ffffff;">${formatDate(resource.date)}</p>
                    </div>
                    <div style="background: rgba(0, 255, 136, 0.05); padding: 1.5rem; border-radius: 10px;">
                        <h3 style="color: #00ff88; margin-bottom: 1rem;">🌐 Langue</h3>
                        <p style="color: #ffffff;">${resource.language === 'fr' ? 'Français' : resource.language === 'en' ? 'Anglais' : 'Espagnol'}</p>
                    </div>
                    <div style="background: rgba(0, 255, 136, 0.05); padding: 1.5rem; border-radius: 10px;">
                        <h3 style="color: #00ff88; margin-bottom: 1rem;">💰 Prix</h3>
                        <p style="color: #ffffff; font-weight: 600;">${resource.free ? 'Gratuit' : resource.price || 'Payant'}</p>
                    </div>
                </div>
                
                <div style="background: rgba(0, 255, 136, 0.05); padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem;">
                    <h3 style="color: #00ff88; margin-bottom: 1rem;">🏷️ Technologies</h3>
                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                        ${resource.tags.map(tag => `<span class="resource-tag">${tag}</span>`).join('')}
                    </div>
                </div>
                
                <div style="display: flex; gap: 1rem;">
                    <button class="resource-btn primary" style="flex: 2;" onclick="openResource(${resource.id}, event)">
                        🚀 ${resource.free ? 'Accéder gratuitement' : 'Voir les détails'}
                    </button>
                    <button class="resource-btn favorite" style="flex: 1;" onclick="toggleFavorite(${resource.id}, event)">
                        ⭐ Ajouter aux favoris
                    </button>
                    <button class="resource-btn" style="flex: 1;" onclick="shareResource(${resource.id})">
                        📤 Partager
                    </button>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`👀 Détails de "${resource.title}"`);
        }

        // Close modal
        function closeModal() {
            document.getElementById('resourceModal').classList.remove('show');
        }

        // Share resource
        function shareResource(resourceId) {
            const resource = allResources.find(r => r.id === resourceId);
            showToast(`📤 Partage de "${resource.title}"...`);
            closeModal();
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredResources.length / resourcesPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredResources.length / resourcesPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderResources();
                showToast(`📄 Page ${page} chargée`);
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Animate stats
        function animateStats() {
            function animateCounter(elementId, target, duration = 2000) {
                const element = document.getElementById(elementId);
                const start = 0;
                const increment = target / (duration / 16);
                let current = start;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current).toLocaleString();
                }, 16);
            }

            setTimeout(() => {
                animateCounter('totalResources', 1247);
                animateCounter('newResources', 42);
                animateCounter('popularResources', 156);
                animateCounter('categories', 28);
            }, 500);
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            init();
        });

        // Handle escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>