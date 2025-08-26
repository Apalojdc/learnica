<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réponses - DevCommunity</title>
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
        .responses-container {
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
        .responses-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .responses-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .responses-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Response Summary */
        .response-summary {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .response-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .response-summary:hover::before {
            left: 100%;
        }

        .summary-header {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .summary-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #000;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
            position: relative;
        }

        .summary-info {
            flex: 1;
        }

        .summary-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .summary-description {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.6;
        }

        .summary-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .summary-stat {
            text-align: center;
            padding: 1.5rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .summary-stat:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .summary-stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.5rem;
            display: block;
            position: relative;
        }

        .summary-stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .summary-stat-detail {
            color: #b0b0b0;
            font-size: 0.8rem;
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

        /* Status Filter Tabs */
        .status-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            overflow-x: auto;
            padding: 1rem 0;
        }

        .status-filter {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border: 1px solid rgba(0, 255, 136, 0.1);
            color: #b0b0b0;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-filter::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .status-filter:hover::before {
            left: 100%;
        }

        .status-filter:hover, .status-filter.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        .status-count {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            min-width: 20px;
            text-align: center;
        }

        .status-filter.active .status-count {
            background: rgba(0, 0, 0, 0.3);
            color: #000;
        }

        /* Filters Section */
        .responses-filters {
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

        /* Responses List */
        .responses-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .response-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .response-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .response-item:hover::before {
            left: 100%;
        }

        .response-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .response-item.accepted {
            border-left: 4px solid #00ff88;
            background: linear-gradient(145deg, #1e2e1e, #2a3a2a);
        }

        .response-item.upvoted {
            border-left: 4px solid #ffd700;
        }

        .response-item.recent {
            border-left: 4px solid #00d4ff;
        }

        .response-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .response-info {
            flex: 1;
        }

        .response-topic-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .response-item:hover .response-topic-title {
            color: #00ff88;
        }

        .response-meta {
            display: flex;
            gap: 1rem;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .response-category {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .response-status-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-accepted {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
        }

        .badge-pending {
            background: rgba(255, 193, 7, 0.2);
            color: #FFC107;
        }

        .badge-edited {
            background: rgba(0, 212, 255, 0.2);
            color: #00d4ff;
        }

        .response-content {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .response-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1rem;
        }

        .response-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .response-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .response-stat-label {
            color: #888;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .response-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .response-btn {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .response-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .response-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .response-btn.danger {
            background: rgba(244, 67, 54, 0.1);
            border-color: rgba(244, 67, 54, 0.3);
            color: #F44336;
        }

        .response-btn.warning {
            background: rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.3);
            color: #FFC107;
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

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 136, 0.1);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-title {
            color: #888;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .empty-description {
            color: #666;
            margin-bottom: 2rem;
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

        .code-block {
            background: #1a1a1a;
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
            color: #e0e0e0;
            overflow-x: auto;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .filters-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .summary-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .response-stats {
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

            .responses-container {
                padding: 1rem;
            }

            .responses-title {
                font-size: 2rem;
            }

            .summary-header {
                flex-direction: column;
                text-align: center;
            }

            .summary-stats {
                grid-template-columns: 1fr;
            }

            .response-header {
                flex-direction: column;
                gap: 1rem;
            }

            .response-stats {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .response-actions {
                justify-content: center;
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

            .status-filters {
                flex-wrap: wrap;
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

        <!-- Response Edit Modal -->
        <div class="modal-overlay" id="editModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Éditer la réponse</h2>
                    <button class="modal-close" id="modalClose">&times;</button>
                </div>
                <div id="modalBody">
                    <!-- Edit form will be inserted here -->
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="forum-header">
            <div class="forum-header-content">
                <a href="#" class="forum-logo">DevCommunity</a>
                
                <nav class="forum-nav">
                    <a href="#" class="forum-nav-link forum-active">Forum</a>
                    <a href="#" class="forum-nav-link">Membres</a>
                    <a href="#" class="forum-nav-link">Ressources</a>
                    <a href="#" class="forum-nav-link">Aide</a>
                </nav>

                <div class="forum-user-menu">
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans mes réponses..." id="responsesSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="responses-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <a href="#">💬 Forum</a> > <span>📝 Mes réponses</span>
            </div>

            <!-- Page Header -->
            <div class="responses-header">
                <h1 class="responses-title">Mes Réponses</h1>
                <p class="responses-subtitle">
                    Consultez et gérez toutes vos contributions aux discussions du forum. 
                    Suivez vos réponses acceptées, vos votes et l'impact de vos contributions.
                </p>
            </div>

            <!-- Response Summary -->
            <div class="response-summary">
                <div class="summary-header">
                    <div class="summary-icon">📝</div>
                    <div class="summary-info">
                        <h2 class="summary-title">Tableau de bord des contributions</h2>
                        <p class="summary-description">
                            Vue d'ensemble de votre activité et de l'impact de vos réponses 
                            sur la communauté DevCommunity.
                        </p>
                    </div>
                </div>
                <div class="summary-stats">
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="totalResponses">127</span>
                        <span class="summary-stat-label">Réponses postées</span>
                        <span class="summary-stat-detail">Dans 8 catégories</span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="acceptedResponses">23</span>
                        <span class="summary-stat-label">Réponses acceptées</span>
                        <span class="summary-stat-detail">18% de taux d'acceptation</span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="totalVotes">456</span>
                        <span class="summary-stat-label">Votes reçus</span>
                        <span class="summary-stat-detail">+389 positifs</span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="helpfulRating">92%</span>
                        <span class="summary-stat-label">Taux d'utilité</span>
                        <span class="summary-stat-detail">Selon la communauté</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" id="newResponseBtn">
                    ✍️ Nouvelle réponse
                </button>
                <button class="action-btn secondary" id="draftsBtn">
                    📋 Brouillons (3)
                </button>
                <button class="action-btn secondary" id="analyticsBtn">
                    📊 Statistiques détaillées
                </button>
                <button class="action-btn secondary" id="exportResponsesBtn">
                    📤 Exporter réponses
                </button>
            </div>

            <!-- Status Filter Tabs -->
            <div class="status-filters">
                <button class="status-filter active" data-status="all">
                    📝 Toutes
                    <span class="status-count" id="allCount">127</span>
                </button>
                <button class="status-filter" data-status="accepted">
                    ✅ Acceptées
                    <span class="status-count" id="acceptedCount">23</span>
                </button>
                <button class="status-filter" data-status="upvoted">
                    👍 Bien notées
                    <span class="status-count" id="upvotedCount">45</span>
                </button>
                <button class="status-filter" data-status="recent">
                    🆕 Récentes
                    <span class="status-count" id="recentCount">12</span>
                </button>
                <button class="status-filter" data-status="pending">
                    ⏳ En attente
                    <span class="status-count" id="pendingCount">8</span>
                </button>
            </div>

            <!-- Filters Section -->
            <div class="responses-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Sujet, contenu, mots-clés..." id="searchFilter">
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Catégorie</label>
                        <select class="filter-select" id="categoryFilter">
                            <option value="">Toutes les catégories</option>
                            <option value="javascript">JavaScript & Node.js</option>
                            <option value="python">Python & Data Science</option>
                            <option value="devops">DevOps & Cloud</option>
                            <option value="design">UI/UX Design</option>
                            <option value="mobile">Développement Mobile</option>
                            <option value="general">Discussions Générales</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Période</label>
                        <select class="filter-select" id="periodFilter">
                            <option value="">Toute période</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                            <option value="year">Cette année</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Tri</label>
                        <select class="filter-select" id="sortFilter">
                            <option value="recent">Plus récent</option>
                            <option value="votes">Plus de votes</option>
                            <option value="accepted">Acceptées d'abord</option>
                            <option value="alphabetical">Alphabétique</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button class="filter-btn" onclick="applyFilters()">🔍 Filtrer</button>
                    </div>
                </div>
            </div>

            <!-- Responses List -->
            <div class="responses-list" id="responsesList">
                <!-- Responses will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">13</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentStatus = 'all';
        let responsesPerPage = 10;
        let filteredResponses = [];
        let allResponses = [];

        // Sample responses data
        const responsesData = [
            {
                id: 1,
                topicTitle: "Optimisation des performances React en production",
                topicId: 101,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Pour optimiser React en production, je recommande d'utiliser React.memo() pour éviter les re-renders inutiles, useMemo() et useCallback() pour mémoriser les calculs coûteux. Voici un exemple pratique : ```jsx\nconst MemoizedComponent = React.memo(({ data }) => {\n  return <div>{data.name}</div>;\n});```",
                datePosted: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "accepted",
                votes: { up: 15, down: 2 },
                isAccepted: true,
                comments: 3,
                views: 234,
                helpful: 18
            },
            {
                id: 2,
                topicTitle: "Architecture microservices avec Kubernetes",
                topicId: 102,
                category: "devops",
                categoryLabel: "DevOps",
                content: "L'implémentation d'une architecture microservices nécessite une approche structurée. Je suggère de commencer par définir les bounded contexts selon Domain-Driven Design. Voici ma stratégie éprouvée...",
                datePosted: new Date(Date.now() - 5 * 24 * 60 * 60 * 1000),
                lastEdited: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                status: "upvoted",
                votes: { up: 28, down: 4 },
                isAccepted: false,
                comments: 7,
                views: 456,
                helpful: 24
            },
            {
                id: 3,
                topicTitle: "Tests unitaires avec Jest et React Testing Library",
                topicId: 103,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Pour des tests efficaces, concentrez-vous sur le comportement utilisateur plutôt que sur l'implémentation. Utilisez screen.getByRole() et userEvent pour simuler les interactions réelles...",
                datePosted: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "recent",
                votes: { up: 8, down: 0 },
                isAccepted: false,
                comments: 2,
                views: 123,
                helpful: 6
            },
            {
                id: 4,
                topicTitle: "Machine Learning avec TensorFlow pour débutants",
                topicId: 104,
                category: "python",
                categoryLabel: "Python",
                content: "Pour débuter en ML avec TensorFlow, je recommande de commencer par comprendre les concepts de base : tenseurs, graphes computationnels, et fonctions de coût. Voici un exemple simple de régression linéaire...",
                datePosted: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "accepted",
                votes: { up: 32, down: 3 },
                isAccepted: true,
                comments: 12,
                views: 789,
                helpful: 28
            },
            {
                id: 5,
                topicTitle: "Gestion d'état avec Redux Toolkit",
                topicId: 105,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Redux Toolkit simplifie énormément l'utilisation de Redux. Avec createSlice(), vous pouvez définir vos reducers et actions en une seule fois. Voici comment j'organise mes stores...",
                datePosted: new Date(Date.now() - 12 * 24 * 60 * 60 * 1000),
                lastEdited: new Date(Date.now() - 8 * 24 * 60 * 60 * 1000),
                status: "upvoted",
                votes: { up: 19, down: 1 },
                isAccepted: false,
                comments: 5,
                views: 345,
                helpful: 16
            },
            {
                id: 6,
                topicTitle: "CI/CD avec GitHub Actions : bonnes pratiques",
                topicId: 106,
                category: "devops",
                categoryLabel: "DevOps",
                content: "Une pipeline CI/CD efficace doit être rapide, fiable et sécurisée. Je partage ma configuration GitHub Actions qui inclut la mise en cache, les tests parallèles et le déploiement conditionnel...",
                datePosted: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "pending",
                votes: { up: 12, down: 2 },
                isAccepted: false,
                comments: 4,
                views: 198,
                helpful: 9
            },
            {
                id: 7,
                topicTitle: "Design System avec Storybook et Figma",
                topicId: 107,
                category: "design",
                categoryLabel: "Design",
                content: "Un design system réussi nécessite une collaboration étroite entre designers et développeurs. J'ai mis en place un workflow efficace avec Figma Tokens et Storybook pour maintenir la cohérence...",
                datePosted: new Date(Date.now() - 15 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "accepted",
                votes: { up: 25, down: 2 },
                isAccepted: true,
                comments: 8,
                views: 567,
                helpful: 22
            },
            {
                id: 8,
                topicTitle: "Sécurité des applications web modernes",
                topicId: 108,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "La sécurité doit être intégrée dès la conception. Voici ma checklist : validation côté serveur, échappement XSS, protection CSRF, Content Security Policy, et audit régulier des dépendances...",
                datePosted: new Date(Date.now() - 6 * 24 * 60 * 60 * 1000),
                lastEdited: new Date(Date.now() - 4 * 24 * 60 * 60 * 1000),
                status: "upvoted",
                votes: { up: 34, down: 1 },
                isAccepted: false,
                comments: 11,
                views: 678,
                helpful: 31
            },
            {
                id: 9,
                topicTitle: "Flutter vs React Native : retour d'expérience",
                topicId: 109,
                category: "mobile",
                categoryLabel: "Mobile",
                content: "Après avoir développé des apps avec les deux frameworks, voici mon analyse comparative basée sur des projets réels : performance, écosystème, courbe d'apprentissage, et coût de maintenance...",
                datePosted: new Date(Date.now() - 20 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "upvoted",
                votes: { up: 21, down: 5 },
                isAccepted: false,
                comments: 15,
                views: 456,
                helpful: 18
            },
            {
                id: 10,
                topicTitle: "Optimisation des requêtes PostgreSQL",
                topicId: 110,
                category: "python",
                categoryLabel: "Python",
                content: "L'optimisation SQL passe par plusieurs étapes : analyse du plan d'exécution, indexation stratégique, requêtes optimisées, et monitoring des performances. Voici ma méthodologie éprouvée...",
                datePosted: new Date(Date.now() - 4 * 24 * 60 * 60 * 1000),
                lastEdited: null,
                status: "recent",
                votes: { up: 16, down: 0 },
                isAccepted: false,
                comments: 6,
                views: 287,
                helpful: 14
            }
        ];

        // Initialize the page
        function init() {
            allResponses = [...responsesData];
            filteredResponses = [...allResponses];
            
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                filterByStatus('all');
                renderResponses();
                hideLoading();
                showToast("📝 Vos réponses chargées avec succès !", 3000);
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
            document.getElementById('responsesSearch').addEventListener('input', handleSearch);
            document.getElementById('searchFilter').addEventListener('input', handleSearch);
            
            // Filter functionality
            document.getElementById('categoryFilter').addEventListener('change', applyFilters);
            document.getElementById('periodFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);
            
            // Status filters
            document.querySelectorAll('.status-filter').forEach(filter => {
                filter.addEventListener('click', () => {
                    const status = filter.dataset.status;
                    switchStatusFilter(status);
                });
            });
            
            // Quick actions
            document.getElementById('newResponseBtn').addEventListener('click', () => showToast('✍️ Redirection vers nouveau sujet...'));
            document.getElementById('draftsBtn').addEventListener('click', () => showToast('📋 Ouverture des brouillons...'));
            document.getElementById('analyticsBtn').addEventListener('click', () => showToast('📊 Chargement des statistiques...'));
            document.getElementById('exportResponsesBtn').addEventListener('click', exportResponses);
            
            // Pagination
            document.getElementById('prevPage').addEventListener('click', () => changePage(currentPage - 1));
            document.getElementById('nextPage').addEventListener('click', () => changePage(currentPage + 1));
            
            // Modal functionality
            document.getElementById('modalClose').addEventListener('click', closeModal);
            document.getElementById('editModal').addEventListener('click', (e) => {
                if (e.target.id === 'editModal') closeModal();
            });
        }

        // Search functionality
        function handleSearch() {
            const responsesSearchTerm = document.getElementById('responsesSearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = responsesSearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredResponses = allResponses.filter(response => 
                    response.topicTitle.toLowerCase().includes(searchTerm) ||
                    response.content.toLowerCase().includes(searchTerm) ||
                    response.categoryLabel.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredResponses = [...allResponses];
            }
            
            // Sync search inputs
            document.getElementById('responsesSearch').value = searchTerm;
            document.getElementById('searchFilter').value = searchTerm;
            
            applyFilters();
        }

        // Status filter switching
        function switchStatusFilter(status) {
            currentStatus = status;
            
            // Update active status filter
            document.querySelectorAll('.status-filter').forEach(filter => {
                filter.classList.toggle('active', filter.dataset.status === status);
            });
            
            filterByStatus(status);
            showToast(`📂 Filtre "${getStatusLabel(status)}" appliqué`);
        }

        function filterByStatus(status) {
            let filtered = [];
            
            switch(status) {
                case 'accepted':
                    filtered = allResponses.filter(response => response.isAccepted);
                    break;
                case 'upvoted':
                    filtered = allResponses.filter(response => response.votes.up >= 10);
                    break;
                case 'recent':
                    const weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
                    filtered = allResponses.filter(response => response.datePosted >= weekAgo);
                    break;
                case 'pending':
                    filtered = allResponses.filter(response => !response.isAccepted && response.votes.up < 5);
                    break;
                default:
                    filtered = [...allResponses];
            }
            
            filteredResponses = filtered;
            currentPage = 1;
            applyFilters();
        }

        // Apply filters
        function applyFilters() {
            let filtered = [...filteredResponses];
            
            // Category filter
            const categoryFilter = document.getElementById('categoryFilter').value;
            if (categoryFilter) {
                filtered = filtered.filter(response => response.category === categoryFilter);
            }
            
            // Period filter
            const periodFilter = document.getElementById('periodFilter').value;
            if (periodFilter) {
                const now = new Date();
                let cutoffDate;
                
                switch(periodFilter) {
                    case 'today':
                        cutoffDate = new Date(now);
                        cutoffDate.setHours(0, 0, 0, 0);
                        break;
                    case 'week':
                        cutoffDate = new Date(now);
                        cutoffDate.setDate(cutoffDate.getDate() - 7);
                        break;
                    case 'month':
                        cutoffDate = new Date(now);
                        cutoffDate.setMonth(cutoffDate.getMonth() - 1);
                        break;
                    case 'year':
                        cutoffDate = new Date(now);
                        cutoffDate.setFullYear(cutoffDate.getFullYear() - 1);
                        break;
                }
                
                if (cutoffDate) {
                    filtered = filtered.filter(response => response.datePosted >= cutoffDate);
                }
            }
            
            // Sort
            const sortBy = document.getElementById('sortFilter').value;
            filtered.sort((a, b) => {
                switch (sortBy) {
                    case 'recent':
                        return new Date(b.datePosted) - new Date(a.datePosted);
                    case 'votes':
                        return (b.votes.up - b.votes.down) - (a.votes.up - a.votes.down);
                    case 'accepted':
                        if (a.isAccepted && !b.isAccepted) return -1;
                        if (!a.isAccepted && b.isAccepted) return 1;
                        return new Date(b.datePosted) - new Date(a.datePosted);
                    case 'alphabetical':
                        return a.topicTitle.localeCompare(b.topicTitle);
                    default:
                        return 0;
                }
            });
            
            filteredResponses = filtered;
            currentPage = 1;
            renderResponses();
        }

        // Render responses
        function renderResponses() {
            const startIndex = (currentPage - 1) * responsesPerPage;
            const endIndex = startIndex + responsesPerPage;
            const responsesToShow = filteredResponses.slice(startIndex, endIndex);
            
            const responsesList = document.getElementById('responsesList');
            responsesList.innerHTML = '';
            
            if (responsesToShow.length === 0) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <div class="empty-icon">📝</div>
                    <h3 class="empty-title">Aucune réponse trouvée</h3>
                    <p class="empty-description">Commencez à participer aux discussions pour voir vos réponses ici.</p>
                    <button class="action-btn" onclick="clearAllFilters()">🔄 Réinitialiser les filtres</button>
                `;
                responsesList.appendChild(emptyState);
            } else {
                responsesToShow.forEach(response => {
                    const responseItem = createResponseItem(response);
                    responsesList.appendChild(responseItem);
                });
            }
            
            updatePagination();
        }

        // Create response item
        function createResponseItem(response) {
            const item = document.createElement('div');
            let itemClasses = 'response-item';
            
            if (response.isAccepted) itemClasses += ' accepted';
            if (response.votes.up >= 10) itemClasses += ' upvoted';
            if (isRecent(response.datePosted)) itemClasses += ' recent';
            
            item.className = itemClasses;
            
            const statusBadge = getStatusBadge(response);
            const voteScore = response.votes.up - response.votes.down;
            const editedText = response.lastEdited ? 
                `<span style="color: #888; font-size: 0.8rem;">Modifiée ${formatRelativeTime(response.lastEdited)}</span>` : '';
            
            item.innerHTML = `
                <div class="response-header">
                    <div class="response-info">
                        <h3 class="response-topic-title" onclick="openTopic(${response.topicId})">
                            ${response.isAccepted ? '✅ ' : ''}
                            ${response.topicTitle}
                            ${statusBadge}
                        </h3>
                        <div class="response-meta">
                            <span class="response-category">${response.categoryLabel}</span>
                            <span>📅 ${formatRelativeTime(response.datePosted)}</span>
                            <span>👀 ${response.views} vues</span>
                            <span>💬 ${response.comments} commentaires</span>
                            ${editedText}
                        </div>
                        <div class="response-content">${response.content}</div>
                    </div>
                    <div class="response-stats">
                        <div class="response-stat">
                            <div class="response-stat-number ${voteScore > 0 ? 'positive' : ''}">${voteScore}</div>
                            <div class="response-stat-label">Score</div>
                        </div>
                        <div class="response-stat">
                            <div class="response-stat-number">${response.helpful}</div>
                            <div class="response-stat-label">Utile</div>
                        </div>
                        <div class="response-stat">
                            <div class="response-stat-number">${response.comments}</div>
                            <div class="response-stat-label">Commentaires</div>
                        </div>
                    </div>
                </div>
                <div class="response-actions">
                    <button class="response-btn primary" onclick="viewResponse(${response.id})">👀 Voir la réponse</button>
                    <button class="response-btn" onclick="editResponse(${response.id})">✏️ Modifier</button>
                    <button class="response-btn" onclick="shareResponse(${response.id})">🔗 Partager</button>
                    <button class="response-btn warning" onclick="duplicateResponse(${response.id})">📋 Dupliquer</button>
                    <button class="response-btn danger" onclick="deleteResponse(${response.id})">🗑️ Supprimer</button>
                </div>
            `;
            
            return item;
        }

        // Get status badge
        function getStatusBadge(response) {
            if (response.isAccepted) {
                return '<span class="response-status-badge badge-accepted">✅ Acceptée</span>';
            }
            if (response.lastEdited) {
                return '<span class="response-status-badge badge-edited">✏️ Modifiée</span>';
            }
            if (response.votes.up < 5 && !response.isAccepted) {
                return '<span class="response-status-badge badge-pending">⏳ En attente</span>';
            }
            return '';
        }

        // Utility functions
        function getStatusLabel(status) {
            const labels = {
                all: 'Toutes',
                accepted: 'Acceptées',
                upvoted: 'Bien notées',
                recent: 'Récentes',
                pending: 'En attente'
            };
            return labels[status] || 'Toutes';
        }

        function formatRelativeTime(date) {
            const now = new Date();
            const diff = now - date;
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            
            if (days === 0) return 'Aujourd\'hui';
            if (days === 1) return 'Hier';
            if (days < 7) return `Il y a ${days} jours`;
            if (days < 30) return `Il y a ${Math.floor(days / 7)} semaine${Math.floor(days / 7) > 1 ? 's' : ''}`;
            return `Il y a ${Math.floor(days / 30)} mois`;
        }

        function isRecent(date) {
            const weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
            return date >= weekAgo;
        }

        // Response actions
        function viewResponse(responseId) {
            const response = allResponses.find(r => r.id === responseId);
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showToast(`👀 Ouverture : "${response.topicTitle}"`);
                console.log('Viewing response:', response.id);
            }, 600);
        }

        function openTopic(topicId) {
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showToast(`🔗 Ouverture du sujet #${topicId}`);
                console.log('Opening topic:', topicId);
            }, 600);
        }

        function editResponse(responseId) {
            const response = allResponses.find(r => r.id === responseId);
            openEditModal(response);
        }

        function openEditModal(response) {
            const modal = document.getElementById('editModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = `Éditer : ${response.topicTitle}`;
            
            modalBody.innerHTML = `
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #00ff88; margin-bottom: 1rem;">📝 Contenu de la réponse</h4>
                    <textarea 
                        id="editContent" 
                        style="width: 100%; height: 300px; background: #2a2a2a; border: 1px solid rgba(0, 255, 136, 0.3); border-radius: 8px; padding: 1rem; color: #ffffff; font-family: inherit; resize: vertical;"
                        placeholder="Votre réponse..."
                    >${response.content}</textarea>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #00ff88; margin-bottom: 1rem;">⚙️ Options</h4>
                    <div style="margin-bottom: 1rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" style="width: 16px; height: 16px;">
                            <span>Notifier les abonnés du sujet</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" checked style="width: 16px; height: 16px;">
                            <span>Enregistrer comme modification mineure</span>
                        </label>
                    </div>
                </div>
                
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button class="response-btn" onclick="closeModal()">❌ Annuler</button>
                    <button class="response-btn primary" onclick="saveResponse(${response.id})">💾 Enregistrer</button>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`✏️ Édition de la réponse`);
        }

        function saveResponse(responseId) {
            const content = document.getElementById('editContent').value;
            if (content.trim() === '') {
                showToast('❌ Le contenu ne peut pas être vide');
                return;
            }
            
            showLoading();
            setTimeout(() => {
                const response = allResponses.find(r => r.id === responseId);
                response.content = content;
                response.lastEdited = new Date();
                
                hideLoading();
                closeModal();
                renderResponses();
                showToast('💾 Réponse modifiée avec succès !');
            }, 800);
        }

        function shareResponse(responseId) {
            const response = allResponses.find(r => r.id === responseId);
            showToast(`🔗 Lien copié : "${response.topicTitle}"`);
            console.log('Sharing response:', responseId);
        }

        function duplicateResponse(responseId) {
            const response = allResponses.find(r => r.id === responseId);
            showToast(`📋 Modèle créé depuis : "${response.topicTitle}"`);
            console.log('Duplicating response:', responseId);
        }

        function deleteResponse(responseId) {
            const response = allResponses.find(r => r.id === responseId);
            
            if (confirm(`Êtes-vous sûr de vouloir supprimer cette réponse ?\n\nSujet : "${response.topicTitle}"\n\nCette action est irréversible.`)) {
                allResponses = allResponses.filter(r => r.id !== responseId);
                filteredResponses = filteredResponses.filter(r => r.id !== responseId);
                renderResponses();
                updateStatusCounts();
                showToast(`🗑️ Réponse supprimée : "${response.topicTitle}"`);
            }
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        function clearAllFilters() {
            document.getElementById('responsesSearch').value = '';
            document.getElementById('searchFilter').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('periodFilter').value = '';
            document.getElementById('sortFilter').value = 'recent';
            
            switchStatusFilter('all');
            showToast('🔄 Tous les filtres réinitialisés');
        }

        function exportResponses() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showToast('📤 Export terminé ! Liste des réponses téléchargée.');
                console.log('Exporting responses to CSV');
            }, 1200);
        }

        // Update status counts
        function updateStatusCounts() {
            const acceptedCount = allResponses.filter(r => r.isAccepted).length;
            const upvotedCount = allResponses.filter(r => r.votes.up >= 10).length;
            const recentCount = allResponses.filter(r => isRecent(r.datePosted)).length;
            const pendingCount = allResponses.filter(r => !r.isAccepted && r.votes.up < 5).length;
            const totalCount = allResponses.length;
            
            document.getElementById('allCount').textContent = totalCount;
            document.getElementById('acceptedCount').textContent = acceptedCount;
            document.getElementById('upvotedCount').textContent = upvotedCount;
            document.getElementById('recentCount').textContent = recentCount;
            document.getElementById('pendingCount').textContent = pendingCount;
            
            // Update summary stats
            document.getElementById('totalResponses').textContent = totalCount;
            document.getElementById('acceptedResponses').textContent = acceptedCount;
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredResponses.length / responsesPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredResponses.length / responsesPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderResponses();
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
                    element.textContent = Math.floor(current);
                }, 16);
            }

            function animatePercentage(elementId, target, duration = 2000) {
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
                    element.textContent = Math.floor(current) + '%';
                }, 16);
            }

            setTimeout(() => {
                animateCounter('totalResponses', 127);
                animateCounter('acceptedResponses', 23);
                animateCounter('totalVotes', 456);
                animatePercentage('helpfulRating', 92);
                updateStatusCounts();
            }, 500);
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            init();
        });

        // Handle keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl/Cmd + K for search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.getElementById('responsesSearch').focus();
                showToast('🔍 Recherche activée');
            }
            
            // Escape to close modal
            if (e.key === 'Escape') {
                closeModal();
            }
            
            // N for new response
            if (e.key === 'n' && !e.ctrlKey && !e.metaKey) {
                if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    showToast('✍️ Nouvelle réponse...');
                }
            }
        });
    </script>
</body>
</html>