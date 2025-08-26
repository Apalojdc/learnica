<?php 
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors',1);
include('config.php');
//include('imageconfig.php');
// function assets($path){
//         return BASE_URL.'/'. ltrim($path,'/');
//      }
include(__DIR__.'/login/connexion.php');
include(__DIR__.'/login/paginate.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagesite/simplecodeurlogo.ico" type="image/x-icon">
    <title>Learnica</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #ffffff;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }

        /* Particles Background Effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 255, 136, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 255, 136, 0.3);
            animation: logoGlow 3s ease-in-out infinite alternate;
            text-decoration: none;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 5px rgba(0, 255, 136, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(0, 255, 136, 0.6)); }
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: #b0b0b0;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-links a:hover {
            color: #00ff88;
            background: rgba(0, 255, 136, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.2);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        /* ==========================================================================
        Gestion de la video
        ========================================================================== */
        .demo-content{
            display: flex;
            gap: 2;
        }

        .video-box {
            width: 100%;
            height: 100%;
            border: 2px solid #004914ff;
            overflow: hidden;
            box-shadow: 9px 20px 20px 8px #00632ca6;
            }

            .video-box video {
            width: 100%;
            height: 100%;
            object-fit: fill; /* ou contain, fill, none, scale-down */
            opacity: 0.7;
            }

            .hero-content-text{
                text-align: justify;
                padding: 4rem;
                margin: 1rem;
            }
       
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero p {
            font-size: 1.2rem;
            color: #b0b0b0;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.4);
        }

        /* Sections */
        .features, .articles, .download-section, .complements-section, .why-documentation-section {
            padding: 5rem 0;
            position: relative;
            z-index: 2;
        }

  
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Feature Cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .feature-card p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Articles Section */
        .articles {
            background: rgba(0, 0, 0, 0.3);
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .article-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .article-content {
            padding: 2rem;
        }

        .article-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .article-card p {
            color: #b0b0b0;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .read-more {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        /* Why Documentation Section */
        .why-documentation-section {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0a0a0a 100%);
        }
        .why-documentation-section .why-doc-intro ul{
            text-align: justify;
            position: relative;
            top: 30px;
            left: 30%;
            list-style-type:none;
            /* width: 25%; */
        }

        .why-doc-intro {
            text-align: center;
            margin-bottom: 4rem;
        }

        .why-doc-subtitle {
            font-size: 1.3rem;
            color: #b0b0b0;
            font-style: italic;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .why-doc-subtitle_info {
            font-size: 1.1rem;
            padding:15px;
            color: #b0b0b0;
            font-style: italic;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
            text-align: justify;
        }

        .why-doc-main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .why-doc-primary-title {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .why-doc-primary-title i {
            color: #00ff88;
            margin-right: 1rem;
        }

        .why-doc-description {
            font-size: 1.1rem;
            color: #b0b0b0;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .why-doc-benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .why-doc-benefit-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .why-doc-benefit-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .why-doc-benefit-card:hover::before {
            left: 100%;
        }

        .why-doc-benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .why-doc-benefit-icon {
            font-size: 2.5rem;
            color: #00ff88;
            margin-bottom: 1rem;
        }

        .why-doc-benefit-card h4 {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .why-doc-benefit-card p {
            color: #b0b0b0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Sidebar Cards */
        .why-doc-sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .why-doc-stats-card,
        .why-doc-tips-card,
        .why-doc-quote-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 15px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .why-doc-stats-title,
        .why-doc-tips-title {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .why-doc-stats-title i,
        .why-doc-tips-title i {
            color: #00d4ff;
            margin-right: 0.5rem;
        }

        .why-doc-stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .why-doc-stat-label {
            color: #b0b0b0;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .why-doc-tips-list {
            list-style: none;
            padding: 0;
        }

        .why-doc-tip-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        .why-doc-tip-item i {
            color: #00ff88;
            margin-right: 0.8rem;
            margin-top: 0.2rem;
        }

        .why-doc-quote {
            font-style: italic;
            color: #b0b0b0;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            position: relative;
        }

        .why-doc-quote i {
            color: #00ff88;
            opacity: 0.6;
        }

        .why-doc-quote-author {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Conclusion Section */
        .why-doc-conclusion {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .why-doc-conclusion::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 300% 100%;
            animation: gradientShift 4s ease infinite;
        }

        .why-doc-conclusion-title {
            font-size: 2rem;
            color: #fff;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .why-doc-conclusion-title i {
            color: #00d4ff;
            margin-right: 1rem;
        }

        .why-doc-conclusion-text {
            font-size: 1.1rem;
            color: #b0b0b0;
            line-height: 1.8;
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .why-doc-cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .why-doc-cta-primary,
        .why-doc-cta-secondary {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .why-doc-cta-primary {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            box-shadow: 0 10px 30px rgba(0, 255, 136, 0.3);
        }

        .why-doc-cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 255, 136, 0.4);
        }

        .why-doc-cta-secondary {
            background: transparent;
            color: #00ff88;
            border: 2px solid #00ff88;
        }

        .why-doc-cta-secondary:hover {
            background: #00ff88;
            color: #000;
            transform: translateY(-3px);
        }

        /* Download Section */
        .download-section {
            background: rgba(0, 0, 0, 0.5);
        }

        .download-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .download-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .download-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
            border-radius: 20px 20px 0 0;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .download-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.4);
            border-color: rgba(0, 255, 136, 0.4);
        }

        .imagedocument {
            width: 290px !important;
            height: 50vh !important;
            border-radius: 12px !important;
            object-fit: cover;
            border: 2px solid rgba(0, 255, 136, 0.3);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .download-card:hover .imagedocument {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
            border-color: rgba(0, 255, 136, 0.6);
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .card-description {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .card-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            padding: 15px 0;
            border-top: 1px solid rgba(0, 255, 136, 0.2);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
        }

        .card-stats span {
            font-size: 0.85rem;
            color: #888;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .download-btn {
            display: inline-block;
            width: 100%;
            padding: 15px 25px;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 1rem;
        }

        .download-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
        }

        .download-btn:hover::before {
            left: 100%;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
        }

        /* Complements Section *****************************************/
        .complements-about-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            margin-top: 3rem;
        }

        .complements-nav-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .complements-nav-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 200% 100%;
            animation: shimmer 3s linear infinite;
        }

        .complements-nav-card h3 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .complements-nav-list {
            list-style: none;
            padding: 0;
        }

        .complements-nav-item {
            margin-bottom: 1rem;
        }

        .complements-nav-link {
            display: block;
            padding: 0.8rem 1rem;
            color: #b0b0b0;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .complements-nav-link:hover {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border-left-color: #00ff88;
            transform: translateX(5px);
        }

        .complements-nav-link i {
            margin-right: 0.5rem;
        }

        .about-devblog-card {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            overflow: hidden;
        }

        .about-devblog-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ff88, #00d4ff);
            background-size: 300% 100%;
            animation: gradientShift 4s ease infinite;
        }

        .about-devblog-card h3 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-devblog-content {
            color: #b0b0b0;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .about-devblog-content p {
            margin-bottom: 1.5rem;
        }

        .developer-info-box {
            background: linear-gradient(145deg, #2a2a2a, #1e1e1e);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .developer-info-box h4 {
            color: #00ff88;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .tech-stack-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .tech-badge {
            background: linear-gradient(45deg, #00ff88, #00d4ff);
            color: #000;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Footer */
        .footer {
            background: linear-gradient(145deg, #1e1e1e, #0a0a0a);
            padding: 3rem 0;
            border-top: 1px solid rgba(0, 255, 136, 0.2);
            position: relative;
            z-index: 2;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }

        .footer-content p {
            color: #b0b0b0;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: #b0b0b0;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #00ff88;
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .nav-links {
                display: none;
            }

            .features-grid,
            .articles-grid,
            .download-grid {
                grid-template-columns: 1fr;
            }

            .why-doc-main-grid,
            .complements-about-grid {
                grid-template-columns: 1fr;
                gap: 4rem;
            }
            .why-doc-benefit-card {
                max-width: 600px;
                position: relative;
                left: -11%;
                padding: 15px;
                margin: 30px;
            }
            .why-doc-hero-text {
                max-width: 500px;
                position: relative;
                left: -11%;
                padding: 15px;
                margin: 10px;
            }
            .why-doc-stats-card {
                max-width: 600px;
                position: relative;
                left: -11%;
                padding: 15px;
                margin: 30px;
            }
            .why-doc-tips-card {
                max-width: 600px;
                position: relative;
                left: -11%;
                padding: 15px;
                margin: 30px;
            }
            .why-doc-quote-card {
                max-width: 600px;
                position: relative;
                left: -11%;
                padding: 15px;
                margin: 10px;
            }
            

            .why-doc-primary-title {
                font-size: 1.2rem;
            }

            .why-doc-conclusion {
                padding: 2rem;
            }

            .why-doc-cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .why-doc-cta-primary,
            .why-doc-cta-secondary {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
            .why-documentation-section .why-doc-intro ul{
                position: relative;
                top: 30px;
                left: 0;
                /* width: 25%; */
                padding: 20px;
            }
            
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    <?php include(__DIR__.'/navbar/NavBarIndex.php'); ?>

    <!-- Why Documentation Section -->
     <!-- Contenu de démonstration -->
    <div class="demo-content">
        <div class="video-box">
            <video autoplay loop muted playsinline>
                <source src="https://v.ftcdn.net/11/65/68/99/700_F_1165689982_M6Eyw4XoaALpOGDsRJjpYiBEALbvvPqG_ST.mp4" type="video/mp4">
            </video>
        </div>
        <div class="hero-content-text">
            <h1>Bienvenue sur Lernica</h1>
            <p>
                Découvrez la plateforme idéale pour vous auto-former et faire évoluer vos
                compétences à votre rythme. Non seulement vous y trouverez des centaines de 
                documents gratuits soigneusement sélectionnés pour vous faire progresser 
                rapidement, mais aussi des tutoriels pratiques qui vous guident pas à pas. 
                Pour aller encore plus loin, notre blog vous offre des conseils, des astuces et 
                des idées inspirantes, tandis que notre forum vous permet d’échanger, de poser vos 
                questions et de partager vos expériences avec une communauté passionnée. 
                Plus besoin de chercher partout : ici, tout est réuni pour apprendre, progresser et 
                réussir.
            </p>
        </div>
    </div>
    <section class="why-documentation-section">
        <h2 class="section-title fade-in">Découvrez tout ce que Learnica vous offre</h2>
        <div class="why-doc-intro fade-in">
            <p class="why-doc-subtitle_info">
                Vous cherchez un endroit unique pour apprendre, partager et trouver des ressources utiles ?  
                <strong>Learnica</strong> met à votre disposition tout ce qu’il faut pour progresser dans vos projets et élargir vos connaissances, gratuitement.  
                Ici, vous économisez un temps précieux : plus besoin de passer des heures sur Google à chercher un document PDF ou de vous perdre sur YouTube à visionner des tutoriels dispersés.  
                Tout est déjà classé, organisé et prêt à l’emploi. Il vous suffit de choisir la formation qui vous intéresse, et vous aurez tout à disposition de A à Z.
            </p>

            <ul>
                <li>📄 <strong>Documents PDF gratuits</strong> pour apprendre à votre rythme</li>
                <li>📚 <strong>Tutoriels gratuits</strong> clairs et détaillés</li>
                <li>📝 <strong>Un blog</strong> rempli de ressources et d’astuces</li>
                <li>💬 <strong>Un forum</strong> pour poser vos questions et échanger avec d'autres passionnés</li>
            </ul>
        </div>

        <div class="container">
            
            <h2 class="section-title fade-in">Pourquoi se Documenter ?</h2>
            <div class="why-doc-intro fade-in">
                <p class="why-doc-subtitle">La documentation n'est pas seulement une ressource - c'est votre superpouvoir en tant que développeur</p>
            </div>
            
            <div class="why-doc-main-grid">
                <!-- Left Column - Main Content -->
                <div class="why-doc-content-column fade-in">
                    <div class="why-doc-hero-text">
                        <h3 class="why-doc-primary-title">
                            <i class="fas fa-lightbulb"></i>
                            L'Art de la Documentation : Votre Clé vers l'Excellence
                        </h3>
                        <p class="why-doc-description">
                            Dans l'univers en constante évolution du développement informatique, la documentation représente bien plus qu'une simple collection d'informations. Elle constitue le pont entre l'ignorance et la maîtrise, entre la frustration et la créativité, entre l'amateur et l'expert.
                        </p>
                    </div>

                    <div class="why-doc-benefits-grid">
                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h4>Accélération de l'Apprentissage</h4>
                            <p>Une documentation bien structurée transforme des heures de recherche en minutes de compréhension. Elle vous permet d'assimiler rapidement les concepts complexes et d'appliquer immédiatement vos nouvelles connaissances.</p>
                        </div>

                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4>Prévention des Erreurs</h4>
                            <p>La documentation révèle les pièges courants, les bonnes pratiques et les erreurs à éviter. Elle vous épargne des heures de débogage en vous guidant vers les solutions éprouvées.</p>
                        </div>

                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4>Progression Professionnelle</h4>
                            <p>Maîtriser l'art de la documentation vous distingue sur le marché du travail. C'est un indicateur de professionnalisme et de capacité d'adaptation aux nouvelles technologies.</p>
                        </div>

                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4>Collaboration Efficace</h4>
                            <p>Une bonne documentation facilite le travail d'équipe, améliore la communication technique et assure la continuité des projets. Elle devient un langage commun entre développeurs.</p>
                        </div>

                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h4>Développement de l'Expertise</h4>
                            <p>En consultant régulièrement la documentation, vous développez une compréhension approfondie des technologies et cultivez une mentalité d'apprentissage continu.</p>
                        </div>

                        <div class="why-doc-benefit-card">
                            <div class="why-doc-benefit-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Gain de Temps Considérable</h4>
                            <p>Investir du temps dans la lecture de documentation vous fait économiser des heures précieuses à long terme. C'est un investissement rentable pour votre carrière.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Statistics & Tips -->
                <div class="why-doc-sidebar fade-in">
                    <div class="why-doc-stats-card">
                        <h4 class="why-doc-stats-title">
                            <i class="fas fa-chart-bar"></i>
                            Statistiques Révélatrices
                        </h4>
                        <div class="why-doc-stat-item">
                            <div class="why-doc-stat-number">87%</div>
                            <div class="why-doc-stat-label">des développeurs experts consultent la documentation quotidiennement</div>
                        </div>
                        <div class="why-doc-stat-item">
                            <div class="why-doc-stat-number">65%</div>
                            <div class="why-doc-stat-label">de réduction du temps de développement avec une bonne documentation</div>
                        </div>
                        <div class="why-doc-stat-item">
                            <div class="why-doc-stat-number">92%</div>
                            <div class="why-doc-stat-label">des erreurs évitées grâce à une documentation complète</div>
                        </div>
                    </div>

                    <div class="why-doc-tips-card">
                        <h4 class="why-doc-tips-title">
                            <i class="fas fa-lightbulb"></i>
                            Conseils d'Expert
                        </h4>
                        <ul class="why-doc-tips-list">
                            <li class="why-doc-tip-item">
                                <i class="fas fa-check"></i>
                                Consultez toujours la documentation officielle en premier
                            </li>
                            <li class="why-doc-tip-item">
                                <i class="fas fa-check"></i>
                                Bookmarkez les sections importantes pour un accès rapide
                            </li>
                            <li class="why-doc-tip-item">
                                <i class="fas fa-check"></i>
                                Pratiquez les exemples fournis dans la documentation
                            </li>
                            <li class="why-doc-tip-item">
                                <i class="fas fa-check"></i>
                                Créez vos propres notes basées sur la documentation
                            </li>
                            <li class="why-doc-tip-item">
                                <i class="fas fa-check"></i>
                                Restez à jour avec les nouvelles versions
                            </li>
                        </ul>
                    </div>

                    <div class="why-doc-quote-card">
                        <blockquote class="why-doc-quote">
                            <i class="fas fa-quote-left"></i>
                            La documentation est le meilleur ami du développeur. Elle ne vous jugera jamais, sera toujours disponible et vous guidera vers la solution.
                            <i class="fas fa-quote-right"></i>
                        </blockquote>
                        <cite class="why-doc-quote-author">— Coulibaly Apaloh</cite>
                    </div>
                </div>
            </div>

            <div class="why-doc-conclusion fade-in">
                <div class="why-doc-conclusion-content">
                    <h3 class="why-doc-conclusion-title">
                        <i class="fas fa-star"></i>
                        Transformez votre Approche du Développement
                    </h3>
                    <p class="why-doc-conclusion-text">
                        La documentation n'est pas un obstacle à votre créativité - c'est son catalyseur. Elle vous libère des contraintes techniques pour vous concentrer sur l'innovation. Faites de la documentation votre alliée, et regardez votre expertise s'épanouir de manière exponentielle.
                    </p>
                    <div class="why-doc-cta-buttons">
                        <a href="/monblug/home/telechargers" class="why-doc-cta-primary">
                            <i class="fas fa-book-open"></i>
                            Explorez Notre Documentation
                        </a>
                        <a href="/monblug/home/blogs/blog_page" class="why-doc-cta-secondary">
                            <i class="fas fa-newspaper"></i>
                            Lire Nos Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title fade-in">Pourquoi Learnica ?</h2>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Apprentissage Continu</h3>
                    <p>Des tutoriels détaillés et des guides pratiques pour vous accompagner dans votre progression.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-code-branch"></i>
                    </div>
                    <h3>Technologies Modernes</h3>
                    <p>Restez à jour avec les dernières technologies et frameworks du développement web.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Communauté Active</h3>
                    <p>Rejoignez une communauté passionnée de développeurs et partagez vos expériences.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="download-section" id="documents">
        <div class="container">
            <h2 class="section-title slide-up">Documents Populaires</h2>
            
            <div class="download-grid">
                <?php foreach ($MesPdf as $data): ?>
                    <div class="download-card slide-up">
                        <span class="card-icon">
                            <img src="<?= str_replace('../', '', $data['cheminimage']) ?>" alt="Image document" class="imagedocument">
                        </span>
                        <h3 class="card-title"><?= htmlspecialchars($data['NomPDF']) ?></h3>
                        <p class="card-description">Document PDF disponible au téléchargement immédiat.</p>
                        <div class="card-stats">
                            <span>📁 1 fichier</span>
                            <span>⭐ 5.0</span>
                            <span>💾 Taille variable</span>
                        </div>
                        <a download class="download-btn"
                            href="<?= 'files/' . rawurlencode(basename($data['Contenue'])) ?>">
                            📥 Télécharger
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

        <!-- Articles Section -->
    <section class="articles" id="articles">
        <div class="container">
            <h2 class="section-title fade-in">Articles Populaires</h2>
            <div class="articles-grid">
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRGB6mZ2zRVkN5YNXcxZKHjtquELRLoxWaSg&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Apprendre Laravel: le modèle MVC</h3>
                        <p>Un guide complet pour maîtriser Laravel, le framework PHP le plus populaire pour le développement web moderne.</p>
                        <a href="#" class="read-more" onclick="cliqueLire()">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://cdn.activestate.com/wp-content/uploads/2021/12/python-coding-mistakes-1024x512.jpg" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Python pour Machine Learning</h3>
                        <p>Découvrez les bases de Python, comment l'utiliser pour créer des modèles de machine learning efficaces.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5O9VF_gl5gExy_--7EGKP_0q3IyeAMI9VTg&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Interface Responsive avec React</h3>
                        <p>Apprenez à créer des interfaces utilisateur modernes et adaptatives avec React.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4jZMDG_JmR8J4gmeVuw0ge6I2-4v3dUTfKw&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Programmation PHP Avancée</h3>
                        <p>Maîtrisez les concepts avancés de PHP pour développer des applications web robustes.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://www.zdnet.fr/wp-content/uploads/zdnet/2024/02/windows-10-and-11-smaller2.jpg" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Installation Windows 10 & 11</h3>
                        <p>Guide complet pour installer et configurer Windows 10 et 11 sur votre système.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQILjikQ7UcwJATOFV8dH_nBJ4V20IJwkqi7A&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Application Mobile avec Flutter</h3>
                        <p>Créez votre première application mobile cross-platform avec Flutter et Dart.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
            </div>
        </div>
    </section>


        <!-- Astuces et ressources informatique -->
    <section class="articles" id="articles">
        <div class="container">
            <h2 class="section-title fade-in">Astuces et ressources informatiques</h2>
            <div class="articles-grid">
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRGB6mZ2zRVkN5YNXcxZKHjtquELRLoxWaSg&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Apprendre Laravel(la documentation)</h3>
                        <p>Un guide complet pour maîtriser Laravel, le framework PHP le plus populaire pour le développement web moderne.</p>
                        <a href="https://laravel.com/docs/12.x/installation" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://cdn.activestate.com/wp-content/uploads/2021/12/python-coding-mistakes-1024x512.jpg" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Python pour Machine Learning</h3>
                        <p>Découvrez les bases de Python, comment l'utiliser pour créer des modèles de machine learning efficaces.</p>
                        <a href="/monblug/home/machineLearning" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5O9VF_gl5gExy_--7EGKP_0q3IyeAMI9VTg&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Introduction a React js</h3>
                        <p>Apprenez à créer des interfaces utilisateur modernes et adaptatives avec React.</p>
                        <a href="/monblug/home/cours/cours_react" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4jZMDG_JmR8J4gmeVuw0ge6I2-4v3dUTfKw&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Programmation PHP Avancée</h3>
                        <p>Maîtrisez les concepts avancés de PHP pour développer des applications web robustes.</p>
                        <a href="https://www.php.net/manual/fr/security.intro.php" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://www.zdnet.fr/wp-content/uploads/zdnet/2024/02/windows-10-and-11-smaller2.jpg" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Installation Windows 10 & 11</h3>
                        <p>Guide complet pour installer et configurer Windows 10 et 11 sur votre système.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
                
                <article class="article-card fade-in">
                    <div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQILjikQ7UcwJATOFV8dH_nBJ4V20IJwkqi7A&s" class="article-image">
                    </div>
                    <div class="article-content">
                        <h3>Application Mobile avec Flutter</h3>
                        <p>Créez votre première application mobile cross-platform avec Flutter et Dart.</p>
                        <a href="#" onclick="cliqueLire()" class="read-more">Lire l'article</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Complements and About DevBlog Section -->
    <section class="complements-section">
        <div class="container">
            <h2 class="section-title fade-in">Compléments & À Propos</h2>
            <div class="complements-about-grid">
                <!-- Complements Navigation -->
                <div class="complements-nav-card fade-in">
                    <h3>Compléments</h3>
                    <ul class="complements-nav-list">
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-book"></i> Tutoriels
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-code"></i> Exemples de Code
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-tools"></i> Outils de Développement
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-video"></i> Vidéos Formation
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-question-circle"></i> FAQ
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-users"></i> Communauté
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-certificate"></i> Certifications
                            </a>
                        </li>
                        <li class="complements-nav-item">
                            <a href="#" class="complements-nav-link">
                                <i class="fas fa-rocket"></i> Projets Pratiques
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- About DevBlog -->
                <div class="about-devblog-card fade-in">
                    <h3>À Propos de Learnica</h3>
                    <div class="about-devblog-content">
                        <p>Learnica est bien plus qu'une simple plateforme de formation - c'est votre compagnon de route vers l'excellence en développement web. Née de la passion pour l'innovation technologique et l'apprentissage collaboratif, Learnica révolutionne la façon dont les développeurs acquièrent et perfectionnent leurs compétences.</p>

                        <p>Dans un monde où la technologie évolue à une vitesse fulgurante, nous avons créé un écosystème d'apprentissage unique qui combine formation gratuite de qualité professionnelle, documentation exhaustive et communauté dynamique. Notre mission transcende la simple transmission de connaissances : nous façonnons l'avenir du développement web en démocratisant l'accès aux technologies de pointe.</p>

                        <p>Chaque ressource disponible sur Learnica est méticuleusement conçue pour transformer votre curiosité en expertise. Nos tutoriels ne se contentent pas d'expliquer le "comment" - ils révèlent le "pourquoi" derrière chaque ligne de code, chaque architecture, chaque décision technique. Cette approche holistique garantit une compréhension profonde qui vous permettra de naviguer avec confiance dans l'univers complexe du développement moderne.</p>

                        <p>Que vous soyez un développeur débutant cherchant à poser des fondations solides, un professionnel expérimenté souhaitant maîtriser les dernières innovations, ou un passionné désireux d'explorer de nouveaux horizons technologiques, Learnica s'adapte à votre rythme et à vos objectifs. Notre contenu évolutif, constamment enrichi et actualisé, reflète les tendances émergentes et les meilleures pratiques de l'industrie.</p>

                        <p>L'excellence technique ne se limite pas aux connaissances théoriques - elle se forge dans la pratique. C'est pourquoi Learnica privilégie une approche pragmatique avec des projets concrets, des études de cas réels et des défis pratiques qui transforment l'apprentissage en expérience enrichissante. Rejoignez une communauté où l'innovation rencontre la collaboration, où chaque question trouve sa réponse et où votre croissance professionnelle devient notre priorité.</p>
                        
                        <div class="developer-info-box">
                            <h4><i class="fas fa-user-tie"></i> Qui sommes nous?</h4>
                           <p><strong>Learnica</strong> a été développé par <strong>le staff InnovaCode</strong>, un ensemble de développeurs passionnés de code basé en Côte d'Ivoire, avec un objectif clair : offrir à la communauté des développeurs un espace d'apprentissage simple, accessible et inspirant. Nous développons des applications web, mobiles et desktop, nous nous sommes donné pour mission de partager des connaissances à travers une plateforme où l'on apprend avec plaisir et clarté. Guidé par notre passion pour les nouvelles technologies et l'innovation, nous croyons fermement que la technologie n'a de sens que si elle est partagée. Et comme nous aimons le dire : « Chaque ligne de code écrite est une pierre posée pour construire le futur ». Pour échanger, collaborer ou simplement dire bonjour, vous pouvez nous contacter au (+225) 0545796982 ou sur WhatsApp au (+225) 0506938224.</p>

                            <div class="tech-stack-badges">
                                <span class="tech-badge">PHP</span>
                                <span class="tech-badge">HTML</span>
                                <span class="tech-badge">CSS</span>
                                <span class="tech-badge">JavaScript</span>
                                <span class="tech-badge">Laravel</span>
                                <span class="tech-badge">WinDev</span>
                                <span class="tech-badge">WebDev</span>
                                <span class="tech-badge">Windev Mobile</span>
                                <span class="tech-badge">Flutter</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Learnica. Tous droits réservés.</p>
            <p>Explorez, apprenez, créez.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>
    
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Navbar background on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(30, 30, 30, 0.98)';
            } else {
                navbar.style.background = 'linear-gradient(145deg, #1e1e1e, #2a2a2a)';
            }
        });

        (function(){
            window.cliqueLire = function(){
                alert("Oups! désolé, l'article que vous demandez n'est pas encore disponible. Nous y travaillons.")
            }
        })();
    </script>
    <?php
        // include(__DIR__.'/include_fichiers/progression.php');
    ?>
</body>
</html>