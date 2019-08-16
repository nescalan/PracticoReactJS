<?php 

function add_role_viajero()
{
    add_role(
        'viajero',
        'Viajero',
        [
            'read'          => true,
            'edit_posts'    => true,
            'upload_files'  => true,
            'delete_posts'  => true,
            'publish_posts' => true
        ]
    );
}
 
// add the simple_role
add_action('init', 'add_role_viajero');


function viajes_init() {
  $labels = array(
    'name'               => _x( 'Viajes', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'viaje', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Mis viajes', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Viajes', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Añadir nuevo', 'viaje', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Añadir nuevo viaje', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Nuevo viaje', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Editar viaje', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Ver viaje', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Todos los viajes', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Buscar viajes', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Viajes padre:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No hemos encontrado viajes.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No hemos encontrado viajes en la papelera.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'viaje' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-admin-multisite',  
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'viaje', $args );
}
add_action( 'init', 'viajes_init' );



if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'custom_field_viajes',
    'title' => 'Viaje',
    'fields' => array (
      array (
        'key' => 'viaje_destino',
        'label' => 'Destino',
        'name' => 'destino',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'viaje_vacunas_obligatorias',
        'label' => 'Vacunas obligatorias',
        'name' => 'vacunas_obligatorias',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'viaje_vacunas_recomendadas',
        'label' => 'Vacunas recomendadas',
        'name' => 'vacunas_recomendadas',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'viaje_transporte_local',
        'label' => 'Transporte local',
        'name' => 'transporte_local',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'viaje_peligrosidad',
        'label' => 'Peligrosidad',
        'name' => 'peligrosidad',
        'type' => 'select',
        'choices' => array (
          'nula'    => 'Nula',
          'baja'    => 'Baja',
          'media'   => 'Media',
          'alta'    => 'Alta',
          'extrema' => 'Extrema',
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'viaje_moneda_local',
        'label' => 'Moneda local',
        'name' => 'moneda_local',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'viaje',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}

function wp_api_encode_acf($data,$post,$context){
  $values = get_post_custom( $post->ID);
  foreach ( $values as $key =>$value ) {
    $data->data[$key] = $value;
  }
  return $data;
}
add_filter('rest_prepare_viaje', 'wp_api_encode_acf', 10, 3);

function rutas_init() {
  $labels = array(
    'name'               => _x( 'Rutas', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'ruta', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Mis rutas', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Rutas', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Añadir nuevo', 'ruta', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Añadir nuevo ruta', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Nuevo ruta', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Editar ruta', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Ver ruta', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Todos los rutas', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Buscar rutas', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Rutas padre:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No hemos encontrado rutas.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No hemos encontrado rutas en la papelera.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'ruta' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-chart-area',  
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'ruta', $args );
}
add_action( 'init', 'rutas_init' );

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'custom_field_rutas',
    'title' => 'Ruta',
    'fields' => array (
      array (
        'key' => 'ruta_dificultad',
        'label' => 'Dificultad',
        'name' => 'dificultad',
        'type' => 'select',
        'choices' => array (
          'baja'    => 'Baja',
          'media'   => 'Media',
          'alta'    => 'Alta',
          'experto' => 'Experto',
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'ruta_tiempo',
        'label' => 'Tiempo',
        'name' => 'Tiempo',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'ruta',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}