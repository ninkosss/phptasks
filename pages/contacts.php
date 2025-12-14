<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="wrapper">
        <header class="container">
            <span class="logo">AGFT</span>
            <nav>
                <ul>
                    <?php foreach ($navPages as $pageKey => $pageData): ?>
                        <li class="<?php echo ($currentPage === $pageKey) ? 'active' : ''; ?>">
                            <a href="<?php echo $pageKey === 'home' ? '/' : '/' . $pageKey; ?>">
                                <?php echo htmlspecialchars($pageData['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="btn">
                        <a href="/login">
                            <?php echo isset($_SESSION['user']) ? 'Profile' : 'Login'; ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container" style="padding: 100px 0; text-align: center;">
                <h1>Contact Us</h1>
                <p>Get in touch with our team for game testing opportunities and partnerships.</p>
                <div style="max-width: 600px; margin: 50px auto; text-align: left;">
                    <div style="margin-bottom: 30px;">
                        <h3>Phone</h3>
                        <p>+3920410240</p>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <h3>Email</h3>
                        <p>info@agft.com</p>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <h3>Address</h3>
                        <p>123 Game Street<br>Tech City, TC 12345</p>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <h3>Business Hours</h3>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="blocks container">
            <div>
                <span class="logo">AGFT</span>
                <p>All our customers are satisfied. Try it with your friend or loved one.</p>
            </div>
            <div>
                <h4>About us</h4>
                <ul>
                    <li>Games</li>
                    <li>Portfolio</li>
                    <li>Careers</li>
                    <li>Contact us</li>
                </ul>
            </div>
            <div>
                <h4>Contact us</h4>
                <p>Our company has been operating for many years, and we look forward to working with you.</p>
                <p>+3920410240</p>
            </div>
        </div>
        <hr>
        <p>Copyright <?php echo date('Y'); ?> AGFT All rights reserved</p>
    </footer>
</body>
</html>
