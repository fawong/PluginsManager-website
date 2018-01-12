<?php
$extra_headers = '<meta name="keywords" content="Minecraft, mc, MC, MineCraft, minecraft, bukkit, Bukkit, BUKKIT, server, Server, mc server, MC Server, Minecraft Server, Beta Server, beta server,MineCraft Server, fawong, fawong.com" />';

$favicon = '<link rel="icon" type="image/ico" href="favicon.ico" />' . "\n";
$favicon .= '<link rel="shortcut icon" href="favicon.ico" type="image/x-ico" />';

$title = 'FAWONG Minecraft';

include_once("../header.php");
?>

<!-- Begin page content -->
<div class="container">

<div class="page-header">
<h1>Bukkit Plugin Development</h1>
</div>

<!--<p>Please visit <a href="http://minecraft.bytescape.com/" target="_blank">ByteScape</a> for an awesome Survival Multi-Player (SMP) experience.</p>-->
<p>This project will probably be in hibernation for the forseeable future.</p>

<p><s>I am currently developing a plugin that does miscellaneous plugin related things for the <a href="http://bukkit.org" target="_blank">Bukkit</a> server.</s></p>

<h2>PluginsManager</h2>
<p>More information about PluginsManager is located at <a href="http://dev.bukkit.org/server-mods/pluginsmanager/" target="_blank">Bukkit Dev</a>.</p>
<!--<p>More information about PluginsManager is located at the <a href="http://forums.bukkit.org/threads/5826/" target="_blank">Bukkit Forums</a></p>.-->

<h3 id="files">Files</h3>
<h4>Forge Mod Loader</h4>
<p><a href="fml-bin.tar.gz">Archive File</a></p>
<p><a href="fml-minecraft.jar">Minecraft Jar</a></p>

<h4>Plugin Files</h4>
<p><a href="pluginscolumn.html">List plugins - Column Format</a></p>
<p><a href="pluginsfooterenabled.html">List plugins with Footer</a></p>
<p><a href="pluginslist.html">List plugins</a></p>
<p><a href="pluginsmanager.settings">Settings file</a></p>

<h3 id="changelog">ChangeLog</h3>
<h4>Version 13.08.03</h4>
<ul>
<li>Fixed exception handling code</li>
<li>Added LICENSE file</li>
</ul>
<a href="PluginsManager-13.08.03.jar">Download Link</a>
<h4>Version 13.04.12</h4>
<ul>
<li>Fixed pom.xml</li>
</ul>
<a href="PluginsManager-13.04.12.jar">Download Link</a>
<h4>Version 13.04.11</h4>
<ul>
<li>Added metrics</li>
<li>Fixed plugin aliases</li>
</ul>
<a href="PluginsManager-13.04.11.jar">Download Link</a>
<h4>Version 11.09.20</h4>
<ul>
<li>Added background image support</li>
</ul>
<a href="PluginsManager-11.09.20.jar">Download Link</a>
<h4>Version 11.07.26</h4>
<ul>
<li>Removed extraneous debbugging statements</li>
</ul>
<a href="PluginsManager-11.07.26.jar">Download Link</a>
<h4>Version 11.07.08</h4>
<ul>
<li>Fixed code that broke after the clean up</li>
<li>Added alphabetizing output of plugin names</li>
</ul>
<a href="PluginsManager-11.07.08.jar">Download Link</a>
<h4>Version 11.07.02</h4>
<ul>
<li>Cleaned up a lot of code</li>
</ul>
<a href="PluginsManager-11.07.02.jar">Download Link</a>
<h4>Version 11.04.04</h4>
<ul>
<li>Hacky way to fix config.yml</li>
</ul>
<a href="PluginsManager-11.04.04.jar">Download Link</a>
<h4>Version 11.04.02</h4>
<ul>
<li>Added css support</li>
</ul>
<a href="PluginsManager-11.04.02.jar">Download Link</a>
<h4>Version 11.03.26</h4>
<ul>
<li>Added in-game commands back</li>
<li>Minor bug fixes</li>
</ul>
<a href="PluginsManager-11.03.26.jar">Download Link</a>
<h4>Version 11.03.23</h4>
<ul>
<li>Fixed column output in html file</li>
</ul>
<a href="PluginsManager-11.03.23.jar">Download Link</a>
<h4>Version 11.03.21</h4>
<ul>
<li>Added page last updated date/time</li>
<li>Added "using PluginsManager v11.xx.xx"</li>
<li>Added option to change pretext in html file</li>
</ul>
<a href="PluginsManager-11.03.21.jar">Download Link</a>
<h4>Version 11.03.20</h4>
<ul>
<li>Added column format for html file</li>
</ul>
<a href="PluginsManager-11.03.20.jar">Download Link</a>
<h4>Version 11.03.18</h4>
<ul>
<li>Added error output to help server admins debug problems</li>
</ul>
<a href="PluginsManager-11.03.18.jar">Download Link</a>
<h4>Version 11.03.14</h4>
<ul>
<li>Fixed settings file so it works</li>
</ul>
<a href="PluginsManager-11.03.14.jar">Download Link</a>
<h4>Version 11.03.06</h4>
<ul>
<li>Removed list plugins in-game for now</li>
<li>Prints list of plugins and server version into html file</li>
</ul>
<a href="PluginsManager-11.03.06.jar">Download Link</a>
<h4>Version 11.2.24 (First Release)</h4>
<ul>
<li>First release of very, very primitive plugin</li>
</ul>
<a href="ListPlugins-11.2.24.jar">Download Link</a>

<h3 id="todo">TODO</h3>
<ul>
<li>Clean up code</li>
<li>Permissions/GroupManager support</li>
<li>CraftIRC support</li>
<li>Multi-world support</li>
<li>More in-game commands to manage plugin</li>
<li>Support more stuff with html file</li>
<li>Support existing and separate html file</li>
<li>Support output of xml file</li>
<li>Support exporting plugin data into MySQL</li>
<li>Support auto update of plugin</li>
<li>Maybe put ChangeLog information for other plugins</li>
</ul>

</div>

</div><!--/.wrap -->

<?php include_once("../footer.php"); ?>
