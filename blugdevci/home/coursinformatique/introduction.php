<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Généralité sur l'Informatique - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --info-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Empêcher le débordement horizontal */
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* S'assurer que tous les éléments restent dans leur conteneur */
        *, *::before, *::after {
            max-width: 100%;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
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

        /* CONTAINER PRINCIPAL */
        .course-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* HEADER */
        .course-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .course-header::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .course-title {
            font-size: clamp(2rem, 6vw, 4rem);
            font-weight: 900;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            line-height: 1.1;
            word-wrap: break-word;
            hyphens: auto;
        }

        .course-subtitle {
            font-size: 1.3rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        /* NAVIGATION DU COURS */
        .course-navigation {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-bottom: 60px;
            flex-wrap: wrap;
            width: 100%;
        }

        .nav-item {
            padding: 16px 24px;
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius);
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform var(--transition-normal);
            z-index: -1;
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-item:hover,
        .nav-item.active {
            color: var(--text-primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        /* SECTIONS DE CONTENU */
        .content-section {
            background: var(--dark-secondary);
            border-radius: var(--border-radius-lg);
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid var(--border-primary);
            position: relative;
            overflow: hidden;
        }

        .content-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
        }

        .section-number {
            width: 48px;
            height: 48px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            box-shadow: var(--shadow-md);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* DÉFINITION SECTION */
        .definition-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .definition-box {
            background: var(--surface-primary);
            border-left: 4px solid var(--accent-gradient);
            padding: 24px;
            border-radius: var(--border-radius);
            margin: 24px 0;
            position: relative;
        }

        .definition-box::before {
            content: '💡';
            position: absolute;
            top: -10px;
            left: 20px;
            background: var(--dark-secondary);
            padding: 8px;
            font-size: 1.5rem;
        }

        .definition-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            font-style: italic;
            margin-bottom: 16px;
        }

        .definition-explanation {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .key-points {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 32px;
        }

        .key-point {
            background: var(--surface-secondary);
            padding: 20px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
        }

        .key-point:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--text-accent);
        }

        .key-point-icon {
            font-size: 2rem;
            margin-bottom: 12px;
            color: var(--text-accent);
        }

        .key-point h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .key-point p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* TIMELINE HISTORIQUE */
        .timeline-container {
            position: relative;
            margin-top: 40px;
        }

        .timeline {
            position: relative;
            padding: 0 20px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-gradient);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 60px;
            position: relative;
            align-items: center;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            flex: 1;
            background: var(--dark-card);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            margin: 0 30px;
            position: relative;
            transition: all var(--transition-normal);
        }

        .timeline-content:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--text-accent);
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 0;
            height: 0;
            border: 12px solid transparent;
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -24px;
            border-left-color: var(--dark-card);
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            left: -24px;
            border-right-color: var(--dark-card);
        }

        .timeline-date {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: var(--secondary-gradient);
            color: var(--text-primary);
            padding: 12px 20px;
            border-radius: var(--border-radius);
            font-weight: 700;
            font-size: 1.1rem;
            z-index: 10;
            box-shadow: var(--shadow-md);
            white-space: nowrap;
        }

        .timeline-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .timeline-description {
            color: var(--text-secondary);
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .timeline-examples {
            background: var(--surface-primary);
            padding: 16px;
            border-radius: var(--border-radius-sm);
            border-left: 3px solid var(--accent-gradient);
        }

        .timeline-examples h5 {
            color: var(--text-accent);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .timeline-examples ul {
            list-style: none;
            padding: 0;
        }

        .timeline-examples li {
            color: var(--text-muted);
            margin-bottom: 4px;
            padding-left: 16px;
            position: relative;
        }

        .timeline-examples li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--text-accent);
            font-weight: bold;
        }

        /* IMPACT SECTION */
        .impact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }

        .impact-card {
            background: var(--surface-primary);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            text-align: center;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .impact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--success-gradient);
        }

        .impact-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .impact-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            background: var(--success-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .impact-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--text-primary);
        }

        .impact-description {
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transition: all 0.6s ease-out;
        }

        .animate-on-scroll.animate {
            opacity: 1;
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slide-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slide-right {
            animation: slideInRight 0.8s ease-out;
        }

        /* RESPONSIVE DESIGN OPTIMISÉ */
        
        /* Tablettes larges */
        @media (max-width: 1024px) {
            .course-container {
                padding: 32px 24px;
            }

            .course-title {
                font-size: 3rem;
            }

            .course-subtitle {
                font-size: 1.2rem;
            }

            .content-section {
                padding: 32px 24px;
            }

            .key-points {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 16px;
            }

            .impact-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
            }
        }

        /* Tablettes */
        @media (max-width: 768px) {
            .course-container {
                padding: 24px 20px;
            }

            .course-title {
                font-size: 2.5rem;
                margin-bottom: 16px;
            }

            .course-subtitle {
                font-size: 1.1rem;
                padding: 0 10px;
            }

            .course-navigation {
                gap: 12px;
                padding: 0 10px;
            }

            .nav-item {
                padding: 14px 18px;
                font-size: 0.9rem;
                flex: 1;
                text-align: center;
                min-width: 140px;
            }

            .content-section {
                padding: 28px 20px;
                margin-bottom: 32px;
            }

            .section-header {
                flex-direction: row;
                align-items: center;
                margin-bottom: 24px;
            }

            .section-number {
                width: 44px;
                height: 44px;
                font-size: 1.3rem;
                flex-shrink: 0;
            }

            .section-title {
                font-size: 1.6rem;
                line-height: 1.3;
            }

            .definition-box {
                padding: 20px;
                margin: 20px 0;
            }

            .definition-text {
                font-size: 1.1rem;
                margin-bottom: 12px;
            }

            .key-points {
                grid-template-columns: 1fr;
                gap: 16px;
                margin-top: 24px;
            }

            .key-point {
                padding: 18px;
            }

            .key-point-icon {
                font-size: 1.8rem;
                margin-bottom: 10px;
            }

            /* Timeline responsive */
            .timeline::before {
                left: 30px;
                width: 3px;
            }

            .timeline-item {
                flex-direction: column;
                align-items: flex-start;
                padding-left: 60px;
                margin-bottom: 50px;
            }

            .timeline-item:nth-child(even) {
                flex-direction: column;
                align-items: flex-start;
                padding-left: 60px;
            }

            .timeline-content {
                margin: 0;
                margin-top: 50px;
                padding: 20px;
                width: 100%;
            }

            .timeline-content::before {
                display: none;
            }

            .timeline-date {
                left: 30px;
                transform: translateX(-50%);
                top: 15px;
                font-size: 0.85rem;
                padding: 8px 12px;
                min-width: 100px;
                text-align: center;
            }

            .timeline-title {
                font-size: 1.3rem;
                margin-bottom: 12px;
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .timeline-title i {
                align-self: flex-start;
            }

            .timeline-description {
                font-size: 0.95rem;
                margin-bottom: 16px;
            }

            .timeline-examples {
                padding: 16px;
            }

            .timeline-examples h5 {
                font-size: 0.8rem;
                margin-bottom: 8px;
            }

            .timeline-examples li {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }

            .impact-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                margin-top: 32px;
            }

            .impact-card {
                padding: 20px;
                text-align: left;
            }

            .impact-icon {
                font-size: 2.5rem;
                margin-bottom: 14px;
                text-align: center;
            }

            .impact-title {
                font-size: 1.1rem;
                margin-bottom: 10px;
                text-align: center;
            }

            .impact-description {
                font-size: 0.95rem;
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                margin-top: 32px;
                padding: 0 20px;
            }

            .btn {
                padding: 16px 24px;
                font-size: 1rem;
                text-align: center;
                justify-content: center;
            }
        }

        /* Smartphones */
        @media (max-width: 480px) {
            .course-container {
                padding: 20px 16px;
            }

            .course-header {
                margin-bottom: 40px;
            }

            .course-title {
                font-size: 2rem;
                margin-bottom: 12px;
            }

            .course-subtitle {
                font-size: 1rem;
                padding: 0 5px;
            }

            .course-navigation {
                flex-direction: column;
                gap: 10px;
                padding: 0 5px;
            }

            .nav-item {
                padding: 12px 16px;
                font-size: 0.9rem;
                width: 100%;
                min-width: auto;
            }

            .content-section {
                padding: 20px 16px;
                margin-bottom: 24px;
            }

            .section-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 20px;
                gap: 12px;
            }

            .section-number {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 1.4rem;
                text-align: center;
            }

            .definition-content {
                font-size: 1rem;
            }

            .definition-box {
                padding: 16px;
                margin: 16px 0;
            }

            .definition-text {
                font-size: 1rem;
                margin-bottom: 10px;
            }

            .definition-explanation {
                font-size: 0.9rem;
            }

            .key-point {
                padding: 16px;
            }

            .key-point-icon {
                font-size: 1.6rem;
                margin-bottom: 8px;
            }

            .key-point h4 {
                font-size: 1rem;
                margin-bottom: 6px;
            }

            .key-point p {
                font-size: 0.9rem;
            }

            /* Timeline mobile optimisée */
            .timeline {
                padding: 0 10px;
            }

            .timeline::before {
                left: 25px;
                width: 2px;
            }

            .timeline-item {
                padding-left: 50px;
                margin-bottom: 40px;
            }

            .timeline-item:nth-child(even) {
                padding-left: 50px;
            }

            .timeline-content {
                margin-top: 40px;
                padding: 16px;
            }

            .timeline-date {
                left: 25px;
                font-size: 0.75rem;
                padding: 6px 10px;
                min-width: 80px;
                top: 10px;
            }

            .timeline-title {
                font-size: 1.1rem;
                margin-bottom: 10px;
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .timeline-title i {
                font-size: 1rem;
            }

            .timeline-description {
                font-size: 0.9rem;
                margin-bottom: 12px;
                line-height: 1.5;
            }

            .timeline-examples {
                padding: 12px;
            }

            .timeline-examples h5 {
                font-size: 0.75rem;
                margin-bottom: 6px;
            }

            .timeline-examples li {
                font-size: 0.85rem;
                margin-bottom: 4px;
                padding-left: 12px;
            }

            .impact-grid h3 {
                font-size: 1.4rem;
                margin: 40px 0 20px;
                padding: 0 10px;
            }

            .impact-card {
                padding: 16px;
            }

            .impact-icon {
                font-size: 2rem;
                margin-bottom: 12px;
            }

            .impact-title {
                font-size: 1rem;
                margin-bottom: 8px;
            }

            .impact-description {
                font-size: 0.9rem;
                line-height: 1.5;
            }

            .action-buttons {
                padding: 0 10px;
                margin-top: 24px;
            }

            .btn {
                padding: 14px 20px;
                font-size: 0.95rem;
            }

            .btn i {
                font-size: 0.9rem;
            }
        }

        /* Très petits écrans */
        @media (max-width: 360px) {
            .course-container {
                padding: 16px 12px;
            }

            .course-title {
                font-size: 1.8rem;
            }

            .course-subtitle {
                font-size: 0.95rem;
            }

            .content-section {
                padding: 16px 12px;
            }

            .section-title {
                font-size: 1.2rem;
            }

            .definition-box {
                padding: 12px;
            }

            .timeline-item {
                padding-left: 40px;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-date {
                left: 20px;
                font-size: 0.7rem;
                padding: 4px 8px;
                min-width: 70px;
            }

            .timeline-content {
                padding: 12px;
            }

            .timeline-title {
                font-size: 1rem;
            }

            .timeline-description {
                font-size: 0.85rem;
            }

            .btn {
                padding: 12px 16px;
                font-size: 0.9rem;
            }
        }

        /* Amélioration des interactions tactiles */
        @media (hover: none) and (pointer: coarse) {
            .nav-item,
            .key-point,
            .timeline-content,
            .impact-card,
            .btn {
                transform: none !important;
            }

            .nav-item:active,
            .btn:active {
                transform: scale(0.98) !important;
                transition: transform 0.1s ease !important;
            }

            .key-point:active,
            .timeline-content:active,
            .impact-card:active {
                transform: scale(1.02) !important;
                transition: transform 0.1s ease !important;
            }
        }

        /* Optimisation des polices pour mobile */
        @media (max-width: 768px) {
            body {
                font-size: 16px;
                line-height: 1.5;
            }

            h1, h2, h3, h4, h5, h6 {
                line-height: 1.2;
            }

            p, li, span {
                line-height: 1.6;
            }
        }

        /* BOUTONS D'ACTION */
        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-normal);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left var(--transition-slow);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: var(--text-primary);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: var(--surface-primary);
            color: var(--text-secondary);
            border: 1px solid var(--border-primary);
        }

        .btn-secondary:hover {
            background: var(--surface-secondary);
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        /* PROGRESS BAR */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--dark-secondary);
            z-index: 1000;
        }

        .progress-bar {
            height: 100%;
            background: var(--primary-gradient);
            width: 0%;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <div class="course-container">
        <!-- Header -->
        <header class="course-header animate-on-scroll">
            <h1 class="course-title">Généralité sur l'Informatique</h1>
            <p class="course-subtitle">Découvrez les fondements et l'évolution fascinante de l'informatique moderne</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#definition" class="nav-item active" data-section="definition">
                <i class="fas fa-lightbulb"></i>
                1. Définition
            </a>
            <a href="#historique" class="nav-item" data-section="historique">
                <i class="fas fa-history"></i>
                2. Historique & Évolution
            </a>
        </nav>

        <!-- Section 1: Définition -->
        <section id="definition" class="content-section animate-on-scroll">
            <div class="section-header">
                <div class="section-number">1</div>
                <h2 class="section-title">Définition de l'Informatique</h2>
            </div>

            <div class="definition-content">
                <p>L'informatique est une discipline qui a révolutionné notre monde moderne. Pour bien comprendre son impact, il est essentiel de définir précisément ce qu'elle représente.</p>

                <div class="definition-box">
                    <div class="definition-text">
                        L'informatique est la science du traitement automatique et rationnel de l'information, notamment par machines automatiques.
                    </div>
                    <div class="definition-explanation">
                        Ce terme, contraction d'« information » et « automatique », englobe l'étude des algorithmes, des structures de données, et la conception de systèmes informatiques.
                    </div>
                </div>

                <p>Cette définition moderne révèle trois aspects fondamentaux :</p>

                <div class="key-points">
                    <div class="key-point">
                        <div class="key-point-icon">🧮</div>
                        <h4>Traitement de l'Information</h4>
                        <p>L'informatique manipule, stocke, transforme et transmet des données sous forme numérique pour résoudre des problèmes complexes.</p>
                    </div>

                    <div class="key-point">
                        <div class="key-point-icon">⚡</div>
                        <h4>Automatisation</h4>
                        <p>Elle permet d'automatiser des tâches répétitives et de traiter de grandes quantités d'informations rapidement et précisément.</p>
                    </div>

                    <div class="key-point">
                        <div class="key-point-icon">🔬</div>
                        <h4>Science Multidisciplinaire</h4>
                        <p>Elle combine mathématiques, logique, électronique et même sciences humaines pour créer des solutions innovantes.</p>
                    </div>

                    <div class="key-point">
                        <div class="key-point-icon">🌐</div>
                        <h4>Impact Global</h4>
                        <p>L'informatique influence tous les secteurs : santé, éducation, commerce, communication, recherche scientifique.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Historique -->
        <section id="historique" class="content-section animate-on-scroll">
            <div class="section-header">
                <div class="section-number">2</div>
                <h2 class="section-title">Historique et Évolution</h2>
            </div>

            <div class="definition-content">
                <p>L'histoire de l'informatique est une épopée fascinante qui s'étend sur plusieurs siècles, marquée par des innovations révolutionnaires et des personnalités visionnaires. Découvrons ensemble cette évolution extraordinaire.</p>

                <div class="timeline-container">
                    <div class="timeline">
                        
                        <!-- Antiquité -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">Antiquité</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-scroll"></i>
                                    Les Premiers Outils de Calcul
                                </h3>
                                <p class="timeline-description">
                                    L'histoire de l'informatique commence avec les premiers outils d'aide au calcul. Le boulier, inventé vers 3000 av. J.-C., est considéré comme l'ancêtre de nos ordinateurs modernes.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Innovations clés :</h5>
                                    <ul>
                                        <li>Le boulier chinois (Suanpan) : première machine à calculer mécanique</li>
                                        <li>Les quipus incas : système de nœuds pour stocker l'information</li>
                                        <li>Les jetons de calcul romains : ancêtres des systèmes de comptage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- 17ème siècle -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">1640-1670</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-cogs"></i>
                                    L'Ère des Machines Mécaniques
                                </h3>
                                <p class="timeline-description">
                                    Le 17ème siècle marque l'avènement des premières machines à calculer mécaniques. Blaise Pascal et Gottfried Leibniz révolutionnent le calcul automatique.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Innovations révolutionnaires :</h5>
                                    <ul>
                                        <li>Pascaline (1642) : première calculatrice mécanique par Blaise Pascal</li>
                                        <li>Machine de Leibniz (1670) : capable de multiplier et diviser</li>
                                        <li>Introduction du système binaire par Leibniz (base de l'informatique moderne)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- 19ème siècle -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">1800-1890</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-industry"></i>
                                    La Révolution Industrielle et l'Automatisation
                                </h3>
                                <p class="timeline-description">
                                    Le 19ème siècle voit naître les concepts fondamentaux de la programmation et du traitement automatique de l'information avec les travaux visionnaires de Charles Babbage et Ada Lovelace.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Percées historiques :</h5>
                                    <ul>
                                        <li>Machine analytique de Babbage (1834) : premier concept d'ordinateur programmable</li>
                                        <li>Ada Lovelace : premier algorithme informatique de l'histoire (1843)</li>
                                        <li>Cartes perforées de Hollerith (1890) : mécanisation du recensement américain</li>
                                        <li>Machine de Jacquard (1801) : programmation par cartes perforées pour métiers à tisser</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Première moitié 20ème -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">1930-1950</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-bolt"></i>
                                    L'Émergence de l'Informatique Moderne
                                </h3>
                                <p class="timeline-description">
                                    Cette période marque la naissance véritable de l'informatique avec les premiers ordinateurs électroniques et les fondements théoriques posés par Alan Turing et John von Neumann.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Innovations fondamentales :</h5>
                                    <ul>
                                        <li>Machine de Turing (1936) : concept théorique de l'ordinateur universel</li>
                                        <li>ENIAC (1946) : premier ordinateur électronique général (30 tonnes, 18 000 tubes !)</li>
                                        <li>Architecture de von Neumann : base de tous les ordinateurs modernes</li>
                                        <li>Colossus (1943) : premier ordinateur programmable utilisé pour décrypter Enigma</li>
                                        <li>Transistor (1947) : révolution de la miniaturisation</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Années 60-70 -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">1960-1980</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-microchip"></i>
                                    L'Ère des Microprocesseurs et de la Démocratisation
                                </h3>
                                <p class="timeline-description">
                                    Les années 60-80 voient l'invention du microprocesseur et la naissance de l'informatique personnelle. C'est le début de la révolution numérique qui transformera la société.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Révolutions technologiques :</h5>
                                    <ul>
                                        <li>Intel 4004 (1971) : premier microprocesseur commercial</li>
                                        <li>Altair 8800 (1975) : premier ordinateur personnel en kit</li>
                                        <li>Apple II (1977) : démocratisation de l'informatique personnelle</li>
                                        <li>IBM PC (1981) : standardisation du marché PC</li>
                                        <li>Internet ARPANET (1969) : ancêtre d'Internet</li>
                                        <li>Premiers langages de programmation : FORTRAN, COBOL, C</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Années 90-2000 -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">1990-2010</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-globe"></i>
                                    L'Explosion d'Internet et du Multimédia
                                </h3>
                                <p class="timeline-description">
                                    Cette période marque l'avènement d'Internet grand public, la révolution du Web et l'émergence des premiers géants technologiques qui dominent encore aujourd'hui.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Transformations majeures :</h5>
                                    <ul>
                                        <li>World Wide Web (1991) : Tim Berners-Lee révolutionne l'accès à l'information</li>
                                        <li>Windows 95 : interface graphique grand public</li>
                                        <li>Google (1998) : révolution de la recherche en ligne</li>
                                        <li>Amazon (1994) et eBay (1995) : naissance du e-commerce</li>
                                        <li>Wi-Fi et internet mobile : connectivité sans fil</li>
                                        <li>Processeurs multi-cœurs : augmentation exponentielle de la puissance</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Ère moderne -->
                        <div class="timeline-item animate-on-scroll">
                            <div class="timeline-date">2010-Aujourd'hui</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">
                                    <i class="fas fa-robot"></i>
                                    L'Ère de l'Intelligence Artificielle et du Cloud
                                </h3>
                                <p class="timeline-description">
                                    Nous vivons actuellement une révolution technologique majeure avec l'IA, l'Internet des Objets, le Cloud Computing et les technologies émergentes qui redéfinissent notre rapport au numérique.
                                </p>
                                <div class="timeline-examples">
                                    <h5>Innovations contemporaines :</h5>
                                    <ul>
                                        <li>Smartphones et tablettes : informatique mobile ubiquitaire</li>
                                        <li>Cloud Computing : Amazon AWS, Google Cloud, Microsoft Azure</li>
                                        <li>Intelligence Artificielle : Machine Learning, Deep Learning, ChatGPT</li>
                                        <li>Internet des Objets (IoT) : objets connectés intelligents</li>
                                        <li>Blockchain et cryptomonnaies : décentralisation financière</li>
                                        <li>Réalité Virtuelle/Augmentée : nouveaux paradigmes d'interaction</li>
                                        <li>Informatique quantique : révolution computationnelle en cours</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Impact de l'évolution -->
                <h3 style="font-size: 1.8rem; margin: 60px 0 30px; text-align: center; background: var(--success-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Impact de cette Évolution sur notre Société
                </h3>

                <div class="impact-grid">
                    <div class="impact-card">
                        <div class="impact-icon">🌍</div>
                        <h4 class="impact-title">Transformation Globale</h4>
                        <p class="impact-description">
                            L'informatique a révolutionné tous les secteurs : santé (télémédecine), éducation (e-learning), transport (GPS, voitures autonomes), commerce (e-commerce), et communication (réseaux sociaux).
                        </p>
                    </div>

                    <div class="impact-card">
                        <div class="impact-icon">💼</div>
                        <h4 class="impact-title">Nouveaux Métiers</h4>
                        <p class="impact-description">
                            Création de millions d'emplois : développeurs, data scientists, cybersécurité, UX designers, architectes cloud. L'informatique est devenue le moteur économique du 21ème siècle.
                        </p>
                    </div>

                    <div class="impact-card">
                        <div class="impact-icon">🚀</div>
                        <h4 class="impact-title">Innovation Continue</h4>
                        <p class="impact-description">
                            Accélération technologique exponentielle : de 30 tonnes pour ENIAC à des processeurs nanométriques 1 milliard de fois plus puissants dans nos smartphones.
                        </p>
                    </div>

                    <div class="impact-card">
                        <div class="impact-icon">🔮</div>
                        <h4 class="impact-title">Perspectives Futures</h4>
                        <p class="impact-description">
                            IA générale, informatique quantique, biotechnologies computationnelles, métaverse : l'informatique continue de repousser les limites du possible.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showQuiz()">
                <i class="fas fa-brain"></i>
                Tester mes connaissances
            </button>
            <button class="btn btn-secondary" onclick="downloadSummary()">
                <i class="fas fa-download"></i>
                Télécharger le résumé
            </button>
            <button class="btn btn-secondary" onclick="nextLesson()">
                <i class="fas fa-arrow-right"></i>
                Leçon suivante
            </button>
        </div>
    </div>

    <script>
        // Animation au scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        
                        // Animation spéciale pour les éléments de timeline
                        if (entry.target.classList.contains('timeline-item')) {
                            const index = Array.from(document.querySelectorAll('.timeline-item')).indexOf(entry.target);
                            if (index % 2 === 0) {
                                entry.target.classList.add('animate-slide-left');
                            } else {
                                entry.target.classList.add('animate-slide-right');
                            }
                        }
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(element => {
                observer.observe(element);
            });
        }

        // Navigation entre sections
        function handleNavigation() {
            const navItems = document.querySelectorAll('.nav-item');
            const sections = document.querySelectorAll('.content-section');

            navItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    // Retirer la classe active de tous les items
                    navItems.forEach(nav => nav.classList.remove('active'));
                    item.classList.add('active');
                    
                    // Faire défiler vers la section
                    const targetSection = item.getAttribute('data-section');
                    const section = document.getElementById(targetSection);
                    
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
        }

        // Barre de progression
        function updateProgressBar() {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const maxHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = (scrolled / maxHeight) * 100;
                
                document.getElementById('progressBar').style.width = progress + '%';
            });
        }

        // Mise à jour de la navigation active selon le scroll
        function updateActiveNav() {
            window.addEventListener('scroll', () => {
                const sections = document.querySelectorAll('.content-section');
                const navItems = document.querySelectorAll('.nav-item');
                
                let currentSection = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 100;
                    const sectionHeight = section.clientHeight;
                    
                    if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                        currentSection = section.getAttribute('id');
                    }
                });
                
                navItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('data-section') === currentSection) {
                        item.classList.add('active');
                    }
                });
            });
        }

        // Fonctions des boutons d'action
        function showQuiz() {
            showNotification('Quiz interactif en cours de développement ! 🧠', 'info');
        }

        function downloadSummary() {
            showNotification('Téléchargement du résumé PDF... 📄', 'success');
        }

        function nextLesson() {
            showNotification('Redirection vers la prochaine leçon... 🚀', 'info');
        }

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
                error: 'var(--secondary-gradient)',
                warning: 'var(--warning-gradient)',
                info: 'var(--primary-gradient)'
            };
            
            notification.innerHTML = `
                <i class="${icons[type]}"></i>
                <span>${message}</span>
            `;
            
            notification.style.cssText = `
                position: fixed;
                top: 30px;
                right: 30px;
                padding: 16px 24px;
                border-radius: var(--border-radius);
                color: white;
                font-weight: 600;
                font-size: 0.95rem;
                z-index: 2000;
                display: flex;
                align-items: center;
                gap: 12px;
                background: ${colors[type]};
                box-shadow: var(--shadow-xl);
                transform: translateX(400px);
                transition: transform var(--transition-normal);
                max-width: 400px;
                backdrop-filter: blur(10px);
            `;

            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        // Raccourcis clavier
        function handleKeyboardShortcuts() {
            document.addEventListener('keydown', (e) => {
                // Flèches pour navigation
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    const currentActive = document.querySelector('.nav-item.active');
                    const nextItem = currentActive.nextElementSibling;
                    if (nextItem) {
                        nextItem.click();
                    }
                }
                
                if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    e.preventDefault();
                    const currentActive = document.querySelector('.nav-item.active');
                    const prevItem = currentActive.previousElementSibling;
                    if (prevItem) {
                        prevItem.click();
                    }
                }
                
                // Raccourcis
                if (e.ctrlKey && e.key === 'q') {
                    e.preventDefault();
                    showQuiz();
                }
                
                if (e.ctrlKey && e.key === 'd') {
                    e.preventDefault();
                    downloadSummary();
                }
            });
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            animateOnScroll();
            handleNavigation();
            updateProgressBar();
            updateActiveNav();
            handleKeyboardShortcuts();
            
            // Message de bienvenue
            setTimeout(() => {
                showNotification('Bienvenue dans le cours d\'informatique ! 🎓', 'success');
            }, 1500);
        });

        // Optimisation performance
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateProgressBar);
                ticking = true;
            }
        }

        // Smooth scroll pour les navigateurs non compatibles
        if (!('scrollBehavior' in document.documentElement.style)) {
            const smoothScrollPolyfill = document.createElement('script');
            smoothScrollPolyfill.src = 'https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js';
            document.head.appendChild(smoothScrollPolyfill);
        }
    </script>
</body>
</html>