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
        <div class="hero container">
            <div class="hero-info">
                <h2>3D game Tests</h2>
                <h1>Work that we produce for our clients</h1>
                <p>We offer computer game options based on participation in beta tests.</p>
                <button class="btn">Get more details</button>
            </div>
            <img src="../img/joystick.svg" alt="">
        </div>
        <div class="container trending">
        <a href="#" class="see-all">See all</a>
        <h3>Currently Trending Games</h3>
            <div class="games">
                <?php
                $games = [
                    ['img' => 'ittakestwo.png', 'name' => 'It takes two'],
                    ['img' => 'splitfiction.png', 'name' => 'Split fiction'],
                    ['img' => 'bytebond.png', 'name' => 'Bytebond'],
                    ['img' => 'awayout.png', 'name' => 'A way out']
                ];
                foreach ($games as $game) {
                    echo '<div class="block">';
                    echo '<img src="../img/' . $game['img'] . '" alt="' . $game['name'] . '">';
                    echo '<span><img src="#" alt="">' . $game['name'] . '</span>';
                    echo '</div>';
                }
                ?>
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
