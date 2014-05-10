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

jimport('joomla.application.component.controllerform');

/**
 * Iscrizione controller class.
 */
class IscrizioniControllerIscrizione extends JControllerForm
{

    function __construct() {
        $this->view_list = 'iscrizioni';
        parent::__construct();
    }

}