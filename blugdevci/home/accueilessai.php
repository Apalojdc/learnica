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
            padding: 4rem;
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

            /* .btn-primary,
            .btn-secondary {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            } */

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
        /* Les sections ajoutées après */
        /* HERO SECTION STYLES */
        .hero-section {
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--dark-secondary) 50%, var(--dark-tertiary) 100%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 4rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" style="stop-color:rgba(102,126,234,0.1)"/><stop offset="100%" style="stop-color:transparent"/></radialGradient></defs><circle cx="10" cy="10" r="1" fill="url(%23a)"><animate attributeName="opacity" values="0;1;0" dur="3s" repeatCount="indefinite"/></circle><circle cx="90" cy="5" r="1" fill="url(%23a)"><animate attributeName="opacity" values="0;1;0" dur="4s" repeatCount="indefinite" begin="1s"/></circle><circle cx="30" cy="15" r="1" fill="url(%23a)"><animate attributeName="opacity" values="0;1;0" dur="2s" repeatCount="indefinite" begin="2s"/></circle></svg>') repeat;
            opacity: 0.3;
            z-index: 0;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(102, 126, 234, 0.1);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            color: var(--text-accent);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            animation: hero-pulse 2s infinite;
        }

        @keyframes hero-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, var(--text-accent) 50%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: hero-text-appear 1s ease-out;
        }

        @keyframes hero-text-appear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            color: var(--text-secondary);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            animation: hero-text-appear 1s ease-out 0.2s both;
        }

        .hero-cta-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
            animation: hero-text-appear 1s ease-out 0.4s both;
        }

        .hero-btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .hero-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .hero-btn-primary:hover::before {
            left: 100%;
        }

        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .hero-btn-secondary {
            background: transparent;
            color: var(--text-secondary);
            border: 2px solid var(--border-primary);
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .hero-btn-secondary:hover {
            background: var(--surface-primary);
            border-color: var(--text-accent);
            color: var(--text-accent);
            transform: translateY(-3px);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            animation: hero-text-appear 1s ease-out 0.6s both;
        }

        .hero-stat-item {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            margin-bottom: 0.5rem;
        }

        .hero-stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* RESPONSIVE HERO */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 80vh;
                padding: 2rem 0;
            }

            .hero-container {
                padding: 0 1rem;
            }

            .hero-cta-container {
                flex-direction: column;
                gap: 1rem;
            }

            .hero-btn-primary,
            .hero-btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .hero-stats {
                gap: 2rem;
            }

            .hero-stat-number {
                font-size: 1.5rem;
            }
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

        /* SOCIAL PROOF SECTION STYLES */
.social-proof-section {
    background: var(--dark-secondary);
    padding: 4rem 0;
    border-top: 1px solid var(--border-primary);
    border-bottom: 1px solid var(--border-primary);
    margin-bottom: 4rem;
    position: relative;
    overflow: hidden;
}

.social-proof-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.social-proof-header {
    text-align: center;
    margin-bottom: 3rem;
}

.social-proof-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.social-proof-subtitle {
    color: var(--text-muted);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

/* TESTIMONIALS */
.social-proof-testimonials {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.social-proof-testimonial {
    background: var(--dark-card);
    border-radius: var(--border-radius);
    padding: 2rem;
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
    position: relative;
}

.social-proof-testimonial::before {
    content: '"';
    position: absolute;
    top: -10px;
    left: 20px;
    font-size: 4rem;
    color: var(--text-accent);
    font-family: serif;
    opacity: 0.3;
}

.social-proof-testimonial:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--text-accent);
}

.social-proof-testimonial-content {
    color: var(--text-secondary);
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-style: italic;
}

.social-proof-testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.social-proof-author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
}

.social-proof-author-info h4 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.social-proof-author-role {
    color: var(--text-muted);
    font-size: 0.9rem;
}

.social-proof-rating {
    margin-left: auto;
    display: flex;
    gap: 0.25rem;
}

.social-proof-star {
    color: #fbbf24;
    font-size: 1.2rem;
}

/* TRUST INDICATORS */
.social-proof-trust {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.social-proof-trust-item {
    text-align: center;
    padding: 1.5rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
}

.social-proof-trust-item:hover {
    background: var(--surface-secondary);
    transform: translateY(-3px);
}

.social-proof-trust-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 1rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.social-proof-trust-icon.security {
    background: var(--success-gradient);
}

.social-proof-trust-icon.support {
    background: var(--accent-gradient);
}

.social-proof-trust-icon.updates {
    background: var(--secondary-gradient);
}

.social-proof-trust-icon.community {
    background: var(--warning-gradient);
    color: #1e293b;
}

.social-proof-trust-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.social-proof-trust-desc {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* COMPANIES LOGOS */
.social-proof-companies {
    text-align: center;
}

.social-proof-companies-title {
    color: var(--text-muted);
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 2rem;
}

.social-proof-logos {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3rem;
    flex-wrap: wrap;
    opacity: 0.6;
    transition: opacity var(--transition-normal);
}

.social-proof-logos:hover {
    opacity: 1;
}

.social-proof-logo {
    height: 40px;
    padding: 0.5rem 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius-sm);
    border: 1px solid var(--border-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    transition: all var(--transition-normal);
    text-decoration: none;
}

.social-proof-logo:hover {
    background: var(--surface-secondary);
    color: var(--text-accent);
    transform: translateY(-2px);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .social-proof-section {
        padding: 3rem 0;
    }

    .social-proof-container {
        padding: 0 1rem;
    }

    .social-proof-testimonials {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .social-proof-trust {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .social-proof-logos {
        gap: 1.5rem;
    }

    .social-proof-testimonial {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    .social-proof-trust {
        grid-template-columns: 1fr;
    }
}


/* PRICING SECTION STYLES */
.pricing-section {
    background: var(--dark-bg);
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

.pricing-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(79, 172, 254, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.pricing-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

.pricing-header {
    text-align: center;
    margin-bottom: 4rem;
}

.pricing-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
}

.pricing-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

/* TOGGLE BILLING */
.pricing-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
}

.pricing-toggle-label {
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 1rem;
}

.pricing-toggle-switch {
    position: relative;
    width: 60px;
    height: 30px;
    cursor: pointer;
}

.pricing-toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.pricing-toggle-slider {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--surface-primary);
    border: 2px solid var(--border-primary);
    border-radius: 30px;
    transition: all 0.3s;
}

.pricing-toggle-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 2px;
    background: var(--text-accent);
    border-radius: 50%;
    transition: 0.3s;
}

.pricing-toggle-switch input:checked + .pricing-toggle-slider {
    background: var(--accent-gradient);
    border-color: transparent;
}

.pricing-toggle-switch input:checked + .pricing-toggle-slider:before {
    transform: translateX(26px);
    background: white;
}

.pricing-toggle-badge {
    background: var(--success-gradient);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 700;
    margin-left: 0.5rem;
}

/* PRICING CARDS */
.pricing-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.pricing-card {
    background: var(--dark-secondary);
    border: 2px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    position: relative;
    transition: all var(--transition-normal);
    overflow: hidden;
}

.pricing-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
}

.pricing-card-free:hover {
    border-color: var(--success-gradient);
}

.pricing-card-premium {
    border-color: var(--text-accent);
    transform: scale(1.05);
    box-shadow: var(--shadow-lg);
}

.pricing-card-premium:hover {
    transform: scale(1.05) translateY(-8px);
    border-color: var(--accent-gradient);
}

.pricing-card-pro:hover {
    border-color: var(--warning-gradient);
}

/* PRICING BADGE */
.pricing-badge {
    position: absolute;
    top: -1px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--secondary-gradient);
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 0 0 12px 12px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* PRICING HEADER */
.pricing-card-header {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--border-primary);
}

.pricing-plan-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.pricing-plan-desc {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

.pricing-price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 0.25rem;
    margin-bottom: 0.5rem;
}

.pricing-currency {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-secondary);
}

.pricing-amount {
    font-size: 3rem;
    font-weight: 800;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.pricing-period {
    font-size: 1rem;
    color: var(--text-muted);
    font-weight: 500;
}

.pricing-yearly-info {
    color: var(--success-gradient);
    font-size: 0.8rem;
    font-weight: 600;
    opacity: 0;
    transition: opacity 0.3s;
}

.pricing-yearly-info.show {
    opacity: 1;
}

/* PRICING FEATURES */
.pricing-features {
    list-style: none;
    margin-bottom: 2rem;
}

.pricing-feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border-secondary);
}

.pricing-feature:last-child {
    border-bottom: none;
}

.pricing-feature i {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    flex-shrink: 0;
}

.pricing-feature .fa-check {
    background: var(--success-gradient);
    color: white;
}

.pricing-feature .fa-times {
    background: var(--surface-primary);
    color: var(--text-muted);
}

