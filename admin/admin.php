<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class CMB2_Options_Admin {

    /**
     * Option key, and option page slug
     * @var string
     */
    private $key = '';

    /**
     * Options page metabox id
     * @var string
     */
    private $prefix = '';

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';

    /**
     * Menu icon
     * @var string
     */
    protected $icon = '';

    /* Menu position
     * @var string
     */
    protected $position = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $config_file = cmbo_get_file_config( 'admin' );

        $config = array();
        if ( $config_file ){
            $config = include( $config_file );
        }

        $config = wp_parse_args( $config , array(
            'menu_slug'     => 'cmbo_options',
            'tab_prefix'    => 'tab_',
            'page_title'    => __( 'Site Options', 'myprefix' ),
            'icon'          => '',
            'position'      => '62'
        ) );

        $this->title    = $config['page_title'];
        $this->key      = $config['menu_slug'];
        $this->prefix   = $config['tab_prefix'];
        $this->icon     = $config['icon'];
        $this->position = $config['position'];

    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
    }


    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ), $this->icon, $this->position );

        // Include CMB CSS in the head to avoid FOUT
        add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
    }

    /**
     * Get all meta boxes that added for page options
     * @since 1.0.0
     * @return array
     */
    function get_option_boxes(){
        $boxes = CMB2_Boxes::get_all();
        $options_boxes = array();
        foreach ( $boxes  as $k => $mb ) {
            $object = $mb->mb_object_type();
            $is_true =  false;
            if ( is_array( $object ) ){
                if ( in_array( 'options-page', $object ) ) {
                    $is_true = true;
                }
            } else {
                if ( $object == 'options-page' ) {
                    $is_true = true;
                }
            }

            if ( $is_true ) {
                $is_true = false;
                if(  isset( $mb->meta_box['show_on'] ) ){
                    if(  is_string( $mb->meta_box['show_on']['value'] ) ){
                        $is_true = $mb->meta_box['show_on']['value'] == $this->key;
                    } else if ( is_array( $mb->meta_box['show_on']['value'] ) ) {
                        $is_true = in_array( $this->key, $mb->meta_box['show_on']['value'] ) ;
                    }
                }

            }

            if ( $is_true ) {
                $options_boxes[ $k ] =  $mb;
            }
        }

        return $options_boxes;
    }

    /**
     * Get current option page link
     *
     * @return string
     */
    function page_link(){
        return admin_url( 'admin.php?page='.$this->key );
    }

    /**
     * Admin page markup. Mostly handled by CMB2
     * @since  0.1.0
     */
    public function admin_page_display() {
        $link = $this->page_link();
        $boxes = $this->get_option_boxes();
        $tab =  isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : key( $boxes );
        if ( ! isset( $boxes[ $tab ] ) ) {
            reset( $boxes );
            $tab  = key( $boxes );
        }
        ?>
        <div class="wrap cmb2-options-page <?php echo $this->key; ?> <?php echo esc_attr( $tab ) ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php  if ( count( $boxes ) > 1 ) { ?>
            <h2 class="nav-tab-wrapper">
                <?php foreach ( $boxes as $k => $mb ) { ?>
                <a href="<?php echo add_query_arg( array( 'tab' => $k ), $link ) ?>" class="nav-tab <?php echo $tab == $k ? 'nav-tab-active' : ''; ?>"><?php echo $mb->meta_box['title']; ?></a>
                <?php } ?>
            </h2>
            <?php } ?>
            <?php cmb2_metabox_form( $tab , $this->key, array( 'cmb_styles' => false ) ); ?>
        </div>
    <?php
    }


    /**
     * Add the options metabox to the array of metaboxes
     * @since  0.1.0
     */
    function add_options_page_metabox() {

        $file = cmbo_get_file_config( 'options' );

        if ( $file ) {
           include_once $file;
        }
    }

    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {
        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }

        throw new Exception( 'Invalid property: ' . $field );
    }

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return CMB2_Options_Admin object
 */
function cmbo_options_admin() {
    static $object = null;
    if ( is_null( $object ) ) {
        $object = new CMB2_Options_Admin();
        $object->hooks();
    }

    return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function cmbo_get_setting( $key = '' ) {
    return cmb2_get_option( cmb2_options_admin()->key, $key );
}

// Get it started
add_action( 'init', 'cmbo_options_admin' );
