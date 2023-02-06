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

if (!defined('DC_RC_PATH')) {
    return;
}
$this->registerModule(
    'Japonisant',
    'A zen theme',
    'la lene',
    '1.4',
    [
        'requires' => [['core', '2.24']],
        'type'     => 'theme',
        'tplset'   => 'mustek',
    ]
);
