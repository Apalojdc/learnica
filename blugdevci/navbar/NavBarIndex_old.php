<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #0321cc79 0%, #000000ff 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0a0a0a;
            --card-bg: rgba(255, 255, 255, 0.05);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --border-color: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #e5e7eb;
            --text-muted: #9ca3af;
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.3);
            --shadow-md: 0 8px 32px rgba(0, 0, 0, 0.2);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.1);
            --border-radius: 16px;
            --border-radius-sm: 12px;
            --border-radius-lg: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--dark-bg);
            min-height: 100vh;
            line-height: 1.6;
            color: var(--text-primary);
        }

        /* Enhanced Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
            background: rgba(10, 10, 10, 0.9);
        }

        .navbar.scrolled {
            background: rgba(10, 10, 10, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-lg);
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        /* Logo Section Enhanced */
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 1001;
        }

        .logo-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.5rem;
            transition: var(--transition);
            position: relative;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .logo-link:hover .logo-icon::before {
            left: 100%;
        }

        .logo-link:hover .logo-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .logo-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        /* Navigation Links Enhanced */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 1.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--glass-bg);
            transform: scaleX(0);
            transform-origin: right;
            transition: var(--transition);
            z-index: -1;
        }

        .nav-link:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-link:hover {
            color: var(--text-primary);
            background: var(--card-bg);
            transform: translateY(-2px);
            border-color: var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .nav-link.active {
            color: var(--text-primary);
            background: var(--primary-gradient);
            border-color: rgba(102, 126, 234, 0.3);
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        }

        .nav-link.active::before {
            display: none;
        }

        .nav-icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Enhanced Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-indicator {
            font-size: 0.75rem;
            transition: var(--transition);
            margin-left: 0.5rem;
        }

        .dropdown:hover .dropdown-indicator {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 15px);
            left: 50%;
            transform: translateX(-50%);
            background: rgba(15, 15, 15, 0.98);
            backdrop-filter: blur(25px);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 1rem;
            min-width: 280px;
            opacity: 0;
            visibility: hidden;
            transform: translateX(-50%) translateY(-10px);
            transition: var(--transition);
            box-shadow: var(--shadow-lg);
            z-index: 1000;
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid rgba(15, 15, 15, 0.98);
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-item {
            list-style: none;
            margin: 0.25rem 0;
        }

        .dropdown-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1.25rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            font-size: 0.9rem;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .dropdown-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transform-origin: right;
            transition: var(--transition);
            z-index: -1;
            opacity: 0.1;
        }

        .dropdown-link:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .dropdown-link:hover {
            background: var(--card-bg);
            color: var(--text-primary);
            transform: translateX(8px);
            border-color: var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .dropdown-link.active {
            color: var(--text-primary);
            background: var(--primary-gradient);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .dropdown-icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            background: var(--glass-bg);
            border-radius: 6px;
            padding: 0.25rem;
        }

        /* Enhanced Search Bar */
        .search-container {
            position: relative;
            margin: 0 1.5rem;
        }

        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 320px;
            padding: 0.875rem 1.25rem 0.875rem 3rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            color: var(--text-primary);
            font-size: 0.9rem;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            outline: none;
        }

        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: var(--glass-bg);
            width: 380px;
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
            transition: var(--transition);
        }

        .search-input:focus + .search-icon {
            color: #667eea;
        }

        .search-suggestions {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: rgba(15, 15, 15, 0.98);
            backdrop-filter: blur(25px);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 1000;
        }

        .search-suggestions.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .suggestion-item {
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .suggestion-item:hover {
            background: var(--card-bg);
            color: var(--text-primary);
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        /* Enhanced User Section */
        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notifications {
            position: relative;
            cursor: pointer;
        }

        .notification-btn {
            width: 45px;
            height: 45px;
            background: var(--card-bg);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            transition: var(--transition);
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .notification-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transform: scale(0);
            transition: var(--transition);
            z-index: -1;
            opacity: 0.1;
        }

        .notification-btn:hover::before {
            transform: scale(1);
        }

        .notification-btn:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            width: 20px;
            height: 20px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: white;
            font-weight: 700;
            border: 2px solid var(--dark-bg);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Enhanced Auth Buttons */
        .auth-buttons {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .auth-btn {
            padding: 0.875rem 1.75rem;
            border-radius: var(--border-radius-sm);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .auth-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .auth-btn:hover::before {
            left: 100%;
        }

        .login-btn {
            color: var(--text-secondary);
            background: var(--card-bg);
            border-color: var(--border-color);
        }

        .login-btn:hover {
            background: var(--glass-bg);
            color: var(--text-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .signup-btn {
            color: var(--text-primary);
            background: var(--primary-gradient);
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }

        /* Enhanced Mobile Menu */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--border-radius-sm);
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .mobile-menu-btn:hover {
            background: var(--glass-bg);
            transform: translateY(-2px);
        }

        .mobile-menu-btn span {
            width: 24px;
            height: 2px;
            background: var(--primary-gradient);
            margin: 3px 0;
            transition: var(--transition);
            border-radius: 2px;
        }

        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-8px, 6px);
        }

        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(45deg) translate(-8px, -6px);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 40%, rgba(102, 126, 234, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 70% 60%, rgba(118, 75, 162, 0.15) 0%, transparent 50%);
        }

        .hero-content {
            max-width: 900px;
            padding: 0 2rem;
            z-index: 1;
        }

        .hero h1 {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            background-color: orange;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .hero p {
            font-size: 1rem;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 2.5rem;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            font-weight: 700;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.4);
        }

        /* Enhanced Animated Contact Buttons */
        .contact-buttons {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .contact-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
            animation: float 3s ease-in-out infinite;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        /* Pulse Animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Heartbeat Animation */
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1.05); }
            75% { transform: scale(1.15); }
        }

        /* Shake Animation */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-2px); }
            75% { transform: translateX(2px); }
        }

        /* Bounce Animation */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Glow Animation */
        @keyframes glow {
            0%, 100% { filter: drop-shadow(0 0 5px currentColor); }
            50% { filter: drop-shadow(0 0 20px currentColor); }
        }

        /* Rotate Animation */
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Ripple Effect */
        .contact-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: scale(0);
            transition: var(--transition);
        }

        .contact-btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: scale(0);
            transition: var(--transition);
            animation: ripple 2s infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 0;
            }
        }

        .contact-btn:hover::before {
            transform: scale(1);
        }

        .contact-btn:hover {
            transform: scale(1.1) translateY(-2px);
            animation: heartbeat 1s ease-in-out infinite;
        }

        /* WhatsApp Button Animations */
        .whatsapp-btn {
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            animation: float 3s ease-in-out infinite, pulse 2s ease-in-out infinite;
        }

        .whatsapp-btn:hover {
            background: linear-gradient(135deg, #128c7e 0%, #25d366 100%);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
            animation: heartbeat 0.8s ease-in-out infinite, glow 1.5s ease-in-out infinite;
        }

        .whatsapp-btn:active {
            animation: shake 0.5s ease-in-out;
        }

        .whatsapp-btn i {
            transition: var(--transition);
        }

        .whatsapp-btn:hover i {
            animation: bounce 1s ease-in-out infinite;
        }

        /* Telegram Button Animations */
        .telegram-btn {
            background: linear-gradient(135deg, #0088cc 0%, #006699 100%);
            box-shadow: 0 4px 20px rgba(0, 136, 204, 0.4);
            animation: float 3s ease-in-out infinite 0.5s, pulse 2s ease-in-out infinite 0.3s;
        }

        .telegram-btn:hover {
            background: linear-gradient(135deg, #006699 0%, #0088cc 100%);
            box-shadow: 0 8px 30px rgba(0, 136, 204, 0.6);
            animation: heartbeat 0.8s ease-in-out infinite, glow 1.5s ease-in-out infinite;
        }

        .telegram-btn:active {
            animation: shake 0.5s ease-in-out;
        }

        .telegram-btn i {
            transition: var(--transition);
        }

        .telegram-btn:hover i {
            animation: rotate 2s linear infinite;
        }

        /* Notification Dot Animation */
        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 12px;
            height: 12px;
            background: #ff4444;
            border-radius: 50%;
            animation: pulse 2s infinite;
            border: 2px solid white;
        }

        /* Enhanced Hover Effects */
        .contact-btn:hover::after {
            animation: ripple 0.6s ease-out;
        }

        /* Focus Animation for Accessibility */
        .contact-btn:focus {
            outline: none;
            animation: glow 1s ease-in-out infinite;
        }

        /* Click Animation */
        .contact-btn:active {
            transform: scale(0.95);
            transition: transform 0.1s ease;
        }

        /* Enhanced animations for contact buttons */
        @keyframes clickRipple {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 0;
            }
        }

        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        @keyframes slideInRight {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }

        /* Enhanced notification dot */
        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 12px;
            height: 12px;
            background: linear-gradient(45deg, #ff4444, #ff6666);
            border-radius: 50%;
            animation: pulse 2s infinite, wiggle 3s ease-in-out infinite;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(255, 68, 68, 0.4);
        }

        /* Advanced hover effects */
        .contact-btn:hover .notification-dot {
            animation: heartbeat 0.8s ease-in-out infinite;
        }

        /* Continuous subtle animations */
        .whatsapp-btn::before {
            animation: pulse 3s ease-in-out infinite;
        }

        .telegram-btn::before {
            animation: pulse 3s ease-in-out infinite 1s;
        }

        /* Enhanced Responsive Design */
        @media (max-width: 1024px) {
            .search-container {
                display: none;
            }
            
            .navbar-container {
                padding: 0 1.5rem;
            }
            
            .search-input {
                width: 280px;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }
            
            .nav-links {
                position: fixed;
                top: 80px;
                left: 0;
                right: 0;
                background: rgba(10, 10, 10, 0.98);
                backdrop-filter: blur(25px);
                border-top: 1px solid var(--border-color);
                flex-direction: column;
                padding: 2rem;
                gap: 1rem;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                box-shadow: var(--shadow-lg);
            }
            
            .nav-links.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .nav-link {
                padding: 1rem 1.5rem;
                border-radius: var(--border-radius-sm);
                background: var(--card-bg);
                border: 1px solid var(--border-color);
                justify-content: center;
            }
            
            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                background: var(--glass-bg);
                margin-top: 1rem;
                box-shadow: none;
                border: none;
            }
            
            .user-section {
                position: fixed;
                top: 80px;
                right: 0;
                background: rgba(10, 10, 10, 0.98);
                backdrop-filter: blur(25px);
                border-top: 1px solid var(--border-color);
                border-left: 1px solid var(--border-color);
                flex-direction: column;
                padding: 2rem;
                gap: 1rem;
                transform: translateX(100%);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                width: 300px;
                box-shadow: var(--shadow-lg);
            }
            
            .user-section.active {
                transform: translateX(0);
                opacity: 1;
                visibility: visible;
            }
            
            .auth-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .auth-btn {
                text-align: center;
                padding: 1rem;
                width: 100%;
            }
            
            .hero h1 {
                font-size: 3rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .navbar-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .contact-buttons {
                bottom: 1rem;
                right: 1rem;
            }
            
            .contact-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .navbar-container {
                height: 70px;
            }
        }

        /* Loading Animation */
        .loading-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 1001;
        }

        .loading-indicator.active {
            transform: scaleX(1);
        }

        /* Smooth Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }
    </style>
</head>
<body>
    <div class="loading-indicator" id="loadingIndicator"></div>
    
    <!-- Enhanced Navigation -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <!-- Enhanced Logo -->
            <!-- <div class="logo">
                <a href="/" class="logo-link">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="logo-text">DocsPro</span>
                </a>
            </div> -->

            <!-- Enhanced Navigation Links -->
            <ul class="nav-links" id="navLinks">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        Formation
                        <i class="dropdown-indicator fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="/formation/cv" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <strong>CV Professionnel</strong>
                                    <small style="display: block; opacity: 0.7;">Créer un CV moderne</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="/formation/php" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fab fa-php"></i>
                                </div>
                                <div>
                                    <strong>Formation PHP</strong>
                                    <small style="display: block; opacity: 0.7;">Développement backend</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="/formation/web" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fab fa-html5"></i>
                                </div>
                                <div>
                                    <strong>HTML5/CSS3</strong>
                                    <small style="display: block; opacity: 0.7;">Développement frontend</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="/formation/design" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fas fa-paint-brush"></i>
                                </div>
                                <div>
                                    <strong>Design Graphique</strong>
                                    <small style="display: block; opacity: 0.7;">Créativité numérique</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="/formation/flutter" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fab fa-flutter"></i>
                                </div>
                                <div>
                                    <strong>Flutter</strong>
                                    <small style="display: block; opacity: 0.7;">Apps mobiles</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="/formation/memoires" class="dropdown-link">
                                <div class="dropdown-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <strong>Mémoires & Thèses</strong>
                                    <small style="display: block; opacity: 0.7;">Recherche académique</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="/monblug/home/forum/read_forum" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        Forum
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/monblug/home/blogs/blog_page" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tutoriel/fprmation/php/videos" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        Tutoriels
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/monblug/home/contact/contact" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Enhanced Search Bar -->
            <div class="search-container">
                <div class="search-wrapper">
                    <input type="text" class="search-input" placeholder="Rechercher des formations, CV, documents..." id="searchInput">
                    <i class="search-icon fas fa-search"></i>
                </div>
                <div class="search-suggestions" id="searchSuggestions">
                    <div class="suggestion-item">Formation PHP avancée</div>
                    <div class="suggestion-item">Créer un CV professionnel</div>
                    <div class="suggestion-item">Design graphique moderne</div>
                    <div class="suggestion-item">Développement Flutter</div>
                </div>
            </div>

            <!-- Enhanced User Section -->
            <div class="user-section" id="userSection">
                <!-- Notifications -->
                <!-- <div class="notifications">
                    <div class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">5</span>
                    </div>
                </div> -->

                <!-- Auth Buttons -->
                <div class="auth-buttons">
                    <a href="/monblug/blugdevci/login/authentification.php" class="auth-btn login-btn">
                        <i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>
                        Se connecter ou s'inscrire
                    </a>
                    <a href="/register" class="auth-btn signup-btn" style="display:none">
                        <i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>
                        S'inscrire
                    </a>
                </div>
            </div>

            <!-- Enhanced Mobile Menu Button -->
            <div class="mobile-menu-btn" id="mobileMenuBtn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Enhanced Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Plateforme de Formation Professionnelle et Académique.</h1>
            <p>Découvrez nos formations premium, créez votre CV professionnel et rejoignez une communauté d'apprenants passionnés. Développez vos compétences avec les meilleurs experts.</p>
            <a href="/monblug/home/forum/read_forum" class="cta-button">
                <i class="fas fa-rocket"></i>
                Créer mon CV Pro
            </a>
        </div>
    </section>

    <!-- Enhanced Contact Buttons -->
    <div class="contact-buttons">
        <a href="https://t.me/docspdfgratuit" class="contact-btn telegram-btn" title="Rejoindre notre chaîne Telegram">
            <i class="fab fa-telegram-plane"></i>
        </a>
        <a href="https://t.me/docspdfgratuit" class="contact-btn telegram-btn" title="Rejoindre notre chaîne Telegram">
            <i class="fab fa-telegram-plane"></i>
        </a>
        <a href="https://chat.whatsapp.com/KyBCjg36sJS1DhyWyR0K72" class="contact-btn whatsapp-btn" title="Rejoindre notre groupe WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <script>
        // Enhanced Navigation Script
        class EnhancedNavigation {
            constructor() {
                this.navbar = document.getElementById('navbar');
                this.navLinks = document.getElementById('navLinks');
                this.userSection = document.getElementById('userSection');
                this.mobileMenuBtn = document.getElementById('mobileMenuBtn');
                this.searchInput = document.getElementById('searchInput');
                this.searchSuggestions = document.getElementById('searchSuggestions');
                this.loadingIndicator = document.getElementById('loadingIndicator');
                this.contactButtons = document.querySelectorAll('.contact-btn');
                
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupScrollEffect();
                this.setupSearchFunctionality();
                this.setupActiveStates();
                this.setupAnimations();
                this.setupContactButtonAnimations();
                this.setupIntersectionObserver();
            }

            setupEventListeners() {
                // Mobile menu toggle
                this.mobileMenuBtn.addEventListener('click', () => this.toggleMobileMenu());
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', (e) => this.handleOutsideClick(e));
                
                // Navigation link clicks
                document.querySelectorAll('.nav-link, .dropdown-link').forEach(link => {
                    link.addEventListener('click', (e) => this.handleNavClick(e));
                });

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', (e) => this.handleAnchorClick(e));
                });

                // Button animations
                document.querySelectorAll('.auth-btn, .cta-button').forEach(button => {
                    button.addEventListener('click', (e) => this.animateButton(e));
                });

                // Notification click
                document.querySelector('.notifications').addEventListener('click', () => {
                    this.handleNotificationClick();
                });
            }

            setupScrollEffect() {
                let lastScrollY = window.scrollY;
                
                window.addEventListener('scroll', () => {
                    const currentScrollY = window.scrollY;
                    
                    // Add/remove scrolled class
                    if (currentScrollY > 50) {
                        this.navbar.classList.add('scrolled');
                    } else {
                        this.navbar.classList.remove('scrolled');
                    }
                    
                    // Hide/show navbar on scroll
                    if (currentScrollY > lastScrollY && currentScrollY > 100) {
                        this.navbar.style.transform = 'translateY(-100%)';
                    } else {
                        this.navbar.style.transform = 'translateY(0)';
                    }
                    
                    lastScrollY = currentScrollY;
                });
            }

            setupSearchFunctionality() {
                let searchTimeout;
                
                this.searchInput.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.trim();
                    
                    clearTimeout(searchTimeout);
                    
                    if (searchTerm.length > 0) {
                        this.searchSuggestions.classList.add('active');
                        
                        // Simulate search delay
                        searchTimeout = setTimeout(() => {
                            this.performSearch(searchTerm);
                        }, 300);
                    } else {
                        this.searchSuggestions.classList.remove('active');
                    }
                });

                this.searchInput.addEventListener('blur', () => {
                    setTimeout(() => {
                        this.searchSuggestions.classList.remove('active');
                    }, 200);
                });

                // Search suggestions click
                this.searchSuggestions.addEventListener('click', (e) => {
                    if (e.target.classList.contains('suggestion-item')) {
                        this.searchInput.value = e.target.textContent;
                        this.searchSuggestions.classList.remove('active');
                        this.performSearch(e.target.textContent);
                    }
                });
            }

            setupActiveStates() {
                const currentPath = window.location.pathname;
                
                // Set active state for current page
                document.querySelectorAll('.nav-link, .dropdown-link').forEach(link => {
                    if (link.getAttribute('href') === currentPath) {
                        link.classList.add('active');
                        
                        // Also set parent dropdown as active
                        const parentDropdown = link.closest('.dropdown');
                        if (parentDropdown) {
                            parentDropdown.querySelector('.nav-link').classList.add('active');
                        }
                    }
                });
            }

            setupAnimations() {
                // Intersection Observer for animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.animationPlayState = 'running';
                        }
                    });
                });

                // Observe animated elements
                document.querySelectorAll('.hero-content').forEach(el => {
                    observer.observe(el);
                });
            }

            toggleMobileMenu() {
                this.navLinks.classList.toggle('active');
                this.userSection.classList.toggle('active');
                this.mobileMenuBtn.classList.toggle('active');
            }

            handleOutsideClick(e) {
                const isClickInsideNav = this.navbar.contains(e.target);
                
                if (!isClickInsideNav && this.navLinks.classList.contains('active')) {
                    this.navLinks.classList.remove('active');
                    this.userSection.classList.remove('active');
                    this.mobileMenuBtn.classList.remove('active');
                }
            }

            handleNavClick(e) {
                const link = e.target.closest('a');
                if (!link) return;

                // Show loading indicator
                this.showLoading();

                // Remove active class from all links
                document.querySelectorAll('.nav-link, .dropdown-link').forEach(l => {
                    l.classList.remove('active');
                });

                // Add active class to clicked link
                link.classList.add('active');

                // Close mobile menu
                this.closeMobileMenu();

                // Simulate page load
                setTimeout(() => {
                    this.hideLoading();
                }, 1000);
            }

            handleAnchorClick(e) {
                e.preventDefault();
                const target = document.querySelector(e.target.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }

            animateButton(e) {
                const button = e.target;
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                }, 150);
            }

            handleNotificationClick() {
                console.log('Notifications clicked');
                // Add notification logic here
            }

            performSearch(searchTerm) {
                console.log('Searching for:', searchTerm);
                // Add search logic here
                this.showLoading();
                setTimeout(() => {
                    this.hideLoading();
                }, 500);
            }

            showLoading() {
                this.loadingIndicator.classList.add('active');
            }

            hideLoading() {
                this.loadingIndicator.classList.remove('active');
            }

            closeMobileMenu() {
                this.navLinks.classList.remove('active');
                this.userSection.classList.remove('active');
                this.mobileMenuBtn.classList.remove('active');
            }

            setupContactButtonAnimations() {
                // Add notification dots randomly
                this.addNotificationDots();
                
                // Enhanced click effects
                this.contactButtons.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        this.createClickEffect(e);
                        this.vibrate();
                    });
                    
                    btn.addEventListener('mouseenter', () => {
                        this.pauseAnimation(btn);
                    });
                    
                    btn.addEventListener('mouseleave', () => {
                        this.resumeAnimation(btn);
                    });
                });
            }

            addNotificationDots() {
                // Add notification dots to contact buttons randomly
                setInterval(() => {
                    this.contactButtons.forEach(btn => {
                        if (Math.random() < 0.3) { // 30% chance
                            this.addNotificationDot(btn);
                        }
                    });
                }, 10000); // Every 10 seconds
            }

            addNotificationDot(button) {
                // Remove existing dot
                const existingDot = button.querySelector('.notification-dot');
                if (existingDot) {
                    existingDot.remove();
                }
                
                // Add new dot
                const dot = document.createElement('div');
                dot.className = 'notification-dot';
                button.appendChild(dot);
                
                // Remove dot after 5 seconds
                setTimeout(() => {
                    if (dot.parentNode) {
                        dot.style.animation = 'fadeOut 0.5s ease-out';
                        setTimeout(() => {
                            dot.remove();
                        }, 500);
                    }
                }, 5000);
            }

            createClickEffect(e) {
                const button = e.currentTarget;
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                
                // Create ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    transform: scale(0);
                    animation: clickRipple 0.6s ease-out;
                    pointer-events: none;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${e.clientX - rect.left - size / 2}px;
                    top: ${e.clientY - rect.top - size / 2}px;
                `;
                
                button.appendChild(ripple);
                
                // Remove ripple after animation
                setTimeout(() => {
                    ripple.remove();
                }, 600);
                
                // Add success animation
                button.style.animation = 'successPulse 0.8s ease-out';
                setTimeout(() => {
                    button.style.animation = '';
                }, 800);
            }

            pauseAnimation(button) {
                button.style.animationPlayState = 'paused';
            }

            resumeAnimation(button) {
                button.style.animationPlayState = 'running';
            }

            vibrate() {
                // Vibrate on mobile devices
                if (navigator.vibrate) {
                    navigator.vibrate([100, 50, 100]);
                }
            }

            setupIntersectionObserver() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            // Add staggered animation to contact buttons
                            this.contactButtons.forEach((btn, index) => {
                                setTimeout(() => {
                                    btn.style.animation = `slideInRight 0.8s ease-out ${index * 0.2}s both`;
                                }, index * 100);
                            });
                        }
                    });
                }, { threshold: 0.1 });

                // Observe contact buttons container
                const contactContainer = document.querySelector('.contact-buttons');
                if (contactContainer) {
                    observer.observe(contactContainer);
                }
            }
        }

        // Initialize enhanced navigation
        document.addEventListener('DOMContentLoaded', () => {
            new EnhancedNavigation();
        });

        // Enhanced keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.getElementById('navLinks').classList.remove('active');
                document.getElementById('userSection').classList.remove('active');
                document.getElementById('mobileMenuBtn').classList.remove('active');
                document.getElementById('searchSuggestions').classList.remove('active');
            }
        });

        // Enhanced performance monitoring
        window.addEventListener('load', () => {
            const loadTime = performance.now();
            console.log(`Page loaded in ${loadTime.toFixed(2)}ms`);
        });
    </script>
</body>
</html>