
<?php 
//Register Custom Taxonomies
if ( ! function_exists( 'personal_init' ) ) {

    function personal_init() {

        # Create the news custom post type
        register_post_type( 'portfolio', array(
            'labels'       => array(
                'name'          => __( 'Portfolio', 'Personal' ),
                'singular_name' => __( 'Portfolio', 'Personal' ),
		        'menu_name'             => __( 'Portfolio', 'personal' ),
				'name_admin_bar'        => __( 'Portfolio', 'personal' ),
				'archives'              => __( 'Portfolio Archives', 'personal' ),
				'attributes'            => __( 'Portfolio Attributes', 'personal' ),
				'parent_item_colon'     => __( 'Parent Item:', 'personal' ),
				'all_items'             => __( 'Portfolio Items', 'personal' ),
				'add_new_item'          => __( 'Add New Portfolio', 'personal' ),
				'add_new'               => __( 'Add New Portfolio', 'personal' ),
				'new_item'              => __( 'New Item Portfolio', 'personal' ),
				'edit_item'             => __( 'Edit Item', 'personal' ),
				'update_item'           => __( 'Update Item', 'personal' ),
				'view_item'             => __( 'View Item', 'personal' ),
				'view_items'            => __( 'View Items', 'personal' ),
				'search_items'          => __( 'Search Item', 'personal' ),
				'not_found'             => __( 'Not found', 'personal' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'personal' ),
				'featured_image'        => __( 'Featured Image', 'personal' ),
				'set_featured_image'    => __( 'Set featured image', 'personal' ),
				'remove_featured_image' => __( 'Remove featured image', 'personal' ),
				'use_featured_image'    => __( 'Use as featured image', 'personal' ),
				'insert_into_item'      => __( 'Insert into item', 'personal' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'personal' ),
				'items_list'            => __( 'Items list', 'personal' ),
				'items_list_navigation' => __( 'Items list navigation', 'personal' ),
				'filter_items_list'     => __( 'Filter items list', 'personal' ),
            ),
            'public'       => true,
            'has_archive'  => true,
            'show_ui'      => true,
            'menu_icon'           => 'dashicons-portfolio',
            'show_in_menu' => true,// adding to custom menu manually
            'supports'              => array( 'title', 'editor','thumbnail' ),
            'taxonomies'   => array(
                'portfolio_category'
            )
        ) );

        # Create the news categories custom taxonomy
        register_taxonomy( 'portfolio_category', array('portfolio'), 
            array(
            'label'        => 'portfolio_category',
            'labels'       => array(
                'menu_name' => __( 'Portfolio Categories', 'Personal' )
            ),
            'all_items' => 'Category',
            'query_var' => true,
            'rewrite'      => array(
                'slug' => 'portfolio-category'
            ),
            'hierarchical' => true
        ) );
        flush_rewrite_rules();

    }

    add_action( 'init', 'personal_init' );

}


if ( ! function_exists( 'personal_add_admin_menu' ) && ! function_exists( 'personal_display_admin_page' ) ) {

    function personal_add_admin_menus() {

        # Settings for custom admin menu
        $page_title = 'Personal Portfolio';
        $menu_title = 'Personal';
        $capability = 'post';
        $menu_slug  = 'Personal';
        $function   = 'personal_display_admin_page';// Callback function which displays the page content.
        $icon_url   = 'dashicons-admin-page';
        $position   = 0;

        # Add custom admin menu
        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

        $submenu_pages = array(

            # Avoid duplicate pages. Add submenu page with same slug as parent slug.
            array(
                'parent_slug' => 'Personal',
                'page_title'  => 'Personal Portfolio',
                'menu_title'  => 'P_Portflio',
                'capability'  => 'read',
                'menu_slug'   => 'Personal',
                'function'    => 'personal_display_admin_page',// Uses the same callback function as parent menu.
            ),

            # Post Type :: View All Posts
            array(
                'parent_slug' => 'Personal',
                'page_title'  => '',
                'menu_title'  => 'View Portfolio',
                'capability'  => '',
                'menu_slug'   => 'edit.php?post_type=portfolio',
                'function'    => null,// Doesn't need a callback function.
            ),

            # Post Type :: Add New Post
            array(
                'parent_slug' => 'Personal',
                'page_title'  => '',
                'menu_title'  => 'Add Portfolio',
                'capability'  => '',
                'menu_slug'   => 'post-new.php?post_type=portfolio',
                'function'    => null,// Doesn't need a callback function.
            ),

            # Taxonomy :: Manage News Categories
            array(
                'parent_slug' => 'Personal',
                'page_title'  => '',
                'menu_title'  => 'Portfolio Categories',
                'capability'  => '',
                'menu_slug'   => 'edit-tags.php?taxonomy=portfolio_category&post_type=portfolio',
                'function'    => null,// Doesn't need a callback function.
            ),

        );

        # Add each submenu item to custom admin menu.
        foreach ( $submenu_pages as $submenu ) {

            add_submenu_page(
                $submenu['parent_slug'],
                $submenu['page_title'],
                $submenu['menu_title'],
                $submenu['capability'],
                $submenu['menu_slug'],
                $submenu['function']
            );

        }

    }

    add_action( 'admin_menu', 'personal_add_admin_menus', 1 );

    /* If you add any extra custom sub menu pages which are not a Custom Post Type or a Custom Taxonomy, you will need
     * to create a callback function for each of your custom submenu items you create above.
     */

    # Default Admin Page for Custom Admin Menu
    function personal_display_admin_page() {

        # Display custom admin page content from newly added custom admin menu.
        echo '<div class="wrap">' . PHP_EOL;
        echo '<h2>My Custom Admin Page Title</h2>' . PHP_EOL;
        echo '<p>This is the custom admin page created from the custom admin menu.</p>' . PHP_EOL;
        echo '</div><!-- end .wrap -->' . PHP_EOL;
        echo '<div class="clear"></div>' . PHP_EOL;

    }

}

if ( ! function_exists( 'personal_set_current_menu' ) ) {

    function personal_set_current_menu( $parent_file ) {
        global $submenu_file, $current_screen, $pagenow;

        # Set the submenu as active/current while anywhere in your Custom Post Type (portfolio)
        if ( $current_screen->post_type == 'portfolio' ) {

            if ( $pagenow == 'post.php' ) {
                $submenu_file = 'edit.php?post_type=' . $current_screen->post_type;
            }

            if ( $pagenow == 'edit-tags.php' ) {
                $submenu_file = 'edit-tags.php?taxonomy=portfolio_category&post_type=' . $current_screen->post_type;
            }

            $parent_file = 'Personal';

        }

        return $parent_file;

    }

    add_filter( 'parent_file', 'personal_set_current_menu' );

}