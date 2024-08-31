<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/
if (!isConnect('admin')) {
  throw new Exception('{{401 - Accès non autorisé}}');
}
$local_authentifications = explode(':', explode("\n", config::byKey('mqtt::password', __CLASS__))[0]);
$connection_info = array(
  'topic' => config::byKey('root_topic', 'mqtt2'),
  'id' => substr(jeedom::getHardwareKey(),0,10)
  'ip' => network::getNetworkAccess('inernal','ip');
  'port' => 1833,
  'username' => $local_authentifications[0],
  'password' => $local_authentifications[1]
);
?>
<pre><?php echo json_encode($connection_info); ?></pre>