.pricing-feature span {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.pricing-feature-disabled span {
    color: var(--text-muted);
    opacity: 0.6;
}

/* PRICING BUTTONS */
.pricing-btn {
    width: 100%;
    padding: 1rem 1.5rem;
    border: none;
    border-radius: var(--border-radius);
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

.pricing-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.pricing-btn:hover::before {
    left: 100%;
}

.pricing-btn-free {
    background: var(--surface-primary);
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.pricing-btn-free:hover {
    background: var(--success-gradient);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
}

.pricing-btn-premium {
    background: var(--primary-gradient);
    color: white;
}

.pricing-btn-premium:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.pricing-btn-pro {
    background: var(--warning-gradient);
    color: #1e293b;
}

.pricing-btn-pro:hover {
    background: var(--secondary-gradient);
    color: white;
    transform: translateY(-2px);
}

.pricing-trial {
    text-align: center;
    margin-top: 1rem;
    color: var(--text-muted);
    font-size: 0.8rem;
}

/* PRICING FAQ */
.pricing-faq {
    margin-top: 4rem;
    padding-top: 3rem;
    border-top: 1px solid var(--border-primary);
}

.pricing-faq-title {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 2rem;
}

.pricing-faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.pricing-faq-item {
    background: var(--surface-primary);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
}

.pricing-faq-item:hover {
    background: var(--surface-secondary);
    transform: translateY(-3px);
}

.pricing-faq-item h4 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.pricing-faq-item p {
    color: var(--text-secondary);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .pricing-section {
        padding: 3rem 0;
    }

    .pricing-container {
        padding: 0 1rem;
    }

    .pricing-title {
        font-size: 2rem;
    }

    .pricing-cards {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .pricing-card {
        padding: 1.5rem;
    }

    .pricing-card-premium {
        transform: none;
    }

    .pricing-card-premium:hover {
        transform: translateY(-8px);
    }

    .pricing-toggle {
        flex-direction: column;
        gap: 0.5rem;
    }

    .pricing-faq-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

/* BLOG SECTION STYLES */
.blog-section {
    background: var(--dark-bg);
    padding: 5rem 0;
    position: relative;
}

.blog-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.blog-header {
    text-align: center;
    margin-bottom: 4rem;
}

.blog-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.blog-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

/* BLOG CATEGORIES */
.blog-categories {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.blog-category-btn {
    padding: 0.75rem 1.5rem;
    background: var(--surface-primary);
    border: 2px solid var(--border-primary);
    border-radius: 50px;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

.blog-category-btn::before {
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

.blog-category-btn:hover::before,
.blog-category-btn.active::before {
    left: 0;
}

.blog-category-btn:hover,
.blog-category-btn.active {
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* FEATURED ARTICLE */
/* .blog-featured {
    margin-bottom: 4rem;
}

.blog-featured-card {
    background: var(--dark-secondary);
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    min-height: 400px;
}

.blog-featured-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: var(--text-accent);
}

.blog-featured-image {
    position: relative;
    background: var(--dark-card);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.blog-featured-img-placeholder {
    font-size: 4rem;
    color: var(--text-accent);
    opacity: 0.7;
    transition: all var(--transition-normal);
}

.blog-featured-card:hover .blog-featured-img-placeholder {
    transform: scale(1.1);
    opacity: 1;
}

.blog-featured-badges {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    gap: 0.5rem;
    flex-direction: column;
}

.blog-featured-content {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.blog-featured-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.3;
    margin-bottom: 1rem;
}

.blog-featured-excerpt {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.blog-featured-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
} */

/* BLOG META */
.blog-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: var(--text-muted);
    flex-wrap: wrap;
}

.blog-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.blog-date,
.blog-reading-time,
.blog-views {
    transition: color var(--transition-fast);
}

.blog-date:hover,
.blog-reading-time:hover,
.blog-views:hover {
    color: var(--text-accent);
}

/* BLOG BADGES */
.blog-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.blog-badge-featured {
    background: var(--secondary-gradient);
    color: white;
}

.blog-badge-hot {
    background: var(--danger-gradient);
    color: white;
}

.blog-badge-new {
    background: var(--success-gradient);
    color: white;
}

.blog-badge-trending {
    background: var(--warning-gradient);
    color: #1e293b;
}

.blog-badge-category {
    background: var(--surface-primary);
    color: var(--text-accent);
    border: 1px solid var(--border-primary);
}

/* BLOG AUTHOR */
.blog-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.blog-author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--primary-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
}

.blog-author-info {
    display: flex;
    flex-direction: column;
}

.blog-author-name {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
}

.blog-author-role {
    color: var(--text-muted);
    font-size: 0.8rem;
}

/* BLOG ENGAGEMENT */
.blog-engagement {
    display: flex;
    gap: 1rem;
}

.blog-like-btn,
.blog-share-btn {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 50px;
    padding: 0.5rem 1rem;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.blog-like-btn:hover {
    background: var(--danger-gradient);
    color: white;
    border-color: transparent;
}

.blog-share-btn:hover {
    background: var(--accent-gradient);
    color: white;
    border-color: transparent;
}

/* BLOG READ MORE */
.blog-read-more {
    background: var(--primary-gradient);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--transition-normal);
    align-self: flex-start;
}

.blog-read-more:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* BLOG GRID */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}
/* 
.blog-card {
    background: var(--dark-secondary);
    border-radius: var(--border-radius);
    overflow: hidden;
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
    opacity: 1;
    transform: translateY(0);
}

.blog-card.hidden {
    opacity: 0;
    transform: translateY(20px);
    pointer-events: none;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--text-accent);
}

.blog-card-image {
    height: 200px;
    background: var(--dark-card);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.blog-img-placeholder {
    font-size: 3rem;
    color: var(--text-accent);
    opacity: 0.7;
    transition: all var(--transition-normal);
}

.blog-card:hover .blog-img-placeholder {
    transform: scale(1.1);
    opacity: 1;
}

.blog-card-badges {
    position: absolute;
    top: 1rem;
    left: 1rem;
}

.blog-card-content {
    padding: 1.5rem;
}

.blog-category-tag {
    background: var(--accent-gradient);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.blog-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.4;
    margin: 1rem 0;
    transition: color var(--transition-normal);
}

.blog-card:hover .blog-card-title {
    color: var(--text-accent);
}

.blog-card-excerpt {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

.blog-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blog-stats {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: var(--text-muted);
}

.blog-stats span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.blog-card-link {
    color: var(--text-accent);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--transition-normal);
}

.blog-card-link:hover {
    color: var(--text-primary);
    transform: translateX(5px);
} */

    /****************************************************** Mes articles */
/* 
    .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .blog-featured-card {
            background: #111;
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid #333;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
        }

        .blog-featured-card:hover {
            transform: translateY(-5px);
            border-color: #555;
            box-shadow: 0 20px 40px rgba(255, 255, 255, 0.15);
        }

        .blog-featured-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .img-articles {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-featured-card:hover .img-articles {
            transform: scale(1.05);
        }

        .blog-featured-badges {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .blog-badge {
            background: rgba(0, 0, 0, 0.8);
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            border: 1px solid #555;
        }

        .blog-badge-featured {
            background: rgba(255, 215, 0, 0.9);
            color: #000;
            border-color: #ffd700;
        }

        .blog-badge-category {
            background: rgba(100, 100, 100, 0.9);
            color: #fff;
        }

        .blog-featured-content {
            padding: 25px;
        }

        .blog-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #ccc;
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-featured-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #fff;
            line-height: 1.3;
        }

        .blog-featured-excerpt {
            color: #bbb;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-featured-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .blog-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .blog-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
        }

        .blog-author-info {
            display: flex;
            flex-direction: column;
        }

        .blog-author-name {
            font-weight: bold;
            color: #fff;
        }

        .blog-author-role {
            font-size: 0.8rem;
            color: #aaa;
        }

        .blog-engagement {
            display: flex;
            gap: 10px;
        }

        .blog-like-btn, .blog-share-btn {
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-like-btn:hover, .blog-share-btn:hover {
            background: #333;
            border-color: #777;
        }

        .blog-like-btn.liked {
            color: #e74c3c;
        }

        .blog-read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .blog-read-more:hover {
            color: #66BB6A;
            transform: translateX(5px);
        } */

        /* Section Commentaires */
        /* .comments-section {
            background: #111;
            border-radius: 15px;
            border: 2px solid #333;
            margin-top: 20px;
            overflow: hidden;
        }

        .comments-header {
            background: #222;
            padding: 20px;
            border-bottom: 1px solid #333;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
        }

        .comments-header:hover {
            background: #2a2a2a;
        }

        .comments-title {
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comments-toggle {
            transition: transform 0.3s ease;
        }

        .comments-toggle.open {
            transform: rotate(180deg);
        }

        .comments-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .comments-content.open {
            max-height: 600px;
        }

        .comment-form {
            padding: 20px;
            border-bottom: 1px solid #333;
        }

        .comment-input-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .comment-input {
            flex: 1;
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            resize: vertical;
            min-height: 80px;
        }

        .comment-input::placeholder {
            color: #888;
        }

        .comment-avatar-input {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
            flex-shrink: 0;
        }

        .comment-form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment-user-info {
            display: flex;
            gap: 10px;
        }

        .comment-user-info input {
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .comment-submit {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .comment-submit:hover {
            background: #45a049;
        }

        .comments-list {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        .comment {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
            flex-shrink: 0;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .comment-author {
            font-weight: bold;
            color: #fff;
        }

        .comment-date {
            color: #888;
            font-size: 0.8rem;
        }

        .comment-text {
            color: #ccc;
            line-height: 1.5;
        }

        .no-comments {
            text-align: center;
            color: #888;
            font-style: italic;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }
            
            .blog-meta {
                flex-direction: column;
                gap: 10px;
            }
            
            .blog-featured-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .comment-input-group {
                flex-direction: column;
            }
            
            .comment-form-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        } */

                   .blog-system-container * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .blog-system-container {
            font-family: 'Arial', sans-serif;
            background: #000;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .blog-system-main {
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-system-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .blog-system-card {
            background: #111;
            border-radius: 15px;
            overflow: hidden;
            border: 2px solid #333;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
        }

        .blog-system-card:hover {
            transform: translateY(-5px);
            border-color: #555;
            box-shadow: 0 20px 40px rgba(255, 255, 255, 0.15);
        }

        .blog-system-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .blog-system-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-system-card:hover .blog-system-img {
            transform: scale(1.05);
        }

        .blog-system-badges {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .blog-system-badge {
            background: rgba(0, 0, 0, 0.8);
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            border: 1px solid #555;
        }

        .blog-system-badge-featured {
            background: rgba(255, 215, 0, 0.9);
            color: #000;
            border-color: #ffd700;
        }

        .blog-system-badge-category {
            background: rgba(100, 100, 100, 0.9);
            color: #fff;
        }

        .blog-system-content {
            padding: 25px;
        }

        .blog-system-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #ccc;
        }

        .blog-system-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-system-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #fff;
            line-height: 1.3;
        }

        .blog-system-excerpt {
            color: #bbb;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-system-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .blog-system-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .blog-system-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
        }

        .blog-system-author-info {
            display: flex;
            flex-direction: column;
        }

        .blog-system-author-name {
            font-weight: bold;
            color: #fff;
        }

        .blog-system-author-role {
            font-size: 0.8rem;
            color: #aaa;
        }

        .blog-system-engagement {
            display: flex;
            gap: 10px;
        }

        .blog-system-like-btn, .blog-system-share-btn {
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-system-like-btn:hover, .blog-system-share-btn:hover {
            background: #333;
            border-color: #777;
        }

        .blog-system-like-btn.blog-system-liked {
            color: #e74c3c;
        }

        .blog-system-read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .blog-system-read-more:hover {
            color: #66BB6A;
            transform: translateX(5px);
        }

        /* Section Commentaires */
        .blog-system-comments {
            background: #111;
            border-radius: 15px;
            border: 2px solid #333;
            margin-top: 20px;
            overflow: hidden;
        }

        .blog-system-comments-header {
            background: #222;
            padding: 20px;
            border-bottom: 1px solid #333;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
        }

        .blog-system-comments-header:hover {
            background: #2a2a2a;
        }

        .blog-system-comments-title {
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .blog-system-comments-toggle {
            transition: transform 0.3s ease;
        }

        .blog-system-comments-toggle.blog-system-open {
            transform: rotate(180deg);
        }

        .blog-system-comments-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .blog-system-comments-content.blog-system-open {
            max-height: 600px;
        }

        .blog-system-comment-form {
            padding: 20px;
            border-bottom: 1px solid #333;
        }

        .blog-system-comment-input-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .blog-system-comment-input {
            flex: 1;
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            resize: vertical;
            min-height: 80px;
        }

        .blog-system-comment-input::placeholder {
            color: #888;
        }

        .blog-system-comment-avatar-input {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
            flex-shrink: 0;
        }

        .blog-system-comment-form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-system-comment-user-info {
            display: flex;
            gap: 10px;
        }

        .blog-system-comment-user-info input {
            background: #222;
            border: 1px solid #555;
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .blog-system-comment-submit {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .blog-system-comment-submit:hover {
            background: #45a049;
        }

        .blog-system-comments-list {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        .blog-system-comment {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        .blog-system-comment:last-child {
            border-bottom: none;
        }

        .blog-system-comment-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #555;
            flex-shrink: 0;
        }

        .blog-system-comment-content {
            flex: 1;
        }

        .blog-system-comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .blog-system-comment-author {
            font-weight: bold;
            color: #fff;
        }

        .blog-system-comment-date {
            color: #888;
            font-size: 0.8rem;
        }

        .blog-system-comment-text {
            color: #ccc;
            line-height: 1.5;
        }

        .blog-system-no-comments {
            text-align: center;
            color: #888;
            font-style: italic;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .blog-system-grid {
                grid-template-columns: 1fr;
            }
            
            .blog-system-meta {
                flex-direction: column;
                gap: 10px;
            }
            
            .blog-system-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .blog-system-comment-input-group {
                flex-direction: column;
            }
            
            .blog-system-comment-form-footer {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
/* BLOG CTA */
.blog-cta {
    background: var(--dark-secondary);
    border-radius: var(--border-radius-lg);
    padding: 3rem 2rem;
    text-align: center;
    border: 1px solid var(--border-primary);
    position: relative;
    overflow: hidden;
}

.blog-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

.blog-cta-content {
    position: relative;
    z-index: 2;
}

.blog-cta-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.blog-cta-desc {
    color: var(--text-secondary);
    font-size: 1.1rem;
    max-width: 500px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

.blog-cta-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.blog-cta-btn {
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--transition-normal);
}

.blog-cta-btn.primary {
    background: var(--primary-gradient);
    color: white;
}

.blog-cta-btn.primary:hover {
    background: var(--accent-gradient);
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.blog-cta-btn.secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.blog-cta-btn.secondary:hover {
    background: var(--surface-primary);
    color: var(--text-accent);
    border-color: var(--text-accent);
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .blog-featured-card {
        grid-template-columns: 1fr;
    }
    
    .blog-featured-image {
        min-height: 250px;
    }
}

@media (max-width: 768px) {
    .blog-section {
        padding: 3rem 0;
    }
    
    .blog-container {
        padding: 0 1rem;
    }
    
    .blog-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .blog-categories {
        gap: 0.5rem;
    }
    
    .blog-category-btn {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    .blog-featured-content {
        padding: 1.5rem;
    }
    
    .blog-featured-title {
        font-size: 1.5rem;
    }
    
    .blog-featured-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
    
    .blog-meta {
        gap: 1rem;
    }
    
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .blog-card-content {
        padding: 1rem;
    }
    
    .blog-cta {
        padding: 2rem 1rem;
    }
    
    .blog-cta-title {
        font-size: 1.5rem;
    }
    
    .blog-cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .blog-cta-btn {
        width: 100%;
        justify-content: center;
        max-width: 300px;
    }
}

/* COMMUNITY SECTION STYLES */
.community-section {
    background: var(--dark-secondary);
    padding: 5rem 0;
    position: relative;
    border-top: 1px solid var(--border-primary);
    border-bottom: 1px solid var(--border-primary);
}

.community-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 20%, rgba(79, 172, 254, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(240, 147, 251, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.community-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

.community-header {
    text-align: center;
    margin-bottom: 4rem;
}

.community-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--secondary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.community-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
}

/* COMMUNITY STATS */
.community-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.community-stat-card {
    background: var(--dark-bg);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.community-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: var(--accent-gradient);
    transform: scaleY(0);
    transition: transform var(--transition-normal);
}

.community-stat-card:hover::before {
    transform: scaleY(1);
}

.community-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--text-accent);
}

.community-stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.community-stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    display: block;
    margin-bottom: 0.25rem;
}

.community-stat-label {
    color: var(--text-muted);
    font-size: 0.9rem;
    font-weight: 500;
}

/* COMMUNITY CONTENT GRID */
.community-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 2rem;
    margin-bottom: 4rem;
}

.community-card {
    background: var(--dark-bg);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    transition: all var(--transition-normal);
}

.community-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: var(--text-accent);
}

.community-card-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-primary);
    background: var(--surface-primary);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.community-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.community-live-indicator {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--success-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.community-pulse {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
    animation: community-pulse 1.5s infinite;
}

@keyframes community-pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.2); }
}

/* DISCUSSIONS */
.community-discussions {
    padding: 1.5rem;
}

.community-discussion-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--border-secondary);
    transition: all var(--transition-normal);
}

.community-discussion-item:last-child {
    border-bottom: none;
}

.community-discussion-item:hover {
    background: var(--surface-primary);
    margin: 0 -1rem;
    padding: 1rem;
    border-radius: var(--border-radius-sm);
}

.community-discussion-avatar {
    position: relative;
    flex-shrink: 0;
}

.community-discussion-avatar span {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1rem;
}

.community-online-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #10b981;
    border: 2px solid var(--dark-bg);
}

.community-discussion-content {
    flex: 1;
    min-width: 0;
}

.community-discussion-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    line-height: 1.3;
    transition: color var(--transition-normal);
}

.community-discussion-item:hover .community-discussion-title {
    color: var(--text-accent);
}

.community-discussion-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-bottom: 0.75rem;
    flex-wrap: wrap;
}

.community-author {
    font-weight: 600;
    color: var(--text-secondary);
}

.community-discussion-tags {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.community-tag {
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.community-tag.react {
    background: rgba(97, 218, 251, 0.2);
    color: #61dafb;
}

.community-tag.performance {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
}

.community-tag.laravel {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
}

.community-tag.deployment {
    background: rgba(168, 85, 247, 0.2);
    color: #a855f7;
}

.community-tag.ai {
    background: rgba(249, 115, 22, 0.2);
    color: #f97316;
}

.community-tag.beginner {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
}

.community-discussion-activity {
    flex-shrink: 0;
    display: flex;
    align-items: center;
}

.community-activity-count {
    background: var(--surface-primary);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-accent);
    white-space: nowrap;
}

/* CONTRIBUTORS */
.community-contributors {
    padding: 1.5rem;
}

.community-contributor-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--border-secondary);
    transition: all var(--transition-normal);
}

.community-contributor-item:last-child {
    border-bottom: none;
}

.community-contributor-item:hover {
    background: var(--surface-primary);
    margin: 0 -1rem;
    padding: 1rem;
    border-radius: var(--border-radius-sm);
}

.community-contributor-rank {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.community-contributor-avatar {
    position: relative;
    flex-shrink: 0;
}

.community-contributor-avatar span {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--secondary-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.community-contributor-level {
    position: absolute;
    bottom: -5px;
    right: -5px;
    background: var(--warning-gradient);
    color: #1e293b;
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
    font-size: 0.6rem;
    font-weight: 700;
}

.community-contributor-info {
    flex: 1;
    min-width: 0;
}

.community-contributor-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.community-contributor-stats {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-bottom: 0.5rem;
}

.community-contributor-badges {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.community-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
    font-size: 0.7rem;
    font-weight: 600;
}

.community-badge.expert {
    background: var(--accent-gradient);
    color: white;
}

.community-badge.mentor {
    background: var(--secondary-gradient);
    color: white;
}

.community-badge.helper {
    background: var(--success-gradient);
    color: white;
}

.community-contributor-score {
    text-align: center;
    flex-shrink: 0;
}

.community-score {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--text-accent);
    display: block;
}

.community-score-label {
    font-size: 0.7rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

/* QUICK HELP */
.community-quick-help {
    padding: 1.5rem;
}

.community-help-item {
    display: flex;
    gap: 1rem;
    padding: 1.5rem 0;
    border-bottom: 1px solid var(--border-secondary);
}

.community-help-item:last-child {
    border-bottom: none;
}

.community-help-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    flex-shrink: 0;
}

.community-help-content h4 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.community-help-content p {
    color: var(--text-secondary);
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.community-help-btn {
    background: var(--primary-gradient);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.community-help-btn:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.community-search-box {
    display: flex;
    gap: 0.5rem;
}

.community-search-input {
    flex: 1;
    padding: 0.75rem 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 25px;
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.community-search-input:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--surface-secondary);
}

.community-search-btn {
    background: var(--accent-gradient);
    color: white;
    border: none;
    padding: 0.75rem 1rem;
    border-radius: 25px;
    cursor: pointer;
    transition: all var(--transition-normal);
}

.community-search-btn:hover {
    background: var(--primary-gradient);
    transform: scale(1.05);
}

.community-help-link {
    color: var(--text-accent);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--transition-normal);
}

.community-help-link:hover {
    color: var(--text-primary);
    transform: translateX(5px);
}

/* CARD FOOTER */
.community-card-footer {
    padding: 1rem 1.5rem;
    background: var(--surface-primary);
    border-top: 1px solid var(--border-primary);
}

.community-view-all {
    color: var(--text-accent);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all var(--transition-normal);
}

.community-view-all:hover {
    color: var(--text-primary);
    transform: translateX(5px);
}

/* COMMUNITY CTA */
.community-cta {
    background: var(--dark-card);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 3rem;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 3rem;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.community-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

.community-cta-content {
    position: relative;
    z-index: 2;
}

.community-cta-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.community-cta-desc {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.community-cta-features {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.community-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.community-feature i {
    color: var(--success-gradient);
    font-weight: 600;
}

.community-cta-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.community-cta-btn {
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
}

.community-cta-btn.primary {
    background: var(--secondary-gradient);
    color: white;
}

.community-cta-btn.primary:hover {
    background: var(--primary-gradient);
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.community-cta-btn.secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.community-cta-btn.secondary:hover {
    background: var(--surface-primary);
    color: var(--text-accent);
    border-color: var(--text-accent);
}

/* ONLINE MEMBERS */
.community-online-members {
    position: relative;
    z-index: 2;
}

.community-online-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.community-pulse-green {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #10b981;
    animation: community-pulse 1.5s infinite;
}

.community-online-avatars {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.community-online-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all var(--transition-normal);
}

.community-online-avatar:hover {
    transform: scale(1.1);
    z-index: 10;
}

.community-online-more {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--surface-primary);
    border: 2px solid var(--border-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-weight: 600;
    font-size: 0.8rem;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .community-content-grid {
        grid-template-columns: 1fr 1fr;
    }
    
    .community-cta {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .community-section {
        padding: 3rem 0;
    }
    
    .community-container {
        padding: 0 1rem;
    }
    
    .community-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .community-stats {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .community-stat-card {
        padding: 1.5rem;
    }
    
    .community-content-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .community-card-header {
        padding: 1rem;
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .community-discussions,
    .community-contributors,
    .community-quick-help {
        padding: 1rem;
    }
    
    .community-discussion-meta {
        gap: 0.5rem;
    }
    
    .community-contributor-stats {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .community-cta {
        padding: 2rem;
    }
    
    .community-cta-title {
        font-size: 1.5rem;
    }
    
    .community-cta-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .community-cta-actions {
        flex-direction: column;
    }
    
    .community-cta-btn {
        width: 100%;
        justify-content: center;
    }
}

/* FAQ SECTION STYLES */
.faq-section {
    background: var(--dark-bg);
    padding: 5rem 0;
    position: relative;
}

.faq-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 2rem;
}

.faq-header {
    text-align: center;
    margin-bottom: 4rem;
}

.faq-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--warning-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.faq-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

/* FAQ SEARCH */
.faq-search-container {
    max-width: 500px;
    margin: 0 auto 2rem;
}

.faq-search-box {
    position: relative;
    background: var(--dark-secondary);
    border: 2px solid var(--border-primary);
    border-radius: 50px;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all var(--transition-normal);
}

.faq-search-box:focus-within {
    border-color: var(--text-accent);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
    transform: scale(1.02);
}

.faq-search-box i {
    color: var(--text-muted);
    font-size: 1.2rem;
}

.faq-search-input {
    flex: 1;
    background: transparent;
    border: none;
    color: var(--text-primary);
    font-size: 1rem;
    outline: none;
}

.faq-search-input::placeholder {
    color: var(--text-muted);
}

.faq-search-suggestions {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.faq-suggestion {
    background: var(--surface-primary);
    color: var(--text-secondary);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    border: 1px solid var(--border-primary);
}

.faq-suggestion:hover {
    background: var(--accent-gradient);
    color: white;
    transform: translateY(-2px);
}

.faq-search-results {
    text-align: center;
    margin-top: 1rem;
    color: var(--text-muted);
    font-size: 0.9rem;
    opacity: 0;
    transition: opacity var(--transition-normal);
}

.faq-search-results.show {
    opacity: 1;
}

/* FAQ CATEGORIES */
.faq-categories {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.faq-category-btn {
    background: var(--surface-primary);
    border: 2px solid var(--border-primary);
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

.faq-category-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--warning-gradient);
    transition: left 0.3s ease;
    z-index: -1;
}

.faq-category-btn:hover::before,
.faq-category-btn.active::before {
    left: 0;
}

.faq-category-btn:hover,
.faq-category-btn.active {
    color: #1e293b;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.faq-category-count {
    background: var(--text-accent);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    font-size: 0.7rem;
    font-weight: 700;
    min-width: 20px;
    text-align: center;
}

/* FAQ POPULAR */
.faq-popular {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    margin-bottom: 3rem;
}

.faq-popular-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.faq-popular-items {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.faq-popular-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
    cursor: pointer;
    transition: all var(--transition-normal);
}

.faq-popular-item:hover {
    background: var(--surface-secondary);
    border-color: var(--text-accent);
    transform: translateX(5px);
}

.faq-popular-text {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
}

.faq-popular-views {
    color: var(--text-muted);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    flex-shrink: 0;
}

/* FAQ ITEMS */
.faq-items {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.faq-item {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    transition: all var(--transition-normal);
    opacity: 1;
    transform: translateY(0);
}

.faq-item.hidden {
    opacity: 0;
    transform: translateY(-20px);
    pointer-events: none;
    margin: 0;
    height: 0;
    padding: 0;
    border: none;
}

.faq-item:hover {
    border-color: var(--text-accent);
    box-shadow: var(--shadow-md);
}

.faq-question {
    padding: 1.5rem;
    cursor: pointer;
    position: relative;
    transition: all var(--transition-normal);
}

.faq-question:hover {
    background: var(--surface-primary);
}

.faq-question-text {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    line-height: 1.4;
    padding-right: 3rem;
}

.faq-question-text i {
    color: var(--text-accent);
    font-size: 1rem;
    flex-shrink: 0;
}

.faq-question-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.8rem;
}

.faq-category-tag {
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.faq-category-tag.general {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
}

.faq-category-tag.pricing {
    background: rgba(59, 130, 246, 0.2);
    color: #3b82f6;
}

.faq-category-tag.technical {
    background: rgba(168, 85, 247, 0.2);
    color: #a855f7;
}

.faq-category-tag.support {
    background: rgba(249, 115, 22, 0.2);
    color: #f97316;
}

.faq-helpful {
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.faq-toggle {
    position: absolute;
    top: 50%;
    right: 1.5rem;
    transform: translateY(-50%);
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all var(--transition-normal);
}

.faq-toggle:hover {
    background: var(--text-accent);
    color: white;
    transform: translateY(-50%) scale(1.1);
}

.faq-item.active .faq-toggle {
    background: var(--text-accent);
    color: white;
}

.faq-item.active .faq-toggle i {
    transform: rotate(180deg);
}

/* FAQ ANSWER */
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

.faq-item.active .faq-answer {
    max-height: 1000px;
    transition: max-height 0.5s ease-in;
}

.faq-answer-content {
    padding: 0 1.5rem 1.5rem;
    border-top: 1px solid var(--border-primary);
    margin-top: 1rem;
    animation: fadeInUp 0.3s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.faq-answer-content p {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1rem;
}

.faq-answer-content ul,
.faq-answer-content ol {
    color: var(--text-secondary);
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.faq-answer-content li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
}

.faq-answer-content strong {
    color: var(--text-primary);
    font-weight: 600;
}

/* FAQ SPECIAL CONTENT */
.faq-plan-comparison {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.faq-plan-item {
    background: var(--surface-primary);
    padding: 1rem;
    border-radius: var(--border-radius);
    text-align: center;
    border: 1px solid var(--border-primary);
}

.faq-plan-item h5 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.faq-plan-item span {
    color: var(--text-accent);
    font-weight: 600;
    font-size: 0.9rem;
}

.faq-pricing-clarity,
.faq-refund-process,
.faq-student-offer {
    background: var(--surface-primary);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    margin: 1rem 0;
    border: 1px solid var(--border-primary);
}

.faq-included,
.faq-no-fees {
    margin-bottom: 1rem;
}

.faq-included h5,
.faq-no-fees h5 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.faq-platforms {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.faq-platform {
    text-align: center;
    padding: 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
}

.faq-platform i {
    font-size: 2rem;
    color: var(--text-accent);
    margin-bottom: 0.5rem;
}

.faq-platform h5 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.faq-platform span {
    color: var(--text-muted);
    font-size: 0.8rem;
}

.faq-payment-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.faq-payment-method {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
    font-weight: 600;
    color: var(--text-primary);
}

.faq-payment-icon {
    font-size: 1.5rem;
}

.faq-support-times {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.faq-support-plan {
    text-align: center;
    padding: 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
}

.faq-support-plan h5 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.faq-support-plan span {
    color: var(--text-accent);
    font-weight: 600;
}

/* FAQ HELPFUL ACTIONS */
.faq-helpful-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border-primary);
    flex-wrap: wrap;
}

.faq-helpful-actions span {
    color: var(--text-muted);
    font-weight: 600;
    font-size: 0.9rem;
}

.faq-helpful-btn {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 25px;
    padding: 0.5rem 1rem;
    color: var(--text-secondary);
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.faq-helpful-btn.yes:hover {
    background: var(--success-gradient);
    color: white;
    border-color: transparent;
}

.faq-helpful-btn.no:hover {
    background: var(--danger-gradient);
    color: white;
    border-color: transparent;
}

.faq-helpful-btn.voted {
    pointer-events: none;
    opacity: 0.7;
}

/* FAQ CTA */
.faq-cta {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 3rem;
    margin-top: 4rem;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 3rem;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.faq-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(249, 115, 22, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

.faq-cta-content {
    position: relative;
    z-index: 2;
}

.faq-cta-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.faq-cta-desc {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.faq-cta-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.faq-cta-btn {
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
}

.faq-cta-btn.primary {
    background: var(--warning-gradient);
    color: #1e293b;
}

.faq-cta-btn.primary:hover {
    background: var(--secondary-gradient);
    color: white;
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.faq-cta-btn.secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.faq-cta-btn.secondary:hover {
    background: var(--surface-primary);
    color: var(--text-accent);
    border-color: var(--text-accent);
}

.faq-cta-stats {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    position: relative;
    z-index: 2;
}

.faq-stat {
    text-align: center;
    padding: 1rem;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
}

.faq-stat-number {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--text-accent);
    display: block;
    margin-bottom: 0.25rem;
}

.faq-stat-label {
    font-size: 0.8rem;
    color: var(--text-muted);
    text-transform: uppercase;
    font-weight: 600;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .faq-section {
        padding: 3rem 0;
    }

    .faq-container {
        padding: 0 1rem;
    }

    .faq-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }

    .faq-categories {
        gap: 0.5rem;
    }

    .faq-category-btn {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }

    .faq-popular {
        padding: 1.5rem;
    }

    .faq-popular-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .faq-question {
        padding: 1rem;
    }

    .faq-question-text {
        font-size: 1rem;
        padding-right: 2.5rem;
    }

    .faq-toggle {
        width: 35px;
        height: 35px;
        right: 1rem;
    }

    .faq-answer-content {
        padding: 0 1rem 1rem;
    }

    .faq-plan-comparison,
    .faq-platforms,
    .faq-payment-methods,
    .faq-support-times {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .faq-helpful-actions {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .faq-cta {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 2rem;
        text-align: center;
    }

    .faq-cta-title {
        font-size: 1.5rem;
    }

    .faq-cta-actions {
        flex-direction: column;
    }

    .faq-cta-btn {
        width: 100%;
        justify-content: center;
    }

    .faq-cta-stats {
        flex-direction: row;
        justify-content: center;
    }
}

/* NEWSLETTER SECTION STYLES */
.newsletter-section {
    background: linear-gradient(135deg, var(--dark-bg) 0%, var(--dark-secondary) 50%, var(--dark-tertiary) 100%);
    padding: 6rem 0;
    position: relative;
    overflow: hidden;
    border-top: 1px solid var(--border-primary);
}

.newsletter-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(240, 147, 251, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(79, 172, 254, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.newsletter-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

/* NEWSLETTER HEADER */
.newsletter-header {
    text-align: center;
    margin-bottom: 4rem;
}

.newsletter-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: var(--secondary-gradient);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    animation: newsletter-float 3s ease-in-out infinite;
}

@keyframes newsletter-float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.newsletter-badge-icon {
    font-size: 1.5rem;
    animation: newsletter-bounce 1s ease-in-out infinite;
}

@keyframes newsletter-bounce {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.newsletter-badge-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    animation: newsletter-pulse 2s infinite;
}

@keyframes newsletter-pulse {
    0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
    100% { transform: translate(-50%, -50%) scale(1.5); opacity: 0; }
}

.newsletter-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--text-primary);
}

.newsletter-highlight {
    background: var(--warning-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
}

.newsletter-highlight::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--warning-gradient);
    border-radius: 2px;
    animation: newsletter-underline 2s ease-out infinite;
}

@keyframes newsletter-underline {
    0%, 100% { transform: scaleX(1); }
    50% { transform: scaleX(1.1); }
}

.newsletter-subtitle {
    font-size: 1.2rem;
    color: var(--text-secondary);
    max-width: 700px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

/* NEWSLETTER URGENCY */
.newsletter-urgency {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3rem;
    flex-wrap: wrap;
    background: rgba(239, 68, 68, 0.1);
    border: 2px solid rgba(239, 68, 68, 0.3);
    border-radius: var(--border-radius-lg);
    padding: 1.5rem 2rem;
    margin-top: 2rem;
}

.newsletter-timer {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: #ef4444;
    font-weight: 700;
    font-size: 1.1rem;
}

.newsletter-countdown {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.countdown-time {
    background: #ef4444;
    color: white;
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    font-weight: 800;
    font-size: 1.2rem;
    min-width: 40px;
    text-align: center;
    animation: countdown-flash 1s ease-in-out infinite;
}

@keyframes countdown-flash {
    0%, 100% { background: #ef4444; }
    50% { background: #dc2626; }
}

.newsletter-stock {
    text-align: center;
}

.newsletter-stock-text {
    color: #ef4444;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

.newsletter-stock-bar {
    width: 200px;
    height: 8px;
    background: rgba(239, 68, 68, 0.2);
    border-radius: 4px;
    overflow: hidden;
}

.newsletter-stock-fill {
    height: 100%;
    background: var(--danger-gradient);
    border-radius: 4px;
    animation: stock-fill 3s ease-out;
}

@keyframes stock-fill {
    from { width: 0%; }
    to { width: 73%; }
}

/* NEWSLETTER CONTENT GRID */
.newsletter-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-bottom: 4rem;
    align-items: start;
}

/* NEWSLETTER FORM */
.newsletter-form-container {
    position: sticky;
    top: 120px;
}

.newsletter-form-card {
    background: var(--dark-secondary);
    border: 2px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 3rem;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.newsletter-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--secondary-gradient);
}

.newsletter-form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.newsletter-form-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.newsletter-gift-icon {
    font-size: 2rem;
    animation: newsletter-bounce 2s ease-in-out infinite;
}

.newsletter-form-desc {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.5;
}

/* NEWSLETTER FORM INPUTS */
.newsletter-input-group {
    margin-bottom: 1.5rem;
}

.newsletter-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.newsletter-input-icon {
    position: absolute;
    left: 1.5rem;
    color: var(--text-muted);
    font-size: 1.1rem;
    transition: all var(--transition-normal);
    z-index: 2;
}

.newsletter-input {
    width: 100%;
    padding: 1.25rem 1.5rem 1.25rem 4rem;
    background: var(--surface-primary);
    border: 2px solid var(--border-primary);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 1.1rem;
    transition: all var(--transition-normal);
}

.newsletter-input:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--surface-secondary);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
    transform: scale(1.02);
}

.newsletter-input:focus + .newsletter-input-validation .newsletter-input-icon {
    color: var(--text-accent);
    transform: scale(1.1);
}

.newsletter-input-validation {
    position: absolute;
    right: 1.5rem;
    opacity: 0;
    transition: all var(--transition-normal);
}

.newsletter-input.valid .newsletter-input-validation {
    opacity: 1;
}

.newsletter-validation-success {
    color: #22c55e;
    font-size: 1.2rem;
}

.newsletter-validation-error {
    color: #ef4444;
    font-size: 1.2rem;
}

.newsletter-input-message {
    margin-top: 0.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    opacity: 0;
    transition: all var(--transition-normal);
}

.newsletter-input-message.show {
    opacity: 1;
}

.newsletter-input-message.success {
    color: #22c55e;
}

.newsletter-input-message.error {
    color: #ef4444;
}

/* NEWSLETTER CHECKBOX */
.newsletter-checkbox-group {
    margin-bottom: 2rem;
}

.newsletter-checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    cursor: pointer;
    color: var(--text-secondary);
    font-size: 0.95rem;
    line-height: 1.5;
}

.newsletter-checkbox {
    display: none;
}

.newsletter-checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid var(--border-primary);
    border-radius: 4px;
    background: var(--surface-primary);
    position: relative;
    flex-shrink: 0;
    transition: all var(--transition-normal);
}

.newsletter-checkbox:checked + .newsletter-checkbox-custom {
    background: var(--success-gradient);
    border-color: transparent;
}

.newsletter-checkbox:checked + .newsletter-checkbox-custom::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-weight: 700;
    font-size: 0.8rem;
}

.newsletter-checkbox-label:hover .newsletter-checkbox-custom {
    border-color: var(--text-accent);
    transform: scale(1.05);
}

/* NEWSLETTER SUBMIT BUTTON */
.newsletter-submit-btn {
    width: 100%;
    padding: 1.5rem 2rem;
    background: var(--secondary-gradient);
    color: white;
    border: none;
    border-radius: var(--border-radius);
    font-weight: 700;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
    margin-bottom: 1rem;
}

.newsletter-submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.newsletter-submit-btn:hover::before {
    left: 100%;
}

.newsletter-submit-btn:hover {
    background: var(--primary-gradient);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(240, 147, 251, 0.4);
}

.newsletter-submit-btn:active {
    transform: translateY(-1px);
}

.newsletter-btn-text,
.newsletter-btn-loader,
.newsletter-btn-success {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    transition: all var(--transition-normal);
}

.newsletter-btn-loader,
.newsletter-btn-success {
    display: none;
}

.newsletter-submit-btn.loading .newsletter-btn-text {
    display: none;
}

.newsletter-submit-btn.loading .newsletter-btn-loader {
    display: flex;
}

.newsletter-submit-btn.success .newsletter-btn-text,
.newsletter-submit-btn.success .newsletter-btn-loader {
    display: none;
}

.newsletter-submit-btn.success .newsletter-btn-success {
    display: flex;
}

.newsletter-submit-btn.success {
    background: var(--success-gradient);
}

/* NEWSLETTER SECURITY */
.newsletter-security {
    text-align: center;
    font-size: 0.85rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.newsletter-security i {
    color: #22c55e;
}

/* NEWSLETTER SOCIAL PROOF */
.newsletter-social-proof {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    margin-top: 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.newsletter-avatars {
    display: flex;
    gap: -0.5rem;
}

.newsletter-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 0.9rem;
    border: 3px solid var(--dark-secondary);
    margin-left: -8px;
    transition: all var(--transition-normal);
}

.newsletter-avatar:first-child {
    margin-left: 0;
}

.newsletter-avatar:hover {
    transform: scale(1.1);
    z-index: 10;
}

.newsletter-social-text {
    flex: 1;
}

.newsletter-social-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-accent);
    margin-right: 0.5rem;
}

.newsletter-social-live {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-top: 0.25rem;
}

.newsletter-pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #22c55e;
    animation: newsletter-pulse-dot 1.5s infinite;
}

@keyframes newsletter-pulse-dot {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.2); }
}

/* NEWSLETTER PREVIEW */
.newsletter-preview-card {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    height: fit-content;
}

.newsletter-preview-header {
    margin-bottom: 2rem;
}

.newsletter-preview-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.newsletter-bonus-icon {
    font-size: 1.8rem;
    animation: newsletter-bounce 2s ease-in-out infinite;
}

/* NEWSLETTER FREEBIES */
.newsletter-freebies {
    margin-bottom: 2rem;
}

.newsletter-freebies-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
}

.newsletter-freebies-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.newsletter-freebie-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    transition: all var(--transition-normal);
}

.newsletter-freebie-item:hover {
    background: var(--surface-secondary);
    border-color: var(--text-accent);
    transform: translateX(5px);
}

.newsletter-freebie-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: white;
    flex-shrink: 0;
}

.newsletter-freebie-icon.pdf {
    background: var(--danger-gradient);
}

.newsletter-freebie-icon.template {
    background: var(--accent-gradient);
}

.newsletter-freebie-icon.checklist {
    background: var(--success-gradient);
}

.newsletter-freebie-icon.database {
    background: var(--warning-gradient);
    color: #1e293b;
}

.newsletter-freebie-icon.interview {
    background: var(--secondary-gradient);
}

.newsletter-freebie-content {
    flex: 1;
    min-width: 0;
}

.newsletter-freebie-content h5 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.newsletter-freebie-content span {
    font-size: 0.85rem;
    color: var(--text-muted);
}

.newsletter-freebie-value {
    text-align: right;
    flex-shrink: 0;
}

.newsletter-value-price {
    display: block;
    font-size: 0.9rem;
    color: var(--text-muted);
    text-decoration: line-through;
    margin-bottom: 0.25rem;
}

.newsletter-value-free {
    font-size: 0.8rem;
    font-weight: 700;
    color: #22c55e;
    background: rgba(34, 197, 94, 0.2);
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
}

/* NEWSLETTER TOTAL VALUE */
.newsletter-total-value {
    background: var(--surface-secondary);
    border: 2px solid var(--success-gradient);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    text-align: center;
    margin-top: 1.5rem;
}

.newsletter-total-text {
    font-size: 1rem;
    color: var(--text-secondary);
    margin-right: 1rem;
}

.newsletter-total-price {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-muted);
    text-decoration: line-through;
    margin-right: 1rem;
}

.newsletter-total-free {
    font-size: 1.3rem;
    font-weight: 800;
    color: #22c55e;
    animation: newsletter-glow 2s ease-in-out infinite;
}

@keyframes newsletter-glow {
    0%, 100% { text-shadow: 0 0 5px rgba(34, 197, 94, 0.5); }
    50% { text-shadow: 0 0 20px rgba(34, 197, 94, 0.8); }
}

/* NEWSLETTER BENEFITS */
.newsletter-benefits {
    margin-top: 2rem;
}

.newsletter-benefits-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.newsletter-benefits-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.newsletter-benefit-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.newsletter-benefit-item i {
    color: var(--text-accent);
    width: 20px;
    text-align: center;
}

/* NEWSLETTER TESTIMONIALS */
.newsletter-testimonials {
    margin-bottom: 4rem;
}

.newsletter-testimonials-title {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 2rem;
}

.newsletter-testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.newsletter-testimonial {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    transition: all var(--transition-normal);
}

.newsletter-testimonial:hover {
    background: var(--surface-secondary);
    border-color: var(--text-accent);
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.newsletter-testimonial-content {
    color: var(--text-secondary);
    font-style: italic;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.newsletter-testimonial-author {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.newsletter-testimonial-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    flex-shrink: 0;
}

.newsletter-testimonial-info {
    flex: 1;
}

.newsletter-testimonial-name {
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.95rem;
    margin-bottom: 0.25rem;
}

.newsletter-testimonial-role {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.newsletter-testimonial-rating {
    font-size: 1rem;
    flex-shrink: 0;
}

/* NEWSLETTER SUCCESS MODAL */
.newsletter-success-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    background: var(--dark-secondary);
    border: 2px solid var(--success-gradient);
    border-radius: var(--border-radius-lg);
    padding: 3rem;
    z-index: 3001;
    max-width: 600px;
    width: 90%;
    max-height: 80vh;
    overflow-y: auto;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.newsletter-success-modal.show {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}

.newsletter-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 3000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

.newsletter-overlay.show {
    opacity: 1;
    visibility: visible;
}

.newsletter-success-header {
    text-align: center;
    margin-bottom: 2rem;
}

.newsletter-success-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--success-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 2.5rem;
    color: white;
    animation: newsletter-success-bounce 0.6s ease-out;
}

@keyframes newsletter-success-bounce {
    0% { transform: scale(0.3); }
    50% { transform: scale(1.05); }
    70% { transform: scale(0.9); }
    100% { transform: scale(1); }
}

.newsletter-success-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.newsletter-success-message {
    font-size: 1.1rem;
    color: var(--text-secondary);
    line-height: 1.6;
}

.newsletter-success-bonus {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    margin: 2rem 0;
}

.newsletter-bonus-card h4 {
    color: var(--text-primary);
    font-weight: 700;
    margin-bottom: 0.75rem;
    font-size: 1.2rem;
}

.newsletter-bonus-card p {
    color: var(--text-secondary);
    line-height: 1.5;
}

.newsletter-success-actions {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.newsletter-success-btn {
    flex: 1;
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    border: none;
}

.newsletter-success-btn.primary {
    background: var(--primary-gradient);
    color: white;
}

.newsletter-success-btn.primary:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
}

.newsletter-success-btn.secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.newsletter-success-btn.secondary:hover {
    background: var(--surface-primary);
    color: var(--text-accent);
    border-color: var(--text-accent);
}

.newsletter-success-next {
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: var(--border-radius);
    padding: 1rem;
    text-align: center;
}

.newsletter-success-next p {
    color: var(--text-secondary);
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .newsletter-content-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .newsletter-form-container {
        position: static;
        order: 2;
    }
    
    .newsletter-preview-container {
        order: 1;
    }
}

@media (max-width: 768px) {
    .newsletter-section {
        padding: 4rem 0;
    }
    
    .newsletter-container {
        padding: 0 1rem;
    }
    
    .newsletter-title {
        font-size: 2rem;
    }
    
    .newsletter-urgency {
        flex-direction: column;
        gap: 1.5rem;
        padding: 1rem;
    }
    
    .newsletter-form-card {
        padding: 2rem;
    }
    
    .newsletter-form-title {
        font-size: 1.5rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .newsletter-social-proof {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .newsletter-testimonials-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .newsletter-success-modal {
        padding: 2rem;
        width: 95%;
    }
    
    .newsletter-success-actions {
        flex-direction: column;
    }
}

/* FOOTER SECTION STYLES */
.footer-section {
    background: linear-gradient(135deg, var(--dark-tertiary) 0%, #0a0a1a  100%);
    color: var(--text-secondary);
    position: relative;
    overflow: hidden;
}

.footer-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(102, 126, 234, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(240, 147, 251, 0.1) 0%, transparent 40%);
    pointer-events: none;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

/* FOOTER CONTENT */
.footer-content {
    display: grid;
    grid-template-columns: 1.2fr 2fr 1fr;
    gap: 4rem;
    padding: 4rem 0;
    border-bottom: 1px solid var(--border-primary);
}

/* FOOTER BRAND */
.footer-brand {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.5rem;
}

.footer-logo-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    transition: all var(--transition-normal);
}

.footer-logo:hover .footer-logo-icon {
    transform: rotate(10deg) scale(1.1);
}

.footer-logo-text {
    font-size: 1.8rem;
    font-weight: 800;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.footer-brand-desc {
    color: var(--text-muted);
    line-height: 1.6;
    font-size: 0.95rem;
}

/* FOOTER SOCIAL */
.footer-social {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.footer-social-link {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    text-decoration: none;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.footer-social-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    transform: scale(0);
    transition: transform var(--transition-normal);
}

.footer-social-link[data-platform="facebook"]:hover::before {
    background: #1877f2;
    transform: scale(1);
}

.footer-social-link[data-platform="twitter"]:hover::before {
    background: #1da1f2;
    transform: scale(1);
}

.footer-social-link[data-platform="linkedin"]:hover::before {
    background: #0a66c2;
    transform: scale(1);
}

.footer-social-link[data-platform="youtube"]:hover::before {
    background: #ff0000;
    transform: scale(1);
}

.footer-social-link[data-platform="github"]:hover::before {
    background: #333;
    transform: scale(1);
}

.footer-social-link:hover {
    color: white;
    border-color: transparent;
    transform: translateY(-3px);
}

.footer-social-link i {
    font-size: 1.2rem;
    position: relative;
    z-index: 2;
}

.footer-social-link span {
    display: none;
}

/* FOOTER LINKS */
.footer-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 2rem;
}

.footer-column {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.footer-column-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--border-primary);
}

.footer-column-title i {
    color: var(--text-accent);
    font-size: 1rem;
}

.footer-column-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.footer-link {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.9rem;
    transition: all var(--transition-normal);
    position: relative;
    padding-left: 1rem;
}

.footer-link::before {
    content: '→';
    position: absolute;
    left: 0;
    opacity: 0;
    transform: translateX(-10px);
    transition: all var(--transition-normal);
    color: var(--text-accent);
}

.footer-link:hover {
    color: var(--text-accent);
    transform: translateX(5px);
}

.footer-link:hover::before {
    opacity: 1;
    transform: translateX(0);
}

/* FOOTER NEWSLETTER MINI */
.footer-newsletter {
    display: flex;
    align-items: flex-start;
}

.footer-newsletter-card {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    width: 100%;
    transition: all var(--transition-normal);
}

.footer-newsletter-card:hover {
    border-color: var(--text-accent);
    box-shadow: var(--shadow-md);
}

.footer-newsletter-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-newsletter-icon {
    font-size: 1.3rem;
    animation: footer-bounce 2s ease-in-out infinite;
}

@keyframes footer-bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.footer-newsletter-desc {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.footer-newsletter-input-group {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.footer-newsletter-input {
    flex: 1;
    padding: 0.75rem 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.footer-newsletter-input:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--surface-secondary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

.footer-newsletter-btn {
    padding: 0.75rem 1rem;
    background: var(--accent-gradient);
    color: white;
    border: none;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 45px;
}

.footer-newsletter-btn:hover {
    background: var(--primary-gradient);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.footer-newsletter-stats {
    text-align: center;
    font-size: 0.8rem;
    color: var(--text-muted);
}

.footer-stats-number {
    font-weight: 700;
    color: var(--text-accent);
}

/* FOOTER BOTTOM */
.footer-bottom {
    padding: 2rem 0;
    border-bottom: 1px solid var(--border-primary);
}

.footer-bottom-content {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: 2rem;
    align-items: center;
}

/* FOOTER COPYRIGHT */
.footer-copyright {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: var(--text-muted);
}

.footer-made-with {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-heart {
    color: #ef4444;
    animation: footer-heart-beat 1.5s ease-in-out infinite;
}

@keyframes footer-heart-beat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* FOOTER LEGAL */
.footer-legal {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.footer-legal-link {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.85rem;
    transition: all var(--transition-normal);
    position: relative;
}

.footer-legal-link::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--text-accent);
    transition: width var(--transition-normal);
}

.footer-legal-link:hover {
    color: var(--text-accent);
}

.footer-legal-link:hover::after {
    width: 100%;
}

/* FOOTER CONTACT */
.footer-contact {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    text-align: right;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: var(--text-muted);
}

.footer-contact-item i {
    color: var(--text-accent);
    width: 15px;
    text-align: center;
    font-size: 0.8rem;
}

.footer-contact-item a {
    color: var(--text-muted);
    text-decoration: none;
    transition: color var(--transition-normal);
}

.footer-contact-item a:hover {
    color: var(--text-accent);
}

/* FOOTER CERTIFICATIONS */
.footer-certifications {
    padding: 1.5rem 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.footer-cert-title {
    font-size: 0.8rem;
    color: var(--text-muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.footer-cert-badges {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.footer-cert-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 20px;
    padding: 0.5rem 1rem;
    font-size: 0.75rem;
    color: var(--text-muted);
    transition: all var(--transition-normal);
}

.footer-cert-badge:hover {
    background: var(--surface-secondary);
    border-color: var(--text-accent);
    color: var(--text-accent);
    transform: translateY(-2px);
}

.footer-cert-badge i {
    color: var(--text-accent);
    font-size: 0.8rem;
}

/* BACK TO TOP */
.footer-back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: var(--accent-gradient);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 1rem 1.5rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    font-weight: 600;
    box-shadow: var(--shadow-lg);
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

.footer-back-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.footer-back-to-top:hover {
    background: var(--primary-gradient);
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.footer-back-to-top i {
    font-size: 1rem;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .footer-content {
        grid-template-columns: 1fr 1.5fr;
        gap: 3rem;
    }
    
    .footer-newsletter {
        grid-column: 1 / -1;
        margin-top: 2rem;
    }
    
    .footer-bottom-content {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        text-align: center;
    }
    
    .footer-contact {
        text-align: center;
    }
    
    .footer-contact-item {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .footer-container {
        padding: 0 1rem;
    }
    
    .footer-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 3rem 0;
    }
    
    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
    
    .footer-newsletter-card {
        padding: 1.5rem;
    }
    
    .footer-newsletter-input-group {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .footer-newsletter-btn {
        width: 100%;
        padding: 1rem;
    }
    
    .footer-social {
        justify-content: center;
    }
    
    .footer-legal {
        flex-direction: column;
        gap: 1rem;
    }
    
    .footer-certifications {
        flex-direction: column;
        gap: 1rem;
    }
    
    .footer-cert-badges {
        justify-content: center;
    }
    
    .footer-back-to-top {
        bottom: 1rem;
        right: 1rem;
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
    }
    
    .footer-back-to-top span {
        display: none;
    }
}

@media (max-width: 480px) {
    .footer-links {
        grid-template-columns: 1fr;
    }
    
    .footer-column-title {
        font-size: 1rem;
    }
    
    .footer-link {
        font-size: 0.85rem;
    }
    
    .footer-cert-badges {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
    }
    
    .footer-cert-badge {
        justify-content: center;
        padding: 0.5rem;
        font-size: 0.7rem;
    }
}

.carousel-container {
            position: relative;
            max-width: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 60px;
            box-shadow: 0 20px 40px rgba(255, 255, 255, 0.1);
            /* border: 2px solid white; */
            overflow: hidden;
        }

        .testimonial-slide {
            display: none;
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .testimonial-slide.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }

        .social-proof-testimonial-content {
            font-size: 1.4rem;
            line-height: 1.6;
            color: #fff;
            margin-bottom: 30px;
            text-align: center;
            font-style: italic;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .social-proof-testimonial-author {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: #222;
            border-radius: 15px;
            border: 1px solid #444;
            width: 60%;
        }

        .social-proof-author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(45deg, #666, #999);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            border: 2px solid #555;
        }

        .social-proof-author-info {
            flex: 1;
        }

        .social-proof-author-info h4 {
            color: #fff;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .social-proof-author-role {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .social-proof-rating {
            display: flex;
            gap: 3px;
        }

        .social-proof-star {
            color: #ffd700;
            font-size: 1.2rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #222;
            color: white;
            border: 2px solid #555;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            user-select: none;
        }

        .carousel-arrow:hover {
            background: #333;
            border-color: #777;
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-arrow.left {
            left: -25px;
        }

        .carousel-arrow.right {
            right: -25px;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #333;
            border: 1px solid #555;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            background: #fff;
            border-color: #ccc;
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .carousel-container {
                padding: 25px;
            }

            .social-proof-testimonial-content {
                font-size: 1.2rem;
            }

            .social-proof-testimonial-author {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .carousel-arrow {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .carousel-arrow.left {
                left: -20px;
            }

            .carousel-arrow.right {
                right: -20px;
            }
        }

        .social-proof-section {
  background-color: #0d0d0d;
  color: #f0f0f0;
  padding: 60px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.container {
  max-width: 1100px;
  margin: 0 auto;
}

.social-proof-intros {
  text-align: justify;
}
.social-proof-intros h2 {
  font-size: 28px;
  margin-bottom: 20px;
  color: #00ffcc;
}

.social-proof-intros ul {
  padding-left: 20px;
  list-style-type: "\1F44D";
}

.bottom-line {
  font-weight: bold;
  font-style: italic;
  color: #fff;
  margin-top: 20px;
}

.social-proof-header {
  margin-top: 60px;
  text-align: center;
}

.social-proof-title {
  font-size: 26px;
  margin-bottom: 10px;
}

.social-proof-subtitle {
  font-size: 16px;
  color: #ccc;
}

/* Carrousel */
.testimonial-carousel-wrapper {
  position: relative;
  overflow: hidden;
  margin-top: 40px;
}

.testimonial-carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.testimonial {
  min-width: 100%;
  box-sizing: border-box;
  padding: 30px;
  background-color: #1a1a1a;
  border-radius: 12px;
  text-align: center;
  opacity: 0.6;
  transform: scale(0.95);
  transition: transform 0.4s ease, opacity 0.4s ease;
}

.testimonial.active {
  opacity: 1;
  transform: scale(1);
}

.carousel-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: #00ffcc;
  color: #000;
  border: none;
  padding: 12px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 18px;
  z-index: 2;
}

.carousel-nav.prev {
  left: 10px;
}

.carousel-nav.next {
  right: 10px;
}

@media (max-width: 768px) {
  .testimonial {
    padding: 20px;
    font-size: 14px;
  }

  .carousel-nav {
    padding: 8px;
    font-size: 16px;
  }
}

/* ===============================
   RESPONSIVE DESIGN
   =============================== */

/* Tablettes intermédiaires (ex. iPad portrait, 900px) */
@media (max-width: 900px) {
    :root {
        --sidebar-width: 280px;
        --sidebar-collapsed-width: 60px;
        --header-height: 60px;
    }

    .hero-title {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
    }

    .hero-subtitle {
        font-size: 1.1rem;
        max-width: 90%;
    }

    .course-content-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .course-sidebar {
        position: static;
        order: 2;
    }

    .social-proof-trust {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .blog-system-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }

    .community-cta {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .community-cta-actions {
        justify-content: center;
    }

    .footer-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .footer-links {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }

    .footer-newsletter {
        grid-column: 1 / -1;
        margin-top: 1.5rem;
    }
}

/* Mobile (768px et moins) */
@media (max-width: 768px) {
    :root {
        --sidebar-width: 280px;
    }

    .mobile-menu-btn {
        display: block;
        z-index: 2001;
        padding: 0.75rem;
        font-size: 1rem;
    }

    .sidebar {
        width: 280px;
        transform: translateX(-100%);
        transition: transform var(--transition-normal) ease-in-out;
    }

    .sidebar.mobile-open {
        transform: translateX(0);
        box-shadow: var(--shadow-lg);
    }

    .sidebar.collapsed {
        width: 0;
        overflow: hidden;
    }

    .main-content {
        margin-left: 0;
    }

    .sidebar.collapsed + .main-content {
        margin-left: 0;
    }

    .hero-section {
        min-height: 80vh;
        padding: 1.5rem 0;
    }

    .hero-container,
    .social-proof-container,
    .blog-container,
    .community-container,
    .footer-container,
    .course-content-grid,
    .content-wrapper {
        padding: 0 1rem;
    }

    .section-container {
        padding: 2rem 0;
    }

    .hero-title {
        font-size: clamp(1.6rem, 5vw, 2rem);
    }

    .hero-subtitle {
        font-size: 1rem;
        max-width: 100%;
    }

    .hero-cta-container {
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .carousel-arrow {
        display: flex;
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }

    .carousel-arrow.left {
        left: 5px;
    }

    .carousel-arrow.right {
        right: 5px;
    }

    .social-proof-trust {
        grid-template-columns: 1fr;
    }

    .social-proof-logos {
        flex-direction: column;
        gap: 1rem;
    }

    .blog-categories {
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .blog-system-grid {
        grid-template-columns: 1fr;
    }

    .blog-system-card,
    .course-content,
    .course-sidebar,
    .community-cta,
    .testimonial-carousel-wrapper {
        padding: 1.5rem;
    }

    .carousel-container {
        padding: 1rem;
    }

    .community-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .community-cta-actions {
        flex-direction: column;
    }

    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .footer-bottom-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 1.5rem;
    }

    .footer-contact {
        text-align: center;
    }

    .footer-contact-item {
        justify-content: center;
    }

    .footer-legal {
        flex-direction: column;
        gap: 1rem;
    }

    .footer-certifications {
        flex-direction: column;
        gap: 1rem;
    }

    .footer-back-to-top {
        bottom: 1rem;
        right: 1rem;
        padding: 0.75rem 1rem;
    }

    .footer-back-to-top span {
        display: none;
    }

    h1 { font-size: clamp(1.6rem, 4.5vw, 2rem); }
    h2 { font-size: clamp(1.4rem, 4vw, 1.75rem); }
    h3 { font-size: clamp(1.1rem, 3vw, 1.25rem); }
    h4 { font-size: clamp(0.9rem, 2.5vw, 1.1rem); }
    h5 { font-size: clamp(0.85rem, 2vw, 1rem); }
    h6 { font-size: clamp(0.8rem, 1.8vw, 0.9rem); }

    .section-title,
    .blog-title,
    .community-title {
        font-size: clamp(1.6rem, 4.5vw, 2rem);
        flex-direction: column;
        gap: 0.5rem;
    }

    .document-actions {
        flex-direction: column;
        gap: 0.5rem;
    }

    .blog-system-comment-input-group {
        flex-direction: column;
        gap: 0.75rem;
    }

    .blog-system-comment-avatar-input {
        align-self: flex-start;
    }

    .course-content {
        padding: 1.5rem;
    }

    .titre {
        font-size: clamp(1.3rem, 3.5vw, 1.5rem);
    }

    /* Optimisation des performances */
    .hero-badge,
    .footer-back-to-top {
        animation: none;
    }
}

/* Petits écrans (480px et moins) */
@media (max-width: 480px) {
    .content-wrapper,
    .hero-container,
    .social-proof-container,
    .blog-container,
    .community-container,
    .footer-container,
    .course-content-grid {
        padding: 0 0.75rem;
    }

    .hero-title {
        font-size: clamp(1.4rem, 4.5vw, 1.75rem);
    }

    .hero-subtitle {
        font-size: 0.9rem;
    }

    .blog-system-grid {
        grid-template-columns: 1fr;
    }

    .blog-system-card,
    .course-content,
    .course-sidebar,
    .community-cta,
    .testimonial-carousel-wrapper {
        padding: 1rem;
    }

    .carousel-container {
        padding: 0.75rem;
    }

    .community-stats {
        grid-template-columns: 1fr;
    }

    .blog-cta-actions {
        flex-direction: column;
        gap: 0.75rem;
    }

    .footer-content {
        gap: 1.5rem;
    }

    .footer-links {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .footer-social {
        justify-content: center;
    }

    .footer-cert-badges {
        justify-content: center;
    }

    .testimonial-slide {
        margin: 0;
        padding: 0.75rem;
    }

    .social-proof-testimonial-author {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }

    .footer-newsletter-input-group {
        flex-direction: column;
        gap: 0.75rem;
    }

    .footer-newsletter-btn {
        width: 100%;
        justify-content: center;
    }
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
                        <a href="#dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#dashboard" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span class="nav-text">Home</span>
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
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-container">
                    <div class="hero-badge">
                        🔥 Plus de 10,000 téléchargements ce mois
                    </div>
                    
                    <h1 class="hero-title">
                        Boostez Vos Compétences IT avec +500 Documents gratuits
                    </h1>
                    
                    <p class="hero-subtitle">
                        Documents, formations et communauté de développeurs. 
                        Économisez des heures avec nos ressources prêtes à l'emploi et rejoignez +5000 développeurs qui nous font confiance.
                    </p>
                    
                    <div class="hero-cta-container">
                        <a href="#documents" class="hero-btn-primary">
                            <i class="fas fa-rocket"></i>
                            Documents pdf gratuits
                        </a>
                        <a href="#programming" class="hero-btn-secondary">
                            <i class="fas fa-play"></i>
                            Voir les Formations
                        </a>
                    </div>
                </div>
            </section>
            <section>
                
                <div class="carousel-container" aria-label="Témoignages et citations">
                    <!-- Flèches -->
                    <div class="carousel-arrow left" role="button" aria-label="Précédent">&#10094;</div>
                    <div class="carousel-arrow right" role="button" aria-label="Suivant">&#10095;</div>
                
                    <!-- Slide 1 -->
                    <div class="testimonial-slide active">
                        <div class="social-proof-testimonial-content">
                            "Un lecteur vit mille vies avant de mourir. Celui qui ne lit jamais n'en vit qu'une."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">SK</div>
                            <div class="social-proof-author-info">
                                <h4>— George R.R. Martin</h4>
                                <span class="social-proof-author-role">Étudiante en Génie Logiciel</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="testimonial-slide">
                        <div class="social-proof-testimonial-content">
                            "Celui qui ne lit pas n’a aucun avantage sur celui qui ne sait pas lire."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">IA</div>
                            <div class="social-proof-author-info">
                                <h4>— Mark Twain</h4>
                                <span class="social-proof-author-role">Développeur Mobile cross plateforme</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="testimonial-slide">
                        <div class="social-proof-testimonial-content">
                            "La documentation, c'est une lettre d'amour que vous écrivez à votre futur vous."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">DC</div>
                            <div class="social-proof-author-info">
                                <h4>— Damian Conway</h4>
                                <span class="social-proof-author-role">Développeur & Conférencier</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="testimonial-slide">
                        <div class="social-proof-testimonial-content">
                            "Les meilleurs programmeurs sont ceux qui n'arrêtent jamais d'apprendre. Ils lisent du code, des livres, et de la documentation tous les jours."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">JC</div>
                            <div class="social-proof-author-info">
                                <h4>— John Carmack</h4>
                                <span class="social-proof-author-role">Ingénieur logiciel & créateur de Doom</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="testimonial-slide">
                        <div class="social-proof-testimonial-content">
                            "Les bons programmeurs écrivent du code que les humains peuvent comprendre."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">MF</div>
                            <div class="social-proof-author-info">
                                <h4>— Martin Fowler</h4>
                                <span class="social-proof-author-role">Auteur & Expert en architecture logicielle</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 6 -->
                    <div class="testimonial-slide">
                        <div class="social-proof-testimonial-content">
                            "Lire de la documentation, ce n'est pas perdre du temps, c'est en gagner sur tous les projets à venir."
                        </div>
                        <div class="social-proof-testimonial-author">
                            <div class="social-proof-author-avatar">AN</div>
                            <div class="social-proof-author-info">
                                <h4>— Anonyme</h4>
                                <span class="social-proof-author-role">Développeur autodidacte</span>
                            </div>
                            <div class="social-proof-rating">
                                <span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span><span class="social-proof-star">★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Indicateurs -->
                    <div class="carousel-indicators">
                        <div class="indicator active" data-slide="0"></div>
                        <div class="indicator" data-slide="1"></div>
                        <div class="indicator" data-slide="2"></div>
                        <div class="indicator" data-slide="3"></div>
                        <div class="indicator" data-slide="4"></div>
                        <div class="indicator" data-slide="5"></div>
                    </div>
                </div>
            </section>
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Social Proof Section -->
        <section class="social-proof-section">
            <div class="social-proof-container">
                <div class="social-proof-header">
                    <!-- <h2 class="social-proof-title">
                        Ils nous font confiance
                    </h2>
                    <p class="social-proof-subtitle">
                        Découvrez pourquoi +5000 développeurs et étudiants choisissent Learnica pour accélérer leur apprentissage
                    </p> -->
                    <!-- SECTION : Témoignages avec carrousel animé -->
                    <section class="social-proof-section">
                    <div class="container">
                        <div class="social-proof-intros">
                            <h2>🎯 Confiance prouvée, savoir partagé</h2>
                            <p>
                                Chez <strong>Learnica</strong>, nous ne nous contentons pas de former — nous accompagnons chaque développeur et étudiant dans sa progression.
                            </p>
                            <p>
                                Plus de <strong>5000 passionnés</strong> nous font confiance :
                            </p>
                            <ul>
                                <li>✅ Un apprentissage clair</li>
                                <li>✅ Des documents <strong>gratuits</strong> accessibles à tous</li>
                                <li>✅ Des ressources pensées <strong>par et pour les développeurs</strong></li>
                            </ul>
                            <p class="bottom-line">
                                💬 Ils nous font confiance — découvrez pourquoi Learnica est devenue la référence pour apprendre, progresser et réussir.
                            </p>
                        </div>

                        <div class="social-proof-header">
                        <h2>💡<span class="social-proof-title">Ils nous font confiance</span></h2>
                        <p class="social-proof-subtitle">🚀 Rejoignez une communauté de plus de 5000 développeurs et étudiants qui ont choisi Learnica pour apprendre à leur rythme et propulser leurs compétences vers l’excellence.</p>
                        <p class="social-proof-subtitle">📚 Découvrez également toute une panoplie de documents gratuits pour vous accompagner tout au long de votre apprentissage.</p>
                        </div>
                        <h2>💡<span class="social-proof-title"> Ce qu'ils disent de Learnica?</span></h2>
                        <div class="testimonial-carousel-wrapper">
                        <button class="carousel-nav prev">&#10094;</button>
                        <div class="testimonial-carousel">
                            <div class="testimonial active">
                            <p>“Grâce à Learnica, j’ai enfin compris les bases du développement web.”</p>
                            <span>— Fatou, étudiante en informatique</span>
                            </div>
                            <div class="testimonial">
                            <p>“Les documents gratuits m’ont vraiment aidé à progresser sans dépenser un centime.”</p>
                            <span>— Idriss, développeur junior</span>
                            </div>
                            <div class="testimonial">
                            <p>“Une plateforme claire, simple et motivante. Je recommande Learnica à 100%.”</p>
                            <span>— Mariam, freelance développeuse</span>
                            </div>
                        </div>
                        <button class="carousel-nav next">&#10095;</button>
                        </div>
                    </div>
                    </section>
                </div>
                <!-- Trust Indicators -->
                <h3>📂<span class="social-proof-title"> Ce que vous pouvez apprendre et télécharger sur Learnica</span></h3><br>
                <div class="social-proof-trust">
                    <div class="social-proof-trust-item">
                        <div class="social-proof-trust-icon security">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h4 class="social-proof-trust-title">Informatique</h4>
                        <p class="social-proof-trust-desc">Passionné(e) de l'Informatique ? Cette plateforme est faite pour vous ! Découvrez des documents PDF gratuits sur le sujet.</p>
                    </div>
                    
                    <div class="social-proof-trust-item">
                        <div class="social-proof-trust-icon support">
                        <i class="fas fa-tags"></i>
                        </div>
                        <h4 class="social-proof-trust-title">Markéting </h4>
                        <p class="social-proof-trust-desc">Vous souhaitez gagner en competence marketing digital ? Cette plateforme est faite pour vous ! Découvrez des documents PDF gratuits sur le sujet.</p>
                    </div>
                    
                    <div class="social-proof-trust-item">
                        <div class="social-proof-trust-icon updates">
                            🖥️
                        </div>
                        <h4 class="social-proof-trust-title">Document scolaire</h4>
                        <p class="social-proof-trust-desc">Vous etes élève ou étudiant ? Cette plateforme est faite pour vous ! Découvrez des documents PDF gratuits pour booster vos connaissances.</p>
                    </div>
                    
                    <div class="social-proof-trust-item">
                        <div class="social-proof-trust-icon community">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="social-proof-trust-title">Langue</h4>
                        <p class="social-proof-trust-desc">+500 documents pdf en Anglais, espagnol et français pour apprendre à mieux s'exprimer.</p>
                    </div>
                </div>
                
                <!-- Company Logos -->
                <div class="social-proof-companies">
                    <p class="social-proof-companies-title">Qu'est-ce que vous trouverrai sur Learnica?</p>
                    <div class="social-proof-logos">
                        <a href="#" class="social-proof-logo">🏢 Documents pdf gratuits</a>
                        <a href="#" class="social-proof-logo">🏛️ Astuces informatique et digital</a>
                        <a href="#" class="social-proof-logo">💼 Formation payante en programmation</a>
                        <a href="#" class="social-proof-logo">🎓Packs de tutoriels payant et gratuit</a>
                        <a href="#" class="social-proof-logo">🏢 Packs de logiciel payant</a>
                        <!--<a href="#" class="social-proof-logo">🎯 StartupCI</a> -->
                        <a href="#programming-section" class="hero-btn-secondary"> <i class="fas fa-chevron-down"></i> Aller à la section des documents</a>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="blog-section">
            <div class="blog-container">
                <div class="blog-header">
                    <h2 class="blog-title">
                        <i class="fas fa-newspaper"></i>
                        Derniers Articles & Astuces
                    </h2>
                    <p class="blog-subtitle">
                        Restez à jour avec nos derniers tutoriels, astuces et actualités tech. 
                        Nouveau contenu chaque semaine pour booster vos compétences.
                    </p>
                    
                    <!-- Blog Categories Filter -->
                    <div class="blog-categories">
                        <button class="blog-category-btn active" data-category="all">
                            <i class="fas fa-th-large"></i>
                            Tous les articles
                        </button>
                        <button class="blog-category-btn" data-category="astuces">
                            💡 Astuces
                        </button>
                        <button class="blog-category-btn" data-category="tutoriels">
                            🎓 Tutoriels
                        </button>
                        <button class="blog-category-btn" data-category="actualites">
                            📰 Actualités
                        </button>
                        <button class="blog-category-btn" data-category="outils">
                            🛠️ Outils
                        </button>
                    </div>
                </div>
                
                <!-- Featured Article -->
                <!-- <div class="blog-featured">
                    <article class="blog-featured-card" data-category="tutoriels">
                        <div class="blog-featured-image"> -->
                            <!-- <div class="blog-featured-img-placeholder">
                                <i class="fas fa-code"></i>
                            </div> -->
                            <!-- <img class="img-articles" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0jSMt9t3ygwG9xQD8d7rfil7ltz1VISrdg&s" alt="">
                            <div class="blog-featured-badges">
                                <span class="blog-badge blog-badge-featured">⭐ Featured</span> -->
                                <!-- <img src="" alt="Image non trouvé"> -->
                                <!-- <span class="blog-badge blog-badge-category">Tutoriel</span>
                            </div>
                        </div>
                        <div class="blog-featured-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    16 Juillet 2025
                                </span>
                                <span class="blog-reading-time">
                                    <i class="fas fa-clock"></i>
                                    8 min de lecture
                                </span>
                                <span class="blog-views">
                                    <i class="fas fa-eye"></i>
                                    2.3k vues
                                </span>
                            </div>
                            
                            <h3 class="blog-featured-title">
                                Guide Complet : Créer sa un CRUD Complet en PHP et MYSQL
                            </h3>
                            
                            <p class="blog-featured-excerpt">
                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create( Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                            </p>
                            
                            <div class="blog-featured-footer">
                                <div class="blog-author">
                                    <div class="blog-author-avatar">
                                        <span>AC</span>
                                    </div>
                                    <div class="blog-author-info">
                                        <span class="blog-author-name">Apalo Coulibaly</span>
                                        <span class="blog-author-role">Lead Developer</span>
                                    </div>
                                </div>
                                
                                <div class="blog-engagement">
                                    <button class="blog-like-btn">
                                        <i class="fas fa-heart"></i>
                                        <span>127</span>
                                    </button>
                                    <button class="blog-share-btn">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <a href="#" class="blog-read-more">
                                Lire l'article complet
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div> -->
                
                <!-- Regular Articles Grid -->
                <div class="blog-grid">
                    
                    <!-- Article 1 -->
                    <!-- <article class="blog-card" data-category="astuces">
                        <div class="blog-card-image">
                            <img class="img-articles" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0jSMt9t3ygwG9xQD8d7rfil7ltz1VISrdg&s" alt=""> -->
                            <!-- <div class="blog-img-placeholder">
                                <i class="fas fa-lightbulb"></i>
                            </div> -->
                            <!-- <div class="blog-card-badges">
                                <span class="blog-badge blog-badge-hot">🔥 Hot</span>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    15 Juillet
                                </span>
                                <span class="blog-category-tag">Astuce</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                10 Extensions VS Code Indispensables pour 2025
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Découvrez les extensions qui vont révolutionner votre productivité et transformer votre expérience de développement.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 1.8k</span>
                                    <span><i class="fas fa-heart"></i> 89</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article> -->
                    
                    <!-- Article 2 -->
                    <!-- <article class="blog-card" data-category="tutoriels">
                        <div class="blog-card-image">
                            <div class="blog-img-placeholder">
                                <i class="fab fa-react"></i>
                            </div>
                            <div class="blog-card-badges">
                                <span class="blog-badge blog-badge-new">✨ Nouveau</span>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    14 Juillet
                                </span>
                                <span class="blog-category-tag">Tutoriel</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                React 18 : Les Nouvelles Fonctionnalités à Maîtriser
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Suspense, Concurrent Features, Automatic Batching... Découvrez tout ce qui change avec React 18.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 956</span>
                                    <span><i class="fas fa-heart"></i> 67</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article> -->
                    
                    <!-- Article 3 -->
                    <!-- <article class="blog-card" data-category="actualites">
                        <div class="blog-card-image">
                            <div class="blog-img-placeholder">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="blog-card-badges">
                                <span class="blog-badge blog-badge-trending">📈 Trending</span>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    13 Juillet
                                </span>
                                <span class="blog-category-tag">Actualités</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                L'IA va-t-elle Remplacer les Développeurs ?
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Analyse approfondie de l'impact de l'intelligence artificielle sur le métier de développeur et les compétences à acquérir.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 3.2k</span>
                                    <span><i class="fas fa-heart"></i> 156</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article> -->
                    
                    <!-- Article 4 -->
                    <!-- <article class="blog-card" data-category="outils">
                        <div class="blog-card-image">
                            <div class="blog-img-placeholder">
                                <i class="fas fa-tools"></i>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    12 Juillet
                                </span>
                                <span class="blog-category-tag">Outils</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                Git Flow vs GitHub Flow : Quelle Stratégie Choisir ?
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Comparaison détaillée des workflows Git les plus populaires avec exemples pratiques et recommandations.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 742</span>
                                    <span><i class="fas fa-heart"></i> 43</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article> -->
                    
                    <!-- Article 5 -->
                    <!-- <article class="blog-card" data-category="astuces">
                        <div class="blog-card-image">
                            <div class="blog-img-placeholder">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    11 Juillet
                                </span>
                                <span class="blog-category-tag">Astuce</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                Responsive Design : 5 Erreurs à Éviter Absolument
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Les pièges les plus fréquents en responsive design et comment les éviter pour une expérience utilisateur optimale.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 1.1k</span>
                                    <span><i class="fas fa-heart"></i> 78</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article> -->
                    
                    <!-- Article 6 -->
                    <!-- <article class="blog-card" data-category="tutoriels">
                        <div class="blog-card-image">
                            <div class="blog-img-placeholder">
                                <i class="fas fa-database"></i>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar"></i>
                                    10 Juillet
                                </span>
                                <span class="blog-category-tag">Tutoriel</span>
                            </div>
                            
                            <h4 class="blog-card-title">
                                Optimisation Base de Données : MongoDB vs PostgreSQL
                            </h4>
                            
                            <p class="blog-card-excerpt">
                                Guide pratique pour choisir et optimiser votre base de données selon votre projet et vos besoins spécifiques.
                            </p>
                            
                            <div class="blog-card-footer">
                                <div class="blog-stats">
                                    <span><i class="fas fa-eye"></i> 891</span>
                                    <span><i class="fas fa-heart"></i> 52</span>
                                </div>
                                <a href="#" class="blog-card-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    -->
                    
                </div>

                <div class="blog-system-container">
                    <div class="blog-system-main">
                    <div class="blog-system-grid">
                        <article class="blog-system-card" data-category="tutoriels">
                            <div class="blog-system-image">
                                <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0jSMt9t3ygwG9xQD8d7rfil7ltz1VISrdg&s" alt="CRUD PHP MySQL">
                                <div class="blog-system-badges">
                                    <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                    <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                </div>
                            </div>
                            <div class="blog-system-content">
                                <div class="blog-system-meta">
                                    <span class="blog-system-date">
                                        <i class="fas fa-calendar"></i>
                                        16 Juillet 2025
                                    </span>
                                    <span class="blog-system-reading-time">
                                        <i class="fas fa-clock"></i>
                                        8 min de lecture
                                    </span>
                                    <span class="blog-system-views">
                                        <i class="fas fa-eye"></i>
                                        2.3k vues
                                    </span>
                                </div>
                                
                                <h3 class="blog-system-title">
                                    Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                </h3>
                                
                                <p class="blog-system-excerpt">
                                    Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                </p>
                                
                                <div class="blog-system-footer">
                                    <div class="blog-system-author">
                                        <div class="blog-system-author-avatar">
                                            <span>AC</span>
                                        </div>
                                        <div class="blog-system-author-info">
                                            <span class="blog-system-author-name">Apalo Coulibaly</span>
                                            <span class="blog-system-author-role">Lead Developer</span>
                                        </div>
                                    </div>
                                    
                                    <div class="blog-system-engagement">
                                        <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                            <i class="fas fa-heart"></i>
                                            <span>127</span>
                                        </button>
                                        <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <a href="#" class="blog-system-read-more">
                                    Lire l'article complet
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                            <!-- Section Commentaires -->
                            <div class="blog-system-comments">
                                <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                    <div class="blog-system-comments-title">
                                        <i class="fas fa-comments"></i>
                                        Commentaires (3)
                                    </div>
                                    <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                </div>
                                
                                <div class="blog-system-comments-content">
                                    <!-- Formulaire de commentaire -->
                                    <div class="blog-system-comment-form">
                                        <div class="blog-system-comment-input-group">
                                            <div class="blog-system-comment-avatar-input">
                                                <span id="blog-system-user-avatar">?</span>
                                            </div>
                                            <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                        </div>
                                        <div class="blog-system-comment-form-footer">
                                            <!-- <div class="blog-system-comment-user-info">
                                                <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                            </div> -->
                                            <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                <i class="fas fa-paper-plane"></i>
                                                Publier
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Liste des commentaires -->
                                    <div class="blog-system-comments-list" id="blog-system-comments-list">
                                        <div class="blog-system-comment">
                                            <div class="blog-system-comment-author-avatar">
                                                <span>JD</span>
                                            </div>
                                            <div class="blog-system-comment-content">
                                                <div class="blog-system-comment-header">
                                                    <span class="blog-system-comment-author">Jean Dupont</span>
                                                    <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                </div>
                                                <div class="blog-system-comment-text">
                                                    Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="blog-system-comment">
                                            <div class="blog-system-comment-author-avatar">
                                                <span>MK</span>
                                            </div>
                                            <div class="blog-system-comment-content">
                                                <div class="blog-system-comment-header">
                                                    <span class="blog-system-comment-author">Marie Koffi</span>
                                                    <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                </div>
                                                <div class="blog-system-comment-text">
                                                    J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="blog-system-comment">
                                            <div class="blog-system-comment-author-avatar">
                                                <span>TN</span>
                                            </div>
                                            <div class="blog-system-comment-content">
                                                <div class="blog-system-comment-header">
                                                    <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                    <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                </div>
                                                <div class="blog-system-comment-text">
                                                    Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Deuxième article exemple -->
                        <article class="blog-system-card" data-category="javascript">
                            <div class="blog-system-image">
                                <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1DmLCy9PSJfFqO55mNTYOQLx3x8THsbokkw&s" alt="JavaScript ES6">
                                <div class="blog-system-badges">
                                    <span class="blog-system-badge blog-system-badge-category">JavaScript</span>
                                </div>
                            </div>
                            <div class="blog-system-content">
                                <div class="blog-system-meta">
                                    <span class="blog-system-date">
                                        <i class="fas fa-calendar"></i>
                                        14 Juillet 2025
                                    </span>
                                    <span class="blog-system-reading-time">
                                        <i class="fas fa-clock"></i>
                                        5 min de lecture
                                    </span>
                                    <span class="blog-system-views">
                                        <i class="fas fa-eye"></i>
                                        1.8k vues
                                    </span>
                                </div>
                                
                                <h3 class="blog-system-title">
                                    Les Nouveautés ES6 que tout développeur devrait connaître
                                </h3>
                                
                                <p class="blog-system-excerpt">
                                    Découvrez les fonctionnalités les plus importantes d'ES6 : arrow functions, destructuring, async/await et bien plus encore.
                                </p>
                                
                                <div class="blog-system-footer">
                                    <div class="blog-system-author">
                                        <div class="blog-system-author-avatar">
                                            <span>AC</span>
                                        </div>
                                        <div class="blog-system-author-info">
                                            <span class="blog-system-author-name">Apalo Coulibaly</span>
                                            <span class="blog-system-author-role">Lead Developer</span>
                                        </div>
                                    </div>
                                    
                                    <div class="blog-system-engagement">
                                        <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                            <i class="fas fa-heart"></i>
                                            <span>89</span>
                                        </button>
                                        <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                            <i class="fas fa-share"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <a href="#" class="blog-system-read-more">
                                    Lire l'article complet
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                            <!-- Section Commentaires -->
                            <div class="blog-system-comments">
                                <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                    <div class="blog-system-comments-title">
                                        <i class="fas fa-comments"></i>
                                        Commentaires (0)
                                    </div>
                                    <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                </div>
                                
                                <div class="blog-system-comments-content">
                                    <div class="blog-system-comment-form">
                                        <div class="blog-system-comment-input-group">
                                            <div class="blog-system-comment-avatar-input">
                                                <span>?</span>
                                            </div>
                                            <textarea class="blog-system-comment-input" placeholder="Soyez le premier à commenter..."></textarea>
                                        </div>
                                        <div class="blog-system-comment-form-footer">
                                            <!-- <div class="blog-system-comment-user-info">
                                                <input type="text" placeholder="Votre nom">
                                                <input type="email" placeholder="Email (optionnel)">
                                            </div> -->
                                            <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                <i class="fas fa-paper-plane"></i>
                                                Publier
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="blog-system-comments-list">
                                        <div class="blog-system-no-comments">
                                            Aucun commentaire pour le moment. Soyez le premier à donner votre avis !
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
                <!-- Blog CTA -->
                <div class="blog-cta">
                    <div class="blog-cta-content">
                        <h3 class="blog-cta-title">Envie de Plus d'Articles ?</h3>
                        <p class="blog-cta-desc">
                            Découvrez tous nos articles, tutoriels et astuces sur notre blog. 
                            Plus de 200 articles pour vous aider à progresser !
                        </p>
                        <div class="blog-cta-actions">
                            <a href="#" class="blog-cta-btn primary">
                                <i class="fas fa-blog"></i>
                                Voir Tous les Articles
                            </a>
                            <a href="#" class="blog-cta-btn secondary">
                                <i class="fas fa-rss"></i>
                                S'abonner au Blog
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

<!-- Community Section -->
<section class="community-section">
    <div class="community-container">
        <div class="community-header">
            <h2 class="community-title">
                <i class="fas fa-users"></i>
                Rejoignez Notre Communauté
            </h2>
            <p class="community-subtitle">
                +5000 développeurs s'entraident, partagent leurs expériences et progressent ensemble. 
                Posez vos questions, trouvez des solutions et créez des connexions !
            </p>
        </div>
        
        <!-- Community Stats -->
        <div class="community-stats">
            <div class="community-stat-card">
                <div class="community-stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="community-stat-content">
                    <span class="community-stat-number" data-counter="5247">0</span>
                    <span class="community-stat-label">Membres Actifs</span>
                </div>
            </div>
            
            <div class="community-stat-card">
                <div class="community-stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="community-stat-content">
                    <span class="community-stat-number" data-counter="12893">0</span>
                    <span class="community-stat-label">Discussions</span>
                </div>
            </div>
            
            <div class="community-stat-card">
                <div class="community-stat-icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="community-stat-content">
                    <span class="community-stat-number" data-counter="8456">0</span>
                    <span class="community-stat-label">Questions Résolues</span>
                </div>
            </div>
            
            <div class="community-stat-card">
                <div class="community-stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="community-stat-content">
                    <span class="community-stat-number">< 2h</span>
                    <span class="community-stat-label">Temps de Réponse</span>
                </div>
            </div>
        </div>
        
        <!-- Community Content Grid -->
        <!-- <div class="community-content-grid"> -->
            
            <!-- Live Discussions -->
            <!-- <div class="community-card">
                <div class="community-card-header">
                    <h3 class="community-card-title">
                        <i class="fas fa-fire"></i>
                        Discussions du Moment
                    </h3>
                    <div class="community-live-indicator">
                        <span class="community-pulse"></span>
                        Live
                    </div>
                </div>
                
                <div class="community-discussions">
                    <div class="community-discussion-item">
                        <div class="community-discussion-avatar">
                            <span>KS</span>
                            <div class="community-online-status"></div>
                        </div>
                        <div class="community-discussion-content">
                            <h4 class="community-discussion-title">
                                Optimiser les performances React - Hook useCallback
                            </h4>
                            <div class="community-discussion-meta">
                                <span class="community-author">Kouadio Serge</span>
                                <span class="community-time">il y a 5 min</span>
                                <span class="community-replies">
                                    <i class="fas fa-reply"></i> 12 réponses
                                </span>
                            </div>
                            <div class="community-discussion-tags">
                                <span class="community-tag react">React</span>
                                <span class="community-tag performance">Performance</span>
                            </div>
                        </div>
                        <div class="community-discussion-activity">
                            <span class="community-activity-count">🔥 23</span>
                        </div>
                    </div>
                    
                    <div class="community-discussion-item">
                        <div class="community-discussion-avatar">
                            <span>MA</span>
                            <div class="community-online-status"></div>
                        </div>
                        <div class="community-discussion-content">
                            <h4 class="community-discussion-title">
                                Déploiement Laravel sur OVH - Erreur 500
                            </h4>
                            <div class="community-discussion-meta">
                                <span class="community-author">Marie Adjoua</span>
                                <span class="community-time">il y a 12 min</span>
                                <span class="community-replies">
                                    <i class="fas fa-reply"></i> 8 réponses
                                </span>
                            </div>
                            <div class="community-discussion-tags">
                                <span class="community-tag laravel">Laravel</span>
                                <span class="community-tag deployment">Déploiement</span>
                            </div>
                        </div>
                        <div class="community-discussion-activity">
                            <span class="community-activity-count">🆘 URGENT</span>
                        </div>
                    </div>
                    
                    <div class="community-discussion-item">
                        <div class="community-discussion-avatar">
                            <span>IB</span>
                        </div>
                        <div class="community-discussion-content">
                            <h4 class="community-discussion-title">
                                Conseils pour débuter en Machine Learning
                            </h4>
                            <div class="community-discussion-meta">
                                <span class="community-author">Ibrahim Bakayoko</span>
                                <span class="community-time">il y a 1h</span>
                                <span class="community-replies">
                                    <i class="fas fa-reply"></i> 15 réponses
                                </span>
                            </div>
                            <div class="community-discussion-tags">
                                <span class="community-tag ai">IA</span>
                                <span class="community-tag beginner">Débutant</span>
                            </div>
                        </div>
                        <div class="community-discussion-activity">
                            <span class="community-activity-count">💡 HOT</span>
                        </div>
                    </div>
                </div>
                
                <div class="community-card-footer">
                    <a href="#" class="community-view-all">
                        Voir toutes les discussions
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> -->
            
            <!-- Top Contributors -->
            <!-- <div class="community-card">
                <div class="community-card-header">
                    <h3 class="community-card-title">
                        <i class="fas fa-trophy"></i>
                        Top Contributeurs du Mois
                    </h3>
                </div>
                
                <div class="community-contributors">
                    <div class="community-contributor-item rank-1">
                        <div class="community-contributor-rank">🥇</div>
                        <div class="community-contributor-avatar">
                            <span>AC</span>
                            <div class="community-contributor-level">PRO</div>
                        </div>
                        <div class="community-contributor-info">
                            <h4 class="community-contributor-name">Apalo Coulibaly</h4>
                            <div class="community-contributor-stats">
                                <span>156 réponses</span>
                                <span>89% acceptées</span>
                            </div>
                            <div class="community-contributor-badges">
                                <span class="community-badge expert">Expert React</span>
                                <span class="community-badge mentor">Mentor</span>
                            </div>
                        </div>
                        <div class="community-contributor-score">
                            <span class="community-score">2,847</span>
                            <span class="community-score-label">points</span>
                        </div>
                    </div>
                    
                    <div class="community-contributor-item rank-2">
                        <div class="community-contributor-rank">🥈</div>
                        <div class="community-contributor-avatar">
                            <span>FK</span>
                            <div class="community-contributor-level">ADV</div>
                        </div>
                        <div class="community-contributor-info">
                            <h4 class="community-contributor-name">Fatou Keita</h4>
                            <div class="community-contributor-stats">
                                <span>134 réponses</span>
                                <span>92% acceptées</span>
                            </div>
                            <div class="community-contributor-badges">
                                <span class="community-badge expert">Expert Flutter</span>
                            </div>
                        </div>
                        <div class="community-contributor-score">
                            <span class="community-score">2,156</span>
                            <span class="community-score-label">points</span>
                        </div>
                    </div>
                    
                    <div class="community-contributor-item rank-3">
                        <div class="community-contributor-rank">🥉</div>
                        <div class="community-contributor-avatar">
                            <span>YT</span>
                            <div class="community-contributor-level">INT</div>
                        </div>
                        <div class="community-contributor-info">
                            <h4 class="community-contributor-name">Youssouf Traoré</h4>
                            <div class="community-contributor-stats">
                                <span>98 réponses</span>
                                <span>87% acceptées</span>
                            </div>
                            <div class="community-contributor-badges">
                                <span class="community-badge helper">Helper</span>
                            </div>
                        </div>
                        <div class="community-contributor-score">
                            <span class="community-score">1,923</span>
                            <span class="community-score-label">points</span>
                        </div>
                    </div>
                </div>
                
                <div class="community-card-footer">
                    <a href="#" class="community-view-all">
                        Voir le classement complet
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> -->
            
            <!-- Quick Help -->
            <!-- <div class="community-card">
                <div class="community-card-header">
                    <h3 class="community-card-title">
                        <i class="fas fa-question-circle"></i>
                        Aide Rapide
                    </h3>
                </div>
                
                <div class="community-quick-help">
                    <div class="community-help-item">
                        <div class="community-help-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="community-help-content">
                            <h4>Posez une Question</h4>
                            <p>Obtenez de l'aide de la communauté en quelques minutes</p>
                            <button class="community-help-btn">
                                <i class="fas fa-plus"></i>
                                Nouvelle Question
                            </button>
                        </div>
                    </div>
                    
                    <div class="community-help-item">
                        <div class="community-help-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="community-help-content">
                            <h4>Rechercher</h4>
                            <p>Trouvez des solutions dans notre base de connaissances</p>
                            <div class="community-search-box">
                                <input type="text" placeholder="Rechercher..." class="community-search-input">
                                <button class="community-search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="community-help-item">
                        <div class="community-help-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="community-help-content">
                            <h4>Guides Débutants</h4>
                            <p>Consultez nos guides pour bien commencer</p>
                            <a href="#" class="community-help-link">
                                Voir les guides
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            
        <!-- </div> -->
        
        <!-- Community CTA -->
        <div class="community-cta">
            <div class="community-cta-content">
                <div class="community-cta-text">
                    <h3 class="community-cta-title">Prêt à Rejoindre la Communauté ?</h3>
                    <p class="community-cta-desc">
                        Créez votre compte gratuit et commencez à échanger avec +5000 développeurs passionnés ! 
                        Posez vos questions, partagez vos connaissances et progressez ensemble.
                    </p>
                    <div class="community-cta-features">
                        <div class="community-feature">
                            <i class="fas fa-check"></i>
                            <span>Accès gratuit à vie</span>
                        </div>
                        <div class="community-feature">
                            <i class="fas fa-check"></i>
                            <span>Support prioritaire</span>
                        </div>
                        <div class="community-feature">
                            <i class="fas fa-check"></i>
                            <span>Notifications en temps réel</span>
                        </div>
                    </div>
                </div>
                
                <div class="community-cta-actions">
                    <button class="community-cta-btn primary">
                        <i class="fas fa-user-plus"></i>
                        Créer mon Compte
                    </button>
                    <button class="community-cta-btn secondary">
                        <i class="fas fa-eye"></i>
                        Explorer en Guest
                    </button>
                </div>
            </div>
            
            <!-- Online Members -->
            <div class="community-online-members">
                <h4 class="community-online-title">
                    <span class="community-pulse-green"></span>
                    127 membres en ligne
                </h4>
                <div class="community-online-avatars">
                    <div class="community-online-avatar" title="Kouadio Serge - En ligne">KS</div>
                    <div class="community-online-avatar" title="Marie Adjoua - En ligne">MA</div>
                    <div class="community-online-avatar" title="Ibrahim Bakayoko - En ligne">IB</div>
                    <div class="community-online-avatar" title="Fatou Keita - En ligne">FK</div>
                    <div class="community-online-avatar" title="Youssouf Traoré - En ligne">YT</div>
                    <div class="community-online-avatar" title="Aminata Diallo - En ligne">AD</div>
                    <div class="community-online-more">+121</div>
                </div>
            </div>
        </div>
        
    </div>
</section>


<!-- FAQ Section -->
<section class="faq-section">
    <div class="faq-container">
        <div class="faq-header">
            <h2 class="faq-title">
                <i class="fas fa-question-circle"></i>
                Questions Fréquentes
            </h2>
            <p class="faq-subtitle">
                Toutes les réponses à vos questions ! Si vous ne trouvez pas ce que vous cherchez, 
                notre équipe support répond en moins de 2h.
            </p>
            
            <!-- FAQ Search -->
            <div class="faq-search-container">
                <div class="faq-search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="faq-search-input" placeholder="Rechercher dans les FAQ..." />
                    <div class="faq-search-suggestions">
                        <span class="faq-suggestion" data-keyword="prix">Prix</span>
                        <span class="faq-suggestion" data-keyword="gratuit">Gratuit</span>
                        <span class="faq-suggestion" data-keyword="support">Support</span>
                        <span class="faq-suggestion" data-keyword="téléchargement">Téléchargement</span>
                    </div>
                </div>
                <div class="faq-search-results">
                    <span class="faq-results-count">0 résultat trouvé</span>
                </div>
            </div>
        </div>
        
        <!-- Newsletter Success Modal -->
        <div class="newsletter-success-modal" id="successModal">
            <div class="newsletter-success-content">
                <div class="newsletter-success-header">
                    <div class="newsletter-success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="newsletter-success-title">🎉 Félicitations !</h3>
                    <p class="newsletter-success-message">
                        Votre pack de 5 documents premium vous attend dans votre boîte email !
                    </p>
                </div>
                
                <div class="newsletter-success-bonus">
                    <div class="newsletter-bonus-card">
                        <h4>🎁 BONUS SURPRISE !</h4>
                        <p>Vous recevrez aussi notre <strong>Mini-Cours Gratuit</strong> "10 Astuces pour Coder 2x Plus Vite" (valeur 99€)</p>
                    </div>
                </div>
                
                <div class="newsletter-success-actions">
                    <button class="newsletter-success-btn primary" onclick="closeSuccessModal()">
                        <i class="fas fa-envelope"></i>
                        Vérifier mes Emails
                    </button>
                    <button class="newsletter-success-btn secondary" onclick="closeSuccessModal()">
                        <i class="fas fa-share"></i>
                        Partager avec des Amis
                    </button>
                </div>
                
                <div class="newsletter-success-next">
                    <p>📧 <strong>Prochaine étape :</strong> Vérifiez votre email (regardez aussi dans les spams) et cliquez sur le lien de confirmation pour recevoir vos documents !</p>
                </div>
            </div>
        </div>
        
        <!-- Newsletter Overlay -->
        <div class="newsletter-overlay" id="modalOverlay"></div>
        
    <!-- </div>
</section> -->
                <section>
                            <div class="blog-system-container">
                                <div class="blog-system-main">
                                <div class="blog-system-grid">
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0jSMt9t3ygwG9xQD8d7rfil7ltz1VISrdg&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://www.zdnet.com/a/img/resize/c1f0b18c5103c9f8a24bd6d69867e9e2b7481374/2024/08/06/52bdc831-6280-4959-bb55-61b60c7cb40c/kali.jpg?auto=webp&fit=crop&height=1200&width=1200" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
                                                </div>
                                                <div class="blog-cta-actions">
                                                    <a href="#" class="blog-cta-btn primary">
                                                        <i class="fas fa-blog"></i>
                                                        Télécharger
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://t7m8e9c8.delivery.rocketcdn.me/wp-content/uploads/2020/11/virtualbox-maquina-virtual.jpg" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVju6n-e6XPJpgk6L8Qxx4Xp1_GDDIEEmr5A&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0O51Z8asIJuq544EYoRlsqJl8CSxxiZ8r-A&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxANDw0PDw0QDw8OEA0NDw8NDRAODQ8NFhEaFhgRFRUYKDQgGBolGxMWITEhJikrLi4uFyEzODM4Nyg5LisBCgoKDg0OGhAQGSslHR0uMisrLSszLjAtLS83LS4rKy0vKys2Ny0tKy8tLS4rLS4rKystLS0tLS0tMC0tLy0tLf/AABEIAOsA1gMBEQACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAAAQIEBQYHAwj/xABMEAACAQIBBQgMCgkEAwAAAAAAAQIDEQQFBhIhMRNBUVRhcYGRBxQiMlJyoaKxwdHSM1NiY3OCk5SysxYXJDRCkuHi8BWDwvEjJTX/xAAaAQEBAAMBAQAAAAAAAAAAAAAAAQIEBQMG/8QAOhEBAAECAgQLBgYDAAMAAAAAAAECAwQRITFRUgUSExQyQWFxgaGxYpHB0eHwFSMzNEKiIlNjJHLx/9oADAMBAAIRAxEAPwD3EAAAAAAADR5azpw2Dbg5OpVW2nSs3F/KeyPNt5D3t4euvT1PC5iKKNHW5TG5+4id9ypU6S+VerPr1LyG3Tg6I1zm1KsZXOqMmmxGcuNqd9i6i+jcaX4Ej1ixbj+Lym/cn+TAq5Qrz77EVpeNWqS9LPSKKY6oefHq2yxpzb2tvnbZUzlVTa2NrmdgPpDH1o97Xqx8WrOPoZjxaZ6oZcerbLLoZyY2n3uMrfXnuv47mE2bc/xhnF65GqqW4yf2QsXTaVaNPER37rcqj6Y6vNPKrCUTq0PWnF1xr0u5yBnNhserU5ONVK8qNS0aiXCt6S5V0mlcs1W9epu271NzVrbo8nqAAAAAAAAAAAAAAAAAHM58ZclhKUaVKWjVr6XdLbCmtslwN3sungNrDWorqznVDVxV2aKco1y8ybOm5jNwWRsTiI6VHD1Jx8JLRi+ZvU+g86rtFOiZelNquqM4hh4vDVKMnCrTlTmtejOLi7cKvtXKZU1RVGcSxqpmmcph8GzJiq2RVWwKtgVYVVgTTqyhKM4ScJwalGUW1KMlvp7xJjPRJE5aYeu5kZy/6hScalliKNlUtqVSL2VEujWt586OXfs8nOjVLqWL3KRp1w6U8HuAAAAAAAAAAAAAAAAPL+yBW0sdNfF06UPJp/8AM6mEjK33uXi5zudzXZs4COKxdClPXBtzmuGEYuWj02S6T0vV8SiZh52aOPXES9ghFRSSSSSSSSsklvJHHdhpc8MmQxOErXS06MJ1qUv4oyir2vwNKz/oe2HrmmuO1436IronsePtnWclVsCrYFWFVYFWyCrYG5zNyg8Nj8LJPVUmsPNcMKj0dfIpOL+qeV+njW5jxetmri3Inwe3HJdYAAAAAAAAAAAAAAAAeT58P/2GK/2fyYHWw36UffW5OJ/Vn76muyJlF4TE0a9tJU5PSitsoNOMkuWzfTYzuUcemaWFuviVRU9gwGPpYmCqUakakXvxetPga2p8jORVRNM5TDr01xVGcS57PjOGlQoVcPCalXrRlScYu+5wkrSlLgdm7LbrNjD2ZqqiqdUNfE3oppmmNcvLGzpOaq2BVsKqwIbAq2QVbCvvkt/tGG+nofmIxr6M9y0dKO9+gTjOyAAAAAAAAAAAAAAAAPJc+P8A6OK/2fyYHWw36UffW5OJ/Vn76mhbPd4K33+joIqgFWwKthUMCrYFWyCrYVVsD75Lf7Rhvp6H5iMa+jPcyo6Ud79BnGdgAAAAAAAAAAAAAAAAchl3Mp4zE1cR22qe6aHcdr6dtGCjt0lfvb7N827WK4lMU5au1qXcLx65q42vsYH6uHx5fdf7z0577Pn9HnzKd7y+qv6tnx9fdf7xz32fP6HMp3vL6o/Vq+Pr7p/eOe+z5/Q5lO95fVH6tHx9fdH74577Pn9DmU73l9UfqzfH190fvk577Pn9F5lO95fVwmNobjVrUr6W5VKlLStbS0ZON7b2w3KZziJ2tOqMpmNjHbKirYFWwqrYGRkt/tGG+nofmIxr6M9zKjpR3v0IcZ2AAAAAAAAAAArUmopylJRjFNuUmlFJb7e8IjPUTOTkcrZ90qbccPTdZrVukm4Ur8m/Lyc5uW8HVOmqcmncxlMaKYzc7iM9cdPZUhT5KdKL/Hc2IwtuOprzirksd535Q42/saHumXNrW76sec3d70VeeGUONv7HD+6ObWt31Oc3d70Q88cocbf2GH90c2tbvqc5u73oq88socbf2GH90c2tbvqc4u73oh55ZR42/sMP7o5ta3fU5xd3vRV555R44/sMP7pObWt31XnF3e9EPPTKPHH9hh/dHN7W76nOLu96KvPTKXHH9hh/dHN7W76nOLu96NFXrSqSnObvKcpTk7JXnJ3bstS1s9ojKMoeUznOcvk2EVbCqNgVbAyMl/vGG+nofmIxr6M9zKjpR3vf8ZUcY3Ts7pbx8zj7tdq1xqJynN3LVMVVZSwu2p+F5InG5/iN/wAo+TZ5KjYdtT8LyRHP8Rv+UfI5KjYtHGzW2z51Y9aOE71PSyn77GM2KZ1MyhiFPZqe+mdfDYui/GjROx4V25pfY2nmAAAESaSbbslrbepJAeXZ2Zxyxs3TptrDQfcpat1a/jlycC9ezq2LEW4znW5V+/Nyco1OdZsNdDYFWwKNgVbIqrYFWwKsKhgVbIKtgVbCqtgVbAq2QZOSv3jDfT0PzESvoz3MqelHe99x/edKPleE/wBDxh3rHSa4+ebaLgQRUxm4tNOzRaLlVFUVUzpgmmJjKW3oVdOKlw7eRn1eHvxetxXHX6ufXTxZyfQ92IAA5fsgZSdHDKlF2niW4Ph3Ja59d4rmkzawlHGrznqauLr4tGUdbzRnTcxVsCrYFWwKtkVVsCrYFWFVYFWyCrYFWwqrYFWwKtgQQZWSv3jDfT0PzESvoz3MqelHe99yh3nSj5XhT9Dxh3rHSa258620XIqGyKi5BmZLqa5R4VpLn/z0HX4IvZV1W569P399TXxFOiJbI77UAAHmfZDxWnjFTvqo04RtwTl3T8jidPCU5W89rmYurO5lscs2bTVVbAq2BVsiqtgVbAq2FVYENkFGwKthVWwKtgVbAggAbXNTBvEY/BU18dTqPxKb3SXkizC7VxaJl6WqeNXEPb8pS7mK4XfoS/qfJ8LV5W6ads/fq7uHjTMtfc4DbVuYqi5FRcg+mFnozg+VLoer1mxg7nEv0VdvroY3Kc6JhvD7BzQAB43nHX3XGYuXz1SK5oPQXkijs2Yyt0x2ONenO5VPa1jZ6PNVsCrZFVbAq2BVsKqwIbAq2QVbCqtgVbAq2BUgAAPVOxjm5LDwljK0dGpWjoUYyXdQoOzcmt5yaXQlw2NDFXc54sdTfw1qYjjT1umxlbTk7bFqXtPjMfiOWuzlqjRDs2qOLSx7mi9UNkzVW5iqLkzEXJmroacrpPhSZ9xbr49EVbYzcqqMpyWM0APDcTU0p1JeFOcut3O5EZRk4dU5zMvi2VFWyKq2BRsCrYVDAq2Bl4TJGJrpOlha1SL1qUaU9B/W2eUwquU065Z026qtUSynmrj+JVeqPtMOXt7WXIXN1V5qZQ4lV6o+0cvb2ryFzdQ808ocSq+b7Ry9vachc2KvNPKHEavm+0cvb2nIXN1H6JZQ4jV832k5e3tOQubqP0RyhxGr5vtHL29pyNzdZGFzHyjVaXarprwqtSnCK51e/UiTiLcdaxh7k9Tts2ex5Sw0o1cVNYirG0owSth4S4bPXN89lyb5q3cVNUZU6IbVrCxTpq0y6nG4vbGL536kfM4/hCJibdqe+fhHzdS1Z/lU19ziNpFyCCKi5M1QRUXMcxvcE706fipdWo+ywM54ajuhzL0ZVy+5tvMA8IqKza4G11Hchw5UbAq2BVsCrYVVgZmR8lVsbVVGjG8tspPVCnHwpPeRhXciiM5Z0W5rnKHqWQsz8Lgkpyiq1ZWbq1krRfyIvVH08pzL2KmYmZnKHRtYamntlu542K2XfMtRyK+E7NM5RnP32t2LFUqdvrwX1o8vxajdllyE7Tt9eC+tD8Wo3ZOQnadvrwX1ofi1G7JyE7Tt9eC+tD8Wo3ZOQnadvrwX1on4tRuyc3naj/UF4L60Pxejdk5vO1WWUeCHWzCrhjdo98rGH2yxq2KlPa7LgWpHOv429e0VTo2Rqe1FqmnU+FzTeqLkVW5BBioRVbkEXIre5O+ChzP0n2HBv7Wju+LmX/1JZJvPIA8RyzS3PE4qHg168Vzabt5DtW5zoiexxbkZVzHawWzJiq2BVsCrCppU5VJRhCLlOcowjFbZTbskulkmctMkRnoh7Tm5kank3DKCs5u0q1RLXUqcnItiRxcViYiJuVaodixZ4sRTGtatWc3d7N5byPlMRia79WdWrqjY6NFEUxofM12YAAARcgi5FQ2RUXIKtmOaoIqLkzVBBBFQ2YqhsiqtkHRYONqdNfJj6D7bBU8XD247I9HKuznXPe+xtPMA8kz9w25Y+s96qqdZczjovzoyOrhqs7cdjlYmnK5Pa5xs93gq2BVsKhgdT2NsCq2O05K6w9OdVcG6PuY+SUn0GtiqsqMtrZwtOdeex6ZlCprUeDW+c+R4Vu51Rbjq0u3Yp0ZsM5DYAAACCKi5BW5iqLkVFyCCKgioMVRcmYrciouRUXIqacdKUYr+JpdbMrdE3K4oj+U5JVPFiZ2OmSsfexGUZQ4ySgBwPZSwWrDYhLY5UJvn7qPon1m9g6tdPi0cZTqq8HnzZvNFVsKqwKtkHfdiRd3jn8nDemp7DTxmqnxbuD11eHxdpjPhJdHoPi+EJ/8AIq8PSHbtdCHwNJ6AEXIIuRUXIqLkENkzVW5iqLkzEEVBFRciouQQ2Yqq2RUEVnZHpaVTS3oK/S9S9Z1uBrHHv8edVEec6I+LWxVeVGW1vD6xzQABgZcybHGYetQlq3SPcy8GotcZdDSM7dfEqiphco49M0vEsVQnRnOnUi4zpycJxe9Jf5tOxExMZw5ExMTlL4MqIbAq2Qd92I+/x/i4X01DTxmqnx+Ddweurw+LtMZ8JLo9CPiuEP3FXh6Q7droQ+JpvRFyKi5BDZFVbMVRcggiouTNUEVFzHMRciqtkVFyCLkzVBFQQdDk3D7nTSffS7qXI+A+z4MwvN7ERV0p0z8vCPNyr9zj16NUMo6DxAAADl88M0o49brSap4mKtd6oVYrZGdtj4Jf4tixfm3onU179iLmmNby3KWTq2EloV6M6TvZaa7mXiy2S6GdKmumqM6Zc6qiqicqoYbZWKrYHf8AYi7/AB/i4X01DSxmqnx+Ddweurw+Ltcb8JLo9CPi+EP3FXh6Q7droQxzSeqGzFUXIIuRUXIqtyZiDHNQiq3JmIuRUNkzVFzFUXJmIIolfUtb4FrYiJmco1k6G0ydk5pqdRWtrjHfvws+h4N4KqiqLt6NWqPjPyaV/ERlxaW2PomiAAAAABWcFJNSSkntTV0+gDAnkHByd3gsM3wvDUm/QZ8rXvSw5Kif4wj9H8FxDC/daPsLyte9PvTkre7HuZGDydQw+k6OHpUXOyluNKFPSte19Fa7XfWY1V1Va5ZU0U06oyYmN+El0ehHy3CP7mrw9IdCz0IY7ZovVFyCrZjmqCKhskyrbUnR0Y33K9le+je9j6a1OB5OnjcTPKM+i0auVznLPzWvQ+a8wzzwH/P+rH87t8y9D5rzBnwf/wA/6r+d2+ZfD/M+YM+D/wDn/U/O7fNF8P8AM+YTPg//AJ/1Pzva8xdr/M+YWPw+Zyjk/wCp+d7Xm+vatP4uH8kTY5nh/wDXT7oefK170+87Vp/Fw/kiOZ4f/XT7oXla96fedq0/i4fyRHM8P/rp90HK170+99IU4x72KXMkj2otUUdCmI7mE1TOuVjNAAAAAAAAAAAAajHfCS+r+FHy3CP7mrw9Ib1noQx7mi9kXIIIqCKgxVFyZityKi5FRciouYi1HvoeNH0npZ/Vp749Uq6MunPvnGAAAAAAAAAAAAAAAAGnx/wk/q/hR8rwl+5r8PSG/Z6EMa5oPZFyZiCKgiouRUXIIbMVZGCwjrN67RW1+pG9gcDViqp05Uxrn4R96HldvRbjtZ0skwtqlJPhdmuo7FXAdmaf8apz8PTJrRi6s9MQ1WIounJxltXU1wnzuIsV2Lk269cefa3aK4rpzhWj30PGj6TCx+rT3x6rX0ZdQffuMAAAAAAAAAAAAAAAANRlKNqj5Un6vUfL8K08XETO2In4fBv4ec6GJc5ub3QRUXMcxFyKq2RUXIIuTNW7yO1uWrbpSvz/APVj6zgaaZw0Za85z++7JzsVnyjOOq1mny5bShw6LvzX1es+Z4emOUojryn6fFv4PPiywcLHSqU1wyj1XOThaJrv0Uxtj1bNycqJnsdMfeOOAAAAAAAAAAAAAAAAMXH4fdI3XfR2cq4DncJYSb9vOnpU6u3se1i5xJ06paZnyk6HRVuQRciobIqLmKouQQRX3weLlRd1rT2xex+w3MHjbmFqzp0xOuPvVLyu2ouRpZ8ssK2qm78rVjsVcPU8X/Gic+2dDWjBznplq61Vzk5Sd2+rmOBevV3q5rrnTLcppimMobPI+Ea/8klvWgv+R3eBsFMfn1x/6/P5f/Gnirv8I8W1PoWkAAAAAAAAAAAAAAAAAGJi8DGprXcy4d585zsZwbbxH+UaKtu3ve9q/NGjqaqvhZ09sdXCta/ofOYjBX7HSp0bY0x99+Tdou0V6pY9zTzeqLkVBFQQAAH1o4edTvYt8u91nvZw129P5dMz6e/UwruU0dKW0wmS1G0qlpPwV3q5+E+gwfA1NE8e9pnZ1fX072ndxUzop0NkdxpgAAAAAAAAAAAAAAAAAAAAPjVwlOffQXOtT60at3BYe706I9J98aXpTdrp1SxZ5JpvY5LpTXlNCvgSxV0ZmPvt+b2jF1xriHyeRuCr1wv6zXq4B2XPL6s+eeyhZG+d8z+pI4A23PL6rzz2fN9YZIgtspPqSPejgKzHSqmfd8mE4yrqiGRTwNKOyCfjd16TdtcG4a3qojx0+rxqv3Ktcsk3nkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACNICNMCNMBugDdAGmBOmBOkAuBIAAAAAAAAAAAAAAAAAAo2BVsCjYFXICNICNIBpANICykBKYF0wLJgXTAkAAAAAAAAAAAAAAABVxAq4AVcAKuAFdABoANABoASoAWUALKAF1ECwAAAAAAAAAAAAAAAAAAAAIsAsBFgFgJsAsBIAAAAAAAAAAAAAP/9k=" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                </section>
                <div>
                    <a href="/documents" class="blog-cta-btn primary">
                        <span>🚀 Voir tous les articles </span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Programming Articles Section -->
                <section class="section-container" id="programming-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-code"></i>
                            Documents gratuits
                        </h2>
                        <p class="section-subtitle">Découvrez des packs de tutoriels, de document pdf et guides sur les langages de programmation dans toutes les plateforme(Mobile, web et desktop).</p>
                    </div>
                  

                    <!-- <div class="programming-grid">
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
                                   
                                </div>
                            </div>
                        </article>

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
                    </div> -->
                            <div class="blog-system-container">
                                <div class="blog-system-main">
                                <div class="blog-system-grid">
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0jSMt9t3ygwG9xQD8d7rfil7ltz1VISrdg&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                           
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://www.zdnet.com/a/img/resize/c1f0b18c5103c9f8a24bd6d69867e9e2b7481374/2024/08/06/52bdc831-6280-4959-bb55-61b60c7cb40c/kali.jpg?auto=webp&fit=crop&height=1200&width=1200" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://t7m8e9c8.delivery.rocketcdn.me/wp-content/uploads/2020/11/virtualbox-maquina-virtual.jpg" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVju6n-e6XPJpgk6L8Qxx4Xp1_GDDIEEmr5A&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0O51Z8asIJuq544EYoRlsqJl8CSxxiZ8r-A&s" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-system-card" data-category="tutoriels">
                                        <div class="blog-system-image">
                                            <img class="blog-system-img" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxANDw0PDw0QDw8OEA0NDw8NDRAODQ8NFhEaFhgRFRUYKDQgGBolGxMWITEhJikrLi4uFyEzODM4Nyg5LisBCgoKDg0OGhAQGSslHR0uMisrLSszLjAtLS83LS4rKy0vKys2Ny0tKy8tLS4rLS4rKystLS0tLS0tMC0tLy0tLf/AABEIAOsA1gMBEQACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAAAQIEBQYHAwj/xABMEAACAQIBBQgMCgkEAwAAAAAAAQIDEQQFBhIhMRNBUVRhcYGRBxQiMlJyoaKxwdHSM1NiY3OCk5SysxYXJDRCkuHi8BWDwvEjJTX/xAAaAQEBAAMBAQAAAAAAAAAAAAAAAQIEBQMG/8QAOhEBAAECAgQLBgYDAAMAAAAAAAECAwQRITFRUgUSExQyQWFxgaGxYpHB0eHwFSMzNEKiIlNjJHLx/9oADAMBAAIRAxEAPwD3EAAAAAAADR5azpw2Dbg5OpVW2nSs3F/KeyPNt5D3t4euvT1PC5iKKNHW5TG5+4id9ypU6S+VerPr1LyG3Tg6I1zm1KsZXOqMmmxGcuNqd9i6i+jcaX4Ej1ixbj+Lym/cn+TAq5Qrz77EVpeNWqS9LPSKKY6oefHq2yxpzb2tvnbZUzlVTa2NrmdgPpDH1o97Xqx8WrOPoZjxaZ6oZcerbLLoZyY2n3uMrfXnuv47mE2bc/xhnF65GqqW4yf2QsXTaVaNPER37rcqj6Y6vNPKrCUTq0PWnF1xr0u5yBnNhserU5ONVK8qNS0aiXCt6S5V0mlcs1W9epu271NzVrbo8nqAAAAAAAAAAAAAAAAAHM58ZclhKUaVKWjVr6XdLbCmtslwN3sungNrDWorqznVDVxV2aKco1y8ybOm5jNwWRsTiI6VHD1Jx8JLRi+ZvU+g86rtFOiZelNquqM4hh4vDVKMnCrTlTmtejOLi7cKvtXKZU1RVGcSxqpmmcph8GzJiq2RVWwKtgVYVVgTTqyhKM4ScJwalGUW1KMlvp7xJjPRJE5aYeu5kZy/6hScalliKNlUtqVSL2VEujWt586OXfs8nOjVLqWL3KRp1w6U8HuAAAAAAAAAAAAAAAAPL+yBW0sdNfF06UPJp/8AM6mEjK33uXi5zudzXZs4COKxdClPXBtzmuGEYuWj02S6T0vV8SiZh52aOPXES9ghFRSSSSSSSSsklvJHHdhpc8MmQxOErXS06MJ1qUv4oyir2vwNKz/oe2HrmmuO1436IronsePtnWclVsCrYFWFVYFWyCrYG5zNyg8Nj8LJPVUmsPNcMKj0dfIpOL+qeV+njW5jxetmri3Inwe3HJdYAAAAAAAAAAAAAAAAeT58P/2GK/2fyYHWw36UffW5OJ/Vn76muyJlF4TE0a9tJU5PSitsoNOMkuWzfTYzuUcemaWFuviVRU9gwGPpYmCqUakakXvxetPga2p8jORVRNM5TDr01xVGcS57PjOGlQoVcPCalXrRlScYu+5wkrSlLgdm7LbrNjD2ZqqiqdUNfE3oppmmNcvLGzpOaq2BVsKqwIbAq2QVbCvvkt/tGG+nofmIxr6M9y0dKO9+gTjOyAAAAAAAAAAAAAAAAPJc+P8A6OK/2fyYHWw36UffW5OJ/Vn76mhbPd4K33+joIqgFWwKthUMCrYFWyCrYVVsD75Lf7Rhvp6H5iMa+jPcyo6Ud79BnGdgAAAAAAAAAAAAAAAAchl3Mp4zE1cR22qe6aHcdr6dtGCjt0lfvb7N827WK4lMU5au1qXcLx65q42vsYH6uHx5fdf7z0577Pn9HnzKd7y+qv6tnx9fdf7xz32fP6HMp3vL6o/Vq+Pr7p/eOe+z5/Q5lO95fVH6tHx9fdH74577Pn9DmU73l9UfqzfH190fvk577Pn9F5lO95fVwmNobjVrUr6W5VKlLStbS0ZON7b2w3KZziJ2tOqMpmNjHbKirYFWwqrYGRkt/tGG+nofmIxr6M9zKjpR3v0IcZ2AAAAAAAAAAArUmopylJRjFNuUmlFJb7e8IjPUTOTkcrZ90qbccPTdZrVukm4Ur8m/Lyc5uW8HVOmqcmncxlMaKYzc7iM9cdPZUhT5KdKL/Hc2IwtuOprzirksd535Q42/saHumXNrW76sec3d70VeeGUONv7HD+6ObWt31Oc3d70Q88cocbf2GH90c2tbvqc5u73oq88socbf2GH90c2tbvqc4u73oh55ZR42/sMP7o5ta3fU5xd3vRV555R44/sMP7pObWt31XnF3e9EPPTKPHH9hh/dHN7W76nOLu96KvPTKXHH9hh/dHN7W76nOLu96NFXrSqSnObvKcpTk7JXnJ3bstS1s9ojKMoeUznOcvk2EVbCqNgVbAyMl/vGG+nofmIxr6M9zKjpR3vf8ZUcY3Ts7pbx8zj7tdq1xqJynN3LVMVVZSwu2p+F5InG5/iN/wAo+TZ5KjYdtT8LyRHP8Rv+UfI5KjYtHGzW2z51Y9aOE71PSyn77GM2KZ1MyhiFPZqe+mdfDYui/GjROx4V25pfY2nmAAAESaSbbslrbepJAeXZ2Zxyxs3TptrDQfcpat1a/jlycC9ezq2LEW4znW5V+/Nyco1OdZsNdDYFWwKNgVbIqrYFWwKsKhgVbIKtgVbCqtgVbAq2QZOSv3jDfT0PzESvoz3MqelHe99x/edKPleE/wBDxh3rHSa4+ebaLgQRUxm4tNOzRaLlVFUVUzpgmmJjKW3oVdOKlw7eRn1eHvxetxXHX6ufXTxZyfQ92IAA5fsgZSdHDKlF2niW4Ph3Ja59d4rmkzawlHGrznqauLr4tGUdbzRnTcxVsCrYFWwKtkVVsCrYFWFVYFWyCrYFWwqrYFWwKtgQQZWSv3jDfT0PzESvoz3MqelHe99yh3nSj5XhT9Dxh3rHSa258620XIqGyKi5BmZLqa5R4VpLn/z0HX4IvZV1W569P399TXxFOiJbI77UAAHmfZDxWnjFTvqo04RtwTl3T8jidPCU5W89rmYurO5lscs2bTVVbAq2BVsiqtgVbAq2FVYENkFGwKthVWwKtgVbAggAbXNTBvEY/BU18dTqPxKb3SXkizC7VxaJl6WqeNXEPb8pS7mK4XfoS/qfJ8LV5W6ads/fq7uHjTMtfc4DbVuYqi5FRcg+mFnozg+VLoer1mxg7nEv0VdvroY3Kc6JhvD7BzQAB43nHX3XGYuXz1SK5oPQXkijs2Yyt0x2ONenO5VPa1jZ6PNVsCrZFVbAq2BVsKqwIbAq2QVbCqtgVbAq2BUgAAPVOxjm5LDwljK0dGpWjoUYyXdQoOzcmt5yaXQlw2NDFXc54sdTfw1qYjjT1umxlbTk7bFqXtPjMfiOWuzlqjRDs2qOLSx7mi9UNkzVW5iqLkzEXJmroacrpPhSZ9xbr49EVbYzcqqMpyWM0APDcTU0p1JeFOcut3O5EZRk4dU5zMvi2VFWyKq2BRsCrYVDAq2Bl4TJGJrpOlha1SL1qUaU9B/W2eUwquU065Z026qtUSynmrj+JVeqPtMOXt7WXIXN1V5qZQ4lV6o+0cvb2ryFzdQ808ocSq+b7Ry9vachc2KvNPKHEavm+0cvb2nIXN1H6JZQ4jV832k5e3tOQubqP0RyhxGr5vtHL29pyNzdZGFzHyjVaXarprwqtSnCK51e/UiTiLcdaxh7k9Tts2ex5Sw0o1cVNYirG0owSth4S4bPXN89lyb5q3cVNUZU6IbVrCxTpq0y6nG4vbGL536kfM4/hCJibdqe+fhHzdS1Z/lU19ziNpFyCCKi5M1QRUXMcxvcE706fipdWo+ywM54ajuhzL0ZVy+5tvMA8IqKza4G11Hchw5UbAq2BVsCrYVVgZmR8lVsbVVGjG8tspPVCnHwpPeRhXciiM5Z0W5rnKHqWQsz8Lgkpyiq1ZWbq1krRfyIvVH08pzL2KmYmZnKHRtYamntlu542K2XfMtRyK+E7NM5RnP32t2LFUqdvrwX1o8vxajdllyE7Tt9eC+tD8Wo3ZOQnadvrwX1ofi1G7JyE7Tt9eC+tD8Wo3ZOQnadvrwX1on4tRuyc3naj/UF4L60Pxejdk5vO1WWUeCHWzCrhjdo98rGH2yxq2KlPa7LgWpHOv429e0VTo2Rqe1FqmnU+FzTeqLkVW5BBioRVbkEXIre5O+ChzP0n2HBv7Wju+LmX/1JZJvPIA8RyzS3PE4qHg168Vzabt5DtW5zoiexxbkZVzHawWzJiq2BVsCrCppU5VJRhCLlOcowjFbZTbskulkmctMkRnoh7Tm5kank3DKCs5u0q1RLXUqcnItiRxcViYiJuVaodixZ4sRTGtatWc3d7N5byPlMRia79WdWrqjY6NFEUxofM12YAAARcgi5FQ2RUXIKtmOaoIqLkzVBBBFQ2YqhsiqtkHRYONqdNfJj6D7bBU8XD247I9HKuznXPe+xtPMA8kz9w25Y+s96qqdZczjovzoyOrhqs7cdjlYmnK5Pa5xs93gq2BVsKhgdT2NsCq2O05K6w9OdVcG6PuY+SUn0GtiqsqMtrZwtOdeex6ZlCprUeDW+c+R4Vu51Rbjq0u3Yp0ZsM5DYAAACCKi5BW5iqLkVFyCCKgioMVRcmYrciouRUXIqacdKUYr+JpdbMrdE3K4oj+U5JVPFiZ2OmSsfexGUZQ4ySgBwPZSwWrDYhLY5UJvn7qPon1m9g6tdPi0cZTqq8HnzZvNFVsKqwKtkHfdiRd3jn8nDemp7DTxmqnxbuD11eHxdpjPhJdHoPi+EJ/8AIq8PSHbtdCHwNJ6AEXIIuRUXIqLkENkzVW5iqLkzEEVBFRciouQQ2Yqq2RUEVnZHpaVTS3oK/S9S9Z1uBrHHv8edVEec6I+LWxVeVGW1vD6xzQABgZcybHGYetQlq3SPcy8GotcZdDSM7dfEqiphco49M0vEsVQnRnOnUi4zpycJxe9Jf5tOxExMZw5ExMTlL4MqIbAq2Qd92I+/x/i4X01DTxmqnx+Ddweurw+LtMZ8JLo9CPiuEP3FXh6Q7droQ+JpvRFyKi5BDZFVbMVRcggiouTNUEVFzHMRciqtkVFyCLkzVBFQQdDk3D7nTSffS7qXI+A+z4MwvN7ERV0p0z8vCPNyr9zj16NUMo6DxAAADl88M0o49brSap4mKtd6oVYrZGdtj4Jf4tixfm3onU179iLmmNby3KWTq2EloV6M6TvZaa7mXiy2S6GdKmumqM6Zc6qiqicqoYbZWKrYHf8AYi7/AB/i4X01DSxmqnx+Ddweurw+Ltcb8JLo9CPi+EP3FXh6Q7droQxzSeqGzFUXIIuRUXIqtyZiDHNQiq3JmIuRUNkzVFzFUXJmIIolfUtb4FrYiJmco1k6G0ydk5pqdRWtrjHfvws+h4N4KqiqLt6NWqPjPyaV/ERlxaW2PomiAAAAABWcFJNSSkntTV0+gDAnkHByd3gsM3wvDUm/QZ8rXvSw5Kif4wj9H8FxDC/daPsLyte9PvTkre7HuZGDydQw+k6OHpUXOyluNKFPSte19Fa7XfWY1V1Va5ZU0U06oyYmN+El0ehHy3CP7mrw9IdCz0IY7ZovVFyCrZjmqCKhskyrbUnR0Y33K9le+je9j6a1OB5OnjcTPKM+i0auVznLPzWvQ+a8wzzwH/P+rH87t8y9D5rzBnwf/wA/6r+d2+ZfD/M+YM+D/wDn/U/O7fNF8P8AM+YTPg//AJ/1Pzva8xdr/M+YWPw+Zyjk/wCp+d7Xm+vatP4uH8kTY5nh/wDXT7oefK170+87Vp/Fw/kiOZ4f/XT7oXla96fedq0/i4fyRHM8P/rp90HK170+99IU4x72KXMkj2otUUdCmI7mE1TOuVjNAAAAAAAAAAAAajHfCS+r+FHy3CP7mrw9Ib1noQx7mi9kXIIIqCKgxVFyZityKi5FRciouYi1HvoeNH0npZ/Vp749Uq6MunPvnGAAAAAAAAAAAAAAAAGnx/wk/q/hR8rwl+5r8PSG/Z6EMa5oPZFyZiCKgiouRUXIIbMVZGCwjrN67RW1+pG9gcDViqp05Uxrn4R96HldvRbjtZ0skwtqlJPhdmuo7FXAdmaf8apz8PTJrRi6s9MQ1WIounJxltXU1wnzuIsV2Lk269cefa3aK4rpzhWj30PGj6TCx+rT3x6rX0ZdQffuMAAAAAAAAAAAAAAAANRlKNqj5Un6vUfL8K08XETO2In4fBv4ec6GJc5ub3QRUXMcxFyKq2RUXIIuTNW7yO1uWrbpSvz/APVj6zgaaZw0Za85z++7JzsVnyjOOq1mny5bShw6LvzX1es+Z4emOUojryn6fFv4PPiywcLHSqU1wyj1XOThaJrv0Uxtj1bNycqJnsdMfeOOAAAAAAAAAAAAAAAAMXH4fdI3XfR2cq4DncJYSb9vOnpU6u3se1i5xJ06paZnyk6HRVuQRciobIqLmKouQQRX3weLlRd1rT2xex+w3MHjbmFqzp0xOuPvVLyu2ouRpZ8ssK2qm78rVjsVcPU8X/Gic+2dDWjBznplq61Vzk5Sd2+rmOBevV3q5rrnTLcppimMobPI+Ea/8klvWgv+R3eBsFMfn1x/6/P5f/Gnirv8I8W1PoWkAAAAAAAAAAAAAAAAAGJi8DGprXcy4d585zsZwbbxH+UaKtu3ve9q/NGjqaqvhZ09sdXCta/ofOYjBX7HSp0bY0x99+Tdou0V6pY9zTzeqLkVBFQQAAH1o4edTvYt8u91nvZw129P5dMz6e/UwruU0dKW0wmS1G0qlpPwV3q5+E+gwfA1NE8e9pnZ1fX072ndxUzop0NkdxpgAAAAAAAAAAAAAAAAAAAAPjVwlOffQXOtT60at3BYe706I9J98aXpTdrp1SxZ5JpvY5LpTXlNCvgSxV0ZmPvt+b2jF1xriHyeRuCr1wv6zXq4B2XPL6s+eeyhZG+d8z+pI4A23PL6rzz2fN9YZIgtspPqSPejgKzHSqmfd8mE4yrqiGRTwNKOyCfjd16TdtcG4a3qojx0+rxqv3Ktcsk3nkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACNICNMCNMBugDdAGmBOmBOkAuBIAAAAAAAAAAAAAAAAAAo2BVsCjYFXICNICNIBpANICykBKYF0wLJgXTAkAAAAAAAAAAAAAAABVxAq4AVcAKuAFdABoANABoASoAWUALKAF1ECwAAAAAAAAAAAAAAAAAAAAIsAsBFgFgJsAsBIAAAAAAAAAAAAAP/9k=" alt="CRUD PHP MySQL">
                                            <div class="blog-system-badges">
                                                <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                            </div>
                                        </div>
                                        <div class="blog-system-content">
                                            <!-- <div class="blog-system-meta">
                                                <span class="blog-system-date">
                                                    <i class="fas fa-calendar"></i>
                                                    16 Juillet 2025
                                                </span>
                                                <span class="blog-system-reading-time">
                                                    <i class="fas fa-clock"></i>
                                                    8 min de lecture
                                                </span>
                                                <span class="blog-system-views">
                                                    <i class="fas fa-eye"></i>
                                                    2.3k vues
                                                </span>
                                            </div> -->
                                            
                                            <h3 class="blog-system-title">
                                                Guide Complet : Créer un CRUD Complet en PHP et MYSQL
                                            </h3>
                                            
                                            <p class="blog-system-excerpt">
                                                Apprenez à ajouter, modifier et supprimer les données d'une base de données en PHP. Ce tutoriel step-by-step couvre le Create(Créer), Update(Modifier) et Delete(Supprimer) les données de la base de données.
                                            </p>
                                            
                                            <div class="blog-system-footer">
                                                <!-- <div class="blog-system-author">
                                                    <div class="blog-system-author-avatar">
                                                        <span>AC</span>
                                                    </div>
                                                    <div class="blog-system-author-info">
                                                        <span class="blog-system-author-name">Apalo Coulibaly</span>
                                                        <span class="blog-system-author-role">Lead Developer</span>
                                                    </div>
                                                </div>
                                                -->
                                                <div class="blog-system-engagement">
                                                    <button class="blog-system-like-btn" onclick="blogSystemToggleLike(this)">
                                                        <i class="fas fa-heart"></i>
                                                        <span>127</span>
                                                    </button>
                                                    <button class="blog-system-share-btn" onclick="blogSystemShareArticle()">
                                                        <i class="fas fa-share"></i>
                                                    </button>
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

                                        <!-- Section Commentaires -->
                                        <div class="blog-system-comments">
                                            <div class="blog-system-comments-header" onclick="blogSystemToggleComments(this)">
                                                <div class="blog-system-comments-title">
                                                    <i class="fas fa-comments"></i>
                                                    Commentaires (3)
                                                </div>
                                                <i class="fas fa-chevron-down blog-system-comments-toggle"></i>
                                            </div>
                                            
                                            <div class="blog-system-comments-content">
                                                <!-- Formulaire de commentaire -->
                                                <div class="blog-system-comment-form">
                                                    <div class="blog-system-comment-input-group">
                                                        <div class="blog-system-comment-avatar-input">
                                                            <span id="blog-system-user-avatar">?</span>
                                                        </div>
                                                        <textarea class="blog-system-comment-input" placeholder="Écrivez votre commentaire..." id="blog-system-comment-text"></textarea>
                                                    </div>
                                                    <div class="blog-system-comment-form-footer">
                                                        <!-- <div class="blog-system-comment-user-info">
                                                            <input type="text" placeholder="Votre nom" id="blog-system-user-name">
                                                            <input type="email" placeholder="Email (optionnel)" id="blog-system-user-email">
                                                        </div> -->
                                                        <button class="blog-system-comment-submit" onclick="blogSystemSubmitComment()">
                                                            <i class="fas fa-paper-plane"></i>
                                                            Publier
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <!-- Liste des commentaires -->
                                                <div class="blog-system-comments-list" id="blog-system-comments-list">
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>JD</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Jean Dupont</span>
                                                                <span class="blog-system-comment-date">Il y a 2 heures</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Excellent tutoriel ! Très bien expliqué et facile à suivre. Merci pour ce partage.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>MK</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Marie Koffi</span>
                                                                <span class="blog-system-comment-date">Il y a 1 jour</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                J'ai suivi ce tutoriel et j'ai réussi à créer mon premier CRUD ! Les explications sont claires et les exemples pratiques.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="blog-system-comment">
                                                        <div class="blog-system-comment-author-avatar">
                                                            <span>TN</span>
                                                        </div>
                                                        <div class="blog-system-comment-content">
                                                            <div class="blog-system-comment-header">
                                                                <span class="blog-system-comment-author">Thomas N'Guessan</span>
                                                                <span class="blog-system-comment-date">Il y a 3 jours</span>
                                                            </div>
                                                            <div class="blog-system-comment-text">
                                                                Parfait pour débuter avec PHP et MySQL. Pouvez-vous faire un tutoriel sur la sécurité des requêtes SQL ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                </section>

                <section class="section-container" id="course-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-graduation-cap"></i>
                            Cours d'Informatique
                        </h2>
                        <p class="section-subtitle">Apprenez les bases de l'informatique avec notre cours complet</p>
                    </div>
                    
                    <div class="course-content-grid">
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
            <footer class="footer-section">
    <div class="footer-container">
        
        <!-- Footer Main Content -->
        <div class="footer-content">
            
            <!-- Footer Brand -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <div class="footer-logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="footer-logo-text">Learnica</span>
                </div>
                <p class="footer-brand-desc">
                    La plateforme de référence pour les développeurs francophones. 
                    Formations, documents et communauté pour booster vos compétences IT.
                </p>
                <div class="footer-social">
                    <a href="#" class="footer-social-link" data-platform="facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="footer-social-link" data-platform="twitter">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="#" class="footer-social-link" data-platform="linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span>LinkedIn</span>
                    </a>
                    <a href="#" class="footer-social-link" data-platform="youtube">
                        <i class="fab fa-youtube"></i>
                        <span>YouTube</span>
                    </a>
                    <a href="#" class="footer-social-link" data-platform="github">
                        <i class="fab fa-github"></i>
                        <span>GitHub</span>
                    </a>
                </div>
            </div>
            
            <!-- Footer Links -->
            <div class="footer-links">
                
                <!-- Formations -->
                <div class="footer-column">
                    <h4 class="footer-column-title">
                        <i class="fas fa-graduation-cap"></i>
                        Formations
                    </h4>
                    <ul class="footer-column-list">
                        <li><a href="#" class="footer-link">Développement Web</a></li>
                        <li><a href="#" class="footer-link">Développement Mobile</a></li>
                        <li><a href="#" class="footer-link">Développement Desktop</a></li>
                        <li><a href="#" class="footer-link">Base de Données</a></li>
                        <li><a href="#" class="footer-link">DevOps & Cloud</a></li>
                        <li><a href="#" class="footer-link">Intelligence Artificielle</a></li>
                    </ul>
                </div>
                
                <!-- Ressources -->
                <div class="footer-column">
                    <h4 class="footer-column-title">
                        <i class="fas fa-folder-open"></i>
                        Ressources
                    </h4>
                    <ul class="footer-column-list">
                        <li><a href="#" class="footer-link">Documents PDF</a></li>
                        <li><a href="#" class="footer-link">Templates Code</a></li>
                        <li><a href="#" class="footer-link">Checklists</a></li>
                        <li><a href="#" class="footer-link">Articles Blog</a></li>
                        <li><a href="#" class="footer-link">Tutoriels Vidéo</a></li>
                        <li><a href="#" class="footer-link">Forum Communauté</a></li>
                    </ul>
                </div>
                
                <!-- Entreprise -->
                <div class="footer-column">
                    <h4 class="footer-column-title">
                        <i class="fas fa-building"></i>
                        Entreprise
                    </h4>
                    <ul class="footer-column-list">
                        <li><a href="#" class="footer-link">À Propos</a></li>
                        <li><a href="#" class="footer-link">Notre Équipe</a></li>
                        <li><a href="#" class="footer-link">Carrières</a></li>
                        <li><a href="#" class="footer-link">Partenaires</a></li>
                        <li><a href="#" class="footer-link">Témoignages</a></li>
                        <li><a href="#" class="footer-link">Presse</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div class="footer-column">
                    <h4 class="footer-column-title">
                        <i class="fas fa-headset"></i>
                        Support
                    </h4>
                    <ul class="footer-column-list">
                        <li><a href="#" class="footer-link">Centre d'Aide</a></li>
                        <li><a href="#" class="footer-link">FAQ</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                        <li><a href="#" class="footer-link">Chat Support</a></li>
                        <li><a href="#" class="footer-link">Status Serveurs</a></li>
                        <li><a href="#" class="footer-link">Signaler un Bug</a></li>
                    </ul>
                </div>
                
            </div>
            
            <!-- Footer Newsletter Mini -->
            <div class="footer-newsletter">
                <div class="footer-newsletter-card">
                    <h4 class="footer-newsletter-title">
                        <span class="footer-newsletter-icon">📧</span>
                        Restez Informé !
                    </h4>
                    <p class="footer-newsletter-desc">
                        Recevez nos dernières actualités et offres exclusives
                    </p>
                    <form class="footer-newsletter-form">
                        <div class="footer-newsletter-input-group">
                            <input 
                                type="email" 
                                class="footer-newsletter-input" 
                                placeholder="votre@email.com"
                                required
                            />
                            <button type="submit" class="footer-newsletter-btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    <div class="footer-newsletter-stats">
                        <span class="footer-stats-number">12,450+</span>
                        <span class="footer-stats-text">abonnés nous font confiance</span>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                
                <!-- Copyright -->
                <div class="footer-copyright">
                    <span>© 2025 Learnica. Tous droits réservés.</span>
                    <span class="footer-made-with">
                        Fait avec <i class="fas fa-heart footer-heart"></i> en Côte d'Ivoire
                    </span>
                </div>
                
                <!-- Legal Links -->
                <div class="footer-legal">
                    <a href="#" class="footer-legal-link">Mentions Légales</a>
                    <a href="#" class="footer-legal-link">Conditions d'Utilisation</a>
                    <a href="#" class="footer-legal-link">Politique de Confidentialité</a>
                    <a href="#" class="footer-legal-link">Cookies</a>
                    <a href="#" class="footer-legal-link">RGPD</a>
                </div>
                
                <!-- Quick Contact -->
                <div class="footer-contact">
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:contact@learnica.com">contact@learnica.com</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+225070012345">+225 07 00 12 345</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Abidjan, Côte d'Ivoire</span>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Footer Certifications -->
        <div class="footer-certifications">
            <div class="footer-cert-title">Certifié & Sécurisé :</div>
            <div class="footer-cert-badges">
                <div class="footer-cert-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>SSL</span>
                </div>
                <div class="footer-cert-badge">
                    <i class="fas fa-lock"></i>
                    <span>RGPD</span>
                </div>
                <div class="footer-cert-badge">
                    <i class="fas fa-certificate"></i>
                    <span>ISO 27001</span>
                </div>
                <div class="footer-cert-badge">
                    <i class="fas fa-award"></i>
                    <span>Quality+</span>
                </div>
            </div>
        </div>
        
        <!-- Back to Top -->
        <div class="footer-back-to-top" id="backToTop">
            <i class="fas fa-chevron-up"></i>
            <span>Haut de page</span>
        </div>
        
    </div>
<!-- </footer>

        </main>
    </div> -->
<!-- Footer Section -->
    <script>
// document.addEventListener('DOMContentLoaded', function(){
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

        // Ce js a été introduit du coups, verification.

        // JavaScript pour la section tarification
function initPricingSection() {
    const toggle = document.getElementById('pricingToggle');
    const pricingAmounts = document.querySelectorAll('.pricing-amount[data-monthly]');
    const yearlyInfos = document.querySelectorAll('.pricing-yearly-info');
    
    if (!toggle) return;
    
    toggle.addEventListener('change', function() {
        const isYearly = this.checked;
        
        // Update prices
        pricingAmounts.forEach(amount => {
            const monthlyPrice = amount.getAttribute('data-monthly');
            const yearlyPrice = amount.getAttribute('data-yearly');
            
            if (isYearly) {
                amount.textContent = yearlyPrice;
            } else {
                amount.textContent = monthlyPrice;
            }
        });
        
        // Show/hide yearly savings info
        yearlyInfos.forEach(info => {
            if (isYearly) {
                info.classList.add('show');
            } else {
                info.classList.remove('show');
            }
        });
    });
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initPricingSection();
});

// JavaScript pour la section blog
function initBlogSection() {
    
    // Gestion du filtrage par catégories
    function initCategoryFilter() {
        const categoryButtons = document.querySelectorAll('.blog-category-btn');
        const blogCards = document.querySelectorAll('.blog-card, .blog-featured-card');
        
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');
                
                // Mettre à jour les boutons actifs
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                // Filtrer les articles
                blogCards.forEach((card, index) => {
                    const cardCategory = card.getAttribute('data-category');
                    const shouldShow = category === 'all' || cardCategory === category;
                    
                    if (shouldShow) {
                        card.classList.remove('hidden');
                        // Animation d'apparition avec délai
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 100);
                    } else {
                        card.classList.add('hidden');
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                    }
                });
                
                // Effet de feedback sur le bouton
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                }, 150);
            });
        });
    }
    
    // Gestion des boutons like
    function initLikeButtons() {
        const likeButtons = document.querySelectorAll('.blog-like-btn');
        
        likeButtons.forEach(button => {
            let isLiked = false;
            const countSpan = button.querySelector('span');
            const originalCount = parseInt(countSpan.textContent);
            
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                isLiked = !isLiked;
                
                if (isLiked) {
                    button.style.background = 'var(--danger-gradient)';
                    button.style.color = 'white';
                    button.style.borderColor = 'transparent';
                    countSpan.textContent = originalCount + 1;
                    
                    // Animation du cœur
                    const icon = button.querySelector('i');
                    icon.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        icon.style.transform = 'scale(1)';
                    }, 200);
                    
                } else {
                    button.style.background = 'var(--surface-primary)';
                    button.style.color = 'var(--text-secondary)';
                    button.style.borderColor = 'var(--border-primary)';
                    countSpan.textContent = originalCount;
                }
                
                // Effet de pulse
                button.style.animation = 'none';
                setTimeout(() => {
                    button.style.animation = 'pulse 0.3s ease-out';
                }, 10);
            });
        });
    }
    
    // Gestion des boutons de partage
    function initShareButtons() {
        const shareButtons = document.querySelectorAll('.blog-share-btn');
        
        shareButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Simuler le partage
                button.style.background = 'var(--success-gradient)';
                button.style.color = 'white';
                button.style.borderColor = 'transparent';
                
                const icon = button.querySelector('i');
                const originalIcon = icon.className;
                icon.className = 'fas fa-check';
                
                setTimeout(() => {
                    button.style.background = 'var(--surface-primary)';
                    button.style.color = 'var(--text-secondary)';
                    button.style.borderColor = 'var(--border-primary)';
                    icon.className = originalIcon;
                }, 1500);
                
                // Notification
                showBlogNotification('Lien copié dans le presse-papiers !', 'success');
            });
        });
    }
    
    // Animation des cartes au scroll
    function initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        // Observer toutes les cartes du blog
        document.querySelectorAll('.blog-card, .blog-featured-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `all 0.6s ease-out ${index * 0.1}s`;
            observer.observe(card);
        });
    }
    
    // Système de notifications pour le blog
    function showBlogNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `blog-notification blog-notification-${type}`;
        
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            info: 'fas fa-info-circle'
        };
        
        notification.innerHTML = `
            <i class="${icons[type]}"></i>
            <span>${message}</span>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 24px;
            right: 24px;
            background: var(--success-gradient);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 3000;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-lg);
            transform: translateX(400px);
            transition: transform 0.3s ease;
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
        }, 3000);
    }
    
    // Gestion des liens de lecture
    function initReadMoreLinks() {
        const readMoreLinks = document.querySelectorAll('.blog-read-more, .blog-card-link');
        
        readMoreLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Effet de feedback
                link.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    link.style.transform = '';
                }, 150);
                
                // Simulation de navigation
                const articleTitle = link.closest('article').querySelector('.blog-card-title, .blog-featured-title').textContent;
                showBlogNotification(`Redirection vers: ${articleTitle.substring(0, 40)}...`, 'info');
            });
        });
    }
    
    // Animation CSS pour le pulse
    function addPulseAnimation() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Initialiser toutes les fonctionnalités
    initCategoryFilter();
    initLikeButtons();
    initShareButtons();
    initScrollAnimations();
    initReadMoreLinks();
    addPulseAnimation();
}

// Fonction globale pour être accessible depuis d'autres scripts
window.showBlogNotification = function(message, type = 'info') {
    // Code de notification réutilisable
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        background: var(--accent-gradient);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.9rem;
        z-index: 3000;
        box-shadow: var(--shadow-lg);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
};

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    initBlogSection();
});

// JavaScript pour la section communauté
function initCommunitySection() {
    
    // Animation des compteurs de stats
    function animateCommunityCounters() {
        const counters = document.querySelectorAll('.community-stat-number[data-counter]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-counter'));
            const duration = 2500;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        });
    }
    
    // Gestion de la recherche
    function initCommunitySearch() {
        const searchInput = document.querySelector('.community-search-input');
        const searchBtn = document.querySelector('.community-search-btn');
        
        if (searchInput && searchBtn) {
            // Animation de focus
            searchInput.addEventListener('focus', () => {
                searchInput.style.transform = 'scale(1.02)';
                searchInput.style.boxShadow = '0 0 0 3px rgba(102, 126, 234, 0.2)';
            });
            
            searchInput.addEventListener('blur', () => {
                searchInput.style.transform = 'scale(1)';
                searchInput.style.boxShadow = 'none';
            });
            
            // Simulation de recherche
            searchBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const query = searchInput.value.trim();
                
                if (query) {
                    // Animation du bouton
                    searchBtn.style.transform = 'scale(0.95)';
                    const originalIcon = searchBtn.innerHTML;
                    searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    
                    setTimeout(() => {
                        searchBtn.innerHTML = '<i class="fas fa-check"></i>';
                        searchBtn.style.background = 'var(--success-gradient)';
                        
                        setTimeout(() => {
                            searchBtn.innerHTML = originalIcon;
                            searchBtn.style.background = 'var(--accent-gradient)';
                            searchBtn.style.transform = 'scale(1)';
                        }, 1500);
                    }, 1000);
                    
                    showCommunityNotification(`Recherche: "${query}" - 23 résultats trouvés`, 'success');
                    searchInput.value = '';
                } else {
                    // Animation de secousse si vide
                    searchInput.style.animation = 'shake 0.5s';
                    setTimeout(() => {
                        searchInput.style.animation = '';
                    }, 500);
                }
            });
            
            // Recherche avec Enter
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    searchBtn.click();
                }
            });
        }
    }
    
    // Gestion des boutons d'aide
    function initHelpButtons() {
        const helpBtn = document.querySelector('.community-help-btn');
        
        if (helpBtn) {
            helpBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Animation du bouton
                helpBtn.style.transform = 'scale(0.95)';
                const originalText = helpBtn.innerHTML;
                helpBtn.innerHTML = '<i class="fas fa-check"></i> Question Créée !';
                helpBtn.style.background = 'var(--success-gradient)';
                
                setTimeout(() => {
                    helpBtn.innerHTML = originalText;
                    helpBtn.style.background = 'var(--primary-gradient)';
                    helpBtn.style.transform = 'scale(1)';
                }, 2000);
                
                showCommunityNotification('Question publiée ! La communauté va vous répondre', 'success');
            });
        }
    }
    
    // Gestion des boutons CTA
    function initCTAButtons() {
        const primaryCTA = document.querySelector('.community-cta-btn.primary');
        const secondaryCTA = document.querySelector('.community-cta-btn.secondary');
        
        if (primaryCTA) {
            primaryCTA.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Animation de création de compte
                primaryCTA.style.transform = 'scale(0.95)';
                const originalText = primaryCTA.innerHTML;
                primaryCTA.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création...';
                
                setTimeout(() => {
                    primaryCTA.innerHTML = '<i class="fas fa-check"></i> Compte Créé !';
                    primaryCTA.style.background = 'var(--success-gradient)';
                    
                    setTimeout(() => {
                        primaryCTA.innerHTML = originalText;
                        primaryCTA.style.background = 'var(--secondary-gradient)';
                        primaryCTA.style.transform = 'scale(1)';
                    }, 2500);
                }, 1500);
                
                showCommunityNotification('Bienvenue dans la communauté ! 🎉', 'success');
            });
        }
        
        if (secondaryCTA) {
            secondaryCTA.addEventListener('click', (e) => {
                e.preventDefault();
                
                secondaryCTA.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    secondaryCTA.style.transform = 'scale(1)';
                }, 150);
                
                showCommunityNotification('Mode exploration activé 🔍', 'info');
            });
        }
    }
    
    // Simulation d'activité en temps réel
    function simulateRealTimeActivity() {
        const activities = [
            'Nouvelle question posée par Marie K.',
            'Réponse acceptée par Ibrahim B.',
            'Nouveau membre : Fatou D.',
            'Discussion populaire : "React vs Vue"',
            'Tutoriel publié par Apalo C.',
            'Question résolue : "Erreur Laravel"'
        ];
        
        let activityIndex = 0;
        
        setInterval(() => {
            const activity = activities[activityIndex % activities.length];
            showCommunityNotification(activity, 'info');
            activityIndex++;
        }, 15000); // Toutes les 15 secondes
    }
    
    // Animation des cartes au scroll
    function initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('community-stats')) {
                        animateCommunityCounters();
                    }
                    
                    // Animation des cartes
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        // Observer les éléments
        document.querySelectorAll('.community-stats, .community-card, .community-cta').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = `all 0.6s ease-out ${index * 0.1}s`;
            observer.observe(el);
        });
    }
    
    // Interactions avec les discussions
    function initDiscussionInteractions() {
        const discussionItems = document.querySelectorAll('.community-discussion-item');
        
        discussionItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Animation de clic
                item.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    item.style.transform = 'scale(1)';
                }, 150);
                
                const title = item.querySelector('.community-discussion-title').textContent;
                showCommunityNotification(`Ouverture: ${title.substring(0, 30)}...`, 'info');
            });
            
            // Effet hover amélioré
            item.addEventListener('mouseenter', () => {
                const avatar = item.querySelector('.community-discussion-avatar span');
                if (avatar) {
                    avatar.style.transform = 'scale(1.1)';
                }
            });
            
            item.addEventListener('mouseleave', () => {
                const avatar = item.querySelector('.community-discussion-avatar span');
                if (avatar) {
                    avatar.style.transform = 'scale(1)';
                }
            });
        });
    }
    
    // Interactions avec les contributeurs
    function initContributorInteractions() {
        const contributorItems = document.querySelectorAll('.community-contributor-item');
        
        contributorItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                
                const name = item.querySelector('.community-contributor-name').textContent;
                const score = item.querySelector('.community-score').textContent;
                
                // Animation
                item.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    item.style.transform = 'scale(1)';
                }, 150);
                
                showCommunityNotification(`Profil de ${name} - ${score} points`, 'info');
            });
        });
    }
    
    // Animation des avatars en ligne
    function animateOnlineAvatars() {
        const avatars = document.querySelectorAll('.community-online-avatar');
        
        avatars.forEach((avatar, index) => {
            // Animation aléatoire
            setInterval(() => {
                if (Math.random() > 0.7) { // 30% de chance
                    avatar.style.animation = 'pulse 0.5s ease-out';
                    setTimeout(() => {
                        avatar.style.animation = '';
                    }, 500);
                }
            }, (index + 1) * 3000); // Délais différents pour chaque avatar
        });
    }
    
    // Système de notifications
    function showCommunityNotification(message, type = 'info', duration = 4000) {
        const notification = document.createElement('div');
        notification.className = `community-notification community-notification-${type}`;
        
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
            background: ${colors[type]};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 3000;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-xl);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 350px;
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
        }, duration);
    }
    
    // Animation de secousse pour les erreurs
    function addShakeAnimation() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Mise à jour du compteur de membres en ligne
    function updateOnlineCount() {
        const onlineTitle = document.querySelector('.community-online-title');
        if (onlineTitle) {
            setInterval(() => {
                const currentCount = parseInt(onlineTitle.textContent.match(/\d+/)[0]);
                const variation = Math.floor(Math.random() * 6) - 3; // -3 à +3
                const newCount = Math.max(120, currentCount + variation);
                
                onlineTitle.innerHTML = `
                    <span class="community-pulse-green"></span>
                    ${newCount} membres en ligne
                `;
            }, 30000); // Toutes les 30 secondes
        }
    }
    
    // Initialiser toutes les fonctionnalités
    initCommunitySearch();
    initHelpButtons();
    initCTAButtons();
    initScrollAnimations();
    initDiscussionInteractions();
    initContributorInteractions();
    animateOnlineAvatars();
    addShakeAnimation();
    updateOnlineCount();
    
    // Démarrer l'activité en temps réel après 5 secondes
    setTimeout(() => {
        simulateRealTimeActivity();
    }, 5000);
    
    // Message de bienvenue pour cette section
    setTimeout(() => {
        showCommunityNotification('💬 Section Communauté chargée !', 'success');
    }, 1000);
}

// Fonction globale pour les notifications
window.showCommunityNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        background: var(--accent-gradient);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.9rem;
        z-index: 3000;
        box-shadow: var(--shadow-lg);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
};

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    initCommunitySection();
});


// JavaScript pour la section FAQ
function initFAQSection() {
    
    // Gestion de l'accordéon FAQ
    function initFAQAccordion() {
        const faqItems = document.querySelectorAll('.faq-item');
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.closest('.faq-item');
                const isActive = faqItem.classList.contains('active');
                
                // Fermer tous les autres items
                faqItems.forEach(item => {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                    }
                });
                
                // Toggle l'item cliqué
                if (isActive) {
                    faqItem.classList.remove('active');
                } else {
                    faqItem.classList.add('active');
                    
                    // Scroll smooth vers l'item
                    setTimeout(() => {
                        faqItem.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
                
                // Animation du bouton toggle
                const toggle = question.querySelector('.faq-toggle');
                if (toggle) {
                    toggle.style.transform = isActive 
                        ? 'translateY(-50%) scale(0.9)' 
                        : 'translateY(-50%) scale(1.1)';
                    
                    setTimeout(() => {
                        toggle.style.transform = 'translateY(-50%) scale(1)';
                    }, 150);
                }
            });
        });
    }
    
    // Gestion de la recherche FAQ
    function initFAQSearch() {
        const searchInput = document.querySelector('.faq-search-input');
        const searchResults = document.querySelector('.faq-search-results');
        const faqItems = document.querySelectorAll('.faq-item');
        const suggestions = document.querySelectorAll('.faq-suggestion');
        
        if (!searchInput) return;
        
        let searchTimeout;
        
        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            const query = e.target.value.toLowerCase().trim();
            
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });
        
        function performSearch(query) {
            let visibleCount = 0;
            
            faqItems.forEach(item => {
                const questionText = item.querySelector('.faq-question-text').textContent.toLowerCase();
                const answerText = item.querySelector('.faq-answer-content').textContent.toLowerCase();
                const categoryTag = item.querySelector('.faq-category-tag').textContent.toLowerCase();
                
                const matches = !query || 
                    questionText.includes(query) || 
                    answerText.includes(query) || 
                    categoryTag.includes(query);
                
                if (matches) {
                    item.classList.remove('hidden');
                    visibleCount++;
                    
                    // Highlight search terms
                    if (query) {
                        highlightSearchTerms(item, query);
                    } else {
                        removeHighlights(item);
                    }
                } else {
                    item.classList.add('hidden');
                }
            });
            
            // Mise à jour des résultats
            if (searchResults) {
                searchResults.textContent = query 
                    ? `${visibleCount} résultat${visibleCount > 1 ? 's' : ''} trouvé${visibleCount > 1 ? 's' : ''}`
                    : '';
                searchResults.classList.toggle('show', query.length > 0);
            }
            
            // Animation des items visibles
            let delay = 0;
            faqItems.forEach(item => {
                if (!item.classList.contains('hidden')) {
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, delay);
                    delay += 50;
                }
            });
        }
        
        function highlightSearchTerms(item, query) {
            const questionText = item.querySelector('.faq-question-text');
            const originalText = questionText.dataset.original || questionText.innerHTML;
            
            if (!questionText.dataset.original) {
                questionText.dataset.original = originalText;
            }
            
            const highlightedText = originalText.replace(
                new RegExp(`(${query})`, 'gi'),
                '<mark style="background: var(--warning-gradient); color: #1e293b; padding: 0.1em 0.2em; border-radius: 3px;">$1</mark>'
            );
            
            questionText.innerHTML = highlightedText;
        }
        
        function removeHighlights(item) {
            const questionText = item.querySelector('.faq-question-text');
            if (questionText.dataset.original) {
                questionText.innerHTML = questionText.dataset.original;
            }
        }
        
        // Gestion des suggestions
        suggestions.forEach(suggestion => {
            suggestion.addEventListener('click', () => {
                const keyword = suggestion.dataset.keyword;
                searchInput.value = keyword;
                performSearch(keyword.toLowerCase());
                
                // Animation de la suggestion
                suggestion.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    suggestion.style.transform = 'scale(1)';
                }, 150);
                
                showFAQNotification(`Recherche: "${keyword}"`, 'info');
            });
        });
    }
    
    // Gestion des filtres par catégorie
    function initCategoryFilters() {
        const categoryButtons = document.querySelectorAll('.faq-category-btn');
        const faqItems = document.querySelectorAll('.faq-item');
        
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                
                // Mise à jour des boutons actifs
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                // Filtrage des items
                let visibleCount = 0;
                faqItems.forEach((item, index) => {
                    const itemCategory = item.dataset.category;
                    const shouldShow = category === 'all' || itemCategory === category;
                    
                    if (shouldShow) {
                        item.classList.remove('hidden');
                        visibleCount++;
                        
                        // Animation d'apparition
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 50);
                    } else {
                        item.classList.add('hidden');
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(-20px)';
                    }
                });
                
                // Animation du bouton
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 150);
                
                const categoryName = button.textContent.trim().split('\n')[0];
                showFAQNotification(`Filtrage: ${categoryName} (${visibleCount} questions)`, 'info');
            });
        });
    }
    
    // Gestion des questions populaires
    function initPopularQuestions() {
        const popularItems = document.querySelectorAll('.faq-popular-item');
        
        popularItems.forEach(item => {
            item.addEventListener('click', () => {
                const targetId = item.dataset.target;
                const targetFAQ = document.getElementById(targetId);
                
                if (targetFAQ) {
                    // Fermer tous les FAQs ouverts
                    document.querySelectorAll('.faq-item.active').forEach(faq => {
                        faq.classList.remove('active');
                    });
                    
                    // Ouvrir le FAQ cible
                    targetFAQ.classList.add('active');
                    
                    // Scroll vers le FAQ
                    setTimeout(() => {
                        targetFAQ.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                    
                    // Animation de l'item populaire
                    item.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        item.style.transform = 'scale(1)';
                    }, 150);
                    
                    const questionText = item.querySelector('.faq-popular-text').textContent;
                    showFAQNotification(`Question ouverte: ${questionText.substring(0, 30)}...`, 'success');
                }
            });
        });
    }
    
    // Gestion des votes utiles/pas utiles
    function initHelpfulVoting() {
        const helpfulButtons = document.querySelectorAll('.faq-helpful-btn');
        
        helpfulButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                
                const isHelpful = button.dataset.helpful === 'yes';
                const faqItem = button.closest('.faq-item');
                const allButtons = faqItem.querySelectorAll('.faq-helpful-btn');
                
                // Désactiver tous les boutons de cette FAQ
                allButtons.forEach(btn => {
                    btn.classList.add('voted');
                    btn.style.pointerEvents = 'none';
                });
                
                // Animation du bouton voté
                if (isHelpful) {
                    button.style.background = 'var(--success-gradient)';
                    button.style.color = 'white';
                    button.style.borderColor = 'transparent';
                    
                    // Incrémenter le compteur
                    const countSpan = button.querySelector('span') || button.lastChild;
                    if (countSpan && countSpan.textContent) {
                        const currentCount = parseInt(countSpan.textContent.match(/\d+/)[0]);
                        countSpan.textContent = ` (${currentCount + 1})`;
                    }
                    
                    showFAQNotification('Merci pour votre retour positif ! 👍', 'success');
                } else {
                    button.style.background = 'var(--danger-gradient)';
                    button.style.color = 'white';
                    button.style.borderColor = 'transparent';
                    
                    showFAQNotification('Merci pour votre retour. Nous allons améliorer cette réponse.', 'info');
                }
                
                // Animation de feedback
                button.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 200);
            });
        });
    }
    
    // Gestion des boutons CTA
    function initCTAButtons() {
        const contactBtn = document.querySelector('.faq-cta-btn.primary');
        const chatBtn = document.querySelector('.faq-cta-btn.secondary');
        
        if (contactBtn) {
            contactBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Animation du bouton
                contactBtn.style.transform = 'scale(0.95)';
                const originalText = contactBtn.innerHTML;
                contactBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Message Envoyé !';
                contactBtn.style.background = 'var(--success-gradient)';
                contactBtn.style.color = 'white';
                
                setTimeout(() => {
                    contactBtn.innerHTML = originalText;
                    contactBtn.style.background = 'var(--warning-gradient)';
                    contactBtn.style.color = '#1e293b';
                    contactBtn.style.transform = 'scale(1)';
                }, 2500);
                
                showFAQNotification('Message envoyé ! Notre équipe vous répondra sous 2h.', 'success');
            });
        }
        
        if (chatBtn) {
            chatBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Animation du bouton
                chatBtn.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    chatBtn.style.transform = 'scale(1)';
                }, 150);
                
                showFAQNotification('Chat en cours d\'ouverture... 💬', 'info');
                
                // Simuler l'ouverture du chat
                setTimeout(() => {
                    showFAQNotification('Chat connecté ! Un agent va vous répondre.', 'success');
                }, 2000);
            });
        }
    }
    
    // Animation au scroll des FAQ
    function initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        // Observer les éléments FAQ
        document.querySelectorAll('.faq-popular, .faq-item, .faq-cta').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = `all 0.6s ease-out ${index * 0.1}s`;
            observer.observe(el);
        });
    }
    
    // Suggestion automatique basée sur le scroll
    function initAutoSuggestions() {
        let hasShownPricingSuggestion = false;
        let hasShownTechnicalSuggestion = false;
        
        window.addEventListener('scroll', () => {
            const scrollPercent = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
            
            // Suggestion pricing à 60% du scroll
            if (scrollPercent > 60 && !hasShownPricingSuggestion) {
                hasShownPricingSuggestion = true;
                showFAQNotification('💡 Astuce: Consultez nos tarifs transparents sans frais cachés !', 'info', 6000);
            }
            
            // Suggestion technique à 80% du scroll
            if (scrollPercent > 80 && !hasShownTechnicalSuggestion) {
                hasShownTechnicalSuggestion = true;
                showFAQNotification('🛠️ Besoin d\'aide technique ? Notre support répond en moins de 2h !', 'info', 6000);
            }
        });
    }
    
    // Mise à jour des compteurs de vues
    function updateViewCounts() {
        const popularItems = document.querySelectorAll('.faq-popular-item');
        
        popularItems.forEach(item => {
            item.addEventListener('click', () => {
                const viewsSpan = item.querySelector('.faq-popular-views');
                if (viewsSpan) {
                    const currentViews = parseInt(viewsSpan.textContent.match(/[\d,]+/)[0].replace(',', ''));
                    const newViews = currentViews + 1;
                    
                    // Animation du compteur
                    viewsSpan.style.transform = 'scale(1.2)';
                    viewsSpan.style.color = 'var(--text-accent)';
                    
                    setTimeout(() => {
                        viewsSpan.innerHTML = `<i class="fas fa-eye"></i> ${newViews.toLocaleString()} vues`;
                        viewsSpan.style.transform = 'scale(1)';
                        viewsSpan.style.color = 'var(--text-muted)';
                    }, 300);
                }
            });
        });
    }
    
    // Raccourcis clavier
    function initKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // Escape pour fermer tous les FAQs
            if (e.key === 'Escape') {
                document.querySelectorAll('.faq-item.active').forEach(item => {
                    item.classList.remove('active');
                });
            }
            
            // Ctrl+F pour focus sur la recherche
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                const searchInput = document.querySelector('.faq-search-input');
                if (searchInput) {
                    searchInput.focus();
                    searchInput.select();
                }
            }
        });
    }
    
    // Système de notifications
    function showFAQNotification(message, type = 'info', duration = 4000) {
        const notification = document.createElement('div');
        notification.className = `faq-notification faq-notification-${type}`;
        
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
            background: ${colors[type]};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 3000;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-xl);
            transform: translateX(400px);
            transition: transform 0.3s ease;
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
        }, duration);
    }
    
    // Initialiser toutes les fonctionnalités
    initFAQAccordion();
    initFAQSearch();
    initCategoryFilters();
    initPopularQuestions();
    initHelpfulVoting();
    initCTAButtons();
    initScrollAnimations();
    initAutoSuggestions();
    updateViewCounts();
    initKeyboardShortcuts();
    
    // Message de bienvenue
    setTimeout(() => {
        showFAQNotification('❓ Section FAQ chargée ! Utilisez Ctrl+F pour rechercher.', 'success');
    }, 1000);
}

// Fonction globale pour les notifications FAQ
window.showFAQNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        background: var(--warning-gradient);
        color: #1e293b;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.9rem;
        z-index: 3000;
        box-shadow: var(--shadow-lg);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
};

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    initFAQSection();
});

// JavaScript pour la section Newsletter
function initNewsletterSection() {
    
    // Animation du compteur d'abonnés
    function animateSubscriberCounter() {
        const counter = document.querySelector('.newsletter-social-number[data-counter]');
        if (!counter) return;
        
        const target = parseInt(counter.getAttribute('data-counter'));
        const duration = 3000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }
    
    // Gestion du compte à rebours
    function initCountdown() {
        const hoursEl = document.getElementById('countdown-hours');
        const minutesEl = document.getElementById('countdown-minutes');
        const secondsEl = document.getElementById('countdown-seconds');
        
        if (!hoursEl || !minutesEl || !secondsEl) return;
        
        let totalSeconds = 47 * 3600 + 32 * 60 + 15; // 47h 32m 15s
        
        function updateCountdown() {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;
            
            hoursEl.textContent = hours.toString().padStart(2, '0');
            minutesEl.textContent = minutes.toString().padStart(2, '0');
            secondsEl.textContent = seconds.toString().padStart(2, '0');
            
            if (totalSeconds > 0) {
                totalSeconds--;
            } else {
                // Quand le compte à rebours atteint 0, relancer
                totalSeconds = 47 * 3600 + 32 * 60 + 15;
                showNewsletterNotification('⏰ Offre prolongée ! Dernière chance !', 'warning');
            }
        }
        
        // Mise à jour immédiate puis chaque seconde
        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
    
    // Validation de l'email en temps réel
    function initEmailValidation() {
        const emailInput = document.getElementById('newsletterEmail');
        const inputMessage = document.querySelector('.newsletter-input-message');
        
        if (!emailInput || !inputMessage) return;
        
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        function updateValidation(isValid, message, type) {
            emailInput.classList.remove('valid', 'invalid');
            inputMessage.classList.remove('show', 'success', 'error');
            
            if (message) {
                emailInput.classList.add(isValid ? 'valid' : 'invalid');
                inputMessage.textContent = message;
                inputMessage.classList.add('show', isValid ? 'success' : 'error');
            }
        }
        
        emailInput.addEventListener('input', (e) => {
            const email = e.target.value.trim();
            
            if (email === '') {
                updateValidation(false, '', '');
                return;
            }
            
            if (validateEmail(email)) {
                updateValidation(true, '✓ Email valide !', 'success');
            } else {
                updateValidation(false, '✗ Format d\'email invalide', 'error');
            }
        });
        
        emailInput.addEventListener('blur', (e) => {
            const email = e.target.value.trim();
            if (email && !validateEmail(email)) {
                updateValidation(false, '✗ Veuillez entrer un email valide', 'error');
            }
        });
    }
    
    // Gestion du formulaire d'inscription
    function initNewsletterForm() {
        const form = document.getElementById('newsletterForm');
        const submitBtn = document.querySelector('.newsletter-submit-btn');
        const emailInput = document.getElementById('newsletterEmail');
        const checkbox = document.querySelector('.newsletter-checkbox');
        
        if (!form || !submitBtn || !emailInput || !checkbox) return;
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const email = emailInput.value.trim();
            const isChecked = checkbox.checked;
            
            // Validation
            if (!email) {
                showNewsletterNotification('Veuillez entrer votre email', 'error');
                emailInput.focus();
                return;
            }
            
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showNewsletterNotification('Format d\'email invalide', 'error');
                emailInput.focus();
                return;
            }
            
            if (!isChecked) {
                showNewsletterNotification('Veuillez accepter de recevoir nos emails', 'warning');
                return;
            }
            
            // Animation du bouton
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            // Simuler l'envoi (remplacer par votre API)
            try {
                await simulateEmailSubmission(email);
                
                // Succès
                submitBtn.classList.remove('loading');
                submitBtn.classList.add('success');
                
                setTimeout(() => {
                    showSuccessModal();
                    resetForm();
                }, 1000);
                
                // Analytics (remplacer par votre service)
                trackNewsletterSignup(email);
                
            } catch (error) {
                // Erreur
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                showNewsletterNotification('Erreur lors de l\'inscription. Réessayez.', 'error');
            }
        });
        
        function resetForm() {
            setTimeout(() => {
                form.reset();
                submitBtn.classList.remove('success');
                submitBtn.disabled = false;
                emailInput.classList.remove('valid', 'invalid');
                document.querySelector('.newsletter-input-message').classList.remove('show');
            }, 3000);
        }
    }
    
    // Simulation d'envoi d'email
    async function simulateEmailSubmission(email) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                // Simuler succès 95% du temps
                if (Math.random() > 0.05) {
                    resolve({ success: true, email });
                } else {
                    reject(new Error('Erreur serveur'));
                }
            }, 2000);
        });
    }
    
    // Tracking analytics (à adapter selon votre service)
    function trackNewsletterSignup(email) {
        // Exemple avec Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', 'newsletter_signup', {
                event_category: 'engagement',
                event_label: 'newsletter',
                value: 1
            });
        }
        
        // Exemple avec Facebook Pixel
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead', {
                content_name: 'Newsletter Signup',
                content_category: 'newsletter'
            });
        }
        
        console.log('Newsletter signup tracked:', email);
    }
    
    // Gestion de la modal de succès
    function showSuccessModal() {
        const modal = document.getElementById('successModal');
        const overlay = document.getElementById('modalOverlay');
        
        if (modal && overlay) {
            modal.classList.add('show');
            overlay.classList.add('show');
            
            // Empêcher le scroll du body
            document.body.style.overflow = 'hidden';
            
            // Animation d'apparition
            setTimeout(() => {
                modal.style.animation = 'newsletter-success-bounce 0.6s ease-out';
            }, 100);
            
            showNewsletterNotification('🎉 Inscription réussie ! Vérifiez votre email.', 'success');
        }
    }
    
    function closeSuccessModal() {
        const modal = document.getElementById('successModal');
        const overlay = document.getElementById('modalOverlay');
        
        if (modal && overlay) {
            modal.classList.remove('show');
            overlay.classList.remove('show');
            
            // Restaurer le scroll du body
            document.body.style.overflow = '';
        }
    }
    
    // Fermer modal avec échap ou clic overlay
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeSuccessModal();
        }
    });
    
    document.getElementById('modalOverlay')?.addEventListener('click', closeSuccessModal);
    
    // Exposer la fonction pour les boutons
    window.closeSuccessModal = closeSuccessModal;
    
    // Animation de la barre de stock
    function animateStockBar() {
        const stockFill = document.querySelector('.newsletter-stock-fill');
        if (stockFill) {
            // Réduire progressivement le stock
            let currentWidth = 73;
            
            setInterval(() => {
                if (Math.random() > 0.7) { // 30% de chance
                    currentWidth = Math.max(25, currentWidth - Math.random() * 2);
                    stockFill.style.width = currentWidth + '%';
                    
                    // Mise à jour du texte
                    const stockText = document.querySelector('.newsletter-stock-text strong');
                    if (stockText) {
                        const remaining = Math.floor(127 * (currentWidth / 73));
                        stockText.textContent = remaining;
                        
                        // Alerte si stock faible
                        if (remaining < 50 && !stockText.dataset.alerted) {
                            stockText.dataset.alerted = 'true';
                            showNewsletterNotification('⚠️ Plus que ' + remaining + ' places !', 'warning');
                        }
                    }
                }
            }, 30000); // Toutes les 30 secondes
        }
    }
    
    // Animation des témoignages au scroll
    function initTestimonialsAnimation() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        document.querySelectorAll('.newsletter-testimonial').forEach((testimonial, index) => {
            testimonial.style.opacity = '0';
            testimonial.style.transform = 'translateY(30px)';
            testimonial.style.transition = `all 0.6s ease-out ${index * 0.2}s`;
            observer.observe(testimonial);
        });
    }
    
    // Mise à jour en temps réel des nouveaux inscrits
    function simulateRealtimeSignups() {
        const liveText = document.querySelector('.newsletter-social-live span:last-child');
        if (!liveText) return;
        
        let dailySignups = 23;
        
        setInterval(() => {
            if (Math.random() > 0.8) { // 20% de chance
                dailySignups++;
                liveText.textContent = `+${dailySignups} nouveaux inscrits aujourd'hui`;
                
                // Animation de mise à jour
                liveText.style.color = 'var(--text-accent)';
                liveText.style.fontWeight = '600';
                
                setTimeout(() => {
                    liveText.style.color = 'var(--text-muted)';
                    liveText.style.fontWeight = '400';
                }, 2000);
            }
        }, 45000); // Toutes les 45 secondes
    }
    
    // Interaction avec les freebies
    function initFreebiesInteraction() {
        const freebieItems = document.querySelectorAll('.newsletter-freebie-item');
        
        freebieItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                // Animation de l'icône
                const icon = item.querySelector('.newsletter-freebie-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.1) rotate(5deg)';
                }
                
                // Animation de la valeur
                const valueEl = item.querySelector('.newsletter-value-free');
                if (valueEl) {
                    valueEl.style.animation = 'newsletter-glow 0.5s ease-out';
                }
            });
            
            item.addEventListener('mouseleave', () => {
                const icon = item.querySelector('.newsletter-freebie-icon');
                if (icon) {
                    icon.style.transform = 'scale(1) rotate(0deg)';
                }
                
                const valueEl = item.querySelector('.newsletter-value-free');
                if (valueEl) {
                    valueEl.style.animation = '';
                }
            });
            
            item.addEventListener('click', () => {
                const title = item.querySelector('h5').textContent;
                showNewsletterNotification(`📦 "${title}" sera dans votre pack !`, 'info');
                
                // Animation de clic
                item.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    item.style.transform = '';
                }, 150);
            });
        });
    }
    
    // Suggestions automatiques
    function initAutoSuggestions() {
        let hasShownUrgency = false;
        let hasShownBonus = false;
        
        // Suggestion urgence après 30 secondes
        setTimeout(() => {
            if (!hasShownUrgency) {
                hasShownUrgency = true;
                showNewsletterNotification('⏰ Offre limitée ! Ne ratez pas vos 5 documents gratuits', 'warning', 6000);
            }
        }, 30000);
        
        // Suggestion bonus après scroll
        window.addEventListener('scroll', () => {
            const scrollPercent = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
            
            if (scrollPercent > 70 && !hasShownBonus) {
                hasShownBonus = true;
                showNewsletterNotification('🎁 Bonus : Recevez aussi notre mini-cours gratuit !', 'info', 8000);
            }
        });
    }
    
    // Pré-remplissage intelligent
    function initSmartAutofill() {
        const emailInput = document.getElementById('newsletterEmail');
        if (!emailInput) return;
        
        // Détecter si l'utilisateur a un email sauvegardé
        const savedEmail = localStorage.getItem('user_email') || sessionStorage.getItem('user_email');
        
        if (savedEmail && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(savedEmail)) {
            setTimeout(() => {
                emailInput.value = savedEmail;
                emailInput.dispatchEvent(new Event('input'));
                showNewsletterNotification('Email pré-rempli automatiquement ✨', 'info', 3000);
            }, 2000);
        }
        
        // Sauvegarder l'email quand il est validé
        emailInput.addEventListener('input', (e) => {
            const email = e.target.value.trim();
            if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                sessionStorage.setItem('user_email', email);
            }
        });
    }
    
    // Système de notifications
    function showNewsletterNotification(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        notification.className = `newsletter-notification newsletter-notification-${type}`;
        
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
            <button class="newsletter-notification-close" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        
        notification.style.cssText = `
            position: fixed;
            top: 24px;
            right: 24px;
            background: ${colors[type]};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 3002;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-xl);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 400px;
            word-wrap: break-word;
            backdrop-filter: blur(10px);
        `;
        
        // Styles pour le bouton de fermeture
        const closeBtn = notification.querySelector('.newsletter-notification-close');
        closeBtn.style.cssText = `
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 0;
            margin-left: auto;
            opacity: 0.7;
            transition: opacity 0.2s;
        `;
        
        closeBtn.addEventListener('mouseenter', () => {
            closeBtn.style.opacity = '1';
        });
        
        closeBtn.addEventListener('mouseleave', () => {
            closeBtn.style.opacity = '0.7';
        });
        
        document.body.appendChild(notification);
        
        // Animation d'entrée
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Animation de sortie automatique
        setTimeout(() => {
            if (document.body.contains(notification)) {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        notification.remove();
                    }
                }, 300);
            }
        }, duration);
    }
    
    // Initialiser toutes les fonctionnalités
    animateSubscriberCounter();
    initCountdown();
    initEmailValidation();
    initNewsletterForm();
    animateStockBar();
    initTestimonialsAnimation();
    simulateRealtimeSignups();
    initFreebiesInteraction();
    initAutoSuggestions();
    initSmartAutofill();
    
    // Message de bienvenue avec délai
    setTimeout(() => {
        showNewsletterNotification('📧 Inscrivez-vous et recevez 5 documents premium gratuits !', 'success', 6000);
    }, 3000);
    
    // Easter egg : double-clic sur le titre
    const title = document.querySelector('.newsletter-title');
    if (title) {
        title.addEventListener('dblclick', () => {
            showNewsletterNotification('🎉 Easter egg trouvé ! Bonus secret débloqué 🔓', 'success');
            title.style.animation = 'newsletter-glow 2s ease-in-out';
        });
    }
}

