<?php
/** actiuvamos funciones de WORDSPRESS **/

add_theme_support('post-thumbnails'); /** para poder usar imagenes en WORDPRESS **/
register_nav_menu('header', 'Menu Principal'); /** para ahcer aparecer OPCION MENUS en APARIENCIAS DE WORDPRESS**/
add_action('pre_get_posts','change_sort_order');
/** funcion para poder ordenar categorias en WORDPRESS **/
function change_sort_order($query)
{
    if(is_archive()):
        $query->set('order','DESC');
        $query->set('orderby', 'menu_order');
    endif;
}

?>