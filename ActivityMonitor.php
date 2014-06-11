<?php
/**
 * ActivityMonitor extension
 *
 * For more info see http://mediawiki.org/wiki/Extension:ActivityMonitor
 *
 * @file
 * @ingroup Extensions
 * @author Harsh Kothari ( harshkothari410@gmail.com ), Timo Tijhof ( ttijhof@wikimedia.org ) 2014
 * @license The MIT License (MIT)
 */

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'ActivityMonitor',
	'author' => array(
		'Harsh Kothari',
		'Timo Tijhof',
	),
	'version'  => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ActivityMonitor',
	'descriptionmsg' => 'activitymonitor-desc',
);

/* Setup */

// Register files
$wgAutoloadClasses['ActivityMonitorHooks'] = __DIR__ . '/ActivityMonitor.hooks.php';
$wgAutoloadClasses['SpecialActivityMonitor'] = __DIR__ . '/specials/SpecialActivityMonitor.php';
$wgMessagesDirs['ActivityMonitor'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ActivityMonitorAlias'] = __DIR__ . '/ActivityMonitor.i18n.alias.php';

// Register special pages
$wgSpecialPages['ActivityMonitor'] = 'SpecialActivityMonitor';
$wgSpecialPageGroups['ActivityMonitor'] = 'other';

// Options : RCStream URL
$wgActivityMonitorRCStreamUrl = NULL;

// Register modules
$wgResourceModules['ext.ActivityMonitor.core'] = array(
	'scripts' => array(
		'modules/js/ext.ActivityMonitor.core.js',
	),
	'styles' => array(
		'modules/css/ext.ActivityMonitor.core.css',
	),
	'messages' => array(
	),
	'dependencies' => array(
		'ext.ActivityMonitor.socketio',
	),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ActivityMonitor',
);

// Register Socket IO module
$wgResourceModules['ext.ActivityMonitor.socketio'] = array(
	'scripts' => array(
		'lib/socketio.js',
	),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ActivityMonitor',
);