<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'FAST International' ?> | Formation Conseil Développement</title>
    <meta name="description" content="<?= isset($meta_description) ? $meta_description : $t['hero_subtitle'] ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Meta tags pour SEO -->
    <meta name="keywords" content="FAST International, formation, consulting, développement, IT, bases de données, Oracle, SQL Server, Java, .NET, Linux, Windows, Cloud, DevOps">
    <meta name="author" content="FAST International">
    <meta property="og:title" content="<?= isset($page_title) ? $page_title : 'FAST International' ?>">
    <meta property="og:description" content="<?= isset($meta_description) ? $meta_description : $t['hero_subtitle'] ?>">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#1a56db">
</head>
<body>
    <header>
        <nav class="navbar" id="navbar">
            <div class="nav-container">
                <a href="#home" class="nav-logo">
                    <span class="logo-icon"><img src="public/images/logo.jpg" alt="FAST International Logo"></span>
                </a>
                
                <div class="nav-menu" id="nav-menu">
                    <a href="#home" class="nav-link active" data-section="home">
                        <i class="fas fa-home"></i> <?= $t['home'] ?>
                    </a>
                    <a href="#about" class="nav-link" data-section="about">
                        <i class="fas fa-info-circle"></i> <?= $t['about'] ?>
                    </a>
                    <a href="#services" class="nav-link" data-section="services">
                        <i class="fas fa-cogs"></i> <?= $t['services'] ?>
                    </a>
                    <a href="#expertise" class="nav-link" data-section="expertise">
                        <i class="fas fa-laptop-code"></i> <?= $t['expertise'] ?>
                    </a>
                    <a href="#missions" class="nav-link" data-section="missions">
                        <i class="fas fa-briefcase"></i> <?= $t['missions'] ?>
                    </a>
                    <a href="#contact" class="nav-link" data-section="contact">
                        <i class="fas fa-envelope"></i> <?= $t['contact'] ?>
                    </a>
                </div>
                
                <div class="nav-extras">
                    <div class="language-switcher">
                        <a href="?lang=fr" class="lang-link <?= $lang == 'fr' ? 'active' : '' ?>" title="Français">
                            <span class="flag-icon">🇫🇷</span> FR
                        </a>
                        <a href="?lang=en" class="lang-link <?= $lang == 'en' ? 'active' : '' ?>" title="English">
                            <span class="flag-icon">🇬🇧</span> EN
                        </a>
                    </div>
                    
                    <button class="hamburger" id="hamburger" aria-label="Menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="main-content">
