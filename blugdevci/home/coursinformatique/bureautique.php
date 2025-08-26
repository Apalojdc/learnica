<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bureautique - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --word-gradient: linear-gradient(135deg, #2b5ce6 0%, #1e3d72 100%);
            --excel-gradient: linear-gradient(135deg, #107c41 0%, #0d5d31 100%);
            --powerpoint-gradient: linear-gradient(135deg, #d24726 0%, #a73513 100%);
            
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

        .content-section.word::before {
            background: var(--word-gradient);
        }

        .content-section.excel::before {
            background: var(--excel-gradient);
        }

        .content-section.powerpoint::before {
            background: var(--powerpoint-gradient);
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

        .section-number.word {
            background: var(--word-gradient);
        }

        .section-number.excel {
            background: var(--excel-gradient);
        }

        .section-number.powerpoint {
            background: var(--powerpoint-gradient);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* SIMULATEURS OFFICE */
        .office-simulator {
            background: var(--dark-card);
            border-radius: var(--border-radius-lg);
            margin: 32px 0;
            border: 1px solid var(--border-primary);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .office-titlebar {
            background: var(--dark-tertiary);
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-primary);
        }

        .titlebar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .app-icon {
            width: 24px;
            height: 24px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .app-icon.word {
            background: var(--word-gradient);
        }

        .app-icon.excel {
            background: var(--excel-gradient);
        }

        .app-icon.powerpoint {
            background: var(--powerpoint-gradient);
        }

        .document-title {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .window-controls {
            display: flex;
            gap: 8px;
        }

        .window-control {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .window-control.close {
            background: #ff5f56;
        }

        .window-control.minimize {
            background: #ffbd2e;
        }

        .window-control.maximize {
            background: #27ca3f;
        }

        .window-control:hover {
            transform: scale(1.2);
        }

        /* TOOLBAR */
        .office-toolbar {
            background: var(--surface-primary);
            padding: 8px 16px;
            border-bottom: 1px solid var(--border-primary);
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .toolbar-group {
            display: flex;
            gap: 4px;
            padding: 4px 8px;
            border-right: 1px solid var(--border-primary);
        }

        .toolbar-group:last-child {
            border-right: none;
        }

        .toolbar-btn {
            width: 32px;
            height: 32px;
            background: transparent;
            border: 1px solid transparent;
            border-radius: 4px;
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-fast);
            font-size: 0.9rem;
        }

        .toolbar-btn:hover {
            background: var(--surface-secondary);
            border-color: var(--border-primary);
            color: var(--text-primary);
        }

        .toolbar-btn.active {
            background: var(--primary-gradient);
            color: white;
        }

        /* WORD SIMULATOR */
        .word-document {
            background: white;
            min-height: 500px;
            margin: 20px;
            padding: 60px 40px;
            border-radius: var(--border-radius-sm);
            color: #000;
            font-family: 'Times New Roman', serif;
            line-height: 1.8;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .word-content {
            outline: none;
            min-height: 400px;
        }

        .word-ruler {
            position: absolute;
            top: 20px;
            left: 40px;
            right: 40px;
            height: 20px;
            background: #f5f5f5;
            border-bottom: 1px solid #ddd;
            background-image: repeating-linear-gradient(90deg, #ddd 0, #ddd 1px, transparent 1px, transparent 20px);
        }

        .formatting-controls {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
            padding: 16px;
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
            flex-wrap: wrap;
        }

        .format-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .format-label {
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .format-select {
            background: var(--dark-tertiary);
            border: 1px solid var(--border-primary);
            border-radius: 4px;
            color: var(--text-primary);
            padding: 4px 8px;
            font-size: 0.85rem;
        }

        .format-btn {
            padding: 6px 12px;
            background: var(--surface-secondary);
            border: 1px solid var(--border-primary);
            border-radius: 4px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all var(--transition-fast);
            font-size: 0.85rem;
        }

        .format-btn:hover {
            background: var(--surface-primary);
            color: var(--text-primary);
        }

        .format-btn.active {
            background: var(--word-gradient);
            color: white;
        }

        /* EXCEL SIMULATOR */
        .excel-spreadsheet {
            background: white;
            margin: 20px;
            border-radius: var(--border-radius-sm);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .excel-headers {
            display: flex;
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .row-header {
            min-width: 40px;
            background: #e9ecef;
            border-right: 1px solid #dee2e6;
        }

        .excel-grid {
            display: grid;
            grid-template-columns: 40px repeat(8, 100px);
            max-height: 400px;
            overflow: auto;
        }

        .excel-cell {
            min-height: 30px;
            border-right: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            padding: 4px 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all var(--transition-fast);
            background: white;
            color: #000;
        }

        .excel-cell:hover {
            background: #e3f2fd;
        }

        .excel-cell.selected {
            background: #1976d2;
            color: white;
        }

        .excel-cell.header {
            background: #e9ecef;
            font-weight: 600;
            text-align: center;
            color: #495057;
        }

        .excel-cell.row-number {
            background: #e9ecef;
            font-weight: 600;
            text-align: center;
            color: #495057;
            justify-content: center;
        }

        .excel-cell input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            color: inherit;
            font-size: inherit;
        }

        .formula-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
            margin-bottom: 16px;
        }

        .formula-label {
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
            min-width: 20px;
        }

        .formula-input {
            flex: 1;
            background: var(--dark-tertiary);
            border: 1px solid var(--border-primary);
            border-radius: 4px;
            color: var(--text-primary);
            padding: 6px 12px;
            font-size: 0.85rem;
            font-family: 'Courier New', monospace;
        }

        .excel-functions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 8px;
            margin-top: 16px;
        }

        .function-btn {
            padding: 8px 12px;
            background: var(--excel-gradient);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all var(--transition-fast);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .function-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* POWERPOINT SIMULATOR */
        .powerpoint-interface {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 16px;
            margin: 20px;
            min-height: 500px;
        }

        .slides-panel {
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
            padding: 16px;
            border: 1px solid var(--border-primary);
        }

        .slides-title {
            color: var(--text-primary);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 12px;
            text-align: center;
        }

        .slide-thumbnail {
            width: 100%;
            height: 100px;
            background: white;
            border: 2px solid transparent;
            border-radius: 4px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all var(--transition-fast);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: #666;
            position: relative;
            overflow: hidden;
        }

        .slide-thumbnail:hover {
            border-color: var(--powerpoint-gradient);
            transform: scale(1.02);
        }

        .slide-thumbnail.active {
            border-color: #d24726;
            box-shadow: 0 0 10px rgba(210, 71, 38, 0.3);
        }

        .slide-number {
            position: absolute;
            top: 4px;
            left: 4px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.6rem;
        }

        .slide-editor {
            background: white;
            border-radius: var(--border-radius-sm);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .slide-canvas {
            width: 100%;
            height: 100%;
            min-height: 400px;
            padding: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .slide-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            outline: none;
        }

        .slide-content {
            font-size: 1.2rem;
            line-height: 1.6;
            max-width: 80%;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            outline: none;
        }

        .slide-tools {
            position: absolute;
            bottom: 16px;
            left: 16px;
            right: 16px;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .slide-tool {
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            color: white;
            cursor: pointer;
            transition: all var(--transition-fast);
            font-size: 0.8rem;
        }

        .slide-tool:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .presentation-controls {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 16px;
            padding: 16px;
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
        }

        .control-btn {
            padding: 10px 20px;
            background: var(--powerpoint-gradient);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all var(--transition-fast);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
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

        /* FEATURES GRID */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 32px;
        }

        .feature-card {
            background: var(--surface-primary);
            padding: 20px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 12px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .feature-description {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
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

            .powerpoint-interface {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .slides-panel {
                order: 2;
            }

            .slide-editor {
                order: 1;
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

            .office-simulator {
                margin: 24px 0;
            }

            .office-toolbar {
                padding: 6px 12px;
            }

            .toolbar-btn {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }

            .word-document {
                margin: 16px;
                padding: 40px 20px;
                min-height: 400px;
            }

            .formatting-controls {
                flex-direction: column;
                gap: 12px;
                padding: 12px;
            }

            .format-group {
                justify-content: center;
                flex-wrap: wrap;
            }

            .excel-grid {
                grid-template-columns: 30px repeat(6, 80px);
                max-height: 300px;
            }

            .excel-cell {
                min-height: 25px;
                padding: 2px 4px;
                font-size: 0.75rem;
            }

            .powerpoint-interface {
                margin: 16px;
                grid-template-columns: 1fr;
            }

            .slides-panel {
                padding: 12px;
            }

            .slide-thumbnail {
                height: 80px;
            }

            .slide-canvas {
                min-height: 300px;
                padding: 20px;
            }

            .slide-title {
                font-size: 1.8rem;
                margin-bottom: 12px;
            }

            .slide-content {
                font-size: 1rem;
                max-width: 90%;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 16px;
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

            .office-simulator {
                margin: 16px 0;
            }

            .office-titlebar {
                padding: 8px 12px;
            }

            .document-title {
                font-size: 0.8rem;
            }

            .office-toolbar {
                padding: 4px 8px;
                gap: 2px;
            }

            .toolbar-group {
                gap: 2px;
                padding: 2px 4px;
            }

            .toolbar-btn {
                width: 24px;
                height: 24px;
                font-size: 0.7rem;
            }

            .word-document {
                margin: 12px;
                padding: 20px 12px;
                min-height: 300px;
            }

            .formatting-controls {
                padding: 8px;
            }

            .format-btn {
                padding: 4px 8px;
                font-size: 0.75rem;
            }

            .excel-grid {
                grid-template-columns: 25px repeat(4, 60px);
                max-height: 250px;
            }

            .excel-cell {
                min-height: 20px;
                padding: 1px 2px;
                font-size: 0.7rem;
            }

            .formula-bar {
                padding: 6px 12px;
                margin-bottom: 12px;
            }

            .excel-functions {
                grid-template-columns: repeat(2, 1fr);
                gap: 6px;
                margin-top: 12px;
            }

            .function-btn {
                padding: 6px 8px;
                font-size: 0.7rem;
            }

            .powerpoint-interface {
                margin: 12px;
            }

            .slides-panel {
                padding: 8px;
            }

            .slide-thumbnail {
                height: 60px;
                margin-bottom: 6px;
            }

            .slide-canvas {
                min-height: 250px;
                padding: 16px;
            }

            .slide-title {
                font-size: 1.4rem;
                margin-bottom: 8px;
            }

            .slide-content {
                font-size: 0.9rem;
            }

            .slide-tools {
                bottom: 8px;
                left: 8px;
                right: 8px;
                gap: 4px;
            }

            .slide-tool {
                padding: 4px 8px;
                font-size: 0.7rem;
            }

            .presentation-controls {
                padding: 12px;
                gap: 8px;
            }

            .control-btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .feature-card {
                padding: 16px;
            }

            .feature-icon {
                font-size: 1.5rem;
                margin-bottom: 8px;
            }

            .feature-title {
                font-size: 1rem;
                margin-bottom: 6px;
            }

            .feature-description {
                font-size: 0.8rem;
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

            .word-document {
                margin: 8px;
                padding: 16px 8px;
            }

            .excel-grid {
                grid-template-columns: 20px repeat(3, 50px);
            }

            .slide-canvas {
                min-height: 200px;
                padding: 12px;
            }

            .btn {
                padding: 12px 16px;
                font-size: 0.9rem;
            }
        }

        /* Amélioration des interactions tactiles */
        @media (hover: none) and (pointer: coarse) {
            .nav-item,
            .feature-card,
            .toolbar-btn,
            .format-btn,
            .function-btn,
            .btn {
                transform: none !important;
            }

            .nav-item:active,
            .btn:active {
                transform: scale(0.98) !important;
                transition: transform 0.1s ease !important;
            }

            .feature-card:active,
            .toolbar-btn:active,
            .format-btn:active,
            .function-btn:active {
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
            <h1 class="course-title">Bureautique</h1>
            <p class="course-subtitle">Maîtrisez les outils essentiels : Word, Excel et PowerPoint avec des simulateurs interactifs</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#word" class="nav-item active" data-section="word">
                <i class="fas fa-file-word"></i>
                1. Word
            </a>
            <a href="#excel" class="nav-item" data-section="excel">
                <i class="fas fa-file-excel"></i>
                2. Excel
            </a>
            <a href="#powerpoint" class="nav-item" data-section="powerpoint">
                <i class="fas fa-file-powerpoint"></i>
                3. PowerPoint
            </a>
        </nav>

        <!-- Section 1: Word -->
        <section id="word" class="content-section word animate-on-scroll">
            <div class="section-header">
                <div class="section-number word">1</div>
                <h2 class="section-title">Microsoft Word - Traitement de Texte</h2>
            </div>

            <div class="definition-content">
                <p>Microsoft Word est le logiciel de traitement de texte le plus utilisé au monde. Il permet de créer, modifier et mettre en forme des documents professionnels : lettres, CV, rapports, livres, etc.</p>

                <!-- Simulateur Word -->
                <div class="office-simulator">
                    <div class="office-titlebar">
                        <div class="titlebar-left">
                            <div class="app-icon word">W</div>
                            <span class="document-title">Mon Document.docx - Microsoft Word</span>
                        </div>
                        <div class="window-controls">
                            <div class="window-control minimize"></div>
                            <div class="window-control maximize"></div>
                            <div class="window-control close"></div>
                        </div>
                    </div>

                    <div class="office-toolbar">
                        <div class="toolbar-group">
                            <button class="toolbar-btn" onclick="insertText('📁')" title="Nouveau">📁</button>
                            <button class="toolbar-btn" onclick="insertText('💾')" title="Enregistrer">💾</button>
                            <button class="toolbar-btn" onclick="insertText('🖨️')" title="Imprimer">🖨️</button>
                        </div>
                        <div class="toolbar-group">
                            <button class="toolbar-btn" onclick="undoAction()" title="Annuler">↶</button>
                            <button class="toolbar-btn" onclick="redoAction()" title="Rétablir">↷</button>
                        </div>
                        <div class="toolbar-group">
                            <button class="toolbar-btn" onclick="copyText()" title="Copier">📋</button>
                            <button class="toolbar-btn" onclick="pasteText()" title="Coller">📄</button>
                        </div>
                    </div>

                    <div class="formatting-controls">
                        <div class="format-group">
                            <span class="format-label">Police :</span>
                            <select class="format-select" onchange="changeFont(this.value)">
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Arial">Arial</option>
                                <option value="Calibri">Calibri</option>
                                <option value="Georgia">Georgia</option>
                            </select>
                        </div>
                        <div class="format-group">
                            <span class="format-label">Taille :</span>
                            <select class="format-select" onchange="changeFontSize(this.value)">
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16">16</option>
                                <option value="18">18</option>
                                <option value="24">24</option>
                            </select>
                        </div>
                        <div class="format-group">
                            <button class="format-btn" onclick="toggleBold()" id="boldBtn">
                                <strong>G</strong>
                            </button>
                            <button class="format-btn" onclick="toggleItalic()" id="italicBtn">
                                <em>I</em>
                            </button>
                            <button class="format-btn" onclick="toggleUnderline()" id="underlineBtn">
                                <u>S</u>
                            </button>
                        </div>
                        <div class="format-group">
                            <button class="format-btn" onclick="alignText('left')">⬅️</button>
                            <button class="format-btn" onclick="alignText('center')">↔️</button>
                            <button class="format-btn" onclick="alignText('right')">➡️</button>
                        </div>
                    </div>

                    <div class="word-document">
                        <div class="word-ruler"></div>
                        <div class="word-content" id="wordContent" contenteditable="true">
                            <h1 style="text-align: center; color: #2b5ce6;">Mon Premier Document Word</h1>
                            <p style="margin-top: 20px;">
                                Bonjour ! Bienvenue dans ce simulateur de Microsoft Word. 
                                Vous pouvez maintenant :
                            </p>
                            <ul style="margin: 15px 0 15px 30px;">
                                <li>Écrire et modifier du texte directement dans ce document</li>
                                <li>Utiliser les boutons de formatage ci-dessus</li>
                                <li>Changer la police et la taille du texte</li>
                                <li>Mettre en <strong>gras</strong>, <em>italique</em> ou <u>souligné</u></li>
                                <li>Aligner le texte à gauche, au centre ou à droite</li>
                            </ul>
                            <p>
                                Essayez de cliquer ici et commencez à taper pour voir la magie opérer ! 
                                Ce simulateur vous donne un aperçu réaliste de l'utilisation de Word.
                            </p>
                            <p style="color: #666; font-style: italic; margin-top: 30px;">
                                Conseil : Sélectionnez du texte puis utilisez les boutons de formatage pour voir l'effet instantanément.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalités Word -->
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">📝</div>
                        <h4 class="feature-title">Rédaction Avancée</h4>
                        <p class="feature-description">Correction automatique, synonymes, insertion d'images et tableaux pour des documents professionnels.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🎨</div>
                        <h4 class="feature-title">Mise en Forme</h4>
                        <p class="feature-description">Styles prédéfinis, thèmes, couleurs personnalisées pour créer des documents élégants rapidement.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">👥</div>
                        <h4 class="feature-title">Collaboration</h4>
                        <p class="feature-description">Travail simultané en équipe, commentaires, suivi des modifications en temps réel.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🔄</div>
                        <h4 class="feature-title">Modèles</h4>
                        <p class="feature-description">CV, lettres, rapports, invitations : des centaines de modèles prêts à utiliser.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Excel -->
        <section id="excel" class="content-section excel animate-on-scroll">
            <div class="section-header">
                <div class="section-number excel">2</div>
                <h2 class="section-title">Microsoft Excel - Tableur</h2>
            </div>

            <div class="definition-content">
                <p>Excel est un tableur puissant pour organiser, analyser et visualiser des données. Idéal pour les budgets, calculs, graphiques et bases de données simples.</p>

                <!-- Simulateur Excel -->
                <div class="office-simulator">
                    <div class="office-titlebar">
                        <div class="titlebar-left">
                            <div class="app-icon excel">X</div>
                            <span class="document-title">Budget Familial.xlsx - Microsoft Excel</span>
                        </div>
                        <div class="window-controls">
                            <div class="window-control minimize"></div>
                            <div class="window-control maximize"></div>
                            <div class="window-control close"></div>
                        </div>
                    </div>

                    <div class="office-toolbar">
                        <div class="toolbar-group">
                            <button class="toolbar-btn" title="Nouveau">📁</button>
                            <button class="toolbar-btn" title="Enregistrer">💾</button>
                            <button class="toolbar-btn" title="Imprimer">🖨️</button>
                        </div>
                        <div class="toolbar-group">
                            <button class="toolbar-btn" title="Somme">Σ</button>
                            <button class="toolbar-btn" title="Graphique">📊</button>
                            <button class="toolbar-btn" title="Filtre">🔍</button>
                        </div>
                    </div>

                    <div class="formula-bar">
                        <span class="formula-label">fx</span>
                        <input type="text" class="formula-input" id="formulaInput" placeholder="=SOMME(B2:B6)" readonly>
                    </div>

                    <div class="excel-spreadsheet">
                        <div class="excel-grid" id="excelGrid">
                            <!-- La grille sera générée par JavaScript -->
                        </div>
                    </div>

                    <div class="excel-functions">
                        <button class="function-btn" onclick="insertFunction('=SOMME(')">SOMME</button>
                        <button class="function-btn" onclick="insertFunction('=MOYENNE(')">MOYENNE</button>
                        <button class="function-btn" onclick="insertFunction('=MAX(')">MAX</button>
                        <button class="function-btn" onclick="insertFunction('=MIN(')">MIN</button>
                        <button class="function-btn" onclick="insertFunction('=AUJOURD.HUI()')">DATE</button>
                        <button class="function-btn" onclick="calculateBudget()">💰 Calculer Budget</button>
                    </div>
                </div>

                <!-- Fonctionnalités Excel -->
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🧮</div>
                        <h4 class="feature-title">Calculs Automatiques</h4>
                        <p class="feature-description">Formules mathématiques, fonctions avancées, références de cellules pour automatiser vos calculs.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h4 class="feature-title">Graphiques Dynamiques</h4>
                        <p class="feature-description">Histogrammes, courbes, secteurs : visualisez vos données avec des graphiques professionnels.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🔍</div>
                        <h4 class="feature-title">Analyse de Données</h4>
                        <p class="feature-description">Filtres, tableaux croisés dynamiques, tri automatique pour explorer vos données facilement.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💼</div>
                        <h4 class="feature-title">Applications Métier</h4>
                        <p class="feature-description">Budgets, plannings, inventaires, statistiques : Excel s'adapte à tous vos besoins professionnels.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: PowerPoint -->
        <section id="powerpoint" class="content-section powerpoint animate-on-scroll">
            <div class="section-header">
                <div class="section-number powerpoint">3</div>
                <h2 class="section-title">Microsoft PowerPoint - Présentation</h2>
            </div>

            <div class="definition-content">
                <p>PowerPoint permet de créer des présentations dynamiques et captivantes. Parfait pour les cours, réunions, conférences et projets étudiants.</p>

                <!-- Simulateur PowerPoint -->
                <div class="office-simulator">
                    <div class="office-titlebar">
                        <div class="titlebar-left">
                            <div class="app-icon powerpoint">P</div>
                            <span class="document-title">Ma Présentation.pptx - Microsoft PowerPoint</span>
                        </div>
                        <div class="window-controls">
                            <div class="window-control minimize"></div>
                            <div class="window-control maximize"></div>
                            <div class="window-control close"></div>
                        </div>
                    </div>

                    <div class="office-toolbar">
                        <div class="toolbar-group">
                            <button class="toolbar-btn" title="Nouvelle diapo">➕</button>
                            <button class="toolbar-btn" title="Enregistrer">💾</button>
                            <button class="toolbar-btn" title="Diaporama">▶️</button>
                        </div>
                        <div class="toolbar-group">
                            <button class="toolbar-btn" title="Texte">T</button>
                            <button class="toolbar-btn" title="Image">🖼️</button>
                            <button class="toolbar-btn" title="Forme">🔷</button>
                        </div>
                    </div>

                    <div class="powerpoint-interface">
                        <div class="slides-panel">
                            <div class="slides-title">📑 Diapositives</div>
                            <div class="slide-thumbnail active" onclick="changeSlide(1)">
                                <div class="slide-number">1</div>
                                <div style="font-size: 0.6rem; padding: 8px;">
                                    <div style="font-weight: bold; margin-bottom: 4px;">Titre Principal</div>
                                    <div>Sous-titre</div>
                                </div>
                            </div>
                            <div class="slide-thumbnail" onclick="changeSlide(2)">
                                <div class="slide-number">2</div>
                                <div style="font-size: 0.6rem; padding: 8px;">
                                    <div style="font-weight: bold; margin-bottom: 4px;">Introduction</div>
                                    <div>• Point 1<br>• Point 2</div>
                                </div>
                            </div>
                            <div class="slide-thumbnail" onclick="changeSlide(3)">
                                <div class="slide-number">3</div>
                                <div style="font-size: 0.6rem; padding: 8px;">
                                    <div style="font-weight: bold; margin-bottom: 4px;">Contenu</div>
                                    <div>Texte principal</div>
                                </div>
                            </div>
                            <div class="slide-thumbnail" onclick="changeSlide(4)">
                                <div class="slide-number">4</div>
                                <div style="font-size: 0.6rem; padding: 8px;">
                                    <div style="font-weight: bold; margin-bottom: 4px;">Conclusion</div>
                                    <div>Merci !</div>
                                </div>
                            </div>
                        </div>

                        <div class="slide-editor">
                            <div class="slide-canvas" id="slideCanvas">
                                <div class="slide-title" contenteditable="true" id="slideTitle">
                                    Bienvenue dans PowerPoint !
                                </div>
                                <div class="slide-content" contenteditable="true" id="slideContent">
                                    Créez des présentations époustouflantes<br>
                                    • Éditez ce texte directement<br>
                                    • Changez de diapositive<br>
                                    • Explorez les fonctionnalités
                                </div>
                                <div class="slide-tools">
                                    <button class="slide-tool" onclick="changeSlideTheme('blue')">🔵 Bleu</button>
                                    <button class="slide-tool" onclick="changeSlideTheme('green')">🟢 Vert</button>
                                    <button class="slide-tool" onclick="changeSlideTheme('orange')">🟠 Orange</button>
                                    <button class="slide-tool" onclick="changeSlideTheme('purple')">🟣 Violet</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="presentation-controls">
                        <button class="control-btn" onclick="previousSlide()" id="prevSlideBtn">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </button>
                        <button class="control-btn" onclick="startPresentation()">
                            <i class="fas fa-play"></i> Lancer Diaporama
                        </button>
                        <button class="control-btn" onclick="nextSlide()" id="nextSlideBtn">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Fonctionnalités PowerPoint -->
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🎭</div>
                        <h4 class="feature-title">Animations Dynamiques</h4>
                        <p class="feature-description">Transitions fluides, effets d'apparition, animations d'objets pour captiver votre audience.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🎨</div>
                        <h4 class="feature-title">Design Professionnel</h4>
                        <p class="feature-description">Thèmes élégants, modèles prêts à l'emploi, palettes de couleurs harmonieuses.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📽️</div>
                        <h4 class="feature-title">Multimédia Riche</h4>
                        <p class="feature-description">Images, vidéos, sons, graphiques interactifs pour des présentations mémorables.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">👥</div>
                        <h4 class="feature-title">Collaboration Live</h4>
                        <p class="feature-description">Travail d'équipe en temps réel, commentaires, partage instantané avec vos collègues.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showOfficeQuiz()">
                <i class="fas fa-graduation-cap"></i>
                Quiz Bureautique
            </button>
            <button class="btn btn-secondary" onclick="showTemplates()">
                <i class="fas fa-file-alt"></i>
                Modèles Gratuits
            </button>
            <button class="btn btn-secondary" onclick="downloadGuide()">
                <i class="fas fa-download"></i>
                Guide Complet
            </button>
            <button class="btn btn-secondary" onclick="nextLesson()">
                <i class="fas fa-arrow-right"></i>
                Leçon Suivante
            </button>
        </div>
    </div>

    <script>
        // Variables globales
        let currentSlide = 1;
        let selectedCell = null;
        let excelData = {};
        let undoStack = [];
        let redoStack = [];

        // Données des diapositives
        const slidesData = {
            1: {
                title: "Bienvenue dans PowerPoint !",
                content: "Créez des présentations époustouflantes<br>• Éditez ce texte directement<br>• Changez de diapositive<br>• Explorez les fonctionnalités",
                theme: "linear-gradient(135deg, #667eea 0%, #764ba2 100%)"
            },
            2: {
                title: "Pourquoi utiliser PowerPoint ?",
                content: "✅ Présentations professionnelles<br>✅ Communication visuelle efficace<br>✅ Outils créatifs intuitifs<br>✅ Collaboration en équipe",
                theme: "linear-gradient(135deg, #11998e 0%, #38ef7d 100%)"
            },
            3: {
                title: "Fonctionnalités Principales",
                content: "🎨 Thèmes et modèles<br>📊 Graphiques et tableaux<br>🎬 Animations et transitions<br>🖼️ Multimédia (images, vidéos)<br>👥 Partage et collaboration",
                theme: "linear-gradient(135deg, #f093fb 0%, #f5576c 100%)"
            },
            4: {
                title: "Merci pour votre attention !",
                content: "💡 Vous êtes maintenant prêt à créer<br>de magnifiques présentations !<br><br>🚀 Prochaine étape : Pratique !",
                theme: "linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)"
            }
        };

        // Initialisation Excel
        function initializeExcel() {
            const grid = document.getElementById('excelGrid');
            grid.innerHTML = '';

            // Headers colonnes
            const headers = ['', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            headers.forEach((header, index) => {
                const cell = document.createElement('div');
                cell.className = 'excel-cell header';
                cell.textContent = header;
                grid.appendChild(cell);
            });

            // Données exemple
            const sampleData = [
                ['1', 'Élément', 'Coût', 'Quantité', 'Total', '', '', '', ''],
                ['2', 'Loyer', '800', '1', '=B2*C2', '', '', '', ''],
                ['3', 'Électricité', '120', '1', '=B3*C3', '', '', '', ''],
                ['4', 'Internet', '45', '1', '=B4*C4', '', '', '', ''],
                ['5', 'Courses', '300', '1', '=B5*C5', '', '', '', ''],
                ['6', 'TOTAL', '', '', '=SOMME(D2:D5)', '', '', '', '']
            ];

            // Générer les cellules
            for (let row = 1; row <= 8; row++) {
                for (let col = 0; col <= 8; col++) {
                    const cell = document.createElement('div');
                    cell.className = 'excel-cell';
                    
                    if (col === 0) {
                        cell.className += ' row-number';
                        cell.textContent = row;
                    } else {
                        const dataRow = sampleData[row - 1];
                        if (dataRow && dataRow[col - 1]) {
                            if (dataRow[col - 1].startsWith('=')) {
                                // Formule
                                cell.textContent = calculateFormula(dataRow[col - 1]);
                                cell.setAttribute('data-formula', dataRow[col - 1]);
                            } else {
                                cell.textContent = dataRow[col - 1];
                            }
                        }
                        
                        cell.addEventListener('click', () => selectCell(cell, row, col));
                        cell.setAttribute('data-row', row);
                        cell.setAttribute('data-col', col);
                    }
                    
                    grid.appendChild(cell);
                }
            }
        }

        // Sélection de cellule Excel
        function selectCell(cell, row, col) {
            document.querySelectorAll('.excel-cell.selected').forEach(c => {
                c.classList.remove('selected');
            });
            
            cell.classList.add('selected');
            selectedCell = { cell, row, col };
            
            const formula = cell.getAttribute('data-formula') || cell.textContent;
            document.getElementById('formulaInput').value = formula;
            
            showNotification(`Cellule ${String.fromCharCode(64 + col)}${row} sélectionnée`, 'info');
        }

        // Calcul de formules simples
        function calculateFormula(formula) {
            if (formula === '=B2*C2') return '800';
            if (formula === '=B3*C3') return '120';
            if (formula === '=B4*C4') return '45';
            if (formula === '=B5*C5') return '300';
            if (formula === '=SOMME(D2:D5)') return '1265';
            return formula;
        }

        // Insertion de fonction Excel
        function insertFunction(func) {
            if (selectedCell) {
                const input = document.getElementById('formulaInput');
                input.value = func;
                selectedCell.cell.textContent = func;
                showNotification(`Fonction ${func} insérée !`, 'success');
            } else {
                showNotification('Sélectionnez d\'abord une cellule !', 'warning');
            }
        }

        // Calcul budget automatique
        function calculateBudget() {
            const cells = document.querySelectorAll('.excel-cell');
            let total = 0;
            
            // Calculer le vrai total
            cells.forEach(cell => {
                const row = parseInt(cell.getAttribute('data-row'));
                const col = parseInt(cell.getAttribute('data-col'));
                
                if (row >= 2 && row <= 5 && col === 4) {
                    const value = parseInt(cell.textContent) || 0;
                    total += value;
                }
            });
            
            // Mettre à jour la cellule total
            cells.forEach(cell => {
                const row = parseInt(cell.getAttribute('data-row'));
                const col = parseInt(cell.getAttribute('data-col'));
                
                if (row === 6 && col === 4) {
                    cell.textContent = total.toString();
                    cell.style.fontWeight = 'bold';
                    cell.style.backgroundColor = '#e8f5e8';
                }
            });
            
            showNotification(`💰 Budget calculé : ${total}€`, 'success');
        }

        // Fonctions Word
        function insertText(text) {
            const content = document.getElementById('wordContent');
            content.focus();
            document.execCommand('insertText', false, text + ' ');
        }

        function changeFont(font) {
            document.execCommand('fontName', false, font);
            showNotification(`Police changée : ${font}`, 'success');
        }

        function changeFontSize(size) {
            document.execCommand('fontSize', false, size);
            showNotification(`Taille : ${size}px`, 'success');
        }

        function toggleBold() {
            document.execCommand('bold');
            document.getElementById('boldBtn').classList.toggle('active');
        }

        function toggleItalic() {
            document.execCommand('italic');
            document.getElementById('italicBtn').classList.toggle('active');
        }

        function toggleUnderline() {
            document.execCommand('underline');
            document.getElementById('underlineBtn').classList.toggle('active');
        }

        function alignText(alignment) {
            document.execCommand('justify' + alignment.charAt(0).toUpperCase() + alignment.slice(1));
            showNotification(`Texte aligné à ${alignment === 'left' ? 'gauche' : alignment === 'center' ? 'au centre' : 'droite'}`, 'success');
        }

        function undoAction() {
            document.execCommand('undo');
            showNotification('Action annulée', 'info');
        }

        function redoAction() {
            document.execCommand('redo');
            showNotification('Action rétablie', 'info');
        }

        function copyText() {
            document.execCommand('copy');
            showNotification('Texte copié', 'success');
        }

        function pasteText() {
            document.execCommand('paste');
            showNotification('Texte collé', 'success');
        }

        // Fonctions PowerPoint
        function changeSlide(slideNumber) {
            if (slideNumber < 1 || slideNumber > 4) return;
            
            currentSlide = slideNumber;
            
            // Mettre à jour l'apparence des miniatures
            document.querySelectorAll('.slide-thumbnail').forEach((thumb, index) => {
                thumb.classList.toggle('active', index + 1 === slideNumber);
            });
            
            // Mettre à jour le contenu de la diapositive
            const slideData = slidesData[slideNumber];
            const canvas = document.getElementById('slideCanvas');
            const title = document.getElementById('slideTitle');
            const content = document.getElementById('slideContent');
            
            canvas.style.background = slideData.theme;
            title.innerHTML = slideData.title;
            content.innerHTML = slideData.content;
            
            // Mettre à jour les boutons
            document.getElementById('prevSlideBtn').disabled = slideNumber === 1;
            document.getElementById('nextSlideBtn').disabled = slideNumber === 4;
            
            showNotification(`Diapositive ${slideNumber}/4 affichée`, 'info');
        }

        function previousSlide() {
            if (currentSlide > 1) {
                changeSlide(currentSlide - 1);
            }
        }

        function nextSlide() {
            if (currentSlide < 4) {
                changeSlide(currentSlide + 1);
            }
        }

        function changeSlideTheme(color) {
            const canvas = document.getElementById('slideCanvas');
            const themes = {
                blue: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                green: 'linear-gradient(135deg, #11998e 0%, #38ef7d 100%)',
                orange: 'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
                purple: 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)'
            };
            
            canvas.style.background = themes[color];
            slidesData[currentSlide].theme = themes[color];
            showNotification(`Thème ${color} appliqué !`, 'success');
        }

        function startPresentation() {
            showNotification('🎬 Mode présentation simulé ! Utilisez les flèches pour naviguer.', 'info');
            changeSlide(1);
        }

        // Navigation entre sections
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
        function showOfficeQuiz() {
            showNotification('🎓 Quiz bureautique interactif en préparation !', 'info');
        }

        function showTemplates() {
            showNotification('📄 Bibliothèque de modèles Office disponible bientôt !', 'info');
        }

        function downloadGuide() {
            showNotification('📄 Téléchargement du guide "Bureautique Complète" - PDF...', 'success');
        }

        function nextLesson() {
            showNotification('🌐 Prochaine leçon : "Internet & Web" - Redirection en cours...', 'info');
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
                // Navigation avec flèches
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    if (document.activeElement.tagName !== 'INPUT' && !document.activeElement.contentEditable) {
                        e.preventDefault();
                        const currentActive = document.querySelector('.nav-item.active');
                        const nextItem = currentActive.nextElementSibling;
                        if (nextItem) {
                            nextItem.click();
                        }
                    }
                }
                
                if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    if (document.activeElement.tagName !== 'INPUT' && !document.activeElement.contentEditable) {
                        e.preventDefault();
                        const currentActive = document.querySelector('.nav-item.active');
                        const prevItem = currentActive.previousElementSibling;
                        if (prevItem) {
                            prevItem.click();
                        }
                    }
                }
                
                // Raccourcis PowerPoint
                if (e.key === 'PageDown') {
                    e.preventDefault();
                    nextSlide();
                }
                
                if (e.key === 'PageUp') {
                    e.preventDefault();
                    previousSlide();
                }
                
                // Raccourcis généraux
                if (e.ctrlKey && e.key === 'q') {
                    e.preventDefault();
                    showOfficeQuiz();
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
            initializeExcel();
            
            // Initialiser PowerPoint
            changeSlide(1);
            
            // Message de bienvenue
            setTimeout(() => {
                showNotification('📊 Découvrez la puissance de la bureautique !', 'success');
            }, 1500);
        });
    </script>
</body>
</html>