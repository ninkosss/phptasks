<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
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
                                <?php echo $pageData['title']; ?>
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
                <h1>About Us</h1>
                <p>We are a gaming company specializing in 3D game testing and beta participation programs.</p>
                <p>Our mission is to connect gamers with the latest gaming experiences and provide quality testing services for game developers.</p>
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
