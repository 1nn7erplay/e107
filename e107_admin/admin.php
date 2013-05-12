<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_admin/admin.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

require_once('../class2.php');
include_once(e107::coreTemplatePath('admin_icons')); // Needs to be loaded before infopanel AND in boot.php 



if(vartrue($_GET['iframe']) == 1)
{
	define('e_IFRAME', true);

}

$e_sub_cat = 'main';


if (varset($pref['adminstyle'])=='cascade' || varset($pref['adminstyle'])=='beginner') // Deprecated Admin-include. 
{
    $pref['adminstyle'] = 'infopanel'; 
}

if(strpos($pref['adminstyle'], 'infopanel') === 0)
{
	require_once(e_ADMIN.'includes/'.$pref['adminstyle'].'.php');
	$_class = 'adminstyle_'.$pref['adminstyle'];
	if(class_exists($_class, false))
	{
		$adp = new $_class;	
	}
	else $adp = new adminstyle_infopanel;	
}


require_once(e_ADMIN.'boot.php');
require_once(e_ADMIN.'auth.php');
require_once(e_HANDLER.'upload_handler.php');

$mes = e107::getMessage();

if (!isset($pref['adminstyle'])) $pref['adminstyle'] = 'infopanel';		// Shouldn't be needed - but just in case


// --- check for htmlarea.
if (is_dir(e_ADMIN.'htmlarea') || is_dir(e_HANDLER.'htmlarea'))
{
	/*$text = ADLAN_ERR_2."<br /><br />
	<div style='text-align:center'>".$HANDLERS_DIRECTORY."htmlarea/<br />".$ADMIN_DIRECTORY."htmlarea/</div>";
	$ns -> tablerender(ADLAN_ERR_1, $text);*/

	$mes->addWarning($HANDLERS_DIRECTORY."htmlarea/<br />".$ADMIN_DIRECTORY."htmlarea/");
}


// ------------- Compatibility Check -----------------------------

$installedPlugs = e107::getPref('plug_installed');

$incompat = array(
	'banhelper'		=> 1.7,
	'slir_admin'	=> 1.0
);


$inCompatText = "";
$incompatFolders = array_keys($incompat);

foreach($incompat as $folder => $version)
{
	if(vartrue($installedPlugs[$folder]) && $version == $installedPlugs[$folder])
	{
		$inCompatText .= "<li>".$folder." v".$installedPlugs[$folder]."</li>";				
	}	
}

if($inCompatText)
{
	$text = "<ul>".$inCompatText."</ul>";
	$mes->addWarning("The following plugins are not compatible with this version of e107 and should be <a href='".e_ADMIN."plugin.php'>uninstalled</a>: ".$text);	
}


/* Not used in 0.8
// check for old modules.
if(getperms('0') && isset($pref['modules']) && $pref['modules'] && $sql->db_Field("plugin",5) == "plugin_addons")
{
	$mods=explode(",", $pref['modules']);
	$thef = "e_module.php";
	foreach ($mods as $mod)
	{
		if (is_readable(e_PLUGIN."{$mod}/module.php"))
		{
			$mod_found[] = e_PLUGIN."{$mod}/module.php";
		}
	}

	if($mod_found)
	{
    	$text = ADLAN_ERR_5." <b>".$thef."</b>:<br /><br /><ul>";
		foreach($mod_found as $val){
			$text .= "<li>".str_replace("../","",$val)."</li>\n";
		}
		$text .="</ul><br />
		<form method='post' action='".e_ADMIN."db.php' id='upd'>
		<a href='#' onclick=\"document.getElementById('upd').submit()\">".ADLAN_ERR_6."</a>
		<input type='hidden' name='plugin_scan' value='1' />
		</form>";
		$ns -> tablerender(ADLAN_ERR_4,$text);
	}
}
*/

// check for file-types;
$allowed_types = get_filetypes();			// Get allowed types according to filetypes.xml or filetypes.php
if (count($allowed_types) == 0)
{
	$allowed_types = array('zip' => 1, 'gz' => 1, 'jpg' => 1, 'png' => 1, 'gif' => 1);
	$mes->addInfo("Setting default filetypes: ".implode(', ',array_keys($allowed_types)));

}

//echo "Allowed filetypes = ".implode(', ',array_keys($allowed_types)).'<br />';
// avatar check.
$public = array(e_UPLOAD, e_AVATAR_UPLOAD);
$exceptions = array(".","..","/","CVS","avatars","Thumbs.db",".ftpquota",".htaccess","php.ini",".cvsignore",'e107.htaccess');

