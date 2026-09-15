<?php
// Обработка формы
$order_success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phone'])) {
    $order_success = true;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Купить шаверму в Кириши — club ШОВЕРИ | Доставка фастфуда</title>
    <meta name="description" content="Сочная шаверма, хрустящие чебуреки и мощные хот-доги в Киришах. Онлайн-заказ, быстрая доставка, свежие ингредиенты. Залетай в club ШОВЕРИ!">
    
    <style>
        :root {
            --red: #9d0000;
            --red-hover: #b80000;
            --white: #ffffff;
            --dark: #0a0a0a;
            --dark-gray: #1a1a1a;
            --light-gray: #f5f5f5;
            --border: #333;
            --radius: 12px;
            --transition: 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--dark);
            color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Typography */
        h1, h2, h3 {
            text-transform: uppercase;
            font-weight: 900;
            line-height: 1.1;
        }

        h1 {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            margin-bottom: 1rem;
        }

        h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 2rem;
            color: var(--white);
            text-align: center;
        }
        
        h2 span {
            color: var(--red);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 28px;
            background-color: var(--red);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn:hover {
            background-color: var(--red-hover);
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--white);
        }
        
        .btn-outline:hover {
            background-color: var(--white);
            color: var(--dark);
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 0 60px;
            overflow: hidden;
        }

        .hero-slider {
            position: absolute;
            inset: 0;
            z-index: -2;
        }

        .slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .slide.active {
            opacity: 1;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(10,10,10,0.95) 0%, rgba(10,10,10,0.7) 50%, rgba(10,10,10,0.9) 100%);
            z-index: -1;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
            width: 100%;
        }

        .hero-text .subtitle {
            font-size: 1.2rem;
            color: #ddd;
            margin-bottom: 2rem;
            max-width: 500px;
        }

        .trust-points {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 3rem;
        }

        .trust-point {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .trust-point svg {
            fill: var(--red);
            width: 24px;
            height: 24px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Hero Form */
        .order-form-wrapper {
            background: rgba(26, 26, 26, 0.85);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        }

        .order-form-wrapper h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: var(--white);
        }
        
        .order-form-wrapper p {
            color: #aaa;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--white);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--red);
            background: rgba(255, 255, 255, 0.1);
        }

        .form-control::placeholder {
            color: #777;
        }

        #cartData {
            resize: none;
        }
        
        .order-form-wrapper .btn {
            width: 100%;
            padding: 18px;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .privacy-hint {
            font-size: 0.75rem;
            color: #666;
            margin-top: 15px;
            text-align: center;
        }
        
        .privacy-hint a {
            color: var(--red);
            text-decoration: underline;
            cursor: pointer;
        }

        /* Menu Section */
        .menu-section {
            padding: 100px 0;
            background-color: var(--dark-gray);
        }

        .tab-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        
        .tab-buttons::-webkit-scrollbar {
            height: 4px;
        }
        .tab-buttons::-webkit-scrollbar-thumb {
            background: var(--red);
            border-radius: 4px;
        }

        .tab-btn {
            padding: 12px 30px;
            background: transparent;
            border: 2px solid var(--border);
            color: var(--white);
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            white-space: nowrap;
        }

        .tab-btn.active, .tab-btn:hover {
            background: var(--red);
            border-color: var(--red);
        }

        .tab-pane {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            animation: fadeIn 0.5s ease;
        }

        .tab-pane.active {
            display: grid;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .menu-card {
            background: var(--dark);
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            border-color: var(--red);
            box-shadow: 0 10px 20px rgba(157, 0, 0, 0.1);
        }

        .menu-card-img {
            height: 220px;
            background: #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            font-size: 0.9rem;
            position: relative;
        }
        
        .menu-card-img::after {
            content: 'Фото в разработке';
            position: absolute;
        }

        .menu-card-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .menu-card-title {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .menu-card-desc {
            font-size: 0.9rem;
            color: #aaa;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .menu-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .menu-card-price {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--red);
        }

        /* Services & Advantages */
        .info-section {
            padding: 100px 0;
            background: var(--dark);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .info-image {
            width: 100%;
            height: 500px;
            border-radius: var(--radius);
            object-fit: cover;
            border: 2px solid var(--red);
        }

        .advantages-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .advantage-item {
            display: flex;
            gap: 20px;
        }

        .advantage-icon {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            background: var(--red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .advantage-icon svg {
            fill: var(--white);
            width: 30px;
            height: 30px;
        }

        .advantage-text h4 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .advantage-text p {
            color: #aaa;
        }

        /* FAQ */
        .faq-section {
            padding: 100px 0;
            background: var(--dark-gray);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            border-bottom: 1px solid var(--border);
        }

        .faq-question {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 0;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .faq-question:hover {
            color: var(--red);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .faq-answer p {
            padding-bottom: 25px;
            color: #aaa;
        }

        .faq-icon {
            transition: transform 0.3s;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
            color: var(--red);
        }
        
        .faq-item.active .faq-answer {
            max-height: 200px;
        }

        /* Final CTA & Contacts */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--red) 0%, #4a0000 100%);
            text-align: center;
        }

        .cta-section h2 {
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .contacts-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .contact-card {
            background: rgba(0,0,0,0.3);
            padding: 20px 30px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.1);
            transition: var(--transition);
            color: var(--white);
        }
        
        .contact-card:hover {
            background: rgba(0,0,0,0.5);
            transform: translateY(-3px);
            color: var(--white);
        }
        
        .contact-card svg {
            fill: var(--white);
            width: 24px;
            height: 24px;
        }

        .footer-note {
            margin-top: 50px;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }

        /* Modals & Cookies */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--dark-gray);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--red);
        }

        .modal h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: var(--red);
        }
        
        .modal p {
            color: #ccc;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .cookie-banner {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: var(--dark-gray);
            border: 1px solid var(--red);
            padding: 20px;
            border-radius: var(--radius);
            z-index: 999;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .cookie-text {
            font-size: 0.9rem;
            color: #ddd;
        }

        .cookie-btn {
            white-space: nowrap;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero {
                min-height: auto;
                padding: 0 0 40px;
                display: block; /* Switch from flex to block to stack elements */
            }
            .hero-slider {
                position: relative;
                width: 100%;
                aspect-ratio: 16 / 10; /* Perfect ratio for 1920x1200 images on mobile */
                z-index: 1;
            }
            .slide {
                background-size: cover;
                background-position: center;
            }
            .hero-overlay {
                display: none; /* Remove overlay so image is clear and bright */
            }
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                padding-top: 30px;
            }
            .trust-points {
                align-items: center;
            }
            .hero-actions {
                justify-content: center;
                margin-bottom: 40px;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
            .info-image {
                height: 350px;
                order: -1;
            }
        }
        
        @media (max-width: 576px) {
            h1 { font-size: 2.2rem; }
            .hero { padding: 0 0 40px; }
            .order-form-wrapper { padding: 25px; }
            .contact-card { width: 100%; justify-content: center; }
            .cookie-banner { flex-direction: column; text-align: center; }
            .cookie-btn { width: 100%; }
        }

        /* Success Message Overlay */
        .success-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.9);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .success-box {
            background: var(--dark-gray);
            padding: 50px;
            border-radius: var(--radius);
            border: 2px solid var(--red);
        }
        .success-box h2 { color: var(--red); margin-bottom: 15px; }

        /* Shopping cart */
        .cart-widget {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }

        .cart-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 48px;
            padding: 12px 18px;
            background: var(--red);
            color: var(--white);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
        }

        .cart-toggle:hover { background: var(--red-hover); }

        .cart-count {
            min-width: 24px;
            padding: 2px 7px;
            background: var(--white);
            color: var(--red);
            border-radius: 12px;
            text-align: center;
        }

        .cart-panel {
            display: none;
            width: min(360px, calc(100vw - 40px));
            margin-top: 10px;
            padding: 20px;
            background: var(--dark-gray);
            border: 1px solid var(--red);
            border-radius: var(--radius);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6);
        }

        .cart-panel.active { display: block; }

        .cart-panel h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-height: 280px;
            overflow-y: auto;
        }

        .cart-empty { color: #aaa; font-size: 0.9rem; }

        .cart-item {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 8px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }

        .cart-item-name { font-size: 0.9rem; font-weight: 700; }
        .cart-item-price { color: #ddd; font-size: 0.85rem; }

        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-item-controls button {
            width: 26px;
            height: 26px;
            background: transparent;
            color: var(--white);
            border: 1px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
        }

        .cart-item-controls button:hover { border-color: var(--red); }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin: 18px 0;
            font-weight: 800;
        }

        .cart-order-btn { width: 100%; }

        @media (max-width: 576px) {
            .cart-widget { top: 10px; right: 10px; }
            .cart-toggle { padding: 10px 12px; }
        }
    </style>
</head>
<body>

<div class="cart-widget">
    <button class="cart-toggle" type="button" aria-expanded="false" aria-controls="cartPanel">
        <span aria-hidden="true">🛒</span>
        Корзина
        <span class="cart-count">0</span>
    </button>
    <div class="cart-panel" id="cartPanel">
        <h3>Ваш заказ</h3>
        <div class="cart-items">
            <p class="cart-empty">Корзина пока пуста</p>
        </div>
        <div class="cart-total">
            <span>Итого:</span>
            <span class="cart-total-value">0 ₽</span>
        </div>
        <button class="btn cart-order-btn" type="button">Перейти к оформлению</button>
    </div>
</div>

<?php if($order_success): ?>
<div class="success-overlay" id="successMsg">
    <div class="success-box">
        <h2>Заказ принят!</h2>
        <p>Мы уже разогреваем гриль. Скоро свяжемся с вами!</p>
        <button class="btn" style="margin-top: 20px;" onclick="document.getElementById('successMsg').style.display='none'">Отлично</button>
    </div>
</div>
<?php endif; ?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">
        <div class="slide active" style="background-image: url('https://siteprovider.ru/club-shovi/1-optimize-1920-1200.jpg');"></div>
        <div class="slide" style="background-image: url('https://siteprovider.ru/club-shovi/2-optimize-1920-1200.jpg');"></div>
        <div class="slide" style="background-image: url('https://siteprovider.ru/club-shovi/3-optimize-1920-1200.jpg');"></div>
        <div class="slide" style="background-image: url('https://siteprovider.ru/club-shovi/4-optimize-1920-1200.jpg');"></div>
    </div>
    <div class="hero-overlay"></div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Купить шаверму в <span>Кириши</span><br><span style="color: #9d0000;">club ШОВЕРИ</span></h1>
                <p class="subtitle">Сочно. Мощно. Без лишних слов. Для тех, кто ценит крутой вкус, своё время и свежее мясо.</p>
                
                <div class="trust-points">
                    <div class="trust-point">
                        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        Только свежие ингредиенты каждый день
                    </div>
                    <div class="trust-point">
                        <svg viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                        Готовим и доставляем со скоростью звука
                    </div>
                    <div class="trust-point">
                        <svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        Тот самый фирменный соус, за которым возвращаются
                    </div>
                </div>

                <div class="hero-actions">
                    <a href="tel:+79111482707" class="btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        Позвонить
                    </a>
                    <a href="https://t.me/club-shoveri" target="_blank" class="btn btn-outline">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.19-.08-.05-.19-.02-.27 0-.12.03-1.99 1.26-5.61 3.71-.53.36-1.01.54-1.44.53-.47-.01-1.38-.27-2.05-.49-.83-.27-1.49-.41-1.43-.87.03-.24.33-.49.91-.75 3.56-1.55 5.93-2.57 7.12-3.07 3.39-1.41 4.09-1.65 4.54-1.66.1 0 .32.02.43.12.09.08.12.19.11.3z"/></svg>
                        Telegram
                    </a>
                    <a href="https://vk.com/club-shoveri" target="_blank" class="btn btn-outline">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22.049 8.275c.162-.533.013-.918-.707-.918h-2.535c-.6 0-.882.316-1.022.663 0 0-1.288 3.14-3.111 5.176-.587.587-.852.774-1.152.774-.15 0-.376-.187-.376-.663V8.275c0-.6-.175-.918-.725-.918H8.816c-.4 0-.638.297-.638.583 0 .618.925.761 1.018 2.507v3.784c0 .762-.138.899-.438.899-.8 0-2.748-3.155-3.896-6.764-.225-.664-.45-1.09-1.05-1.09H1.275c-.675 0-.812.316-.812.663 0 .638.825 3.845 3.85 8.082 2.012 2.887 4.85 4.474 7.424 4.474 1.55 0 1.738-.348 1.738-.948v-2.186c0-.68.143-.815.626-.815.35 0 .962.174 2.387 1.549 1.625 1.624 1.887 2.361 2.787 2.361h2.535c.675 0 .338-.675 0-1.337-.312-.587-1.425-1.749-1.75-2.149-.412-.5-.337-.724 0-1.262 0 0 3.087-4.36 3.025-5.882z"/></svg>
                        VK
                    </a>
                </div>
            </div>

            <div class="hero-form">
                <div class="order-form-wrapper">
                    <h3>Сделать заказ онлайн</h3>
                    <p>Заполни форму, и мы начнем крутить твою идеальную шаверму.</p>
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Как вас зовут?" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control phone-mask" placeholder="+7 (___) ___-__-__" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" placeholder="Комментарий (без лука, поострее...)">
                        </div>
                        <div class="form-group">
                            <textarea name="cart" id="cartData" class="form-control" rows="4" readonly placeholder="Добавьте товары из меню"></textarea>
                        </div>
                        <button type="submit" class="btn">Оформить заказ</button>
                        <div class="privacy-hint">
                            Отправляя форму, вы соглашаетесь с <a onclick="openModal('privacyModal')">политикой конфиденциальности</a> и <a onclick="openModal('termsModal')">пользовательским соглашением</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section class="menu-section" id="menu">
    <div class="container">
        <h2>Наше <span>Меню</span></h2>
        
        <div class="tab-buttons">
            <?php
                $tabs = [
                    'shaverma' => 'Шаверма',
                    'samsa' => 'Самса',
                    'chebureki' => 'Чебуреки',
                    'hotdogs' => 'Хот-доги',
                    'drinks' => 'Напитки'
                ];
                $first = true;
                foreach($tabs as $id => $name) {
                    $active = $first ? 'active' : '';
                    echo "<button class='tab-btn $active' data-target='$id'>$name</button>";
                    $first = false;
                }
            ?>
        </div>

        <div class="tab-content-container">
            <?php
                $first = true;
                foreach($tabs as $id => $name) {
                    $active = $first ? 'active' : '';
                    echo "<div class='tab-pane $active' id='tab-$id'>";
                    
                    // Generate 10 cards per category
                    for($i=1; $i<=10; $i++) {
                        $price = rand(150, 450);
                        echo "
                        <div class='menu-card' data-product='$name фирменная #$i' data-price='$price'>
                            <div class='menu-card-img'></div>
                            <div class='menu-card-content'>
                                <h3 class='menu-card-title'>$name фирменная #$i</h3>
                                <p class='menu-card-desc'>Сочное мясо, свежие овощи, фирменный соус в хрустящем исполнении. Сытно и мощно.</p>
                                <div class='menu-card-footer'>
                                    <span class='menu-card-price'>$price ₽</span>
                                    <button type='button' class='btn add-to-cart'>В корзину</button>
                                </div>
                            </div>
                        </div>";
                    }
                    
                    echo "</div>";
                    $first = false;
                }
            ?>
        </div>
    </div>
</section>

<!-- Advantages Section -->
<section class="info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-text">
                <h2>Почему именно <span>club ШОВЕРИ</span>?</h2>
                <div class="advantages-list">
                    <div class="advantage-item">
                        <div class="advantage-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                        </div>
                        <div class="advantage-text">
                            <h4>Безупречная свежесть</h4>
                            <p>Мы не замораживаем мясо на месяцы. Привозим свежее, маринуем сами по секретному рецепту и готовим сразу. Овощи хрустят, лаваш тает.</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-icon">
                            <svg viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                        </div>
                        <div class="advantage-text">
                            <h4>Скорость доставки</h4>
                            <p>Фастфуд должен быть фаст. Онлайн-заказ падает на кухню в секунду, и уже через считанные минуты твой заказ летит к тебе горячим.</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </div>
                        <div class="advantage-text">
                            <h4>Любовь к делу</h4>
                            <p>Мы кормим Кириши так, как кормили бы своих друзей. Порции от души, соуса не жалеем.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="https://siteprovider.ru/club-shovi/4.jpg" alt="Интерьер club ШОВЕРИ" class="info-image">
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <h2>Частые <span>вопросы</span></h2>
        <div class="faq-container">
            
            <div class="faq-item">
                <button class="faq-question">А лук можно убрать? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>Можно всё! Главное — напишите об этом в комментарии к заказу или скажите по телефону. Мы не обидимся, а сделаем так, как вкусно именно вам.</p></div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">Какое мясо вы используете? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>Мы используем только отборное куриное филе и бедро для сочности, маринованное по нашей фирменной технологии.</p></div>
            </div>

            <div class="faq-item">
                <button class="faq-question">Как быстро доставляете по Киришам? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>В среднем укладываемся в 40-50 минут. Если пробки или сильный ажиотаж в выходные — предупредим заранее. Но мы всегда стараемся привезти еду горячей!</p></div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">Что за секретный соус? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>Если мы расскажем, он перестанет быть секретным. Скажем так: это идеальный баланс чеснока, свежей зелени и нежной основы, без майонезного послевкусия.</p></div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">Оплата картой или наличными? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>Принимаем всё: наличные, переводы, карты при получении. Как вам удобнее.</p></div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">Можно заказать заранее к определенному времени? <span class="faq-icon">+</span></button>
                <div class="faq-answer"><p>Да, конечно! Оформляйте заказ и укажите время в комментарии. Ваша шаверма будет готова минута в минуту.</p></div>
            </div>

        </div>
    </div>
</section>

<!-- CTA & Contacts Section -->
<section class="cta-section">
    <div class="container">
        <h2>Хватит смотреть, <span>пора есть!</span></h2>
        <p>Заказывай онлайн прямо сейчас и убедись, что это лучшая шаверма в городе.</p>
        
        <div class="contacts-grid">
            <a href="tel:+79111482707" class="contact-card">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                Заказ: +7 911 148-27-07
            </a>
            <a href="tel:+79112358779" class="contact-card">
                <svg viewBox="0 0 24 24"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.35-.11-.74-.03-1.02.24l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.59l2.2-2.21c.28-.26.36-.65.25-1C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM12 3v10l3-3h6V3h-9z"/></svg>
                Админ: +7 911 235-87-79
            </a>
            <a href="https://t.me/club-shoveri" target="_blank" class="contact-card">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.19-.08-.05-.19-.02-.27 0-.12.03-1.99 1.26-5.61 3.71-.53.36-1.01.54-1.44.53-.47-.01-1.38-.27-2.05-.49-.83-.27-1.49-.41-1.43-.87.03-.24.33-.49.91-.75 3.56-1.55 5.93-2.57 7.12-3.07 3.39-1.41 4.09-1.65 4.54-1.66.1 0 .32.02.43.12.09.08.12.19.11.3z"/></svg>
                @club-shoveri
            </a>
            <a href="https://vk.com/club-shoveri" target="_blank" class="contact-card">
                <svg viewBox="0 0 24 24"><path d="M22.049 8.275c.162-.533.013-.918-.707-.918h-2.535c-.6 0-.882.316-1.022.663 0 0-1.288 3.14-3.111 5.176-.587.587-.852.774-1.152.774-.15 0-.376-.187-.376-.663V8.275c0-.6-.175-.918-.725-.918H8.816c-.4 0-.638.297-.638.583 0 .618.925.761 1.018 2.507v3.784c0 .762-.138.899-.438.899-.8 0-2.748-3.155-3.896-6.764-.225-.664-.45-1.09-1.05-1.09H1.275c-.675 0-.812.316-.812.663 0 .638.825 3.845 3.85 8.082 2.012 2.887 4.85 4.474 7.424 4.474 1.55 0 1.738-.348 1.738-.948v-2.186c0-.68.143-.815.626-.815.35 0 .962.174 2.387 1.549 1.625 1.624 1.887 2.361 2.787 2.361h2.535c.675 0 .338-.675 0-1.337-.312-.587-1.425-1.749-1.75-2.149-.412-.5-.337-.724 0-1.262 0 0 3.087-4.36 3.025-5.882z"/></svg>
                vk.com/club-shoveri
            </a>
        </div>
        
        <div class="footer-note">
            г. Кириши. Работаем на доставку и самовывоз. Заказывай онлайн или по телефону!<br>
            &copy; 2026 club ШОВЕРИ. Все права защищены.
        </div>
    </div>
</section>

<!-- Modals -->
<div class="modal" id="termsModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('termsModal')">&times;</button>
        <h3>Пользовательское соглашение</h3>
        <p>Настоящее Пользовательское соглашение регулирует отношения между сервисом доставки "club ШОВЕРИ" и пользователем сети Интернет.</p>
        <p>1. Оформляя заказ на сайте, Пользователь соглашается с условиями доставки и оплаты, указанными на ресурсе.</p>
        <p>2. Изображения продуктов на сайте несут иллюстративный характер и могут отличаться от реального внешнего вида блюд.</p>
        <p>3. Администрация оставляет за собой право изменять цены и состав меню без предварительного уведомления (актуальные данные подтверждаются при звонке оператора).</p>
        <button class="btn" style="margin-top:20px; width:100%" onclick="closeModal('termsModal')">Понятно</button>
    </div>
</div>

<div class="modal" id="privacyModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('privacyModal')">&times;</button>
        <h3>Согласие на обработку данных</h3>
        <p>Оставляя свои данные в форме заказа, вы даете согласие на обработку своих персональных данных (имя, номер телефона) в соответствии с Федеральным законом РФ.</p>
        <p>Данные используются исключительно для обработки и доставки вашего заказа. Мы не передаем ваши контакты третьим лицам и не используем их для спам-рассылок.</p>
        <button class="btn" style="margin-top:20px; width:100%" onclick="closeModal('privacyModal')">Согласен</button>
    </div>
</div>

<!-- Cookie Banner -->
<div class="cookie-banner" id="cookieBanner">
    <div class="cookie-text">
        Мы используем cookies и Яндекс.Метрику, чтобы сайт работал лучше. Продолжая пользоваться сайтом, вы соглашаетесь с этим.
    </div>
    <button class="btn cookie-btn" onclick="acceptCookies()">Принять</button>
</div>

<!-- Scripts -->
<script>
    // Hero Slider
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    setInterval(() => {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }, 4000);

    // Phone Mask
    document.querySelectorAll('.phone-mask').forEach(input => {
        input.addEventListener('input', function (e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
            if (!x[2]) {
                e.target.value = (x[1] === '7' || x[1] === '8') ? '+7 ' : (x[1] ? '+7 (' + x[1] : '');
                return;
            }
            e.target.value = '+7 (' + x[2] + (x[3] ? ') ' + x[3] : '') + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '');
        });
    });

    // Tabs
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => b.classList.remove('active'));
            tabPanes.forEach(p => p.classList.remove('active'));
            
            btn.classList.add('active');
            document.getElementById('tab-' + btn.dataset.target).classList.add('active');
        });
    });

    // FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            faqItems.forEach(i => i.classList.remove('active'));
            if (!isActive) item.classList.add('active');
        });
    });

    // Modals
    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }
    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }
    
    // Close modal on outside click
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.remove('active');
        });
    });

    // Shopping cart
    const cart = [];
    const cartToggle = document.querySelector('.cart-toggle');
    const cartPanel = document.getElementById('cartPanel');
    const cartItems = document.querySelector('.cart-items');
    const cartCount = document.querySelector('.cart-count');
    const cartTotalValue = document.querySelector('.cart-total-value');
    const cartData = document.getElementById('cartData');

    function renderCart() {
        const itemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
        const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        cartCount.textContent = itemCount;
        cartTotalValue.textContent = total + ' ₽';
        cartItems.innerHTML = '';

        if (!cart.length) {
            cartItems.innerHTML = '<p class="cart-empty">Корзина пока пуста</p>';
        } else {
            cart.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.className = 'cart-item';
                itemElement.innerHTML = `
                    <div>
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">${item.price} ₽ × ${item.quantity}</div>
                    </div>
                    <div class="cart-item-controls">
                        <button type="button" data-cart-action="decrease" data-cart-index="${index}" aria-label="Уменьшить количество">−</button>
                        <span>${item.quantity}</span>
                        <button type="button" data-cart-action="increase" data-cart-index="${index}" aria-label="Увеличить количество">+</button>
                    </div>`;
                cartItems.appendChild(itemElement);
            });
        }

        cartData.value = cart.map(item => `${item.name} — ${item.quantity} шт. × ${item.price} ₽`).join('; ');
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.menu-card');
            const name = card.dataset.product;
            const price = Number(card.dataset.price);
            const existingItem = cart.find(item => item.name === name && item.price === price);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }

            renderCart();
            cartPanel.classList.add('active');
            cartToggle.setAttribute('aria-expanded', 'true');
        });
    });

    cartToggle.addEventListener('click', () => {
        const isOpen = cartPanel.classList.toggle('active');
        cartToggle.setAttribute('aria-expanded', String(isOpen));
    });

    cartItems.addEventListener('click', (event) => {
        const control = event.target.closest('[data-cart-action]');
        if (!control) return;

        const item = cart[Number(control.dataset.cartIndex)];
        if (control.dataset.cartAction === 'increase') item.quantity += 1;
        if (control.dataset.cartAction === 'decrease') item.quantity -= 1;
        if (item.quantity <= 0) cart.splice(Number(control.dataset.cartIndex), 1);
        renderCart();
    });

    document.querySelector('.cart-order-btn').addEventListener('click', () => {
        document.querySelector('.order-form-wrapper').scrollIntoView({ behavior: 'smooth' });
        cartPanel.classList.remove('active');
        cartToggle.setAttribute('aria-expanded', 'false');
    });

    renderCart();

    // Cookies
    if (!localStorage.getItem('cookies_accepted')) {
        document.getElementById('cookieBanner').style.display = 'flex';
    }
    function acceptCookies() {
        localStorage.setItem('cookies_accepted', '1');
        document.getElementById('cookieBanner').style.display = 'none';
    }
</script>

</body>
</html>