<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisation de Base - Cours DevBlog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --power-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            --desktop-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --input-gradient: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
            
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

        .content-section.power::before {
            background: var(--power-gradient);
        }

        .content-section.desktop::before {
            background: var(--desktop-gradient);
        }

        .content-section.input::before {
            background: var(--input-gradient);
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

        .section-number.power {
            background: var(--power-gradient);
        }

        .section-number.desktop {
            background: var(--desktop-gradient);
        }

        .section-number.input {
            background: var(--input-gradient);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* POWER SECTION - Simulateur d'ordinateur */
        .computer-simulator {
            background: var(--dark-card);
            border-radius: var(--border-radius-lg);
            padding: 40px;
            margin: 32px 0;
            border: 1px solid var(--border-primary);
            text-align: center;
        }

        .simulator-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            background: var(--power-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .computer-display {
            background: #000;
            border-radius: var(--border-radius);
            padding: 60px 40px;
            margin: 24px 0;
            border: 8px solid var(--dark-tertiary);
            position: relative;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-normal);
        }

        .computer-display.off {
            background: #111;
            border-color: #333;
        }

        .computer-display.starting {
            background: linear-gradient(45deg, #001122, #002244);
            animation: bootAnimation 3s ease-in-out;
        }

        .computer-display.on {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        }

        @keyframes bootAnimation {
            0% { background: #111; }
            25% { background: #001122; }
            50% { background: #002244; }
            75% { background: #1e3a8a; }
            100% { background: linear-gradient(135deg, #1e3a8a, #3b82f6); }
        }

        .screen-content {
            color: white;
            text-align: center;
            transition: all var(--transition-normal);
            font-family: 'Courier New', monospace;
        }

        .screen-off {
            color: #333;
            font-size: 1rem;
        }

        .screen-starting {
            color: #66ccff;
            font-size: 1.2rem;
            animation: blinkText 0.5s infinite;
        }

        .screen-on {
            color: white;
            font-size: 1.3rem;
        }

        @keyframes blinkText {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0.3; }
        }

        .power-controls {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        .power-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .power-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: all var(--transition-slow);
            transform: translate(-50%, -50%);
        }

        .power-btn:hover::before {
            width: 100px;
            height: 100px;
        }

        .power-on-btn {
            background: var(--success-gradient);
            color: white;
        }

        .power-on-btn:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-xl);
        }

        .power-off-btn {
            background: var(--power-gradient);
            color: white;
        }

        .power-off-btn:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-xl);
        }

        .restart-btn {
            background: var(--warning-gradient);
            color: var(--dark-bg);
        }

        .restart-btn:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-xl);
        }

        /* ÉTAPES GUIDE */
        .steps-guide {
            margin-top: 40px;
        }

        .guide-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
            color: var(--text-primary);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .step-card {
            background: var(--surface-primary);
            padding: 20px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            transition: all var(--transition-normal);
            text-align: center;
            position: relative;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 20px;
            background: var(--accent-gradient);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .step-icon {
            font-size: 2rem;
            margin: 15px 0 12px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .step-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .step-description {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* DESKTOP SIMULATOR */
        .desktop-simulator {
            background: var(--dark-card);
            border-radius: var(--border-radius-lg);
            padding: 20px;
            margin: 32px 0;
            border: 1px solid var(--border-primary);
        }

        .desktop-screen {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border-radius: var(--border-radius);
            height: 400px;
            position: relative;
            overflow: hidden;
            border: 4px solid var(--dark-tertiary);
        }

        .taskbar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 48px;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            padding: 0 16px;
            gap: 12px;
        }

        .start-btn {
            background: var(--primary-gradient);
            border: none;
            padding: 8px 16px;
            border-radius: var(--border-radius-sm);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-normal);
            font-size: 0.9rem;
        }

        .start-btn:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        .taskbar-apps {
            display: flex;
            gap: 8px;
        }

        .taskbar-app {
            width: 36px;
            height: 36px;
            background: var(--surface-primary);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-normal);
            border: 1px solid var(--border-primary);
        }

        .taskbar-app:hover {
            background: var(--surface-secondary);
            transform: scale(1.1);
        }

        .taskbar-time {
            margin-left: auto;
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .desktop-icons {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            height: calc(100% - 48px);
        }

        .desktop-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-normal);
            padding: 12px;
            border-radius: var(--border-radius-sm);
        }

        .desktop-icon:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
        }

        .icon-image {
            font-size: 2.5rem;
            margin-bottom: 8px;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
        }

        .icon-label {
            color: white;
            font-size: 0.8rem;
            font-weight: 500;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        .window {
            position: absolute;
            background: var(--dark-secondary);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-primary);
            min-width: 300px;
            min-height: 200px;
            display: none;
            z-index: 100;
        }

        .window.show {
            display: block;
            animation: windowAppear 0.3s ease-out;
        }

        @keyframes windowAppear {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .window-header {
            background: var(--dark-tertiary);
            padding: 12px 16px;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: move;
        }

        .window-title {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .window-controls {
            display: flex;
            gap: 8px;
        }

        .window-control {
            width: 16px;
            height: 16px;
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

        .window-content {
            padding: 20px;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* INPUT DEVICES SECTION */
        .input-devices {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            margin-top: 32px;
        }

        .device-card {
            background: var(--dark-card);
            padding: 32px;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--border-primary);
            text-align: center;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .device-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--input-gradient);
        }

        .device-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .device-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            background: var(--input-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .device-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--text-primary);
        }

        .device-description {
            color: var(--text-secondary);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* KEYBOARD SIMULATOR */
        .keyboard-simulator {
            background: var(--surface-primary);
            padding: 24px;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-primary);
            margin-top: 20px;
        }

        .keyboard-grid {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 4px;
            max-width: 600px;
            margin: 0 auto;
        }

        .key {
            background: var(--dark-tertiary);
            border: 1px solid var(--border-primary);
            border-radius: 4px;
            padding: 8px;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-fast);
            user-select: none;
        }

        .key:hover {
            background: var(--surface-secondary);
            transform: translateY(-2px);
        }

        .key.pressed {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(1px);
        }

        .key.space {
            grid-column: span 4;
        }

        .typing-area {
            margin-top: 20px;
            text-align: center;
        }

        .typing-display {
            background: var(--dark-bg);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius-sm);
            padding: 16px;
            min-height: 60px;
            color: var(--text-primary);
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        /* MOUSE SIMULATOR */
        .mouse-area {
            background: var(--surface-primary);
            border: 1px solid var(--border-primary);
            border-radius: var(--border-radius);
            padding: 24px;
            margin-top: 20px;
            text-align: center;
            position: relative;
            height: 200px;
            cursor: crosshair;
            overflow: hidden;
        }

        .mouse-cursor {
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            pointer-events: none;
            z-index: 10;
            transition: all 0.1s ease;
        }

        .mouse-trail {
            position: absolute;
            width: 8px;
            height: 8px;
            background: var(--accent-gradient);
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.7;
            animation: trailFade 1s ease-out forwards;
        }

        @keyframes trailFade {
            to {
                opacity: 0;
                transform: scale(0);
            }
        }

        .click-effect {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 2px solid var(--accent-gradient);
            border-radius: 50%;
            pointer-events: none;
            animation: clickRipple 0.6s ease-out;
        }

        @keyframes clickRipple {
            from {
                transform: scale(0);
                opacity: 1;
            }
            to {
                transform: scale(3);
                opacity: 0;
            }
        }

        .mouse-instructions {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--text-muted);
            font-size: 1rem;
            pointer-events: none;
            z-index: 1;
        }

        /* TIPS ET ASTUCES */
        .tips-section {
            background: var(--dark-card);
            padding: 32px;
            border-radius: var(--border-radius-lg);
            margin-top: 40px;
            border: 1px solid var(--border-primary);
        }

        .tips-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
            background: var(--success-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .tip-card {
            background: var(--surface-primary);
            padding: 20px;
            border-radius: var(--border-radius);
            border-left: 4px solid var(--success-gradient);
            transition: all var(--transition-normal);
        }

        .tip-card:hover {
            transform: translateX(8px);
            box-shadow: var(--shadow-lg);
        }

        .tip-icon {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: var(--text-accent);
        }

        .tip-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .tip-description {
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

            .input-devices {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .steps-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 16px;
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

            .computer-simulator {
                padding: 24px 20px;
            }

            .computer-display {
                height: 250px;
                padding: 40px 20px;
            }

            .power-controls {
                gap: 16px;
            }

            .power-btn {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .desktop-screen {
                height: 300px;
            }

            .desktop-icons {
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
            }

            .icon-image {
                font-size: 2rem;
            }

            .icon-label {
                font-size: 0.7rem;
            }

            .keyboard-grid {
                grid-template-columns: repeat(8, 1fr);
                gap: 3px;
            }

            .key {
                padding: 6px;
                font-size: 0.7rem;
            }

            .mouse-area {
                height: 150px;
                padding: 16px;
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

            .computer-simulator {
                padding: 20px 16px;
            }

            .simulator-title {
                font-size: 1.2rem;
                margin-bottom: 16px;
            }

            .computer-display {
                height: 200px;
                padding: 30px 16px;
            }

            .screen-content {
                font-size: 0.9rem;
            }

            .power-controls {
                gap: 12px;
                flex-direction: row;
                justify-content: center;
            }

            .power-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .step-card {
                padding: 16px;
            }

            .step-icon {
                font-size: 1.5rem;
                margin: 10px 0 8px;
            }

            .step-title {
                font-size: 0.9rem;
            }

            .step-description {
                font-size: 0.8rem;
            }

            .desktop-simulator {
                padding: 16px;
            }

            .desktop-screen {
                height: 250px;
            }

            .desktop-icons {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                padding: 16px;
            }

            .icon-image {
                font-size: 1.8rem;
                margin-bottom: 6px;
            }

            .icon-label {
                font-size: 0.65rem;
            }

            .taskbar {
                height: 40px;
                padding: 0 12px;
                gap: 8px;
            }

            .start-btn {
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .taskbar-app {
                width: 28px;
                height: 28px;
            }

            .taskbar-time {
                font-size: 0.75rem;
            }

            .device-card {
                padding: 20px 16px;
            }

            .device-icon {
                font-size: 3rem;
                margin-bottom: 16px;
            }

            .device-title {
                font-size: 1.2rem;
                margin-bottom: 12px;
            }

            .device-description {
                font-size: 0.9rem;
                margin-bottom: 16px;
            }

            .keyboard-simulator {
                padding: 16px;
            }

            .keyboard-grid {
                grid-template-columns: repeat(6, 1fr);
                gap: 2px;
            }

            .key {
                padding: 4px;
                font-size: 0.6rem;
            }

            .typing-display {
                padding: 12px;
                min-height: 50px;
                font-size: 1rem;
            }

            .mouse-area {
                height: 120px;
                padding: 12px;
            }

            .mouse-instructions {
                font-size: 0.9rem;
            }

            .tips-section {
                padding: 20px 16px;
            }

            .tips-title {
                font-size: 1.2rem;
                margin-bottom: 20px;
            }

            .tips-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .tip-card {
                padding: 16px;
            }

            .tip-icon {
                font-size: 1.2rem;
                margin-bottom: 8px;
            }

            .tip-title {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }

            .tip-description {
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

            .computer-display {
                height: 180px;
                padding: 20px 12px;
            }

            .power-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }

            .desktop-screen {
                height: 200px;
            }

            .desktop-icons {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
                padding: 12px;
            }

            .keyboard-grid {
                grid-template-columns: repeat(5, 1fr);
            }

            .btn {
                padding: 12px 16px;
                font-size: 0.9rem;
            }
        }

        /* Amélioration des interactions tactiles */
        @media (hover: none) and (pointer: coarse) {
            .nav-item,
            .power-btn,
            .step-card,
            .device-card,
            .tip-card,
            .btn {
                transform: none !important;
            }

            .nav-item:active,
            .power-btn:active,
            .btn:active {
                transform: scale(0.98) !important;
                transition: transform 0.1s ease !important;
            }

            .step-card:active,
            .device-card:active,
            .tip-card:active {
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
            <h1 class="course-title">Utilisation de Base</h1>
            <p class="course-subtitle">Maîtrisez les gestes essentiels pour utiliser un ordinateur au quotidien</p>
        </header>

        <!-- Navigation -->
        <nav class="course-navigation animate-on-scroll">
            <a href="#power" class="nav-item active" data-section="power">
                <i class="fas fa-power-off"></i>
                1. Allumer / Éteindre
            </a>
            <a href="#desktop" class="nav-item" data-section="desktop">
                <i class="fas fa-desktop"></i>
                2. Bureau & Fenêtres
            </a>
            <a href="#input" class="nav-item" data-section="input">
                <i class="fas fa-keyboard"></i>
                3. Clavier & Souris
            </a>
        </nav>

        <!-- Section 1: Allumer / Éteindre -->
        <section id="power" class="content-section power animate-on-scroll">
            <div class="section-header">
                <div class="section-number power">1</div>
                <h2 class="section-title">Allumer et Éteindre l'Ordinateur</h2>
            </div>

            <div class="definition-content">
                <p>Apprendre à démarrer et éteindre correctement un ordinateur est fondamental. Un arrêt brutal peut endommager le système et faire perdre des données. Découvrons les bonnes pratiques.</p>

                <!-- Simulateur d'ordinateur -->
                <div class="computer-simulator">
                    <h3 class="simulator-title">🖥️ Simulateur d'Ordinateur Interactif</h3>
                    <p style="color: var(--text-muted); margin-bottom: 24px; text-align: center;">Testez les différents états de l'ordinateur</p>
                    
                    <div class="computer-display off" id="computerDisplay">
                        <div class="screen-content">
                            <div class="screen-off" id="screenContent">
                                💤 Ordinateur éteint<br>
                                <small>Appuyez sur le bouton d'alimentation</small>
                            </div>
                        </div>
                    </div>

                    <div class="power-controls">
                        <button class="power-btn power-on-btn" onclick="powerOn()" title="Allumer l'ordinateur">
                            <i class="fas fa-power-off"></i>
                        </button>
                        <button class="power-btn restart-btn" onclick="restart()" title="Redémarrer">
                            <i class="fas fa-redo"></i>
                        </button>
                        <button class="power-btn power-off-btn" onclick="powerOff()" title="Éteindre l'ordinateur">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Guide étapes -->
                <div class="steps-guide">
                    <h3 class="guide-title">🔋 Étapes pour Bien Gérer l'Alimentation</h3>
                    
                    <div class="steps-grid">
                        <div class="step-card">
                            <div class="step-number">1</div>
                            <div class="step-icon">🔌</div>
                            <h4 class="step-title">Vérifier l'Alimentation</h4>
                            <p class="step-description">Assurez-vous que l'ordinateur est bien branché et que l'alimentation fonctionne.</p>
                        </div>

                        <div class="step-card">
                            <div class="step-number">2</div>
                            <div class="step-icon">⚡</div>
                            <h4 class="step-title">Appuyer sur Power</h4>
                            <p class="step-description">Pressez brièvement (1-2 secondes) le bouton d'alimentation pour démarrer.</p>
                        </div>

                        <div class="step-card">
                            <div class="step-number">3</div>
                            <div class="step-icon">⏳</div>
                            <h4 class="step-title">Attendre le Démarrage</h4>
                            <p class="step-description">Laissez l'ordinateur charger le système d'exploitation (30 secondes à 2 minutes).</p>
                        </div>

                        <div class="step-card">
                            <div class="step-number">4</div>
                            <div class="step-icon">🖥️</div>
                            <h4 class="step-title">Bureau Affiché</h4>
                            <p class="step-description">L'ordinateur est prêt quand le bureau s'affiche avec les icônes.</p>
                        </div>

                        <div class="step-card">
                            <div class="step-number">5</div>
                            <div class="step-icon">💾</div>
                            <h4 class="step-title">Sauvegarder</h4>
                            <p class="step-description">Toujours sauvegarder vos fichiers avant d'éteindre.</p>
                        </div>

                        <div class="step-card">
                            <div class="step-number">6</div>
                            <div class="step-icon">🔄</div>
                            <h4 class="step-title">Arrêt Propre</h4>
                            <p class="step-description">Utilisez "Éteindre" dans le menu pour un arrêt sécurisé.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Bureau & Fenêtres -->
        <section id="desktop" class="content-section desktop animate-on-scroll">
            <div class="section-header">
                <div class="section-number desktop">2</div>
                <h2 class="section-title">Bureau et Gestion des Fenêtres</h2>
            </div>

            <div class="definition-content">
                <p>Le bureau est l'interface principale de votre ordinateur. C'est votre espace de travail virtuel où vous pouvez accéder à vos fichiers, programmes et gérer plusieurs tâches simultanément.</p>

                <!-- Simulateur de bureau -->
                <div class="desktop-simulator">
                    <div class="desktop-screen">
                        <div class="desktop-icons">
                            <div class="desktop-icon" onclick="openWindow('documents')">
                                <div class="icon-image">📁</div>
                                <div class="icon-label">Mes Documents</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('browser')">
                                <div class="icon-image">🌐</div>
                                <div class="icon-label">Navigateur</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('calculator')">
                                <div class="icon-image">🧮</div>
                                <div class="icon-label">Calculatrice</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('notepad')">
                                <div class="icon-image">📝</div>
                                <div class="icon-label">Bloc-notes</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('photos')">
                                <div class="icon-image">🖼️</div>
                                <div class="icon-label">Photos</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('music')">
                                <div class="icon-image">🎵</div>
                                <div class="icon-label">Musique</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('games')">
                                <div class="icon-image">🎮</div>
                                <div class="icon-label">Jeux</div>
                            </div>
                            <div class="desktop-icon" onclick="openWindow('settings')">
                                <div class="icon-image">⚙️</div>
                                <div class="icon-label">Paramètres</div>
                            </div>
                        </div>

                        <!-- Barre des tâches -->
                        <div class="taskbar">
                            <button class="start-btn" onclick="showNotification('Menu Démarrer ouvert ! 🚀', 'info')">
                                Démarrer
                            </button>
                            <div class="taskbar-apps">
                                <div class="taskbar-app" onclick="showNotification('Application lancée ! 📱', 'success')">📁</div>
                                <div class="taskbar-app" onclick="showNotification('Navigateur ouvert ! 🌐', 'info')">🌐</div>
                                <div class="taskbar-app" onclick="showNotification('Éditeur de texte ! ✏️', 'info')">📝</div>
                            </div>
                            <div class="taskbar-time" id="currentTime">14:32</div>
                        </div>

                        <!-- Fenêtres -->
                        <div class="window" id="documentsWindow" style="top: 50px; left: 50px;">
                            <div class="window-header">
                                <div class="window-title">📁 Mes Documents</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('documents')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <p>Ici se trouvent tous vos documents personnels :</p>
                                <ul style="margin-top: 12px; padding-left: 20px;">
                                    <li>📄 Mon CV.pdf</li>
                                    <li>📊 Budget familial.xlsx</li>
                                    <li>🖼️ Photos vacances/</li>
                                    <li>📝 Notes importantes.txt</li>
                                </ul>
                            </div>
                        </div>

                        <div class="window" id="browserWindow" style="top: 80px; left: 80px;">
                            <div class="window-header">
                                <div class="window-title">🌐 Navigateur Web</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('browser')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <p>Naviguez sur Internet en toute simplicité :</p>
                                <div style="margin-top: 12px; padding: 12px; background: var(--surface-primary); border-radius: 8px;">
                                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                        <span>🔍</span>
                                        <span style="color: var(--text-muted);">www.devblog-cours.fr</span>
                                    </div>
                                    <p style="font-size: 0.9rem;">Cours d'informatique en ligne</p>
                                </div>
                            </div>
                        </div>

                        <div class="window" id="calculatorWindow" style="top: 110px; left: 110px;">
                            <div class="window-header">
                                <div class="window-title">🧮 Calculatrice</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('calculator')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="background: #000; color: #00ff00; padding: 12px; border-radius: 8px; text-align: right; font-family: 'Courier New', monospace; font-size: 1.2rem; margin-bottom: 12px;">
                                    2 + 2 = 4
                                </div>
                                <p style="font-size: 0.9rem; color: var(--text-muted);">Effectuez vos calculs rapidement</p>
                            </div>
                        </div>

                        <div class="window" id="notepadWindow" style="top: 140px; left: 140px;">
                            <div class="window-header">
                                <div class="window-title">📝 Bloc-notes</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('notepad')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="background: #fff; color: #000; padding: 12px; border-radius: 8px; font-family: 'Courier New', monospace; margin-bottom: 12px;">
                                    Cours d'informatique - Notes:<br>
                                    ✓ Apprendre les bases<br>
                                    ✓ Maîtriser le bureau<br>
                                    → Pratiquer régulièrement
                                </div>
                                <p style="font-size: 0.9rem; color: var(--text-muted);">Prenez des notes facilement</p>
                            </div>
                        </div>

                        <div class="window" id="photosWindow" style="top: 170px; left: 170px;">
                            <div class="window-header">
                                <div class="window-title">🖼️ Galerie Photos</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('photos')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 12px;">
                                    <div style="aspect-ratio: 1; background: linear-gradient(45deg, #ff6b6b, #feca57); border-radius: 6px; display: flex; align-items: center; justify-content: center;">🏖️</div>
                                    <div style="aspect-ratio: 1; background: linear-gradient(45deg, #48dbfb, #0abde3); border-radius: 6px; display: flex; align-items: center; justify-content: center;">🌊</div>
                                    <div style="aspect-ratio: 1; background: linear-gradient(45deg, #1dd1a1, #10ac84); border-radius: 6px; display: flex; align-items: center; justify-content: center;">🌳</div>
                                </div>
                                <p style="font-size: 0.9rem; color: var(--text-muted);">Vos souvenirs en images</p>
                            </div>
                        </div>

                        <div class="window" id="musicWindow" style="top: 200px; left: 200px;">
                            <div class="window-header">
                                <div class="window-title">🎵 Lecteur de Musique</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('music')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="text-align: center; margin-bottom: 12px;">
                                    <div style="font-size: 2rem; margin-bottom: 8px;">🎵</div>
                                    <div style="font-weight: 600;">Ma Playlist Préférée</div>
                                    <div style="color: var(--text-muted); font-size: 0.9rem;">12 titres • 45 minutes</div>
                                    <div style="margin-top: 12px; display: flex; justify-content: center; gap: 12px;">
                                        <span style="cursor: pointer;">⏮️</span>
                                        <span style="cursor: pointer; font-size: 1.2rem;">▶️</span>
                                        <span style="cursor: pointer;">⏭️</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="window" id="gamesWindow" style="top: 60px; left: 250px;">
                            <div class="window-header">
                                <div class="window-title">🎮 Centre de Jeux</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('games')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                                    <div style="text-align: center; padding: 12px; background: var(--surface-primary); border-radius: 8px; cursor: pointer;">
                                        <div style="font-size: 1.5rem; margin-bottom: 4px;">🎯</div>
                                        <div style="font-size: 0.85rem;">Jeu de réflexes</div>
                                    </div>
                                    <div style="text-align: center; padding: 12px; background: var(--surface-primary); border-radius: 8px; cursor: pointer;">
                                        <div style="font-size: 1.5rem; margin-bottom: 4px;">🧩</div>
                                        <div style="font-size: 0.85rem;">Puzzle</div>
                                    </div>
                                </div>
                                <p style="font-size: 0.9rem; color: var(--text-muted); margin-top: 12px; text-align: center;">Détendez-vous avec nos jeux</p>
                            </div>
                        </div>

                        <div class="window" id="settingsWindow" style="top: 90px; left: 280px;">
                            <div class="window-header">
                                <div class="window-title">⚙️ Paramètres Système</div>
                                <div class="window-controls">
                                    <div class="window-control close" onclick="closeWindow('settings')"></div>
                                    <div class="window-control minimize"></div>
                                    <div class="window-control maximize"></div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 8px; background: var(--surface-primary); border-radius: 6px; cursor: pointer;">
                                        <span>🖥️</span>
                                        <span style="font-size: 0.9rem;">Affichage</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 8px; background: var(--surface-primary); border-radius: 6px; cursor: pointer;">
                                        <span>🔊</span>
                                        <span style="font-size: 0.9rem;">Son</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 8px; background: var(--surface-primary); border-radius: 6px; cursor: pointer;">
                                        <span>🌐</span>
                                        <span style="font-size: 0.9rem;">Réseau</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 8px; background: var(--surface-primary); border-radius: 6px; cursor: pointer;">
                                        <span>🔒</span>
                                        <span style="font-size: 0.9rem;">Sécurité</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 20px; padding: 16px; background: var(--surface-primary); border-radius: var(--border-radius); border-left: 4px solid var(--desktop-gradient);">
                    <p style="color: var(--text-secondary); font-weight: 500;">
                        💡 <strong>Conseil :</strong> Double-cliquez sur les icônes pour ouvrir les applications. 
                        Utilisez les boutons de fenêtre (○ ○ ○) pour fermer, réduire ou agrandir.
                    </p>
                </div>
            </div>
        </section>

        <!-- Section 3: Clavier & Souris -->
        <section id="input" class="content-section input animate-on-scroll">
            <div class="section-header">
                <div class="section-number input">3</div>
                <h2 class="section-title">Clavier et Souris</h2>
            </div>

            <div class="definition-content">
                <p>Le clavier et la souris sont vos outils de communication avec l'ordinateur. Maîtriser ces périphériques vous permettra d'être plus efficace et plus rapide dans toutes vos tâches.</p>

                <div class="input-devices">
                    <!-- Clavier -->
                    <div class="device-card">
                        <div class="device-icon">⌨️</div>
                        <h3 class="device-title">Le Clavier</h3>
                        <p class="device-description">Permet de saisir du texte, des chiffres et d'utiliser des raccourcis pour contrôler l'ordinateur plus rapidement.</p>
                        
                        <div class="keyboard-simulator">
                            <div class="keyboard-grid" id="keyboardGrid">
                                <!-- Les touches seront générées par JavaScript -->
                            </div>
                            
                            <div class="typing-area">
                                <div class="typing-display" id="typingDisplay">Tapez sur les touches ci-dessus pour voir le texte apparaître...</div>
                                <button onclick="clearText()" style="margin-top: 8px; padding: 6px 12px; background: var(--surface-primary); border: 1px solid var(--border-primary); border-radius: 6px; color: var(--text-secondary); cursor: pointer;">
                                    Effacer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Souris -->
                    <div class="device-card">
                        <div class="device-icon">🖱️</div>
                        <h3 class="device-title">La Souris</h3>
                        <p class="device-description">Contrôle le curseur à l'écran pour cliquer, sélectionner, faire glisser et interagir avec l'interface graphique.</p>
                        
                        <div class="mouse-area" id="mouseArea">
                            <div class="mouse-cursor" id="mouseCursor"></div>
                            <div class="mouse-instructions">
                                Bougez votre souris ici et cliquez !
                            </div>
                        </div>
                        
                        <div style="margin-top: 16px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; font-size: 0.85rem; text-align: center;">
                            <div style="padding: 8px; background: var(--surface-primary); border-radius: 6px;">
                                <div style="font-weight: 600; margin-bottom: 4px;">Clic Gauche</div>
                                <div style="color: var(--text-muted);">Sélectionner</div>
                            </div>
                            <div style="padding: 8px; background: var(--surface-primary); border-radius: 6px;">
                                <div style="font-weight: 600; margin-bottom: 4px;">Clic Droit</div>
                                <div style="color: var(--text-muted);">Menu contextuel</div>
                            </div>
                            <div style="padding: 8px; background: var(--surface-primary); border-radius: 6px;">
                                <div style="font-weight: 600; margin-bottom: 4px;">Molette</div>
                                <div style="color: var(--text-muted);">Défilement</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tips et astuces -->
                <div class="tips-section">
                    <h3 class="tips-title">💡 Conseils et Raccourcis Essentiels</h3>
                    
                    <div class="tips-grid">
                        <div class="tip-card">
                            <div class="tip-icon">⌨️</div>
                            <h4 class="tip-title">Raccourcis Clavier</h4>
                            <p class="tip-description">Ctrl+C (copier), Ctrl+V (coller), Ctrl+Z (annuler), Ctrl+S (sauvegarder) vous feront gagner un temps précieux.</p>
                        </div>

                        <div class="tip-card">
                            <div class="tip-icon">🖱️</div>
                            <h4 class="tip-title">Double-Clic</h4>
                            <p class="tip-description">Double-cliquez rapidement sur une icône pour ouvrir un programme ou un fichier. Pratique pour lancer vos applications favorites.</p>
                        </div>

                        <div class="tip-card">
                            <div class="tip-icon">🎯</div>
                            <h4 class="tip-title">Glisser-Déposer</h4>
                            <p class="tip-description">Maintenez le clic gauche sur un fichier et déplacez-le vers un dossier pour le déplacer ou l'organiser facilement.</p>
                        </div>

                        <div class="tip-card">
                            <div class="tip-icon">🔄</div>
                            <h4 class="tip-title">Molette de Défilement</h4>
                            <p class="tip-description">Utilisez la molette pour naviguer dans les pages web et documents longs sans utiliser les barres de défilement.</p>
                        </div>

                        <div class="tip-card">
                            <div class="tip-icon">✋</div>
                            <h4 class="tip-title">Position des Mains</h4>
                            <p class="tip-description">Gardez vos poignets droits et détendus. Utilisez tous vos doigts pour taper plus vite et éviter la fatigue.</p>
                        </div>

                        <div class="tip-card">
                            <div class="tip-icon">🎨</div>
                            <h4 class="tip-title">Personnalisation</h4>
                            <p class="tip-description">Ajustez la vitesse de la souris et la répétition du clavier dans les paramètres pour un confort optimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="action-buttons animate-on-scroll">
            <button class="btn btn-primary" onclick="showPracticeMode()">
                <i class="fas fa-hands"></i>
                Mode Pratique
            </button>
            <button class="btn btn-secondary" onclick="showKeyboardTest()">
                <i class="fas fa-keyboard"></i>
                Test de Frappe
            </button>
            <button class="btn btn-secondary" onclick="downloadGuide()">
                <i class="fas fa-download"></i>
                Guide PDF
            </button>
            <button class="btn btn-secondary" onclick="nextLesson()">
                <i class="fas fa-arrow-right"></i>
                Leçon Suivante
            </button>
        </div>
    </div>

    <script>
        // État de l'ordinateur
        let computerState = 'off'; // off, starting, on
        let openWindows = new Set();

        // Génération du clavier
        function generateKeyboard() {
            const keyboardGrid = document.getElementById('keyboardGrid');
            const keys = [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
                'A', 'Z', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P',
                'Q', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M',
                'W', 'X', 'C', 'V', 'B', 'N', '?', '.', '!', '⌫'
            ];

            keyboardGrid.innerHTML = '';
            
            keys.forEach((key, index) => {
                const keyElement = document.createElement('div');
                keyElement.className = 'key';
                keyElement.textContent = key;
                
                if (key === ' ') {
                    keyElement.className += ' space';
                    keyElement.textContent = 'ESPACE';
                }
                
                keyElement.addEventListener('click', () => {
                    handleKeyPress(key);
                    keyElement.classList.add('pressed');
                    setTimeout(() => {
                        keyElement.classList.remove('pressed');
                    }, 150);
                });
                
                keyboardGrid.appendChild(keyElement);
            });

            // Ajout de la barre d'espace
            const spaceKey = document.createElement('div');
            spaceKey.className = 'key space';
            spaceKey.textContent = 'ESPACE';
            spaceKey.addEventListener('click', () => {
                handleKeyPress(' ');
                spaceKey.classList.add('pressed');
                setTimeout(() => {
                    spaceKey.classList.remove('pressed');
                }, 150);
            });
            keyboardGrid.appendChild(spaceKey);
        }

        // Gestion des touches du clavier
        function handleKeyPress(key) {
            const typingDisplay = document.getElementById('typingDisplay');
            let currentText = typingDisplay.textContent;
            
            if (currentText === 'Tapez sur les touches ci-dessus pour voir le texte apparaître...') {
                currentText = '';
            }
            
            if (key === '⌫') {
                // Backspace
                currentText = currentText.slice(0, -1);
            } else {
                currentText += key.toLowerCase();
            }
            
            typingDisplay.textContent = currentText || 'Tapez sur les touches ci-dessus pour voir le texte apparaître...';
        }

        // Effacer le texte
        function clearText() {
            document.getElementById('typingDisplay').textContent = 'Tapez sur les touches ci-dessus pour voir le texte apparaître...';
        }

        // Gestion de la souris
        function setupMouseArea() {
            const mouseArea = document.getElementById('mouseArea');
            const mouseCursor = document.getElementById('mouseCursor');
            
            mouseArea.addEventListener('mousemove', (e) => {
                const rect = mouseArea.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                mouseCursor.style.left = x - 10 + 'px';
                mouseCursor.style.top = y - 10 + 'px';
                mouseCursor.style.display = 'block';
                
                // Créer une trainée
                createMouseTrail(x, y);
            });
            
            mouseArea.addEventListener('mouseleave', () => {
                mouseCursor.style.display = 'none';
            });
            
            mouseArea.addEventListener('click', (e) => {
                const rect = mouseArea.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                createClickEffect(x, y);
                showNotification('Excellent ! Vous maîtrisez le clic ! 🎯', 'success');
            });
        }

        // Créer une trainée de souris
        function createMouseTrail(x, y) {
            const trail = document.createElement('div');
            trail.className = 'mouse-trail';
            trail.style.left = x - 4 + 'px';
            trail.style.top = y - 4 + 'px';
            
            document.getElementById('mouseArea').appendChild(trail);
            
            setTimeout(() => {
                trail.remove();
            }, 1000);
        }

        // Créer un effet de clic
        function createClickEffect(x, y) {
            const effect = document.createElement('div');
            effect.className = 'click-effect';
            effect.style.left = x - 15 + 'px';
            effect.style.top = y - 15 + 'px';
            
            document.getElementById('mouseArea').appendChild(effect);
            
            setTimeout(() => {
                effect.remove();
            }, 600);
        }

        // Fonctions de gestion de l'alimentation
        function powerOn() {
            if (computerState === 'off') {
                computerState = 'starting';
                const display = document.getElementById('computerDisplay');
                const content = document.getElementById('screenContent');
                
                display.className = 'computer-display starting';
                content.className = 'screen-starting';
                content.innerHTML = '⚡ Démarrage en cours...<br><small>Chargement du système</small>';
                
                showNotification('💻 Ordinateur en cours de démarrage...', 'info');
                
                setTimeout(() => {
                    computerState = 'on';
                    display.className = 'computer-display on';
                    content.className = 'screen-on';
                    content.innerHTML = '✅ Système prêt !<br><small>Ordinateur opérationnel</small>';
                    showNotification('🎉 Ordinateur démarré avec succès !', 'success');
                }, 3000);
            } else {
                showNotification('💡 Ordinateur déjà allumé ou en cours de démarrage', 'warning');
            }
        }

        function powerOff() {
            if (computerState === 'on') {
                computerState = 'off';
                const display = document.getElementById('computerDisplay');
                const content = document.getElementById('screenContent');
                
                display.className = 'computer-display off';
                content.className = 'screen-off';
                content.innerHTML = '💤 Ordinateur éteint<br><small>Appuyez sur le bouton d\'alimentation</small>';
                
                // Fermer toutes les fenêtres
                openWindows.forEach(windowId => {
                    closeWindow(windowId);
                });
                
                showNotification('💤 Ordinateur éteint correctement', 'success');
            } else {
                showNotification('💡 Ordinateur déjà éteint', 'warning');
            }
        }

        function restart() {
            if (computerState === 'on') {
                showNotification('🔄 Redémarrage en cours...', 'info');
                powerOff();
                setTimeout(() => {
                    powerOn();
                }, 1000);
            } else {
                showNotification('💡 Démarrez d\'abord l\'ordinateur', 'warning');
            }
        }

        // Gestion des fenêtres
        function openWindow(windowType) {
            if (computerState !== 'on') {
                showNotification('💻 Démarrez d\'abord l\'ordinateur !', 'warning');
                return;
            }

            const windowId = windowType + 'Window';
            const window = document.getElementById(windowId);
            
            if (window && !openWindows.has(windowType)) {
                window.classList.add('show');
                openWindows.add(windowType);
                
                const appNames = {
                    documents: 'Mes Documents',
                    browser: 'Navigateur Web',
                    calculator: 'Calculatrice',
                    notepad: 'Bloc-notes',
                    photos: 'Galerie Photos',
                    music: 'Lecteur de Musique',
                    games: 'Centre de Jeux',
                    settings: 'Paramètres Système'
                };
                
                showNotification(`📂 ${appNames[windowType]} ouvert !`, 'success');
            }
        }

        function closeWindow(windowType) {
            const windowId = windowType + 'Window';
            const window = document.getElementById(windowId);
            
            if (window) {
                window.classList.remove('show');
                openWindows.delete(windowType);
            }
        }

        // Mise à jour de l'heure
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('fr-FR', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            const timeElement = document.getElementById('currentTime');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
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
        function showPracticeMode() {
            showNotification('🎮 Mode pratique interactif disponible bientôt !', 'info');
        }

        function showKeyboardTest() {
            showNotification('⌨️ Test de vitesse de frappe en développement !', 'info');
        }

        function downloadGuide() {
            showNotification('📄 Téléchargement du guide "Utilisation de Base" - PDF...', 'success');
        }

        function nextLesson() {
            showNotification('📚 Prochaine leçon : "Bureautique" - Redirection en cours...', 'info');
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
                if (e.ctrlKey && e.key === 'p') {
                    e.preventDefault();
                    showPracticeMode();
                }
                
                if (e.ctrlKey && e.key === 't') {
                    e.preventDefault();
                    showKeyboardTest();
                }
                
                // Simuler une touche du clavier virtuel
                if (e.key.length === 1 || e.key === 'Backspace') {
                    const key = e.key === 'Backspace' ? '⌫' : e.key.toUpperCase();
                    const keyElement = Array.from(document.querySelectorAll('.key')).find(el => el.textContent === key);
                    if (keyElement) {
                        keyElement.classList.add('pressed');
                        setTimeout(() => {
                            keyElement.classList.remove('pressed');
                        }, 150);
                    }
                    handleKeyPress(key);
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
            generateKeyboard();
            setupMouseArea();
            
            // Mettre à jour l'heure toutes les minutes
            updateTime();
            setInterval(updateTime, 60000);
            
            // Message de bienvenue
            setTimeout(() => {
                showNotification('🎯 Apprenez les gestes essentiels de l\'ordinateur !', 'success');
            }, 1500);
        });
    </script>
</body>
</html>