//TODO use $file-class to grab list and perform this check. 
foreach ($public as $dir)
{
	if (is_dir($dir))
	{
		if ($dh = opendir($dir))
		{
			while (($file = readdir($dh)) !== false)
			{
				if (is_dir($dir."/".$file) == FALSE && !in_array($file,$exceptions))
				{
					$fext = substr(strrchr($file, "."), 1);
					if (!array_key_exists(strtolower($fext),$allowed_types) )
					{
						if ($file == 'index.html' || $file == "null.txt")
						{
							if (filesize($dir.'/'.$file))
							{
								$potential[] = str_replace('../', '', $dir).'/'.$file;
							}
						}
						else
						{
							$potential[] = str_replace('../', '', $dir).'/'.$file;
						}
					}
				}
			}
			closedir($dh);
		}
	}
}

if (isset($potential))
{
	//$text = ADLAN_ERR_3."<br /><br />";
	$mes->addWarning(ADLAN_ERR_3);
	$text = '<ul>';
	foreach ($potential as $p_file)
	{
		$text .= '<li>'.$p_file.'</li>';
	}
	$mes->addWarning($text);
	//$ns -> tablerender(ADLAN_ERR_1, $text);
}


// ---------------------------------------------------------
e107::getScBatch('admin');
echo $tp->parseTemplate('{ADMIN_COREUPDATE=alert}',true);

// auto db update
if ('0' == ADMINPERMS)
{
	require_once(e_ADMIN.'update_routines.php');
	update_check();
}



// end auto db update

/*
if (e_QUERY == 'purge' && getperms('0'))
{
	$admin_log->purge_log_events(false);
}
*/

$td = 1;


// DEPRECATED 
function render_links($link, $title, $description, $perms, $icon = FALSE, $mode = FALSE)
{
	return e107::getNav()->renderAdminButton($link, $title, $description, $perms, $icon, $mode);
}


function render_clean() // still used by classis, tabbed etc. 
{
	global $td;
	$text = "";
	while ($td <= ADLINK_COLS)
	{
		$text .= "<td class='td' style='width:20%;'></td>";
		$td++;
	}
	$text .= "</tr>";
	$td = 1;
	return $text;
}



if(is_object($adp))
{
	$adp->render();	
}
else
{
	require_once(e_ADMIN.'includes/'.$pref['adminstyle'].'.php');	
}



function admin_info()
{
	global $tp;

	$width = (getperms('0')) ? "33%" : "50%";

	$ADMIN_INFO_TEMPLATE = "
	<div style='text-align:center'>
		<table style='width: 100%; border-collapse:collapse; border-spacing:0px;'>
		<tr>
			<td style='width: ".$width."; vertical-align: top'>
			{ADMIN_STATUS}
			</td>
			<td style='width:".$width."; vertical-align: top'>
			{ADMIN_LATEST}
			</td>";

    	if(getperms('0'))
		{
			$ADMIN_INFO_TEMPLATE .= "
			<td style='width:".$width."; vertical-align: top'>{ADMIN_LOG}</td>";
    	}

   	$ADMIN_INFO_TEMPLATE .= "
		</tr></table></div>";

	return $tp->parseTemplate($ADMIN_INFO_TEMPLATE);
}

function status_request()
{
	global $pref;
	if ($pref['adminstyle'] == 'classis' || $pref['adminstyle'] == 'cascade' || $pref['adminstyle'] == 'beginner' || $pref['adminstyle'] == 'tabbed') {
		return TRUE;
	} else {
		return FALSE;
	}
}


function latest_request()
{
	global $pref;
	if ($pref['adminstyle'] == 'classis' || $pref['adminstyle'] == 'cascade' || $pref['adminstyle'] == 'beginner' || $pref['adminstyle'] == 'tabbed') {
		return TRUE;
	} else {
		return FALSE;
	}
}

function log_request()
{
	global $pref;
	if ($pref['adminstyle'] == 'classis' || $pref['adminstyle'] == 'cascade'|| $pref['adminstyle'] == 'beginner' || $pref['adminstyle'] == 'tabbed') {
		return TRUE;
	} else {
		return FALSE;
	}
}

// getPlugLinks() - moved to sitelinks_class.php : pluginLinks();



require_once("footer.php");

?>
