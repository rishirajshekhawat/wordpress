<?php
/**
 * This file was automatically generated by automattic/jetpack-autoloader.
 *
 * @package automattic/jetpack-autoloader
 */

namespace Automattic\Jetpack\Autoloader\jp3418cca783c4a7d647675a3b0ee88cfa;

 // phpcs:ignore

global $jetpack_packages_classmap;
global $jetpack_packages_filemap;
global $jetpack_autoloader_activating_plugins_paths;

if ( ! is_array( $jetpack_packages_classmap ) ) {
	$jetpack_packages_classmap = array();
}

if ( ! is_array( $jetpack_packages_filemap ) ) {
	$jetpack_packages_filemap = array();
}

if ( ! is_array( $jetpack_autoloader_activating_plugins_paths ) ) {
	$jetpack_autoloader_activating_plugins_paths = array();
}

/**
 * Used for autoloading jetpack packages.
 *
 * @param string $class_name Class Name to load.
 *
 * @return Boolean Whether the class_name was found in the classmap.
 */
function autoloader( $class_name ) {
	global $jetpack_packages_classmap;

	if ( isset( $jetpack_packages_classmap[ $class_name ] ) ) {
		require_once $jetpack_packages_classmap[ $class_name ]['path'];
		return true;
	}

	return false;
}

/**
 * Used for running the code that initializes class and file maps.
 *
 * @param Plugins_Handler  $plugins_handler The Plugins_Handler object.
 * @param Version_Selector $version_selector The Version_Selector object.
 */
function enqueue_files( $plugins_handler, $version_selector ) {
	require_once __DIR__ . '/../class-classes-handler.php';
	require_once __DIR__ . '/../class-files-handler.php';

	$classes_handler = new Classes_Handler( $plugins_handler, $version_selector );
	$classes_handler->set_class_paths();

	$files_handler = new Files_Handler( $plugins_handler, $version_selector );
	$files_handler->set_file_paths();

	$files_handler->file_loader();
}

/**
 * Finds the latest installed autoloader. If this is the latest autoloader, sets
 * up the classmap and filemap.
 */
function set_up_autoloader() {
	global $jetpack_autoloader_latest_version;
	global $jetpack_packages_classmap;

	require_once __DIR__ . '/../class-plugins-handler.php';
	require_once __DIR__ . '/../class-version-selector.php';
	require_once __DIR__ . '/../class-autoloader-handler.php';

	$plugins_handler    = new Plugins_Handler();
	$version_selector   = new Version_Selector();
	$autoloader_handler = new Autoloader_Handler( $plugins_handler, $version_selector );

	if ( $plugins_handler->should_autoloader_reset() ) {
		/*
		 * The autoloader must be reset when an activating plugin that was
		 * previously unknown is detected.
		 */
		$jetpack_autoloader_latest_version = null;
		$jetpack_packages_classmap         = array();
	}

	// Find the latest autoloader.
	if ( ! $jetpack_autoloader_latest_version ) {
		$autoloader_handler->find_latest_autoloader();
	}

	$current_autoloader_version = $autoloader_handler->get_current_autoloader_version();

	// This is the latest autoloader, so generate the classmap and filemap and register the autoloader function.
	if ( empty( $jetpack_packages_classmap ) && $current_autoloader_version === $jetpack_autoloader_latest_version ) {
		enqueue_files( $plugins_handler, $version_selector );
		$autoloader_handler->update_autoloader_chain();
	}
}
