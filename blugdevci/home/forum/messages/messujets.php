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
        .replies-container {
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
        .replies-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .replies-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .replies-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* User Activity Summary */
        .activity-summary {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .activity-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .activity-summary:hover::before {
            left: 100%;
        }

        .activity-header {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .activity-icon {
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
        }

        .activity-info {
            flex: 1;
        }

        .activity-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .activity-description {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.6;
        }

        .activity-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .activity-stat {
            text-align: center;
            padding: 1.5rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
        }

        .activity-stat:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .activity-stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.5rem;
            display: block;
        }

        .activity-stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .activity-stat-detail {
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

        /* Type Filter Tabs */
        .type-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            overflow-x: auto;
            padding: 1rem 0;
        }

        .type-filter {
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

        .type-filter::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .type-filter:hover::before {
            left: 100%;
        }

        .type-filter:hover, .type-filter.active {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        .type-count {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            min-width: 20px;
            text-align: center;
        }

        .type-filter.active .type-count {
            background: rgba(0, 0, 0, 0.3);
            color: #000;
        }

        /* Filters Section */
        .replies-filters {
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

        /* Replies List */
        .replies-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .reply-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .reply-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .reply-item:hover::before {
            left: 100%;
        }

        .reply-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .reply-item.best-answer {
            border-left: 4px solid #ffd700;
            background: linear-gradient(145deg, #2e2a1e, #3a341e);
        }

        .reply-item.top-reply {
            border-left: 4px solid #00ff88;
            background: linear-gradient(145deg, #1e2e1e, #2a3a2a);
        }

        .reply-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .reply-topic-info {
            flex: 1;
        }

        .reply-topic-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #00d4ff;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .reply-item:hover .reply-topic-title {
            color: #00ff88;
        }

        .reply-meta {
            display: flex;
            gap: 1rem;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .reply-category {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reply-badges {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .reply-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-best-answer {
            background: rgba(255, 215, 0, 0.2);
            color: #FFD700;
        }

        .badge-top-reply {
            background: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .badge-helpful {
            background: rgba(33, 150, 243, 0.2);
            color: #2196F3;
        }

        .reply-content {
            background: rgba(0, 255, 136, 0.03);
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
            border-left: 3px solid rgba(0, 255, 136, 0.3);
        }

        .reply-text {
            color: #e0e0e0;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .reply-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1rem;
        }

        .reply-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .reply-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .reply-stat-label {
            color: #888;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reply-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .reply-btn {
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

        .reply-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .reply-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .reply-btn.danger {
            background: rgba(244, 67, 54, 0.1);
            border-color: rgba(244, 67, 54, 0.3);
            color: #F44336;
        }

        .reply-btn.warning {
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
            max-width: 700px;
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

        /* Responsive */
        @media (max-width: 1200px) {
            .filters-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .activity-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .reply-stats {
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

            .replies-container {
                padding: 1rem;
            }

            .replies-title {
                font-size: 2rem;
            }

            .activity-header {
                flex-direction: column;
                text-align: center;
            }

            .activity-stats {
                grid-template-columns: 1fr;
            }

            .reply-header {
                flex-direction: column;
                gap: 1rem;
            }

            .reply-stats {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .reply-actions {
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

            .type-filters {
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

        <!-- Reply Edit Modal -->
        <div class="modal-overlay" id="editModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Modifier la réponse</h2>
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
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans mes réponses..." id="replySearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="replies-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <a href="#">💬 Forum</a> > <span>💭 Mes Réponses</span>
            </div>

            <!-- Page Header -->
            <div class="replies-header">
                <h1 class="replies-title">Mes Réponses</h1>
                <p class="replies-subtitle">
                    Suivez l'impact de vos contributions, gérez vos réponses et analysez votre engagement 
                    dans la communauté DevCommunity.
                </p>
            </div>

            <!-- Activity Summary -->
            <div class="activity-summary">
                <div class="activity-header">
                    <div class="activity-icon">💭</div>
                    <div class="activity-info">
                        <h2 class="activity-title">Votre activité de réponse</h2>
                        <p class="activity-description">
                            Tableau de bord complet de vos contributions aux discussions de la communauté, 
                            avec métriques de performance et reconnaissance.
                        </p>
                    </div>
                </div>
                <div class="activity-stats">
                    <div class="activity-stat">
                        <span class="activity-stat-number" id="totalReplies">87</span>
                        <span class="activity-stat-label">Réponses totales</span>
                        <span class="activity-stat-detail">Dans 45 sujets différents</span>
                    </div>
                    <div class="activity-stat">
                        <span class="activity-stat-number" id="totalLikes">342</span>
                        <span class="activity-stat-label">Likes reçus</span>
                        <span class="activity-stat-detail">Taux d'appréciation: 94%</span>
                    </div>
                    <div class="activity-stat">
                        <span class="activity-stat-number" id="bestAnswers">12</span>
                        <span class="activity-stat-label">Meilleures réponses</span>
                        <span class="activity-stat-detail">14% de vos réponses</span>
                    </div>
                    <div class="activity-stat">
                        <span class="activity-stat-number" id="helpfulRating">4.8</span>
                        <span class="activity-stat-label">Note d'utilité</span>
                        <span class="activity-stat-detail">Sur 5.0 étoiles</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" id="newReplyBtn">
                    💬 Participer aux discussions
                </button>
                <button class="action-btn secondary" id="bestAnswersBtn">
                    🏆 Mes meilleures réponses
                </button>
                <button class="action-btn secondary" id="analyticsBtn">
                    📊 Analyser mes contributions
                </button>
                <button class="action-btn secondary" id="exportBtn">
                    📤 Exporter historique
                </button>
            </div>

            <!-- Type Filter Tabs -->
            <div class="type-filters">
                <button class="type-filter active" data-type="all">
                    🌐 Toutes
                    <span class="type-count" id="allCount">87</span>
                </button>
                <button class="type-filter" data-type="best-answer">
                    🏆 Meilleures réponses
                    <span class="type-count" id="bestCount">12</span>
                </button>
                <button class="type-filter" data-type="top-reply">
                    ⭐ Top réponses
                    <span class="type-count" id="topCount">23</span>
                </button>
                <button class="type-filter" data-type="helpful">
                    👍 Utiles
                    <span class="type-count" id="helpfulCount">45</span>
                </button>
                <button class="type-filter" data-type="recent">
                    🆕 Récentes
                    <span class="type-count" id="recentCount">15</span>
                </button>
            </div>

            <!-- Filters Section -->
            <div class="replies-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Contenu, sujet, catégorie..." id="searchFilter">
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
                            <option value="newest">Plus récent</option>
                            <option value="oldest">Plus ancien</option>
                            <option value="popular">Plus populaire</option>
                            <option value="helpful">Plus utile</option>
                            <option value="best-answer">Meilleures réponses</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Vue</label>
                        <div class="view-toggle">
                            <button class="view-btn active" id="listView">📋</button>
                            <button class="view-btn" id="compactView">📄</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Replies List -->
            <div class="replies-list" id="repliesList">
                <!-- Replies will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">9</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentType = 'all';
        let totalReplies = 87;
        let repliesPerPage = 10;
        let filteredReplies = [];
        let allReplies = [];

        // Sample reply data
        const replyData = [
            {
                id: 1,
                topicTitle: "Comment optimiser React avec useCallback et useMemo ?",
                topicId: 101,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Excellente question ! useCallback et useMemo sont effectivement des hooks d'optimisation cruciaux. useCallback mémorise une fonction pour éviter sa recréation à chaque render, tandis que useMemo mémorise le résultat d'un calcul coûteux. Voici un exemple pratique...",
                createdAt: new Date(Date.now() - 2 * 60 * 60 * 1000),
                likes: 23,
                replies: 5,
                views: 156,
                isBestAnswer: true,
                isHelpful: true,
                isTopReply: true,
                badges: ['best-answer', 'helpful']
            },
            {
                id: 2,
                topicTitle: "Architecture microservices avec Docker et Kubernetes",
                topicId: 102,
                category: "devops",
                categoryLabel: "DevOps",
                content: "Pour une architecture microservices robuste, je recommande de commencer par bien définir les bounded contexts de votre domaine. Chaque service doit avoir une responsabilité claire et une base de données dédiée. Voici mon approche step-by-step...",
                createdAt: new Date(Date.now() - 5 * 60 * 60 * 1000),
                likes: 18,
                replies: 3,
                views: 234,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: true,
                badges: ['helpful', 'top-reply']
            },
            {
                id: 3,
                topicTitle: "Machine Learning pour débutants : par où commencer ?",
                topicId: 103,
                category: "python",
                categoryLabel: "Python",
                content: "Bienvenue dans le monde du ML ! Je conseille de commencer par les bases statistiques, puis Python avec pandas et scikit-learn. Voici un roadmap que j'ai suivi et qui m'a bien aidé. N'hésitez pas si vous avez des questions spécifiques !",
                createdAt: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                likes: 34,
                replies: 8,
                views: 567,
                isBestAnswer: true,
                isHelpful: true,
                isTopReply: true,
                badges: ['best-answer', 'helpful', 'top-reply']
            },
            {
                id: 4,
                topicTitle: "CSS Grid vs Flexbox : guide pratique 2024",
                topicId: 104,
                category: "design",
                categoryLabel: "Design",
                content: "Très bon article ! J'ajouterais que CSS Grid excelle pour les layouts 2D (grilles complexes) tandis que Flexbox est parfait pour les alignements 1D (navbars, boutons). En pratique, on les combine souvent dans le même projet.",
                createdAt: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000),
                likes: 12,
                replies: 2,
                views: 189,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: false,
                badges: ['helpful']
            },
            {
                id: 5,
                topicTitle: "Flutter vs React Native : retour d'expérience",
                topicId: 105,
                category: "mobile",
                categoryLabel: "Mobile",
                content: "Ayant travaillé sur les deux, je peux confirmer que Flutter a l'avantage de la performance native et de l'uniformité UI, mais React Native gagne en écosystème et courbe d'apprentissage pour les devs web. Le choix dépend vraiment du contexte projet.",
                createdAt: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                likes: 27,
                replies: 6,
                views: 298,
                isBestAnswer: true,
                isHelpful: true,
                isTopReply: true,
                badges: ['best-answer', 'helpful']
            },
            {
                id: 6,
                topicTitle: "Sécurité des APIs REST : checklist complète",
                topicId: 106,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Super checklist ! J'ajouterais l'importance du rate limiting et de la validation des inputs côté serveur. Aussi, pensez à implémenter CORS correctement et à utiliser des headers de sécurité comme X-Frame-Options et Content-Security-Policy.",
                createdAt: new Date(Date.now() - 5 * 24 * 60 * 60 * 1000),
                likes: 19,
                replies: 4,
                views: 223,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: true,
                badges: ['helpful', 'top-reply']
            },
            {
                id: 7,
                topicTitle: "Guide complet du testing avec Jest et React Testing Library",
                topicId: 107,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Merci pour ce guide détaillé ! Pour les tests d'intégration, je recommande aussi MSW (Mock Service Worker) pour mocker les API calls de façon réaliste. Et n'oubliez pas les tests e2e avec Cypress pour valider les parcours utilisateur critiques.",
                createdAt: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000),
                likes: 15,
                replies: 3,
                views: 167,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: false,
                badges: ['helpful']
            },
            {
                id: 8,
                topicTitle: "DevOps pour les développeurs : CI/CD avec GitHub Actions",
                topicId: 108,
                category: "devops",
                categoryLabel: "DevOps",
                content: "GitHub Actions est effectivement très puissant ! Pour optimiser vos workflows, pensez à utiliser le cache pour les dépendances et à paralléliser vos jobs. Voici un exemple de workflow que j'utilise en production avec des bonnes pratiques de sécurité.",
                createdAt: new Date(Date.now() - 10 * 24 * 60 * 60 * 1000),
                likes: 21,
                replies: 7,
                views: 345,
                isBestAnswer: true,
                isHelpful: true,
                isTopReply: true,
                badges: ['best-answer', 'helpful']
            },
            {
                id: 9,
                topicTitle: "Design Systems : créer une librairie de composants",
                topicId: 109,
                category: "design",
                categoryLabel: "Design",
                content: "Excellente approche ! J'ajouterais l'importance de la documentation vivante avec Storybook et des design tokens pour maintenir la cohérence. Aussi, pensez à mettre en place des tests visuels automatisés pour éviter les régressions.",
                createdAt: new Date(Date.now() - 14 * 24 * 60 * 60 * 1000),
                likes: 16,
                replies: 4,
                views: 201,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: true,
                badges: ['helpful', 'top-reply']
            },
            {
                id: 10,
                topicTitle: "Introduction aux Progressive Web Apps (PWA)",
                topicId: 110,
                category: "javascript",
                categoryLabel: "JavaScript",
                content: "Les PWA sont l'avenir du web mobile ! Votre guide couvre bien les bases. Je recommande aussi d'implémenter la stratégie de cache 'stale-while-revalidate' pour une UX optimale et de tester sur différents appareils pour valider l'expérience.",
                createdAt: new Date(Date.now() - 20 * 24 * 60 * 60 * 1000),
                likes: 13,
                replies: 2,
                views: 143,
                isBestAnswer: false,
                isHelpful: true,
                isTopReply: false,
                badges: ['helpful']
            }
        ];

        // Initialize the page
        function init() {
            allReplies = [...replyData];
            filteredReplies = [...allReplies];
            
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                filterByType('all');
                renderReplies();
                hideLoading();
                showToast("💭 Mes réponses chargées avec succès !", 3000);
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
            document.getElementById('replySearch').addEventListener('input', handleSearch);
            document.getElementById('searchFilter').addEventListener('input', handleSearch);
            
            // Filter functionality
            document.getElementById('categoryFilter').addEventListener('change', applyFilters);
            document.getElementById('periodFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);
            
            // Type filters
            document.querySelectorAll('.type-filter').forEach(filter => {
                filter.addEventListener('click', () => {
                    const type = filter.dataset.type;
                    switchTypeFilter(type);
                });
            });
            
            // Quick actions
            document.getElementById('newReplyBtn').addEventListener('click', () => showToast('💬 Redirection vers les discussions actives...'));
            document.getElementById('bestAnswersBtn').addEventListener('click', () => switchTypeFilter('best-answer'));
            document.getElementById('analyticsBtn').addEventListener('click', () => showToast('📊 Ouverture des analytics...'));
            document.getElementById('exportBtn').addEventListener('click', exportReplies);
            
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
            const replySearchTerm = document.getElementById('replySearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = replySearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredReplies = allReplies.filter(reply => 
                    reply.content.toLowerCase().includes(searchTerm) ||
                    reply.topicTitle.toLowerCase().includes(searchTerm) ||
                    reply.categoryLabel.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredReplies = [...allReplies];
            }
            
            // Sync search inputs
            document.getElementById('replySearch').value = searchTerm;
            document.getElementById('searchFilter').value = searchTerm;
            
            applyFilters();
        }

        // Type filter switching
        function switchTypeFilter(type) {
            currentType = type;
            
            // Update active type filter
            document.querySelectorAll('.type-filter').forEach(filter => {
                filter.classList.toggle('active', filter.dataset.type === type);
            });
            
            filterByType(type);
            showToast(`📂 Filtre "${getTypeLabel(type)}" appliqué`);
        }

        function filterByType(type) {
            let filtered = [];
            
            switch(type) {
                case 'best-answer':
                    filtered = allReplies.filter(reply => reply.isBestAnswer);
                    break;
                case 'top-reply':
                    filtered = allReplies.filter(reply => reply.isTopReply);
                    break;
                case 'helpful':
                    filtered = allReplies.filter(reply => reply.isHelpful);
                    break;
                case 'recent':
                    const weekAgo = new Date();
                    weekAgo.setDate(weekAgo.getDate() - 7);
                    filtered = allReplies.filter(reply => reply.createdAt >= weekAgo);
                    break;
                default:
                    filtered = [...allReplies];
            }
            
            filteredReplies = filtered;
            currentPage = 1;
            applyFilters();
        }

        // Apply filters
        function applyFilters() {
            let filtered = [...filteredReplies];
            
            // Category filter
            const categoryFilter = document.getElementById('categoryFilter').value;
            if (categoryFilter) {
                filtered = filtered.filter(reply => reply.category === categoryFilter);
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
                    filtered = filtered.filter(reply => reply.createdAt >= cutoffDate);
                }
            }
            
            // Sort
            const sortBy = document.getElementById('sortFilter').value;
            filtered.sort((a, b) => {
                switch (sortBy) {
                    case 'newest':
                        return new Date(b.createdAt) - new Date(a.createdAt);
                    case 'oldest':
                        return new Date(a.createdAt) - new Date(b.createdAt);
                    case 'popular':
                        return (b.likes + b.views) - (a.likes + a.views);
                    case 'helpful':
                        return b.likes - a.likes;
                    case 'best-answer':
                        if (a.isBestAnswer && !b.isBestAnswer) return -1;
                        if (!a.isBestAnswer && b.isBestAnswer) return 1;
                        return b.likes - a.likes;
                    default:
                        return 0;
                }
            });
            
            filteredReplies = filtered;
            currentPage = 1;
            renderReplies();
        }

        // Render replies
        function renderReplies() {
            const startIndex = (currentPage - 1) * repliesPerPage;
            const endIndex = startIndex + repliesPerPage;
            const repliesToShow = filteredReplies.slice(startIndex, endIndex);
            
            const repliesList = document.getElementById('repliesList');
            repliesList.innerHTML = '';
            
            if (repliesToShow.length === 0) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <div class="empty-icon">💭</div>
                    <h3 class="empty-title">Aucune réponse trouvée</h3>
                    <p class="empty-description">Essayez de modifier vos filtres ou participez à de nouvelles discussions.</p>
                    <button class="action-btn" onclick="clearAllFilters()">🔄 Réinitialiser les filtres</button>
                `;
                repliesList.appendChild(emptyState);
            } else {
                repliesToShow.forEach(reply => {
                    const replyItem = createReplyItem(reply);
                    repliesList.appendChild(replyItem);
                });
            }
            
            updatePagination();
        }

        // Create reply item
        function createReplyItem(reply) {
            const item = document.createElement('div');
            let itemClasses = 'reply-item';
            
            if (reply.isBestAnswer) itemClasses += ' best-answer';
            if (reply.isTopReply && !reply.isBestAnswer) itemClasses += ' top-reply';
            
            item.className = itemClasses;
            item.addEventListener('click', () => openTopic(reply));
            
            const badges = getBadges(reply);
            const formattedDate = formatRelativeTime(reply.createdAt);
            
            item.innerHTML = `
                <div class="reply-header">
                    <div class="reply-topic-info">
                        <h3 class="reply-topic-title">${reply.topicTitle}</h3>
                        <div class="reply-meta">
                            <span class="reply-category">${reply.categoryLabel}</span>
                            <span>🕒 ${formattedDate}</span>
                            <span>👀 ${reply.views} vues</span>
                            <span>❤️ ${reply.likes} likes</span>
                            <span>💬 ${reply.replies} réponses</span>
                        </div>
                        ${badges.length > 0 ? `<div class="reply-badges">${badges}</div>` : ''}
                    </div>
                    <div class="reply-stats">
                        <div class="reply-stat">
                            <div class="reply-stat-number">${reply.likes}</div>
                            <div class="reply-stat-label">Likes</div>
                        </div>
                        <div class="reply-stat">
                            <div class="reply-stat-number">${reply.replies}</div>
                            <div class="reply-stat-label">Réponses</div>
                        </div>
                        <div class="reply-stat">
                            <div class="reply-stat-number">${reply.views}</div>
                            <div class="reply-stat-label">Vues</div>
                        </div>
                    </div>
                </div>
                <div class="reply-content">
                    <p class="reply-text">${reply.content}</p>
                </div>
                <div class="reply-actions">
                    <button class="reply-btn primary" onclick="viewTopic(${reply.topicId}, event)">👀 Voir le sujet</button>
                    <button class="reply-btn" onclick="editReply(${reply.id}, event)">✏️ Modifier</button>
                    <button class="reply-btn" onclick="quoteReply(${reply.id}, event)">📝 Citer</button>
                    <button class="reply-btn" onclick="shareReply(${reply.id}, event)">📤 Partager</button>
                    <button class="reply-btn danger" onclick="deleteReply(${reply.id}, event)">🗑️ Supprimer</button>
                </div>
            `;
            
            return item;
        }

        // Get badges for reply
        function getBadges(reply) {
            const badges = [];
            
            if (reply.isBestAnswer) {
                badges.push('<span class="reply-badge badge-best-answer">🏆 Meilleure réponse</span>');
            }
            if (reply.isTopReply && !reply.isBestAnswer) {
                badges.push('<span class="reply-badge badge-top-reply">⭐ Top réponse</span>');
            }
            if (reply.isHelpful && !reply.isBestAnswer && !reply.isTopReply) {
                badges.push('<span class="reply-badge badge-helpful">👍 Utile</span>');
            }
            
            return badges.join('');
        }

        // Utility functions
        function getTypeLabel(type) {
            const labels = {
                all: 'Toutes',
                'best-answer': 'Meilleures réponses',
                'top-reply': 'Top réponses',
                helpful: 'Utiles',
                recent: 'Récentes'
            };
            return labels[type] || 'Toutes';
        }

        function formatRelativeTime(date) {
            const now = new Date();
            const diff = now - date;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const days = Math.floor(hours / 24);
            
            if (hours < 1) return 'Il y a moins d\'1h';
            if (hours < 24) return `Il y a ${hours}h`;
            if (days < 7) return `Il y a ${days} jour${days > 1 ? 's' : ''}`;
            return `Il y a ${Math.floor(days / 7)} semaine${Math.floor(days / 7) > 1 ? 's' : ''}`;
        }

        // Reply actions
        function viewTopic(topicId, event) {
            if (event) event.stopPropagation();
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showToast(`👀 Ouverture du sujet #${topicId}`);
                console.log('Viewing topic:', topicId);
            }, 600);
        }

        function editReply(replyId, event) {
            if (event) event.stopPropagation();
            const reply = allReplies.find(r => r.id === replyId);
            openEditModal(reply);
        }

        function openEditModal(reply) {
            const modal = document.getElementById('editModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = `Modifier votre réponse`;
            
            modalBody.innerHTML = `
                <div style="margin-bottom: 1.5rem;">
                    <h3 style="color: #00d4ff; margin-bottom: 1rem;">Sujet : ${reply.topicTitle}</h3>
                    <div style="background: rgba(0, 255, 136, 0.05); padding: 1rem; border-radius: 8px; border-left: 3px solid rgba(0, 255, 136, 0.3);">
                        <strong style="color: #00ff88;">Votre réponse actuelle :</strong>
                        <p style="color: #b0b0b0; margin-top: 0.5rem; line-height: 1.6;">${reply.content.substring(0, 150)}...</p>
                    </div>
                </div>
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; color: #00ff88; font-weight: 600; margin-bottom: 0.5rem;">Nouvelle version</label>
                    <textarea style="width: 100%; min-height: 200px; background: #2a2a2a; border: 1px solid rgba(0, 255, 136, 0.3); border-radius: 8px; padding: 1rem; color: #ffffff; font-size: 1rem; resize: vertical; line-height: 1.6;">${reply.content}</textarea>
                </div>
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button class="reply-btn" onclick="closeModal()">❌ Annuler</button>
                    <button class="reply-btn primary" onclick="saveReply(${reply.id})">💾 Enregistrer</button>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`✏️ Édition de votre réponse`);
        }

        function saveReply(replyId) {
            showLoading();
            setTimeout(() => {
                hideLoading();
                closeModal();
                showToast('💾 Réponse modifiée avec succès !');
            }, 800);
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        function quoteReply(replyId, event) {
            event.stopPropagation();
            const reply = allReplies.find(r => r.id === replyId);
            showToast(`📝 Citation de votre réponse préparée`);
        }

        function shareReply(replyId, event) {
            event.stopPropagation();
            const reply = allReplies.find(r => r.id === replyId);
            showToast(`📤 Lien de partage copié dans le presse-papier !`);
        }

        function deleteReply(replyId, event) {
            event.stopPropagation();
            const reply = allReplies.find(r => r.id === replyId);
            
            if (confirm(`Êtes-vous sûr de vouloir supprimer cette réponse ?\n\n"${reply.content.substring(0, 100)}..."`)) {
                allReplies = allReplies.filter(r => r.id !== replyId);
                filteredReplies = filteredReplies.filter(r => r.id !== replyId);
                renderReplies();
                updateTypeCounts();
                showToast(`🗑️ Réponse supprimée !`);
            }
        }

        function clearAllFilters() {
            document.getElementById('replySearch').value = '';
            document.getElementById('searchFilter').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('periodFilter').value = '';
            document.getElementById('sortFilter').value = 'newest';
            
            switchTypeFilter('all');
            showToast('🔄 Tous les filtres réinitialisés');
        }

        function exportReplies() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showToast('📤 Export terminé ! Fichier CSV téléchargé.');
                console.log('Exporting replies to CSV');
            }, 1200);
        }

        // Update type counts
        function updateTypeCounts() {
            const bestAnswerCount = allReplies.filter(r => r.isBestAnswer).length;
            const topReplyCount = allReplies.filter(r => r.isTopReply).length;
            const helpfulCount = allReplies.filter(r => r.isHelpful).length;
            const weekAgo = new Date();
            weekAgo.setDate(weekAgo.getDate() - 7);
            const recentCount = allReplies.filter(r => r.createdAt >= weekAgo).length;
            const totalCount = allReplies.length;
            
            document.getElementById('allCount').textContent = totalCount;
            document.getElementById('bestCount').textContent = bestAnswerCount;
            document.getElementById('topCount').textContent = topReplyCount;
            document.getElementById('helpfulCount').textContent = helpfulCount;
            document.getElementById('recentCount').textContent = recentCount;
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredReplies.length / repliesPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredReplies.length / repliesPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderReplies();
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

            function animateDecimal(elementId, target, duration = 2000) {
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
                    element.textContent = current.toFixed(1);
                }, 16);
            }

            setTimeout(() => {
                animateCounter('totalReplies', 87);
                animateCounter('totalLikes', 342);
                animateCounter('bestAnswers', 12);
                animateDecimal('helpfulRating', 4.8);
                updateTypeCounts();
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
                document.getElementById('replySearch').focus();
                showToast('🔍 Recherche activée');
            }
            
            // Escape to close modal
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>