// Fonction globale pour les notifications
window.showNewsletterNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        background: var(--secondary-gradient);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.9rem;
        z-index: 3002;
        box-shadow: var(--shadow-lg);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
};

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    initNewsletterSection();
});

// JavaScript pour le Footer
function initFooterSection() {
    
    // Gestion du bouton "Retour en haut"
    function initBackToTop() {
        const backToTopBtn = document.getElementById('backToTop');
        
        if (!backToTopBtn) return;
        
        // Afficher/masquer le bouton selon le scroll
        function toggleBackToTop() {
            const scrollPosition = window.pageYOffset;
            const showThreshold = 500;
            
            if (scrollPosition > showThreshold) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        }
        
        // Fonction de scroll vers le haut
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            // Animation du bouton
            backToTopBtn.style.transform = 'scale(0.9)';
            setTimeout(() => {
                backToTopBtn.style.transform = '';
            }, 150);
            
            showFooterNotification('🚀 Retour en haut !', 'info');
        }
        
        // Event listeners
        window.addEventListener('scroll', toggleBackToTop, { passive: true });
        backToTopBtn.addEventListener('click', scrollToTop);
        
        // Animation au chargement
        setTimeout(() => {
            toggleBackToTop();
        }, 1000);
    }
    
    // Gestion du formulaire newsletter du footer
    function initFooterNewsletter() {
        const form = document.querySelector('.footer-newsletter-form');
        const input = document.querySelector('.footer-newsletter-input');
        const button = document.querySelector('.footer-newsletter-btn');
        
        if (!form || !input || !button) return;
        
        // Validation email
        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        
        // Animation de succès
        function showSuccess() {
            const originalBtnHTML = button.innerHTML;
            const originalBtnBg = button.style.background;
            
            button.innerHTML = '<i class="fas fa-check"></i>';
            button.style.background = 'var(--success-gradient)';
            button.style.transform = 'scale(1.1)';
            
            setTimeout(() => {
                button.innerHTML = originalBtnHTML;
                button.style.background = originalBtnBg;
                button.style.transform = '';
            }, 2000);
        }
        
        // Animation d'erreur
        function showError() {
            input.style.borderColor = '#ef4444';
            input.style.animation = 'footer-shake 0.5s';
            
            setTimeout(() => {
                input.style.borderColor = '';
                input.style.animation = '';
            }, 1000);
        }
        
        // Soumission du formulaire
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const email = input.value.trim();
            
            if (!email) {
                showFooterNotification('Veuillez entrer votre email', 'error');
                input.focus();
                return;
            }
            
            if (!validateEmail(email)) {
                showFooterNotification('Format d\'email invalide', 'error');
                showError();
                return;
            }
            
            // Animation de chargement
            const originalBtnHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            button.disabled = true;
            
            try {
                // Simuler l'envoi (remplacer par votre API)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                showSuccess();
                input.value = '';
                
                showFooterNotification('✅ Inscription réussie ! Merci de nous rejoindre', 'success');
                
                // Mise à jour du compteur
                updateSubscriberCount();
                
            } catch (error) {
                button.innerHTML = originalBtnHTML;
                showFooterNotification('Erreur lors de l\'inscription', 'error');
            } finally {
                button.disabled = false;
                setTimeout(() => {
                    if (button.innerHTML.includes('spinner')) {
                        button.innerHTML = originalBtnHTML;
                    }
                }, 2000);
            }
        });
        
        // Validation en temps réel
        input.addEventListener('input', () => {
            const email = input.value.trim();
            if (email && validateEmail(email)) {
                input.style.borderColor = 'var(--success-gradient)';
            } else if (email) {
                input.style.borderColor = '#ef4444';
            } else {
                input.style.borderColor = '';
            }
        });
    }
    
    // Mise à jour du compteur d'abonnés
    function updateSubscriberCount() {
        const numberEl = document.querySelector('.footer-stats-number');
        if (!numberEl) return;
        
        const current = parseInt(numberEl.textContent.replace(/[^\d]/g, ''));
        const newCount = current + 1;
        
        // Animation du compteur
        numberEl.style.transform = 'scale(1.2)';
        numberEl.style.color = 'var(--text-accent)';
        
        setTimeout(() => {
            numberEl.textContent = newCount.toLocaleString() + '+';
            numberEl.style.transform = 'scale(1)';
            numberEl.style.color = '';
        }, 300);
    }
    
    // Interactions avec les liens sociaux
    function initSocialLinks() {
        const socialLinks = document.querySelectorAll('.footer-social-link');
        
        socialLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const platform = link.dataset.platform;
                const platformNames = {
                    facebook: 'Facebook',
                    twitter: 'Twitter',
                    linkedin: 'LinkedIn',
                    youtube: 'YouTube',
                    github: 'GitHub'
                };
                
                // Animation du lien
                link.style.transform = 'scale(0.9) translateY(-3px)';
                setTimeout(() => {
                    link.style.transform = '';
                }, 200);
                
                showFooterNotification(`🔗 Redirection vers ${platformNames[platform]}`, 'info');
                
                // Simuler l'ouverture (remplacer par vos vrais liens)
                setTimeout(() => {
                    // window.open(`https://${platform}.com/learnica`, '_blank');
                }, 1000);
            });
            
            // Tooltip au survol
            link.addEventListener('mouseenter', () => {
                const platform = link.dataset.platform;
                const platformNames = {
                    facebook: 'Facebook',
                    twitter: 'Twitter', 
                    linkedin: 'LinkedIn',
                    youtube: 'YouTube',
                    github: 'GitHub'
                };
                
                // Créer tooltip temporaire
                const tooltip = document.createElement('div');
                tooltip.textContent = `Suivez-nous sur ${platformNames[platform]}`;
                tooltip.style.cssText = `
                    position: absolute;
                    bottom: 120%;
                    left: 50%;
                    transform: translateX(-50%);
                    background: var(--dark-card);
                    color: var(--text-primary);
                    padding: 0.5rem 1rem;
                    border-radius: 6px;
                    font-size: 0.8rem;
                    white-space: nowrap;
                    z-index: 1000;
                    opacity: 0;
                    transition: opacity 0.3s;
                    pointer-events: none;
                `;
                
                link.style.position = 'relative';
                link.appendChild(tooltip);
                
                setTimeout(() => {
                    tooltip.style.opacity = '1';
                }, 100);
            });
            
            link.addEventListener('mouseleave', () => {
                const tooltip = link.querySelector('div');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    }
    
    // Interactions avec les liens de navigation
    function initFooterLinks() {
        const footerLinks = document.querySelectorAll('.footer-link');
        
        footerLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const linkText = link.textContent;
                
                // Animation du lien
                link.style.transform = 'scale(0.95) translateX(5px)';
                setTimeout(() => {
                    link.style.transform = '';
                }, 200);
                
                // Différentes actions selon le lien
                if (linkText.includes('Blog') || linkText.includes('Articles')) {
                    showFooterNotification('📝 Redirection vers le blog...', 'info');
                } else if (linkText.includes('Formation') || linkText.includes('Cours')) {
                    showFooterNotification('🎓 Redirection vers les formations...', 'info');
                } else if (linkText.includes('Contact') || linkText.includes('Support')) {
                    showFooterNotification('💬 Ouverture du support...', 'info');
                } else if (linkText.includes('FAQ')) {
                    // Scroll vers la section FAQ
                    const faqSection = document.querySelector('.faq-section');
                    if (faqSection) {
                        faqSection.scrollIntoView({ behavior: 'smooth' });
                        showFooterNotification('❓ Redirection vers la FAQ', 'success');
                    }
                } else {
                    showFooterNotification(`🔗 Navigation vers : ${linkText}`, 'info');
                }
            });
        });
    }
    
    // Interactions avec les liens légaux
    function initLegalLinks() {
        const legalLinks = document.querySelectorAll('.footer-legal-link');
        
        legalLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const linkText = link.textContent;
                
                // Animation du lien
                link.style.borderBottomColor = 'var(--text-accent)';
                link.style.borderBottomWidth = '2px';
                
                setTimeout(() => {
                    link.style.borderBottomColor = '';
                    link.style.borderBottomWidth = '';
                }, 1000);
                
                showFooterNotification(`📄 Ouverture : ${linkText}`, 'info');
            });
        });
    }
    
    // Animation des badges de certification
    function initCertificationBadges() {
        const badges = document.querySelectorAll('.footer-cert-badge');
        
        badges.forEach((badge, index) => {
            badge.addEventListener('click', () => {
                const badgeText = badge.textContent.trim();
                
                // Animation de rotation
                badge.style.transform = 'rotate(360deg) scale(1.1)';
                setTimeout(() => {
                    badge.style.transform = '';
                }, 500);
                
                const messages = {
                    'SSL': '🔒 Connexion sécurisée SSL/TLS',
                    'RGPD': '🛡️ Conforme RGPD - Vos données protégées',
                    'ISO 27001': '📋 Certifié ISO 27001 - Sécurité garantie',
                    'Quality+': '⭐ Label qualité premium'
                };
                
                showFooterNotification(messages[badgeText] || `✅ ${badgeText} vérifié`, 'success');
            });
        });
        
        // Animation d'apparition au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    badges.forEach((badge, index) => {
                        setTimeout(() => {
                            badge.style.opacity = '0';
                            badge.style.transform = 'translateY(20px)';
                            badge.style.transition = 'all 0.5s ease-out';
                            
                            setTimeout(() => {
                                badge.style.opacity = '1';
                                badge.style.transform = 'translateY(0)';
                            }, 100);
                        }, index * 100);
                    });
                }
            });
        }, { threshold: 0.5 });
        
        const certificationsSection = document.querySelector('.footer-certifications');
        if (certificationsSection) {
            observer.observe(certificationsSection);
        }
    }
    
    // Animation de typing pour le copyright
    function initCopyrightAnimation() {
        const copyrightText = document.querySelector('.footer-copyright span');
        if (!copyrightText) return;
        
        const originalText = copyrightText.textContent;
        
        // Animation de typing au chargement
        setTimeout(() => {
            copyrightText.textContent = '';
            let i = 0;
            
            const typeInterval = setInterval(() => {
                copyrightText.textContent = originalText.slice(0, i + 1);
                i++;
                
                if (i >= originalText.length) {
                    clearInterval(typeInterval);
                }
            }, 50);
        }, 2000);
    }
    
    // Gestion des raccourcis clavier
    function initKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // Ctrl + Haut de page = retour en haut
            if (e.ctrlKey && e.key === 'Home') {
                e.preventDefault();
                const backToTopBtn = document.getElementById('backToTop');
                if (backToTopBtn) {
                    backToTopBtn.click();
                }
            }
            
            // Ctrl + End = aller au footer
            if (e.ctrlKey && e.key === 'End') {
                e.preventDefault();
                const footer = document.querySelector('.footer-section');
                if (footer) {
                    footer.scrollIntoView({ behavior: 'smooth' });
                    showFooterNotification('⬇️ Navigation vers le footer', 'info');
                }
            }
        });
    }
    
    // Système de notifications du footer
    function showFooterNotification(message, type = 'info', duration = 3000) {
        const notification = document.createElement('div');
        notification.className = `footer-notification footer-notification-${type}`;
        
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
            bottom: 100px;
            right: 24px;
            background: ${colors[type]};
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.85rem;
            z-index: 3001;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-lg);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 300px;
            word-wrap: break-word;
        `;
        
        document.body.appendChild(notification);
        
        // Animation d'entrée
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Animation de sortie
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    notification.remove();
                }
            }, 300);
        }, duration);
    }
    
    // Animation de shake pour les erreurs
    function addShakeAnimation() {
        if (document.getElementById('footer-shake-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'footer-shake-styles';
        style.textContent = `
            @keyframes footer-shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Animation du logo au clic
    function initLogoAnimation() {
        const logo = document.querySelector('.footer-logo');
        if (!logo) return;
        
        logo.addEventListener('click', () => {
            const logoIcon = logo.querySelector('.footer-logo-icon');
            const logoText = logo.querySelector('.footer-logo-text');
            
            // Animation épique
            logoIcon.style.animation = 'footer-spin 1s ease-in-out';
            logoText.style.animation = 'footer-glow 1s ease-in-out';
            
            setTimeout(() => {
                logoIcon.style.animation = '';
                logoText.style.animation = '';
            }, 1000);
            
            showFooterNotification('🎓 Merci de choisir Learnica !', 'success');
        });
        
        // Ajouter les animations CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes footer-spin {
                from { transform: rotate(0deg) scale(1); }
                50% { transform: rotate(180deg) scale(1.2); }
                to { transform: rotate(360deg) scale(1); }
            }
            
            @keyframes footer-glow {
                0%, 100% { text-shadow: none; }
                50% { text-shadow: 0 0 20px rgba(102, 126, 234, 0.8); }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Initialiser toutes les fonctionnalités
    initBackToTop();
    initFooterNewsletter();
    initSocialLinks();
    initFooterLinks();
    initLegalLinks();
    initCertificationBadges();
    initCopyrightAnimation();
    initKeyboardShortcuts();
    addShakeAnimation();
    initLogoAnimation();
    
    // Message de fin de chargement
    setTimeout(() => {
        showFooterNotification('🎉 Landing page complètement chargée !', 'success', 4000);
    }, 2000);
}

