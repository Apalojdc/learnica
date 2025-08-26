<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Structures de Données - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --array-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --list-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --stack-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --queue-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --tree-gradient: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            --hash-gradient: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
            
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

        html, body {
            max-width: 100%;
            overflow-x: hidden;
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
            gap: 12px;
            margin-bottom: 60px;
            flex-wrap: wrap;
            width: 100%;
        }

        .nav-item {
            padding: 16px 18px;
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius);
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
            text-align: center;
            min-width: 120px;
            font-size: 0.9rem;
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

        .content-section.introduction::before {
            background: var(--primary-gradient);
        }

        .content-section.arrays::before {
            background: var(--array-gradient);
        }

        .content-section.lists::before {
            background: var(--list-gradient);
        }

        .content-section.stacks::before {
            background: var(--stack-gradient);
        }

        .content-section.queues::before {
            background: var(--queue-gradient);
        }

        .content-section.trees::before {
            background: var(--tree-gradient);
        }

        .content-section.hash::before {
            background: var(--hash-gradient);
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

        .section-number.introduction {
            background: var(--primary-gradient);
        }

        .section-number.arrays {
            background: var(--array-gradient);
        }

        .section-number.lists {
            background: var(--list-gradient);
        }

        .section-number.stacks {
            background: var(--stack-gradient);
        }

        .section-number.queues {
            background: var(--queue-gradient);
        }

        .section-number.trees {
            background: var(--tree-gradient);
        }

        .section-number.hash {
            background: var(--hash-gradient);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* SIMULATEUR DE STRUCTURES */
        .data-simulator {
            background: var(--dark-card);
            border-radius: var(--border-radius-lg);
            margin: 32px 0;
            border: 1px solid var(--border-primary);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .simulator-header {
            background: var(--dark-tertiary);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-primary);
        }

        .simulator-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .simulator-stats {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* VISUALISATION DE DONNÉES */
        .data-visualization {
            padding: 20px;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .structure-display {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 20px;
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            border: 2px dashed var(--border-primary);
            min-height: 200px;
        }

        .structure-display.empty {
            flex-direction: column;
            color: var(--text-muted);
            font-style: italic;
        }

        /* ÉLÉMENTS DE TABLEAU */
        .array-element {
            background: var(--array-gradient);
            color: white;
            padding: 16px 20px;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 1.1rem;
            position: relative;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            min-width: 60px;
            text-align: center;
        }

        .array-element:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .array-element.highlight {
            animation: pulse 0.8s ease-in-out;
            box-shadow: 0 0 20px rgba(103, 126, 234, 0.5);
        }

        .array-index {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--dark-card);
            color: var(--text-muted);
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.7rem;
            border: 1px solid var(--border-primary);
        }

        /* ÉLÉMENTS DE LISTE CHAÎNÉE */
        .list-node {
            background: var(--list-gradient);
            color: white;
            border-radius: var(--border-radius-sm);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .node-data {
            padding: 16px 20px;
            font-weight: 600;
            font-size: 1.1rem;
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .node-pointer {
            padding: 16px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .list-arrow {
            font-size: 1.5rem;
            color: var(--text-accent);
            margin: 0 8px;
        }

        /* ÉLÉMENTS DE PILE ET FILE */
        .stack-element, .queue-element {
            background: var(--stack-gradient);
            color: white;
            padding: 12px 20px;
            margin: 4px 0;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            position: relative;
        }

        .queue-element {
            background: var(--queue-gradient);
        }

        .stack-container {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
            gap: 4px;
            position: relative;
        }

        .queue-container {
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
        }

        .stack-label, .queue-label {
            position: absolute;
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .stack-label.top {
            top: -20px;
            right: 0;
        }

        .queue-label.front {
            left: -60px;
            top: 50%;
            transform: translateY(-50%);
        }

        .queue-label.rear {
            right: -60px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* ÉLÉMENTS D'ARBRE */
        .tree-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .tree-level {
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
        }

        .tree-node {
            background: var(--tree-gradient);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: var(--shadow-md);
            position: relative;
            transition: all var(--transition-normal);
        }

        .tree-node:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .tree-connection {
            position: absolute;
            width: 2px;
            background: var(--border-primary);
            z-index: -1;
        }

        /* TABLE DE HACHAGE */
        .hash-table {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 12px;
        }

        .hash-slot {
            background: var(--surface-primary);
            border: 2px solid var(--border-primary);
            border-radius: var(--border-radius-sm);
            padding: 12px;
            text-align: center;
            position: relative;
            min-height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hash-slot.filled {
            background: var(--hash-gradient);
            color: white;
            border-color: transparent;
        }

        .hash-index {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--dark-card);
            color: var(--text-muted);
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.7rem;
        }

        /* CONTRÔLES D'INTERACTION */
        .interaction-controls {
            background: var(--surface-primary);
            padding: 20px;
            border-top: 1px solid var(--border-primary);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .control-group {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .control-input {
            background: var(--dark-tertiary);
            border: 1px solid var(--border-primary);
            border-radius: 6px;
            padding: 8px 12px;
            color: var(--text-primary);
            font-size: 0.9rem;
            min-width: 100px;
        }

        .control-input:focus {
            outline: none;
            border-color: var(--text-accent);
            box-shadow: 0 0 0 2px rgba(103, 126, 234, 0.2);
        }

        .control-btn {
            padding: 8px 16px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all var(--transition-fast);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
        }

        .control-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .control-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .control-btn.danger {
            background: var(--secondary-gradient);
        }

        .control-btn.success {
            background: var(--success-gradient);
        }

        .control-btn.warning {
            background: var(--warning-gradient);
        }

        /* INFORMATIONS DE COMPLEXITÉ */
        .complexity-info {
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            padding: 16px;
            margin: 20px 0;
            border-left: 4px solid var(--accent-gradient);
        }

        .complexity-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .complexity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin-top: 12px;
        }

        .complexity-item {
            background: var(--dark-tertiary);
            padding: 8px 12px;
            border-radius: 6px;
            text-align: center;
        }

        .complexity-operation {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .complexity-value {
            font-weight: 600;
            color: var(--text-accent);
            font-family: 'Courier New', monospace;
        }

        /* COMPARAISON DES STRUCTURES */
        .comparison-table {
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            overflow: hidden;
            margin: 20px 0;
        }

        .comparison-header {
            background: var(--dark-tertiary);
            padding: 16px;
            font-weight: 600;
            color: var(--text-primary);
            text-align: center;
        }

        .comparison-row {
            display: grid;
            grid-template-columns: 2fr repeat(4, 1fr);
            gap: 1px;
            background: var(--border-primary);
        }

        .comparison-cell {
            background: var(--surface-primary);
            padding: 12px;
            text-align: center;
            font-size: 0.85rem;
        }

        .comparison-cell.structure {
            font-weight: 600;
            color: var(--text-primary);
            text-align: left;
        }

        .comparison-cell.good {
            background: var(--success-gradient);
            color: white;
        }

        .comparison-cell.average {
            background: var(--warning-gradient);
            color: white;
        }

        .comparison-cell.poor {
            background: var(--secondary-gradient);
            color: white;
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

        /* CONCEPTS CARDS */
        .concepts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 32px;
        }

        .concept-card {
            background: var(--surface-primary);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            text-align: center;
            cursor: pointer;
        }

        .concept-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .concept-icon {
            font-size: 2.5rem;
            margin-bottom: 16px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .concept-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-primary);
        }

        .concept-description {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.6;
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

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(100px);
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

        .slide-in-left {
            animation: slideInFromLeft 0.6s ease-out;
        }

        .slide-in-right {
            animation: slideInFromRight 0.6s ease-out;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            .course-container {
                padding: 24px 16px;
            }

            .course-title {
                font-size: 2.5rem;
            }

            .course-navigation {
                flex-direction: column;
                gap: 8px;
            }

            .nav-item {
                width: 100%;
                text-align: center;
                min-width: auto;
            }

            .content-section {
                padding: 24px 20px;
            }

            .section-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 12px;
            }

            .data-visualization {
                padding: 16px;
            }

            .structure-display {
                padding: 16px;
                min-height: 150px;
            }

            .array-element {
                padding: 12px 16px;
                font-size: 0.95rem;
                min-width: 50px;
            }

            .control-group {
                flex-direction: column;
                align-items: stretch;
            }

            .control-input {
                width: 100%;
            }

            .comparison-row {
                grid-template-columns: 1fr;
                gap: 1px;
            }

            .comparison-cell {
                text-align: left;
            }

            .concepts-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .hash-table {
                grid-template-columns: repeat(2, 1fr);
            }

            .tree-level {
                gap: 10px;
            }

            .tree-node {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .course-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .content-section {
                padding: 20px 16px;
            }

            .data-visualization {
                padding: 12px;
            }

            .array-element {
                padding: 10px 12px;
                font-size: 0.85rem;
                min-width: 40px;
            }

            .list-node {
                flex-direction: column;
                text-align: center;
            }

            .node-data, .node-pointer {
                padding: 8px 12px;
            }

            .stack-element, .queue-element {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .tree-node {
                width: 35px;
                height: 35px;
                font-size: 0.8rem;
            }

            .hash-table {
                grid-template-columns: 1fr;
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
            <h1 class="course-title">Structures de Données</h1>
            <p class="course-subtitle">Maîtrisez l'art d'organiser et manipuler les données : tableaux, listes, piles, files, arbres et plus encore !</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#introduction" class="nav-item active" data-section="introduction">
                <i class="fas fa-lightbulb"></i>
                Introduction
            </a>
            <a href="#arrays" class="nav-item" data-section="arrays">
                <i class="fas fa-th"></i>
                Tableaux
            </a>
            <a href="#lists" class="nav-item" data-section="lists">
                <i class="fas fa-link"></i>
                Listes
            </a>
            <a href="#stacks" class="nav-item" data-section="stacks">
                <i class="fas fa-layer-group"></i>
                Piles
            </a>
            <a href="#queues" class="nav-item" data-section="queues">
                <i class="fas fa-arrow-right"></i>
                Files
            </a>
            <a href="#trees" class="nav-item" data-section="trees">
                <i class="fas fa-sitemap"></i>
                Arbres
            </a>
            <a href="#hash" class="nav-item" data-section="hash">
                <i class="fas fa-hashtag"></i>
                Tables Hash
            </a>
        </nav>

        <!-- Section 1: Introduction -->
        <section id="introduction" class="content-section introduction animate-on-scroll">
            <div class="section-header">
                <div class="section-number introduction">1</div>
                <h2 class="section-title">Introduction aux Structures de Données</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Les <strong>structures de données</strong> sont des façons d'organiser et de stocker les informations dans la mémoire de l'ordinateur. 
                    Choisir la bonne structure, c'est comme choisir le bon outil pour une tâche ! 🛠️
                </p>

                <!-- Analogie de la bibliothèque -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-book"></i>
                            Analogie : Une Bibliothèque Organisée
                        </h3>
                    </div>

                    <div class="data-visualization">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                            <div class="concept-card" onclick="showLibraryExample('shelf')">
                                <div class="concept-icon">📚</div>
                                <h4 class="concept-title">Étagère (Tableau)</h4>
                                <p class="concept-description">
                                    Livres rangés dans l'ordre sur une étagère. 
                                    Position fixe, accès direct par numéro !
                                </p>
                            </div>

                            <div class="concept-card" onclick="showLibraryExample('chain')">
                                <div class="concept-icon">🔗</div>
                                <h4 class="concept-title">Chaîne (Liste)</h4>
                                <p class="concept-description">
                                    Livres reliés par des références. 
                                    Pour trouver le 5ème, il faut passer par les 4 premiers !
                                </p>
                            </div>

                            <div class="concept-card" onclick="showLibraryExample('pile')">
                                <div class="concept-icon">📋</div>
                                <h4 class="concept-title">Pile (Stack)</h4>
                                <p class="concept-description">
                                    Pile de livres : on ne peut prendre que celui du dessus. 
                                    Dernier arrivé, premier sorti !
                                </p>
                            </div>

                            <div class="concept-card" onclick="showLibraryExample('queue')">
                                <div class="concept-icon">👥</div>
                                <h4 class="concept-title">File d'attente</h4>
                                <p class="concept-description">
                                    File de personnes : premier arrivé, premier servi. 
                                    Comme à la caisse du supermarché !
                                </p>
                            </div>
                        </div>

                        <div id="library-example" style="display: none; margin-top: 20px; padding: 20px; background: var(--surface-primary); border-radius: 8px;">
                            <h4 id="example-title" style="color: var(--text-primary); margin-bottom: 12px;"></h4>
                            <p id="example-description" style="color: var(--text-muted);"></p>
                        </div>
                    </div>
                </div>

                <!-- Pourquoi c'est important -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🎯 Pourquoi étudier les Structures de Données ?</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">⚡</div>
                            <h4 class="concept-title">Performance</h4>
                            <p class="concept-description">
                                Une bonne structure peut rendre votre programme 1000x plus rapide ! 
                                Chercher dans 1 million d'éléments en 20 étapes au lieu de 1 million.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">💾</div>
                            <h4 class="concept-title">Mémoire Optimisée</h4>
                            <p class="concept-description">
                                Utiliser juste la mémoire nécessaire. Pas de gaspillage ! 
                                Important sur mobile et pour les gros systèmes.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🧩</div>
                            <h4 class="concept-title">Résolution de Problèmes</h4>
                            <p class="concept-description">
                                Certains problèmes deviennent triviaux avec la bonne structure. 
                                GPS, moteurs de recherche, réseaux sociaux...
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🏗️</div>
                            <h4 class="concept-title">Architecture Logicielle</h4>
                            <p class="concept-description">
                                Base de tout développement sérieux. 
                                Comprendre pour concevoir des systèmes robustes et évolutifs.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Complexité Big O -->
                <div class="complexity-info">
                    <div class="complexity-title">
                        <i class="fas fa-clock"></i>
                        Notation Big O - Mesurer l'Efficacité
                    </div>
                    <p style="margin-bottom: 12px; color: var(--text-muted);">
                        La notation Big O décrit comment le temps d'exécution évolue avec la taille des données :
                    </p>
                    <div class="complexity-grid">
                        <div class="complexity-item">
                            <div class="complexity-operation">Excellent</div>
                            <div class="complexity-value" style="color: #38ef7d;">O(1)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Très Bon</div>
                            <div class="complexity-value" style="color: #4facfe;">O(log n)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Acceptable</div>
                            <div class="complexity-value" style="color: #fdcb6e;">O(n)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Lent</div>
                            <div class="complexity-value" style="color: #fd79a8;">O(n²)</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Tableaux -->
        <section id="arrays" class="content-section arrays animate-on-scroll">
            <div class="section-header">
                <div class="section-number arrays">2</div>
                <h2 class="section-title">Tableaux (Arrays) - La Base de Tout</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Un <strong>tableau</strong> est comme une rangée de casiers numérotés. Chaque casier peut contenir une valeur, 
                    et on peut accéder instantanément à n'importe lequel en connaissant son numéro (index) ! 📦
                </p>

                <!-- Simulateur de tableau -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-th"></i>
                            Simulateur de Tableau Interactif
                        </h3>
                        <div class="simulator-stats">
                            <span>Taille : <span id="array-size">0</span></span> | 
                            <span>Éléments : <span id="array-count">0</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="array-display">
                            <div class="empty">
                                <i class="fas fa-plus-circle" style="font-size: 2rem; margin-bottom: 8px;"></i>
                                <div>Tableau vide - Ajoutez des éléments !</div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="text" class="control-input" id="array-value" placeholder="Valeur à ajouter" maxlength="10">
                            <button class="control-btn success" onclick="addToArray()">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                            <button class="control-btn warning" onclick="insertInArray()">
                                <i class="fas fa-arrow-down"></i> Insérer à l'index
                            </button>
                            <input type="number" class="control-input" id="array-index" placeholder="Index" min="0" style="width: 80px;">
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="searchInArray()">
                                <i class="fas fa-search"></i> Rechercher
                            </button>
                            <button class="control-btn danger" onclick="removeFromArray()">
                                <i class="fas fa-minus"></i> Supprimer index
                            </button>
                            <button class="control-btn danger" onclick="clearArray()">
                                <i class="fas fa-trash"></i> Vider
                            </button>
                            <button class="control-btn" onclick="sortArray()">
                                <i class="fas fa-sort"></i> Trier
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillArrayExample('numbers')">📊 Exemple Nombres</button>
                            <button class="control-btn" onclick="fillArrayExample('fruits')">🍎 Exemple Fruits</button>
                            <button class="control-btn" onclick="fillArrayExample('colors')">🎨 Exemple Couleurs</button>
                        </div>
                    </div>
                </div>

                <!-- Complexité des opérations -->
                <div class="complexity-info">
                    <div class="complexity-title">
                        <i class="fas fa-tachometer-alt"></i>
                        Complexité des Opérations sur Tableaux
                    </div>
                    <div class="complexity-grid">
                        <div class="complexity-item">
                            <div class="complexity-operation">Accès par index</div>
                            <div class="complexity-value" style="color: #38ef7d;">O(1)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Recherche</div>
                            <div class="complexity-value" style="color: #fdcb6e;">O(n)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Insertion fin</div>
                            <div class="complexity-value" style="color: #38ef7d;">O(1)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Insertion milieu</div>
                            <div class="complexity-value" style="color: #fdcb6e;">O(n)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Suppression fin</div>
                            <div class="complexity-value" style="color: #38ef7d;">O(1)</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Suppression milieu</div>
                            <div class="complexity-value" style="color: #fdcb6e;">O(n)</div>
                        </div>
                    </div>
                </div>

                <!-- Applications des tableaux -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🚀 Applications Concrètes</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">🖼️</div>
                            <h4 class="concept-title">Images & Pixels</h4>
                            <p class="concept-description">
                                Chaque pixel d'une image est stocké dans un tableau 2D. 
                                Photo 1920x1080 = tableau de 2 millions d'éléments !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🎵</div>
                            <h4 class="concept-title">Audio & Musique</h4>
                            <p class="concept-description">
                                Sons stockés comme tableaux d'amplitudes. 
                                1 seconde d'audio = 44 100 échantillons !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">📊</div>
                            <h4 class="concept-title">Statistiques</h4>
                            <p class="concept-description">
                                Stocker et traiter des séries de données. 
                                Moyennes, médianes, graphiques...
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🎮</div>
                            <h4 class="concept-title">Jeux Vidéo</h4>
                            <p class="concept-description">
                                Cartes de jeu, inventaires, scores. 
                                Grille de Tetris, plateau d'échecs...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Listes Chaînées -->
        <section id="lists" class="content-section lists animate-on-scroll">
            <div class="section-header">
                <div class="section-number lists">3</div>
                <h2 class="section-title">Listes Chaînées - Flexibilité Maximale</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Une <strong>liste chaînée</strong> est comme un train : chaque wagon (nœud) contient des données 
                    et un lien vers le wagon suivant. Plus flexible qu'un tableau, mais pas d'accès direct ! 🚂
                </p>

                <!-- Simulateur de liste chaînée -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-link"></i>
                            Simulateur de Liste Chaînée
                        </h3>
                        <div class="simulator-stats">
                            <span>Nœuds : <span id="list-count">0</span></span> | 
                            <span>Tête : <span id="list-head">NULL</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="list-display">
                            <div class="empty">
                                <i class="fas fa-link" style="font-size: 2rem; margin-bottom: 8px;"></i>
                                <div>Liste vide - Ajoutez des nœuds !</div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="text" class="control-input" id="list-value" placeholder="Valeur du nœud" maxlength="10">
                            <button class="control-btn success" onclick="addToListFront()">
                                <i class="fas fa-arrow-left"></i> Ajouter au début
                            </button>
                            <button class="control-btn success" onclick="addToListEnd()">
                                <i class="fas fa-arrow-right"></i> Ajouter à la fin
                            </button>
                        </div>
                        <div class="control-group">
                            <input type="number" class="control-input" id="list-position" placeholder="Position" min="0" style="width: 100px;">
                            <button class="control-btn warning" onclick="insertInList()">
                                <i class="fas fa-plus-square"></i> Insérer à la position
                            </button>
                            <button class="control-btn danger" onclick="removeFromList()">
                                <i class="fas fa-minus-square"></i> Supprimer position
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="searchInList()">
                                <i class="fas fa-search"></i> Rechercher
                            </button>
                            <button class="control-btn danger" onclick="clearList()">
                                <i class="fas fa-trash"></i> Vider liste
                            </button>
                            <button class="control-btn" onclick="reverseList()">
                                <i class="fas fa-exchange-alt"></i> Inverser
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillListExample('tasks')">📝 Exemple Tâches</button>
                            <button class="control-btn" onclick="fillListExample('playlist')">🎵 Playlist</button>
                            <button class="control-btn" onclick="fillListExample('shopping')">🛒 Shopping</button>
                        </div>
                    </div>
                </div>

                <!-- Comparaison Tableau vs Liste -->
                <div class="comparison-table" style="margin: 32px 0;">
                    <div class="comparison-header">
                        🥊 Tableau vs Liste Chaînée - Le Match !
                    </div>
                    <div class="comparison-row">
                        <div class="comparison-cell structure">Opération</div>
                        <div class="comparison-cell">Accès par index</div>
                        <div class="comparison-cell">Insertion début</div>
                        <div class="comparison-cell">Mémoire</div>
                        <div class="comparison-cell">Cache CPU</div>
                    </div>
                    <div class="comparison-row">
                        <div class="comparison-cell structure">📋 Tableau</div>
                        <div class="comparison-cell good">O(1) Excellent</div>
                        <div class="comparison-cell poor">O(n) Lent</div>
                        <div class="comparison-cell good">Compacte</div>
                        <div class="comparison-cell good">Optimisé</div>
                    </div>
                    <div class="comparison-row">
                        <div class="comparison-cell structure">🔗 Liste Chaînée</div>
                        <div class="comparison-cell poor">O(n) Lent</div>
                        <div class="comparison-cell good">O(1) Excellent</div>
                        <div class="comparison-cell average">+ Pointeurs</div>
                        <div class="comparison-cell poor">Fragmentée</div>
                    </div>
                </div>

                <!-- Types de listes -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🔗 Variantes de Listes Chaînées</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">➡️</div>
                            <h4 class="concept-title">Liste Simple</h4>
                            <p class="concept-description">
                                Chaque nœud pointe vers le suivant. 
                                Navigation dans un seul sens, comme les pages web !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">↔️</div>
                            <h4 class="concept-title">Liste Doublement Chaînée</h4>
                            <p class="concept-description">
                                Liens dans les deux sens. Navigation avant/arrière, 
                                comme l'historique du navigateur !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔄</div>
                            <h4 class="concept-title">Liste Circulaire</h4>
                            <p class="concept-description">
                                Le dernier nœud pointe vers le premier. 
                                Parfait pour les playlists en boucle !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🏃</div>
                            <h4 class="concept-title">Skip List</h4>
                            <p class="concept-description">
                                Raccourcis entre nœuds pour aller plus vite. 
                                Comme les voies express sur l'autoroute !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Piles (Stacks) -->
        <section id="stacks" class="content-section stacks animate-on-scroll">
            <div class="section-header">
                <div class="section-number stacks">4</div>
                <h2 class="section-title">Piles (Stacks) - Dernier Entré, Premier Sorti</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Une <strong>pile</strong> fonctionne comme une pile d'assiettes : on ne peut ajouter ou retirer que l'élément du dessus ! 
                    Principe LIFO (Last In, First Out) - très utile en programmation ! 🥞
                </p>

                <!-- Simulateur de pile -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-layer-group"></i>
                            Simulateur de Pile Interactive
                        </h3>
                        <div class="simulator-stats">
                            <span>Éléments : <span id="stack-count">0</span></span> | 
                            <span>Sommet : <span id="stack-top">Vide</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="stack-display">
                            <div class="empty">
                                <i class="fas fa-layer-group" style="font-size: 2rem; margin-bottom: 8px;"></i>
                                <div>Pile vide - Poussez des éléments !</div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="text" class="control-input" id="stack-value" placeholder="Valeur à empiler" maxlength="15">
                            <button class="control-btn success" onclick="pushToStack()">
                                <i class="fas fa-arrow-up"></i> PUSH (Empiler)
                            </button>
                            <button class="control-btn danger" onclick="popFromStack()">
                                <i class="fas fa-arrow-down"></i> POP (Dépiler)
                            </button>
                            <button class="control-btn" onclick="peekStack()">
                                <i class="fas fa-eye"></i> PEEK (Voir sommet)
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn danger" onclick="clearStack()">
                                <i class="fas fa-trash"></i> Vider pile
                            </button>
                            <button class="control-btn warning" onclick="checkStackEmpty()">
                                <i class="fas fa-question"></i> Est vide ?
                            </button>
                            <button class="control-btn" onclick="getStackSize()">
                                <i class="fas fa-ruler"></i> Taille
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillStackExample('undo')">↶ Historique Annuler</button>
                            <button class="control-btn" onclick="fillStackExample('parentheses')">() Vérif. Parenthèses</button>
                            <button class="control-btn" onclick="fillStackExample('function')">📞 Appels Fonctions</button>
                        </div>
                    </div>
                </div>

                <!-- Applications des piles -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🎯 Applications Magiques des Piles</h3>
                    <div class="concepts-grid">
                        <div class="concept-card" onclick="demonstrateStackApp('undo')">
                            <div class="concept-icon">↶</div>
                            <h4 class="concept-title">Fonction Annuler</h4>
                            <p class="concept-description">
                                Ctrl+Z dans Word, Photoshop... Chaque action est empilée. 
                                Annuler = dépiler la dernière action !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateStackApp('browser')">
                            <div class="concept-icon">🌐</div>
                            <h4 class="concept-title">Historique Navigateur</h4>
                            <p class="concept-description">
                                Bouton "Retour" du navigateur. Chaque page visitée 
                                est empilée pour pouvoir revenir en arrière !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateStackApp('recursion')">
                            <div class="concept-icon">🔄</div>
                            <h4 class="concept-title">Récursion</h4>
                            <p class="concept-description">
                                Quand une fonction s'appelle elle-même. 
                                Chaque appel est empilé jusqu'au cas de base !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateStackApp('expression')">
                            <div class="concept-icon">🧮</div>
                            <h4 class="concept-title">Calculatrices</h4>
                            <p class="concept-description">
                                Évaluer des expressions mathématiques. 
                                3 + 4 * 2 = ? Les piles gèrent la priorité !
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Démo application pile -->
                <div id="stack-demo" style="display: none; margin: 20px 0; padding: 20px; background: var(--surface-primary); border-radius: 8px;">
                    <h4 id="demo-title" style="color: var(--text-primary); margin-bottom: 12px;"></h4>
                    <div id="demo-content" style="color: var(--text-muted);"></div>
                    <div id="demo-simulation" style="margin-top: 16px;"></div>
                </div>
            </div>
        </section>

        <!-- Section 5: Files (Queues) -->
        <section id="queues" class="content-section queues animate-on-scroll">
            <div class="section-header">
                <div class="section-number queues">5</div>
                <h2 class="section-title">Files (Queues) - Premier Entré, Premier Sorti</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Une <strong>file</strong> fonctionne comme une file d'attente au supermarché : premier arrivé, premier servi ! 
                    Principe FIFO (First In, First Out) - équitable et prévisible ! 🛒
                </p>

                <!-- Simulateur de file -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-arrow-right"></i>
                            Simulateur de File Interactive
                        </h3>
                        <div class="simulator-stats">
                            <span>Personnes : <span id="queue-count">0</span></span> | 
                            <span>Premier : <span id="queue-front">Vide</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="queue-display">
                            <div class="empty">
                                <i class="fas fa-arrow-right" style="font-size: 2rem; margin-bottom: 8px;"></i>
                                <div>File vide - Ajoutez des personnes !</div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="text" class="control-input" id="queue-value" placeholder="Qui rejoint la file ?" maxlength="15">
                            <button class="control-btn success" onclick="enqueue()">
                                <i class="fas fa-plus"></i> ENQUEUE (Entrer dans la file)
                            </button>
                            <button class="control-btn danger" onclick="dequeue()">
                                <i class="fas fa-minus"></i> DEQUEUE (Sortir de la file)
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="frontQueue()">
                                <i class="fas fa-eye"></i> Voir le premier
                            </button>
                            <button class="control-btn danger" onclick="clearQueue()">
                                <i class="fas fa-trash"></i> Vider file
                            </button>
                            <button class="control-btn warning" onclick="checkQueueEmpty()">
                                <i class="fas fa-question"></i> Est vide ?
                            </button>
                            <button class="control-btn" onclick="getQueueSize()">
                                <i class="fas fa-ruler"></i> Taille
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillQueueExample('supermarket')">🛒 Supermarché</button>
                            <button class="control-btn" onclick="fillQueueExample('printer')">🖨️ File d'impression</button>
                            <button class="control-btn" onclick="fillQueueExample('server')">🖥️ Serveur Web</button>
                        </div>
                    </div>
                </div>

                <!-- Types de files -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🔄 Variantes de Files</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">➡️</div>
                            <h4 class="concept-title">File Simple (FIFO)</h4>
                            <p class="concept-description">
                                File d'attente classique. Premier entré, premier sorti. 
                                Juste et prévisible, comme à la poste !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🎯</div>
                            <h4 class="concept-title">File de Priorité</h4>
                            <p class="concept-description">
                                Urgences d'abord ! VIP et situations critiques 
                                passent devant, même s'ils arrivent après.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">↔️</div>
                            <h4 class="concept-title">Deque (Double End)</h4>
                            <p class="concept-description">
                                Ajout et retrait aux deux extrémités. 
                                Comme une file avec une entrée VIP !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔄</div>
                            <h4 class="concept-title">File Circulaire</h4>
                            <p class="concept-description">
                                Réutilise l'espace libéré. Efficace en mémoire, 
                                comme un manège qui tourne en continu !
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Applications des files -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🌍 Applications Dans le Monde Réel</h3>
                    <div class="concepts-grid">
                        <div class="concept-card" onclick="demonstrateQueueApp('os')">
                            <div class="concept-icon">💻</div>
                            <h4 class="concept-title">Systèmes d'Exploitation</h4>
                            <p class="concept-description">
                                Gestion des processus, ordonnancement des tâches. 
                                Chaque programme attend son tour pour utiliser le CPU !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateQueueApp('network')">
                            <div class="concept-icon">🌐</div>
                            <h4 class="concept-title">Réseaux & Internet</h4>
                            <p class="concept-description">
                                Routeurs, serveurs web, streaming. Les paquets 
                                de données font la queue pour être traités !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateQueueApp('games')">
                            <div class="concept-icon">🎮</div>
                            <h4 class="concept-title">Jeux en Ligne</h4>
                            <p class="concept-description">
                                Matchmaking, files d'attente pour les parties. 
                                "Recherche de partie..." = vous êtes dans une file !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateQueueApp('bfs')">
                            <div class="concept-icon">🗺️</div>
                            <h4 class="concept-title">Algorithmes de Recherche</h4>
                            <p class="concept-description">
                                Parcours en largeur, plus court chemin. GPS 
                                utilise des files pour trouver votre route !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 6: Arbres -->
        <section id="trees" class="content-section trees animate-on-scroll">
            <div class="section-header">
                <div class="section-number trees">6</div>
                <h2 class="section-title">Arbres - Structure Hiérarchique</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Un <strong>arbre</strong> organise les données de façon hiérarchique, comme un arbre généalogique ! 
                    Recherche ultra-rapide, structure naturelle pour beaucoup de problèmes ! 🌳
                </p>

                <!-- Simulateur d'arbre -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-sitemap"></i>
                            Simulateur d'Arbre Binaire de Recherche
                        </h3>
                        <div class="simulator-stats">
                            <span>Nœuds : <span id="tree-count">0</span></span> | 
                            <span>Hauteur : <span id="tree-height">0</span></span> | 
                            <span>Racine : <span id="tree-root">Vide</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="tree-display">
                            <div class="empty">
                                <i class="fas fa-sitemap" style="font-size: 2rem; margin-bottom: 8px;"></i>
                                <div>Arbre vide - Plantez des nœuds !</div>
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="number" class="control-input" id="tree-value" placeholder="Valeur (nombre)" min="1" max="99">
                            <button class="control-btn success" onclick="insertInTree()">
                                <i class="fas fa-plus"></i> Insérer nœud
                            </button>
                            <button class="control-btn danger" onclick="deleteFromTree()">
                                <i class="fas fa-minus"></i> Supprimer nœud
                            </button>
                            <button class="control-btn" onclick="searchInTree()">
                                <i class="fas fa-search"></i> Rechercher
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn warning" onclick="traverseTree('inorder')">
                                📖 Parcours In-Order
                            </button>
                            <button class="control-btn warning" onclick="traverseTree('preorder')">
                                📝 Parcours Pre-Order
                            </button>
                            <button class="control-btn warning" onclick="traverseTree('postorder')">
                                📋 Parcours Post-Order
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn danger" onclick="clearTree()">
                                <i class="fas fa-trash"></i> Vider arbre
                            </button>
                            <button class="control-btn" onclick="balanceTree()">
                                <i class="fas fa-balance-scale"></i> Équilibrer
                            </button>
                            <button class="control-btn" onclick="getTreeStats()">
                                <i class="fas fa-chart-bar"></i> Statistiques
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillTreeExample('numbers')">🔢 Exemple Nombres</button>
                            <button class="control-btn" onclick="fillTreeExample('perfect')">⚖️ Arbre Parfait</button>
                            <button class="control-btn" onclick="fillTreeExample('unbalanced')">⚠️ Arbre Déséquilibré</button>
                        </div>
                    </div>
                </div>

                <!-- Types d'arbres -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🌲 La Forêt des Arbres</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">🌳</div>
                            <h4 class="concept-title">Arbre Binaire</h4>
                            <p class="concept-description">
                                Chaque nœud a maximum 2 enfants. 
                                Simple et efficace, base de beaucoup d'autres arbres !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔍</div>
                            <h4 class="concept-title">Arbre Binaire de Recherche</h4>
                            <p class="concept-description">
                                Gauche < Parent < Droite. Recherche ultra-rapide 
                                O(log n) quand il est équilibré !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">⚖️</div>
                            <h4 class="concept-title">Arbre AVL</h4>
                            <p class="concept-description">
                                Auto-équilibré pour garder une hauteur optimale. 
                                Garantie de performance même avec beaucoup de données !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🌿</div>
                            <h4 class="concept-title">B-Tree</h4>
                            <p class="concept-description">
                                Plusieurs clés par nœud, optimisé pour les disques. 
                                Utilisé dans les bases de données et systèmes de fichiers !
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Applications des arbres -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🚀 Applications Spectaculaires</h3>
                    <div class="concepts-grid">
                        <div class="concept-card" onclick="demonstrateTreeApp('filesystem')">
                            <div class="concept-icon">📁</div>
                            <h4 class="concept-title">Système de Fichiers</h4>
                            <p class="concept-description">
                                Dossiers et sous-dossiers = arbre ! Windows Explorer, 
                                Finder Mac... Tout est organisé en arbre !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateTreeApp('dom')">
                            <div class="concept-icon">🌐</div>
                            <h4 class="concept-title">DOM des Pages Web</h4>
                            <p class="concept-description">
                                HTML = arbre ! html > body > div > p... 
                                JavaScript manipule cet arbre pour modifier les pages !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateTreeApp('ai')">
                            <div class="concept-icon">🤖</div>
                            <h4 class="concept-title">Intelligence Artificielle</h4>
                            <p class="concept-description">
                                Arbres de décision, minimax pour les jeux. 
                                Les échecs, le Go... L'IA explore un arbre de possibilités !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateTreeApp('compression')">
                            <div class="concept-icon">🗜️</div>
                            <h4 class="concept-title">Compression de Données</h4>
                            <p class="concept-description">
                                Arbres de Huffman pour ZIP, MP3, JPEG... 
                                Codes courts pour les données fréquentes !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 7: Tables de Hachage -->
        <section id="hash" class="content-section hash animate-on-scroll">
            <div class="section-header">
                <div class="section-number hash">7</div>
                <h2 class="section-title">Tables de Hachage - Accès Instantané</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Une <strong>table de hachage</strong> est comme un casier postal magique : donnez une clé, 
                    obtenez instantanément la valeur ! O(1) en moyenne - le Graal de la performance ! ⚡
                </p>

                <!-- Simulateur de table de hachage -->
                <div class="data-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-hashtag"></i>
                            Simulateur de Table de Hachage
                        </h3>
                        <div class="simulator-stats">
                            <span>Éléments : <span id="hash-count">0</span></span> | 
                            <span>Capacité : <span id="hash-capacity">8</span></span> | 
                            <span>Charge : <span id="hash-load">0%</span></span>
                        </div>
                    </div>

                    <div class="data-visualization">
                        <div class="structure-display" id="hash-display">
                            <div class="hash-table" id="hash-table">
                                <!-- Généré par JavaScript -->
                            </div>
                        </div>
                    </div>

                    <div class="interaction-controls">
                        <div class="control-group">
                            <input type="text" class="control-input" id="hash-key" placeholder="Clé (texte)" maxlength="10">
                            <input type="text" class="control-input" id="hash-value" placeholder="Valeur" maxlength="15">
                            <button class="control-btn success" onclick="insertInHash()">
                                <i class="fas fa-plus"></i> Insérer
                            </button>
                            <button class="control-btn" onclick="searchInHash()">
                                <i class="fas fa-search"></i> Rechercher
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn danger" onclick="deleteFromHash()">
                                <i class="fas fa-minus"></i> Supprimer clé
                            </button>
                            <button class="control-btn warning" onclick="showHashFunction()">
                                <i class="fas fa-calculator"></i> Voir fonction hash
                            </button>
                            <button class="control-btn danger" onclick="clearHash()">
                                <i class="fas fa-trash"></i> Vider table
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="resizeHash(16)">
                                <i class="fas fa-expand"></i> Agrandir (16)
                            </button>
                            <button class="control-btn" onclick="resizeHash(8)">
                                <i class="fas fa-compress"></i> Réduire (8)
                            </button>
                            <button class="control-btn warning" onclick="simulateCollisions()">
                                ⚠️ Simuler collisions
                            </button>
                        </div>
                        <div class="control-group">
                            <button class="control-btn" onclick="fillHashExample('countries')">🌍 Pays & Capitales</button>
                            <button class="control-btn" onclick="fillHashExample('students')">👥 Étudiants & Notes</button>
                            <button class="control-btn" onclick="fillHashExample('cache')">💾 Cache Web</button>
                        </div>
                    </div>
                </div>

                <!-- Gestion des collisions -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">⚔️ Gérer les Collisions</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">🔗</div>
                            <h4 class="concept-title">Chaînage</h4>
                            <p class="concept-description">
                                Chaque case contient une liste des éléments. 
                                Simple à implémenter, mais peut dégrader les performances.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🏃</div>
                            <h4 class="concept-title">Adressage Ouvert</h4>
                            <p class="concept-description">
                                Chercher la prochaine case libre. Linéaire, quadratique, 
                                ou double hachage pour éviter les clusters !
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔄</div>
                            <h4 class="concept-title">Robin Hood Hashing</h4>
                            <p class="concept-description">
                                "Voler aux riches pour donner aux pauvres" ! 
                                Égalise les distances de sondage pour plus d'équité.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🎯</div>
                            <h4 class="concept-title">Cuckoo Hashing</h4>
                            <p class="concept-description">
                                Deux tables, deux fonctions de hash. Garantit O(1) 
                                pour la recherche ! Comme un coucou qui expulse les autres.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Applications des tables de hachage -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🌟 Applications Omniprésentes</h3>
                    <div class="concepts-grid">
                        <div class="concept-card" onclick="demonstrateHashApp('database')">
                            <div class="concept-icon">🗄️</div>
                            <h4 class="concept-title">Bases de Données</h4>
                            <p class="concept-description">
                                Index pour accès rapide, cache des requêtes. 
                                SELECT * FROM users WHERE id = 123 → O(1) !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateHashApp('web')">
                            <div class="concept-icon">🌐</div>
                            <h4 class="concept-title">Développement Web</h4>
                            <p class="concept-description">
                                Sessions utilisateur, cookies, cache navigateur. 
                                JavaScript Objects, Python dictionaries...
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateHashApp('security')">
                            <div class="concept-icon">🔐</div>
                            <h4 class="concept-title">Sécurité & Cryptographie</h4>
                            <p class="concept-description">
                                Mots de passe hashés, intégrité des données. 
                                MD5, SHA-256, blockchain... Tout repose sur le hachage !
                            </p>
                        </div>

                        <div class="concept-card" onclick="demonstrateHashApp('deduplication')">
                            <div class="concept-icon">🔍</div>
                            <h4 class="concept-title">Déduplication</h4>
                            <p class="concept-description">
                                Éliminer les doublons rapidement. Photos identiques, 
                                fichiers dupliqués, données redondantes...
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fonctions de hachage -->
                <div class="complexity-info">
                    <div class="complexity-title">
                        <i class="fas fa-function"></i>
                        Fonctions de Hachage Populaires
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 12px;">
                        <div class="complexity-item">
                            <div class="complexity-operation">Division</div>
                            <div class="complexity-value">hash(k) = k mod m</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Multiplication</div>
                            <div class="complexity-value">hash(k) = ⌊m(kA mod 1)⌋</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Universelle</div>
                            <div class="complexity-value">Famille de fonctions</div>
                        </div>
                        <div class="complexity-item">
                            <div class="complexity-operation">Cryptographique</div>
                            <div class="complexity-value">SHA-256, MD5...</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showDataStructuresQuiz()">
                <i class="fas fa-brain"></i>
                Quiz Structures de Données
            </button>
            <button class="btn btn-secondary" onclick="downloadCheatSheet()">
                <i class="fas fa-file-pdf"></i>
                Antisèche PDF
            </button>
            <button class="btn btn-secondary" onclick="showComplexityAnalyzer()">
                <i class="fas fa-chart-line"></i>
                Analyseur de Complexité
            </button>
            <button class="btn btn-secondary" onclick="nextCourse()">
                <i class="fas fa-arrow-right"></i>
                Cours Suivant
            </button>
        </div>
    </div>

    <script>
        // Variables globales pour les structures de données
        let currentArray = [];
        let currentList = [];
        let currentStack = [];
        let currentQueue = [];
        let currentTree = null;
        let currentHashTable = {};
        let hashCapacity = 8;
        let hashSize = 0;

        // Classe pour les nœuds d'arbre
        class TreeNode {
            constructor(value) {
                this.value = value;
                this.left = null;
                this.right = null;
            }
        }

        // === FONCTIONS UTILITAIRES ===
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

        // === INTRODUCTION - EXEMPLES BIBLIOTHÈQUE ===
        function showLibraryExample(type) {
            const exampleDiv = document.getElementById('library-example');
            const title = document.getElementById('example-title');
            const description = document.getElementById('example-description');
            
            const examples = {
                shelf: {
                    title: '📚 Étagère = Tableau',
                    description: 'Livre #3 ? Je vais directement au 3ème emplacement ! Accès instantané O(1), mais déplacer tous les livres pour en insérer un au milieu... O(n) !'
                },
                chain: {
                    title: '🔗 Chaîne = Liste Chaînée',
                    description: 'Pour le 5ème livre, je dois suivre la chaîne : 1er → 2ème → 3ème → 4ème → 5ème. Plus lent O(n), mais ajouter un livre au début ? Juste changer le premier lien !'
                },
                pile: {
                    title: '📋 Pile de Livres',
                    description: 'Je ne peux prendre que le livre du dessus ! Parfait pour l\'historique : la dernière action est la première qu\'on peut annuler.'
                },
                queue: {
                    title: '👥 File d\'Attente',
                    description: 'Premier arrivé, premier servi ! Juste comme les tâches d\'impression : votre document passe après tous ceux qui étaient déjà en attente.'
                }
            };
            
            if (examples[type]) {
                title.textContent = examples[type].title;
                description.textContent = examples[type].description;
                exampleDiv.style.display = 'block';
                showNotification(`Exemple ${type} affiché !`, 'info');
            }
        }

        // === SIMULATEUR DE TABLEAU ===
        function updateArrayDisplay() {
            const display = document.getElementById('array-display');
            const sizeSpan = document.getElementById('array-size');
            const countSpan = document.getElementById('array-count');
            
            sizeSpan.textContent = currentArray.length;
            countSpan.textContent = currentArray.filter(item => item !== undefined).length;
            
            if (currentArray.length === 0) {
                display.innerHTML = `
                    <div class="empty">
                        <i class="fas fa-plus-circle" style="font-size: 2rem; margin-bottom: 8px;"></i>
                        <div>Tableau vide - Ajoutez des éléments !</div>
                    </div>
                `;
                return;
            }
            
            display.innerHTML = '';
            currentArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'array-element';
                element.innerHTML = `
                    <div class="array-index">${index}</div>
                    ${value !== undefined ? value : 'null'}
                `;
                element.onclick = () => highlightArrayElement(index);
                display.appendChild(element);
            });
        }

        function highlightArrayElement(index) {
            document.querySelectorAll('.array-element').forEach((el, i) => {
                el.classList.toggle('highlight', i === index);
            });
            showNotification(`Élément à l'index ${index} : ${currentArray[index]}`, 'info');
        }

        function addToArray() {
            const value = document.getElementById('array-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur à ajouter !', 'warning');
                return;
            }
            
            currentArray.push(value);
            updateArrayDisplay();
            document.getElementById('array-value').value = '';
            showNotification(`"${value}" ajouté à la fin du tableau !`, 'success');
        }

        function insertInArray() {
            const value = document.getElementById('array-value').value.trim();
            const index = parseInt(document.getElementById('array-index').value);
            
            if (!value) {
                showNotification('Entrez une valeur à insérer !', 'warning');
                return;
            }
            
            if (isNaN(index) || index < 0 || index > currentArray.length) {
                showNotification(`Index invalide ! Utilisez 0-${currentArray.length}`, 'warning');
                return;
            }
            
            currentArray.splice(index, 0, value);
            updateArrayDisplay();
            document.getElementById('array-value').value = '';
            document.getElementById('array-index').value = '';
            showNotification(`"${value}" inséré à l'index ${index} !`, 'success');
        }

        function searchInArray() {
            const value = document.getElementById('array-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur à rechercher !', 'warning');
                return;
            }
            
            const index = currentArray.indexOf(value);
            if (index !== -1) {
                highlightArrayElement(index);
                showNotification(`"${value}" trouvé à l'index ${index} !`, 'success');
            } else {
                showNotification(`"${value}" non trouvé dans le tableau`, 'error');
            }
        }

        function removeFromArray() {
            const index = parseInt(document.getElementById('array-index').value);
            
            if (isNaN(index) || index < 0 || index >= currentArray.length) {
                showNotification(`Index invalide ! Utilisez 0-${currentArray.length - 1}`, 'warning');
                return;
            }
            
            const removed = currentArray.splice(index, 1)[0];
            updateArrayDisplay();
            document.getElementById('array-index').value = '';
            showNotification(`"${removed}" supprimé de l'index ${index} !`, 'success');
        }

        function clearArray() {
            currentArray = [];
            updateArrayDisplay();
            showNotification('Tableau vidé !', 'info');
        }

        function sortArray() {
            if (currentArray.length === 0) {
                showNotification('Tableau vide !', 'warning');
                return;
            }
            
            currentArray.sort((a, b) => {
                // Tri numérique si possible, sinon alphabétique
                const numA = parseFloat(a);
                const numB = parseFloat(b);
                if (!isNaN(numA) && !isNaN(numB)) {
                    return numA - numB;
                }
                return a.localeCompare(b);
            });
            
            updateArrayDisplay();
            showNotification('Tableau trié !', 'success');
        }

        function fillArrayExample(type) {
            const examples = {
                numbers: [1, 15, 3, 42, 8, 23, 7, 91, 5],
                fruits: ['🍎', '🍌', '🍊', '🍇', '🥝', '🍓', '🥭'],
                colors: ['Rouge', 'Bleu', 'Vert', 'Jaune', 'Violet', 'Orange']
            };
            
            if (examples[type]) {
                currentArray = [...examples[type]];
                updateArrayDisplay();
                showNotification(`Exemple ${type} chargé !`, 'success');
            }
        }

        // === SIMULATEUR DE LISTE CHAÎNÉE ===
        function updateListDisplay() {
            const display = document.getElementById('list-display');
            const countSpan = document.getElementById('list-count');
            const headSpan = document.getElementById('list-head');
            
            countSpan.textContent = currentList.length;
            headSpan.textContent = currentList.length > 0 ? currentList[0] : 'NULL';
            
            if (currentList.length === 0) {
                display.innerHTML = `
                    <div class="empty">
                        <i class="fas fa-link" style="font-size: 2rem; margin-bottom: 8px;"></i>
                        <div>Liste vide - Ajoutez des nœuds !</div>
                    </div>
                `;
                return;
            }
            
            display.innerHTML = '';
            display.style.flexDirection = 'row';
            display.style.justifyContent = 'flex-start';
            display.style.alignItems = 'center';
            
            currentList.forEach((value, index) => {
                // Nœud
                const node = document.createElement('div');
                node.className = 'list-node';
                node.innerHTML = `
                    <div class="node-data">${value}</div>
                    <div class="node-pointer">${index < currentList.length - 1 ? '→' : '∅'}</div>
                `;
                display.appendChild(node);
                
                // Flèche de liaison (sauf pour le dernier)
                if (index < currentList.length - 1) {
                    const arrow = document.createElement('div');
                    arrow.className = 'list-arrow';
                    arrow.textContent = '→';
                    display.appendChild(arrow);
                }
            });
        }

        function addToListFront() {
            const value = document.getElementById('list-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur pour le nœud !', 'warning');
                return;
            }
            
            currentList.unshift(value);
            updateListDisplay();
            document.getElementById('list-value').value = '';
            showNotification(`"${value}" ajouté au début de la liste !`, 'success');
        }

        function addToListEnd() {
            const value = document.getElementById('list-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur pour le nœud !', 'warning');
                return;
            }
            
            currentList.push(value);
            updateListDisplay();
            document.getElementById('list-value').value = '';
            showNotification(`"${value}" ajouté à la fin de la liste !`, 'success');
        }

        function insertInList() {
            const value = document.getElementById('list-value').value.trim();
            const position = parseInt(document.getElementById('list-position').value);
            
            if (!value) {
                showNotification('Entrez une valeur pour le nœud !', 'warning');
                return;
            }
            
            if (isNaN(position) || position < 0 || position > currentList.length) {
                showNotification(`Position invalide ! Utilisez 0-${currentList.length}`, 'warning');
                return;
            }
            
            currentList.splice(position, 0, value);
            updateListDisplay();
            document.getElementById('list-value').value = '';
            document.getElementById('list-position').value = '';
            showNotification(`"${value}" inséré à la position ${position} !`, 'success');
        }

        function removeFromList() {
            const position = parseInt(document.getElementById('list-position').value);
            
            if (isNaN(position) || position < 0 || position >= currentList.length) {
                showNotification(`Position invalide ! Utilisez 0-${currentList.length - 1}`, 'warning');
                return;
            }
            
            const removed = currentList.splice(position, 1)[0];
            updateListDisplay();
            document.getElementById('list-position').value = '';
            showNotification(`"${removed}" supprimé de la position ${position} !`, 'success');
        }

        function searchInList() {
            const value = document.getElementById('list-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur à rechercher !', 'warning');
                return;
            }
            
            const position = currentList.indexOf(value);
            if (position !== -1) {
                showNotification(`"${value}" trouvé à la position ${position} !`, 'success');
            } else {
                showNotification(`"${value}" non trouvé dans la liste`, 'error');
            }
        }

        function clearList() {
            currentList = [];
            updateListDisplay();
            showNotification('Liste vidée !', 'info');
        }

        function reverseList() {
            if (currentList.length === 0) {
                showNotification('Liste vide !', 'warning');
                return;
            }
            
            currentList.reverse();
            updateListDisplay();
            showNotification('Liste inversée !', 'success');
        }

        function fillListExample(type) {
            const examples = {
                tasks: ['Réveil', 'Petit-déj', 'Cours', 'Déjeuner', 'Sport', 'Dîner'],
                playlist: ['🎵 Bohemian Rhapsody', '🎵 Imagine', '🎵 Hotel California', '🎵 Stairway to Heaven'],
                shopping: ['🛒 Pain', '🛒 Lait', '🛒 Œufs', '🛒 Fromage', '🛒 Pommes']
            };
            
            if (examples[type]) {
                currentList = [...examples[type]];
                updateListDisplay();
                showNotification(`Exemple ${type} chargé !`, 'success');
            }
        }

        // === SIMULATEUR DE PILE ===
        function updateStackDisplay() {
            const display = document.getElementById('stack-display');
            const countSpan = document.getElementById('stack-count');
            const topSpan = document.getElementById('stack-top');
            
            countSpan.textContent = currentStack.length;
            topSpan.textContent = currentStack.length > 0 ? currentStack[currentStack.length - 1] : 'Vide';
            
            if (currentStack.length === 0) {
                display.innerHTML = `
                    <div class="empty">
                        <i class="fas fa-layer-group" style="font-size: 2rem; margin-bottom: 8px;"></i>
                        <div>Pile vide - Poussez des éléments !</div>
                    </div>
                `;
                return;
            }
            
            display.innerHTML = '<div class="stack-container"></div>';
            const container = display.querySelector('.stack-container');
            
            // Ajouter le label "SOMMET"
            const topLabel = document.createElement('div');
            topLabel.className = 'stack-label top';
            topLabel.textContent = 'SOMMET';
            container.appendChild(topLabel);
            
            currentStack.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'stack-element';
                element.textContent = value;
                if (index === currentStack.length - 1) {
                    element.style.background = 'var(--warning-gradient)';
                }
                container.appendChild(element);
            });
        }

        function pushToStack() {
            const value = document.getElementById('stack-value').value.trim();
            if (!value) {
                showNotification('Entrez une valeur à empiler !', 'warning');
                return;
            }
            
            currentStack.push(value);
            updateStackDisplay();
            document.getElementById('stack-value').value = '';
            showNotification(`"${value}" empilé ! 📚`, 'success');
        }

        function popFromStack() {
            if (currentStack.length === 0) {
                showNotification('Pile vide ! Rien à dépiler.', 'warning');
                return;
            }
            
            const popped = currentStack.pop();
            updateStackDisplay();
            showNotification(`"${popped}" dépilé ! 📤`, 'success');
        }

        function peekStack() {
            if (currentStack.length === 0) {
                showNotification('Pile vide !', 'warning');
                return;
            }
            
            const top = currentStack[currentStack.length - 1];
            showNotification(`Sommet de la pile : "${top}" 👀`, 'info');
        }

        function clearStack() {
            currentStack = [];
            updateStackDisplay();
            showNotification('Pile vidée !', 'info');
        }

        function checkStackEmpty() {
            const isEmpty = currentStack.length === 0;
            showNotification(`Pile ${isEmpty ? 'vide' : 'non vide'} ! ${isEmpty ? '📭' : '📬'}`, 'info');
        }

        function getStackSize() {
            showNotification(`Taille de la pile : ${currentStack.length} éléments`, 'info');
        }

        function fillStackExample(type) {
            const examples = {
                undo: ['Taper "Bonjour"', 'Mettre en gras', 'Ajouter une image', 'Changer la couleur', 'Sauvegarder'],
                parentheses: ['(', '[', '{', '}', ']', ')'],
                function: ['main()', 'calcul()', 'addition()', 'verification()']
            };
            
            if (examples[type]) {
                currentStack = [...examples[type]];
                updateStackDisplay();
                showNotification(`Exemple ${type} chargé !`, 'success');
            }
        }

        function demonstrateStackApp(type) {
            const demo = document.getElementById('stack-demo');
            const title = document.getElementById('demo-title');
            const content = document.getElementById('demo-content');
            const simulation = document.getElementById('demo-simulation');
            
            const demos = {
                undo: {
                    title: '↶ Fonction Annuler (Ctrl+Z)',
                    content: 'Chaque action que vous faites est empilée. Quand vous appuyez sur Ctrl+Z, la dernière action est dépilée et annulée !',
                    simulation: '<div style="font-family: monospace; background: var(--dark-tertiary); padding: 12px; border-radius: 6px;">Action 1: Écrire "Hello"<br>Action 2: Mettre en gras<br>Action 3: Ajouter image<br><strong style="color: var(--text-accent);">Ctrl+Z → Annule Action 3</strong></div>'
                },
                browser: {
                    title: '🌐 Historique du Navigateur',
                    content: 'Chaque page visitée est empilée. Le bouton "Retour" dépile la page actuelle pour revenir à la précédente !',
                    simulation: '<div style="font-family: monospace; background: var(--dark-tertiary); padding: 12px; border-radius: 6px;">google.com → facebook.com → youtube.com<br><strong style="color: var(--text-accent);">Bouton Retour → youtube.com dépilé</strong><br>Retour sur facebook.com</div>'
                },
                recursion: {
                    title: '🔄 Appels de Fonctions Récursifs',
                    content: 'Quand une fonction s\'appelle elle-même, chaque appel est empilé. Une fois le cas de base atteint, tout se dépile !',
                    simulation: '<div style="font-family: monospace; background: var(--dark-tertiary); padding: 12px; border-radius: 6px;">factorielle(3) → factorielle(2) → factorielle(1)<br>factorielle(1) = 1<br>factorielle(2) = 2 * 1 = 2<br><strong style="color: var(--text-accent);">factorielle(3) = 3 * 2 = 6</strong></div>'
                },
                expression: {
                    title: '🧮 Évaluation d\'Expressions',
                    content: 'Les calculatrices utilisent une pile pour évaluer les expressions avec la bonne priorité !',
                    simulation: '<div style="font-family: monospace; background: var(--dark-tertiary); padding: 12px; border-radius: 6px;">3 + 4 * 2<br>Pile: [3] → [3, 4] → [3, 4, 2] → [3, 8] → [11]<br><strong style="color: var(--text-accent);">Résultat: 11</strong></div>'
                }
            };
            
            if (demos[type]) {
                const d = demos[type];
                title.textContent = d.title;
                content.textContent = d.content;
                simulation.innerHTML = d.simulation;
                demo.style.display = 'block';
                demo.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        // === SIMULATEUR DE FILE ===
        function updateQueueDisplay() {
            const display = document.getElementById('queue-display');
            const countSpan = document.getElementById('queue-count');
            const frontSpan = document.getElementById('queue-front');
            
            countSpan.textContent = currentQueue.length;
            frontSpan.textContent = currentQueue.length > 0 ? currentQueue[0] : 'Vide';
            
            if (currentQueue.length === 0) {
                display.innerHTML = `
                    <div class="empty">
                        <i class="fas fa-arrow-right" style="font-size: 2rem; margin-bottom: 8px;"></i>
                        <div>File vide - Ajoutez des personnes !</div>
                    </div>
                `;
                return;
            }
            
            display.innerHTML = '<div class="queue-container"></div>';
            const container = display.querySelector('.queue-container');
            
            // Labels
            const frontLabel = document.createElement('div');
            frontLabel.className = 'queue-label front';
            frontLabel.textContent = 'DÉBUT';
            container.appendChild(frontLabel);
            
            currentQueue.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'queue-element';
                element.textContent = value;
                if (index === 0) {
                    element.style.background = 'var(--warning-gradient)';
                }
                container.appendChild(element);
                
                if (index < currentQueue.length - 1) {
                    const arrow = document.createElement('div');
                    arrow.textContent = '→';
                    arrow.style.color = 'var(--text-accent)';
                    arrow.style.fontSize = '1.5rem';
                    container.appendChild(arrow);
                }
            });
            
            const rearLabel = document.createElement('div');
            rearLabel.className = 'queue-label rear';
            rearLabel.textContent = 'FIN';
            container.appendChild(rearLabel);
        }

        function enqueue() {
            const value = document.getElementById('queue-value').value.trim();
            if (!value) {
                showNotification('Entrez qui rejoint la file !', 'warning');
                return;
            }
            
            currentQueue.push(value);
            updateQueueDisplay();
            document.getElementById('queue-value').value = '';
            showNotification(`"${value}" rejoint la file ! 🚶‍♂️`, 'success');
        }

        function dequeue() {
            if (currentQueue.length === 0) {
                showNotification('File vide ! Personne à servir.', 'warning');
                return;
            }
            
            const served = currentQueue.shift();
            updateQueueDisplay();
            showNotification(`"${served}" servi et sorti de la file ! ✅`, 'success');
        }

        function frontQueue() {
            if (currentQueue.length === 0) {
                showNotification('File vide !', 'warning');
                return;
            }
            
            const front = currentQueue[0];
            showNotification(`Premier dans la file : "${front}" 👀`, 'info');
        }

        function clearQueue() {
            currentQueue = [];
            updateQueueDisplay();
            showNotification('File vidée ! Tout le monde est parti 🏃‍♂️', 'info');
        }

        function checkQueueEmpty() {
            const isEmpty = currentQueue.length === 0;
            showNotification(`File ${isEmpty ? 'vide' : 'non vide'} ! ${isEmpty ? '🚫' : '👥'}`, 'info');
        }

        function getQueueSize() {
            showNotification(`${currentQueue.length} personnes dans la file`, 'info');
        }

        function fillQueueExample(type) {
            const examples = {
                supermarket: ['👩 Marie', '👨 Pierre', '👵 Josette', '👶 Bébé', '🧑 Alex'],
                printer: ['📄 Rapport.pdf', '📊 Graphiques.xlsx', '📝 CV.docx', '🖼️ Photo.jpg'],
                server: ['GET /home', 'POST /login', 'GET /profile', 'PUT /settings', 'DELETE /user']
            };
            
            if (examples[type]) {
                currentQueue = [...examples[type]];
                updateQueueDisplay();
                showNotification(`Exemple ${type} chargé !`, 'success');
            }
        }

        function demonstrateQueueApp(type) {
            const examples = {
                os: 'Systèmes d\'exploitation : Les processus attendent leur tour pour utiliser le CPU. Algorithmes comme Round Robin utilisent des files !',
                network: 'Réseaux : Les paquets de données font la queue dans les routeurs. QoS (Quality of Service) = files de priorité !',
                games: 'Jeux en ligne : Matchmaking, lobbies d\'attente. "Temps d\'attente estimé" = votre position dans la file !',
                bfs: 'Algorithmes BFS : Parcours d\'un graphe niveau par niveau. GPS trouve le plus court chemin avec une file !'
            };
            
            if (examples[type]) {
                showNotification(examples[type], 'info');
            }
        }

        // === SIMULATEUR D'ARBRE ===
        function updateTreeDisplay() {
            const display = document.getElementById('tree-display');
            const countSpan = document.getElementById('tree-count');
            const heightSpan = document.getElementById('tree-height');
            const rootSpan = document.getElementById('tree-root');
            
            const nodeCount = countTreeNodes(currentTree);
            const height = getTreeHeight(currentTree);
            
            countSpan.textContent = nodeCount;
            heightSpan.textContent = height;
            rootSpan.textContent = currentTree ? currentTree.value : 'Vide';
            
            if (!currentTree) {
                display.innerHTML = `
                    <div class="empty">
                        <i class="fas fa-sitemap" style="font-size: 2rem; margin-bottom: 8px;"></i>
                        <div>Arbre vide - Plantez des nœuds !</div>
                    </div>
                `;
                return;
            }
            
            display.innerHTML = '<div class="tree-container"></div>';
            const container = display.querySelector('.tree-container');
            renderTree(container, currentTree);
        }

        function renderTree(container, root, level = 0) {
            if (!root) return;
            
            // Créer les niveaux si nécessaire
            while (container.children.length <= level) {
                const levelDiv = document.createElement('div');
                levelDiv.className = 'tree-level';
                container.appendChild(levelDiv);
            }
            
            const levelDiv = container.children[level];
            
            // Créer le nœud
            const node = document.createElement('div');
            node.className = 'tree-node';
            node.textContent = root.value;
            node.onclick = () => showNotification(`Nœud sélectionné : ${root.value}`, 'info');
            levelDiv.appendChild(node);
            
            // Ajouter les enfants récursivement
            if (root.left) renderTree(container, root.left, level + 1);
            if (root.right) renderTree(container, root.right, level + 1);
        }

        function insertInTree() {
            const value = parseInt(document.getElementById('tree-value').value);
            if (isNaN(value)) {
                showNotification('Entrez un nombre valide !', 'warning');
                return;
            }
            
            currentTree = insertTreeNode(currentTree, value);
            updateTreeDisplay();
            document.getElementById('tree-value').value = '';
            showNotification(`Nœud ${value} inséré dans l'arbre ! 🌱`, 'success');
        }

        function insertTreeNode(root, value) {
            if (!root) {
                return new TreeNode(value);
            }
            
            if (value < root.value) {
                root.left = insertTreeNode(root.left, value);
            } else if (value > root.value) {
                root.right = insertTreeNode(root.right, value);
            } else {
                showNotification(`${value} existe déjà dans l'arbre !`, 'warning');
            }
            
            return root;
        }

        function deleteFromTree() {
            const value = parseInt(document.getElementById('tree-value').value);
            if (isNaN(value)) {
                showNotification('Entrez un nombre à supprimer !', 'warning');
                return;
            }
            
            if (!searchTreeNode(currentTree, value)) {
                showNotification(`${value} n'existe pas dans l'arbre !`, 'warning');
                return;
            }
            
            currentTree = deleteTreeNode(currentTree, value);
            updateTreeDisplay();
            document.getElementById('tree-value').value = '';
            showNotification(`Nœud ${value} supprimé ! ✂️`, 'success');
        }

        function deleteTreeNode(root, value) {
            if (!root) return null;
            
            if (value < root.value) {
                root.left = deleteTreeNode(root.left, value);
            } else if (value > root.value) {
                root.right = deleteTreeNode(root.right, value);
            } else {
                // Nœud à supprimer trouvé
                if (!root.left) return root.right;
                if (!root.right) return root.left;
                
                // Nœud avec deux enfants : trouver le successeur
                const successor = findMin(root.right);
                root.value = successor.value;
                root.right = deleteTreeNode(root.right, successor.value);
            }
            
            return root;
        }

        function findMin(root) {
            while (root.left) {
                root = root.left;
            }
            return root;
        }

        function searchInTree() {
            const value = parseInt(document.getElementById('tree-value').value);
            if (isNaN(value)) {
                showNotification('Entrez un nombre à rechercher !', 'warning');
                return;
            }
            
            const found = searchTreeNode(currentTree, value);
            if (found) {
                showNotification(`${value} trouvé dans l'arbre ! 🎯`, 'success');
            } else {
                showNotification(`${value} non trouvé dans l'arbre`, 'error');
            }
        }

        function searchTreeNode(root, value) {
            if (!root || root.value === value) {
                return root;
            }
            
            if (value < root.value) {
                return searchTreeNode(root.left, value);
            } else {
                return searchTreeNode(root.right, value);
            }
        }

        function traverseTree(type) {
            if (!currentTree) {
                showNotification('Arbre vide !', 'warning');
                return;
            }
            
            const result = [];
            
            switch (type) {
                case 'inorder':
                    inorderTraversal(currentTree, result);
                    showNotification(`Parcours In-Order : ${result.join(' → ')}`, 'info');
                    break;
                case 'preorder':
                    preorderTraversal(currentTree, result);
                    showNotification(`Parcours Pre-Order : ${result.join(' → ')}`, 'info');
                    break;
                case 'postorder':
                    postorderTraversal(currentTree, result);
                    showNotification(`Parcours Post-Order : ${result.join(' → ')}`, 'info');
                    break;
            }
        }

        function inorderTraversal(root, result) {
            if (root) {
                inorderTraversal(root.left, result);
                result.push(root.value);
                inorderTraversal(root.right, result);
            }
        }

        function preorderTraversal(root, result) {
            if (root) {
                result.push(root.value);
                preorderTraversal(root.left, result);
                preorderTraversal(root.right, result);
            }
        }

        function postorderTraversal(root, result) {
            if (root) {
                postorderTraversal(root.left, result);
                postorderTraversal(root.right, result);
                result.push(root.value);
            }
        }

        function clearTree() {
            currentTree = null;
            updateTreeDisplay();
            showNotification('Arbre coupé ! 🪓', 'info');
        }

        function balanceTree() {
            if (!currentTree) {
                showNotification('Arbre vide !', 'warning');
                return;
            }
            
            const values = [];
            inorderTraversal(currentTree, values);
            currentTree = buildBalancedTree(values, 0, values.length - 1);
            updateTreeDisplay();
            showNotification('Arbre équilibré ! ⚖️', 'success');
        }

        function buildBalancedTree(values, start, end) {
            if (start > end) return null;
            
            const mid = Math.floor((start + end) / 2);
            const root = new TreeNode(values[mid]);
            
            root.left = buildBalancedTree(values, start, mid - 1);
            root.right = buildBalancedTree(values, mid + 1, end);
            
            return root;
        }

        function getTreeStats() {
            if (!currentTree) {
                showNotification('Arbre vide !', 'warning');
                return;
            }
            
            const nodeCount = countTreeNodes(currentTree);
            const height = getTreeHeight(currentTree);
            const isBalanced = checkBalanced(currentTree);
            
            showNotification(`📊 Stats : ${nodeCount} nœuds, hauteur ${height}, ${isBalanced ? 'équilibré' : 'déséquilibré'}`, 'info');
        }

        function countTreeNodes(root) {
            if (!root) return 0;
            return 1 + countTreeNodes(root.left) + countTreeNodes(root.right);
        }

        function getTreeHeight(root) {
            if (!root) return 0;
            return 1 + Math.max(getTreeHeight(root.left), getTreeHeight(root.right));
        }

        function checkBalanced(root) {
            if (!root) return true;
            
            const leftHeight = getTreeHeight(root.left);
            const rightHeight = getTreeHeight(root.right);
            
            return Math.abs(leftHeight - rightHeight) <= 1 &&
                   checkBalanced(root.left) &&
                   checkBalanced(root.right);
        }

        function fillTreeExample(type) {
            const examples = {
                numbers: [50, 30, 70, 20, 40, 60, 80],
                perfect: [8, 4, 12, 2, 6, 10, 14, 1, 3, 5, 7, 9, 11, 13, 15],
                unbalanced: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            };
            
            if (examples[type]) {
                currentTree = null;
                examples[type].forEach(value => {
                    currentTree = insertTreeNode(currentTree, value);
                });
                updateTreeDisplay();
                showNotification(`Exemple ${type} planté ! 🌳`, 'success');
            }
        }

        function demonstrateTreeApp(type) {
            const examples = {
                filesystem: 'Système de fichiers : C:/Users/Documents/Photos/ = arbre ! Chaque dossier est un nœud avec des sous-dossiers enfants.',
                dom: 'DOM HTML : <html><body><div><p>Texte</p></div></body></html> = arbre ! JavaScript navigue dans cet arbre.',
                ai: 'IA et jeux : L\'ordinateur explore un arbre de coups possibles. Plus il regarde loin, plus il est fort !',
                compression: 'Compression : ZIP, MP3, JPEG utilisent des arbres de Huffman. Codes courts pour les données fréquentes !'
            };
            
            if (examples[type]) {
                showNotification(examples[type], 'info');
            }
        }

        // === SIMULATEUR TABLE DE HACHAGE ===
        function initHashTable() {
            const table = document.getElementById('hash-table');
            table.innerHTML = '';
            
            for (let i = 0; i < hashCapacity; i++) {
                const slot = document.createElement('div');
                slot.className = 'hash-slot';
                slot.innerHTML = `
                    <div class="hash-index">${i}</div>
                    <div style="color: var(--text-muted); font-style: italic;">vide</div>
                `;
                table.appendChild(slot);
            }
        }

        function updateHashDisplay() {
            const table = document.getElementById('hash-table');
            const countSpan = document.getElementById('hash-count');
            const capacitySpan = document.getElementById('hash-capacity');
            const loadSpan = document.getElementById('hash-load');
            
            countSpan.textContent = hashSize;
            capacitySpan.textContent = hashCapacity;
            loadSpan.textContent = Math.round((hashSize / hashCapacity) * 100) + '%';
            
            // Mettre à jour l'affichage des slots
            const slots = table.querySelectorAll('.hash-slot');
            slots.forEach((slot, index) => {
                const key = findKeyAtIndex(index);
                if (key !== null) {
                    slot.className = 'hash-slot filled';
                    slot.innerHTML = `
                        <div class="hash-index">${index}</div>
                        <div style="font-weight: 600;">${key}</div>
                        <div style="font-size: 0.8rem; opacity: 0.8;">${currentHashTable[key]}</div>
                    `;
                } else {
                    slot.className = 'hash-slot';
                    slot.innerHTML = `
                        <div class="hash-index">${index}</div>
                        <div style="color: var(--text-muted); font-style: italic;">vide</div>
                    `;
                }
            });
        }

        function findKeyAtIndex(index) {
            for (const key in currentHashTable) {
                if (hashFunction(key) === index) {
                    return key;
                }
            }
            return null;
        }

        function hashFunction(key) {
            let hash = 0;
            for (let i = 0; i < key.length; i++) {
                hash = (hash + key.charCodeAt(i) * (i + 1)) % hashCapacity;
            }
            return hash;
        }

        function insertInHash() {
            const key = document.getElementById('hash-key').value.trim();
            const value = document.getElementById('hash-value').value.trim();
            
            if (!key || !value) {
                showNotification('Entrez une clé ET une valeur !', 'warning');
                return;
            }
            
            if (hashSize >= hashCapacity) {
                showNotification('Table de hachage pleine ! Agrandissez-la.', 'warning');
                return;
            }
            
            const index = hashFunction(key);
            
            if (currentHashTable[key]) {
                showNotification(`Clé "${key}" mise à jour ! (index ${index})`, 'info');
            } else {
                hashSize++;
                showNotification(`"${key}" → "${value}" inséré à l'index ${index} ! 🔑`, 'success');
            }
            
            currentHashTable[key] = value;
            updateHashDisplay();
            document.getElementById('hash-key').value = '';
            document.getElementById('hash-value').value = '';
        }

        function searchInHash() {
            const key = document.getElementById('hash-key').value.trim();
            if (!key) {
                showNotification('Entrez une clé à rechercher !', 'warning');
                return;
            }
            
            if (currentHashTable[key]) {
                const index = hashFunction(key);
                showNotification(`"${key}" trouvé : "${currentHashTable[key]}" (index ${index}) 🎯`, 'success');
            } else {
                showNotification(`Clé "${key}" non trouvée`, 'error');
            }
        }

        function deleteFromHash() {
            const key = document.getElementById('hash-key').value.trim();
            if (!key) {
                showNotification('Entrez une clé à supprimer !', 'warning');
                return;
            }
            
            if (currentHashTable[key]) {
                delete currentHashTable[key];
                hashSize--;
                updateHashDisplay();
                showNotification(`Clé "${key}" supprimée ! 🗑️`, 'success');
            } else {
                showNotification(`Clé "${key}" non trouvée`, 'error');
            }
            
            document.getElementById('hash-key').value = '';
        }

        function showHashFunction() {
            const key = document.getElementById('hash-key').value.trim();
            if (!key) {
                showNotification('Entrez une clé pour voir sa fonction de hachage !', 'warning');
                return;
            }
            
            const index = hashFunction(key);
            let calculation = '';
            for (let i = 0; i < key.length; i++) {
                const char = key[i];
                const code = key.charCodeAt(i);
                calculation += `${char}(${code}) × ${i + 1} + `;
            }
            calculation = calculation.slice(0, -3) + ` mod ${hashCapacity} = ${index}`;
            
            showNotification(`Hash("${key}") = ${calculation}`, 'info');
        }

        function clearHash() {
            currentHashTable = {};
            hashSize = 0;
            updateHashDisplay();
            showNotification('Table de hachage vidée ! 🧹', 'info');
        }

        function resizeHash(newCapacity) {
            const oldTable = { ...currentHashTable };
            hashCapacity = newCapacity;
            currentHashTable = {};
            hashSize = 0;
            
            // Réinitialiser l'affichage
            initHashTable();
            
            // Réinsérer tous les éléments
            for (const key in oldTable) {
                currentHashTable[key] = oldTable[key];
                hashSize++;
            }
            
            updateHashDisplay();
            showNotification(`Table redimensionnée à ${newCapacity} slots ! 📏`, 'success');
        }

        function simulateCollisions() {
            // Créer des clés qui ont la même valeur de hash
            const collisionKeys = ['abc', 'bac', 'cab']; // Ces clés peuvent créer des collisions
            
            clearHash();
            
            collisionKeys.forEach((key, index) => {
                currentHashTable[key] = `Valeur${index + 1}`;
                hashSize++;
            });
            
            updateHashDisplay();
            showNotification('⚠️ Collisions simulées ! Plusieurs clés au même index.', 'warning');
        }

        function fillHashExample(type) {
            const examples = {
                countries: {
                    'France': 'Paris',
                    'Espagne': 'Madrid', 
                    'Italie': 'Rome',
                    'Allemagne': 'Berlin',
                    'Portugal': 'Lisbonne'
                },
                students: {
                    'Alice': '18/20',
                    'Bob': '15/20',
                    'Charlie': '19/20',
                    'Diana': '16/20',
                    'Eve': '20/20'
                },
                cache: {
                    '/home': 'Page d\'accueil',
                    '/profile': 'Profil utilisateur',
                    '/settings': 'Paramètres',
                    '/about': 'À propos'
                }
            };
            
            if (examples[type]) {
                clearHash();
                for (const key in examples[type]) {
                    currentHashTable[key] = examples[type][key];
                    hashSize++;
                }
                updateHashDisplay();
                showNotification(`Exemple ${type} chargé ! 📋`, 'success');
            }
        }

        function demonstrateHashApp(type) {
            const examples = {
                database: 'Bases de données : INDEX sur une table = table de hachage ! SELECT * WHERE id=123 devient un accès O(1) direct.',
                web: 'Web : Sessions PHP, localStorage JavaScript, dictionnaires Python... Partout où vous voulez clé → valeur rapidement !',
                security: 'Sécurité : Mots de passe jamais stockés en clair ! hash(password) stocké. Vérification = comparer les hash.',
                deduplication: 'Déduplication : hash(fichier) = empreinte unique. Même hash = fichier identique ! Économise l\'espace disque.'
            };
            
            if (examples[type]) {
                showNotification(examples[type], 'info');
            }
        }

        // === NAVIGATION ===
        function handleNavigation() {
            const navItems = document.querySelectorAll('.nav-item');
            const sections = document.querySelectorAll('.content-section');

            navItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    navItems.forEach(nav => nav.classList.remove('active'));
                    item.classList.add('active');
                    
                    const targetSection = item.getAttribute('data-section');
                    const section = document.getElementById(targetSection);
                    
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
        }

        // === ANIMATIONS ===
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

        // === BARRE DE PROGRESSION ===
        function updateProgressBar() {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const maxHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = (scrolled / maxHeight) * 100;
                
                document.getElementById('progressBar').style.width = progress + '%';
            });
        }

        // === NAVIGATION ACTIVE ===
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

        // === BOUTONS D'ACTION ===
        function showDataStructuresQuiz() {
            showNotification('🧠 Quiz interactif sur les structures de données en préparation !', 'info');
        }

        function downloadCheatSheet() {
            showNotification('📄 Téléchargement de l\'antisèche "Structures de Données" - PDF...', 'success');
        }

        function showComplexityAnalyzer() {
            showNotification('📊 Analyseur de complexité algorithmique bientôt disponible !', 'info');
        }

        function nextCourse() {
            showNotification('🚀 Prochaine leçon : "Bases de Données" - Redirection en cours...', 'info');
        }

        // === RACCOURCIS CLAVIER ===
        function handleKeyboardShortcuts() {
            document.addEventListener('keydown', (e) => {
                // Navigation avec flèches
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    if (document.activeElement.tagName !== 'INPUT' && 
                        document.activeElement.tagName !== 'TEXTAREA') {
                        e.preventDefault();
                        const currentActive = document.querySelector('.nav-item.active');
                        const nextItem = currentActive?.nextElementSibling;
                        if (nextItem && nextItem.classList.contains('nav-item')) {
                            nextItem.click();
                        }
                    }
                }
                
                if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    if (document.activeElement.tagName !== 'INPUT' && 
                        document.activeElement.tagName !== 'TEXTAREA') {
                        e.preventDefault();
                        const currentActive = document.querySelector('.nav-item.active');
                        const prevItem = currentActive?.previousElementSibling;
                        if (prevItem && prevItem.classList.contains('nav-item')) {
                            prevItem.click();
                        }
                    }
                }
                
                // Raccourcis pour les opérations
                if (e.key === 'Enter') {
                    const activeInput = document.activeElement;
                    if (activeInput.id === 'array-value') {
                        e.preventDefault();
                        addToArray();
                    } else if (activeInput.id === 'list-value') {
                        e.preventDefault();
                        addToListEnd();
                    } else if (activeInput.id === 'stack-value') {
                        e.preventDefault();
                        pushToStack();
                    } else if (activeInput.id === 'queue-value') {
                        e.preventDefault();
                        enqueue();
                    } else if (activeInput.id === 'tree-value') {
                        e.preventDefault();
                        insertInTree();
                    } else if (activeInput.id === 'hash-key' || activeInput.id === 'hash-value') {
                        e.preventDefault();
                        insertInHash();
                    }
                }
            });
        }

        // === INITIALISATION ===
        document.addEventListener('DOMContentLoaded', () => {
            animateOnScroll();
            handleNavigation();
            updateProgressBar();
            updateActiveNav();
            handleKeyboardShortcuts();
            
            // Initialiser les affichages
            updateArrayDisplay();
            updateListDisplay();
            updateStackDisplay();
            updateQueueDisplay();
            updateTreeDisplay();
            initHashTable();
            updateHashDisplay();
            
            // Message de bienvenue
            setTimeout(() => {
                showNotification('🚀 Bienvenue dans l\'univers des structures de données !', 'success');
            }, 1500);
            
            // Initialiser les tooltips sur les cartes concepts
            document.querySelectorAll('.concept-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0) scale(1)';
                });
            });
        });

        // === MODE DEBUG ===
        function debugMode() {
            console.log('=== MODE DEBUG STRUCTURES DE DONNÉES ===');
            console.log('Tableau actuel:', currentArray);
            console.log('Liste actuelle:', currentList);
            console.log('Pile actuelle:', currentStack);
            console.log('File actuelle:', currentQueue);
            console.log('Arbre actuel:', currentTree);
            console.log('Table de hachage actuelle:', currentHashTable);
            console.log('Capacité hash:', hashCapacity);
            console.log('Taille hash:', hashSize);
        }

        // Exposer debugMode globalement
        window.debugMode = debugMode;

        // === GESTION DES ERREURS ===
        window.addEventListener('error', (e) => {
            console.error('Erreur dans le simulateur:', e.error);
            showNotification('⚠️ Une erreur s\'est produite dans le simulateur', 'error');
        });
    </script>
</body>
</html>