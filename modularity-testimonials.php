<?php

/**
 * Plugin Name:       Modularity Testimonials
 * Plugin URI:        https://github.com/helsingborg-stad/modularity-testimonials
 * Description:       Provides testimonial modules
 * Version:           1.0.0
 * Author:            Nikolas Ramstedt
 * Author URI:        https://github.com/helsingborg-stad
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       modularity-testimonials
 * Domain Path:       /languages
 */

 // Protect agains direct file access
if (! defined('WPINC')) {
    die;
}

define('MODULARITYTESTIMONIALS_PATH', plugin_dir_path(__FILE__));
define('MODULARITYTESTIMONIALS_URL', plugins_url('', __FILE__));
define('MODULARITYTESTIMONIALS_TEMPLATE_PATH', MODULARITYTESTIMONIALS_PATH . 'templates/');
define('MODULARITYTESTIMONIALS_MODULE_PATH', MODULARITYTESTIMONIALS_PATH . 'source/php/Module');
define('MODULARITYTESTIMONIALS_VIEW_PATH', MODULARITYTESTIMONIALS_MODULE_PATH . '/TestimonialCards/views');

load_plugin_textdomain('modularity-testimonials', false, plugin_basename(dirname(__FILE__)) . '/languages');

require_once MODULARITYTESTIMONIALS_PATH . 'source/php/Vendor/Psr4ClassLoader.php';
require_once MODULARITYTESTIMONIALS_PATH . 'Public.php';

// Instantiate and register the autoloader
$loader = new ModularityTestimonials\Vendor\Psr4ClassLoader();
$loader->addPrefix('ModularityTestimonials', MODULARITYTESTIMONIALS_PATH);
$loader->addPrefix('ModularityTestimonials', MODULARITYTESTIMONIALS_PATH . 'source/php/');
$loader->register();

// Start application
new ModularityTestimonials\App();

// Acf auto import and export
add_action('plugins_loaded', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('modularity-testimonials');
    $acfExportManager->setExportFolder(MODULARITYTESTIMONIALS_PATH . 'source/php/acf-fields/');
    $acfExportManager->autoExport(array(
        'modularity-testimonial-cards' => 'group_59f2e69948a47'
    ));
    $acfExportManager->import();
});

/**
 * Registers the module
 */
add_action('plugins_loaded', function () {
    if (function_exists('modularity_register_module')) {
        modularity_register_module(
            MODULARITYTESTIMONIALS_MODULE_PATH ."/TestimonialCards/",
            'TestimonialCards'
        );
    }
});



add_filter('/Modularity/externalViewPath', function($viewPaths){
    $viewPaths['mod-testimonial-card'] = MODULARITYTESTIMONIALS_VIEW_PATH;
    
    return $viewPaths;
});

