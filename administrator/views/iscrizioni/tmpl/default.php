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
JHTML::_('script', 'system/multiselect.js', false, true);
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_iscrizioni/assets/css/iscrizioni.css');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canOrder = $user->authorise('core.edit.state', 'com_iscrizioni');
$saveOrder = $listOrder == 'a.ordering';

?>

<form action="<?php echo JRoute::_('index.php?option=com_iscrizioni&view=iscrizioni'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
            <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
            <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
            <button type="button" onclick="document.id('filter_search').value = '';
                    this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
        </div>

        

    </fieldset>
    <div class="clr"> </div>

    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">
                    <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
                </th>
                
				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_CREATEDATE', 'a.createdate', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_NOME', 'a.nome', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_COGNOME', 'a.cognome', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_NOME_BATTAGLIA', 'a.nome_battaglia', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_FOTO', 'a.foto', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_DATA_NASCITA', 'a.data_nascita', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_LUOGO_NASCITA', 'a.luogo_nascita', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_VIA', 'a.via', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_COMUNE', 'a.comune', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_PROVINCIA', 'a.provincia', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_CODICE_FISCALE', 'a.codice_fiscale', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_RECAPITO_TELEFONICO', 'a.recapito_telefonico', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_RECAPITO_EMAIL', 'a.recapito_email', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_PERCORSO', 'a.percorso', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_GRUPPO', 'a.gruppo', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_PAGATO', 'a.pagato', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_EMAIL_CONFERMA', 'a.email_conferma', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_CANC', 'a.canc', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_PRIVACY', 'a.privacy', $listDirn, $listOrder); ?>
				</th>

				<th class="left">
					<?php echo JHtml::_('grid.sort',  'COM_ISCRIZIONI_ISCRIZIONI_PUBBLICITA', 'a.pubblicita', $listDirn, $listOrder); ?>
				</th>

                <?php if (isset($this->items[0]->state)) : ?>
                    <th width="5%">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
                    </th>
                <?php endif; ?>

                <?php if (isset($this->items[0]->ordering)) : ?>
                    <th width="10%">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
                        <?php if ($canOrder && $saveOrder) : ?>
                            <?php echo JHtml::_('grid.order', $this->items, 'filesave.png', 'iscrizioni.saveorder'); ?>
                        <?php endif; ?>
                    </th>
                <?php endif; ?>

                <?php if (isset($this->items[0]->id)) : ?>
                    <th width="1%" class="nowrap">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tfoot>
            <?php
            if (isset($this->items[0])) {
                $colspan = count(get_object_vars($this->items[0]));
            } else {
                $colspan = 10;
            }
            ?>
            <tr>
                <td colspan="<?php echo $colspan ?>">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            foreach ($this->items as $i => $item) :
                $ordering = ($listOrder == 'a.ordering');
                $canCreate = $user->authorise('core.create', 'com_iscrizioni');
                $canEdit = $user->authorise('core.edit', 'com_iscrizioni');
                $canCheckin = $user->authorise('core.manage', 'com_iscrizioni');
                $canChange = $user->authorise('core.edit.state', 'com_iscrizioni');
                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td class="center">
                        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                    </td>
                    
					<td>
						<?php echo $item->createdate; ?>
					</td>

					<td>
					<?php if (isset($item->checked_out) && $item->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'iscrizioni.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit): ?>
						<a href="<?php echo JRoute::_('index.php?option=com_iscrizioni&task=iscrizione.edit&id=' . (int) $item->id); ?>">

							<?php echo $this->escape($item->nome); ?>
						</a>
					<?php else: ?>
						<?php echo $this->escape($item->nome); ?>
					<?php endif; ?>
					</td>

					<td>
						<?php echo $item->cognome; ?>
					</td>

					<td>
						<?php echo $item->nome_battaglia; ?>
					</td>

					<td>
						<?php echo $item->foto; ?>
					</td>

					<td>
						<?php echo $item->data_nascita; ?>
					</td>

					<td>
						<?php echo $item->luogo_nascita; ?>
					</td>

					<td>
						<?php echo $item->via; ?>
					</td>

					<td>
						<?php echo $item->comune; ?>
					</td>

					<td>
						<?php echo $item->provincia; ?>
					</td>

					<td>
						<?php echo $item->codice_fiscale; ?>
					</td>

					<td>
						<?php echo $item->recapito_telefonico; ?>
					</td>

					<td>
						<?php echo $item->recapito_email; ?>
					</td>

					<td>
						<?php echo $item->percorso; ?>
					</td>

					<td>
						<?php echo $item->gruppo; ?>
					</td>

					<td>
						<?php echo $item->pagato; ?>
					</td>

					<td>
						<?php echo $item->email_conferma; ?>
					</td>

					<td>
						<?php echo $item->canc; ?>
					</td>

					<td>
						<?php echo $item->privacy; ?>
					</td>

					<td>
						<?php echo $item->pubblicita; ?>
					</td>

                    <?php if (isset($this->items[0]->state)) { ?>
                        <td class="center">
                            <?php echo JHtml::_('jgrid.published', $item->state, $i, 'iscrizioni.', $canChange, 'cb'); ?>
                        </td>
                    <?php } ?>

                    <?php if (isset($this->items[0]->ordering)) { ?>
                        <td class="order">
                            <?php if ($canChange) : ?>
                                <?php if ($saveOrder) : ?>
                                    <?php if ($listDirn == 'asc') : ?>
                                        <span><?php echo $this->pagination->orderUpIcon($i, true, 'iscrizioni.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                        <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'iscrizioni.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                                    <?php elseif ($listDirn == 'desc') : ?>
                                        <span><?php echo $this->pagination->orderUpIcon($i, true, 'iscrizioni.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                        <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'iscrizioni.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php $disabled = $saveOrder ? '' : 'disabled="disabled"'; ?>
                                <input type="text" name="order[]" size="5" value="<?php echo $item->ordering; ?>" <?php echo $disabled ?> class="text-area-order" />
                            <?php else : ?>
                                <?php echo $item->ordering; ?>
                            <?php endif; ?>
                        </td>
                    <?php } ?>

                    <?php if (isset($this->items[0]->id)) { ?>
                        <td class="center">
                            <?php echo (int) $item->id; ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>