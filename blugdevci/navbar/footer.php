<!DOCTYPE html>
<html lang="en">
<head>
    <style>
                /* ==========================================================================
        CSS VARIABLES ET BASE
        ========================================================================== */

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        :root {
            /* Gradients */
            /* --primary-gradient: linear-gradient(135deg, #01041180 0%, #04c8e280 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
             */
            /* Colors */
            /* --dark-secondary: #1a1a35; */
             --dark-tertiary: #252547;
            /* --dark-card: #2a2a4a;
            
            --text-primary: #ffffff;
            --text-secondary: #e2e8f0;
            --text-muted: #94a3b8;
            --text-accent: #667eea;  */
            
            /* --border-primary: rgba(255, 255, 255, 0.1);
            --border-secondary: rgba(255, 255, 255, 0.05);
            --surface-primary: rgba(255, 255, 255, 0.05);
            --surface-secondary: rgba(255, 255, 255, 0.02);
             */
            /* Shadows */
            /* --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.2);
            --shadow-xl: 0 15px 35px rgba(0, 0, 0, 0.25);
             */
            /* Border Radius */
            /* --border-radius: 16px;
            --border-radius-sm: 8px;
            --border-radius-lg: 24px; */
            
            /* Transitions */
            /* --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.35s cubic-bezier(0.4, 0, 0.2, 1); */
            
            /* Layout */
            /* --sidebar-width: 320px;
            --sidebar-collapsed-width: 80px;
            --container-max-width: 1200px;
            --grid-gap: clamp(1rem, 3vw, 2rem); */
        }

      
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
                font-size: 2.2rem;
                margin-bottom: 1.5rem;
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
        }


    </style>
</head>
<body>
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
                                <li><a href="/monblug/home/forum/read_forum" class="footer-link">Forum Communauté</a></li>
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
            </footer>
    <script>
        function ajouterCommentaire(event, IdPDF){
            event.preventDefault(); // Empecher le chargement de la page

            let commentaire = document.getElementById('commentText-' + IdPDF).value;
            
            if(commentaire.trim() === "") {
                alert("Veuillez saisir un commentaire s'il vous plait.");
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/monblug/home/exo/add/commentaires", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){
                if(xhr.status === 200){
                    document.querySelector("#blog-system-comments-list-" + IdPDF).insertAdjacentHTML("afterbegin", xhr.responseText);
                    document.getElementById("commentText-" + IdPDF).value = "";
                }
            };
            xhr.send("commentaire=" + encodeURIComponent(commentaire) + "&idDoc=" + encodeURIComponent(IdPDF));

        }

        function tableaubord(){
            alert("Tableau de bord non disponible");
        }
  
        // (function(){
        //    function openfile(id) {
        //         const docOpen = document.getElementById('docOpen' + id);
        //         docOpen.style.display="none";
        //         if(docOpen) {
        //             docOpen.style.display = (docOpen.style.display === 'none') ? 'block' : 'none';
        //         }
        //     }

        function openfile(id) {
            // document.body.classList.add('body_scroll');
            const docOpen = document.getElementById('docOpen' + id);
            if (!docOpen) return; // si l'élément n'existe pas

            // toggle affichage
            if (docOpen.style.display === 'none' || docOpen.style.display === '') {
                docOpen.style.display = 'block';
                document.body.classList.add('body_scroll');
            } else {
                docOpen.style.display = 'none';
                document.body.classList.remove('body_scroll');
            }
        }

        function closePopup(id){
              // document.body.classList.add('body_scroll');
            const docOpen = document.getElementById('docOpen' + id);
            if (!docOpen) return; // si l'élément n'existe pas

            // toggle affichage
            if (docOpen.style.display === 'block') {
                docOpen.style.display = 'none';
                document.body.classList.remove('body_scroll');
            } 
        }

        // })();
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
            // event.preventDefault();
            
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
                        // e.preventDefault();
                        
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
                    
                    // if (!commentText.value.trim() || !userName.value.trim()) {
                    //     alert('Veuillez remplir votre nom et votre commentaire');
                    //     return;
                    // }

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