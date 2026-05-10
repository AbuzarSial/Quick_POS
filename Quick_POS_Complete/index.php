<?php

declare(strict_types=1);

require_once __DIR__ . '/src/ContactValidator.php';

use QuickPOS\ContactValidator;

$validator = new ContactValidator();
$errors = [];
$old = [
    'name' => '',
    'email' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = $validator->sanitize($_POST);
    $errors = $validator->validate($_POST);

    if ($errors === []) {
        header('Location: thank_you.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - Smart Point of Sale Solution</title>
    <meta name="description" content="QuickPOS is a fast, reliable, and modern POS solution for growing businesses.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header" id="home">
        <a href="#home" class="logo" aria-label="QuickPOS homepage">QuickPOS</a>

        <nav class="navbar" aria-label="Main navigation">
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a>
        </nav>

        <a href="#contact" class="signup-btn">Sign Up</a>
    </header>

    <main>
        <section class="hero-section section-padding">
            <div class="hero-content">
                <p class="eyebrow">Modern POS for modern stores</p>
                <h1>Simplify sales, inventory, and reports with QuickPOS.</h1>
                <p class="hero-text">
                    QuickPOS helps retail businesses process sales faster, track stock accurately,
                    and understand performance with simple real-time reports.
                </p>
                <div class="hero-actions">
                    <a href="#contact" class="primary-btn">Get Started</a>
                    <a href="#features" class="secondary-btn">View Features</a>
                </div>
            </div>

            <div class="hero-card" aria-label="QuickPOS dashboard preview">
                <div class="dashboard-top">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="dashboard-stat large">Today's Sales<br><strong>$8,450</strong></div>
                <div class="dashboard-grid">
                    <div>Orders<br><strong>126</strong></div>
                    <div>Items<br><strong>2,430</strong></div>
                    <div>Stock Alerts<br><strong>12</strong></div>
                    <div>Users<br><strong>8</strong></div>
                </div>
            </div>
        </section>

        <section class="features-section section-padding" id="features">
            <div class="section-heading">
                <p class="eyebrow">Features</p>
                <h2>Everything your store needs to sell smarter</h2>
                <p>QuickPOS keeps daily operations simple for cashiers, managers, and owners.</p>
            </div>

            <div class="feature-grid">
                <article class="feature-card">
                    <span class="feature-icon">⚡</span>
                    <h3>Fast Billing</h3>
                    <p>Process checkout quickly with a clean billing interface and instant receipts.</p>
                </article>
                <article class="feature-card">
                    <span class="feature-icon">📦</span>
                    <h3>Inventory Management</h3>
                    <p>Track stock levels, receive low-stock alerts, and manage products easily.</p>
                </article>
                <article class="feature-card">
                    <span class="feature-icon">📊</span>
                    <h3>Sales Reports</h3>
                    <p>View daily sales, best-selling items, and business trends in one dashboard.</p>
                </article>
                <article class="feature-card">
                    <span class="feature-icon">👥</span>
                    <h3>Multi-user Access</h3>
                    <p>Assign roles to cashiers, managers, and admins with secure access control.</p>
                </article>
            </div>
        </section>

        <section class="pricing-section section-padding" id="pricing">
            <div class="section-heading">
                <p class="eyebrow">Pricing</p>
                <h2>Simple plans for every business size</h2>
                <p>Start small and upgrade when your business grows.</p>
            </div>

            <div class="pricing-grid">
                <article class="pricing-card">
                    <h3>Basic</h3>
                    <p class="price">$19<span>/mo</span></p>
                    <ul>
                        <li>Single register</li>
                        <li>Basic inventory</li>
                        <li>Email support</li>
                    </ul>
                    <a href="#contact" class="plan-btn">Choose Basic</a>
                </article>

                <article class="pricing-card featured-plan">
                    <p class="badge">Popular</p>
                    <h3>Pro</h3>
                    <p class="price">$49<span>/mo</span></p>
                    <ul>
                        <li>Multiple registers</li>
                        <li>Advanced reporting</li>
                        <li>Priority support</li>
                    </ul>
                    <a href="#contact" class="plan-btn">Choose Pro</a>
                </article>

                <article class="pricing-card">
                    <h3>Enterprise</h3>
                    <p class="price">Custom</p>
                    <ul>
                        <li>Unlimited branches</li>
                        <li>Custom integrations</li>
                        <li>Dedicated support</li>
                    </ul>
                    <a href="#contact" class="plan-btn">Contact Sales</a>
                </article>
            </div>
        </section>

        <section class="contact-section section-padding" id="contact">
            <div class="contact-copy">
                <p class="eyebrow">Contact</p>
                <h2>Ready to upgrade your checkout experience?</h2>
                <p>Send us your details and our QuickPOS team will contact you soon.</p>
            </div>

            <form class="contact-form" method="post" action="index.php#contact" novalidate>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?= $old['name']; ?>" placeholder="Enter your name">
                    <?php if (isset($errors['name'])): ?>
                        <p class="error-message"><?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $old['email']; ?>" placeholder="Enter your email">
                    <?php if (isset($errors['email'])): ?>
                        <p class="error-message"><?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tell us about your store"><?= $old['message']; ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <p class="error-message"><?= htmlspecialchars($errors['message'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="primary-btn full-width">Send Message</button>
            </form>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; <?= date('Y'); ?> QuickPOS. All rights reserved.</p>
        <div class="footer-links">
            <a href="#home">Home</a>
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
