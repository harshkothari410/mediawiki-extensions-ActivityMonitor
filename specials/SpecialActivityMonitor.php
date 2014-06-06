<?php
/**
 * SpecialPage for ActivityMonitor extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialActivityMonitor extends SpecialPage {
	public function __construct() {
		parent::__construct( 'ActivityMonitor' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:ActivityMonitor/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'ActivityMonitor-specialpage-title' ) );

		$out->addModules( array( 'ext.ActivityMonitor.core' ) );
		// $out->addModuleScripts( array( 'ext.ActivityMonitor.socketio', 'ext.ActivityMonitor.core' ) );
	}
}
