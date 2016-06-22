<?php

define('MAINTENANCE', false);
define('DISALLOW_FILE_EDIT', true);

function __autoload($class_name) { 
  if(strpos($class_name, 'Dysign_') !== false){
    $class_name = strtolower(str_replace('_', '-', $class_name));
    include get_template_directory().'/core/class-'.$class_name.'.php';
  }
} 

// Hooks
$dysign_theme_hooks = new Dysign_Theme_Hooks();
$dysign_theme_hooks->execute();

// Post Types
$dysign_theme_cpt = new Dysign_Theme_CPT();
$dysign_theme_cpt->execute();

// Theme features
$dysign_theme_features = new Dysign_Theme_Features();
$dysign_theme_features->execute();

// ACF
$dysign_theme_acf = new Dysign_Theme_ACF();
$dysign_theme_acf->execute();

// Ajax
$dysign_theme_ajax = new Dysign_Theme_Ajax();
$dysign_theme_ajax->execute();

// Plugins
$dysign_theme_plugins = new Dysign_Theme_Plugins();
$dysign_theme_plugins->execute();

// WP API
$dysign_theme_api = new Dysign_Theme_API();
$dysign_theme_api->execute();