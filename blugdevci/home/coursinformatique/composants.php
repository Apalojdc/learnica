<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Ordinateur et ses Composants - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --hardware-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            --software-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            
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
        }

        .content-section.types::before {
            background: var(--success-gradient);
        }

        .content-section.hardware::before {
            background: var(--hardware-gradient);
        }

        .content-section.software::before {
            background: var(--software-gradient);
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
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            box-shadow: var(--shadow-md);
        }

        .section-number.types {
            background: var(--success-gradient);
        }

        .section-number.hardware {
            background: var(--hardware-gradient);
        }

        .section-number.software {
            background: var(--software-gradient);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* GRID DE TYPES D'ORDINATEURS */
        .computer-types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 32px;
        }

        .computer-type-card {
            background: var(--dark-card);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .computer-type-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--success-gradient);
        }

        .computer-type-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(17, 153, 142, 0.3);
        }

        .type-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            background: var(--success-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .type-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-primary);
            text-align: center;
        }

        .type-description {
            color: var(--text-muted);
            margin-bottom: 16px;
            line-height: 1.6;
            text-align: center;
        }

        .type-specs {
            background: var(--surface-primary);
            padding: 12px;
            border-radius: var(--border-radius-sm);
            border-left: 3px solid var(--success-gradient);
        }

        .type-specs h5 {
            color: var(--text-accent);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .type-specs ul {
            list-style: none;
            padding: 0;
        }

        .type-specs li {
            color: var(--text-muted);
            margin-bottom: 4px;
            padding-left: 16px;
            position: relative;
            font-size: 0.9rem;
        }

        .type-specs li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--text-accent);
            font-weight: bold;
        }

        /* COMPOSANTS HARDWARE */
        .hardware-container {
            position: relative;
            margin-top: 40px;
        }

        .computer-diagram {
            background: var(--dark-card);
            border-radius: var(--border-radius-lg);
            padding: 40px;
            margin-bottom: 40px;
            position: relative;
            border: 1px solid var(--border-primary);
            text-align: center;
        }

        .diagram-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            background: var(--hardware-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .computer-visual {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .component-visual {
            background: var(--surface-primary);
            padding: 20px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            cursor: pointer;
            position: relative;
        }

        .component-visual:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-lg);
            border-color: rgba(255, 154, 158, 0.3);
        }

        .component-visual.active {
            border-color: rgba(255, 154, 158, 0.5);
            background: rgba(255, 154, 158, 0.1);
        }

        .component-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            background: var(--hardware-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .component-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .component-role {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* DÉTAILS DES COMPOSANTS */
        .component-details {
            background: var(--dark-card);
            padding: 32px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            margin-top: 24px;
            opacity: 0;
            transform: translateY(20px);
            transition: all var(--transition-normal);
        }

        .component-details.show {
            opacity: 1;
            transform: translateY(0);
        }

        .component-details h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            background: var(--hardware-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .component-details p {
            color: var(--text-secondary);
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .component-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .feature-item {
            background: var(--surface-primary);
            padding: 16px;
            border-radius: var(--border-radius-sm);
            border-left: 3px solid var(--hardware-gradient);
        }

        .feature-item h5 {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-item p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin: 0;
        }

        /* SOFTWARE SECTION */
        .software-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            margin-top: 32px;
        }

        .software-category {
            background: var(--dark-card);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .software-category::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--software-gradient);
        }

        .software-category:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(168, 237, 234, 0.3);
        }

        .software-icon {
            font-size: 2.5rem;
            margin-bottom: 16px;
            background: var(--software-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .software-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-primary);
            text-align: center;
        }

        .software-description {
            color: var(--text-secondary);
            margin-bottom: 16px;
            line-height: 1.6;
            text-align: center;
        }

        .software-examples {
            background: var(--surface-primary);
            padding: 16px;
            border-radius: var(--border-radius-sm);
            border-left: 3px solid var(--software-gradient);
        }

        .software-examples h5 {
            color: var(--text-accent);
            font-weight: 600;
            margin-bottom: 12px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .examples-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 8px;
        }

        .example-item {
            background: var(--surface-secondary);
            padding: 8px 12px;
            border-radius: var(--border-radius-sm);
            color: var(--text-muted);
            font-size: 0.85rem;
            text-align: center;
            transition: all var(--transition-fast);
        }

        .example-item:hover {
            background: var(--surface-primary);
            color: var(--text-secondary);
            transform: scale(1.05);
        }

        /* COMPARAISON HARDWARE/SOFTWARE */
        .comparison-section {
            background: var(--dark-card);
            padding: 32px;
            border-radius: var(--border-radius-lg);
            margin-top: 40px;
            border: 1px solid var(--border-primary);
        }

        .comparison-title {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 32px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .comparison-side {
            background: var(--surface-primary);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            position: relative;
        }

        .comparison-side.hardware {
            border-left: 4px solid var(--hardware-gradient);
        }

        .comparison-side.software {
            border-left: 4px solid var(--software-gradient);
        }

        .comparison-side h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 16px;
            text-align: center;
        }

        .comparison-side.hardware h3 {
            background: var(--hardware-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .comparison-side.software h3 {
            background: var(--software-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .comparison-points {
            list-style: none;
            padding: 0;
        }

        .comparison-points li {
            padding: 8px 0;
            padding-left: 24px;
            position: relative;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border-secondary);
        }

        .comparison-points li:last-child {
            border-bottom: none;
        }

        .comparison-points li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--text-accent);
            font-weight: bold;
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

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
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

        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
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

            .computer-types-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }

            .software-categories {
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

            .computer-types-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .computer-visual {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 16px;
            }

            .component-visual {
                padding: 16px;
            }

            .component-icon {
                font-size: 2rem;
                margin-bottom: 8px;
            }

            .component-name {
                font-size: 0.9rem;
            }

            .component-role {
                font-size: 0.75rem;
            }

            .software-categories {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .comparison-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .comparison-side {
                padding: 20px;
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

            .computer-type-card {
                padding: 20px 16px;
            }

            .type-icon {
                font-size: 2.5rem;
                margin-bottom: 12px;
            }

            .type-name {
                font-size: 1.1rem;
                margin-bottom: 8px;
            }

            .type-description {
                font-size: 0.9rem;
                margin-bottom: 12px;
            }

            .computer-visual {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .component-visual {
                padding: 12px;
            }

            .component-icon {
                font-size: 1.8rem;
                margin-bottom: 6px;
            }

            .component-name {
                font-size: 0.8rem;
                margin-bottom: 4px;
            }

            .component-role {
                font-size: 0.7rem;
            }

            .component-details {
                padding: 20px 16px;
            }

            .component-features {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .feature-item {
                padding: 12px;
            }

            .software-category {
                padding: 20px 16px;
            }

            .software-icon {
                font-size: 2rem;
                margin-bottom: 12px;
            }

            .software-title {
                font-size: 1.1rem;
                margin-bottom: 8px;
            }

            .software-description {
                font-size: 0.9rem;
                margin-bottom: 12px;
            }

            .examples-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 6px;
            }

            .example-item {
                padding: 6px 8px;
                font-size: 0.8rem;
            }

            .comparison-section {
                padding: 20px 16px;
            }

            .comparison-title {
                font-size: 1.4rem;
                margin-bottom: 24px;
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

            .computer-visual {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .component-visual {
                padding: 10px;
            }

            .btn {
                padding: 12px 16px;
                font-size: 0.9rem;
            }
        }

        /* Amélioration des interactions tactiles */
        @media (hover: none) and (pointer: coarse) {
            .nav-item,
            .computer-type-card,
            .component-visual,
            .software-category,
            .btn {
                transform: none !important;
            }

            .nav-item:active,
            .btn:active {
                transform: scale(0.98) !important;
                transition: transform 0.1s ease !important;
            }

            .computer-type-card:active,
            .component-visual:active,
            .software-category:active {
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
            <h1 class="course-title">L'Ordinateur et ses Composants</h1>
            <p class="course-subtitle">Découvrez l'anatomie complète d'un ordinateur moderne et comprenez le rôle de chaque élément</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#types" class="nav-item active" data-section="types">
                <i class="fas fa-desktop"></i>
                1. Types d'Ordinateurs
            </a>
            <a href="#hardware" class="nav-item" data-section="hardware">
                <i class="fas fa-microchip"></i>
                2. Matériel (Hardware)
            </a>
            <a href="#software" class="nav-item" data-section="software">
                <i class="fas fa-code"></i>
                3. Logiciel (Software)
            </a>
        </nav>

        <!-- Section 1: Types d'Ordinateurs -->
        <section id="types" class="content-section types animate-on-scroll">
            <div class="section-header">
                <div class="section-number types">1</div>
                <h2 class="section-title">Types d'Ordinateurs</h2>
            </div>

            <div class="definition-content">
                <p>Il existe une grande variété d'ordinateurs, chacun conçu pour des usages spécifiques. De votre smartphone aux supercalculateurs, découvrons les différents types qui nous entourent au quotidien.</p>

                <div class="computer-types-grid">
                    <div class="computer-type-card">
                        <div class="type-icon">🖥️</div>
                        <h3 class="type-name">Ordinateur de Bureau</h3>
                        <p class="type-description">Poste de travail fixe offrant puissance et extensibilité maximales pour un usage professionnel ou gaming intensif.</p>
                        <div class="type-specs">
                            <h5>Caractéristiques :</h5>
                            <ul>
                                <li>Puissance de calcul élevée</li>
                                <li>Facilement upgradable</li>
                                <li>Écran séparé (moniteur)</li>
                                <li>Refroidissement optimisé</li>
                                <li>Nombreux ports de connexion</li>
                            </ul>
                        </div>
                    </div>

                    <div class="computer-type-card">
                        <div class="type-icon">💻</div>
                        <h3 class="type-name">Ordinateur Portable</h3>
                        <p class="type-description">Solution mobile intégrant écran, clavier et batterie, parfaite pour le travail en déplacement et l'usage quotidien.</p>
                        <div class="type-specs">
                            <h5>Avantages :</h5>
                            <ul>
                                <li>Mobilité et compacité</li>
                                <li>Batterie intégrée</li>
                                <li>Écran et clavier intégrés</li>
                                <li>Wi-Fi et Bluetooth</li>
                                <li>Consommation optimisée</li>
                            </ul>
                        </div>
                    </div>

                    <div class="computer-type-card">
                        <div class="type-icon">📱</div>
                        <h3 class="type-name">Smartphone</h3>
                        <p class="type-description">Ordinateur de poche ultra-portable avec écran tactile, combinant téléphonie et informatique moderne.</p>
                        <div class="type-specs">
                            <h5>Fonctionnalités :</h5>
                            <ul>
                                <li>Écran tactile multipoint</li>
                                <li>Connectivité 4G/5G</li>
                                <li>Caméras haute résolution</li>
                                <li>GPS intégré</li>
                                <li>Capteurs multiples</li>
                            </ul>
                        </div>
                    </div>

                    <div class="computer-type-card">
                        <div class="type-icon">📊</div>
                        <h3 class="type-name">Serveur</h3>
                        <p class="type-description">Ordinateur haute performance conçu pour fournir des services et stocker des données pour de nombreux utilisateurs.</p>
                        <div class="type-specs">
                            <h5>Spécificités :</h5>
                            <ul>
                                <li>Fonctionnement 24h/24</li>
                                <li>Processeurs multiples</li>
                                <li>Mémoire vive importante</li>
                                <li>Stockage redondant</li>
                                <li>Connectivité réseau avancée</li>
                            </ul>
                        </div>
                    </div>

                    <div class="computer-type-card">
                        <div class="type-icon">💾</div>
                        <h3 class="type-name">Ordinateur Embarqué</h3>
                        <p class="type-description">Système informatique intégré dans des appareils spécialisés (voitures, électroménager, machines industrielles).</p>
                        <div class="type-specs">
                            <h5>Applications :</h5>
                            <ul>
                                <li>Électronique automobile</li>
                                <li>Électroménager intelligent</li>
                                <li>Systèmes industriels</li>
                                <li>Objets connectés (IoT)</li>
                                <li>Équipements médicaux</li>
                            </ul>
                        </div>
                    </div>

                    <div class="computer-type-card">
                        <div class="type-icon">🚀</div>
                        <h3 class="type-name">Supercalculateur</h3>
                        <p class="type-description">Machine ultra-puissante utilisée pour la recherche scientifique, la modélisation climatique et l'intelligence artificielle.</p>
                        <div class="type-specs">
                            <h5>Utilisations :</h5>
                            <ul>
                                <li>Recherche météorologique</li>
                                <li>Modélisation moléculaire</li>
                                <li>Intelligence artificielle</li>
                                <li>Cryptographie avancée</li>
                                <li>Simulations physiques</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Hardware -->
        <section id="hardware" class="content-section hardware animate-on-scroll">
            <div class="section-header">
                <div class="section-number hardware">2</div>
                <h2 class="section-title">Matériel (Hardware)</h2>
            </div>

            <div class="definition-content">
                <p>Le hardware représente tous les composants physiques de l'ordinateur. Chaque élément a un rôle précis dans le fonctionnement global de la machine. Explorons l'anatomie d'un ordinateur moderne.</p>

                <div class="computer-diagram">
                    <h3 class="diagram-title">Composants Principaux d'un Ordinateur</h3>
                    <p style="color: var(--text-muted); margin-bottom: 24px;">Cliquez sur un composant pour en savoir plus</p>
                    
                    <div class="computer-visual">
                        <div class="component-visual" data-component="cpu">
                            <div class="component-icon">🧠</div>
                            <div class="component-name">Processeur (CPU)</div>
                            <div class="component-role">Cerveau de l'ordinateur</div>
                        </div>

                        <div class="component-visual" data-component="ram">
                            <div class="component-icon">⚡</div>
                            <div class="component-name">Mémoire RAM</div>
                            <div class="component-role">Mémoire temporaire</div>
                        </div>

                        <div class="component-visual" data-component="storage">
                            <div class="component-icon">💾</div>
                            <div class="component-name">Stockage</div>
                            <div class="component-role">Mémoire permanente</div>
                        </div>

                        <div class="component-visual" data-component="gpu">
                            <div class="component-icon">🎮</div>
                            <div class="component-name">Carte Graphique</div>
                            <div class="component-role">Traitement visuel</div>
                        </div>

                        <div class="component-visual" data-component="motherboard">
                            <div class="component-icon">🔌</div>
                            <div class="component-name">Carte Mère</div>
                            <div class="component-role">Circuit principal</div>
                        </div>

                        <div class="component-visual" data-component="psu">
                            <div class="component-icon">🔋</div>
                            <div class="component-name">Alimentation</div>
                            <div class="component-role">Source d'énergie</div>
                        </div>
                    </div>

                    <div class="component-details" id="componentDetails">
                        <h3 id="componentTitle">Sélectionnez un composant</h3>
                        <p id="componentDescription">Cliquez sur l'un des composants ci-dessus pour découvrir son rôle et ses caractéristiques détaillées.</p>
                        <div class="component-features" id="componentFeatures"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Software -->
        <section id="software" class="content-section software animate-on-scroll">
            <div class="section-header">
                <div class="section-number software">3</div>
                <h2 class="section-title">Logiciel (Software)</h2>
            </div>

            <div class="definition-content">
                <p>Le software (logiciel) représente l'ensemble des programmes et instructions qui permettent à l'ordinateur de fonctionner. Sans logiciel, le hardware ne serait qu'un amas de composants inertes. Découvrons les différentes catégories de logiciels.</p>

                <div class="software-categories">
                    <div class="software-category">
                        <div class="software-icon">🖥️</div>
                        <h3 class="software-title">Système d'Exploitation</h3>
                        <p class="software-description">Interface fondamentale entre le hardware et les autres logiciels. Il gère les ressources et permet l'interaction avec l'utilisateur.</p>
                        <div class="software-examples">
                            <h5>Exemples populaires :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Windows 11</div>
                                <div class="example-item">macOS</div>
                                <div class="example-item">Linux Ubuntu</div>
                                <div class="example-item">Android</div>
                                <div class="example-item">iOS</div>
                                <div class="example-item">Chrome OS</div>
                            </div>
                        </div>
                    </div>

                    <div class="software-category">
                        <div class="software-icon">📝</div>
                        <h3 class="software-title">Logiciels d'Application</h3>
                        <p class="software-description">Programmes conçus pour accomplir des tâches spécifiques pour l'utilisateur final : bureautique, créativité, communication, etc.</p>
                        <div class="software-examples">
                            <h5>Catégories principales :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Microsoft Office</div>
                                <div class="example-item">Adobe Photoshop</div>
                                <div class="example-item">Google Chrome</div>
                                <div class="example-item">Spotify</div>
                                <div class="example-item">WhatsApp</div>
                                <div class="example-item">Netflix</div>
                            </div>
                        </div>
                    </div>

                    <div class="software-category">
                        <div class="software-icon">⚙️</div>
                        <h3 class="software-title">Logiciels Système</h3>
                        <p class="software-description">Programmes qui maintiennent et optimisent le fonctionnement de l'ordinateur : pilotes, utilitaires, outils de maintenance.</p>
                        <div class="software-examples">
                            <h5>Types d'outils :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Pilotes GPU</div>
                                <div class="example-item">Antivirus</div>
                                <div class="example-item">Défragmenteur</div>
                                <div class="example-item">Gestionnaire</div>
                                <div class="example-item">Compression</div>
                                <div class="example-item">Sauvegarde</div>
                            </div>
                        </div>
                    </div>

                    <div class="software-category">
                        <div class="software-icon">👨‍💻</div>
                        <h3 class="software-title">Logiciels de Développement</h3>
                        <p class="software-description">Outils utilisés par les programmeurs pour créer d'autres logiciels : éditeurs de code, compilateurs, environnements de développement.</p>
                        <div class="software-examples">
                            <h5>Outils populaires :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Visual Studio</div>
                                <div class="example-item">IntelliJ IDEA</div>
                                <div class="example-item">Git</div>
                                <div class="example-item">Docker</div>
                                <div class="example-item">Node.js</div>
                                <div class="example-item">Python</div>
                            </div>
                        </div>
                    </div>

                    <div class="software-category">
                        <div class="software-icon">🎮</div>
                        <h3 class="software-title">Logiciels de Divertissement</h3>
                        <p class="software-description">Applications conçues pour le loisir et l'entertainment : jeux vidéo, streaming, réseaux sociaux, création de contenu.</p>
                        <div class="software-examples">
                            <h5>Plateformes connues :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Steam</div>
                                <div class="example-item">YouTube</div>
                                <div class="example-item">TikTok</div>
                                <div class="example-item">Instagram</div>
                                <div class="example-item">Discord</div>
                                <div class="example-item">Twitch</div>
                            </div>
                        </div>
                    </div>

                    <div class="software-category">
                        <div class="software-icon">☁️</div>
                        <h3 class="software-title">Logiciels Cloud</h3>
                        <p class="software-description">Applications qui fonctionnent via Internet, stockant données et traitements sur des serveurs distants accessibles partout.</p>
                        <div class="software-examples">
                            <h5>Services cloud :</h5>
                            <div class="examples-grid">
                                <div class="example-item">Google Drive</div>
                                <div class="example-item">Dropbox</div>
                                <div class="example-item">Office 365</div>
                                <div class="example-item">iCloud</div>
                                <div class="example-item">AWS</div>
                                <div class="example-item">GitHub</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparaison Hardware vs Software -->
                <div class="comparison-section">
                    <h3 class="comparison-title">Hardware vs Software : Complémentarité Essentielle</h3>
                    
                    <div class="comparison-grid">
                        <div class="comparison-side hardware">
                            <h3>🔧 Hardware (Matériel)</h3>
                            <ul class="comparison-points">
                                <li>Composants physiques tangibles</li>
                                <li>Durée de vie : 5-10 ans en moyenne</li>
                                <li>Coût d'upgrade : remplacement physique</li>
                                <li>Performance fixe une fois fabriqué</li>
                                <li>Consomme de l'électricité</li>
                                <li>Peut tomber en panne physiquement</li>
                                <li>Détermine les limites maximales</li>
                                <li>Évolution lente (loi de Moore)</li>
                            </ul>
                        </div>

                        <div class="comparison-side software">
                            <h3>💻 Software (Logiciel)</h3>
                            <ul class="comparison-points">
                                <li>Instructions et données immatérielles</li>
                                <li>Mis à jour régulièrement (semaines/mois)</li>
                                <li>Coût d'upgrade : téléchargement/achat</li>
                                <li>Performance optimisable par mise à jour</li>
                                <li>Utilise les ressources hardware</li>
                                <li>Bugs corrigés par des patchs</li>
                                <li>Exploite les capacités hardware</li>
                                <li>Évolution rapide et continue</li>
                            </ul>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 24px; padding: 20px; background: var(--surface-primary); border-radius: var(--border-radius); border-left: 4px solid var(--primary-gradient);">
                        <p style="color: var(--text-secondary); font-size: 1.1rem; font-weight: 500;">
                            💡 <strong>Conclusion :</strong> Hardware et Software sont indissociables ! 
                            Le hardware fournit la puissance brute, le software l'intelligence pour l'utiliser. 
                            Ensemble, ils créent l'expérience informatique moderne.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showInteractiveQuiz()">
                <i class="fas fa-gamepad"></i>
                Quiz Interactif
            </button>
            <button class="btn btn-secondary" onclick="showComponentGuide()">
                <i class="fas fa-tools"></i>
                Guide de Montage PC
            </button>
            <button class="btn btn-secondary" onclick="downloadSummary()">
                <i class="fas fa-download"></i>
                Télécharger le Résumé
            </button>
            <button class="btn btn-secondary" onclick="nextLesson()">
                <i class="fas fa-arrow-right"></i>
                Leçon Suivante
            </button>
        </div>
    </div>

    <script>
        // Données des composants pour les détails
        const componentData = {
            cpu: {
                title: "🧠 Processeur (CPU - Central Processing Unit)",
                description: "Le processeur est le cerveau de l'ordinateur. Il exécute toutes les instructions des programmes, effectue les calculs et coordonne le fonctionnement des autres composants.",
                features: [
                    {
                        name: "Fréquence (GHz)",
                        description: "Vitesse à laquelle le processeur exécute les instructions. Plus elle est élevée, plus le processeur est rapide."
                    },
                    {
                        name: "Nombre de cœurs",
                        description: "Unités de traitement indépendantes permettant l'exécution simultanée de plusieurs tâches."
                    },
                    {
                        name: "Cache",
                        description: "Mémoire ultra-rapide intégrée au processeur pour stocker les données fréquemment utilisées."
                    },
                    {
                        name: "Architecture",
                        description: "Design du processeur (x86, ARM, etc.) qui détermine les instructions supportées."
                    }
                ]
            },
            ram: {
                title: "⚡ Mémoire RAM (Random Access Memory)",
                description: "La RAM est la mémoire de travail temporaire de l'ordinateur. Elle stocke les données et programmes actuellement utilisés pour un accès ultra-rapide par le processeur.",
                features: [
                    {
                        name: "Capacité (GB)",
                        description: "Quantité de données que la RAM peut stocker simultanément. Plus elle est importante, plus on peut faire de tâches en parallèle."
                    },
                    {
                        name: "Vitesse (MHz)",
                        description: "Fréquence de fonctionnement déterminant la rapidité des échanges de données."
                    },
                    {
                        name: "Type (DDR4/DDR5)",
                        description: "Standard technologique définissant les performances et la consommation."
                    },
                    {
                        name: "Volatilité",
                        description: "Contenu effacé à l'extinction. Nécessite une alimentation constante pour conserver les données."
                    }
                ]
            },
            storage: {
                title: "💾 Stockage (SSD/HDD)",
                description: "Le stockage permanent conserve vos données même hors tension : système d'exploitation, programmes, documents, photos, vidéos, etc.",
                features: [
                    {
                        name: "SSD (Solid State Drive)",
                        description: "Stockage ultra-rapide sans pièces mobiles. Plus cher mais beaucoup plus performant et silencieux."
                    },
                    {
                        name: "HDD (Hard Disk Drive)",
                        description: "Stockage traditionnel avec disques magnétiques. Moins cher pour de gros volumes mais plus lent."
                    },
                    {
                        name: "Capacité",
                        description: "Espace disponible pour stocker vos données. De 256 GB à plusieurs téraoctets (TB)."
                    },
                    {
                        name: "Interface",
                        description: "Type de connexion (SATA, NVMe) influençant la vitesse de transfert des données."
                    }
                ]
            },
            gpu: {
                title: "🎮 Carte Graphique (GPU - Graphics Processing Unit)",
                description: "La carte graphique traite l'affichage et les calculs visuels. Essentielle pour les jeux, la création de contenu et l'intelligence artificielle.",
                features: [
                    {
                        name: "VRAM",
                        description: "Mémoire dédiée aux données graphiques. Plus elle est importante, meilleures sont les performances en haute résolution."
                    },
                    {
                        name: "Cœurs de traitement",
                        description: "Processeurs spécialisés optimisés pour les calculs parallèles et le traitement d'images."
                    },
                    {
                        name: "Ray Tracing",
                        description: "Technologie de rendu avancée simulant le comportement réaliste de la lumière."
                    },
                    {
                        name: "DLSS/FSR",
                        description: "Technologies d'intelligence artificielle améliorant les performances gaming."
                    }
                ]
            },
            motherboard: {
                title: "🔌 Carte Mère (Motherboard)",
                description: "La carte mère est le circuit imprimé principal connectant tous les composants. Elle assure la communication entre CPU, RAM, stockage et périphériques.",
                features: [
                    {
                        name: "Socket CPU",
                        description: "Connecteur spécifique au type de processeur (Intel LGA, AMD AM4/AM5)."
                    },
                    {
                        name: "Slots RAM",
                        description: "Emplacements pour les barrettes mémoire. Généralement 2 ou 4 slots sur les cartes modernes."
                    },
                    {
                        name: "Ports d'extension",
                        description: "Slots PCIe pour carte graphique, carte Wi-Fi, carte son, etc."
                    },
                    {
                        name: "Connecteurs I/O",
                        description: "Ports USB, Ethernet, audio, vidéo pour connecter périphériques externes."
                    }
                ]
            },
            psu: {
                title: "🔋 Alimentation (PSU - Power Supply Unit)",
                description: "L'alimentation convertit le courant alternatif de la prise murale en courant continu stable requis par les composants informatiques.",
                features: [
                    {
                        name: "Puissance (Watts)",
                        description: "Capacité énergétique totale. Doit être adaptée aux besoins des composants installés."
                    },
                    {
                        name: "Certification 80+",
                        description: "Label d'efficacité énergétique. Plus le niveau est élevé, moins l'alimentation gaspille d'énergie."
                    },
                    {
                        name: "Modularité",
                        description: "Câbles détachables permettant un câblage plus propre et une meilleure ventilation."
                    },
                    {
                        name: "Protections",
                        description: "Circuits de sécurité contre les surtensions, sous-tensions et court-circuits."
                    }
                ]
            }
        };

        // Animation au scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
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

        // Gestion des composants hardware interactifs
        function handleComponentInteraction() {
            const componentVisuals = document.querySelectorAll('.component-visual');
            const componentDetails = document.getElementById('componentDetails');
            const componentTitle = document.getElementById('componentTitle');
            const componentDescription = document.getElementById('componentDescription');
            const componentFeatures = document.getElementById('componentFeatures');

            componentVisuals.forEach(visual => {
                visual.addEventListener('click', () => {
                    // Retirer l'état actif de tous les composants
                    componentVisuals.forEach(v => v.classList.remove('active'));
                    visual.classList.add('active');
                    visual.classList.add('pulse-animation');
                    
                    // Récupérer les données du composant
                    const componentKey = visual.getAttribute('data-component');
                    const data = componentData[componentKey];
                    
                    if (data) {
                        // Mettre à jour le contenu
                        componentTitle.textContent = data.title;
                        componentDescription.textContent = data.description;
                        
                        // Générer les fonctionnalités
                        componentFeatures.innerHTML = '';
                        data.features.forEach(feature => {
                            const featureDiv = document.createElement('div');
                            featureDiv.className = 'feature-item';
                            featureDiv.innerHTML = `
                                <h5>${feature.name}</h5>
                                <p>${feature.description}</p>
                            `;
                            componentFeatures.appendChild(featureDiv);
                        });
                        
                        // Afficher les détails
                        componentDetails.classList.add('show');
                        
                        // Retirer l'animation de pulse après un délai
                        setTimeout(() => {
                            visual.classList.remove('pulse-animation');
                        }, 1000);
                    }
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
        function showInteractiveQuiz() {
            showNotification('Quiz interactif sur les composants en cours de développement ! 🎮', 'info');
        }

        function showComponentGuide() {
            showNotification('Guide de montage PC détaillé disponible bientôt ! 🔧', 'info');
        }

        function downloadSummary() {
            showNotification('Téléchargement du résumé "Ordinateur et Composants" - PDF... 📄', 'success');
        }

        function nextLesson() {
            showNotification('Prochaine leçon : "Utilisation de base" - Redirection en cours... 🚀', 'info');
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
                    showInteractiveQuiz();
                }
                
                if (e.ctrlKey && e.key === 'g') {
                    e.preventDefault();
                    showComponentGuide();
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
            handleComponentInteraction();
            updateProgressBar();
            updateActiveNav();
            handleKeyboardShortcuts();
            
            // Message de bienvenue
            setTimeout(() => {
                showNotification('Découvrez l\'anatomie d\'un ordinateur ! 🖥️', 'success');
            }, 1500);

            // Auto-sélection du premier composant après un délai
            setTimeout(() => {
                const firstComponent = document.querySelector('.component-visual[data-component="cpu"]');
                if (firstComponent) {
                    firstComponent.click();
                }
            }, 3000);
        });

        // Performance: optimisation avec requestAnimationFrame
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(() => {
                    updateProgressBar();
                    ticking = false;
                });
                ticking = true;
            }
        }
    </script>
</body>
</html>