<?php
/**
 * @version     1.0.0
 * @package     com_iscrizioni
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gianni <gianni@yetopen.it> - http://yetopen.it
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_iscrizioni')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JController::getInstance('Iscrizioni');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
