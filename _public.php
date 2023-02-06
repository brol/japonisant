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
if (!defined('DC_RC_PATH')) {return;}

dcCore::app()->addBehavior('publicHeadContent','japonisant_publicHeadContent');

function japonisant_publicHeadContent()
{
	$style = dcCore::app()->blog->settings->themes->japonisant_sidebar;
	if (!preg_match('/^left|right$/', (string) $style)) {
		$style = 'left';
	}

	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url.'/css/'.$style.".css\" />\n";
}