<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujets Suivis - DevCommunity</title>
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
        .followed-container {
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
        .followed-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .followed-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
        }

        .followed-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Follow Summary */
        .follow-summary {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .follow-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .follow-summary:hover::before {
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

        .summary-icon::after {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 25px;
            height: 25px;
            background: #ff6b6b;
            border: 3px solid #1e1e1e;
            border-radius: 50%;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
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

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: #ff6b6b;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
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
        .followed-filters {
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

        /* Followed Topics List */
        .followed-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .followed-item {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(0, 255, 136, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .followed-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .followed-item:hover::before {
            left: 100%;
        }

        .followed-item:hover {
            border-color: rgba(0, 255, 136, 0.3);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 255, 136, 0.1);
        }

        .followed-item.has-updates {
            border-left: 4px solid #00ff88;
            background: linear-gradient(145deg, #1e2e1e, #2a3a2a);
        }

        .followed-item.urgent {
            border-left: 4px solid #ff6b6b;
            background: linear-gradient(145deg, #2e1e1e, #3a2a2a);
        }

        .followed-item.solved {
            opacity: 0.7;
            border-left: 4px solid #ffd700;
        }

        .followed-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .followed-info {
            flex: 1;
        }

        .followed-title {
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

        .followed-item:hover .followed-title {
            color: #00ff88;
        }

        .followed-meta {
            display: flex;
            gap: 1rem;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .followed-category {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .update-indicator {
            background: #ff6b6b;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: pulse 2s infinite;
        }

        .follow-type-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-watching {
            background: rgba(0, 255, 136, 0.2);
            color: #00ff88;
        }

        .badge-participating {
            background: rgba(0, 212, 255, 0.2);
            color: #00d4ff;
        }

        .badge-mentioned {
            background: rgba(255, 193, 7, 0.2);
            color: #FFC107;
        }

        .followed-preview {
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .followed-activity {
            background: rgba(0, 255, 136, 0.03);
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
            border-left: 3px solid rgba(0, 255, 136, 0.3);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .activity-type {
            color: #00ff88;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .activity-time {
            color: #888;
            font-size: 0.8rem;
        }

        .activity-content {
            color: #e0e0e0;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .followed-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-bottom: 1rem;
        }

        .followed-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .followed-stat-number {
            color: #00d4ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .followed-stat-label {
            color: #888;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .followed-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .followed-btn {
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

        .followed-btn:hover {
            background: rgba(0, 255, 136, 0.2);
            transform: translateY(-1px);
        }

        .followed-btn.primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            border-color: transparent;
        }

        .followed-btn.danger {
            background: rgba(244, 67, 54, 0.1);
            border-color: rgba(244, 67, 54, 0.3);
            color: #F44336;
        }

        .followed-btn.warning {
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
            
            .summary-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .followed-stats {
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

            .followed-container {
                padding: 1rem;
            }

            .followed-title {
                font-size: 2rem;
            }

            .summary-header {
                flex-direction: column;
                text-align: center;
            }

            .summary-stats {
                grid-template-columns: 1fr;
            }

            .followed-header {
                flex-direction: column;
                gap: 1rem;
            }

            .followed-stats {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .followed-actions {
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

        <!-- Notification Settings Modal -->
        <div class="modal-overlay" id="notificationModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTitle">Paramètres de notification</h2>
                    <button class="modal-close" id="modalClose">&times;</button>
                </div>
                <div id="modalBody">
                    <!-- Settings will be inserted here -->
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
                    <input type="text" class="forum-search-bar" placeholder="Rechercher dans mes sujets suivis..." id="followedSearch">
                    <div class="forum-user-avatar">JS</div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="followed-container">
            <!-- Breadcrumb -->
            <div class="forum-breadcrumb">
                <a href="#">🏠 DevCommunity</a> > <a href="#">💬 Forum</a> > <span>🔔 Sujets suivis</span>
            </div>

            <!-- Page Header -->
            <div class="followed-header">
                <h1 class="followed-title">Sujets Suivis</h1>
                <p class="followed-subtitle">
                    Restez informé de l'évolution des discussions qui vous intéressent. 
                    Gérez vos notifications et ne manquez aucune mise à jour importante.
                </p>
            </div>

            <!-- Follow Summary -->
            <div class="follow-summary">
                <div class="summary-header">
                    <div class="summary-icon">🔔</div>
                    <div class="summary-info">
                        <h2 class="summary-title">Tableau de bord de suivi</h2>
                        <p class="summary-description">
                            Vue d'ensemble de votre activité de suivi avec notifications temps réel 
                            et gestion centralisée de vos préférences.
                        </p>
                    </div>
                </div>
                <div class="summary-stats">
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="totalFollowed">34</span>
                        <span class="summary-stat-label">Sujets suivis</span>
                        <span class="summary-stat-detail">Dans 8 catégories</span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="unreadUpdates">12</span>
                        <span class="summary-stat-label">Mises à jour</span>
                        <span class="summary-stat-detail">Non lues <span class="notification-badge">12</span></span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="todayActivity">8</span>
                        <span class="summary-stat-label">Activité aujourd'hui</span>
                        <span class="summary-stat-detail">Nouveaux messages</span>
                    </div>
                    <div class="summary-stat">
                        <span class="summary-stat-number" id="responseRate">94%</span>
                        <span class="summary-stat-label">Taux de participation</span>
                        <span class="summary-stat-detail">Dans vos sujets suivis</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" id="markAllReadBtn">
                    ✅ Marquer tout lu
                </button>
                <button class="action-btn secondary" id="notificationsBtn">
                    🔔 Gérer notifications
                </button>
                <button class="action-btn secondary" id="findTopicsBtn">
                    🔍 Découvrir nouveaux sujets
                </button>
                <button class="action-btn secondary" id="exportBtn">
                    📤 Exporter liste
                </button>
            </div>

            <!-- Status Filter Tabs -->
            <div class="status-filters">
                <button class="status-filter active" data-status="all">
                    🌐 Tous
                    <span class="status-count" id="allCount">34</span>
                </button>
                <button class="status-filter" data-status="updates">
                    🆕 Mises à jour
                    <span class="status-count" id="updatesCount">12</span>
                </button>
                <button class="status-filter" data-status="participating">
                    💬 Mes participations
                    <span class="status-count" id="participatingCount">18</span>
                </button>
                <button class="status-filter" data-status="watching">
                    👀 En observation
                    <span class="status-count" id="watchingCount">16</span>
                </button>
                <button class="status-filter" data-status="solved">
                    ✅ Résolus
                    <span class="status-count" id="solvedCount">8</span>
                </button>
            </div>

            <!-- Filters Section -->
            <div class="followed-filters">
                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Recherche</label>
                        <input type="text" class="filter-input" placeholder="Titre, auteur, catégorie..." id="searchFilter">
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
                        <label class="filter-label">Activité</label>
                        <select class="filter-select" id="activityFilter">
                            <option value="">Toute activité</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Tri</label>
                        <select class="filter-select" id="sortFilter">
                            <option value="recent-activity">Activité récente</option>
                            <option value="newest">Plus récent</option>
                            <option value="most-active">Plus actif</option>
                            <option value="alphabetical">Alphabétique</option>
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

            <!-- Followed Topics List -->
            <div class="followed-list" id="followedList">
                <!-- Topics will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn" id="prevPage" disabled>← Précédent</button>
                <div class="pagination-info">
                    Page <span id="currentPage">1</span> sur <span id="totalPages">4</span>
                </div>
                <button class="pagination-btn" id="nextPage">Suivant →</button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let currentStatus = 'all';
        let totalFollowed = 34;
        let followedPerPage = 10;
        let filteredTopics = [];
        let allFollowedTopics = [];

        // Sample followed topics data
        const followedTopicsData = [
            {
                id: 1,
                title: "Optimisation des performances React en production",
                author: "Marie Dubois",
                category: "javascript",
                categoryLabel: "JavaScript",
                followType: "participating",
                hasUpdates: true,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 2 heures",
                lastActivityType: "Nouvelle réponse",
                lastActivityContent: "Marie a ajouté une solution avec React.memo et useMemo...",
                newReplies: 3,
                totalReplies: 23,
                followers: 45,
                views: 1247,
                startedFollowing: new Date(Date.now() - 5 * 24 * 60 * 60 * 1000),
                preview: "Discussion approfondie sur l'optimisation des performances React avec des techniques avancées de mémorisation et de lazy loading."
            },
            {
                id: 2,
                title: "Architecture microservices avec Kubernetes",
                author: "Alexandre Chen",
                category: "devops",
                categoryLabel: "DevOps",
                followType: "watching",
                hasUpdates: true,
                isUrgent: true,
                isSolved: false,
                lastActivity: "Il y a 5 heures",
                lastActivityType: "Réponse d'expert",
                lastActivityContent: "Un expert en Kubernetes a partagé une solution détaillée...",
                newReplies: 5,
                totalReplies: 34,
                followers: 67,
                views: 2156,
                startedFollowing: new Date(Date.now() - 3 * 24 * 60 * 60 * 1000),
                preview: "Guide complet pour implémenter une architecture microservices robuste avec Kubernetes et les meilleures pratiques DevOps."
            },
            {
                id: 3,
                title: "Machine Learning avec TensorFlow pour débutants",
                author: "Sophie Laurent",
                category: "python",
                categoryLabel: "Python",
                followType: "participating",
                hasUpdates: false,
                isUrgent: false,
                isSolved: true,
                lastActivity: "Il y a 1 jour",
                lastActivityType: "Sujet résolu",
                lastActivityContent: "L'auteur a marqué la meilleure réponse comme solution...",
                newReplies: 0,
                totalReplies: 56,
                followers: 89,
                views: 3420,
                startedFollowing: new Date(Date.now() - 14 * 24 * 60 * 60 * 1000),
                preview: "Tutorial complet pour débuter en Machine Learning avec TensorFlow, de l'installation aux premiers modèles."
            },
            {
                id: 4,
                title: "Design System moderne avec Figma et Storybook",
                author: "Emma Wilson",
                category: "design",
                categoryLabel: "Design",
                followType: "watching",
                hasUpdates: true,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 8 heures",
                lastActivityType: "Nouvelle ressource",
                lastActivityContent: "Emma a partagé un template Figma complet...",
                newReplies: 2,
                totalReplies: 28,
                followers: 52,
                views: 1890,
                startedFollowing: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000),
                preview: "Construction d'un design system complet avec Figma pour la conception et Storybook pour la documentation."
            },
            {
                id: 5,
                title: "Sécurité des applications web : guide 2024",
                author: "Thomas Rodriguez",
                category: "javascript",
                categoryLabel: "JavaScript",
                followType: "participating",
                hasUpdates: true,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 12 heures",
                lastActivityType: "Discussion active",
                lastActivityContent: "Débat sur les nouvelles vulnérabilités XSS...",
                newReplies: 4,
                totalReplies: 41,
                followers: 78,
                views: 2734,
                startedFollowing: new Date(Date.now() - 2 * 24 * 60 * 60 * 1000),
                preview: "Guide exhaustif des bonnes pratiques de sécurité pour les applications web modernes en 2024."
            },
            {
                id: 6,
                title: "Flutter vs React Native : comparaison détaillée",
                author: "Lucas Martin",
                category: "mobile",
                categoryLabel: "Mobile",
                followType: "watching",
                hasUpdates: false,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 2 jours",
                lastActivityType: "Réponse utile",
                lastActivityContent: "Lucas a partagé son retour d'expérience sur Flutter...",
                newReplies: 0,
                totalReplies: 19,
                followers: 34,
                views: 1567,
                startedFollowing: new Date(Date.now() - 10 * 24 * 60 * 60 * 1000),
                preview: "Analyse comparative approfondie entre Flutter et React Native basée sur des projets réels."
            },
            {
                id: 7,
                title: "CI/CD avec GitHub Actions : bonnes pratiques",
                author: "Clara Petit",
                category: "devops",
                categoryLabel: "DevOps",
                followType: "participating",
                hasUpdates: true,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 6 heures",
                lastActivityType: "Question posée",
                lastActivityContent: "Vous avez posé une question sur l'optimisation...",
                newReplies: 1,
                totalReplies: 15,
                followers: 23,
                views: 892,
                startedFollowing: new Date(Date.now() - 1 * 24 * 60 * 60 * 1000),
                preview: "Mise en place d'une pipeline CI/CD robuste avec GitHub Actions pour des déploiements automatisés."
            },
            {
                id: 8,
                title: "PostgreSQL : optimisation des requêtes complexes",
                author: "Antoine Moreau",
                category: "python",
                categoryLabel: "Python",
                followType: "watching",
                hasUpdates: false,
                isUrgent: false,
                isSolved: true,
                lastActivity: "Il y a 3 jours",
                lastActivityType: "Sujet résolu",
                lastActivityContent: "Solution validée par l'auteur et la communauté...",
                newReplies: 0,
                totalReplies: 22,
                followers: 41,
                views: 1345,
                startedFollowing: new Date(Date.now() - 12 * 24 * 60 * 60 * 1000),
                preview: "Techniques avancées d'optimisation pour améliorer les performances des requêtes PostgreSQL complexes."
            },
            {
                id: 9,
                title: "Tests automatisés avec Jest et Cypress",
                author: "Léa Rousseau",
                category: "javascript",
                categoryLabel: "JavaScript",
                followType: "participating",
                hasUpdates: true,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 4 heures",
                lastActivityType: "Nouvelle réponse",
                lastActivityContent: "Léa a ajouté des exemples de tests e2e...",
                newReplies: 2,
                totalReplies: 18,
                followers: 36,
                views: 1123,
                startedFollowing: new Date(Date.now() - 4 * 24 * 60 * 60 * 1000),
                preview: "Guide complet pour mettre en place une stratégie de tests automatisés efficace avec Jest et Cypress."
            },
            {
                id: 10,
                title: "Accessibilité web : standards WCAG 2.1",
                author: "David Kim",
                category: "design",
                categoryLabel: "Design",
                followType: "watching",
                hasUpdates: false,
                isUrgent: false,
                isSolved: false,
                lastActivity: "Il y a 1 semaine",
                lastActivityType: "Mise à jour",
                lastActivityContent: "David a ajouté une checklist complète...",
                newReplies: 0,
                totalReplies: 12,
                followers: 28,
                views: 789,
                startedFollowing: new Date(Date.now() - 20 * 24 * 60 * 60 * 1000),
                preview: "Implémentation des standards d'accessibilité WCAG 2.1 pour créer des applications web inclusives."
            }
        ];

        // Initialize the page
        function init() {
            allFollowedTopics = [...followedTopicsData];
            filteredTopics = [...allFollowedTopics];
            
            showLoading();
            
            setTimeout(() => {
                setupEventListeners();
                animateStats();
                filterByStatus('all');
                renderFollowedTopics();
                hideLoading();
                showToast("🔔 Sujets suivis chargés avec succès !", 3000);
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
            document.getElementById('followedSearch').addEventListener('input', handleSearch);
            document.getElementById('searchFilter').addEventListener('input', handleSearch);
            
            // Filter functionality
            document.getElementById('categoryFilter').addEventListener('change', applyFilters);
            document.getElementById('activityFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);
            
            // Status filters
            document.querySelectorAll('.status-filter').forEach(filter => {
                filter.addEventListener('click', () => {
                    const status = filter.dataset.status;
                    switchStatusFilter(status);
                });
            });
            
            // Quick actions
            document.getElementById('markAllReadBtn').addEventListener('click', markAllAsRead);
            document.getElementById('notificationsBtn').addEventListener('click', openNotificationSettings);
            document.getElementById('findTopicsBtn').addEventListener('click', () => showToast('🔍 Redirection vers la découverte de sujets...'));
            document.getElementById('exportBtn').addEventListener('click', exportFollowedTopics);
            
            // Pagination
            document.getElementById('prevPage').addEventListener('click', () => changePage(currentPage - 1));
            document.getElementById('nextPage').addEventListener('click', () => changePage(currentPage + 1));
            
            // Modal functionality
            document.getElementById('modalClose').addEventListener('click', closeModal);
            document.getElementById('notificationModal').addEventListener('click', (e) => {
                if (e.target.id === 'notificationModal') closeModal();
            });
        }

        // Search functionality
        function handleSearch() {
            const followedSearchTerm = document.getElementById('followedSearch').value.toLowerCase();
            const filterSearchTerm = document.getElementById('searchFilter').value.toLowerCase();
            const searchTerm = followedSearchTerm || filterSearchTerm;
            
            if (searchTerm.length > 0) {
                filteredTopics = allFollowedTopics.filter(topic => 
                    topic.title.toLowerCase().includes(searchTerm) ||
                    topic.author.toLowerCase().includes(searchTerm) ||
                    topic.categoryLabel.toLowerCase().includes(searchTerm) ||
                    topic.preview.toLowerCase().includes(searchTerm)
                );
            } else {
                filteredTopics = [...allFollowedTopics];
            }
            
            // Sync search inputs
            document.getElementById('followedSearch').value = searchTerm;
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
                case 'updates':
                    filtered = allFollowedTopics.filter(topic => topic.hasUpdates);
                    break;
                case 'participating':
                    filtered = allFollowedTopics.filter(topic => topic.followType === 'participating');
                    break;
                case 'watching':
                    filtered = allFollowedTopics.filter(topic => topic.followType === 'watching');
                    break;
                case 'solved':
                    filtered = allFollowedTopics.filter(topic => topic.isSolved);
                    break;
                default:
                    filtered = [...allFollowedTopics];
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
            
            // Activity filter
            const activityFilter = document.getElementById('activityFilter').value;
            if (activityFilter) {
                const now = new Date();
                let cutoffDate;
                
                switch(activityFilter) {
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
                }
                
                if (cutoffDate) {
                    // Filter by recent activity (simplified - in real app would parse lastActivity)
                    filtered = filtered.filter(topic => {
                        const activityHours = parseInt(topic.lastActivity.match(/\d+/));
                        const activityUnit = topic.lastActivity.includes('heure') ? 'hours' : 
                                           topic.lastActivity.includes('jour') ? 'days' : 'weeks';
                        
                        const activityDate = new Date(now);
                        if (activityUnit === 'hours') {
                            activityDate.setHours(activityDate.getHours() - activityHours);
                        } else if (activityUnit === 'days') {
                            activityDate.setDate(activityDate.getDate() - activityHours);
                        } else {
                            activityDate.setDate(activityDate.getDate() - (activityHours * 7));
                        }
                        
                        return activityDate >= cutoffDate;
                    });
                }
            }
            
            // Sort
            const sortBy = document.getElementById('sortFilter').value;
            filtered.sort((a, b) => {
                switch (sortBy) {
                    case 'recent-activity':
                        // Simplified sorting by activity time
                        return a.lastActivity.localeCompare(b.lastActivity);
                    case 'newest':
                        return new Date(b.startedFollowing) - new Date(a.startedFollowing);
                    case 'most-active':
                        return b.totalReplies - a.totalReplies;
                    case 'alphabetical':
                        return a.title.localeCompare(b.title);
                    default:
                        return 0;
                }
            });
            
            filteredTopics = filtered;
            currentPage = 1;
            renderFollowedTopics();
        }

        // Render followed topics
        function renderFollowedTopics() {
            const startIndex = (currentPage - 1) * followedPerPage;
            const endIndex = startIndex + followedPerPage;
            const topicsToShow = filteredTopics.slice(startIndex, endIndex);
            
            const followedList = document.getElementById('followedList');
            followedList.innerHTML = '';
            
            if (topicsToShow.length === 0) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <div class="empty-icon">🔔</div>
                    <h3 class="empty-title">Aucun sujet suivi trouvé</h3>
                    <p class="empty-description">Commencez à suivre des sujets qui vous intéressent pour rester informé de leur évolution.</p>
                    <button class="action-btn" onclick="clearAllFilters()">🔄 Réinitialiser les filtres</button>
                `;
                followedList.appendChild(emptyState);
            } else {
                topicsToShow.forEach(topic => {
                    const topicItem = createFollowedTopicItem(topic);
                    followedList.appendChild(topicItem);
                });
            }
            
            updatePagination();
        }

        // Create followed topic item
        function createFollowedTopicItem(topic) {
            const item = document.createElement('div');
            let itemClasses = 'followed-item';
            
            if (topic.hasUpdates) itemClasses += ' has-updates';
            if (topic.isUrgent) itemClasses += ' urgent';
            if (topic.isSolved) itemClasses += ' solved';
            
            item.className = itemClasses;
            item.addEventListener('click', () => openTopic(topic));
            
            const followTypeBadge = getFollowTypeBadge(topic.followType);
            const activityContent = topic.hasUpdates ? 
                `<div class="followed-activity">
                    <div class="activity-header">
                        <span class="activity-type">${topic.lastActivityType}</span>
                        <span class="activity-time">${topic.lastActivity}</span>
                    </div>
                    <p class="activity-content">${topic.lastActivityContent}</p>
                </div>` : '';
            
            item.innerHTML = `
                <div class="followed-header">
                    <div class="followed-info">
                        <h3 class="followed-title">
                            ${topic.isSolved ? '✅ ' : ''}
                            ${topic.isUrgent ? '🚨 ' : ''}
                            ${topic.hasUpdates ? '🆕 ' : ''}
                            ${topic.title}
                            ${followTypeBadge}
                        </h3>
                        <div class="followed-meta">
                            <span class="followed-category">${topic.categoryLabel}</span>
                            <span>👤 ${topic.author}</span>
                            <span>👥 ${topic.followers} abonnés</span>
                            <span>👀 ${topic.views.toLocaleString()} vues</span>
                            ${topic.hasUpdates ? `<span class="update-indicator">${topic.newReplies} nouveau${topic.newReplies > 1 ? 'x' : ''}</span>` : ''}
                        </div>
                        <p class="followed-preview">${topic.preview}</p>
                    </div>
                    <div class="followed-stats">
                        <div class="followed-stat">
                            <div class="followed-stat-number">${topic.totalReplies}</div>
                            <div class="followed-stat-label">Réponses</div>
                        </div>
                        <div class="followed-stat">
                            <div class="followed-stat-number">${topic.followers}</div>
                            <div class="followed-stat-label">Abonnés</div>
                        </div>
                        <div class="followed-stat">
                            <div class="followed-stat-number">${topic.views}</div>
                            <div class="followed-stat-label">Vues</div>
                        </div>
                    </div>
                </div>
                ${activityContent}
                <div class="followed-actions">
                    <button class="followed-btn primary" onclick="openTopic(${topic.id}, event)">👀 Voir le sujet</button>
                    <button class="followed-btn" onclick="markAsRead(${topic.id}, event)">✅ Marquer lu</button>
                    <button class="followed-btn" onclick="configureNotifications(${topic.id}, event)">🔔 Notifications</button>
                    <button class="followed-btn danger" onclick="unfollowTopic(${topic.id}, event)">❌ Ne plus suivre</button>
                </div>
            `;
            
            return item;
        }

        // Get follow type badge
        function getFollowTypeBadge(followType) {
            switch(followType) {
                case 'participating':
                    return '<span class="follow-type-badge badge-participating">💬 Participant</span>';
                case 'watching':
                    return '<span class="follow-type-badge badge-watching">👀 Observateur</span>';
                case 'mentioned':
                    return '<span class="follow-type-badge badge-mentioned">@️ Mentionné</span>';
                default:
                    return '';
            }
        }

        // Utility functions
        function getStatusLabel(status) {
            const labels = {
                all: 'Tous',
                updates: 'Mises à jour',
                participating: 'Mes participations',
                watching: 'En observation',
                solved: 'Résolus'
            };
            return labels[status] || 'Tous';
        }

        function formatRelativeTime(date) {
            const now = new Date();
            const diff = now - date;
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            
            if (days === 0) return 'Aujourd\'hui';
            if (days === 1) return 'Hier';
            if (days < 7) return `Il y a ${days} jours`;
            return `Il y a ${Math.floor(days / 7)} semaine${Math.floor(days / 7) > 1 ? 's' : ''}`;
        }

        // Topic actions
        function openTopic(topicId, event) {
            if (event) event.stopPropagation();
            const topic = allFollowedTopics.find(t => t.id === topicId);
            showLoading();
            
            setTimeout(() => {
                // Mark as read when opening
                topic.hasUpdates = false;
                topic.newReplies = 0;
                hideLoading();
                renderFollowedTopics();
                updateStatusCounts();
                showToast(`👀 Ouverture : "${topic.title}"`);
                console.log('Opening topic:', topic.title);
            }, 600);
        }

        function markAsRead(topicId, event) {
            event.stopPropagation();
            const topic = allFollowedTopics.find(t => t.id === topicId);
            topic.hasUpdates = false;
            topic.newReplies = 0;
            renderFollowedTopics();
            updateStatusCounts();
            showToast(`✅ "${topic.title}" marqué comme lu`);
        }

        function markAllAsRead() {
            showLoading();
            setTimeout(() => {
                allFollowedTopics.forEach(topic => {
                    topic.hasUpdates = false;
                    topic.newReplies = 0;
                });
                hideLoading();
                renderFollowedTopics();
                updateStatusCounts();
                showToast('✅ Tous les sujets marqués comme lus !');
            }, 800);
        }

        function configureNotifications(topicId, event) {
            event.stopPropagation();
            const topic = allFollowedTopics.find(t => t.id === topicId);
            openNotificationModal(topic);
        }

        function openNotificationModal(topic) {
            const modal = document.getElementById('notificationModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            modalTitle.textContent = `Notifications : ${topic.title}`;
            
            modalBody.innerHTML = `
                <div style="margin-bottom: 2rem;">
                    <h3 style="color: #00d4ff; margin-bottom: 1rem;">Type de suivi actuel : ${getFollowTypeLabel(topic.followType)}</h3>
                    <p style="color: #b0b0b0; margin-bottom: 2rem;">Configurez vos préférences de notification pour ce sujet.</p>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #00ff88; margin-bottom: 1rem;">🔔 Notifications</h4>
                    <div style="margin-bottom: 1rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" checked style="width: 16px; height: 16px;">
                            <span>Nouvelles réponses</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" checked style="width: 16px; height: 16px;">
                            <span>Réponses acceptées</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" style="width: 16px; height: 16px;">
                            <span>Mentions de votre nom</span>
                        </label>
                    </div>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #00ff88; margin-bottom: 1rem;">📧 Méthodes</h4>
                    <div style="margin-bottom: 1rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" checked style="width: 16px; height: 16px;">
                            <span>Notifications web</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" style="width: 16px; height: 16px;">
                            <span>Email quotidien</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; cursor: pointer;">
                            <input type="checkbox" style="width: 16px; height: 16px;">
                            <span>Email instantané</span>
                        </label>
                    </div>
                </div>
                
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button class="followed-btn" onclick="closeModal()">❌ Annuler</button>
                    <button class="followed-btn primary" onclick="saveNotificationSettings(${topic.id})">💾 Enregistrer</button>
                </div>
            `;
            
            modal.classList.add('show');
            showToast(`🔔 Configuration des notifications`);
        }

        function openNotificationSettings() {
            openNotificationModal({ id: 0, title: 'Paramètres généraux', followType: 'watching' });
        }

        function saveNotificationSettings(topicId) {
            showLoading();
            setTimeout(() => {
                hideLoading();
                closeModal();
                showToast('💾 Paramètres de notification sauvegardés !');
            }, 800);
        }

        function getFollowTypeLabel(followType) {
            const labels = {
                participating: '💬 Participant actif',
                watching: '👀 Observateur',
                mentioned: '@️ Mentionné'
            };
            return labels[followType] || 'Observateur';
        }

        function closeModal() {
            document.getElementById('notificationModal').classList.remove('show');
        }

        function unfollowTopic(topicId, event) {
            event.stopPropagation();
            const topic = allFollowedTopics.find(t => t.id === topicId);
            
            if (confirm(`Êtes-vous sûr de vouloir ne plus suivre "${topic.title}" ?\n\nVous ne recevrez plus de notifications pour ce sujet.`)) {
                allFollowedTopics = allFollowedTopics.filter(t => t.id !== topicId);
                filteredTopics = filteredTopics.filter(t => t.id !== topicId);
                renderFollowedTopics();
                updateStatusCounts();
                showToast(`❌ Vous ne suivez plus "${topic.title}"`);
            }
        }

        function clearAllFilters() {
            document.getElementById('followedSearch').value = '';
            document.getElementById('searchFilter').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('activityFilter').value = '';
            document.getElementById('sortFilter').value = 'recent-activity';
            
            switchStatusFilter('all');
            showToast('🔄 Tous les filtres réinitialisés');
        }

        function exportFollowedTopics() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showToast('📤 Export terminé ! Liste des sujets suivis téléchargée.');
                console.log('Exporting followed topics to CSV');
            }, 1200);
        }

        // Update status counts
        function updateStatusCounts() {
            const updatesCount = allFollowedTopics.filter(t => t.hasUpdates).length;
            const participatingCount = allFollowedTopics.filter(t => t.followType === 'participating').length;
            const watchingCount = allFollowedTopics.filter(t => t.followType === 'watching').length;
            const solvedCount = allFollowedTopics.filter(t => t.isSolved).length;
            const totalCount = allFollowedTopics.length;
            
            document.getElementById('allCount').textContent = totalCount;
            document.getElementById('updatesCount').textContent = updatesCount;
            document.getElementById('participatingCount').textContent = participatingCount;
            document.getElementById('watchingCount').textContent = watchingCount;
            document.getElementById('solvedCount').textContent = solvedCount;
            
            // Update summary stats
            document.getElementById('totalFollowed').textContent = totalCount;
            document.getElementById('unreadUpdates').textContent = updatesCount;
        }

        // Pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredTopics.length / followedPerPage);
            
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredTopics.length / followedPerPage);
            
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderFollowedTopics();
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
                animateCounter('totalFollowed', 34);
                animateCounter('unreadUpdates', 12);
                animateCounter('todayActivity', 8);
                animatePercentage('responseRate', 94);
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
                document.getElementById('followedSearch').focus();
                showToast('🔍 Recherche activée');
            }
            
            // Escape to close modal
            if (e.key === 'Escape') {
                closeModal();
            }
            
            // M for mark all read
            if (e.key === 'm' && !e.ctrlKey && !e.metaKey) {
                if (document.activeElement.tagName !== 'INPUT') {
                    e.preventDefault();
                    markAllAsRead();
                }
            }
        });
    </script>
</body>
</html>