<?php
/**
 * Login
 *
 * Copyright 2010 by Jason Coward <jason@modxcms.com> and Shaun McCormick
 * <shaun@modxcms.com>
 *
 * Login is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * Login is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Login; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package login
 */
/**
 * Add plugins to package
 *
 * @package login
 * @subpackage build
 */

$plugins = array();

// -------------- SHKPrice -----------------------
$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id',1);
$plugins[0]->set('name','UserActivate');
$plugins[0]->set('description','Sends user notification on user account activation');
$plugins[0]->set('plugincode', file_get_contents($sources['source_core'].'/elements/plugins/useractivate.plugin.php'));

return $plugins;