<?phpfunction ahihi( $wp_customize ) {    $dir = glob( THEME_DIR . 'inc/customizer/*.php' );    foreach ( $dir as $file ) {        if ( file_exists( $file ) ) {            require_once $file;        }    }}add_action( 'customize_register', 'ahihi' );