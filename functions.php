<?php

namespace DysignTheme;

use DysignTheme\Core\Config;
use DysignTheme\Core\CPT;
use DysignTheme\Core\Features;
use DysignTheme\Core\ACF;
use DysignTheme\Core\Ajax;
use DysignTheme\Core\Plugins;
use DysignTheme\Core\API;

class DysignTheme {

  public function run() {

    // Includes
    include get_template_directory().'/core/config.php';
    include get_template_directory().'/core/cpt.php';
    include get_template_directory().'/core/features.php';
    include get_template_directory().'/core/acf.php';
    include get_template_directory().'/core/ajax.php';
    include get_template_directory().'/core/plugins.php';
    include get_template_directory().'/core/api.php';

    // Hooks
    $hooks = new Config();
    $hooks->execute();

    // Post Types
    $cpt = new CPT();
    $cpt->execute();

    // Theme features
    $features = new Features();
    $features->execute();

    // ACF
    $acf = new ACF();
    $acf->execute();

    // Ajax
    $ajax = new Ajax();
    $ajax->execute();

    // Plugins
    $plugins = new Plugins();
    $plugins->execute();

    // WP API
    $api = new API();
    $api->execute();

  }
}

$dysigntheme = new DysignTheme();
$dysigntheme->run();
