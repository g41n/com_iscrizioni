<?php
/**
 * @version     1.0.0
 * @package     com_iscrizioni
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gianni <gianni@yetopen.it> - http://yetopen.it
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Iscrizioni helper.
 */
class IscrizioniHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_ISCRIZIONI_TITLE_ISCRIZIONI'),
			'index.php?option=com_iscrizioni&view=iscrizioni',
			$vName == 'iscrizioni'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_iscrizioni';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