// Fonction globale pour les notifications footer
window.showFooterNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        bottom: 100px;
        right: 24px;
        background: var(--primary-gradient);
        color: white;
        padding: 0.75rem 1.25rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.85rem;
        z-index: 3001;
        box-shadow: var(--shadow-lg);
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
};

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    initFooterSection();
});

(function(){
     class TestimonialCarousel {
            constructor() {
                this.slides = document.querySelectorAll('.testimonial-slide');
                this.indicators = document.querySelectorAll('.indicator');
                this.leftArrow = document.querySelector('.carousel-arrow.left');
                this.rightArrow = document.querySelector('.carousel-arrow.right');
                this.currentSlide = 0;
                this.autoPlayInterval = null;
                
                this.init();
            }

            init() {
                this.bindEvents();
                this.startAutoPlay();
            }

            bindEvents() {
                this.leftArrow.addEventListener('click', () => this.previousSlide());
                this.rightArrow.addEventListener('click', () => this.nextSlide());

                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });

                // Pause au survol
                const container = document.querySelector('.carousel-container');
                container.addEventListener('mouseenter', () => this.stopAutoPlay());
                container.addEventListener('mouseleave', () => this.startAutoPlay());

                // Support clavier
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') this.previousSlide();
                    if (e.key === 'ArrowRight') this.nextSlide();
                });
            }

            showSlide(index) {
                // Masquer tous les slides
                this.slides.forEach(slide => {
                    slide.classList.remove('active');
                });

                // Désactiver tous les indicateurs
                this.indicators.forEach(indicator => {
                    indicator.classList.remove('active');
                });

                // Afficher le slide actuel
                this.slides[index].classList.add('active');
                this.indicators[index].classList.add('active');
                
                this.currentSlide = index;
            }

            nextSlide() {
                const nextIndex = (this.currentSlide + 1) % this.slides.length;
                this.showSlide(nextIndex);
            }

            previousSlide() {
                const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.showSlide(prevIndex);
            }

            goToSlide(index) {
                this.showSlide(index);
            }

            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, 5000); // Change toutes les 5 secondes
            }

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }
        }

        // Initialiser le carousel quand la page est chargée
        document.addEventListener('DOMContentLoaded', () => {
            new TestimonialCarousel();
        });
}());

    //(function(){
        function blogSystemToggleComments(header) {
            const content = header.nextElementSibling;
            const toggle = header.querySelector('.blog-system-comments-toggle');
            
            content.classList.toggle('blog-system-open');
            toggle.classList.toggle('blog-system-open');
        }

        function blogSystemToggleLike(button) {
            const span = button.querySelector('span');
            const currentLikes = parseInt(span.textContent);
            
            if (button.classList.contains('blog-system-liked')) {
                button.classList.remove('blog-system-liked');
                span.textContent = currentLikes - 1;
            } else {
                button.classList.add('blog-system-liked');
                span.textContent = currentLikes + 1;
            }
        }

        function blogSystemShareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: 'Article intéressant',
                    text: 'Découvrez cet article intéressant !',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Lien copié dans le presse-papier !');
            }
        }

        function blogSystemSubmitComment() {
            const commentText = document.getElementById('blog-system-comment-text');
            const userName = document.getElementById('blog-system-user-name');
            const userAvatar = document.getElementById('blog-system-user-avatar');
            
            if (!commentText.value.trim() || !userName.value.trim()) {
                alert('Veuillez remplir votre nom et votre commentaire');
                return;
            }

            const commentsList = document.getElementById('blog-system-comments-list');
            const newComment = document.createElement('div');
            newComment.className = 'blog-system-comment';
            
            const initials = userName.value.trim().split(' ').map(name => name[0]).join('').toUpperCase();
            
            newComment.innerHTML = `
                <div class="blog-system-comment-author-avatar">
                    <span>${initials}</span>
                </div>
                <div class="blog-system-comment-content">
                    <div class="blog-system-comment-header">
                        <span class="blog-system-comment-author">${userName.value.trim()}</span>
                        <span class="blog-system-comment-date">À l'instant</span>
                    </div>
                    <div class="blog-system-comment-text">
                        ${commentText.value.trim()}
                    </div>
                </div>
            `;
            
            const noComments = commentsList.querySelector('.blog-system-no-comments');
            if (noComments) {
                noComments.remove();
            }
            
            commentsList.insertBefore(newComment, commentsList.firstChild);
            
            const commentsHeader = commentsList.closest('.blog-system-comments').querySelector('.blog-system-comments-title');
            const currentCount = parseInt(commentsHeader.textContent.match(/\d+/)[0]);
            commentsHeader.innerHTML = `<i class="fas fa-comments"></i> Commentaires (${currentCount + 1})`;
            
            commentText.value = '';
            userName.value = '';
            document.getElementById('blog-system-user-email').value = '';
            userAvatar.textContent = '?';
            
            newComment.style.opacity = '0';
            newComment.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                newComment.style.transition = 'all 0.3s ease';
                newComment.style.opacity = '1';
                newComment.style.transform = 'translateY(0)';
            }, 100);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const nameInputs = document.querySelectorAll('#blog-system-user-name');
            nameInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const avatar = this.closest('.blog-system-comment-form').querySelector('#blog-system-user-avatar');
                    if (this.value.trim()) {
                        const initials = this.value.trim().split(' ').map(name => name[0]).join('').toUpperCase();
                        avatar.textContent = initials;
                    } else {
                        avatar.textContent = '?';
                    }
                });
            });
        });
   // })();

// }());

(function(){
  document.addEventListener('DOMContentLoaded', function () {
    const testimonials = document.querySelectorAll('.testimonial');
    const prevBtn = document.querySelector('.carousel-nav.prev');
    const nextBtn = document.querySelector('.carousel-nav.next');
    let index = 0;

    function showTestimonial(i) {
      testimonials.forEach((testimonial, idx) => {
        testimonial.classList.remove('active');
        testimonial.style.transform = `translateX(${(idx - i) * 100}%)`;
      });
      testimonials[i].classList.add('active');
    }

    prevBtn.addEventListener('click', () => {
      index = (index - 1 + testimonials.length) % testimonials.length;
      showTestimonial(index);
    });

    nextBtn.addEventListener('click', () => {
      index = (index + 1) % testimonials.length;
      showTestimonial(index);
    });

    // Initial display
    showTestimonial(index);
  });
})();
    </script>
</body>
</html>