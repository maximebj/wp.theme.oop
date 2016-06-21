<?php

// Thumbnails, Scripts, admin cleanup, site optimization...
// include('core/theme-config.php');

// // CPT
// include('core/cpt.php');

// // ACF Options pages
// include('core/acf.php');

// // Filters, Templates helpers...
// include('core/theme-features.php');

// // Ajax
// include('core/ajax.php');

// // Plugins
// include('core/plugins.php');

// WP API mods
//include('core/wp-api.php');


class Dysign_Theme() {

  private const $maintenance = false;

  public function __construct() {

    if($this->$maintenance)
      add_action('get_header', array($this, 'activate_maintenance'));

    add_action( 'after_setup_theme', array($this, 'theme_setup'));
  }

  private function theme_setup() {

    // Text Domain
    load_theme_textdomain('dysign', get_template_directory() . '/languages');

    //  Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(380, 230, true );
    //add_image_size('slider', 540, 350, true);

    //  Page Title
    add_theme_support('title-tag');

    // Menus
    register_nav_menus( array(
      'main' => 'Menu Principal',
      'footer' => 'Pied de page'
    ));

    // Editor Tiny MCE custom styles
    add_editor_style(array('css/editor-style.css'));

    // Enable HTML5
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // RSS
    add_theme_support('automatic-feed-links');

    // Remove post format
    remove_theme_support('post-formats');
  }


  private function activate_maintenance() {
    if ( !current_user_can('edit_themes') || !is_user_logged_in() ) {
      wp_die('Site en maintenance, merci de revenir dans un moment.');
    }
  }

}

$dysign_theme = new Dysign_Theme();
