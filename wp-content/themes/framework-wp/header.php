<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leospa - Spa & Beauty in Nottingham</title>
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="uploads/favicon.ico" type="image/x-icon">
    <link rel="icon" href="uploads/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="site-wrap">
        <div class="top-content">
            <header class="header">
                <div class="inner">
                    <div class="header-content">
                        <div class="logo">
                            <a href="/">Leospa</a>
                        </div>
                        <div class="navigation">
                            <div class="menu-toggle">
                                <span class="line-1"></span>
                                <span class="line-2">
                                    <p>Menu Toggle</p>
                                </span>
                                <span class="line-3"></span>
                            </div>
                            <nav class="menu">
                                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>