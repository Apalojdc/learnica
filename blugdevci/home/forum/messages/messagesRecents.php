<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Sujets - DevCommunity</title>
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
        .topics-container {
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
        .topics-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .topics-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .topics-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* User Profile Summary */
        .user-profile-summary {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .user-profile-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .user-profile-summary:hover::before {
            left: 100%;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            color: #000;
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
            position: relative;
        }

        .profile-avatar::after {
            content: '';
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background: #00ff88;
            border: 3px solid #1e1e1e;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .profile-role {
            color: #00d4ff;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .profile-stat {
            text-align: center;
            padding: 1rem;
            background: rgba(0, 255, 136, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
        }

        .profile-stat:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 255, 136, 0.3);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .profile-stat-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: #00d4ff;
            margin-bottom: 0.3rem;
            display: block;
        }

        .profile-stat-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
        .topics-filters {
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

        /* Topics List */
        .topics-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .topic-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .topic-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .topic-item:hover::before {
            left: 100%;
        }

        .topic-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .topic-item.pinned {
            border-left: 4px solid #ffd700;
            background: linear-gradient(145deg, #2e2a1e, #3a341e);
        }

        .topic-item.closed {
            opacity: 0.7;
            border-left: 4px solid #ff6b6b;
        }

        .topic-item.draft {
            border-left: 4px solid #888;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
        }

        .topic-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .topic-info {
            flex: 1;
        }

        .topic-title {
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

        .topic-item:hover .topic-title {
            color: #00ff88;
        }

        .topic-status-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-published {
            background: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .status-draft {
            background: rgba(136, 136, 136, 0.2);
            color: #888;
        }

        .status-closed {
            background: rgba(244, 67, 54, 0.2);
            color: #F44336;
        }

        .status-pinned {
            background: rgba(255, 215, 0, 0.2);
            color: #FFD700;
        }

        .topic-meta {
            display: flex;
            gap: 1rem;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .topic-category {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .topic-preview {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .topic-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1rem;
        }

        .topic-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .topic-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .topic-stat-label {
            color: #888;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .topic-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .topic-btn {
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

        .topic-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .topic-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .topic-btn.danger {
            background: rgba(244, 67, 54, 0.1);
            border-color: rgba(244, 67, 54, 0.3);
            color: #F44336;
        }

        .topic-btn.warning {
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
            max-width: 600px;
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
            
            .profile-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .topic-stats {
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

            .topics-container {
                padding: 1rem;
            }

            .topics-title {
                font-size: 2rem;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-stats {
                grid-template-columns: 1fr;
            }

            .topic-header {
                flex-direction: column;
                gap: 1rem;
            }

            .topic-stats {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .topic-actions {
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

        <!-- Topic Edit Modal -->
        <div class="modal-overlay" id="editModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Modifier le sujet</h2>
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
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans mes sujets..." id="topicSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="topics-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <a href="#">💬 Forum</a> > <span>📝 Mes Sujets</span>
            </div>

            <!-- Page Header -->
            <div class="topics-header">
                <h1 class="topics-title">Mes Sujets</h1>
                <p class="topics-subtitle">
                    Gérez tous vos sujets créés, suivez leur évolution et analysez leurs performances 
                    dans un tableau de bord personnalisé et intuitif.
                </p>
            </div>

            <!-- User Profile Summary -->
            <div class="user-profile-summary">
                <div class="profile-header">
                    <div class="profile-avatar">JS</div>
                    <div class="profile-info">
                        <h2 class="profile-name">Jean Sébastien</h2>
                        <div class="profile-role">🏆 Membre Expert</div>
                    </div>
                </div>
                <div class="profile-stats">
                    <div class="profile-stat">
                        <span class="profile-stat-number" id="totalTopics">24</span>
                        <span class="profile-stat-label">Sujets créés</span>
                    </div>
                    <div class="profile-stat">
                        <span class="profile-stat-number" id="totalViews">12,847</span>
                        <span class="profile-stat-label">Vues totales</span>
                    </div>
                    <div class="profile-stat">
                        <span class="profile-stat-number" id="totalReplies">342</span>
                        <span class="profile-stat-label">Réponses reçues</span>
                    </div>
                    <div class="profile-stat">
                        <span class="profile-stat-number" id="reputation">2,890</span>
                        <span class="profile-stat-label">Points réputation</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" id="newTopicBtn">
                    ➕ Nouveau Sujet
                </button>
                <button class="action-btn secondary" id="draftsBtn">
                    📝 Mes Brouillons
                </button>
                <button class="action-btn secondary" id="analyticsBtn">
                    📊 Statistiques
                </button>
                <button class="action-btn secondary" id="exportBtn">
                    📤 Exporter
                </button>
            </div>

            <!-- Status Filter Tabs -->
            <div class="status-filters">
                <button class="status-filter active" data-status="all">
                    🌐 Tous
                    <span class="status-count" id="allCount">24</span>
                </button>
                <button class="status-filter" data-status="published">
                    ✅ Publiés
                    <span class="status-count" id="publishedCount">18</span>
                </button>
                <button class="status-filter" data-status="draft">
                    📝 Brouillons
                    <span class="status-count" id="draftCount">4</span>
                </button>
                <button class="status-filter" data-status="pinned">
                    📌 Épinglés
                    <span class="status-count" id="pinnedCount">2</span>
                </button>
                <button class="status-filter" data-status="closed">
                    🔒 Fermés
                    <span class="status-count" id="closedCount">2</span>
                </button>
            </div>

            <!-- Filters Section -->
            <div class="topics-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Titre, contenu, tags..." id="searchFilter">
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
                            <option value="replies">Plus de réponses</option>
                            <option value="views">Plus de vues</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Vue</label>
                        <div class="view-toggle">
                            <button class="view-btn active" id="listView">📋</button>
                            <button class="view-btn" id="gridView">🔲</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Topics List -->
            <div class="topics-list" id="topicsList">
                <!-- Topics will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">3</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentStatus = 'all';
        let totalTopics = 24;
        let topicsPerPage = 10;
        let filteredTopics = [];
        let allTopics = [];

        // Sample topic data
        const topicData = [
            {
                id: 1,
                title: "Comment optimiser React avec useCallback et useMemo ?",
                preview: "Je cherche des conseils pour optimiser les performances de mon app React. J'utilise déjà React.memo mais je ne suis pas sûr de bien comprendre useCallback et useMemo...",
                category: "javascript",
                categoryLabel: "JavaScript",
                status: "published",
                isPinned: true,
                createdAt: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                views: 1247,
                replies: 23,
                likes: 45,
                lastReply: "Il y a 2 heures"
            },
            {
                id: 2,
                title: "Architecture microservices avec Docker et Kubernetes",
                preview: "Retour d'expérience sur notre migration vers une architecture microservices. Les défis rencontrés, les solutions adoptées et les leçons apprises...",
                category: "devops",
                categoryLabel: "DevOps",
                status: "published",
                isPinned: true,
                createdAt: new Date(Date.now() - 5 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                views: 2156,
                replies: 34,
                likes: 67,
                lastReply: "Il y a 5 heures"
            },
            {
                id: 3,
                title: "Machine Learning pour débutants : par où commencer ?",
                preview: "Guide complet pour débuter en Machine Learning. Prérequis mathématiques, langages de programmation, frameworks et ressources recommandées...",
                category: "python",
                categoryLabel: "Python",
                status: "published",
                isPinned: false,
                createdAt: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 6 * 24 * 60 * 60 * 1000),
                views: 3420,
                replies: 56,
                likes: 89,
                lastReply: "Il y a 1 jour"
            },
            {
                id: 4,
                title: "CSS Grid vs Flexbox : guide pratique 2024",
                preview: "Comparaison détaillée entre CSS Grid et Flexbox avec des exemples pratiques pour savoir quand utiliser l'un ou l'autre...",
                category: "design",
                categoryLabel: "Design",
                status: "draft",
                isPinned: false,
                createdAt: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 4 * 60 * 60 * 1000),
                views: 0,
                replies: 0,
                likes: 0,
                lastReply: null
            },
            {
                id: 5,
                title: "Flutter vs React Native : mon retour d'expérience",
                preview: "Après avoir développé des apps avec les deux frameworks, voici mon analyse objective des avantages et inconvénients de chacun...",
                category: "mobile",
                categoryLabel: "Mobile",
                status: "published",
                isPinned: false,
                createdAt: new Date(Date.now() - 10 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 8 * 24 * 60 * 60 * 1000),
                views: 1890,
                replies: 28,
                likes: 42,
                lastReply: "Il y a 3 jours"
            },
            {
                id: 6,
                title: "Sécurité des APIs REST : checklist complète",
                preview: "Liste exhaustive des bonnes pratiques de sécurité pour vos APIs : authentification, autorisation, validation, rate limiting...",
                category: "javascript",
                categoryLabel: "JavaScript",
                status: "published",
                isPinned: false,
                createdAt: new Date(Date.now() - 14 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 12 * 24 * 60 * 60 * 1000),
                views: 2734,
                replies: 41,
                likes: 78,
                lastReply: "Il y a 1 semaine"
            },
            {
                id: 7,
                title: "Guide complet du testing avec Jest et React Testing Library",
                preview: "Tutorial approfondi sur les tests unitaires et d'intégration pour les applications React modernes...",
                category: "javascript",
                categoryLabel: "JavaScript",
                status: "draft",
                isPinned: false,
                createdAt: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 2 * 60 * 60 * 1000),
                views: 0,
                replies: 0,
                likes: 0,
                lastReply: null
            },
            {
                id: 8,
                title: "DevOps pour les développeurs : CI/CD avec GitHub Actions",
                preview: "Mise en place d'une pipeline CI/CD complète avec GitHub Actions, tests automatisés et déploiement automatique...",
                category: "devops",
                categoryLabel: "DevOps",
                status: "closed",
                isPinned: false,
                createdAt: new Date(Date.now() - 21 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 20 * 24 * 60 * 60 * 1000),
                views: 1567,
                replies: 19,
                likes: 35,
                lastReply: "Il y a 2 semaines"
            },
            {
                id: 9,
                title: "Design Systems : créer une librairie de composants",
                preview: "Retour d'expérience sur la création d'un design system complet avec Storybook, tokens de design et documentation...",
                category: "design",
                categoryLabel: "Design",
                status: "published",
                isPinned: false,
                createdAt: new Date(Date.now() - 30 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 28 * 24 * 60 * 60 * 1000),
                views: 2890,
                replies: 47,
                likes: 92,
                lastReply: "Il y a 3 semaines"
            },
            {
                id: 10,
                title: "Introduction aux Progressive Web Apps (PWA)",
                preview: "Guide pour transformer votre application web en PWA : service workers, manifest, cache strategies et notifications push...",
                category: "javascript",
                categoryLabel: "JavaScript",
                status: "draft",
                isPinned: false,
                createdAt: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                updatedAt: new Date(Date.now() - 1 * 60 * 60 * 1000),
                views: 0,
                replies: 0,
                likes: 0,
                lastReply: null
            }
        ];

        // Initialize the page
        function init() {
            allTopics = [...topicData];
            filteredTopics = [...allTopics];
            
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                filterByStatus('all');
                renderTopics();
                hideLoading();
                showToast("📝 Mes sujets chargés avec succès !", 3000);
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
            document.getElementById('topicSearch').addEventListener('input', handleSearch);
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
            document.getElementById('newTopicBtn').addEventListener('click', () => showToast('📝 Ouverture de l\'éditeur...'));
            document.getElementById('draftsBtn').addEventListener('click', () => switchStatusFilter('draft'));
            document.getElementById('analyticsBtn').addEventListener('click', () => showToast('📊 Ouverture des statistiques...'));
            document.getElementById('exportBtn').addEventListener('click', exportTopics);
            
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
            const topicSearchTerm = document.getElementById('topicSearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = topicSearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredTopics = allTopics.filter(topic => 
                    topic.title.toLowerCase().includes(searchTerm) ||
                    topic.preview.toLowerCase().includes(searchTerm) ||
                    topic.categoryLabel.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredTopics = [...allTopics];
            }
            
            // Sync search inputs
            document.getElementById('topicSearch').value = searchTerm;
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
                case 'published':
                    filtered = allTopics.filter(topic => topic.status === 'published' && !topic.isPinned);
                    break;
                case 'draft':
                    filtered = allTopics.filter(topic => topic.status === 'draft');
                    break;
                case 'pinned':
                    filtered = allTopics.filter(topic => topic.isPinned);
                    break;
                case 'closed':
                    filtered = allTopics.filter(topic => topic.status === 'closed');
                    break;
                default:
                    filtered = [...allTopics];
            }
            
            filteredTopics = filtered;
            currentPage = 1;
            applyFilters();
        }

        // Apply filters
        function applyFilters() {
            let filtered = [...filteredTopics];
            
            // Category filter
            const categoryFilter = document.getElementById('categoryFilter').value;
            if (categoryFilter) {
                filtered = filtered.filter(topic => topic.category === categoryFilter);
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
                    filtered = filtered.filter(topic => topic.createdAt >= cutoffDate);
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
                    case 'replies':
                        return b.replies - a.replies;
                    case 'views':
                        return b.views - a.views;
                    default:
                        return 0;
                }
            });
            
            filteredTopics = filtered;
            currentPage = 1;
            renderTopics();
        }

        // Render topics
        function renderTopics() {
            const startIndex = (currentPage - 1) * topicsPerPage;
            const endIndex = startIndex + topicsPerPage;
            const topicsToShow = filteredTopics.slice(startIndex, endIndex);
            
            const topicsList = document.getElementById('topicsList');
            topicsList.innerHTML = '';
            
            if (topicsToShow.length === 0) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <div class="empty-icon">📝</div>
                    <h3 class="empty-title">Aucun sujet trouvé</h3>
                    <p class="empty-description">Essayez de modifier vos filtres ou créez votre premier sujet.</p>
                    <button class="action-btn" onclick="clearAllFilters()">🔄 Réinitialiser les filtres</button>
                `;
                topicsList.appendChild(emptyState);
            } else {
                topicsToShow.forEach(topic => {
                    const topicItem = createTopicItem(topic);
                    topicsList.appendChild(topicItem);
                });
            }
            
            updatePagination();
        }

        // Create topic item
        function createTopicItem(topic) {
            const item = document.createElement('div');
            let itemClasses = 'topic-item';
            
            if (topic.isPinned) itemClasses += ' pinned';
            if (topic.status === 'closed') itemClasses += ' closed';
            if (topic.status === 'draft') itemClasses += ' draft';
            
            item.className = itemClasses;
            item.addEventListener('click', () => openTopic(topic));
            
            const statusBadge = getStatusBadge(topic);
            const formattedDate = formatDate(topic.createdAt);
            const formattedViews = topic.views.toLocaleString();
            
            item.innerHTML = `
                <div class="topic-header">
                    <div class="topic-info">
                        <h3 class="topic-title">
                            ${topic.isPinned ? '📌 ' : ''}
                            ${topic.status === 'closed' ? '🔒 ' : ''}
                            ${topic.status === 'draft' ? '📝 ' : ''}
                            ${topic.title}
                            ${statusBadge}
                        </h3>
                        <div class="topic-meta">
                            <span class="topic-category">${topic.categoryLabel}</span>
                            <span>📅 Créé le ${formattedDate}</span>
                            <span>👀 ${formattedViews} vues</span>
                            <span>💬 ${topic.replies} réponses</span>
                            <span>❤️ ${topic.likes} likes</span>
                            ${topic.lastReply ? `<span>🕒 Dernière réponse: ${topic.lastReply}</span>` : ''}
                        </div>
                        <p class="topic-preview">${topic.preview}</p>
                    </div>
                    <div class="topic-stats">
                        <div class="topic-stat">
                            <div class="topic-stat-number">${topic.views}</div>
                            <div class="topic-stat-label">Vues</div>
                        </div>
                        <div class="topic-stat">
                            <div class="topic-stat-number">${topic.replies}</div>
                            <div class="topic-stat-label">Réponses</div>
                        </div>
                        <div class="topic-stat">
                            <div class="topic-stat-number">${topic.likes}</div>
                            <div class="topic-stat-label">Likes</div>
                        </div>
                    </div>
                </div>
                <div class="topic-actions">
                    ${getTopicActions(topic)}
                </div>
            `;
            
            return item;
        }

        // Get status badge
        function getStatusBadge(topic) {
            if (topic.isPinned) {
                return '<span class="topic-status-badge status-pinned">Épinglé</span>';
            }
            
            switch(topic.status) {
                case 'published':
                    return '<span class="topic-status-badge status-published">Publié</span>';
                case 'draft':
                    return '<span class="topic-status-badge status-draft">Brouillon</span>';
                case 'closed':
                    return '<span class="topic-status-badge status-closed">Fermé</span>';
                default:
                    return '';
            }
        }

        // Get topic actions
        function getTopicActions(topic) {
            let actions = [];
            
            if (topic.status === 'published') {
                actions.push(`<button class="topic-btn primary" onclick="viewTopic(${topic.id}, event)">👀 Voir</button>`);
                actions.push(`<button class="topic-btn" onclick="editTopic(${topic.id}, event)">✏️ Modifier</button>`);
                
                if (topic.isPinned) {
                    actions.push(`<button class="topic-btn warning" onclick="unpinTopic(${topic.id}, event)">📌 Désépingler</button>`);
                } else {
                    actions.push(`<button class="topic-btn" onclick="pinTopic(${topic.id}, event)">📌 Épingler</button>`);
                }
                
                actions.push(`<button class="topic-btn" onclick="closeTopic(${topic.id}, event)">🔒 Fermer</button>`);
            } else if (topic.status === 'draft') {
                actions.push(`<button class="topic-btn primary" onclick="editTopic(${topic.id}, event)">✏️ Continuer</button>`);
                actions.push(`<button class="topic-btn" onclick="publishTopic(${topic.id}, event)">🚀 Publier</button>`);
                actions.push(`<button class="topic-btn danger" onclick="deleteTopic(${topic.id}, event)">🗑️ Supprimer</button>`);
            } else if (topic.status === 'closed') {
                actions.push(`<button class="topic-btn primary" onclick="viewTopic(${topic.id}, event)">👀 Voir</button>`);
                actions.push(`<button class="topic-btn" onclick="reopenTopic(${topic.id}, event)">🔓 Rouvrir</button>`);
            }
            
            actions.push(`<button class="topic-btn" onclick="duplicateTopic(${topic.id}, event)">📄 Dupliquer</button>`);
            
            return actions.join('');
        }

        // Utility functions
        function getStatusLabel(status) {
            const labels = {
                all: 'Tous',
                published: 'Publiés',
                draft: 'Brouillons',
                pinned: 'Épinglés',
                closed: 'Fermés'
            };
            return labels[status] || 'Tous';
        }

        function formatDate(date) {
            return new Date(date).toLocaleDateString('fr-FR');
        }

        // Topic actions
        function viewTopic(topicId, event) {
            if (event) event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                showToast(`👀 Ouverture : "${topic.title}"`);
                console.log('Viewing topic:', topic.title);
            }, 600);
        }

        function editTopic(topicId, event) {
            if (event) event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            openEditModal(topic);
        }

        function openEditModal(topic) {
            const modal = document.getElementById('editModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = `Modifier : ${topic.title}`;
            
            modalBody.innerHTML = `
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; color: #00ff88; font-weight: 600; margin-bottom: 0.5rem;">Titre</label>
                    <input type="text" value="${topic.title}" style="width: 100%; background: #2a2a2a; border: 1px solid rgba(0, 255, 136, 0.3); border-radius: 8px; padding: 0.8rem 1rem; color: #ffffff; font-size: 1rem;">
                </div>
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; color: #00ff88; font-weight: 600; margin-bottom: 0.5rem;">Catégorie</label>
                    <select style="width: 100%; background: #2a2a2a; border: 1px solid rgba(0, 255, 136, 0.3); border-radius: 8px; padding: 0.8rem 1rem; color: #ffffff; font-size: 1rem;">
                        <option value="javascript" ${topic.category === 'javascript' ? 'selected' : ''}>JavaScript & Node.js</option>
                        <option value="python" ${topic.category === 'python' ? 'selected' : ''}>Python & Data Science</option>
                        <option value="devops" ${topic.category === 'devops' ? 'selected' : ''}>DevOps & Cloud</option>
                        <option value="design" ${topic.category === 'design' ? 'selected' : ''}>UI/UX Design</option>
                        <option value="mobile" ${topic.category === 'mobile' ? 'selected' : ''}>Développement Mobile</option>
                        <option value="general" ${topic.category === 'general' ? 'selected' : ''}>Discussions Générales</option>
                    </select>
                </div>
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; color: #00ff88; font-weight: 600; margin-bottom: 0.5rem;">Contenu</label>
                    <textarea style="width: 100%; min-height: 200px; background: #2a2a2a; border: 1px solid rgba(0, 255, 136, 0.3); border-radius: 8px; padding: 0.8rem 1rem; color: #ffffff; font-size: 1rem; resize: vertical;">${topic.preview}</textarea>
                </div>
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button class="topic-btn" onclick="closeModal()">❌ Annuler</button>
                    <button class="topic-btn primary" onclick="saveTopic(${topic.id})">💾 Enregistrer</button>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`✏️ Édition de "${topic.title}"`);
        }

        function saveTopic(topicId) {
            showLoading();
            setTimeout(() => {
                hideLoading();
                closeModal();
                showToast('💾 Sujet enregistré avec succès !');
            }, 800);
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        function pinTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            topic.isPinned = true;
            renderTopics();
            updateStatusCounts();
            showToast(`📌 "${topic.title}" épinglé !`);
        }

        function unpinTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            topic.isPinned = false;
            renderTopics();
            updateStatusCounts();
            showToast(`📌 "${topic.title}" désépinglé !`);
        }

        function closeTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            topic.status = 'closed';
            renderTopics();
            updateStatusCounts();
            showToast(`🔒 "${topic.title}" fermé !`);
        }

        function reopenTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            topic.status = 'published';
            renderTopics();
            updateStatusCounts();
            showToast(`🔓 "${topic.title}" rouvert !`);
        }

        function publishTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            topic.status = 'published';
            topic.createdAt = new Date();
            renderTopics();
            updateStatusCounts();
            showToast(`🚀 "${topic.title}" publié !`);
        }

        function deleteTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            
            if (confirm(`Êtes-vous sûr de vouloir supprimer "${topic.title}" ?`)) {
                allTopics = allTopics.filter(t => t.id !== topicId);
                filteredTopics = filteredTopics.filter(t => t.id !== topicId);
                renderTopics();
                updateStatusCounts();
                showToast(`🗑️ "${topic.title}" supprimé !`);
            }
        }

        function duplicateTopic(topicId, event) {
            event.stopPropagation();
            const topic = allTopics.find(t => t.id === topicId);
            showToast(`📄 Duplication de "${topic.title}"`);
        }

        function clearAllFilters() {
            document.getElementById('topicSearch').value = '';
            document.getElementById('searchFilter').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('periodFilter').value = '';
            document.getElementById('sortFilter').value = 'newest';
            
            switchStatusFilter('all');
            showToast('🔄 Tous les filtres réinitialisés');
        }

        function exportTopics() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showToast('📤 Export en cours... Fichier CSV généré !');
                console.log('Exporting topics to CSV');
            }, 1200);
        }

        // Update status counts
        function updateStatusCounts() {
            const publishedCount = allTopics.filter(t => t.status === 'published' && !t.isPinned).length;
            const draftCount = allTopics.filter(t => t.status === 'draft').length;
            const pinnedCount = allTopics.filter(t => t.isPinned).length;
            const closedCount = allTopics.filter(t => t.status === 'closed').length;
            const totalCount = allTopics.length;
            
            document.getElementById('allCount').textContent = totalCount;
            document.getElementById('publishedCount').textContent = publishedCount;
            document.getElementById('draftCount').textContent = draftCount;
            document.getElementById('pinnedCount').textContent = pinnedCount;
            document.getElementById('closedCount').textContent = closedCount;
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredTopics.length / topicsPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredTopics.length / topicsPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderTopics();
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
                animateCounter('totalTopics', 24);
                animateCounter('totalViews', 12847);
                animateCounter('totalReplies', 342);
                animateCounter('reputation', 2890);
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
                document.getElementById('topicSearch').focus();
                showToast('🔍 Recherche activée');
            }
            
            // Escape to close modal
            if (e.key === 'Escape') {
                closeModal();
            }
            
            // N for new topic
            if (e.key === 'n' && !e.ctrlKey && !e.metaKey) {
                if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    showToast('📝 Nouveau sujet...');
                }
            }
        });
    </script>
</body>
</html>