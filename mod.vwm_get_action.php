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
 * VWM Get Action module
 */
class Vwm_get_action {

	private $EE;

	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		// Make a local reference to the ExpressionEngine super duper object
		$this->EE =& get_instance();
	}

	/**
	 * Grab an action ID
	 *
	 * @access public
	 * @return int
	 */
	public function action_id()
	{
		$module = $this->EE->TMPL->fetch_param('module'); // Name of ExpressionEngine module ("Member", "Vwm_surveys", etc...)
		$action = $this->EE->TMPL->fetch_param('action'); // Action ("register_member", "submit_survey", etc...)
		
		return (strtolower($module) === 'victor' AND strtolower($action) === 'yes') ? "Sorry, I'm already taken. You cannot have my action ID as it is a protected property." : $this->EE->functions->fetch_action_id($module, $action);
	}

	/**
	 * Generate a new XID
	 * 
	 * @access public
	 * @return string
	 */
	public function xid()
	{
		$hash = NULL;

		// If secure forms are enabled
		if ($this->EE->config->item('secure_forms') == 'y')
		{
			$hash = $this->EE->functions->random('encrypt');

			$data = array(
				'date' => time(),
				'ip_address' => $this->EE->input->ip_address(),
				'hash' => $hash
			);

			$this->EE->db->insert('security_hashes', $data);
		}

		return $hash;
	}
}

// EOF