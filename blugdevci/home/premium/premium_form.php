<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finaliser votre abonnement - Learnica Pro</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }

        .secure-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 255, 204, 0.1);
            padding: 10px 20px;
            border-radius: 50px;
            border: 1px solid rgba(0, 255, 204, 0.3);
            color: #00ffcc;
            font-size: 14px;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 30px;
            align-items: start;
        }

        .checkout-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-size: 24px;
            color: white;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .plan-selector {
            display: grid;
            gap: 15px;
            margin-bottom: 30px;
        }

        .plan-option {
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .plan-option:hover {
            border-color: rgba(0, 217, 255, 0.5);
            transform: translateY(-2px);
        }

        .plan-option.selected {
            border-color: #00ffcc;
            background: rgba(0, 255, 204, 0.1);
        }

        .popular-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            color: #0f2027;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .plan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .plan-name {
            font-size: 18px;
            font-weight: 600;
            color: white;
        }

        .plan-price {
            font-size: 24px;
            font-weight: 700;
            color: #00ffcc;
        }

        .plan-price span {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
        }

        .plan-savings {
            display: inline-block;
            background: rgba(0, 217, 255, 0.2);
            color: #00d9ff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }

        .plan-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            margin-top: 8px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #00ffcc;
            background: rgba(255, 255, 255, 0.08);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .payment-methods {
            margin-bottom: 25px;
        }

        .payment-methods-title {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 12px;
            font-weight: 500;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .payment-method {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .payment-method:hover {
            border-color: rgba(0, 217, 255, 0.5);
            transform: translateY(-2px);
        }

        .payment-method.selected {
            border-color: #00ffcc;
            background: rgba(0, 255, 204, 0.1);
        }

        .payment-icon {
            font-size: 32px;
        }

        .payment-name {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .cinetpay-logo {
            margin-top: 20px;
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .cinetpay-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 8px;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #00d9ff 0%, #00ffcc 100%);
            color: #0f2027;
            padding: 18px;
            font-size: 18px;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0, 255, 204, 0.5);
        }

        .submit-btn:active:not(:disabled) {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .submit-btn .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid #0f2027;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        .submit-btn.loading .spinner {
            display: block;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .order-summary {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 20px;
        }

        .summary-title {
            font-size: 20px;
            color: white;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 15px;
        }

        .summary-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 20px 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-size: 24px;
            font-weight: 700;
            color: white;
            margin: 20px 0;
        }

        .summary-total-price {
            color: #00ffcc;
        }

        .features-list {
            margin-top: 25px;
        }

        .feature-item {
            display: flex;
            align-items: start;
            gap: 10px;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .feature-check {
            color: #00ffcc;
            font-size: 18px;
            flex-shrink: 0;
        }

        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .trust-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
        }

        .checkbox-group {
            display: flex;
            align-items: start;
            gap: 10px;
            margin: 20px 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-top: 3px;
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
        }

        .checkbox-group a {
            color: #00d9ff;
            text-decoration: none;
        }

        .checkbox-group a:hover {
            text-decoration: underline;
        }

        @media (max-width: 968px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }

            .payment-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .checkout-section {
                padding: 25px;
            }

            .payment-grid {
                grid-template-columns: 1fr;
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
            <div class="secure-badge">
                🔒 Paiement sécurisé via CinetPay
            </div>
        </div>

        <div class="main-content">
            <div class="checkout-section">
                <h2 class="section-title">📋 Choisissez votre plan</h2>
                
                <div class="plan-selector">
                    <div class="plan-option" onclick="selectPlan('annual', this)">
                        <span class="popular-badge">⭐ LE PLUS POPULAIRE</span>
                        <div class="plan-header">
                            <div class="plan-name">
                                Plan Annuel
                                <span class="plan-savings">Économisez 33%</span>
                            </div>
                            <div class="plan-price">49 990 <span>FCFA/an</span></div>
                        </div>
                        <div class="plan-description">
                            Soit 4 165 FCFA/mois - Meilleure valeur
                        </div>
                    </div>

                    <div class="plan-option selected" onclick="selectPlan('monthly', this)">
                        <div class="plan-header">
                            <div class="plan-name">Plan Mensuel</div>
                            <div class="plan-price">4 990 <span>FCFA/mois</span></div>
                        </div>
                        <div class="plan-description">
                            Annulation à tout moment - Flexibilité maximale
                        </div>
                    </div>
                </div>

                <h2 class="section-title">👤 Vos informations</h2>

                <form id="checkoutForm" onsubmit="initiatePayment(event)">
                    <div class="form-group">
                        <label>Nom complet *</label>
                        <input type="text" id="fullName" placeholder="Jean Kouassi" required>
                    </div>

                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" id="email" placeholder="jean.kouassi@email.com" required>
                    </div>

                    <div class="form-group">
                        <label>Numéro de téléphone *</label>
                        <input type="tel" id="phone" placeholder="+225 07 XX XX XX XX" required>
                    </div>

                    <div class="payment-methods">
                        <div class="payment-methods-title">💳 Méthodes de paiement disponibles</div>
                        <div class="payment-grid">
                            <div class="payment-method selected" onclick="selectPayment('CARD', this)">
                                <div class="payment-icon">💳</div>
                                <div class="payment-name">Carte bancaire</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('ORANGE', this)">
                                <div class="payment-icon">🟠</div>
                                <div class="payment-name">Orange Money</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('MTN', this)">
                                <div class="payment-icon">🟡</div>
                                <div class="payment-name">MTN Money</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('MOOV', this)">
                                <div class="payment-icon">🔵</div>
                                <div class="payment-name">Moov Money</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('WAVE', this)">
                                <div class="payment-icon">💙</div>
                                <div class="payment-name">Wave</div>
                            </div>
                            <div class="payment-method" onclick="selectPayment('FLOOZ', this)">
                                <div class="payment-icon">🟣</div>
                                <div class="payment-name">Flooz</div>
                            </div>
                        </div>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">
                            J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> *
                        </label>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="newsletter">
                        <label for="newsletter">
                            Je souhaite recevoir les nouveautés et offres exclusives de Learnica
                        </label>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="spinner"></span>
                        <span id="btnText">🚀 Procéder au paiement</span>
                    </button>
                </form>

                <div class="cinetpay-logo">
                    <div style="font-size: 20px; font-weight: 600; color: #00ffcc;">
                        Powered by CinetPay
                    </div>
                    <div class="cinetpay-text">
                        Paiement sécurisé et certifié - Tous vos moyens de paiement en un seul endroit
                    </div>
                </div>

                <div class="trust-badges">
                    <div class="trust-badge">
                        🔒 Cryptage SSL
                    </div>
                    <div class="trust-badge">
                        ✓ Remboursement 30j
                    </div>
                    <div class="trust-badge">
                        🛡️ Données protégées
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <h3 class="summary-title">📦 Récapitulatif</h3>
                
                <div class="summary-item">
                    <span>Plan sélectionné</span>
                    <span id="selectedPlanName">Mensuel</span>
                </div>
                <div class="summary-item">
                    <span>Méthode</span>
                    <span id="selectedMethod">Carte bancaire</span>
                </div>
                <div class="summary-item">
                    <span>Montant</span>
                    <span id="planAmount">4 990 FCFA</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Total à payer</span>
                    <span class="summary-total-price" id="totalAmount">4 990 FCFA</span>
                </div>

                <div style="text-align: center; font-size: 13px; color: rgba(255,255,255,0.6); margin-top: 10px;">
                    Premier paiement aujourd'hui
                </div>

                <div class="features-list">
                    <div style="font-size: 14px; color: white; font-weight: 600; margin-bottom: 15px;">
                        ✨ Inclus dans votre abonnement :
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Téléchargements illimités</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Accès à tous les contenus premium</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Support prioritaire 24/7</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Certificats professionnels</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Mode hors ligne</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>Nouveaux contenus hebdo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedPlanType = 'monthly';
        let selectedPaymentMethod = 'CARD';
        
        const plans = {
            monthly: {
                name: 'Mensuel',
                price: 4990,
                displayPrice: '4 990 FCFA'
            },
            annual: {
                name: 'Annuel',
                price: 49990,
                displayPrice: '49 990 FCFA'
            }
        };

        const paymentMethods = {
            'CARD': 'Carte bancaire',
            'ORANGE': 'Orange Money',
            'MTN': 'MTN Money',
            'MOOV': 'Moov Money',
            'WAVE': 'Wave',
            'FLOOZ': 'Flooz'
        };

        function selectPlan(planType, element) {
            document.querySelectorAll('.plan-option').forEach(el => {
                el.classList.remove('selected');
            });
            element.classList.add('selected');
            selectedPlanType = planType;
            updateSummary();
        }

        function selectPayment(method, element) {
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('selected');
            });
            element.classList.add('selected');
            selectedPaymentMethod = method;
            updateSummary();
        }

        function updateSummary() {
            const plan = plans[selectedPlanType];
            
            document.getElementById('selectedPlanName').textContent = plan.name;
            document.getElementById('selectedMethod').textContent = paymentMethods[selectedPaymentMethod];
            document.getElementById('planAmount').textContent = plan.displayPrice;
            document.getElementById('totalAmount').textContent = plan.displayPrice;
        }

        async function initiatePayment(event) {
            event.preventDefault();
            
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            
            // Désactiver le bouton et afficher le spinner
            btn.disabled = true;
            btn.classList.add('loading');
            btnText.textContent = 'Redirection vers CinetPay...';
            
            // Récupérer les données du formulaire
            const formData = {
                fullName: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                plan: selectedPlanType,
                amount: plans[selectedPlanType].price,
                paymentMethod: selectedPaymentMethod,
                newsletter: document.getElementById('newsletter').checked
            };

            console.log('Données envoyées:', formData);

            // Simulation de l'appel API
            // Dans votre vraie application, remplacez ceci par votre appel API
            try {
                // EXEMPLE D'APPEL API VERS VOTRE BACKEND:
                /*
                const response = await fetch('/api/payment/init-cinetpay', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });
                
                const data = await response.json();
                
                if (data.success && data.payment_url) {
                    // Rediriger vers la page de paiement CinetPay
                    window.location.href = data.payment_url;
                } else {
                    throw new Error('Erreur lors de l\'initialisation du paiement');
                }
                */

                // SIMULATION (à retirer en production)
                setTimeout(() => {
                    alert(`✅ Redirection vers CinetPay...\n\nPlan: ${plans[selectedPlanType].name}\nMontant: ${plans[selectedPlanType].displayPrice}\nMéthode: ${paymentMethods[selectedPaymentMethod]}\n\n⚠️ Ceci est une simulation. Intégrez votre API backend ici.`);
                    
                    // Réactiver le bouton
                    btn.disabled = false;
                    btn.classList.remove('loading');
                    btnText.textContent = '🚀 Procéder au paiement';
                }, 2000);

            } catch (error) {
                console.error('Erreur:', error);
                alert('❌ Une erreur est survenue. Veuillez réessayer.');
                
                // Réactiver le bouton
                btn.disabled = false;
                btn.classList.remove('loading');
                btnText.textContent = '🚀 Procéder au paiement';
            }
        }

        // Formatage automatique du numéro de téléphone
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.startsWith('225')) {
                    value = value.slice(3);
                }
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }
                e.target.value = value ? '+225 ' + value : '';
            });
        });
    </script>
</body>
</html>