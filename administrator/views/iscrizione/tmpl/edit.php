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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_iscrizioni/assets/css/iscrizioni.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'iscrizione.cancel') {
                    Joomla.submitform(task, document.getElementById('iscrizione-form'));
                }
                else{
                    
                    if (task != 'iscrizione.cancel' && document.formvalidator.isValid(document.id('iscrizione-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('iscrizione-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_iscrizioni&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="iscrizione-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_ISCRIZIONI_LEGEND_ISCRIZIONE'); ?></legend>
            <ul class="adminformlist">

                				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('createdate'); ?>
				<?php echo $this->form->getInput('createdate'); ?></li>
				<li><?php echo $this->form->getLabel('nome'); ?>
				<?php echo $this->form->getInput('nome'); ?></li>
				<li><?php echo $this->form->getLabel('cognome'); ?>
				<?php echo $this->form->getInput('cognome'); ?></li>
				<li><?php echo $this->form->getLabel('nome_battaglia'); ?>
				<?php echo $this->form->getInput('nome_battaglia'); ?></li>
				<li><?php echo $this->form->getLabel('foto'); ?>
				<?php echo $this->form->getInput('foto'); ?></li>
				<li><?php echo $this->form->getLabel('data_nascita'); ?>
				<?php echo $this->form->getInput('data_nascita'); ?></li>
				<li><?php echo $this->form->getLabel('luogo_nascita'); ?>
				<?php echo $this->form->getInput('luogo_nascita'); ?></li>
				<li><?php echo $this->form->getLabel('via'); ?>
				<?php echo $this->form->getInput('via'); ?></li>
				<li><?php echo $this->form->getLabel('comune'); ?>
				<?php echo $this->form->getInput('comune'); ?></li>
				<li><?php echo $this->form->getLabel('provincia'); ?>
				<?php echo $this->form->getInput('provincia'); ?></li>
				<li><?php echo $this->form->getLabel('codice_fiscale'); ?>
				<?php echo $this->form->getInput('codice_fiscale'); ?></li>
				<li><?php echo $this->form->getLabel('recapito_telefonico'); ?>
				<?php echo $this->form->getInput('recapito_telefonico'); ?></li>
				<li><?php echo $this->form->getLabel('recapito_email'); ?>
				<?php echo $this->form->getInput('recapito_email'); ?></li>
				<li><?php echo $this->form->getLabel('percorso'); ?>
				<?php echo $this->form->getInput('percorso'); ?></li>
				<li><?php echo $this->form->getLabel('gruppo'); ?>
				<?php echo $this->form->getInput('gruppo'); ?></li>
				<li><?php echo $this->form->getLabel('pagato'); ?>
				<?php echo $this->form->getInput('pagato'); ?></li>
				<li><?php echo $this->form->getLabel('email_conferma'); ?>
				<?php echo $this->form->getInput('email_conferma'); ?></li>
				<li><?php echo $this->form->getLabel('canc'); ?>
				<?php echo $this->form->getInput('canc'); ?></li>
				<li><?php echo $this->form->getLabel('privacy'); ?>
				<?php echo $this->form->getInput('privacy'); ?></li>
				<li><?php echo $this->form->getLabel('pubblicita'); ?>
				<?php echo $this->form->getInput('pubblicita'); ?></li>


            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>