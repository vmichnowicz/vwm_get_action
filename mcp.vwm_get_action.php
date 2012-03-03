<?php if ( ! defined('EXT')) { exit('Invalid file request'); }

/**
 * VWM Get Action
 *
 * @package		VWM Get Action
 * @author		Victor Michnowicz
 * @copyright	Copyright (c) 2012 Victor Michnowicz
 * @license		http://www.apache.org/licenses/LICENSE-2.0.html
 * @link		http://github.com/vmichnowicz/vwm_get_action
 */

// -----------------------------------------------------------------------------

/**
 * VWM Get Action
 */
class Vwm_get_action_mcp {

	private $EE;
	
	/**
	 * Load all of our models, helpers, config file, and add JS and CSS to page
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		// Make a local reference to the ExpressionEngine super object
		$this->EE =& get_instance();
	}

	/**
	 * Module CP page
	 * 
	 * @access public
	 * @return string
	 */
	public function index()
	{
		// Page title
		$this->EE->cp->set_variable('cp_page_title', $this->EE->lang->line('vwm_get_action_module_name'));
	}
}

// EOF