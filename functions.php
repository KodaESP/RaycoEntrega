<?php
function mi_tema_setup() {
    register_nav_menus(array(
        'menu_principal' => 'Menú Principal',
        'redes_footer'  => 'Redes Footer',
        'politicas'     => 'Políticas'
    ));
}
add_action('after_setup_theme', 'mi_tema_setup');


?>
