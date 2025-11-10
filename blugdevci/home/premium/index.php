<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir Pro - Learnica</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(15, 32, 39, 0.9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .logo-text {
            font-size: 36px;
            font-weight: bold;
            color: #0f2027;
        }

        .badge {
            display: inline-block;
            background: rgba(15, 32, 39, 0.9);
            color: #00ffcc;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: 10px;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 50px 40px;
            color: white;
        }

        h1 {
            font-size: 42px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid rgba(0, 217, 255, 0.2);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #00ffcc;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.2);
        }

        .feature-icon {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .feature-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #00d9ff;
        }

        .feature-desc {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
        }

        .pricing {
            background: rgba(0, 217, 255, 0.1);
            border: 2px solid #00d9ff;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
        }

        .price {
            font-size: 56px;
            font-weight: bold;
            color: #00ffcc;
            margin: 20px 0;
        }

        .price span {
            font-size: 24px;
            color: rgba(255, 255, 255, 0.6);
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            color: #0f2027;
            padding: 18px 60px;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.3);
            border: none;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 255, 204, 0.5);
        }

        .guarantee {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 768px) {
            .header {
                padding: 30px 20px;
            }

            .content {
                padding: 30px 20px;
            }

            h1 {
                font-size: 32px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .price {
                font-size: 42px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <div class="logo-icon">🎓</div>
                <div class="logo-text">Learnica</div>
            </div>
            <div class="badge">✨ OFFRE EXCLUSIVE PRO</div>
        </div>

        <div class="content">
            <h1>Passez à Learnica Pro</h1>
            <p class="subtitle">
                Débloquez tout le potentiel de Learnica et accédez à des fonctionnalités avancées pour booster votre apprentissage.
            </p>

            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">📥</div>
                    <div class="feature-title">Téléchargements illimités</div>
                    <div class="feature-desc">Téléchargez tous les tutoriels et ressources sans aucune limite</div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <div class="feature-title">Accès prioritaire</div>
                    <div class="feature-desc">Soyez le premier à découvrir les nouveaux contenus et formations</div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💎</div>
                    <div class="feature-title">Contenu exclusif</div>
                    <div class="feature-desc">Accédez à des tutoriels premium et des masterclass réservés aux membres Pro</div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <div class="feature-title">Support prioritaire</div>
                    <div class="feature-desc">Obtenez une assistance rapide et personnalisée pour tous vos projets</div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <div class="feature-title">Mode hors ligne</div>
                    <div class="feature-desc">Téléchargez et consultez vos formations même sans connexion internet</div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <div class="feature-title">Certificats Pro</div>
                    <div class="feature-desc">Recevez des certifications reconnues pour valoriser vos compétences</div>
                </div>
            </div>

            <div class="pricing">
                <div style="font-size: 20px; color: rgba(255,255,255,0.8); margin-bottom: 10px;">À partir de</div>
                <div class="price">4 990 <span>FCFA/mois</span></div>
                <div style="color: rgba(255,255,255,0.6);">ou 49 990 FCFA/an (économisez 33%)</div>
            </div>

            <div style="text-align: center;">
                <button class="cta-button" onclick="window.location.href='/monblug/page/premium/form'">
                    🚀 Devenir Pro maintenant
                </button>
                <div class="guarantee">
                    ✓ Garantie satisfait ou remboursé 30 jours<br>
                    ✓ Annulation à tout moment
                </div>
            </div>
        </div>
    </div>

</body>
</html>