<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .error-container {
            text-align: center;
            padding: 100px 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #ff6b6b;
            margin-bottom: 20px;
        }
        .error-message {
            font-size: 24px;
            margin-bottom: 30px;
            color: #333;
        }
        .error-description {
            font-size: 16px;
            color: #666;
            margin-bottom: 40px;
        }
        .back-home {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h1 class="error-message">Сторінку не знайдено</h1>
        <p class="error-description">
            Вибачте, але сторінка, яку ви шукаєте, не існує або була переміщена.
        </p>
        <a href="/" class="back-home">Повернутися на головну</a>
    </div>
</body>
</html>
