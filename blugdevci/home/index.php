<?php
// Démarrer la session

// session_start();
//    echo "<pre>".print_r($_SESSION, true)."</pre>";
include(__DIR__.'/../login/connexion.php');
include(__DIR__.'/../login/paginate.php');
include(__DIR__.'/coursinformatique/commentaire_add_config.php');
// include(__DIR__.'/../include_fichiers/if_no_connect.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnica</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        /* ==========================================================================
        CSS VARIABLES ET BASE
        ========================================================================== */

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        :root {
            /* Gradients */
            --primary-gradient: linear-gradient(135deg, #01041180 0%, #04c8e280 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            --btn-voir-plus-gradient: linear-gradient(135deg, #08474710 0%, #115f024d 100%);
            
            /* Colors */
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
            
            /* Shadows */
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.2);
            --shadow-xl: 0 15px 35px rgba(0, 0, 0, 0.25);
            
            /* Border Radius */
            --border-radius: 16px;
            --border-radius-sm: 8px;
            --border-radius-lg: 24px;
            
            /* Transitions */
            --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            
            /* Layout */
            --sidebar-width: 320px;
            --sidebar-collapsed-width: 80px;
            --container-max-width: 1200px;
            --grid-gap: clamp(1rem, 3vw, 2rem);
        }

        /* ==========================================================================
        RESET ET BASE
        ========================================================================== */

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

        /* Scrollbar */
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

        /* ==========================================================================
        CLASSES UTILITAIRES
        ========================================================================== */

        .container {
            width: min(100% - 2rem, var(--container-max-width));
            margin-inline: auto;
        }

        .hover-lift {
            transition: all var(--transition-normal);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--text-accent);
        }

        .text-gradient {
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .grid-responsive {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(320px, 100%), 1fr));
            gap: var(--grid-gap);
        }

        .grid-3-cols {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: var(--grid-gap);
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 1rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: var(--accent-gradient);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-secondary);
            border: 2px solid var(--border-primary);
            padding: 1rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: var(--surface-primary);
            color: var(--text-accent);
            border-color: var(--text-accent);
        }

        /* ==========================================================================
        Gestion de la video
        ========================================================================== */

        .video-box {
            width: 100%;
            height: 80%;
            border: 2px solid #004914ff;
            overflow: hidden;
            box-shadow: 9px 20px 20px 8px #00632ca6;
            }

            .video-box video {
            width: 100%;
            height: 100%;
            object-fit: fill; /* ou contain, fill, none, scale-down */
            }

        /* ==========================================================================
        LAYOUT PRINCIPAL
        ========================================================================== */

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* ==========================================================================
        SIDEBAR
        ========================================================================== */

        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark-secondary);
            position: fixed;
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

        /* Admin Info */
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

        /* Navigation */
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

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
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

        /* ==========================================================================
        MAIN CONTENT
        ========================================================================== */

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

        /* Header */
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
            max-width: var(--container-max-width);
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

        .content-wrapper {
            padding: 32px;
            max-width: var(--container-max-width);
            margin: 0 auto;
        }

        /* ==========================================================================
        HERO SECTION
        ========================================================================== */

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

        .lernica_style_nav_content-hero_contents{
            display: flex;
            gap: 2px;
            /* margin-top: 60px; */
        }

        @keyframes hero-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero-title {
            font-size: clamp(2rem, 1vw, 0.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            margin-left: 25%;
            background: linear-gradient(135deg, #ffffff 0%, var(--text-accent) 50%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: hero-text-appear 1s ease-out;
            max-width: 700px;
            text-align: center;
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

        /* ==========================================================================
        CAROUSEL TESTIMONIALS
        ========================================================================== */

        .carousel-container {
            position: relative;
            max-width: 100%;
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-primary);
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
            font-size: 1.2rem;
            line-height: 1.6;
            color: var(--text-primary);
            margin-bottom: 2rem;
            text-align: center;
            font-style: italic;
        }

        .social-proof-testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            max-width: 400px;
            margin: 0 auto;
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
            flex-shrink: 0;
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
            display: flex;
            gap: 0.25rem;
            margin-left: auto;
        }

        .social-proof-star {
            color: #fbbf24;
            font-size: 1.2rem;
        }

        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: var(--surface-primary);
            color: var(--text-secondary);
            border: 1px solid var(--border-primary);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            user-select: none;
        }

        .carousel-arrow:hover {
            background: var(--surface-secondary);
            color: var(--text-accent);
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
            margin-top: 2rem;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            cursor: pointer;
            transition: all var(--transition-normal);
        }

        .indicator.active {
            background: var(--text-accent);
            transform: scale(1.2);
        }

        /* ==========================================================================
        SOCIAL PROOF SECTION
        ========================================================================== */

        .social-proof-section {
            background: var(--dark-secondary);
            padding: 4rem 0;
            border-top: 1px solid var(--border-primary);
            border-bottom: 1px solid var(--border-primary);
            margin-bottom: 4rem;
        }

        .social-proof-container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 2rem;
        }

        .social-proof-intros {
            text-align: justify;
            margin-bottom: 3rem;
        }

        .social-proof-intros h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .social-proof-intros ul {
            padding-left: 2rem;
            margin: 1.5rem 0;
        }

        .social-proof-intros li {
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
        }

        .bottom-line {
            font-weight: 600;
            color: var(--text-primary);
            margin-top: 1.5rem;
        }

        .social-proof-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .social-proof-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .social-proof-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .social-proof-trust {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .social-proof-trust-item {
            text-align: center;
            padding: 2rem;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
        }

        .social-proof-trust-item:hover {
            background: var(--surface-secondary);
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
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
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .social-proof-trust-desc {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .social-proof-companies {
            text-align: center;
            margin-top: 3rem;
        }

        .social-proof-companies-title {
            color: var(--text-muted);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .social-proof-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .social-proof-logo {
            padding: 1rem 1.5rem;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
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
            transform: translateY(-3px);
        }

        .testimonial-carousel-wrapper {
            position: relative;
            overflow: hidden;
            margin: 2rem 0;
        }

        .testimonial-carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .testimonial {
            min-width: 100%;
            padding: 2rem;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            text-align: center;
            opacity: 0.6;
            transform: scale(0.95);
            transition: all var(--transition-normal);
        }

        .testimonial.active {
            opacity: 1;
            transform: scale(1);
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: var(--accent-gradient);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            z-index: 2;
            transition: all var(--transition-normal);
        }

        .carousel-nav:hover {
            background: var(--primary-gradient);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-nav.prev {
            left: 10px;
        }

        .carousel-nav.next {
            right: 10px;
        }

        .document-back-to-bottom {
            text-align: center;
            margin: 2rem 0;
        }

        .document-back-to-bottom a {
            color: var(--text-accent);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all var(--transition-normal);
        }

        .document-back-to-bottom a:hover {
            color: var(--text-primary);
        }

        /* ==========================================================================
        BLOG SECTION
        ========================================================================== */

        .blog-section {
            background: var(--dark-bg);
            padding: 5rem 0;
        }

        .blog-container {
            max-width: var(--container-max-width);
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
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            color: var(--text-primary);
        }

        .blog-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

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
        }

        .blog-category-btn:hover,
        .blog-category-btn.active {
            background: var(--accent-gradient);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .blog-system-container {
            font-family: 'Inter', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            padding: 2rem 0;
        }

        .blog-system-main {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 2rem;
        }

        .blog-system-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .blog-system-card {
            background: var(--dark-secondary);
            border-radius: var(--border-radius);
            overflow: hidden;
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            box-shadow: var(--shadow-md);
        }

        .blog-system-card:hover {
            transform: translateY(-5px);
            border-color: var(--text-accent);
            box-shadow: var(--shadow-xl);
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
            transition: transform var(--transition-normal);
        }

        .blog-system-card:hover .blog-system-img {
            transform: scale(1.05);
        }

        .blog-system-badges {
            position: absolute;
            top: 1rem;
            left: 1rem;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .blog-system-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid var(--border-primary);
        }

        .blog-system-badge-featured {
            background: var(--warning-gradient);
            color: #1e293b;
            border-color: transparent;
        }

        .blog-system-badge-category {
            background: var(--surface-primary);
            color: var(--text-secondary);
        }

        .blog-system-content {
            padding: 1.5rem;
        }

        .blog-system-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .blog-system-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .blog-system-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
            line-height: 1.3;
        }

        .blog-system-excerpt {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .blog-system-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .blog-system-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .blog-system-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .blog-system-author-info {
            display: flex;
            flex-direction: column;
        }

        .blog-system-author-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .blog-system-author-role {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .blog-system-engagement {
            display: flex;
            gap: 0.5rem;
        }

        .blog-system-like-btn,
        .blog-system-share-btn {
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            color: var(--text-secondary);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .blog-system-like-btn:hover {
            background: var(--danger-gradient);
            color: white;
            border-color: transparent;
        }

        .blog-system-share-btn:hover {
            background: var(--accent-gradient);
            color: white;
            border-color: transparent;
        }

        .blog-system-like-btn.blog-system-liked {
            color: #ef4444;
        }

        .blog-system-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-accent);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-normal);
        }

        .blog-system-read-more:hover {
            color: var(--text-primary);
            transform: translateX(5px);
        }

        .document-actions {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        /* Blog Comments System */
        .blog-system-comments {
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            margin-top: 1rem;
            overflow: hidden;
        }

        .blog-system-comments-header {
            background: var(--surface-secondary);
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-primary);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all var(--transition-normal);
        }

        .blog-system-comments-header:hover {
            background: var(--dark-card);
        }

        .blog-system-comments-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .blog-system-comments-toggle {
            transition: transform var(--transition-normal);
        }

        .blog-system-comments-toggle.blog-system-open {
            transform: rotate(180deg);
        }

        .blog-system-comments-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height var(--transition-slow);
        }

        .blog-system-comments-content.blog-system-open {
            max-height: 800px;
        }

        .blog-system-comment-form {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-primary);
        }

        .blog-system-comment-input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .blog-system-comment-input {
            flex: 1;
            background: var(--surface-secondary);
            border: 1px solid var(--border-primary);
            color: var(--text-primary);
            padding: 1rem;
            border-radius: var(--border-radius);
            resize: vertical;
            min-height: 80px;
        }

        .blog-system-comment-input::placeholder {
            color: var(--text-muted);
        }

        .blog-system-comment-avatar-input {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            border: 2px solid var(--border-primary);
            flex-shrink: 0;
        }

        .blog-system-comment-form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-system-comment-submit {
            background: var(--success-gradient);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .blog-system-comment-submit:hover {
            background: var(--primary-gradient);
            transform: translateY(-2px);
        }

        .blog-system-comments-list {
            padding: 1.5rem;
            max-height: 400px;
            overflow-y: auto;
        }

        .blog-system-comment {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-secondary);
        }

        .blog-system-comment:last-child {
            border-bottom: none;
        }

        .blog-system-comment-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            border: 2px solid var(--border-primary);
            flex-shrink: 0;
        }

        .blog-system-comment-content {
            flex: 1;
        }

        .blog-system-comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .blog-system-comment-author {
            font-weight: 600;
            color: var(--text-primary);
        }

        .blog-system-comment-date {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .blog-system-comment-text {
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .blog-system-no-comments {
            text-align: center;
            color: var(--text-muted);
            font-style: italic;
            padding: 2rem;
        }

        .blog-cta {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 3rem 2rem;
            text-align: center;
            border: 1px solid var(--border-primary);
            margin-top: 3rem;
        }

        .blog-cta-content {
            max-width: 600px;
            margin: 0 auto;
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
            margin-bottom: 2rem;
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
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
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

        /* ==========================================================================
        COMMUNITY SECTION
        ========================================================================== */

        .community-section {
            background: var(--dark-secondary);
            padding: 5rem 0;
            border-top: 1px solid var(--border-primary);
            border-bottom: 1px solid var(--border-primary);
        }

        .community-container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 2rem;
        }

        .community-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .community-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-primary);
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

        .community-stat-content {
            flex: 1;
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

        .community-cta {
            background: var(--dark-bg);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius-lg);
            padding: 3rem;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 3rem;
            align-items: center;
            margin-top: 3rem;
        }

        .community-cta-content {
            flex: 1;
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

        .community-online-members {
            flex-shrink: 0;
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

        @keyframes community-pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
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

        /* ==========================================================================
        FAQ SECTION
        ========================================================================== */

        .faq-section {
            background: var(--dark-bg);
            padding: 5rem 0;
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
            margin-bottom: 1rem;
            color: var(--text-primary);
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
        }

        /* Newsletter Modal */
        .newsletter-success-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
            transition: all var(--transition-normal);
        }

        .newsletter-success-modal.show {
            opacity: 1;
            visibility: visible;
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
            transition: all var(--transition-normal);
            backdrop-filter: blur(5px);
        }

        .newsletter-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* ==========================================================================
        COURSE SECTION
        ========================================================================== */

        .section-container {
            width: 100%;
            margin-bottom: 4rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            color: var(--text-primary);
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .course-content-grid {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 2rem;
            align-items: start;
        }

        .course-sidebar {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            border: 1px solid var(--border-primary);
            position: sticky;
            top: 120px;
            max-height: calc(100vh - 160px);
            overflow-y: auto;
        }

        .course-sidebar h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
            margin-bottom: 0.5rem;
        }

        .course-nav a {
            display: block;
            padding: 0.75rem 1rem;
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
            margin-top: 0.5rem;
            padding-left: 1rem;
        }

        .course-nav ul ul a {
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
            color: var(--text-muted);
        }

        .course-nav ul ul a:hover {
            background: var(--surface-primary);
            color: var(--text-secondary);
        }

        .course-content {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            border: 1px solid var(--border-primary);
        }

        .generalite {
            max-width: none;
        }

        .titre {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .generalite ol {
            margin-top: 1.5rem;
            padding-left: 1.5rem;
        }

        .generalite ol li {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .animate-slide-in {
            animation: slideInLeft 0.6s ease-out;
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

        /* ==========================================================================
        FOOTER SECTION
        ========================================================================== */

        .footer-section {
            background: linear-gradient(135deg, var(--dark-tertiary) 0%, #0a0a1a 100%);
            color: var(--text-secondary);
            position: relative;
            overflow: hidden;
        }

        .footer-container {
            max-width: var(--container-max-width);
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.2fr 2fr 1fr;
            gap: 4rem;
            padding: 4rem 0;
            border-bottom: 1px solid var(--border-primary);
        }

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
            color: var(--text-primary);
        }

        .footer-brand-desc {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 0.95rem;
        }

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

        .footer-social-link:hover {
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
        }

        .footer-social-link[data-platform="facebook"]:hover {
            background: #1877f2;
        }

        .footer-social-link[data-platform="twitter"]:hover {
            background: #1da1f2;
        }

        .footer-social-link[data-platform="linkedin"]:hover {
            background: #0a66c2;
        }

        .footer-social-link[data-platform="youtube"]:hover {
            background: #ff0000;
        }

        .footer-social-link[data-platform="github"]:hover {
            background: #333;
        }

        .footer-social-link i {
            font-size: 1.2rem;
            position: relative;
            z-index: 2;
        }

        .footer-social-link span {
            display: none;
        }

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

        .footer-stats-text {
            margin-left: 0.5rem;
        }

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
        a{
            text-decoration: none;
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

        /* ==========================================================================
        ANIMATIONS
        ========================================================================== */

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

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out;
        }



        /* ==========================================================================
        popup document edit
        ========================================================================== */

        .ouverture_doc{
            position: fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100vh;
            Z-index:9999;
            background: rgba(0, 0, 0, 0.65);
            
        }
        .body_scroll{
            overflow: hidden;
        }
        .document_content{
            width: 90%;
            position: relative;
            left: 5%;
        }

        /* ==========================================================================
        ACCESSIBILITY
        ========================================================================== */

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        :focus-visible {
            outline: 2px solid var(--text-accent);
            outline-offset: 2px;
        }

        /* ==========================================================================
        RESPONSIVE DESIGN
        ========================================================================== */

        /* Tablets et petits laptops */
        @media (max-width: 1024px) {
            :root {
                --sidebar-width: 280px;
                --grid-gap: 1.5rem;
            }
            
            .course-content-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .course-sidebar {
                position: static;
                max-height: none;
                order: 2;
            }
            
            .course-content {
                order: 1;
            }
            
            .blog-system-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
            }
            
            .grid-3-cols,
            .grid-responsive {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .content-wrapper {
                padding: 24px;
            }
            
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
            
            .community-cta {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }
        }

        /* Tablettes */
        @media (max-width: 768px) {
            /* Reset mobile-first */
            * {
                -webkit-tap-highlight-color: transparent;
            }
            
            /* html {
                font-size: 16px;
            } */
            
            body {
                font-size: 1rem;
                line-height: 1.5;
            }
            
            /* Layout */
            .sidebar {
                transform: translateX(-100%);
                z-index: 2000;
                width: 85vw;
                max-width: 320px;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
                /* margin-left: -10%; */
            }
            
            .sidebar.collapsed + .main-content {
                margin-left: 0;
            }
            
            /* Mobile menu */
            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 2001;
                width: 50px;
                height: 50px;
                background: var(--primary-gradient);
                border: none;
                border-radius: 12px;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
            }
            
            .mobile-menu-btn:hover {
                transform: scale(1.05);
            }
            
            .mobile-menu-btn:active {
                transform: scale(0.95);
            }
            
            /* Hero section mobile */
            .hero-section {
                min-height: 100vh;
                padding: 6rem 1rem 4rem;
                margin-top: -20%;
            }
            
            .hero-container {
                padding: 0;
                max-width: 100%;
            }
            
            .hero-badge {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
                margin-bottom: 1.5rem;
            }
            
            .hero-title {
                font-size: 10px;
                margin-bottom: 1.5rem;
                margin-left: 5%;
                line-height: 1.2;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                margin-bottom: 2rem;
                padding: 0 1rem;
            }
            
            .hero-cta-container {
                flex-direction: column;
                gap: 1rem;
                margin-bottom: 2rem;
                padding: 0 1rem;
            }
            
            .hero-btn-primary,
            .hero-btn-secondary {
                width: 100%;
                max-width: 300px;
                padding: 1rem;
                font-size: 1rem;
                justify-content: center;
            }
            
            /* Content */
            .content-wrapper {
                padding: 2rem 1rem;
            }
            
            .section-header {
                margin-bottom: 2rem;
                padding: 0 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
            
            .section-subtitle {
                font-size: 1rem;
                padding: 0 1rem;
            }
            
            /* Blog system mobile */
            .blog-system-container {
                padding: 0;
            }
            
            .blog-system-main {
                padding: 0 1rem;
            }
            
            .blog-system-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .blog-system-card {
                margin-bottom: 1rem;
            }
            
            .blog-system-content {
                padding: 1.5rem;
            }
            
            .blog-system-title {
                font-size: 1.2rem;
                line-height: 1.3;
            }
            
            .blog-system-excerpt {
                font-size: 0.95rem;
                line-height: 1.5;
            }
            
            .blog-system-meta {
                flex-wrap: wrap;
                gap: 0.5rem;
                font-size: 0.85rem;
            }
            
            .blog-system-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .blog-system-engagement {
                gap: 1rem;
            }
            
            .blog-system-like-btn,
            .blog-system-share-btn {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            
            .document-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn-primary,
            .btn-secondary {
                width: 100%;
                padding: 1rem;
                font-size: 1rem;
                justify-content: center;
            }
            
            /* Comments mobile */
            .blog-system-comment-input-group {
                flex-direction: column;
                gap: 1rem;
            }
            
            .blog-system-comment-form-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .blog-system-comment-submit {
                width: 100%;
                padding: 1rem;
                justify-content: center;
            }
            
            /* Carousel mobile */
            .carousel-container {
                padding: 1.5rem;
                margin-bottom: 2rem;
            }
            
            .social-proof-testimonial-content {
                font-size: 1.1rem;
                margin-bottom: 1.5rem;
            }
            
            .social-proof-testimonial-author {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
                padding: 1rem;
                max-width: 100%;
            }
            
            .carousel-arrow {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
            }
            
            .carousel-arrow.left {
                left: -15px;
            }
            
            .carousel-arrow.right {
                right: -15px;
            }
            
            /* Social proof mobile */
            .social-proof-section {
                padding: 3rem 0;
            }
            
            .social-proof-container {
                padding: 0 1rem;
            }
            
            .social-proof-intros {
                margin-bottom: 2rem;
            }
            
            .social-proof-intros h2 {
                font-size: 1.5rem;
                text-align: center;
            }
            
            .social-proof-trust {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .social-proof-trust-item {
                padding: 1.5rem;
                text-align: center;
            }
            
            .social-proof-logos {
                flex-direction: column;
                gap: 1rem;
            }
            
            .social-proof-logo {
                width: 100%;
                max-width: 250px;
                margin: 0 auto;
            }
            
            /* Community mobile */
            .community-section {
                padding: 3rem 0;
            }
            
            .community-container {
                padding: 0 1rem;
            }
            
            .community-title {
                font-size: 1.8rem;
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
            
            .community-stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .community-stat-card {
                padding: 1.5rem;
                text-align: center;
                flex-direction: column;
                gap: 1rem;
            }
            
            .community-cta {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
                padding: 2rem;
            }
            
            .community-cta-features {
                flex-direction: column;
                gap: 1rem;
            }
            
            .community-cta-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .community-cta-btn {
                width: 100%;
                justify-content: center;
                padding: 1rem;
            }
            
            /* Blog CTA mobile */
            .blog-cta {
                padding: 2rem 1rem;
                margin-top: 2rem;
            }
            
            .blog-cta-title {
                font-size: 1.5rem;
            }
            
            .blog-cta-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .blog-cta-btn {
                width: 100%;
                justify-content: center;
                padding: 1rem;
            }
            
            /* Course mobile */
            .course-sidebar {
                order: 1;
                margin-bottom: 2rem;
            }
            
            .course-content {
                order: 2;
                padding: 1.5rem;
            }
            
            .titre {
                font-size: 1.5rem;
                text-align: center;
            }
            
            .generalite ol {
                padding-left: 1rem;
            }
            
            .generalite ol li {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }
            
            /* Footer mobile */
            .footer-container {
                padding: 0 1rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 3rem 0;
            }
            
            .footer-links {
                grid-template-columns: 1fr;
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
                text-align: center;
            }
            
            .footer-certifications {
                flex-direction: column;
                gap: 1rem;
            }
            
            .footer-cert-badges {
                justify-content: center;
                gap: 0.5rem;
            }
            
            .footer-back-to-top {
                bottom: 1rem;
                right: 1rem;
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            
            .footer-back-to-top span {
                display: none;
            }
            
            /* FAQ mobile */
            .faq-container {
                padding: 0 1rem;
            }
            
            .faq-title {
                font-size: 1.8rem;
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .faq-search-suggestions {
                gap: 0.5rem;
            }
            
            .faq-suggestion {
                padding: 0.5rem 0.75rem;
                font-size: 0.75rem;
            }
            
            /* Grids mobile */
            .grid-3-cols,
            .grid-responsive {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
             .lernica_style_nav_content-hero_contents {
                display: flex;
                flex-direction: column;
            }

            .video-box{
                margin-bottom: 4rem;
            }
        }

        /* Mobile phones */
        @media (max-width: 480px) {
            :root {
                --grid-gap: 1rem;
                --border-radius: 12px;
                --border-radius-lg: 16px;
            }
            
            .container {
                width: min(100% - 1rem, var(--container-max-width));
            }
            
            .section-header {
                margin-bottom: 2rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .blog-system-content {
                padding: 1rem;
            }
            
            .blog-system-title {
                font-size: 1.1rem;
            }
            
            .btn-primary,
            .btn-secondary {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            
            .mobile-menu-btn {
                width: 40px;
                height: 40px;
                top: 15px;
                left: 15px;
            }
            
            .sidebar {
                width: 100vw;
            }
            
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
            
            .community-stats {
                grid-template-columns: 1fr;
            }
            
            .social-proof-trust {
                gap: 1rem;
            }
            
            .social-proof-trust-item {
                padding: 1.5rem;
            }

            
            .lernica_style_nav_content-hero_contents {
                display: flex;
                flex-direction: column;
            }

            .video-box{
                margin-bottom: 4rem;
            }
        }

        /** A remmetre en haut plus tard */

            .plusdoc{
                position:relative;
            }
            .plusdoc a{
                text-decoration:none;
                color:#fff;
                padding:20px;
                margin:10px;
                background: var(--btn-voir-plus-gradient);
                border-radius:10px;
                transition: 0.5s ease;
            }
            .plusdoc a:hover{
                background-color: rgba(114, 5, 216, 0.13);
            }
            .title-home{
                position: absolute;
                top: 10%;
                left: 20%;
                z-index: 2;
                text-align: center;
                
            }
            .title-home h1{
                font-size: 2rem;
                font-weight: 800;
                background: var(--primary-gradient);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 8px;
            }
            .btn_open{
                display:flex;
                gap: 3rem;
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
                            <h4> <?= $_SESSION['user']['nom_complet']?></h4>
                            <span class="admin-role">Dévéloppeur <?= $_SESSION['user']['specialite']?></span>
                        </div>
                    </div>
                    <div class="admin-actions">
                        <a href="/monblug/mon_profil/content/page_view?utilisateur=<?= $_SESSION['user']['id_user']?>" class="admin-btn btn-primary">
                            <i class="fas fa-cog"></i>
                            <span>Profil</span>
                        </a>
                        <a href="/monblug/user/logout" class="admin-btn btn-secondary">
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
                    <!-- <div class="nav-item">
                        <a href="#dashboard" class="nav-link active" onclick="tableaubord()">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </div> -->
                    <div class="nav-item">
                        <a href="/monblug/home/cours/informatique" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <span class="nav-text">Cours</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="/monblug/exercices/content/page" class="nav-link">
                            📝
                            <span class="nav-text">Exercices</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="/monblug/home/algoritme/exercice" class="nav-link">
                            📝
                            <span class="nav-text">Challenges</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Contenu</div>
                    <!-- <div class="nav-item">
                        <a href="#articles" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <span class="nav-text">Articles</span>
                        </a>
                    </div> -->
                    <div class="nav-item">
                        <a href="/monblug/tutoriel/fprmation/php/videos" class="nav-link">
                            <span class="dp-icon">🎓</span> Tutoriels pratiques
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="/monblug/home/telechargers" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <span class="nav-text">Tous les documents</span>
                        </a>
                    </div>
                    <!-- <div class="nav-item">
                        <a href="#programming" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <span class="nav-text">Programmation</span>
                        </a>
                    </div> -->
                    <!-- <div class="nav-item">
                        <a href="#categories" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <span class="nav-text">Catégories</span>
                        </a>
                    </div> -->
                    <!-- <div class="nav-item">
                        <a href="#comments" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <span class="nav-text">Espace marché</span>
                        </a>
                    </div> -->
                </div>

                <!-- <div class="nav-section">
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
                </div> -->
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            
            <!-- Hero Section -->
            <section class="hero-section">

                <div class="hero-container">
                    <?php include(__DIR__.'/../navbar/NavBarAcceuil.php') ?>
                    <!-- <div class="title-home">
                        <h1>Bienvenue sur votre espace d’apprentissage 👋</h1>
                    </div> -->
                        <section class="lernica_style_nav_content-hero">
                            
                            <div class="lernica_style_nav_content-hero_contents">
                                <div class="video-box">
                                    <video autoplay loop muted playsinline>
                                        <source src="https://www.shutterstock.com/shutterstock/videos/1109434267/preview/stock-footage-green-scrolling-hacker-programming-code-loop-tech-background-wallpaper.webm" type="video/mp4">
                                    </video>
                                </div>
                                <div class="lernica_style_nav_content-hero-content">
                                    <h1>Bienvenue sur votre espace d’apprentissage 👋</h1>
                                    <!-- <h1></h1> -->
                                     <h2>Learnica c'est djidji 🔥</h2>
                                    <p>Meilleure plateforme pour s'auto-former avec plusieurs documents gratuits pour vous.</p>
                                    <!-- <div class="btn_open">
                                        <a href="/monblug/home/telechargers" class="lernica_style_nav_content-cta-button">
                                            <i class="fas fa-rocket"></i>
                                            Voir les documents
                                        </a>
                                        <a href="/monblug/tutoriel/fprmation/php/videos" class="blog-cta-btn secondary">
                                            <i class="fas fa-rss"></i>
                                            Voir les tutoriels
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    <div class="hero-badge">
                        🔥 Plus de 10,000 téléchargements ce mois
                    </div>
                    
                    <h1 class="hero-title">
                        Boostez Vos Compétences IT avec +500 Documents gratuits
                    </h1>
                    
                    <p class="hero-subtitle">
                    <p class="hero-subtitle">
                        Vous avez désormais accès à tout ce dont vous avez besoin pour progresser :  
                        📚 plus de 500 documents gratuits,  
                        🎓 des tutoriels pratiques,  
                        📝 un blog inspirant,  
                        💬 et un forum actif où échanger avec +5000 développeurs.  
                        Explorez, apprenez, partagez… et faites évoluer vos compétences jour après jour !
                    </p>

                    <div class="hero-cta-container">
                        <a href="/monblug/home/telechargers" class="hero-btn-primary">
                            <i class="fas fa-rocket"></i>
                            Accéder aux documents
                        </a>
                        <a href="/monblug/tutoriel/fprmation/php/videos" class="hero-btn-secondary">
                            <i class="fas fa-play"></i>
                            Lancer un tutoriel
                        </a>
                        <a href="/monblug/home/forum/read_forum" class="hero-btn-secondary">
                            <i class="fas fa-comments"></i>
                            Rejoindre le forum
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
                        <div class="document-back-to-bottom">
                            <i class="fas fa-chevron-down"></i>
                            <a href="#programming-section" class="secondary">Aller à la section des documents</a>
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
                                <span class="social-proof-logo">🏢 Documents pdf gratuits</span>
                                <span class="social-proof-logo">🏛️ Astuces informatique et digital</span>
                                <span class="social-proof-logo">💼 Formation payante en programmation</span>
                                <span class="social-proof-logo">🎓Packs de tutoriels payant et gratuit</span>
                                <span class="social-proof-logo">🏢 Packs de logiciel payant</span>
                                <!--<a href="#" class="social-proof-logo">🎯 StartupCI</a> -->
                            </div>
                        </div>
                    </div>
                </section>

            </div>
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
                            <!-- <div class="blog-categories">
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
                            </div> -->
                        </div>

                        <div class="blog-system-container">
                            <div class="blog-system-main">
                            <div class="blog-system-grid">
                                <!-- Deuxième article exemple -->
                                 <?php 
                                    $recup_articles = $pdo->prepare('SELECT id_article, titre_article, categorie, courte_description, contenue_doc, url_image, articule_likes, article_view, date_pub, Nom_complet FROM articles INNER JOIN users ON users.Id_User = articles.user_pub_id ORDER BY id_article DESC LIMIT 9');
                                    $recup_articles->execute();
                                    $articles = $recup_articles->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <?php foreach ($articles as $article): ?>
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
                                                <?= htmlspecialchars($article['date_pub']) ?>
                                            </span>
                                            <span class="blog-system-reading-time">
                                                <i class="fas fa-clock"></i>
                                                5 min de lecture
                                            </span>
                                            <span class="blog-system-views">
                                                <i class="fas fa-eye"></i>
                                                <?= htmlspecialchars($article['article_view']) ?>
                                            </span>
                                        </div>
                                        
                                        <h3 class="blog-system-title">
                                            <?= htmlspecialchars($article['titre_article']) ?>
                                        </h3>
                                        
                                        <p class="blog-system-excerpt">
                                            <?= htmlspecialchars($article['courte_description']) ?>
                                        </p>
                                        
                                        <div class="blog-system-footer">
                                            <div class="blog-system-author">
                                                <div class="blog-system-author-avatar">
                                                    <span>AC</span>
                                                </div>
                                                <div class="blog-system-author-info">
                                                    <span class="blog-system-author-name"><?= htmlspecialchars($article['Nom_complet']) ?></span>
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
                                        
                                        <a href="/monblug/home/blogs/blog_view_page?num=<?= htmlspecialchars($article['id_article']) ?>" class="blog-system-read-more">
                                            Lire l'article complet
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                                <?php endforeach ?>
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
                                    <a href="/monblug/home/blogs/blog_page" class="blog-cta-btn primary">
                                        <i class="fas fa-blog"></i>
                                        Voir Tous les Articles
                                    </a>
                                    <!-- <a href="#" class="blog-cta-btn secondary">
                                        <i class="fas fa-rss"></i>
                                        S'abonner au Blog
                                    </a> -->
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
                                    <!-- <button class="community-cta-btn primary">
                                        <i class="fas fa-user-plus"></i>
                                        Créer mon Compte
                                    </button> -->
                                    <a href="/monblug/home/forum/read_forum" class="community-cta-btn secondary">
                                        <i class="fas fa-eye"></i>
                                        Explorer des discussions
                                    </a>
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
                                Documents gratuits
                            </h2>
                            <p class="faq-subtitle">
                                Ici vous trouverrai +1500 document pdf gratuit pour une auto-formation. Ces documents vous seront util pour votre formation et augmentera votre
                                niveau d'expérience car ces document sont très riche. Alors n'attendez plus, servez-vous.
                            </p>
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
                            
                    </div>
                </section> 
                <section>
                            <div class="blog-system-container">
                                <div class="blog-system-main">
                                <div class="blog-system-grid">
                                    <?php foreach ($MesPdf as $data): ?>
                                        <article class="blog-system-card" data-category="tutoriels">
                                            <div class="blog-system-image">
                                                <img class="blog-system-img" src="<?= str_replace('../', '', $data['cheminimage']) ?>" alt="Image non disponible">
                                                <div class="blog-system-badges">
                                                    <span class="blog-system-badge blog-system-badge-featured">⭐ Featured</span>
                                                    <span class="blog-system-badge blog-system-badge-category">Tutoriel</span>
                                                </div>
                                            </div>
                                            <div class="blog-system-content">
                                                
                                                <h3 class="blog-system-title">
                                                <?= htmlspecialchars($data['NomPDF']) ?>
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
                                                    <a class="btn-primary" href="<?= 'files/' . rawurlencode(basename($data['Contenue'])) ?>">
                                                        <i class="fas fa-download"></i> Télécharger
                                                    </a>
                                                    <button class="btn-secondary" type="button" onclick="openfile(<?= $data['IdPDF'] ?>)">
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
                                                        <h2><?php
                                                        //  $messages
                                                        ?></h2>
                                                        <form onsubmit="ajouterCommentaire(event, <?= $data['IdPDF'] ?>)">
                                                            <input type="number" name="idDoc" value="<?= htmlspecialchars($data['IdPDF'])?>" hidden>
                                                            <div class="blog-system-comment-input-group">
                                                                <div class="blog-system-comment-avatar-input">
                                                                    <span id="blog-system-user-avatar">?</span>
                                                                </div>
                                                                <textarea class="blog-system-comment-input" id="commentText-<?= $data['IdPDF'] ?>" placeholder="Écrivez votre commentaire..."></textarea>
                                                            </div>
                                                            <div class="blog-system-comment-form-footer">
                                                                <button class="blog-system-comment-submit">
                                                                    <i class="fas fa-paper-plane"></i>
                                                                    Commenter
                                                                </button>
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                    
                                                    <!-- Liste des commentaires -->
                                                    <?php
                                                        $recupe_commentes = $pdo->prepare('SELECT id_commentaire, id_user_commente, id_document_commente, content_commente, date_commente, Nom_complet FROM commentaire INNER JOIN users ON users.Id_User = commentaire.id_user_commente WHERE id_document_commente = :id_doc_commente  ORDER BY id_commentaire DESC');
                                                        $recupe_commentes->bindValue(':id_doc_commente', $data['IdPDF']);
                                                        $recupe_commentes->execute();
                                                        $commentaires = $recupe_commentes->fetchAll();
                                                    ?>
                                                    <div class="blog-system-comments-list" id="blog-system-comments-list-<?= $data['IdPDF'] ?>">
                                                        <?php foreach($commentaires as $commente): ?>
                                                            <div class="blog-system-comment">
                                                                <div class="blog-system-comment-author-avatar">
                                                                    <span>JD</span>
                                                                </div>
                                                                <div class="blog-system-comment-content">
                                                                    <div class="blog-system-comment-header">
                                                                        <span class="blog-system-comment-author"><?= htmlspecialchars_decode($commente['Nom_complet']) ?></span>
                                                                        <span class="blog-system-comment-date"><?= htmlspecialchars_decode($commente['date_commente']) ?></span>
                                                                    </div>
                                                                    <div class="blog-system-comment-text">
                                                                        <?= htmlspecialchars_decode($commente['content_commente']) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>         
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <div class="ouverture_doc" id="docOpen<?= $data['IdPDF']?>" style="display:none;">
                                            <i class="fas fa-times" onclick="closePopup(<?= $data['IdPDF'] ?>)" 
                                                style="position:absolute; top:10px; right:10px; cursor:pointer; font-size:20px; color:#fff;">
                                            </i>
                                            <div class="document_content">
                                                <iframe src="<?= 'files/' . rawurlencode(basename($data['Contenue'])) ?>" width="100%" height="600px"></iframe>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="">
                                <a href="/monblug/home/telechargers" class="btn-primary">Voir plus de document <i class="fas fa-chevron-right"></i></a>
                            </div>
                </section>

                <!-- <section class="section-container" id="course-section">
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
                </section> -->
            <?php include(__DIR__.'/../navbar/footer.php') ?>            
        </main>
        
    </div> 
<!-- Footer Section -->
     <?php
        // include(__DIR__.'/../include_fichiers/progression.php');
    ?>
</body>
</html>