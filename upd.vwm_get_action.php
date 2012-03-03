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
 * Lets install, uninstall, or update this bad boy
 */
class Vwm_get_action_upd {

	private $EE;
	private $module_name;
	public $version = '0.1';

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
		
		// Get module name like a BOSS
		$this->module_name = str_replace('_upd', '', __CLASS__);
	}

	/**
	 * Module Installer
	 *
	 * @access public
	 * @return bool
	 */	
	public function install()
	{
		// VWM Get Action module information
		$data = array(
			'module_name' => $this->module_name,
			'module_version' => $this->version,
			'has_cp_backend' => 'n',
			'has_publish_fields' => 'n'
		);

		$this->EE->db->insert('modules', $data);

		// I know what you're saying, "Wow Victor, that *was* fast..."
		return TRUE;
	}

	/**
	 * Module uninstaller
	 *
	 * @access public
	 * @return bool
	 */	
	public function uninstall()
	{
		// Get database prefix
		$prefix = $this->EE->db->dbprefix;
		
		// Get module ID
		$module_id = $this->EE->db
			->select('module_id')
			->where('module_name', $this->module_name)
			->limit(1)
			->get('modules')
			->row('module_id');
		
		// Delete from modules
		$this->EE->db
			->where('module_id', $module_id)
			->delete('modules');

		// Delete from module_member_groups
		$this->EE->db
			->where('module_id', $module_id)
			->delete('module_member_groups');

		return TRUE;
	}

	/**
	 * Module Updater
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */	
	public function update($current = '')
	{
		return TRUE;
	}

}

// EOF