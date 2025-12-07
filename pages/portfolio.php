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
                <h1>Portfolio</h1>
                <p>Check out our latest game testing projects and beta participation programs.</p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 50px;">
                    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                        <h3>It Takes Two</h3>
                        <p>Co-op platformer testing and beta feedback collection.</p>
                    </div>
                    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                        <h3>Split Fiction</h3>
                        <p>Multiplayer game testing and performance optimization.</p>
                    </div>
                    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                        <h3>Bytebond</h3>
                        <p>Indie game beta testing and user experience evaluation.</p>
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
