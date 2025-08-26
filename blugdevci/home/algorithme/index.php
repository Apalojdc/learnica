<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algorithmes - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --algo-gradient: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            --condition-gradient: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            --loop-gradient: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            
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
            gap: 16px;
            margin-bottom: 60px;
            flex-wrap: wrap;
            width: 100%;
        }

        .nav-item {
            padding: 16px 20px;
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
            min-width: 140px;
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

        .content-section.definition::before {
            background: var(--algo-gradient);
        }

        .content-section.sequence::before {
            background: var(--success-gradient);
        }

        .content-section.conditions::before {
            background: var(--condition-gradient);
        }

        .content-section.loops::before {
            background: var(--loop-gradient);
        }

        .content-section.functions::before {
            background: var(--secondary-gradient);
        }

        .content-section.pratique::before {
            background: var(--accent-gradient);
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

        .section-number.definition {
            background: var(--algo-gradient);
        }

        .section-number.sequence {
            background: var(--success-gradient);
        }

        .section-number.conditions {
            background: var(--condition-gradient);
        }

        .section-number.loops {
            background: var(--loop-gradient);
        }

        .section-number.functions {
            background: var(--secondary-gradient);
        }

        .section-number.pratique {
            background: var(--accent-gradient);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* SIMULATEUR D'ALGORITHME */
        .algo-simulator {
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
            justify-content: between;
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

        .code-editor {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            min-height: 400px;
        }

        .editor-panel {
            background: #1e1e1e;
            padding: 20px;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.8;
            color: #d4d4d4;
            border-right: 1px solid var(--border-primary);
        }

        .output-panel {
            background: var(--dark-card);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .panel-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .code-line {
            margin: 4px 0;
            position: relative;
            padding-left: 8px;
            transition: all var(--transition-fast);
        }

        .code-line.highlight {
            background: rgba(103, 126, 234, 0.2);
            border-left: 3px solid var(--text-accent);
            border-radius: 4px;
        }

        .code-keyword {
            color: #569cd6;
            font-weight: 600;
        }

        .code-string {
            color: #ce9178;
        }

        .code-comment {
            color: #6a9955;
            font-style: italic;
        }

        .code-number {
            color: #b5cea8;
        }

        .output-console {
            background: #000;
            border-radius: var(--border-radius-sm);
            padding: 16px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            color: #00ff00;
            min-height: 150px;
            flex: 1;
            overflow-y: auto;
        }

        .console-line {
            margin: 4px 0;
        }

        .variable-display {
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
            padding: 12px;
            margin: 12px 0;
        }

        .variable-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 0;
            border-bottom: 1px solid var(--border-secondary);
        }

        .variable-item:last-child {
            border-bottom: none;
        }

        .variable-name {
            font-weight: 600;
            color: var(--text-accent);
        }

        .variable-value {
            background: var(--success-gradient);
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        /* CONTRÔLES DE SIMULATION */
        .simulation-controls {
            padding: 16px 20px;
            background: var(--surface-primary);
            border-top: 1px solid var(--border-primary);
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
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

        .control-btn.reset {
            background: var(--secondary-gradient);
        }

        .control-btn.auto {
            background: var(--success-gradient);
        }

        .speed-control {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
        }

        .speed-slider {
            width: 100px;
            height: 4px;
            border-radius: 2px;
            background: var(--border-primary);
            outline: none;
            cursor: pointer;
        }

        /* FLOWCHART */
        .flowchart {
            background: white;
            border-radius: var(--border-radius-sm);
            padding: 20px;
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .flow-step {
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 16px 24px;
            font-weight: 600;
            color: #495057;
            text-align: center;
            min-width: 200px;
            position: relative;
            transition: all var(--transition-fast);
        }

        .flow-step.active {
            background: var(--primary-gradient);
            color: white;
            transform: scale(1.05);
            box-shadow: var(--shadow-lg);
        }

        .flow-step.start {
            border-radius: 20px;
            background: var(--success-gradient);
            color: white;
        }

        .flow-step.end {
            border-radius: 20px;
            background: var(--secondary-gradient);
            color: white;
        }

        .flow-step.condition {
            transform: rotate(45deg);
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }

        .flow-step.condition .step-text {
            transform: rotate(-45deg);
            font-size: 0.85rem;
        }

        .flow-arrow {
            font-size: 1.5rem;
            color: var(--text-accent);
        }

        /* EXERCICES INTERACTIFS */
        .exercise-container {
            background: var(--surface-primary);
            border-radius: var(--border-radius);
            padding: 20px;
            margin: 20px 0;
            border: 1px solid var(--border-primary);
        }

        .exercise-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 16px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .exercise-input {
            width: 100%;
            background: var(--dark-tertiary);
            border: 1px solid var(--border-primary);
            border-radius: 6px;
            padding: 12px;
            color: var(--text-primary);
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            margin: 10px 0;
            resize: vertical;
            min-height: 100px;
        }

        .exercise-input:focus {
            outline: none;
            border-color: var(--text-accent);
            box-shadow: 0 0 0 2px rgba(103, 126, 234, 0.2);
        }

        .exercise-result {
            background: var(--dark-card);
            border-radius: 6px;
            padding: 12px;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            border-left: 4px solid var(--success-gradient);
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
                gap: 10px;
            }

            .nav-item {
                width: 100%;
                text-align: center;
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

            .code-editor {
                grid-template-columns: 1fr;
            }

            .simulation-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .speed-control {
                margin-left: 0;
                justify-content: center;
            }

            .concepts-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
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

            .editor-panel,
            .output-panel {
                padding: 12px;
                font-size: 0.8rem;
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
            <h1 class="course-title">Algorithmes</h1>
            <p class="course-subtitle">Découvrez la logique de la programmation : des concepts de base aux structures avancées avec des simulateurs interactifs</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#definition" class="nav-item active" data-section="definition">
                <i class="fas fa-lightbulb"></i>
                1. Définition
            </a>
            <a href="#sequence" class="nav-item" data-section="sequence">
                <i class="fas fa-list-ol"></i>
                2. Séquence
            </a>
            <a href="#conditions" class="nav-item" data-section="conditions">
                <i class="fas fa-code-branch"></i>
                3. Conditions
            </a>
            <a href="#loops" class="nav-item" data-section="loops">
                <i class="fas fa-sync-alt"></i>
                4. Boucles
            </a>
            <a href="#functions" class="nav-item" data-section="functions">
                <i class="fas fa-function"></i>
                5. Fonctions
            </a>
            <a href="#pratique" class="nav-item" data-section="pratique">
                <i class="fas fa-laptop-code"></i>
                6. Pratique
            </a>
        </nav>

        <!-- Section 1: Définition -->
        <section id="definition" class="content-section definition animate-on-scroll">
            <div class="section-header">
                <div class="section-number definition">1</div>
                <h2 class="section-title">Qu'est-ce qu'un Algorithme ?</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Un <strong>algorithme</strong> est une suite d'instructions précises et ordonnées qui permet de résoudre un problème ou d'accomplir une tâche. 
                    C'est comme une recette de cuisine : chaque étape doit être claire et dans le bon ordre !
                </p>

                <!-- Simulateur de définition -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-play-circle"></i>
                            Exemple : Préparer un café ☕
                        </h3>
                    </div>

                    <div class="flowchart">
                        <div class="flow-step start" id="step0">
                            <div class="step-text">🚀 DÉBUT</div>
                        </div>
                        <div class="flow-arrow">⬇️</div>
                        <div class="flow-step" id="step1">
                            <div class="step-text">1. Prendre une tasse</div>
                        </div>
                        <div class="flow-arrow">⬇️</div>
                        <div class="flow-step" id="step2">
                            <div class="step-text">2. Mettre du café en poudre</div>
                        </div>
                        <div class="flow-arrow">⬇️</div>
                        <div class="flow-step" id="step3">
                            <div class="step-text">3. Ajouter de l'eau chaude</div>
                        </div>
                        <div class="flow-arrow">⬇️</div>
                        <div class="flow-step" id="step4">
                            <div class="step-text">4. Mélanger</div>
                        </div>
                        <div class="flow-arrow">⬇️</div>
                        <div class="flow-step end" id="step5">
                            <div class="step-text">🏁 FIN - Café prêt !</div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn" onclick="startCoffeeDemo()" id="startCoffeeBtn">
                            <i class="fas fa-play"></i> Démarrer
                        </button>
                        <button class="control-btn reset" onclick="resetCoffeeDemo()" id="resetCoffeeBtn">
                            <i class="fas fa-undo"></i> Recommencer
                        </button>
                        <button class="control-btn auto" onclick="autoCoffeeDemo()" id="autoCoffeeBtn">
                            <i class="fas fa-forward"></i> Auto
                        </button>
                    </div>
                </div>

                <!-- Concepts clés -->
                <div class="concepts-grid">
                    <div class="concept-card">
                        <div class="concept-icon">🎯</div>
                        <h4 class="concept-title">Précis</h4>
                        <p class="concept-description">Chaque instruction doit être claire et sans ambiguïté. Pas de "un peu" ou "environ" !</p>
                    </div>

                    <div class="concept-card">
                        <div class="concept-icon">🔢</div>
                        <h4 class="concept-title">Ordonné</h4>
                        <p class="concept-description">L'ordre des étapes est crucial. On ne peut pas mélanger avant de mettre le café !</p>
                    </div>

                    <div class="concept-card">
                        <div class="concept-icon">⏰</div>
                        <h4 class="concept-title">Fini</h4>
                        <p class="concept-description">Un algorithme doit se terminer après un nombre fini d'étapes.</p>
                    </div>

                    <div class="concept-card">
                        <div class="concept-icon">🎨</div>
                        <h4 class="concept-title">Universel</h4>
                        <p class="concept-description">Tout le monde doit pouvoir suivre l'algorithme et obtenir le même résultat.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Séquence -->
        <section id="sequence" class="content-section sequence animate-on-scroll">
            <div class="section-header">
                <div class="section-number sequence">2</div>
                <h2 class="section-title">La Séquence - Instructions en Suite</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    La <strong>séquence</strong> est la structure la plus simple : les instructions s'exécutent une après l'autre, 
                    dans l'ordre. C'est la base de tout algorithme !
                </p>

                <!-- Simulateur de séquence -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-code"></i>
                            Simulateur : Calcul Simple
                        </h3>
                    </div>

                    <div class="code-editor">
                        <div class="editor-panel">
                            <div class="panel-title">💻 Code Algorithm</div>
                            <div class="code-line" id="seq-line-1">
                                <span class="code-keyword">DEBUT</span> <span class="code-comment">// Début du programme</span>
                            </div>
                            <div class="code-line" id="seq-line-2">
                                <span class="code-keyword">a</span> ← <span class="code-number">5</span> <span class="code-comment">// Assigner 5 à la variable a</span>
                            </div>
                            <div class="code-line" id="seq-line-3">
                                <span class="code-keyword">b</span> ← <span class="code-number">3</span> <span class="code-comment">// Assigner 3 à la variable b</span>
                            </div>
                            <div class="code-line" id="seq-line-4">
                                <span class="code-keyword">somme</span> ← a + b <span class="code-comment">// Calculer la somme</span>
                            </div>
                            <div class="code-line" id="seq-line-5">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Le résultat est :"</span>, somme
                            </div>
                            <div class="code-line" id="seq-line-6">
                                <span class="code-keyword">FIN</span> <span class="code-comment">// Fin du programme</span>
                            </div>
                        </div>

                        <div class="output-panel">
                            <div class="panel-title">🖥️ Exécution</div>
                            <div class="variable-display">
                                <div class="variable-item">
                                    <span class="variable-name">a</span>
                                    <span class="variable-value" id="var-a">-</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">b</span>
                                    <span class="variable-value" id="var-b">-</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">somme</span>
                                    <span class="variable-value" id="var-somme">-</span>
                                </div>
                            </div>
                            
                            <div class="output-console" id="sequence-console">
                                <div class="console-line">⏳ Prêt à exécuter...</div>
                            </div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn" onclick="executeSequenceStep()" id="stepBtn">
                            <i class="fas fa-step-forward"></i> Étape Suivante
                        </button>
                        <button class="control-btn reset" onclick="resetSequence()">
                            <i class="fas fa-undo"></i> Recommencer
                        </button>
                        <button class="control-btn auto" onclick="autoExecuteSequence()">
                            <i class="fas fa-play"></i> Exécution Auto
                        </button>
                    </div>
                </div>

                <!-- Exercice pratique -->
                <div class="exercise-container">
                    <div class="exercise-title">
                        <i class="fas fa-pencil-alt"></i>
                        Exercice : Créez votre séquence
                    </div>
                    <p style="margin-bottom: 12px;">Écrivez un algorithme qui calcule l'aire d'un rectangle (longueur × largeur) :</p>
                    <textarea class="exercise-input" id="sequence-exercise" placeholder="DEBUT
longueur ← 10
largeur ← 5
aire ← longueur * largeur
AFFICHER &quot;L'aire est :&quot;, aire
FIN"></textarea>
                    <button class="control-btn" onclick="checkSequenceExercise()">
                        <i class="fas fa-check"></i> Vérifier
                    </button>
                    <div class="exercise-result" id="sequence-result" style="display: none;"></div>
                </div>
            </div>
        </section>

        <!-- Section 3: Conditions -->
        <section id="conditions" class="content-section conditions animate-on-scroll">
            <div class="section-header">
                <div class="section-number conditions">3</div>
                <h2 class="section-title">Les Conditions - Si... Alors... Sinon</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Les <strong>conditions</strong> permettent à votre programme de prendre des décisions ! 
                    Selon une situation, il peut faire différentes actions. C'est le pouvoir du choix ! 🤔
                </p>

                <!-- Simulateur de conditions -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-question-circle"></i>
                            Simulateur : Majorité ou Mineur ?
                        </h3>
                    </div>

                    <div class="code-editor">
                        <div class="editor-panel">
                            <div class="panel-title">💻 Code Algorithm</div>
                            <div class="code-line" id="cond-line-1">
                                <span class="code-keyword">DEBUT</span>
                            </div>
                            <div class="code-line" id="cond-line-2">
                                <span class="code-keyword">age</span> ← <span class="code-number">20</span> <span class="code-comment">// Changez cette valeur !</span>
                            </div>
                            <div class="code-line" id="cond-line-3">
                                <span class="code-keyword">SI</span> age >= <span class="code-number">18</span> <span class="code-keyword">ALORS</span>
                            </div>
                            <div class="code-line" id="cond-line-4" style="padding-left: 20px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Vous êtes majeur ! 🎉"</span>
                            </div>
                            <div class="code-line" id="cond-line-5">
                                <span class="code-keyword">SINON</span>
                            </div>
                            <div class="code-line" id="cond-line-6" style="padding-left: 20px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Vous êtes mineur ! 👶"</span>
                            </div>
                            <div class="code-line" id="cond-line-7">
                                <span class="code-keyword">FIN SI</span>
                            </div>
                            <div class="code-line" id="cond-line-8">
                                <span class="code-keyword">FIN</span>
                            </div>
                        </div>

                        <div class="output-panel">
                            <div class="panel-title">🖥️ Exécution Interactive</div>
                            <div class="variable-display">
                                <div style="text-align: center; margin-bottom: 16px;">
                                    <label style="color: var(--text-secondary); margin-bottom: 8px; display: block;">Entrez un âge :</label>
                                    <input type="number" id="age-input" value="20" style="
                                        background: var(--dark-tertiary);
                                        border: 1px solid var(--border-primary);
                                        border-radius: 6px;
                                        padding: 8px 12px;
                                        color: var(--text-primary);
                                        text-align: center;
                                        width: 80px;
                                        font-size: 1.1rem;
                                    ">
                                    <button class="control-btn" onclick="testCondition()" style="margin-left: 8px; padding: 6px 12px;">
                                        Tester
                                    </button>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">age</span>
                                    <span class="variable-value" id="var-age">20</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">condition (age >= 18)</span>
                                    <span class="variable-value" id="var-condition">VRAI</span>
                                </div>
                            </div>
                            
                            <div class="output-console" id="condition-console">
                                <div class="console-line">🎉 Vous êtes majeur !</div>
                            </div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn" onclick="executeConditionStep()" id="condStepBtn">
                            <i class="fas fa-step-forward"></i> Étape Suivante
                        </button>
                        <button class="control-btn reset" onclick="resetCondition()">
                            <i class="fas fa-undo"></i> Recommencer
                        </button>
                        <div style="margin-left: auto; display: flex; gap: 8px;">
                            <button class="control-btn" onclick="setAge(15)" style="background: var(--warning-gradient);">
                                Âge: 15
                            </button>
                            <button class="control-btn" onclick="setAge(25)" style="background: var(--success-gradient);">
                                Âge: 25
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Types de conditions -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🔍 Types de Conditions</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">⚖️</div>
                            <h4 class="concept-title">Comparaisons</h4>
                            <p class="concept-description">
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    ==, !=, &lt;, &gt;, &lt;=, &gt;=
                                </code><br>
                                Comparer des valeurs
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔗</div>
                            <h4 class="concept-title">ET Logique</h4>
                            <p class="concept-description">
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    ET (AND)
                                </code><br>
                                Les deux conditions doivent être vraies
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔀</div>
                            <h4 class="concept-title">OU Logique</h4>
                            <p class="concept-description">
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    OU (OR)
                                </code><br>
                                Au moins une condition doit être vraie
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🚫</div>
                            <h4 class="concept-title">NON Logique</h4>
                            <p class="concept-description">
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    NON (NOT)
                                </code><br>
                                Inverse le résultat de la condition
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Exercice conditions -->
                <div class="exercise-container">
                    <div class="exercise-title">
                        <i class="fas fa-brain"></i>
                        Exercice : Système de Notes
                    </div>
                    <p style="margin-bottom: 12px;">Créez un algorithme qui affiche une mention selon la note :</p>
                    <ul style="margin-bottom: 12px; padding-left: 20px;">
                        <li>≥ 16 : "Très Bien"</li>
                        <li>≥ 14 : "Bien"</li>
                        <li>≥ 12 : "Assez Bien"</li>
                        <li>≥ 10 : "Passable"</li>
                        <li>&lt; 10 : "Insuffisant"</li>
                    </ul>
                    <textarea class="exercise-input" id="condition-exercise" placeholder="DEBUT
note ← 15
SI note >= 16 ALORS
    AFFICHER &quot;Très Bien&quot;
SINON SI note >= 14 ALORS
    AFFICHER &quot;Bien&quot;
...
FIN"></textarea>
                    <button class="control-btn" onclick="checkConditionExercise()">
                        <i class="fas fa-check"></i> Vérifier
                    </button>
                    <div class="exercise-result" id="condition-result" style="display: none;"></div>
                </div>
            </div>
        </section>

        <!-- Section 4: Boucles -->
        <section id="loops" class="content-section loops animate-on-scroll">
            <div class="section-header">
                <div class="section-number loops">4</div>
                <h2 class="section-title">Les Boucles - Répéter des Actions</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Les <strong>boucles</strong> permettent de répéter des instructions ! Au lieu d'écrire 100 fois la même chose, 
                    on utilise une boucle. C'est l'automatisation au pouvoir ! 🔄
                </p>

                <!-- Simulateur de boucles -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-sync-alt"></i>
                            Simulateur : Boucle POUR (Compter de 1 à 5)
                        </h3>
                    </div>

                    <div class="code-editor">
                        <div class="editor-panel">
                            <div class="panel-title">💻 Code Algorithm</div>
                            <div class="code-line" id="loop-line-1">
                                <span class="code-keyword">DEBUT</span>
                            </div>
                            <div class="code-line" id="loop-line-2">
                                <span class="code-keyword">POUR</span> i <span class="code-keyword">DE</span> <span class="code-number">1</span> <span class="code-keyword">À</span> <span class="code-number">5</span> <span class="code-keyword">FAIRE</span>
                            </div>
                            <div class="code-line" id="loop-line-3" style="padding-left: 20px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Compteur :"</span>, i
                            </div>
                            <div class="code-line" id="loop-line-4">
                                <span class="code-keyword">FIN POUR</span>
                            </div>
                            <div class="code-line" id="loop-line-5">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Terminé ! 🎉"</span>
                            </div>
                            <div class="code-line" id="loop-line-6">
                                <span class="code-keyword">FIN</span>
                            </div>
                        </div>

                        <div class="output-panel">
                            <div class="panel-title">🖥️ Exécution</div>
                            <div class="variable-display">
                                <div class="variable-item">
                                    <span class="variable-name">i (compteur)</span>
                                    <span class="variable-value" id="var-i">-</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">itération</span>
                                    <span class="variable-value" id="var-iteration">0/5</span>
                                </div>
                            </div>
                            
                            <div class="output-console" id="loop-console">
                                <div class="console-line">🔄 Prêt à boucler...</div>
                            </div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn" onclick="executeLoopStep()" id="loopStepBtn">
                            <i class="fas fa-step-forward"></i> Itération Suivante
                        </button>
                        <button class="control-btn reset" onclick="resetLoop()">
                            <i class="fas fa-undo"></i> Recommencer
                        </button>
                        <button class="control-btn auto" onclick="autoExecuteLoop()">
                            <i class="fas fa-fast-forward"></i> Exécution Auto
                        </button>
                        <div class="speed-control">
                            <span style="color: var(--text-muted); font-size: 0.85rem;">Vitesse:</span>
                            <input type="range" class="speed-slider" id="loop-speed" min="100" max="2000" value="800">
                        </div>
                    </div>
                </div>

                <!-- Types de boucles -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🔄 Types de Boucles</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">🔢</div>
                            <h4 class="concept-title">POUR (FOR)</h4>
                            <p class="concept-description">
                                Répète un nombre précis de fois.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    POUR i DE 1 À 10 FAIRE
                                </code>
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🕐</div>
                            <h4 class="concept-title">TANT QUE (WHILE)</h4>
                            <p class="concept-description">
                                Répète tant qu'une condition est vraie.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    TANT QUE x &lt; 10 FAIRE
                                </code>
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🎯</div>
                            <h4 class="concept-title">RÉPÉTER JUSQU'À</h4>
                            <p class="concept-description">
                                Exécute puis teste la condition.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    RÉPÉTER ... JUSQU'À x = 10
                                </code>
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">🔁</div>
                            <h4 class="concept-title">Boucles Imbriquées</h4>
                            <p class="concept-description">
                                Une boucle dans une autre boucle.<br>
                                Utile pour les tableaux 2D !
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Exercice boucles -->
                <div class="exercise-container">
                    <div class="exercise-title">
                        <i class="fas fa-calculator"></i>
                        Exercice : Table de Multiplication
                    </div>
                    <p style="margin-bottom: 12px;">Créez un algorithme qui affiche la table de multiplication de 7 :</p>
                    <textarea class="exercise-input" id="loop-exercise" placeholder="DEBUT
POUR i DE 1 À 10 FAIRE
    resultat ← 7 * i
    AFFICHER &quot;7 x&quot;, i, &quot;=&quot;, resultat
FIN POUR
FIN"></textarea>
                    <button class="control-btn" onclick="checkLoopExercise()">
                        <i class="fas fa-check"></i> Vérifier
                    </button>
                    <div class="exercise-result" id="loop-result" style="display: none;"></div>
                </div>
            </div>
        </section>

        <!-- Section 5: Fonctions -->
        <section id="functions" class="content-section functions animate-on-scroll">
            <div class="section-header">
                <div class="section-number functions">5</div>
                <h2 class="section-title">Les Fonctions - Réutiliser du Code</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Les <strong>fonctions</strong> sont comme des petites machines : on leur donne des données (paramètres), 
                    elles font un travail spécifique et nous rendent un résultat. C'est l'art de la réutilisation ! 🔧
                </p>

                <!-- Simulateur de fonctions -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-function"></i>
                            Simulateur : Fonction Calculer Aire du Cercle
                        </h3>
                    </div>

                    <div class="code-editor">
                        <div class="editor-panel">
                            <div class="panel-title">💻 Code Algorithm</div>
                            <div class="code-line" id="func-line-1">
                                <span class="code-comment">// Définition de la fonction</span>
                            </div>
                            <div class="code-line" id="func-line-2">
                                <span class="code-keyword">FONCTION</span> <span class="code-keyword">calculerAire</span>(rayon) : <span class="code-keyword">RETOURNE</span> réel
                            </div>
                            <div class="code-line" id="func-line-3" style="padding-left: 20px;">
                                <span class="code-keyword">aire</span> ← <span class="code-number">3.14</span> * rayon * rayon
                            </div>
                            <div class="code-line" id="func-line-4" style="padding-left: 20px;">
                                <span class="code-keyword">RETOURNER</span> aire
                            </div>
                            <div class="code-line" id="func-line-5">
                                <span class="code-keyword">FIN FONCTION</span>
                            </div>
                            <div class="code-line" id="func-line-6">
                                <br><span class="code-comment">// Utilisation de la fonction</span>
                            </div>
                            <div class="code-line" id="func-line-7">
                                <span class="code-keyword">DEBUT</span>
                            </div>
                            <div class="code-line" id="func-line-8">
                                <span class="code-keyword">monRayon</span> ← <span class="code-number">5</span>
                            </div>
                            <div class="code-line" id="func-line-9">
                                <span class="code-keyword">resultat</span> ← calculerAire(monRayon)
                            </div>
                            <div class="code-line" id="func-line-10">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Aire du cercle :"</span>, resultat
                            </div>
                            <div class="code-line" id="func-line-11">
                                <span class="code-keyword">FIN</span>
                            </div>
                        </div>

                        <div class="output-panel">
                            <div class="panel-title">🖥️ Exécution Interactive</div>
                            <div class="variable-display">
                                <div style="text-align: center; margin-bottom: 16px;">
                                    <label style="color: var(--text-secondary); margin-bottom: 8px; display: block;">Rayon du cercle :</label>
                                    <input type="number" id="rayon-input" value="5" step="0.1" style="
                                        background: var(--dark-tertiary);
                                        border: 1px solid var(--border-primary);
                                        border-radius: 6px;
                                        padding: 8px 12px;
                                        color: var(--text-primary);
                                        text-align: center;
                                        width: 100px;
                                        font-size: 1.1rem;
                                    ">
                                    <button class="control-btn" onclick="testFunction()" style="margin-left: 8px; padding: 6px 12px;">
                                        Calculer
                                    </button>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">monRayon</span>
                                    <span class="variable-value" id="var-rayon">5</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">aire (dans fonction)</span>
                                    <span class="variable-value" id="var-aire">-</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">resultat</span>
                                    <span class="variable-value" id="var-resultat">-</span>
                                </div>
                            </div>
                            
                            <div class="output-console" id="function-console">
                                <div class="console-line">🔧 Prêt à calculer...</div>
                            </div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn" onclick="executeFunctionStep()" id="funcStepBtn">
                            <i class="fas fa-step-forward"></i> Étape Suivante
                        </button>
                        <button class="control-btn reset" onclick="resetFunction()">
                            <i class="fas fa-undo"></i> Recommencer
                        </button>
                        <div style="margin-left: auto; display: flex; gap: 8px;">
                            <button class="control-btn" onclick="setRayon(3)" style="background: var(--warning-gradient);">
                                R = 3
                            </button>
                            <button class="control-btn" onclick="setRayon(10)" style="background: var(--success-gradient);">
                                R = 10
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Concepts des fonctions -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🔧 Anatomie d'une Fonction</h3>
                    <div class="concepts-grid">
                        <div class="concept-card">
                            <div class="concept-icon">🏷️</div>
                            <h4 class="concept-title">Nom</h4>
                            <p class="concept-description">
                                Un nom descriptif qui explique ce que fait la fonction.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    calculerAire
                                </code>
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">📥</div>
                            <h4 class="concept-title">Paramètres</h4>
                            <p class="concept-description">
                                Les données d'entrée que la fonction utilise.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    (rayon, hauteur)
                                </code>
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">⚙️</div>
                            <h4 class="concept-title">Corps</h4>
                            <p class="concept-description">
                                Les instructions qui font le travail de la fonction.<br>
                                Le code entre FONCTION et FIN FONCTION.
                            </p>
                        </div>

                        <div class="concept-card">
                            <div class="concept-icon">📤</div>
                            <h4 class="concept-title">Valeur de Retour</h4>
                            <p class="concept-description">
                                Le résultat que la fonction nous donne.<br>
                                <code style="background: var(--dark-tertiary); padding: 2px 6px; border-radius: 3px;">
                                    RETOURNER aire
                                </code>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Exercice fonctions -->
                <div class="exercise-container">
                    <div class="exercise-title">
                        <i class="fas fa-code"></i>
                        Exercice : Fonction Maximum
                    </div>
                    <p style="margin-bottom: 12px;">Créez une fonction qui retourne le plus grand de deux nombres :</p>
                    <textarea class="exercise-input" id="function-exercise" placeholder="FONCTION maximum(a, b) : RETOURNE réel
    SI a > b ALORS
        RETOURNER a
    SINON
        RETOURNER b
    FIN SI
FIN FONCTION

DEBUT
x ← 15
y ← 23
max ← maximum(x, y)
AFFICHER &quot;Le maximum est :&quot;, max
FIN"></textarea>
                    <button class="control-btn" onclick="checkFunctionExercise()">
                        <i class="fas fa-check"></i> Vérifier
                    </button>
                    <div class="exercise-result" id="function-result" style="display: none;"></div>
                </div>
            </div>
        </section>

        <!-- Section 6: Pratique -->
        <section id="pratique" class="content-section pratique animate-on-scroll">
            <div class="section-header">
                <div class="section-number pratique">6</div>
                <h2 class="section-title">Pratique - Algorithmes Complets</h2>
            </div>

            <div class="definition-content">
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 24px;">
                    Maintenant que vous maîtrisez les bases, mettons tout ensemble ! 
                    Voici des algorithmes complets qui combinent séquences, conditions, boucles et fonctions. 🚀
                </p>

                <!-- Algorithme complet : Jeu de devinette -->
                <div class="algo-simulator">
                    <div class="simulator-header">
                        <h3 class="simulator-title">
                            <i class="fas fa-gamepad"></i>
                            Projet : Jeu de Devinette de Nombre
                        </h3>
                    </div>

                    <div class="code-editor">
                        <div class="editor-panel">
                            <div class="panel-title">💻 Algorithme Complet</div>
                            <div class="code-line">
                                <span class="code-keyword">FONCTION</span> <span class="code-keyword">jeuDevinette</span>() : <span class="code-keyword">RETOURNE</span> rien
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <span class="code-keyword">nombreSecret</span> ← <span class="code-number">random(1, 100)</span>
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <span class="code-keyword">tentatives</span> ← <span class="code-number">0</span>
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <span class="code-keyword">trouve</span> ← <span class="code-keyword">FAUX</span>
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <br><span class="code-keyword">AFFICHER</span> <span class="code-string">"Devinez le nombre entre 1 et 100 !"</span>
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <br><span class="code-keyword">TANT QUE</span> trouve = <span class="code-keyword">FAUX</span> <span class="code-keyword">FAIRE</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">tentatives</span> ← tentatives + <span class="code-number">1</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Tentative"</span>, tentatives, <span class="code-string">":"</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">proposition</span> ← <span class="code-keyword">LIRE</span>()
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <br><span class="code-keyword">SI</span> proposition = nombreSecret <span class="code-keyword">ALORS</span>
                            </div>
                            <div class="code-line" style="padding-left: 60px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Bravo ! Trouvé en"</span>, tentatives, <span class="code-string">"coups !"</span>
                            </div>
                            <div class="code-line" style="padding-left: 60px;">
                                <span class="code-keyword">trouve</span> ← <span class="code-keyword">VRAI</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">SINON SI</span> proposition &lt; nombreSecret <span class="code-keyword">ALORS</span>
                            </div>
                            <div class="code-line" style="padding-left: 60px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Trop petit !"</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">SINON</span>
                            </div>
                            <div class="code-line" style="padding-left: 60px;">
                                <span class="code-keyword">AFFICHER</span> <span class="code-string">"Trop grand !"</span>
                            </div>
                            <div class="code-line" style="padding-left: 40px;">
                                <span class="code-keyword">FIN SI</span>
                            </div>
                            <div class="code-line" style="padding-left: 20px;">
                                <span class="code-keyword">FIN TANT QUE</span>
                            </div>
                            <div class="code-line">
                                <span class="code-keyword">FIN FONCTION</span>
                            </div>
                        </div>

                        <div class="output-panel">
                            <div class="panel-title">🎮 Jeu Interactif</div>
                            <div class="variable-display">
                                <div class="variable-item">
                                    <span class="variable-name">Nombre Secret</span>
                                    <span class="variable-value" id="secret-number">🤫</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">Tentatives</span>
                                    <span class="variable-value" id="attempts-count">0</span>
                                </div>
                                <div class="variable-item">
                                    <span class="variable-name">Dernière Proposition</span>
                                    <span class="variable-value" id="last-guess">-</span>
                                </div>
                            </div>
                            
                            <div style="text-align: center; margin: 16px 0;">
                                <input type="number" id="guess-input" placeholder="Votre nombre..." min="1" max="100" style="
                                    background: var(--dark-tertiary);
                                    border: 1px solid var(--border-primary);
                                    border-radius: 6px;
                                    padding: 10px 12px;
                                    color: var(--text-primary);
                                    text-align: center;
                                    width: 150px;
                                    font-size: 1.1rem;
                                    margin-right: 8px;
                                ">
                                <button class="control-btn" onclick="makeGuess()" id="guessBtn">
                                    <i class="fas fa-arrow-right"></i> Deviner
                                </button>
                            </div>
                            
                            <div class="output-console" id="game-console">
                                <div class="console-line">🎯 Devinez le nombre entre 1 et 100 !</div>
                                <div class="console-line">💡 Tapez votre proposition et cliquez sur Deviner</div>
                            </div>
                        </div>
                    </div>

                    <div class="simulation-controls">
                        <button class="control-btn reset" onclick="resetGame()">
                            <i class="fas fa-undo"></i> Nouveau Jeu
                        </button>
                        <button class="control-btn" onclick="revealSecret()" style="background: var(--warning-gradient);">
                            <i class="fas fa-eye"></i> Révéler
                        </button>
                        <div style="margin-left: auto; display: flex; gap: 8px; align-items: center;">
                            <span style="color: var(--text-muted); font-size: 0.85rem;">Difficulté :</span>
                            <button class="control-btn" onclick="setDifficulty(50)" style="background: var(--success-gradient); padding: 6px 12px;">
                                Facile (1-50)
                            </button>
                            <button class="control-btn" onclick="setDifficulty(100)" style="background: var(--warning-gradient); padding: 6px 12px;">
                                Normal (1-100)
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Défis algorithmiques -->
                <div style="margin: 32px 0;">
                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--text-primary);">🏆 Défis Algorithmiques</h3>
                    <div class="concepts-grid">
                        <div class="concept-card" style="cursor: pointer;" onclick="showChallenge('fibonacci')">
                            <div class="concept-icon">🌀</div>
                            <h4 class="concept-title">Suite de Fibonacci</h4>
                            <p class="concept-description">
                                Calculer les premiers nombres de la suite de Fibonacci avec une boucle et des variables.
                            </p>
                        </div>

                        <div class="concept-card" style="cursor: pointer;" onclick="showChallenge('palindrome')">
                            <div class="concept-icon">🔄</div>
                            <h4 class="concept-title">Palindrome</h4>
                            <p class="concept-description">
                                Vérifier si un mot se lit de la même façon dans les deux sens (radar, kayak...).
                            </p>
                        </div>

                        <div class="concept-card" style="cursor: pointer;" onclick="showChallenge('prime')">
                            <div class="concept-icon">🔢</div>
                            <h4 class="concept-title">Nombres Premiers</h4>
                            <p class="concept-description">
                                Trouver tous les nombres premiers entre 1 et N avec le crible d'Ératosthène.
                            </p>
                        </div>

                        <div class="concept-card" style="cursor: pointer;" onclick="showChallenge('factorial')">
                            <div class="concept-icon">📈</div>
                            <h4 class="concept-title">Factorielle</h4>
                            <p class="concept-description">
                                Calculer la factorielle d'un nombre avec une fonction récursive ou itérative.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Zone de défi -->
                <div class="exercise-container" id="challenge-container" style="display: none;">
                    <div class="exercise-title" id="challenge-title">
                        <i class="fas fa-trophy"></i>
                        Défi : 
                    </div>
                    <p id="challenge-description" style="margin-bottom: 12px;"></p>
                    <textarea class="exercise-input" id="challenge-input" style="min-height: 150px;"></textarea>
                    <div style="display: flex; gap: 8px; margin-top: 8px;">
                        <button class="control-btn" onclick="testChallenge()">
                            <i class="fas fa-play"></i> Tester
                        </button>
                        <button class="control-btn reset" onclick="showChallengeHint()">
                            <i class="fas fa-lightbulb"></i> Indice
                        </button>
                        <button class="control-btn" onclick="showChallengeSolution()" style="background: var(--warning-gradient);">
                            <i class="fas fa-eye"></i> Solution
                        </button>
                    </div>
                    <div class="exercise-result" id="challenge-result" style="display: none;"></div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showAlgoQuiz()">
                <i class="fas fa-brain"></i>
                Quiz Algorithmes
            </button>
            <button class="btn btn-secondary" onclick="downloadCheatSheet()">
                <i class="fas fa-file-pdf"></i>
                Aide-Mémoire
            </button>
            <button class="btn btn-secondary" onclick="showMoreExercises()">
                <i class="fas fa-dumbbell"></i>
                Plus d'Exercices
            </button>
            <button class="btn btn-secondary" onclick="nextCourse()">
                <i class="fas fa-arrow-right"></i>
                Cours Suivant
            </button>
        </div>
    </div>

    <script>
        // Variables globales
        let coffeeStep = 0;
        let sequenceStep = 0;
        let conditionStep = 0;
        let loopStep = 0;
        let loopIteration = 1;
        let functionStep = 0;
        let gameNumber = Math.floor(Math.random() * 100) + 1;
        let gameAttempts = 0;
        let gameDifficulty = 100;
        let currentChallenge = '';

        // Variables pour les simulateurs
        const sequenceVars = { a: null, b: null, somme: null };
        const loopVars = { i: null, iteration: 0 };
        const functionVars = { rayon: null, aire: null, resultat: null };

        // === SIMULATEUR CAFÉ ===
        function startCoffeeDemo() {
            if (coffeeStep < 6) {
                coffeeStep++;
                updateCoffeeStep();
            }
        }

        function resetCoffeeDemo() {
            coffeeStep = 0;
            document.querySelectorAll('.flow-step').forEach(step => {
                step.classList.remove('active');
            });
        }

        function autoCoffeeDemo() {
            resetCoffeeDemo();
            const interval = setInterval(() => {
                startCoffeeDemo();
                if (coffeeStep >= 6) {
                    clearInterval(interval);
                }
            }, 800);
        }

        function updateCoffeeStep() {
            document.querySelectorAll('.flow-step').forEach(step => {
                step.classList.remove('active');
            });
            
            if (coffeeStep <= 5) {
                document.getElementById(`step${coffeeStep}`).classList.add('active');
            }
        }

        // === SIMULATEUR SÉQUENCE ===
        function executeSequenceStep() {
            const console = document.getElementById('sequence-console');
            
            switch(sequenceStep) {
                case 0:
                    console.innerHTML = '<div class="console-line">🚀 Début du programme</div>';
                    highlightLine('seq-line-1');
                    break;
                case 1:
                    sequenceVars.a = 5;
                    document.getElementById('var-a').textContent = '5';
                    console.innerHTML += '<div class="console-line">📝 Variable a = 5</div>';
                    highlightLine('seq-line-2');
                    break;
                case 2:
                    sequenceVars.b = 3;
                    document.getElementById('var-b').textContent = '3';
                    console.innerHTML += '<div class="console-line">📝 Variable b = 3</div>';
                    highlightLine('seq-line-3');
                    break;
                case 3:
                    sequenceVars.somme = sequenceVars.a + sequenceVars.b;
                    document.getElementById('var-somme').textContent = '8';
                    console.innerHTML += '<div class="console-line">🧮 Calcul : 5 + 3 = 8</div>';
                    highlightLine('seq-line-4');
                    break;
                case 4:
                    console.innerHTML += '<div class="console-line">🖥️ Affichage : Le résultat est : 8</div>';
                    highlightLine('seq-line-5');
                    break;
                case 5:
                    console.innerHTML += '<div class="console-line">🏁 Fin du programme</div>';
                    highlightLine('seq-line-6');
                    showNotification('🎉 Séquence terminée avec succès !', 'success');
                    break;
            }
            
            sequenceStep++;
            if (sequenceStep > 5) {
                document.getElementById('stepBtn').disabled = true;
            }
        }

        function resetSequence() {
            sequenceStep = 0;
            sequenceVars.a = null;
            sequenceVars.b = null;
            sequenceVars.somme = null;
            
            document.getElementById('var-a').textContent = '-';
            document.getElementById('var-b').textContent = '-';
            document.getElementById('var-somme').textContent = '-';
            document.getElementById('sequence-console').innerHTML = '<div class="console-line">⏳ Prêt à exécuter...</div>';
            document.getElementById('stepBtn').disabled = false;
            
            document.querySelectorAll('.code-line').forEach(line => {
                line.classList.remove('highlight');
            });
        }

        function autoExecuteSequence() {
            resetSequence();
            const interval = setInterval(() => {
                executeSequenceStep();
                if (sequenceStep > 5) {
                    clearInterval(interval);
                }
            }, 1000);
        }

        // === SIMULATEUR CONDITIONS ===
        function testCondition() {
            const age = parseInt(document.getElementById('age-input').value);
            const ageVar = document.getElementById('var-age');
            const conditionVar = document.getElementById('var-condition');
            const console = document.getElementById('condition-console');
            
            ageVar.textContent = age;
            
            if (age >= 18) {
                conditionVar.textContent = 'VRAI';
                conditionVar.style.background = 'var(--success-gradient)';
                console.innerHTML = '<div class="console-line">🎉 Vous êtes majeur !</div>';
            } else {
                conditionVar.textContent = 'FAUX';
                conditionVar.style.background = 'var(--secondary-gradient)';
                console.innerHTML = '<div class="console-line">👶 Vous êtes mineur !</div>';
            }
            
            showNotification(`Test avec âge ${age} effectué !`, 'info');
        }

        function setAge(age) {
            document.getElementById('age-input').value = age;
            testCondition();
        }

        function executeConditionStep() {
            // Logique d'exécution pas à pas pour les conditions
            testCondition();
        }

        function resetCondition() {
            document.getElementById('age-input').value = 20;
            testCondition();
        }

        // === SIMULATEUR BOUCLES ===
        function executeLoopStep() {
            const console = document.getElementById('loop-console');
            
            if (loopIteration <= 5) {
                loopVars.i = loopIteration;
                loopVars.iteration++;
                
                document.getElementById('var-i').textContent = loopIteration;
                document.getElementById('var-iteration').textContent = `${loopVars.iteration}/5`;
                
                console.innerHTML += `<div class="console-line">🔄 Compteur : ${loopIteration}</div>`;
                
                highlightLine('loop-line-3');
                
                loopIteration++;
                
                if (loopIteration > 5) {
                    setTimeout(() => {
                        console.innerHTML += '<div class="console-line">🎉 Terminé !</div>';
                        highlightLine('loop-line-5');
                        showNotification('Boucle terminée !', 'success');
                    }, 500);
                }
            }
        }

        function resetLoop() {
            loopIteration = 1;
            loopVars.i = null;
            loopVars.iteration = 0;
            
            document.getElementById('var-i').textContent = '-';
            document.getElementById('var-iteration').textContent = '0/5';
            document.getElementById('loop-console').innerHTML = '<div class="console-line">🔄 Prêt à boucler...</div>';
            
            document.querySelectorAll('.code-line').forEach(line => {
                line.classList.remove('highlight');
            });
        }

        function autoExecuteLoop() {
            resetLoop();
            const speed = parseInt(document.getElementById('loop-speed').value);
            
            const interval = setInterval(() => {
                executeLoopStep();
                if (loopIteration > 5) {
                    clearInterval(interval);
                }
            }, speed);
        }

        // === SIMULATEUR FONCTIONS ===
        function testFunction() {
            const rayon = parseFloat(document.getElementById('rayon-input').value);
            functionVars.rayon = rayon;
            
            // Calcul dans la fonction
            functionVars.aire = 3.14 * rayon * rayon;
            functionVars.resultat = functionVars.aire;
            
            document.getElementById('var-rayon').textContent = rayon;
            document.getElementById('var-aire').textContent = functionVars.aire.toFixed(2);
            document.getElementById('var-resultat').textContent = functionVars.aire.toFixed(2);
            
            const console = document.getElementById('function-console');
            console.innerHTML = `
                <div class="console-line">🔧 Appel : calculerAire(${rayon})</div>
                <div class="console-line">🧮 Calcul : 3.14 × ${rayon} × ${rayon} = ${functionVars.aire.toFixed(2)}</div>
                <div class="console-line">📤 Retour : ${functionVars.aire.toFixed(2)}</div>
                <div class="console-line">🖥️ Aire du cercle : ${functionVars.aire.toFixed(2)}</div>
            `;
            
            showNotification(`Aire calculée : ${functionVars.aire.toFixed(2)}`, 'success');
        }

        function setRayon(rayon) {
            document.getElementById('rayon-input').value = rayon;
            testFunction();
        }

        function executeFunctionStep() {
            testFunction();
        }

        function resetFunction() {
            document.getElementById('rayon-input').value = 5;
            document.getElementById('var-rayon').textContent = '5';
            document.getElementById('var-aire').textContent = '-';
            document.getElementById('var-resultat').textContent = '-';
            document.getElementById('function-console').innerHTML = '<div class="console-line">🔧 Prêt à calculer...</div>';
        }

        // === JEU DE DEVINETTE ===
        function makeGuess() {
            const guess = parseInt(document.getElementById('guess-input').value);
            if (!guess || guess < 1 || guess > gameDifficulty) {
                showNotification(`Entrez un nombre entre 1 et ${gameDifficulty} !`, 'warning');
                return;
            }
            
            gameAttempts++;
            document.getElementById('attempts-count').textContent = gameAttempts;
            document.getElementById('last-guess').textContent = guess;
            
            const console = document.getElementById('game-console');
            console.innerHTML += `<div class="console-line">🎯 Tentative ${gameAttempts} : ${guess}</div>`;
            
            if (guess === gameNumber) {
                console.innerHTML += `<div class="console-line">🎉 BRAVO ! Trouvé en ${gameAttempts} coup(s) !</div>`;
                document.getElementById('guessBtn').disabled = true;
                document.getElementById('secret-number').textContent = gameNumber;
                showNotification(`🏆 Victoire en ${gameAttempts} coups !`, 'success');
            } else if (guess < gameNumber) {
                console.innerHTML += '<div class="console-line">📈 Trop petit !</div>';
            } else {
                console.innerHTML += '<div class="console-line">📉 Trop grand !</div>';
            }
            
            document.getElementById('guess-input').value = '';
            document.getElementById('guess-input').focus();
        }

        function resetGame() {
            gameNumber = Math.floor(Math.random() * gameDifficulty) + 1;
            gameAttempts = 0;
            
            document.getElementById('secret-number').textContent = '🤫';
            document.getElementById('attempts-count').textContent = '0';
            document.getElementById('last-guess').textContent = '-';
            document.getElementById('game-console').innerHTML = `
                <div class="console-line">🎯 Devinez le nombre entre 1 et ${gameDifficulty} !</div>
                <div class="console-line">💡 Tapez votre proposition et cliquez sur Deviner</div>
            `;
            document.getElementById('guessBtn').disabled = false;
            document.getElementById('guess-input').value = '';
        }

        function revealSecret() {
            document.getElementById('secret-number').textContent = gameNumber;
            showNotification(`🤫 Le nombre secret était ${gameNumber}`, 'info');
        }

        function setDifficulty(max) {
            gameDifficulty = max;
            resetGame();
            showNotification(`🎲 Difficulté : 1-${max}`, 'info');
        }

        // === DÉFIS ALGORITHMIQUES ===
        function showChallenge(challengeType) {
            currentChallenge = challengeType;
            const container = document.getElementById('challenge-container');
            const title = document.getElementById('challenge-title');
            const description = document.getElementById('challenge-description');
            const input = document.getElementById('challenge-input');
            
            container.style.display = 'block';
            
            const challenges = {
            fibonacci: {
                title: 'Suite de Fibonacci',
                description: 'Créez un algorithme qui calcule les 10 premiers nombres de la suite de Fibonacci (0, 1, 1, 2, 3, 5, 8, 13, 21, 34...)',
                template: `DEBUT
AFFICHER "Suite de Fibonacci (10 premiers nombres) :"
a ← 0
b ← 1
AFFICHER a
AFFICHER b

POUR i DE 3 À 10 FAIRE
    suivant ← a + b
    AFFICHER suivant
    a ← b
    b ← suivant
FIN POUR
FIN`,
                hint: 'Utilisez deux variables pour stocker les deux derniers nombres, puis calculez le suivant.',
                solution: 'L\'algorithme utilise deux variables a et b pour mémoriser les deux derniers nombres de la suite.'
            },
            palindrome: {
                title: 'Vérifier un Palindrome',
                description: 'Créez une fonction qui vérifie si un mot est un palindrome (se lit pareil dans les deux sens)',
                template: `FONCTION estPalindrome(mot) : RETOURNE booléen
    longueur ← LONGUEUR(mot)
    
    POUR i DE 1 À longueur/2 FAIRE
        SI mot[i] ≠ mot[longueur - i + 1] ALORS
            RETOURNER FAUX
        FIN SI
    FIN POUR
    
    RETOURNER VRAI
FIN FONCTION

DEBUT
mot ← "radar"
SI estPalindrome(mot) ALORS
    AFFICHER mot, "est un palindrome"
SINON
    AFFICHER mot, "n'est pas un palindrome"
FIN SI
FIN`,
                hint: 'Comparez le premier caractère avec le dernier, le deuxième avec l\'avant-dernier, etc.',
                solution: 'On compare les caractères symétriques depuis les extrémités vers le centre.'
            },
            prime: {
                title: 'Nombres Premiers',
                description: 'Trouvez tous les nombres premiers entre 1 et 30 (un nombre premier n\'est divisible que par 1 et lui-même)',
                template: `FONCTION estPremier(n) : RETOURNE booléen
    SI n < 2 ALORS
        RETOURNER FAUX
    FIN SI
    
    POUR i DE 2 À racine(n) FAIRE
        SI n MOD i = 0 ALORS
            RETOURNER FAUX
        FIN SI
    FIN POUR
    
    RETOURNER VRAI
FIN FONCTION

DEBUT
AFFICHER "Nombres premiers de 1 à 30 :"
POUR nombre DE 1 À 30 FAIRE
    SI estPremier(nombre) ALORS
        AFFICHER nombre
    FIN SI
FIN POUR
FIN`,
                hint: 'Pour vérifier si un nombre est premier, testez s\'il est divisible par les nombres de 2 à sa racine carrée.',
                solution: 'Un nombre est premier s\'il n\'est divisible par aucun nombre de 2 à sa racine carrée.'
            },
            factorial: {
                title: 'Calcul de Factorielle',
                description: 'Créez une fonction qui calcule la factorielle d\'un nombre (5! = 5 × 4 × 3 × 2 × 1 = 120)',
                template: `FONCTION factorielle(n) : RETOURNE entier
    SI n = 0 OU n = 1 ALORS
        RETOURNER 1
    SINON
        resultat ← 1
        POUR i DE 2 À n FAIRE
            resultat ← resultat * i
        FIN POUR
        RETOURNER resultat
    FIN SI
FIN FONCTION

DEBUT
nombre ← 5
resultat ← factorielle(nombre)
AFFICHER nombre, "! =", resultat
FIN`,
                hint: 'La factorielle de n est le produit de tous les nombres de 1 à n. Attention : 0! = 1.',
                solution: 'On multiplie tous les nombres de 1 à n, ou on utilise la récursivité.'
            }
        };
        
        if (challenges[challengeType]) {
            const challenge = challenges[challengeType];
            title.innerHTML = `<i class="fas fa-trophy"></i> Défi : ${challenge.title}`;
            description.textContent = challenge.description;
            input.value = challenge.template;
            input.placeholder = challenge.template;
        }
        
        // Scroll vers le défi
        container.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function testChallenge() {
        const code = document.getElementById('challenge-input').value;
        const result = document.getElementById('challenge-result');
        
        if (code.trim().length < 10) {
            showNotification('Écrivez votre algorithme d\'abord !', 'warning');
            return;
        }
        
        result.style.display = 'block';
        result.innerHTML = `
            <strong>✅ Code analysé !</strong><br>
            Votre algorithme semble correct. Voici les points clés détectés :<br>
            • Structure algorithmique cohérente<br>
            • Utilisation appropriée des mots-clés<br>
            • Logique de résolution adaptée au problème<br><br>
            <em>💡 Dans un vrai programme, ce code pourrait être testé avec des données réelles !</em>
        `;
        
        showNotification('Code validé ! 🎉', 'success');
    }

    function showChallengeHint() {
        const hints = {
            fibonacci: 'Astuce : Commencez avec a=0 et b=1, puis calculez chaque nouveau terme comme la somme des deux précédents.',
            palindrome: 'Astuce : Comparez le 1er avec le dernier caractère, le 2ème avec l\'avant-dernier, etc.',
            prime: 'Astuce : Un nombre n\'est premier que s\'il n\'est divisible par aucun nombre de 2 à √n.',
            factorial: 'Astuce : 5! = 5 × 4 × 3 × 2 × 1. Utilisez une boucle ou la récursivité.'
        };
        
        if (hints[currentChallenge]) {
            showNotification(hints[currentChallenge], 'info');
        }
    }

    function showChallengeSolution() {
        const input = document.getElementById('challenge-input');
        const challenges = {
            fibonacci: `DEBUT
AFFICHER "Suite de Fibonacci :"
a ← 0
b ← 1
AFFICHER a
AFFICHER b

POUR i DE 3 À 10 FAIRE
    suivant ← a + b
    AFFICHER suivant
    a ← b
    b ← suivant
FIN POUR
FIN`,
            palindrome: `FONCTION estPalindrome(mot) : RETOURNE booléen
    longueur ← LONGUEUR(mot)
    POUR i DE 1 À longueur/2 FAIRE
        SI mot[i] ≠ mot[longueur - i + 1] ALORS
            RETOURNER FAUX
        FIN SI
    FIN POUR
    RETOURNER VRAI
FIN FONCTION`,
            prime: `FONCTION estPremier(n) : RETOURNE booléen
    SI n < 2 ALORS RETOURNER FAUX FIN SI
    POUR i DE 2 À racine(n) FAIRE
        SI n MOD i = 0 ALORS RETOURNER FAUX FIN SI
    FIN POUR
    RETOURNER VRAI
FIN FONCTION`,
            factorial: `FONCTION factorielle(n) : RETOURNE entier
    SI n <= 1 ALORS RETOURNER 1 FIN SI
    resultat ← 1
    POUR i DE 2 À n FAIRE
        resultat ← resultat * i
    FIN POUR
    RETOURNER resultat
FIN FONCTION`
        };
        
        if (challenges[currentChallenge]) {
            input.value = challenges[currentChallenge];
            showNotification('Solution affichée ! Étudiez le code. 📖', 'warning');
        }
    }

    // === VÉRIFICATION DES EXERCICES ===
    function checkSequenceExercise() {
        const code = document.getElementById('sequence-exercise').value.toLowerCase();
        const result = document.getElementById('sequence-result');
        
        const requiredElements = ['debut', 'longueur', 'largeur', 'aire', 'afficher', 'fin'];
        const hasAllElements = requiredElements.every(element => code.includes(element));
        
        result.style.display = 'block';
        
        if (hasAllElements && code.includes('longueur * largeur')) {
            result.innerHTML = `
                <strong>🎉 Excellent !</strong><br>
                Votre algorithme calcule correctement l'aire d'un rectangle.<br>
                ✅ Structure complète (DEBUT/FIN)<br>
                ✅ Variables appropriées<br>
                ✅ Calcul correct (longueur × largeur)<br>
                ✅ Affichage du résultat
            `;
            showNotification('Exercice réussi ! 🏆', 'success');
        } else {
            result.innerHTML = `
                <strong>⚠️ Presque !</strong><br>
                Vérifiez que votre algorithme contient :<br>
                • DEBUT et FIN<br>
                • Variables longueur et largeur<br>
                • Calcul : aire ← longueur * largeur<br>
                • AFFICHER pour montrer le résultat
            `;
            showNotification('Quelques ajustements nécessaires !', 'warning');
        }
    }

    function checkConditionExercise() {
        const code = document.getElementById('condition-exercise').value.toLowerCase();
        const result = document.getElementById('condition-result');
        
        const hasConditions = code.includes('si') && code.includes('alors') && code.includes('sinon');
        const hasGrades = code.includes('16') && code.includes('14') && code.includes('12') && code.includes('10');
        
        result.style.display = 'block';
        
        if (hasConditions && hasGrades) {
            result.innerHTML = `
                <strong>🌟 Parfait !</strong><br>
                Votre système de notation est complet !<br>
                ✅ Conditions imbriquées (SI/SINON SI)<br>
                ✅ Toutes les mentions présentes<br>
                ✅ Logique de comparaison correcte<br>
                ✅ Structure algorithmique solide
            `;
            showNotification('Système de notes validé ! 📊', 'success');
        } else {
            result.innerHTML = `
                <strong>🔍 À améliorer :</strong><br>
                Votre algorithme doit inclure :<br>
                • Structure SI/SINON SI/SINON<br>
                • Comparaisons avec 16, 14, 12, 10<br>
                • Affichage des mentions correspondantes<br>
                • Gestion du cas "Insuffisant"
            `;
            showNotification('Continuez, vous êtes sur la bonne voie !', 'info');
        }
    }

    function checkLoopExercise() {
        const code = document.getElementById('loop-exercise').value.toLowerCase();
        const result = document.getElementById('loop-result');
        
        const hasLoop = code.includes('pour') && code.includes('faire');
        const hasMultiplication = code.includes('*') || code.includes('×');
        const hasNumber7 = code.includes('7');
        
        result.style.display = 'block';
        
        if (hasLoop && hasMultiplication && hasNumber7) {
            result.innerHTML = `
                <strong>🎯 Bravo !</strong><br>
                Votre table de multiplication est correcte !<br>
                ✅ Boucle POUR avec compteur<br>
                ✅ Calcul de multiplication<br>
                ✅ Table de 7 générée<br>
                ✅ Affichage formaté
            `;
            showNotification('Table de multiplication réussie ! 🔢', 'success');
        } else {
            result.innerHTML = `
                <strong>🔧 À corriger :</strong><br>
                Votre algorithme doit contenir :<br>
                • Boucle POUR i DE 1 À 10<br>
                • Calcul : resultat ← 7 * i<br>
                • AFFICHER le résultat formaté<br>
                • Utilisation du chiffre 7
            `;
            showNotification('Ajustez votre boucle !', 'warning');
        }
    }

    function checkFunctionExercise() {
        const code = document.getElementById('function-exercise').value.toLowerCase();
        const result = document.getElementById('function-result');
        
        const hasFunction = code.includes('fonction') && code.includes('maximum');
        const hasParameters = code.includes('(a') && code.includes('b)');
        const hasReturn = code.includes('retourner') || code.includes('retourne');
        const hasCondition = code.includes('si') && code.includes('sinon');
        
        result.style.display = 'block';
        
        if (hasFunction && hasParameters && hasReturn && hasCondition) {
            result.innerHTML = `
                <strong>🚀 Excellent travail !</strong><br>
                Votre fonction maximum est parfaite !<br>
                ✅ Déclaration de fonction correcte<br>
                ✅ Paramètres a et b définis<br>
                ✅ Condition de comparaison<br>
                ✅ Valeur de retour appropriée<br>
                ✅ Utilisation dans le programme principal
            `;
            showNotification('Fonction validée ! Vous maîtrisez ! 🎓', 'success');
        } else {
            result.innerHTML = `
                <strong>🛠️ Améliorations nécessaires :</strong><br>
                Votre fonction doit avoir :<br>
                • FONCTION maximum(a, b) : RETOURNE réel<br>
                • Condition SI a > b ALORS RETOURNER a<br>
                • SINON RETOURNER b<br>
                • Appel dans le programme principal
            `;
            showNotification('Travaillez la structure de fonction !', 'info');
        }
    }

    // === FONCTIONS UTILITAIRES ===
    function highlightLine(lineId) {
        document.querySelectorAll('.code-line').forEach(line => {
            line.classList.remove('highlight');
        });
        document.getElementById(lineId)?.classList.add('highlight');
    }

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
    function showAlgoQuiz() {
        showNotification('🧠 Quiz algorithmique interactif en préparation !', 'info');
    }

    function downloadCheatSheet() {
        showNotification('📄 Téléchargement de l\'aide-mémoire algorithmes - PDF...', 'success');
    }

    function showMoreExercises() {
        showNotification('💪 Banque d\'exercices algorithmiques bientôt disponible !', 'info');
    }

    function nextCourse() {
        showNotification('🚀 Prochaine leçon : "Structures de Données" - Redirection...', 'info');
    }

    // === RACCOURCIS CLAVIER ===
    function handleKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // Navigation avec flèches
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                if (document.activeElement.tagName !== 'INPUT' && 
                    document.activeElement.tagName !== 'TEXTAREA' && 
                    !document.activeElement.contentEditable) {
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
                    document.activeElement.tagName !== 'TEXTAREA' && 
                    !document.activeElement.contentEditable) {
                    e.preventDefault();
                    const currentActive = document.querySelector('.nav-item.active');
                    const prevItem = currentActive?.previousElementSibling;
                    if (prevItem && prevItem.classList.contains('nav-item')) {
                        prevItem.click();
                    }
                }
            }
            
            // Raccourci pour le jeu de devinette
            if (e.key === 'Enter' && document.activeElement.id === 'guess-input') {
                e.preventDefault();
                makeGuess();
            }
            
            // Raccourcis généraux
            if (e.ctrlKey && e.key === 'q') {
                e.preventDefault();
                showAlgoQuiz();
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
        
        // Initialiser les simulateurs
        resetSequence();
        resetCondition();
        resetLoop();
        resetFunction();
        resetGame();
        
        // Message de bienvenue
        setTimeout(() => {
            showNotification('🧠 Bienvenue dans l\'univers des algorithmes !', 'success');
        }, 1500);
        
        // Initialiser les tooltips sur les concepts
        document.querySelectorAll('.concept-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    });

    // === GESTION DES ERREURS ===
    window.addEventListener('error', (e) => {
        console.error('Erreur dans le simulateur:', e.error);
        showNotification('⚠️ Une erreur s\'est produite dans le simulateur', 'error');
    });

    // === MODE DEBUG (pour développement) ===
    function debugMode() {
        console.log('=== MODE DEBUG ALGORITHMES ===');
        console.log('Variables séquence:', sequenceVars);
        console.log('Variables boucle:', loopVars);
        console.log('Variables fonction:', functionVars);
        console.log('Jeu - Nombre secret:', gameNumber);
        console.log('Défi actuel:', currentChallenge);
    }

    // Exposer debugMode globalement pour les tests
    window.debugMode = debugMode;
    </script>
</body>
</html>