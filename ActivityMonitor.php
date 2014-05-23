<?php
/**
 * ActivityMonitor extension
 *
 * For more info see http://mediawiki.org/wiki/Extension:ActivityMonitor
 *
 * @file
 * @ingroup Extensions
 * @author Harsh Kothari ( harshkothari410@gmail.com ), 2014
 * @license GNU General Public Licence 2.0 or later
 */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'ActivityMonitor',
	'author' => array(
		'Harsh Kothari',
	),
	'version'  => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ActivityMonitor',
	'descriptionmsg' => 'ActivityMonitor-desc',
);

/* Setup */

// Register files
$wgAutoloadClasses['ActivityMonitorHooks'] = __DIR__ . '/ActivityMonitor.hooks.php';
$wgAutoloadClasses['SpecialActivityMonitor'] = __DIR__ . '/specials/SpecialActivityMonitor.php';
$wgMessagesDirs['ActivityMonitor'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ActivityMonitorAlias'] = __DIR__ . '/ActivityMonitor.i18n.alias.php';

// Register hooks
#$wgHooks['NameOfHook'][] = 'ActivityMonitorHooks::onNameOfHook';

// Register special pages
$wgSpecialPages['ActivityMonitor'] = 'SpecialActivityMonitor';
$wgSpecialPageGroups['ActivityMonitor'] = 'other';

// Register modules
$wgResourceModules['ext.ActivityMonitor.core'] = array(
	'scripts' => array(
		'modules/js/ext.ActivityMonitor.core.js',
	),
	'styles' => array(
		'modules/js/ext.ActivityMonitor.foo.css',
	),
	'messages' => array(
	),
	'dependencies' => array(
	),

	'localBasePath' => __DIR__,
	'remoteExtPath' => 'examples/ActivityMonitor',
);


/* Configuration */

// Enable Foo
#$wgActivityMonitorEnableFoo = true;
