<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>./style.css">
</head>
<body>
    <header>
    <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>./images/logo.jpg" alt="Logo">
    </div>
    <nav class="main-menu">
        <ul class="nav-menu">
            <?php
            $paginas = get_pages(array(
                'sort_column' => 'menu_order',
                'sort_order' => 'asc'
            ));
            foreach ($paginas as $pagina) {
                $enlace = get_page_link($pagina->ID);
                $titulo = $pagina->post_title;
                echo '<li><a href="' . $enlace . '">' . $titulo . '</a></li>';
            }
            ?>
        </ul>
        
    </nav>
</header>
<hr>

<main>
    <?php
    if (is_page()) {
        while (have_posts()) {
            the_post();
            the_title('<h1>', '</h1>');
            the_content();
        }
    } elseif (have_posts()) {
        while (have_posts()) {
            the_post();
            the_title('<h3>', '</h3>');
            the_excerpt();
        }
    } else {
        echo '<p>No hay contenido disponible.</p>';
    }
    ?>
</main>

<hr>
    <footer>
    <h2>Redes Sociales</h2>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'redes_footer',
        'container' => 'nav',
        'container_class' => 'footer-menu',
        'menu_class' => 'footer-nav'
    ));?>
    <h2>Políticas de Privacidad</h2>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'politicas',
        'container' => 'nav',
        'container_class' => 'politicas-menu',
        'menu_class' => 'politicas-nav'
    ));
    ?>

    </footer>
</body>
</html>