<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnica</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #01041180 0%, #04c8e280 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            
            --dark-bg: #0f0f23;
            --dark-secondary: #1a1a35;
            --dark-tertiary: #252547;
            --dark-card: #2a2a4a;
            
            --text-primary: #ffffff;
            --text-secondary: #e2e8f0;
            --text-muted: #94a3b8;
            --text-accent: #667eea;
            
            --border-primary: rgba(255, 255, 255, 0.1);
            --border-secondary: rgba(255, 255, 255, 0.05);
            --surface-primary: rgba(255, 255, 255, 0.05);
            --surface-secondary: rgba(255, 255, 255, 0.02);
            
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.2);
            --shadow-xl: 0 15px 35px rgba(0, 0, 0, 0.25);
            
            --border-radius: 16px;
            --border-radius-sm: 8px;
            --border-radius-lg: 24px;
            
            --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            
            --sidebar-width: 320px;
            --sidebar-collapsed-width: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* SCROLLBAR STYLING */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-gradient);
        }

        /* LAYOUT PRINCIPAL */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark-secondary);
            position: fixed;
            /* top:60px; */
            height: 100vh;
            z-index: 1000;
            overflow-y: auto;
            transition: all var(--transition-normal);
            border-right: 1px solid var(--border-primary);
            backdrop-filter: blur(20px);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-primary);
            position: relative;
        }

        .sidebar-toggle {
            position: absolute;
            top: 24px;
            right: 5px;
            width: 36px;
            height: 36px;
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius-sm);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-normal);
            z-index: 1001;
        }

        .sidebar-toggle:hover {
            background: var(--surface-secondary);
            color: var(--text-accent);
            transform: scale(1.05);
        }

        .sidebar.collapsed .sidebar-toggle {
            right: 12px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            transition: all var(--transition-normal);
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: green;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
        }

        .logo:hover .logo-icon {
            transform: rotate(5deg) scale(1.05);
        }

        .logo-text {
            background: white;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            white-space: nowrap;
            transition: all var(--transition-normal);
        }

        .sidebar.collapsed .logo-text {
            opacity: 0;
            transform: translateX(-20px);
        }

        /* ADMIN INFO */
        .admin-info {
            margin-top: 24px;
            padding: 20px;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
        }

        .sidebar.collapsed .admin-info {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .admin-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--text-primary);
            box-shadow: var(--shadow-sm);
            flex-shrink: 0;
        }

        .admin-details h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .admin-role {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .admin-actions {
            display: flex;
            gap: 8px;
        }

        .admin-btn {
            flex: 1;
            padding: 8px 12px;
            background: var(--surface-secondary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius-sm);
            color: var(--text-secondary);
            font-size: 0.8rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            text-decoration: none;
            text-align: center;
        }

        .admin-btn:hover {
            background: var(--surface-primary);
            color: var(--text-accent);
            transform: translateY(-2px);
        }

        /* NAVIGATION */
        .sidebar-nav {
            padding: 24px 0;
        }

        .nav-section {
            margin-bottom: 32px;
        }

        .nav-section-title {
            padding: 0 24px 12px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all var(--transition-normal);
        }

        .sidebar.collapsed .nav-section-title {
            opacity: 0;
            transform: translateX(-20px);
        }

        .nav-item {
            margin: 4px 16px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 16px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleY(0);
            transition: transform var(--transition-normal);
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link:hover {
            background: var(--surface-primary);
            color: var(--text-primary);
            transform: translateX(8px);
        }

        .nav-link.active {
            background: rgba(102, 126, 234, 0.1);
            color: var(--text-accent);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .nav-icon {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
            transition: all var(--transition-normal);
        }

        .nav-text {
            font-weight: 500;
            white-space: nowrap;
            transition: all var(--transition-normal);
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
            transform: translateX(-20px);
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.1);
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left var(--transition-normal);
            min-height: 100vh;
            background: var(--dark-bg);
        }

        .sidebar.collapsed + .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* HEADER */
        .dashboard-header {
            background: var(--dark-secondary);
            padding: 24px 32px;
            border-bottom: 1px solid var(--border-primary);
            backdrop-filter: blur(20px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .header-left h1 {
            font-size: 2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .header-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .header-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            width: 44px;
            height: 44px;
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-normal);
        }

        .notification-btn:hover {
            background: var(--surface-secondary);
            color: var(--text-accent);
            transform: translateY(-2px);
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            width: 20px;
            height: 20px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            border: 2px solid var(--dark-secondary);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* CONTENT WRAPPER */
        .content-wrapper {
            padding: 32px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* MAIN CONTENT GRID */
        .main-content-grid {
            display: flex;
            flex-direction: column;
            gap: 4rem;
        }

        /* SECTIONS STYLING */
        .section-container {
            width: 100%;
            opacity: 1;
            transform: translateY(0);
        }

        .section-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* FILTERS */
        .filters-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }

        .filter-button {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--border-primary);
            background: var(--surface-primary);
            color: var(--text-secondary);
            border-radius: 50px;
            cursor: pointer;
            transition: all var(--transition-normal);
            font-weight: 500;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .filter-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--accent-gradient);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .filter-button:hover::before,
        .filter-button.active::before {
            left: 0;
        }

        .filter-button:hover,
        .filter-button.active {
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* DOCUMENTS SECTION */
        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .document-card {
            background: var(--dark-secondary);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            overflow: hidden;
            opacity: 1;
            transform: translateY(0);
        }

        .document-card.animate-in {
            opacity: 0;
            transform: translateY(30px);
            animation: cardReveal 0.6s ease-out forwards;
        }

        .document-card.animate-in:nth-child(1) { animation-delay: 0.1s; }
        .document-card.animate-in:nth-child(2) { animation-delay: 0.2s; }
        .document-card.animate-in:nth-child(3) { animation-delay: 0.3s; }
        .document-card.animate-in:nth-child(4) { animation-delay: 0.4s; }

        @keyframes cardReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .document-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--text-accent);
        }

        .document-header {
            padding: 1.5rem;
            background: var(--surface-primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-primary);
        }

        .document-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .document-icon.pdf {
            background: var(--danger-gradient);
        }

        .document-icon.doc {
            background: var(--accent-gradient);
        }

        .document-icon.form {
            background: var(--success-gradient);
        }

        .document-icon.certificate {
            background: var(--warning-gradient);
        }

        .document-badge {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.25rem;
        }

        .badge-text {
            background: var(--secondary-gradient);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-size {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .document-content {
            padding: 1.5rem;
        }

        .document-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .document-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .document-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .document-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn-primary,
        .btn-secondary {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            flex: 1;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border-primary);
        }

        .btn-secondary:hover {
            background: var(--surface-primary);
            color: var(--text-primary);
            border-color: var(--text-accent);
        }

        /* PROGRAMMING SECTION */
        .programming-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .programming-card {
            background: var(--dark-secondary);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            overflow: hidden;
            opacity: 1;
            transform: translateY(0);
        }

        .programming-card.animate-in {
            opacity: 0;
            transform: translateY(30px);
            animation: cardReveal 0.6s ease-out forwards;
        }

        .programming-card.animate-in:nth-child(1) { animation-delay: 0.1s; }
        .programming-card.animate-in:nth-child(2) { animation-delay: 0.2s; }
        .programming-card.animate-in:nth-child(3) { animation-delay: 0.3s; }
        .programming-card.animate-in:nth-child(4) { animation-delay: 0.4s; }

        .programming-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--text-accent);
        }

        .programming-header {
            padding: 1.5rem;
            background: var(--dark-card);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .language-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
            color: white;
        }

        .language-badge.javascript {
            background: linear-gradient(135deg, #f7df1e 0%, #e6c200 100%);
            color: #1e293b;
        }

        .language-badge.python {
            background: linear-gradient(135deg, #3776ab 0%, #2d5a8c 100%);
        }

        .language-badge.php {
            background: linear-gradient(135deg, #777bb4 0%, #5e6b9d 100%);
        }

        .language-badge.react {
            background: linear-gradient(135deg, #61dafb 0%, #21a1c4 100%);
            color: #1e293b;
        }

        .difficulty-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
            color: white;
        }

        .difficulty-badge.beginner {
            background: var(--success-gradient);
        }

        .difficulty-badge.intermediate {
            background: var(--warning-gradient);
            color: #1e293b;
        }

        .difficulty-badge.advanced {
            background: var(--danger-gradient);
        }

        .programming-content {
            padding: 1.5rem;
        }

        .programming-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .programming-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .programming-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .programming-tags .tag {
            background: var(--surface-primary);
            color: var(--text-secondary);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid var(--border-primary);
        }

        .programming-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .programming-actions {
            display: flex;
            gap: 0.75rem;
        }

        /* COURSE CONTENT GRID */
        .course-content-grid {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 2rem;
            align-items: start;
        }

        .course-content {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 32px;
            border: 1px solid var(--border-primary);
        }

        .generalite {
            max-width: none;
        }

        .titre {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 24px;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .generalite ol {
            margin-top: 24px;
            padding-left: 24px;
        }

        .generalite ol li {
            margin-bottom: 16px;
            font-size: 1.1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* COURSE SIDEBAR */
        .course-sidebar {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 24px;
            border: 1px solid var(--border-primary);
            position: sticky;
            top: 120px;
            max-height: calc(100vh - 160px);
            overflow-y: auto;
        }

        .course-sidebar h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 24px;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .course-nav {
            margin: 0;
            padding: 0;
        }

        .course-nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .course-nav > ul > li {
            margin-bottom: 8px;
        }

        .course-nav a {
            display: block;
            padding: 12px 16px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: all var(--transition-normal);
            font-weight: 500;
        }

        .course-nav > ul > li > a {
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .course-nav > ul > li > a:hover {
            background: var(--surface-secondary);
            color: var(--text-primary);
            transform: translateX(4px);
        }

        .course-nav ul ul {
            margin-top: 8px;
            padding-left: 16px;
        }

        .course-nav ul ul a {
            font-size: 0.9rem;
            padding: 8px 12px;
            color: var(--text-muted);
        }

        .course-nav ul ul a:hover {
            background: var(--surface-primary);
            color: var(--text-secondary);
        }

        .course-nav ul ul a::before {
            content: '→';
            margin-right: 8px;
            opacity: 0;
            transition: all var(--transition-normal);
        }

        .course-nav ul ul a:hover::before {
            opacity: 1;
            transform: translateX(4px);
        }

        /* MOBILE RESPONSIVENESS */
        @media (max-width: 1024px) {
            .course-content-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .course-sidebar {
                position: static;
                max-height: none;
                order: 2;
            }

            .course-content {
                order: 1;
            }

            .documents-grid,
            .programming-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 2000;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.collapsed + .main-content {
                margin-left: 0;
            }

            .dashboard-header {
                padding: 16px 20px;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .header-left h1 {
                font-size: 1.5rem;
            }

            .content-wrapper {
                padding: 20px;
            }

            .course-content {
                padding: 24px 20px;
            }

            .titre {
                font-size: 1.5rem;
            }

            .course-content-grid {
                grid-template-columns: 1fr;
            }

            .mobile-menu-btn {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 2001;
                width: 44px;
                height: 44px;
                background: var(--primary-gradient);
                border: none;
                border-radius: var(--border-radius);
                color: white;
                font-size: 1.2rem;
                cursor: pointer;
                box-shadow: var(--shadow-lg);
                transition: all var(--transition-normal);
            }

            .mobile-menu-btn:hover {
                transform: scale(1.05);
            }

            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1999;
                opacity: 0;
                visibility: hidden;
                transition: all var(--transition-normal);
            }

            .mobile-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .filters-container {
                gap: 0.5rem;
            }

            .filter-button {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
            }

            .document-actions,
            .programming-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .btn-primary,
            .btn-secondary {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }

            .programming-meta {
                justify-content: space-between;
            }

            .programming-tags {
                gap: 0.25rem;
            }

            .programming-tags .tag {
                font-size: 0.7rem;
                padding: 0.25rem 0.5rem;
            }
        }

        .mobile-menu-btn {
            display: none;
        }

        /* ANIMATIONS */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slide-in {
            animation: slideInLeft 0.5s ease-out;
        }

        /* LOADING STATE */
        .loading {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--border-primary);
            border-top: 4px solid var(--text-accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* TOOLTIP */
        .tooltip {
            position: relative;
        }

        .tooltip::after {
            content: attr(data-tooltip);
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 8px;
            padding: 8px 12px;
            background: var(--dark-card);
            color: var(--text-primary);
            font-size: 0.8rem;
            border-radius: var(--border-radius-sm);
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition-normal);
            z-index: 1000;
            border: 1px solid var(--border-primary);
        }

        .tooltip:hover::after {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
            

    <div class="dashboard-container">
        
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <button class="sidebar-toggle" id="sidebarToggle" data-tooltip="Réduire le menu">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="logo-text">Learnica</span>
                </div>
                
                <div class="admin-info">
                    <div class="admin-profile">
                        <div class="admin-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="admin-details">
                            <h4>Apalo Coulibaly</h4>
                            <span class="admin-role">Utilisateur</span>
                        </div>
                    </div>
                    <div class="admin-actions">
                        <a href="#" class="admin-btn">
                            <i class="fas fa-cog"></i>
                            <span>Profil</span>
                        </a>
                        <a href="#" class="admin-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sortie</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Principal</div>
                    <div class="nav-item">
                        <a href="#dashboard" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#course" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <span class="nav-text">Cours</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#performances" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <span class="nav-text">Mes performances</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="/monblug/simplecodeur" class="nav-link">
                            📝
                            <span class="nav-text">Examens & QCM</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Contenu</div>
                    <div class="nav-item">
                        <a href="#articles" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <span class="nav-text">Articles</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#articles" class="nav-link">
                            <span class="dp-icon">🎓</span> Tutoriels pratiques
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#documents" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <span class="nav-text">Documents</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#programming" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <span class="nav-text">Programmation</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#categories" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <span class="nav-text">Catégories</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#comments" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <span class="nav-text">Commentaires</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Système</div>
                    <div class="nav-item">
                        <a href="#settings" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <span class="nav-text">Paramètres</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#analytics" class="nav-link">
                            <i class="nav-icon fas fa-analytics"></i>
                            <span class="nav-text">Analytics</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#help" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <span class="nav-text">Aide</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            
            <!-- Header -->
            <!-- <header class="dashboard-header">
                <div class="header-content">
                    <div class="header-left">
                        <h1>Tableau de Bord</h1>
                        <p class="header-subtitle">Gérez votre contenu et vos ressources</p>
                    </div>
                    <div class="header-actions">
                        <button class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                    </div>
                </div>
            </header> -->

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                
                <!-- Main Content Grid -->
                <div class="main-content-grid">
                    
                    <!-- Documents Section -->
                    <section class="section-container" id="documents-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-file-alt"></i>
                                Bibliothèque de Documents
                            </h2>
                            <p class="section-subtitle">Téléchargez nos guides, templates et documents officiels</p>
                        </div>
                    
                    <!-- <div class="filters-container">
                        <button class="filter-button active" data-doc-filter="all">
                            <i class="fas fa-th-large"></i> Tous les documents
                        </button>
                        <button class="filter-button" data-doc-filter="guides">
                            <i class="fas fa-book-open"></i> Guides PDF
                        </button>
                        <button class="filter-button" data-doc-filter="templates">
                            <i class="fas fa-file-contract"></i> Templates
                        </button>
                        <button class="filter-button" data-doc-filter="forms">
                            <i class="fas fa-wpforms"></i> Formulaires
                        </button>
                        <button class="filter-button" data-doc-filter="certificates">
                            <i class="fas fa-certificate"></i> Certificats
                        </button>
                    </div> -->

                    <div class="documents-grid">
                        <!-- Document 1 -->
                        <div class="document-card" data-doc-category="guides">
                            <div class="document-header">
                                <div class="document-icon pdf">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="document-badge">
                                    <span class="badge-text">PDF</span>
                                    <span class="badge-size">2.5 MB</span>
                                </div>
                            </div>
                            <div class="document-content">
                                <h3 class="document-title">Guide Complet de la Carte Grise</h3>
                                <p class="document-description">Manuel détaillé avec toutes les étapes pour obtenir votre carte grise rapidement et sans erreur.</p>
                                <div class="document-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Mis à jour le 15/07/2025</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-download"></i>
                                        <span>1,234 téléchargements</span>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-primary">
                                        <i class="fas fa-download"></i> Télécharger
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-eye"></i> Aperçu
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Document 2 -->
                        <div class="document-card" data-doc-category="templates">
                            <div class="document-header">
                                <div class="document-icon doc">
                                    <i class="fas fa-file-word"></i>
                                </div>
                                <div class="document-badge">
                                    <span class="badge-text">DOCX</span>
                                    <span class="badge-size">156 KB</span>
                                </div>
                            </div>
                            <div class="document-content">
                                <h3 class="document-title">Template Lettre de Cession</h3>
                                <p class="document-description">Modèle officiel de lettre de cession de véhicule, prêt à remplir et personnaliser.</p>
                                <div class="document-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Mis à jour le 14/07/2025</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-download"></i>
                                        <span>856 téléchargements</span>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-primary">
                                        <i class="fas fa-download"></i> Télécharger
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-edit"></i> Éditer en ligne
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Document 3 -->
                        <div class="document-card" data-doc-category="forms">
                            <div class="document-header">
                                <div class="document-icon form">
                                    <i class="fas fa-wpforms"></i>
                                </div>
                                <div class="document-badge">
                                    <span class="badge-text">PDF</span>
                                </div>
                            </div>
                            <div class="document-content">
                                <h3 class="document-title">Formulaire Cerfa 13750*05</h3>
                                <p class="document-description">Demande de certificat d'immatriculation d'un véhicule neuf ou d'occasion.</p>
                                <div class="document-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Version officielle 2025</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-download"></i>
                                        <span>2,156 téléchargements</span>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-primary">
                                        <i class="fas fa-download"></i> Télécharger
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-fill-drip"></i> Pré-remplir
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Document 4 -->
                        <div class="document-card" data-doc-category="certificates">
                            <div class="document-header">
                                <div class="document-icon certificate">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="document-badge">
                                    <span class="badge-text">PDF</span>
                                    <span class="badge-size">892 KB</span>
                                </div>
                            </div>
                            <div class="document-content">
                                <h3 class="document-title">Certificat de Conformité</h3>
                                <p class="document-description">Modèle de certificat de conformité européen pour véhicules importés.</p>
                                <div class="document-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Mis à jour le 12/07/2025</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-download"></i>
                                        <span>567 téléchargements</span>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-primary">
                                        <i class="fas fa-download"></i> Télécharger
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-info-circle"></i> Infos
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
                <div>
                    <a href="/documents" class="dp-cta-button">
                        <span>🚀 Obtenir plus de document </span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Programming Articles Section -->
                <section class="section-container" id="programming-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-code"></i>
                            Decouvrez nos formations en Programmation et nos pack de formation
                        </h2>
                        <p class="section-subtitle">Découvrez des packs de tutoriels, de document pdf et guides sur les langages de programmation dans toutes les plateforme(Mobile, web et desktop).</p>
                    </div>
                    
                    <!-- <div class="filters-container">
                        <button class="filter-button active" data-prog-filter="all">
                            <i class="fas fa-th-large"></i> Tous les langages
                        </button>
                        <button class="filter-button" data-prog-filter="javascript">
                            <i class="fab fa-js-square"></i> JavaScript
                        </button>
                        <button class="filter-button" data-prog-filter="python">
                            <i class="fab fa-python"></i> Python
                        </button>
                        <button class="filter-button" data-prog-filter="php">
                            <i class="fab fa-php"></i> PHP
                        </button>
                        <button class="filter-button" data-prog-filter="react">
                            <i class="fab fa-react"></i> React
                        </button>
                    </div> -->

                    <div class="programming-grid">
                        <!-- Programming Article 1 -->
                        <article class="programming-card" data-prog-category="javascript">
                            <div class="programming-header">
                                <div class="language-badge javascript">
                                    <i class="fab fa-js-square"></i>
                                    <span>JavaScript</span>
                                </div>
                                <div class="difficulty-badge intermediate">
                                    <i class="fas fa-signal"></i>
                                    <span>Intermédiaire</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Developpement d'application web</h3>
                                <p class="programming-description">Devenez un developpeur d'application web pour booster votre compétece en developpement d'application.</p>
                                <div class="programming-tags">
                                    <span class="tag">ES6+</span>
                                    <span class="tag">Async</span>
                                    <span class="tag">API</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>15 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>12 exemples</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.8/5</span>
                                    </div>
                                </div>
                                <div class="programming-actions">
                                    <a href="#" class="btn-primary">
                                        En savoir plus  <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <!-- <a href="#" class="btn-secondary">
                                        <i class="fab fa-github"></i> Code source
                                    </a> -->
                                </div>
                            </div>
                        </article>
                        <article class="programming-card" data-prog-category="javascript">
                            <div class="programming-header">
                                <div class="language-badge javascript" style="background-color:blue">
                                    <i class="fab fa-fl-square"></i>
                                    <span >Flutter</span>
                                </div>
                                <div class="difficulty-badge intermediate">
                                    <i class="fas fa-signal"></i>
                                    <span>Intermédiaire</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Pack complet de formation flutter(dévéloppement d'application mobile Android et IOS)</h3>
                                <p class="programming-description">Un pack complet de formation en developpement d'application mobile flutter avec videos complet en français.</p>
                                <div class="programming-tags">
                                    <span class="tag">1.3k</span>
                                    <span class="tag">Prix bas</span>
                                    <span class="tag">⭐⭐⭐⭐</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>15 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>12 exemples</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.8/5</span>
                                    </div>
                                </div>
                                <div class="programming-actions">
                                    <a href="#" class="btn-secondary" style="background-color:green">
                                        <i class="fas fa-shopping-cart"></i> Acheter maintenant $8.99
                                    </a>
                                    <!-- <a href="#" class="btn-secondary">
                                        <i class="fab fa-github"></i> Code source</i>
                                    </a> -->
                                </div>
                            </div>
                        </article>

                        <article class="programming-card" data-prog-category="javascript">
                            <div class="programming-header">
                                <div class="language-badge " style="background-color:blue">
                                    <i class="fab fa-fl-square"></i>
                                    <span >Developpement d'application web</span>
                                </div>
                                <div class="difficulty-badge intermediate">
                                    <i class="fas fa-signal"></i>
                                    <span>Intermédiaire</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Pack complet de formation en dévéloppement d'application web</h3>
                                <p class="programming-description">Un pack complet de dévéloppement d'application web du début jusqu'à l'héberment.</p>
                                <div class="programming-tags">
                                    <span class="tag">1.3k</span>
                                    <span class="tag">Prix bas</span>
                                    <span class="tag">⭐⭐⭐⭐</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>15 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>12 exemples</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.8/5</span>
                                    </div>
                                </div>
                                <div class="programming-actions">
                                    <a href="#" class="btn-secondary" style="background-color:green">
                                        <i class="fas fa-shopping-cart"></i> Acheter maintenant $4.89
                                    </a>
                                    <!-- <a href="#" class="btn-secondary">
                                        <i class="fab fa-github"></i> Code source
                                    </a> -->
                                </div>
                            </div>
                        </article>

                        <!-- Programming Article 2 -->
                        <article class="programming-card" data-prog-category="python">
                            <div class="programming-header">
                                <div class="language-badge python">
                                    <i class="fab fa-python"></i>
                                    <span>Python</span>
                                </div>
                                <div class="difficulty-badge beginner">
                                    <i class="fas fa-seedling"></i>
                                    <span>Débutant</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Django pour les Débutants</h3>
                                <p class="programming-description">Créez votre première application web avec Django en suivant ce tutoriel step-by-step.</p>
                                <div class="programming-tags">
                                    <span class="tag">Django</span>
                                    <span class="tag">Web</span>
                                    <span class="tag">MVC</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>25 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>8 projets</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.9/5</span>
                                    </div>
                                </div>
                                <div class="programming-actions">
                                    <a href="#" class="btn-secondary" style="background-color:gray; color: black;">
                                        <i class="fas fa-play"></i> Non disponible
                                    </a>
                                    <a href="#" class="btn-secondary">
                                        <i class="fas fa-download"></i> Ressources
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Programming Article 3 -->
                        <article class="programming-card" data-prog-category="react">
                            <div class="programming-header">
                                <div class="language-badge react">
                                    <i class="fab fa-react"></i>
                                    <span>React</span>
                                </div>
                                <div class="difficulty-badge advanced">
                                    <i class="fas fa-rocket"></i>
                                    <span>Avancé</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Optimisation Performance React</h3>
                                <p class="programming-description">Techniques avancées pour optimiser les performances de vos applications React en production.</p>
                                <div class="programming-tags">
                                    <span class="tag">Performance</span>
                                    <span class="tag">Hooks</span>
                                    <span class="tag">Optimization</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>30 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>15 techniques</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.7/5</span>
                                    </div>
                                </div>
                               <div class="programming-actions">
                                    <a href="#" class="btn-secondary" style="background-color:gray; color: black;">
                                        <i class="fas fa-play"></i> Non disponible
                                    </a>
                                    <a href="#" class="btn-secondary">
                                        <i class="fas fa-download"></i> Ressources
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Programming Article 4 -->
                        <article class="programming-card" data-prog-category="php">
                            <div class="programming-header">
                                <div class="language-badge php">
                                    <i class="fab fa-php"></i>
                                    <span>PHP</span>
                                </div>
                                <div class="difficulty-badge intermediate">
                                    <i class="fas fa-signal"></i>
                                    <span>Intermédiaire</span>
                                </div>
                            </div>
                            <div class="programming-content">
                                <h3 class="programming-title">Laravel : API RESTful Complète</h3>
                                <p class="programming-description">Construisez une API RESTful robuste avec Laravel, incluant authentification et tests.</p>
                                <div class="programming-tags">
                                    <span class="tag">Laravel</span>
                                    <span class="tag">API</span>
                                    <span class="tag">REST</span>
                                </div>
                                <div class="programming-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>45 min de lecture</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-code"></i>
                                        <span>20 endpoints</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>4.6/5</span>
                                    </div>
                                </div>
                                <div class="programming-actions">
                                    <a href="#" class="btn-primary">
                                        <i class="fas fa-play"></i> Reserver ma place
                                    </a>
                                    <a href="#" class="btn-secondary">
                                        <i class="fas fa-vial"></i> Tests
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Course Information Section -->
                <section class="section-container" id="course-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-graduation-cap"></i>
                            Cours d'Informatique
                        </h2>
                        <p class="section-subtitle">Apprenez les bases de l'informatique avec notre cours complet</p>
                    </div>
                    
                    <div class="course-content-grid">
                        <!-- Course Sidebar -->
                        <aside class="course-sidebar animate-slide-in">
                            <h3>
                                📚 Sommaire du cours
                            </h3>
                            <nav class="course-nav">
                                <ul>
                                    <li>
                                        <a href="#module1">🖥️ 1. Introduction à l'informatique</a>
                                        <ul>
                                            <li><a href="#m1-1">Qu'est-ce que l'informatique ?</a></li>
                                            <li><a href="#m1-2">Histoire brève</a></li>
                                            <li><a href="#m1-3">Domaines d'application</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module2">💻 2. L'ordinateur et ses composants</a>
                                        <ul>
                                            <li><a href="#m2-1">Types d'ordinateurs</a></li>
                                            <li><a href="#m2-2">Matériel (hardware)</a></li>
                                            <li><a href="#m2-3">Logiciel (software)</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module3">🧑‍💻 3. Utilisation de base</a>
                                        <ul>
                                            <li><a href="#m3-1">Allumer / Éteindre</a></li>
                                            <li><a href="#m3-2">Bureau & fenêtres</a></li>
                                            <li><a href="#m3-3">Clavier & souris</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module4">📄 4. Bureautique</a>
                                        <ul>
                                            <li><a href="#m4-1">Word</a></li>
                                            <li><a href="#m4-2">Excel</a></li>
                                            <li><a href="#m4-3">PowerPoint</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module5">🌐 5. Internet & Web</a>
                                        <ul>
                                            <li><a href="#m5-1">Navigateur</a></li>
                                            <li><a href="#m5-2">Recherche & e-mail</a></li>
                                            <li><a href="#m5-3">Télécharger</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module6">🔐 6. Sécurité numérique</a>
                                        <ul>
                                            <li><a href="#m6-1">Mots de passe</a></li>
                                            <li><a href="#m6-2">Antivirus</a></li>
                                            <li><a href="#m6-3">Arnaques (phishing)</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module7">🛠️ 7. Outils numériques</a>
                                        <ul>
                                            <li><a href="#m7-1">WhatsApp Web</a></li>
                                            <li><a href="#m7-2">Cloud</a></li>
                                            <li><a href="#m7-3">Scanner / Imprimer</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module8">👨‍🏫 8. Programmation (optionnel)</a>
                                        <ul>
                                            <li><a href="#m8-1">Langages</a></li>
                                            <li><a href="#m8-2">Algorithmes</a></li>
                                            <li><a href="#m8-3">Scratch / Python</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#module9">📊 9. Évaluation</a>
                                        <ul>
                                            <li><a href="#m9-1">Mini projet</a></li>
                                            <li><a href="#m9-2">Exercices</a></li>
                                            <li><a href="#m9-3">Quiz</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#module10">📈 Bonus : Apprendre +</a></li>
                                </ul>
                            </nav>
                        </aside>

                        <!-- Course Content -->
                        <div class="course-content">
                            <div class="generalite">
                                <h3 class="titre">Généralité sur l'informatique</h3>
                                <ol>
                                    <li>Définition de l'informatique</li>
                                    <li>Histoire et évolution</li>
                                    <li>Impact sur la société moderne</li>
                                    <li>Perspectives d'avenir</li>
                                </ol>
                                
                                <div style="margin-top: 32px; display: flex; gap: 16px; flex-wrap: wrap;">
                                    <button class="btn-primary">
                                        <i class="fas fa-play"></i>
                                        Commencer le cours
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-bookmark"></i>
                                        Sauvegarder
                                    </button>
                                    <button class="btn-secondary">
                                        <i class="fas fa-share"></i>
                                        Partager
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        // État de l'application
        const appState = {
            sidebarCollapsed: false,
            mobileMenuOpen: false
        };

        // Éléments DOM
        const elements = {
            sidebar: document.getElementById('sidebar'),
            sidebarToggle: document.getElementById('sidebarToggle'),
            mobileMenuBtn: document.getElementById('mobileMenuBtn'),
            mobileOverlay: document.getElementById('mobileOverlay'),
            mainContent: document.querySelector('.main-content')
        };

        // Gestion de la sidebar
        function toggleSidebar() {
            appState.sidebarCollapsed = !appState.sidebarCollapsed;
            elements.sidebar.classList.toggle('collapsed', appState.sidebarCollapsed);
            
            // Mise à jour de l'icône du bouton
            const icon = elements.sidebarToggle.querySelector('i');
            icon.className = appState.sidebarCollapsed ? 'fas fa-chevron-right' : 'fas fa-chevron-left';
            
            // Mise à jour du tooltip
            elements.sidebarToggle.setAttribute(
                'data-tooltip', 
                appState.sidebarCollapsed ? 'Étendre le menu' : 'Réduire le menu'
            );
            
            // Sauvegarde de l'état
            localStorage.setItem('sidebarCollapsed', appState.sidebarCollapsed);
            
            // Animation de feedback
            elements.sidebar.style.transform = 'scale(0.98)';
            setTimeout(() => {
                elements.sidebar.style.transform = 'scale(1)';
            }, 150);
        }

        // Gestion du menu mobile
        function toggleMobileMenu() {
            appState.mobileMenuOpen = !appState.mobileMenuOpen;
            elements.sidebar.classList.toggle('mobile-open', appState.mobileMenuOpen);
            elements.mobileOverlay.classList.toggle('active', appState.mobileMenuOpen);
            
            // Prévenir le scroll du body
            document.body.style.overflow = appState.mobileMenuOpen ? 'hidden' : '';
            
            // Mise à jour de l'icône
            const icon = elements.mobileMenuBtn.querySelector('i');
            icon.className = appState.mobileMenuOpen ? 'fas fa-times' : 'fas fa-bars';
        }

        // Fermer le menu mobile
        function closeMobileMenu() {
            if (appState.mobileMenuOpen) {
                appState.mobileMenuOpen = false;
                elements.sidebar.classList.remove('mobile-open');
                elements.mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
                
                const icon = elements.mobileMenuBtn.querySelector('i');
                icon.className = 'fas fa-bars';
            }
        }

        // Gestion de la navigation
        function handleNavigation(event) {
            event.preventDefault();
            
            // Retirer la classe active de tous les liens
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Ajouter la classe active au lien cliqué
            event.currentTarget.classList.add('active');
            
            // Fermer le menu mobile si ouvert
            closeMobileMenu();
            
            // Navigation spécifique selon la section
            const targetPage = event.currentTarget.getAttribute('href').substring(1);
            
            if (targetPage === 'documents') {
                document.getElementById('documents-section').scrollIntoView({ behavior: 'smooth' });
                showNotification('Navigation vers la section Documents', 'info');
            } else if (targetPage === 'programming') {
                document.getElementById('programming-section').scrollIntoView({ behavior: 'smooth' });
                showNotification('Navigation vers la section Programmation', 'info');
            } else if (targetPage === 'course') {
                document.getElementById('course-section').scrollIntoView({ behavior: 'smooth' });
                showNotification('Navigation vers la section Cours', 'info');
            } else {
                showNotification(`Navigation vers: ${targetPage}`, 'info');
            }
        }

        // Documents filter functionality
        const documentFilters = document.querySelectorAll('[data-doc-filter]');
        const documentCards = document.querySelectorAll('.document-card');

        documentFilters.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all document filter buttons
                documentFilters.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');
                
                const filter = button.dataset.docFilter;
                
                documentCards.forEach((card, index) => {
                    if (filter === 'all' || card.dataset.docCategory === filter) {
                        card.style.display = 'block';
                        // Ajouter une petite animation
                        card.classList.remove('animate-in');
                        setTimeout(() => {
                            card.classList.add('animate-in');
                        }, index * 100);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Programming filter functionality
        const programmingFilters = document.querySelectorAll('[data-prog-filter]');
        const programmingCards = document.querySelectorAll('.programming-card');

        programmingFilters.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all programming filter buttons
                programmingFilters.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');
                
                const filter = button.dataset.progFilter;
                
                programmingCards.forEach((card, index) => {
                    if (filter === 'all' || card.dataset.progCategory === filter) {
                        card.style.display = 'block';
                        // Ajouter une petite animation
                        card.classList.remove('animate-in');
                        setTimeout(() => {
                            card.classList.add('animate-in');
                        }, index * 100);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Document download functionality
        document.querySelectorAll('.document-card .btn-primary').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const documentTitle = btn.closest('.document-card').querySelector('.document-title').textContent;
                
                // Add download animation
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Téléchargement...';
                btn.disabled = true;
                
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-check"></i> Téléchargé !';
                    btn.style.background = 'var(--success-gradient)';
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        btn.style.background = '';
                    }, 2000);
                }, 1500);
                
                showNotification(`Téléchargement de "${documentTitle}" démarré`, 'success');
            });
        });

        // Programming article interactions
        document.querySelectorAll('.programming-card .btn-primary').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const articleTitle = btn.closest('.programming-card').querySelector('.programming-title').textContent;
                showNotification(`Lancement du tutoriel: "${articleTitle}"`, 'success');
            });
        });

        // Système de notifications
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            
            const icons = {
                success: 'fas fa-check-circle',
                error: 'fas fa-exclamation-circle',
                warning: 'fas fa-exclamation-triangle',
                info: 'fas fa-info-circle'
            };
            
            const colors = {
                success: 'var(--success-gradient)',
                error: 'var(--danger-gradient)',
                warning: 'var(--warning-gradient)',
                info: 'var(--accent-gradient)'
            };
            
            notification.innerHTML = `
                <i class="${icons[type]}"></i>
                <span>${message}</span>
            `;
            
            notification.style.cssText = `
                position: fixed;
                top: 24px;
                right: 24px;
                padding: 16px 20px;
                border-radius: var(--border-radius);
                color: white;
                font-weight: 600;
                font-size: 0.9rem;
                z-index: 3000;
                display: flex;
                align-items: center;
                gap: 12px;
                background: ${colors[type]};
                box-shadow: var(--shadow-lg);
                transform: translateX(400px);
                transition: transform var(--transition-normal);
                max-width: 400px;
                word-wrap: break-word;
                backdrop-filter: blur(10px);
            `;

            document.body.appendChild(notification);
            
            // Animation d'entrée
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Animation de sortie
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        // Gestion du scroll pour la sidebar sticky
        function handleScroll() {
            const scrolled = window.pageYOffset > 50;
            const header = document.querySelector('.dashboard-header');
            
            if (scrolled) {
                header.style.boxShadow = 'var(--shadow-lg)';
            } else {
                header.style.boxShadow = 'none';
            }
        }

        // Gestion du redimensionnement
        function handleResize() {
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile && !appState.mobileMenuOpen) {
                closeMobileMenu();
            } else if (!isMobile && appState.mobileMenuOpen) {
                closeMobileMenu();
            }
        }

        // Gestion des raccourcis clavier
        function handleKeydown(event) {
            // Échap pour fermer le menu mobile
            if (event.key === 'Escape') {
                closeMobileMenu();
            }
            
            // Ctrl+B pour toggle la sidebar (desktop uniquement)
            if (event.ctrlKey && event.key === 'b' && window.innerWidth > 768) {
                event.preventDefault();
                toggleSidebar();
            }
        }

        // Animation d'apparition des éléments
        function animateElements() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.course-nav a, .document-card, .programming-card').forEach(el => {
                observer.observe(el);
            });
        }

        // Initialisation de l'application
        function initApp() {
            // Restaurer l'état de la sidebar depuis localStorage
            const savedState = localStorage.getItem('sidebarCollapsed');
            if (savedState === 'true') {
                appState.sidebarCollapsed = true;
                elements.sidebar.classList.add('collapsed');
                const icon = elements.sidebarToggle.querySelector('i');
                icon.className = 'fas fa-chevron-right';
                elements.sidebarToggle.setAttribute('data-tooltip', 'Étendre le menu');
            }

            // Event listeners
            elements.sidebarToggle.addEventListener('click', toggleSidebar);
            elements.mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            elements.mobileOverlay.addEventListener('click', closeMobileMenu);

            // Navigation links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', handleNavigation);
            });

            // Course navigation
            document.querySelectorAll('.course-nav a').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    
                    // Retirer la classe active de tous les liens du cours
                    document.querySelectorAll('.course-nav a').forEach(l => {
                        l.classList.remove('active');
                    });
                    
                    // Ajouter la classe active au lien cliqué
                    this.classList.add('active');
                    
                    // Simulation de navigation
                    const section = this.getAttribute('href');
                    showNotification(`Section: ${this.textContent.trim()}`, 'info');
                });
            });

            // Notification button
            document.querySelector('.notification-btn').addEventListener('click', () => {
                showNotification('Vous avez 3 nouvelles notifications', 'info');
            });

            // Scroll et resize
            window.addEventListener('scroll', handleScroll, { passive: true });
            window.addEventListener('resize', handleResize);
            window.addEventListener('keydown', handleKeydown);

            // Animation des éléments
            animateElements();

            // Animation d'apparition initiale des cartes
            setTimeout(() => {
                document.querySelectorAll('.document-card, .programming-card').forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('animate-in');
                    }, index * 100);
                });
            }, 500);

            // Message de bienvenue
            setTimeout(() => {
                showNotification('Bienvenue dans votre dashboard ! 🎉', 'success');
            }, 1000);
        }

        // Lancement de l'application
        document.addEventListener('DOMContentLoaded', initApp);
    </script>
</body>
</html>