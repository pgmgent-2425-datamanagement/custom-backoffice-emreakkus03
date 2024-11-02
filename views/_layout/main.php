<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<body>
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="brand text-2xl font-bold"><a href="/" class="hover:text-gray-400">Shopifyo</a></div>

        <nav class="space-x-4">
            <a href="/inventory" class="hover:text-gray-400">Inventaris</a>
            <a href="#" class="hover:text-gray-400">item 3</a>
            <a href="#" class="hover:text-gray-400">item 4</a>
        </nav>
    </header>
    


    <main>
        <?= $content; ?>
    </main>
    
    <footer>
        &copy; <?= date('Y'); ?> - Shopifyo
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</body>
</html>