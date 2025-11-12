<?php
$pageTitle = "Calendrier de l'Après - Commande";
// Adapter selon ta structure de config
// require_once __DIR__ . '/includes/config.php';
// include __DIR__ . '/includes/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - La Fabrique à Douceurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a472a 0%, #2d5a3d 50%, #8b0000 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Flocons animés */
        @keyframes snowfall {
            0% {
                transform: translateY(-10vh) translateX(0);
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) translateX(100px);
                opacity: 0;
            }
        }

        .snowflake {
            position: fixed;
            top: -10vh;
            color: white;
            font-size: 2em;
            opacity: 0.8;
            z-index: 1;
            pointer-events: none;
            animation: snowfall linear infinite;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            z-index: 10;
            position: relative;
        }

        .header-festif {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            animation: fadeInDown 0.8s ease;
        }

        .header-festif h1 {
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .header-festif p {
            font-size: 1.2em;
            color: #fff9e6;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .deco-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
            font-size: 1.5em;
        }

        /* Formulaire */
        .form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideUp 0.8s ease;
        }

        .form-wrapper {
            padding: 40px;
        }

        /* Étapes */
        .steps-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .steps-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: #e0e0e0;
            color: #666;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background: linear-gradient(135deg, #c41e3a, #ff6b35);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(196, 30, 58, 0.4);
        }

        .step.completed .step-number {
            background: #4caf50;
            color: white;
        }

        .step-label {
            font-size: 0.9em;
            color: #666;
            font-weight: 500;
        }

        .step.active .step-label {
            color: #c41e3a;
            font-weight: 600;
        }

        /* Produits */
        .products-section {
            display: none;
        }

        .products-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background: linear-gradient(135deg, #f5f5f5 0%, #fff 100%);
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #f0f0f0;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #c41e3a 0%, #ff6b35 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .product-icon {
            font-size: 3em;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-icon {
            transform: scale(1.2) rotate(10deg);
        }

        .product-name {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }

        .product-desc {
            font-size: 0.85em;
            color: #666;
            margin-bottom: 10px;
            min-height: 40px;
            position: relative;
            z-index: 2;
        }

        .product-price {
            font-size: 1.3em;
            font-weight: bold;
            color: #c41e3a;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: white;
            border-radius: 8px;
            padding: 8px;
            width: fit-content;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            border: 1px solid #e0e0e0;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border: none;
            background: #f0f0f0;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background: #c41e3a;
            color: white;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: bold;
            font-size: 1em;
        }

        /* Infos Client */
        .info-section {
            display: none;
        }

        .info-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95em;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #c41e3a;
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .date-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        .date-option {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            background: white;
            color: #333;
        }

        .date-option:hover {
            border-color: #c41e3a;
            background: #fff5f5;
        }

        .date-option.selected {
            background: linear-gradient(135deg, #c41e3a, #ff6b35);
            color: white;
            border-color: #c41e3a;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid #c41e3a;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-top: 2px;
            accent-color: #c41e3a;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-size: 0.95em;
            flex: 1;
        }

        /* Section Marque-page */
        .bookmark-section {
            background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #c41e3a;
            margin-bottom: 25px;
            display: none;
        }

        .bookmark-section.active {
            display: block;
            animation: slideInLeft 0.4s ease;
        }

        .bookmark-section h3 {
            margin: 0 0 10px 0;
            color: #c41e3a;
            font-size: 1.1em;
        }

        .bookmark-section p {
            margin: 8px 0;
            color: #666;
            line-height: 1.6;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Effet Glossy */
        .bookmark-image {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(196, 30, 58, 0.3);
            max-width: 220px;
            height: auto;
            transition: transform 0.3s ease;
        }

        .bookmark-image:hover {
            transform: scale(1.05);
        }

        .bookmark-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: glossyShine 3s infinite;
        }

        @keyframes glossyShine {
            0% {
                left: -100%;
            }
            50% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
        }

        /* Total */
        .order-summary {
            background: linear-gradient(135deg, #f5f5f5 0%, #fff 100%);
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .summary-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.95em;
            color: #666;
        }

        .summary-item:last-child {
            border-bottom: none;
            font-weight: 600;
            color: #333;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            font-size: 1.3em;
            font-weight: bold;
            color: #c41e3a;
            border-top: 2px solid #c41e3a;
            margin-top: 15px;
        }

        /* Boutons */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }

        .btn {
            flex: 1;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #c41e3a, #ff6b35);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(196, 30, 58, 0.4);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-wrapper {
                padding: 25px;
            }

            .header-festif h1 {
                font-size: 2em;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .date-grid {
                grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
            }
        }

        .error-message {
            color: #c41e3a;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .success-message {
            background: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Flocons animés -->
    <div id="snowflakes"></div>

    <div class="container">
        <!-- Header Festif -->
        <div class="header-festif">
            <div class="deco-line">
                🎄 ✨ 🎁
            </div>
            <h1>Coffrets de fin d'année</h1>
            <p>Douceurs et gourmandises pour vos fêtes</p>
            <div class="deco-line">
                🍫 🎅 🎄
            </div>
        </div>

        <!-- Formulaire -->
        <form id="orderForm" class="form-container">
            <div class="form-wrapper">
                <!-- Indicateur d'étapes -->
                <div class="steps-indicator">
                    <div class="step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-label">Produits</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-label">Commande</div>
                    </div>
                </div>

                <!-- ÉTAPE 1: Sélection des produits -->
                <div class="products-section active">
                    <h2 style="margin-bottom: 25px; color: #333; text-align: center;">
                        🎁 Sélectionnez vos douceurs
                    </h2>

                    <div class="products-grid">
                        <!-- Mr Biscuit -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/mrbiscuit.jpg" alt="Mr Biscuit" class="product-image">
                            </div>
                            <div class="product-name">Mr Biscuit</div>
                            <div class="product-desc">Un délice croustillant pour accompagner vos gourmandises</div>
                            <div class="product-price">10 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="0">−</button>
                                <input type="number" class="quantity-input" data-product="0" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="0">+</button>
                            </div>
                        </div>

                        <!-- Tasse Gourmande -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/tasse.jpg" alt="Tasse Gourmande" class="product-image">
                            </div>
                            <div class="product-name">Tasse Gourmande</div>
                            <div class="product-desc">Tasse, pâte à tartiner, gianduja et sablés</div>
                            <div class="product-price">13 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="1">−</button>
                                <input type="number" class="quantity-input" data-product="1" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="1">+</button>
                            </div>
                        </div>

                        <!-- Plateau Solo -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/plateau-solo.jpg" alt="Plateau Solo" class="product-image">
                            </div>
                            <div class="product-name">Plateau Solo</div>
                            <div class="product-desc">Tasse, pâte à tartiner, sablés, gianduja et bougie</div>
                            <div class="product-price">17 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="2">−</button>
                                <input type="number" class="quantity-input" data-product="2" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="2">+</button>
                            </div>
                        </div>

                        <!-- Plateau Duo -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/plateau-duo.jpg" alt="Plateau Duo" class="product-image">
                            </div>
                            <div class="product-name">Plateau Duo</div>
                            <div class="product-desc">2 tasses, pâte à tartiner, sablés, gianduja et bougie</div>
                            <div class="product-price">25 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="3">−</button>
                                <input type="number" class="quantity-input" data-product="3" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="3">+</button>
                            </div>
                        </div>

                        <!-- Coffret Trilogie -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/coffret-trilogie.jpg" alt="Coffret Trilogie" class="product-image">
                            </div>
                            <div class="product-name">Coffret Trilogie</div>
                            <div class="product-desc">Pâte à tartiner, praliné, sablés et gianduja</div>
                            <div class="product-price">18 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="4">−</button>
                                <input type="number" class="quantity-input" data-product="4" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="4">+</button>
                            </div>
                        </div>

                        <!-- Calendrier de l'Après -->
                        <div class="product-card">
                            <div class="product-image-container">
                                <img src="assets/images/products/noel/calendrier.jpg" alt="Calendrier de l'Après" class="product-image">
                            </div>
                            <div class="product-name">Calendrier de l'Après</div>
                            <div class="product-desc">Du 25 au 31 décembre - Pâte à tartiner, sablés, praliné, gianduja...</div>
                            <div class="product-price">28 €</div>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-product="5">−</button>
                                <input type="number" class="quantity-input" data-product="5" value="0" min="0">
                                <button type="button" class="quantity-btn" data-product="5">+</button>
                            </div>
                        </div>
                    </div>

                    <!-- Récapitulatif -->
                    <div class="order-summary">
                        <div class="summary-title">📋 Récapitulatif de votre sélection</div>
                        <div id="summaryItems"></div>
                        <div class="summary-total">
                            <span>Total:</span>
                            <span id="totalPrice">0 €</span>
                        </div>
                    </div>

                    <!-- Encart Marque-page -->
                    <div style="background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%); border: 2px solid #c41e3a; border-radius: 12px; padding: 25px; margin-bottom: 30px; text-align: center;">
                        <div style="display: flex; align-items: center; justify-content: center; gap: 30px; flex-wrap: wrap;">
                            <div style="flex: 0 0 auto;">
                                <img src="https://www.lafabriqueadouceurs.fr/assets/images/products/noel/marquepage.jpg" alt="Marque-page gravé" class="bookmark-image">
                            </div>
                            <div style="flex: 1; min-width: 250px; text-align: left;">
                                <h3 style="color: #c41e3a; margin: 0 0 15px 0; font-size: 1.2em;">📖 Offre spéciale</h3>
                                <p style="color: #333; margin: 0 0 12px 0; font-weight: 600;">Avec le <strong>Calendrier de l'Après</strong></p>
                                <p style="color: #666; margin: 0 0 15px 0; line-height: 1.6;">Recevez un magnifique <strong>marque-page gravé</strong> avec le texte de votre choix ! Un cadeau personnalisé et durable pour prolonger la magie de vos fêtes.</p>
                                <p style="color: #999; font-size: 0.9em; margin: 0; font-style: italic;">Vous pourrez personnaliser votre message à l'étape suivante.</p>
                            </div>
                        </div>
                    </div>

                    <div id="errorProduct" class="error-message" style="text-align: center;"></div>

                    <div class="button-group">
                        <button type="button" class="btn btn-primary" id="nextBtn">
                            Poursuivre <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- ÉTAPE 2: Informations client -->
                <div class="info-section">
                    <h2 style="margin-bottom: 25px; color: #333; text-align: center;">
                        📝 Finalisez votre commande
                    </h2>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label for="firstname">Prénom *</label>
                            <input type="text" id="firstname" name="firstname" required placeholder="Ex: Jean">
                            <div id="errorFirstname" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Nom *</label>
                            <input type="text" id="lastname" name="lastname" required placeholder="Ex: Dupont">
                            <div id="errorLastname" class="error-message"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Votre email *</label>
                        <input type="email" id="email" name="email" required placeholder="Ex: jean@example.com">
                        <div id="errorEmail" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Votre téléphone *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Ex: 06 12 34 56 78">
                        <div id="errorPhone" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label>Date de retrait souhaitée *</label>
                        <div class="date-grid" id="dateGrid"></div>
                        <div id="errorDate" class="error-message"></div>
                    </div>

                    <!-- Section Marque-page (apparaît si calendrier sélectionné) -->
                    <div class="bookmark-section" id="bookmarkSection">
                        <h3>📖 Cadeau personnalisé : Marque-page gravé</h3>
                        <p>Avec votre commande du <strong>Calendrier de l'Après</strong>, nous vous offrons un magnifique <strong>marque-page gravé</strong> avec le texte de votre choix !</p>
                        <p style="font-style: italic; color: #999; font-size: 0.9em;">Choisissez le message que vous souhaitez graver sur votre marque-page.</p>
                    </div>

                    <div class="form-group" id="messageGroup" style="display: none;">
                        <label for="message">Texte pour le marque-page gravé * <span style="color: #c41e3a;">(obligatoire avec le Calendrier de l'Après)</span></label>
                        <textarea id="message" name="message" placeholder="Écrivez le message que vous souhaitez graver sur votre marque-page..."></textarea>
                        <div id="errorMessage" class="error-message"></div>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            J'accepte que ma commande soit traitée
                        </label>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" id="backBtn">
                            <i class="fas fa-arrow-left"></i> Retour
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            Valider la commande <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Données des produits
        const products = [
            { id: 'biscuit', name: 'Mr Biscuit', price: 10 },
            { id: 'tasse', name: 'Tasse Gourmande', price: 13 },
            { id: 'solo', name: 'Plateau Solo', price: 17 },
            { id: 'duo', name: 'Plateau Duo', price: 25 },
            { id: 'trilogie', name: 'Coffret Trilogie', price: 18 },
            { id: 'calendrier', name: 'Calendrier de l\'Après', price: 28 }
        ];

        let currentStep = 1;
        let selectedDate = null;

        // Créer les flocons
        function createSnowflakes() {
            const snowflakesContainer = document.getElementById('snowflakes');
            for (let i = 0; i < 30; i++) {
                const snowflake = document.createElement('div');
                snowflake.classList.add('snowflake');
                snowflake.innerHTML = '❄';
                snowflake.style.left = Math.random() * 100 + 'vw';
                snowflake.style.animationDuration = (Math.random() * 10 + 15) + 's';
                snowflake.style.animationDelay = Math.random() * 2 + 's';
                snowflakesContainer.appendChild(snowflake);
            }
        }

        // Générer les dates de retrait
        function generateDates() {
            const dateGrid = document.getElementById('dateGrid');
            for (let i = 15; i <= 24; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'date-option';
                btn.textContent = i + ' déc';
                btn.dataset.date = i;
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    document.querySelectorAll('.date-option').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    selectedDate = i;
                    document.getElementById('errorDate').textContent = '';
                });
                dateGrid.appendChild(btn);
            }
        }

        // Gestion des quantités
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const productIndex = btn.dataset.product;
                const input = document.querySelector(`.quantity-input[data-product="${productIndex}"]`);
                let value = parseInt(input.value) || 0;
                
                if (btn.textContent.includes('−')) {
                    value = Math.max(0, value - 1);
                } else {
                    value += 1;
                }
                
                input.value = value;
                updateSummary();
                checkCalendarSelection();
                document.getElementById('errorProduct').textContent = '';
            });
        });

        // Mise à jour du récapitulatif
        function updateSummary() {
            let total = 0;
            let hasItems = false;
            const summaryItems = document.getElementById('summaryItems');
            summaryItems.innerHTML = '';

            document.querySelectorAll('.quantity-input').forEach((input, index) => {
                const quantity = parseInt(input.value) || 0;
                if (quantity > 0) {
                    hasItems = true;
                    const subtotal = quantity * products[index].price;
                    total += subtotal;

                    const item = document.createElement('div');
                    item.className = 'summary-item';
                    item.innerHTML = `
                        <span>${quantity}x ${products[index].name}</span>
                        <span>${subtotal} €</span>
                    `;
                    summaryItems.appendChild(item);
                }
            });

            document.getElementById('totalPrice').textContent = total + ' €';
            return hasItems;
        }

        // Navigation entre étapes
        document.getElementById('nextBtn').addEventListener('click', () => {
            if (!updateSummary()) {
                document.getElementById('errorProduct').textContent = '❌ Veuillez sélectionner au moins un produit';
                return;
            }
            goToStep(2);
        });

        document.getElementById('backBtn').addEventListener('click', () => {
            goToStep(1);
        });

        function goToStep(step) {
            currentStep = step;
            document.querySelectorAll('.products-section, .info-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.step').forEach(s => s.classList.remove('active', 'completed'));

            if (step === 1) {
                document.querySelector('.products-section').classList.add('active');
                document.querySelector('[data-step="1"]').classList.add('active');
            } else {
                document.querySelector('.info-section').classList.add('active');
                document.querySelector('[data-step="1"]').classList.add('completed');
                document.querySelector('[data-step="2"]').classList.add('active');
                checkCalendarSelection();
            }
        }

        // Vérifier si le calendrier de l'après est sélectionné
        function checkCalendarSelection() {
            const calendarInput = document.querySelector(`.quantity-input[data-product="5"]`);
            const calendarQuantity = parseInt(calendarInput.value) || 0;
            const bookmarkSection = document.getElementById('bookmarkSection');
            const messageGroup = document.getElementById('messageGroup');
            
            if (calendarQuantity > 0) {
                bookmarkSection.classList.add('active');
                messageGroup.style.display = 'block';
            } else {
                bookmarkSection.classList.remove('active');
                messageGroup.style.display = 'none';
                document.getElementById('errorMessage').textContent = '';
            }
        }

        // Validation et envoi du formulaire
        document.getElementById('orderForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            // Validation basique
            let isValid = true;
            
            // Formatage du prénom (première lettre majuscule)
            let firstname = document.getElementById('firstname').value.trim();
            if (firstname) {
                firstname = firstname.charAt(0).toUpperCase() + firstname.slice(1).toLowerCase();
            }
            
            // Formatage du nom (tout en majuscule)
            let lastname = document.getElementById('lastname').value.trim();
            if (lastname) {
                lastname = lastname.toUpperCase();
            }
            
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();

            if (!firstname) {
                document.getElementById('errorFirstname').textContent = 'Le prénom est requis';
                isValid = false;
            } else {
                document.getElementById('errorFirstname').textContent = '';
            }

            if (!lastname) {
                document.getElementById('errorLastname').textContent = 'Le nom est requis';
                isValid = false;
            } else {
                document.getElementById('errorLastname').textContent = '';
            }

            if (!email || !email.includes('@')) {
                document.getElementById('errorEmail').textContent = 'Email invalide';
                isValid = false;
            } else {
                document.getElementById('errorEmail').textContent = '';
            }

            if (!phone || phone.length < 10) {
                document.getElementById('errorPhone').textContent = 'Téléphone invalide';
                isValid = false;
            } else {
                document.getElementById('errorPhone').textContent = '';
            }

            if (!selectedDate) {
                document.getElementById('errorDate').textContent = 'Veuillez sélectionner une date';
                isValid = false;
            } else {
                document.getElementById('errorDate').textContent = '';
            }

            // Vérifier si le calendrier de l'après est commandé
            const calendarQuantity = parseInt(document.querySelector(`.quantity-input[data-product="5"]`).value) || 0;
            const message = document.getElementById('message').value.trim();

            if (calendarQuantity > 0 && !message) {
                document.getElementById('errorMessage').textContent = 'Le texte du marque-page est obligatoire avec le Calendrier de l\'Après';
                isValid = false;
            } else {
                document.getElementById('errorMessage').textContent = '';
            }

            if (!isValid) return;

            // Récupérer les produits commandés
            const orderItems = [];
            let total = 0;

            document.querySelectorAll('.quantity-input').forEach((input, index) => {
                const quantity = parseInt(input.value) || 0;
                if (quantity > 0) {
                    orderItems.push({
                        name: products[index].name,
                        quantity: quantity,
                        price: products[index].price,
                        subtotal: quantity * products[index].price
                    });
                    total += quantity * products[index].price;
                }
            });

            // Préparer les données
            const formData = {
                name: firstname + ' ' + lastname,
                email: email,
                phone: phone,
                date: selectedDate + ' décembre',
                message: document.getElementById('message').value.trim(),
                items: orderItems,
                total: total
            };

            console.log('Données à envoyer:', formData);

            // Envoyer au serveur
            try {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 45000); // 45 secondes pour mobile
                
                const response = await fetch('process-order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData),
                    signal: controller.signal
                });

                clearTimeout(timeoutId);
                const result = await response.json();

                if (result.success) {
                    // Message de succès
                    const form = document.getElementById('orderForm');
                    form.innerHTML = `
                        <div class="form-wrapper">
                            <div style="text-align: center; padding: 60px 20px;">
                                <div style="font-size: 4em; margin-bottom: 20px;">🎉</div>
                                <h2 style="color: #333; margin-bottom: 15px;">Commande validée!</h2>
                                <p style="color: #666; font-size: 1.1em; margin-bottom: 30px;">
                                    Merci <strong>${firstname}</strong>! Votre commande a bien été reçue.
                                </p>
                                <p style="color: #666; margin-bottom: 20px;">
                                    📧 Un email de confirmation a été envoyé à : <strong>${email}</strong>
                                </p>
                                <div style="background: #f5f5f5; padding: 20px; border-radius: 8px; margin: 30px 0; text-align: left; display: inline-block;">
                                    <p style="margin-bottom: 10px;"><strong>📋 Récapitulatif :</strong></p>
                                    ${orderItems.map(item => `<p style="color: #666; margin: 5px 0;">${item.quantity}x ${item.name} = ${item.subtotal}€</p>`).join('')}
                                    <p style="margin-top: 15px; border-top: 1px solid #ddd; padding-top: 15px; color: #c41e3a; font-weight: bold;">Total : ${total}€</p>
                                    <p style="margin-top: 10px; color: #666;">📅 Retrait le <strong>${selectedDate} décembre</strong></p>
                                </div>
                                
                                <!-- Coordonnées et réseaux sociaux -->
                                <div style="background: linear-gradient(135deg, #1a472a 0%, #2d5a3d 50%); color: white; padding: 30px 20px; border-radius: 8px; margin-top: 30px;">
                                    <h3 style="margin: 0 0 20px 0; font-size: 1.1em;">La Fabrique à Douceurs</h3>
                                    
                                    <div style="margin-bottom: 20px; line-height: 1.8; font-size: 0.95em;">
                                        <p style="margin: 5px 0;">📍 <strong>Adresse :</strong> 56 Avenue Jean Jaures - 70400 Héricourt</p>
                                        <p style="margin: 5px 0;">📞 <strong>Téléphone :</strong> 06 24 66 55 40</p>
                                        <p style="margin: 5px 0;">📧 <strong>Email :</strong> lafabriqueadouceurs70@gmail.com</p>
                                    </div>
                                    
                                    <div style="text-align: center; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 15px;">
                                        <p style="margin: 0 0 10px 0; font-size: 0.95em;"><strong>Suivez-nous :</strong></p>
                                        <div style="display: flex; justify-content: center; gap: 15px;">
                                            <a href="https://www.facebook.com/profile.php?id=100095251458087" style="color: white; text-decoration: none; font-size: 0.9em;">f Facebook</a>
                                            <a href="https://www.instagram.com/sweetnessbyvaness/" style="color: white; text-decoration: none; font-size: 0.9em;">📷 Instagram</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <p style="color: #666; margin-top: 30px;">
                                    À bientôt à La Fabrique à Douceurs ! 🎄✨
                                </p>
                            </div>
                        </div>
                    `;
                    window.scrollTo(0, 0);
                } else {
                    alert('Erreur: ' + (result.message || 'Une erreur est survenue'));
                    console.error('Erreur serveur:', result);
                }
            } catch (error) {
                console.error('Erreur complète:', error);
                if (error.name === 'AbortError') {
                    alert('Délai d\'attente dépassé. Veuillez vérifier votre connexion et réessayer.');
                } else {
                    alert('Erreur lors de l\'envoi de la commande. Veuillez réessayer.');
                }
            }
        });

        // Formatage en temps réel pour le Prénom (première lettre majuscule)
        document.getElementById('firstname').addEventListener('blur', function() {
            if (this.value) {
                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
            }
        });

        // Formatage en temps réel pour le Nom (tout en majuscule)
        document.getElementById('lastname').addEventListener('blur', function() {
            if (this.value) {
                this.value = this.value.toUpperCase();
            }
        });

        // Initialisation
        createSnowflakes();
        generateDates();
        updateSummary();
    </script>
</body>
</html>