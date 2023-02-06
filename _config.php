<?php
/**
 * @brief japonisant, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Theme
 *
 * @author la lene and contributors
 * @copyright http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
if (!defined('DC_CONTEXT_ADMIN')) { return; }

l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/main');

# Default values
$default_sidebar = 'left';

# Settings
$my_sidebar = dcCore::app()->blog->settings->themes->japonisant_sidebar;

# Color type
$japonisant_sidebar_combo = array(
	__('left') => 'left',
	__('right') => 'right',
);

// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		dcCore::app()->blog->settings->addNamespace('themes');

		# Color type
		if (!empty($_POST['japonisant_sidebar']) && in_array($_POST['japonisant_sidebar'],$japonisant_sidebar_combo))
		{
			$my_sidebar = $_POST['japonisant_sidebar'];

		} elseif (empty($_POST['japonisant_sidebar']))
		{
			$my_sidebar = $default_sidebar;

		}
		dcCore::app()->blog->settings->themes->put('japonisant_sidebar',$my_sidebar,'string','Color display',true);

		// Blog refresh
		dcCore::app()->blog->triggerBlog();

		// Template cache reset
		dcCore::app()->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'), true, true);
	}
	catch (Exception $e)
	{
		dcCore::app()->error->add($e->getMessage());
	}
}

// DISPLAY

# Color type
echo
'<div class="fieldset"><h4>'.__('Sidebar').'</h4>'.
'<p class="field"><label>'.__('Show:').'</label>'.
form::combo('japonisant_sidebar',$japonisant_sidebar_combo,$my_sidebar).
'</p>'.
'</div>';