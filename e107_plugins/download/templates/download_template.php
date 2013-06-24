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
 * $Source: /cvs_backup/e107_0.8/e107_plugins/download/templates/download_template.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

if (!defined('e107_INIT')) { exit; }
if (!defined("USER_WIDTH")){ define("USER_WIDTH","width:95%"); }

/* set style of download image and thumbnail */
define("DL_IMAGESTYLE","border:0px");

// ##### CAT TABLE --------------------------------------------------------------------------------
if(!isset($DOWNLOAD_CAT_TABLE_PRE))
{
   $DOWNLOAD_CAT_TABLE_PRE = "
      <div>{DOWNLOAD_CAT_MAIN_DESCRIPTION}</div>";
}
if(!isset($DOWNLOAD_CAT_TABLE_START))
{
   $DOWNLOAD_CAT_TABLE_START = "
      <div style='text-align:center'>
         <table class='table table-striped fborder' style='".USER_WIDTH."'>\n
		      <colgroup>
		         <col style='width:3%'/>
		         <col style='width:60%'/>
		         <col style='width:10%'/>
		         <col style='width:17%'/>
		         <col style='width:10%'/>
		      </colgroup>
		      <thead>
               <tr>
                  <th class='fcaption' colspan='2'>".LAN_dl_19."</th>
                  <th class='fcaption'>".LAN_dl_20."</th>
                  <th class='fcaption'>".LAN_dl_21."</th>
                  <th class='fcaption'>".LAN_dl_77."</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <td class='forumheader3' colspan='5'>{DOWNLOAD_CAT_NEWDOWNLOAD_TEXT}</td>
               </tr>
               <tr>
                  <td class='forumheader3' colspan='5'>{DOWNLOAD_CAT_SEARCH}</td>
               </tr>
            </tfoot>
            <tbody>";
}
if(!isset($DOWNLOAD_CAT_PARENT_TABLE))
{
   $DOWNLOAD_CAT_PARENT_TABLE = "
               <tr>
                  <td class='forumheader'>
                     {DOWNLOAD_CAT_MAIN_ICON}
                  </td>
                  <td colspan='4' class='forumheader'>
                     {DOWNLOAD_CAT_MAIN_NAME}<br/>
                     <span class='smalltext'>{DOWNLOAD_CAT_MAIN_DESCRIPTION}</span>
                  </td>
               </tr>";
}

if(!isset($DOWNLOAD_CAT_CHILD_TABLE))
{
   $DOWNLOAD_CAT_CHILD_TABLE = "
               <tr>
                  <td class='forumheader3'>
                     {DOWNLOAD_CAT_SUB_ICON}
                  </td>
                  <td class='forumheader3'>
                     {DOWNLOAD_CAT_SUB_NEW_ICON} {DOWNLOAD_CAT_SUB_NAME}<br/>
                     <span class='smalltext'>{DOWNLOAD_CAT_SUB_DESCRIPTION}</span>
                  </td>
                  <td class='forumheader3' style='text-align:center;'>
                     {DOWNLOAD_CAT_SUB_COUNT}
                  </td>
                  <td class='forumheader3' style='text-align:center;'>
                     {DOWNLOAD_CAT_SUB_SIZE}
                  </td>
                  <td class='forumheader3' style='text-align:center;'>
                     {DOWNLOAD_CAT_SUB_DOWNLOADED}
                  </td>
               </tr>
               {DOWNLOAD_CAT_SUBSUB}";
}
if(!isset($DOWNLOAD_CAT_SUBSUB_TABLE))
{
	$DOWNLOAD_CAT_SUBSUB_TABLE = "
	            <tr>
	               <td class='forumheader3'>
	            	   &nbsp;
	            	</td>
	            	<td class='forumheader3' style='width:100%'>
	            		<table>
	            		   <tr>
	            		   	<td class='forumheader3' style='border:0'>
	            		   	   {DOWNLOAD_CAT_SUBSUB_ICON}
	            		   	</td>
	            		   	<td class='forumheader3' style='border:0; width: 100%'>
	            		   		{DOWNLOAD_CAT_SUBSUB_NEW_ICON} {DOWNLOAD_CAT_SUBSUB_NAME}<br/>
	            		   		<span class='smalltext'>
	            		   		{DOWNLOAD_CAT_SUBSUB_DESCRIPTION}
	            		   		</span>
	            		   	</td>
	            		   </tr>
	            		</table>
	            	</td>
	               <td class='forumheader3' style='text-align:center;'>
	               	{DOWNLOAD_CAT_SUBSUB_COUNT}
	               </td>
	               <td class='forumheader3' style='text-align:center;'>
	               	{DOWNLOAD_CAT_SUBSUB_SIZE}
	               </td>
	               <td class='forumheader3' style='text-align:center;'>
	               	{DOWNLOAD_CAT_SUBSUB_DOWNLOADED}
	               </td>
	            </tr>";
}
if(!isset($DOWNLOAD_CAT_TABLE_END))
{
   $DOWNLOAD_CAT_TABLE_END = "
            </tbody>
         </table>
      </div>\n";
}
// ##### LIST TABLE -------------------------------------------------------------------------------
if(!isset($DOWNLOAD_LIST_TABLE_START))
{
   $DOWNLOAD_LIST_TABLE_START = "
      <div style='text-align:center'>
         <form method='post' action='".e_SELF."?".e_QUERY."'>
            <table class='table table-striped fborder' style='".USER_WIDTH."'>\n
               <colgroup>
                  <col style='width:35%;'/>
                  <col style='width:15%;'/>
                  <col style='width:20%;'/>
                  <col style='width:10%;'/>
                  <col style='width:5%;'/>
                  <col style='width:10%;'/>
                  <col style='width:5%;'/>
               </colgroup>
               <tr>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=name}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=date}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=author}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=size}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=downloads}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=rating}</th>
                  <th class='fcaption'>{DOWNLOAD_LIST_CAPTION=get}</th>
               </tr>";
}
if(!isset($DOWNLOAD_LIST_TABLE))
{
   $DOWNLOAD_LIST_TABLE = "
		         <tr>
		            <td class='forumheader3' style='text-align:left;'>
		               {DOWNLOAD_LIST_NEWICON} {DOWNLOAD_LIST_NAME}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_DATESTAMP}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_AUTHOR}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_FILESIZE}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_REQUESTED}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_RATING}
		            </td>
		            <td class='forumheader3' style='text-align:center;'>
		               {DOWNLOAD_LIST_LINK}
		            </td>
		         </tr>";
}

if(!isset($DOWNLOAD_LIST_TABLE_END))
{
	$DOWNLOAD_LIST_TABLE_END = "
		         <tr>
		            <td class='forumheader3' colspan='7' style='text-align:right;'>{DOWNLOAD_LIST_TOTAL_AMOUNT} {DOWNLOAD_LIST_TOTAL_FILES}</td>
		         </tr>
		      </table>
		   </form>
		</div>\n";
}
// ##### VIEW TABLE -------------------------------------------------------------------------------
$DL_VIEW_PAGETITLE = PAGE_NAME." / {DOWNLOAD_CATEGORY} / {DOWNLOAD_VIEW_NAME}";

$DL_VIEW_NEXTPREV = "
<div style='text-align:center'>
	<table style='".USER_WIDTH."'>
	<tr>
	<td style='width:40%;'>{DOWNLOAD_VIEW_PREV}</td>
	<td style='width:20%; text-align: center;'>{DOWNLOAD_BACK_TO_LIST}</td>
	<td style='width:40%; text-align: right;'>{DOWNLOAD_VIEW_NEXT}</td>
	</tr>
	</table>
</div>\n";

// Only renders the following rows when data is present.
$sc_style['DOWNLOAD_VIEW_AUTHOR_LAN']['pre'] = "<tr><td style='width:20%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHOR_LAN']['post'] = "</td>";

$sc_style['DOWNLOAD_VIEW_AUTHOR']['pre'] = "<td style='width:80%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHOR']['post'] = "</td></tr>";

$sc_style['DOWNLOAD_VIEW_AUTHOREMAIL_LAN']['pre'] = "<tr><td style='width:20%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHOREMAIL_LAN']['post'] = "</td>";

$sc_style['DOWNLOAD_VIEW_AUTHOREMAIL']['pre'] = "<td style='width:80%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHOREMAIL']['post'] = "</td></tr>";

$sc_style['DOWNLOAD_VIEW_AUTHORWEBSITE_LAN']['pre'] = "<tr><td style='width:20%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHORWEBSITE_LAN']['post'] = "</td>";

$sc_style['DOWNLOAD_VIEW_AUTHORWEBSITE']['pre'] = "<td style='width:80%' class='forumheader3'>";
$sc_style['DOWNLOAD_VIEW_AUTHORWEBSITE']['post'] = "</td></tr>";

$sc_style['DOWNLOAD_REPORT_LINK']['pre'] = "<tr><td style='width:20%' class='forumheader3' colspan='2'>";
$sc_style['DOWNLOAD_REPORT_LINK']['post'] = "</td></tr>";




if(!isset($DOWNLOAD_VIEW_TABLE))
{
	$DOWNLOAD_VIEW_TABLE = "
      <div style='text-align:center'>
		   <table class='table table-striped fborder' style='".USER_WIDTH."'>
		      <colgroup>
		         <col style='width:30%;'>
		         <col style='width:70%;'>
		      </colgroup>
		      <tr>
		         <td colspan='2' class='fcaption' style='text-align:left;'>
		            {DOWNLOAD_VIEW_NAME}
		         </td>
		      </tr>
		      {DOWNLOAD_VIEW_AUTHOR_LAN}
		      {DOWNLOAD_VIEW_AUTHOR}
		      {DOWNLOAD_VIEW_AUTHOREMAIL_LAN}
		      {DOWNLOAD_VIEW_AUTHOREMAIL}
		      {DOWNLOAD_VIEW_AUTHORWEBSITE_LAN}
		      {DOWNLOAD_VIEW_AUTHORWEBSITE}
		      <tr>
   		      <td class='forumheader3'>{DOWNLOAD_VIEW_DESCRIPTION_LAN}</td>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_DESCRIPTION}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_IMAGE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_IMAGE}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_FILESIZE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_FILESIZE}</td>
		      </tr>
		      <tr>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_DATE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_DATE=long}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_REQUESTED_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_REQUESTED}</td>
		      </tr>
		      <tr>
   		      <td class='forumheader3'>{DOWNLOAD_VIEW_LINK_LAN}</td>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_LINK}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_RATING_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_RATING}</td>
		      </tr>
			{DOWNLOAD_REPORT_LINK}
		   </table>
		   <div style='text-align:right; ".USER_WIDTH."; margin-left: auto; margin-right: auto'>{DOWNLOAD_ADMIN_EDIT}</div>
		</div>\n";
}

// ##### MIRROR LIST -------------------------------------------------------------------------------
if(!isset($DOWNLOAD_MIRROR_START))
{
	$DOWNLOAD_MIRROR_START = "
	<div style='text-align:center'>
	   <table class='table fborder' style='".USER_WIDTH."'>
	      <colgroup>
	         <col style='width:1%'/>
	         <col style='width:29%'/>
	         <col style='width:40%'/>
	         <col style='width:20%'/>
	         <col style='width:10%'/>
	      </colgroup>
	      <tr>
	         <th class='fcaption'>{DOWNLOAD_MIRROR_REQUEST_ICON}</th>
	         <th class='fcaption' colspan='5'>".LAN_dl_72."{DOWNLOAD_MIRROR_REQUEST}</th>
	      </tr>
	      <tr>
	         <th class='forumheader' colspan='2'>".LAN_dl_68."</th>
	         <th class='forumheader'>".LAN_dl_71."</th>
	         <th class='forumheader'>".LAN_dl_70."</th>
	         <th class='forumheader'>".LAN_dl_21."</th>
	         <th class='forumheader'>".LAN_dl_32."</th>
	      </tr>
	";
}

if(!isset($DOWNLOAD_MIRROR))
{
	$DOWNLOAD_MIRROR = "
	      <tr>
	         <td class='forumheader3'>{DOWNLOAD_MIRROR_IMAGE}</td>
	         <td class='forumheader3'>
	            {DOWNLOAD_MIRROR_NAME}
	            <div class='smalltext'>
                  {DOWNLOAD_MIRROR_REQUESTS}
                  <br/>{DOWNLOAD_TOTAL_MIRROR_REQUESTS}
               </div>
	         </td>
	         <td class='forumheader3'>{DOWNLOAD_MIRROR_DESCRIPTION}</td>
	         <td class='forumheader3'>{DOWNLOAD_MIRROR_LOCATION}</td>
	         <td class='forumheader3'>{DOWNLOAD_MIRROR_FILESIZE}</td>
	         <td class='forumheader3'>{DOWNLOAD_MIRROR_LINK}</div></td>
	      </tr>
	";
}

if(!isset($DOWNLOAD_MIRROR_END))
{
	$DOWNLOAD_MIRROR_END = "
	   </table>
	</div>
	";
}

// ##### ------------------------------------------------------------------------------------------


// v2.x Bootstrap Template.  - Overrides the above templates. 


$DOWNLOAD_TEMPLATE['categories']['start'] = "{DOWNLOAD_BREADCRUMB}
         <table class='table table-striped fborder'>
		      <colgroup>
		         <col style='width:3%'/>
		         <col style='width:60%'/>
		         <col style='width:10%'/>
		         <col style='width:17%'/>
		         <col style='width:10%'/>
		      </colgroup>
		      <thead>
               <tr>
                  <th colspan='2'>".LAN_dl_19."</th>
                  <th>".LAN_dl_20."</th>
                  <th>".LAN_dl_21."</th>
                  <th>".LAN_dl_77."</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <td colspan='5'>{DOWNLOAD_CAT_NEWDOWNLOAD_TEXT}</td>
               </tr>
               <tr>
                  <td colspan='5'>{DOWNLOAD_CAT_SEARCH}</td>
               </tr>
            </tfoot>
            <tbody>";


$DOWNLOAD_TEMPLATE['categories']['parent'] = "
               <tr>
                  <td class='forumheader'>
                     {DOWNLOAD_CAT_MAIN_ICON}
                  </td>
                  <td colspan='4' class='forumheader'>
                     {DOWNLOAD_CAT_MAIN_NAME}<br/>
                     <span class='smalltext'>{DOWNLOAD_CAT_MAIN_DESCRIPTION}</span>
                  </td>
               </tr>";

$DOWNLOAD_TEMPLATE['categories']['child'] = "
               <tr>
                  <td>{DOWNLOAD_CAT_SUB_ICON} </td>
                  <td>
                     {DOWNLOAD_CAT_SUB_NEW_ICON} {DOWNLOAD_CAT_SUB_NAME}<br/>
                     <small>{DOWNLOAD_CAT_SUB_DESCRIPTION}</small>
                  </td>
                  <td>{DOWNLOAD_CAT_SUB_COUNT} </td>
                  <td>{DOWNLOAD_CAT_SUB_SIZE} </td>
                  <td>{DOWNLOAD_CAT_SUB_DOWNLOADED} </td>
               </tr>
               {DOWNLOAD_CAT_SUBSUB}";


$DOWNLOAD_TEMPLATE['categories']['subchild'] = "
	            <tr>
	               <td>
	            	   &nbsp;
	            	</td>
	            	<td>
	            		<table class='table'>
	            		   <tr>
	            		   	<td>
	            		   	   {DOWNLOAD_CAT_SUBSUB_ICON}
	            		   	</td>
	            		   	<td>
	            		   		{DOWNLOAD_CAT_SUBSUB_NEW_ICON} {DOWNLOAD_CAT_SUBSUB_NAME}<br/>
	            		   		<small>
	            		   		{DOWNLOAD_CAT_SUBSUB_DESCRIPTION}
	            		   		</small>
	            		   	</td>
	            		   </tr>
	            		</table>
	            	</td>
	               <td>{DOWNLOAD_CAT_SUBSUB_COUNT} </td>
	               <td>{DOWNLOAD_CAT_SUBSUB_SIZE} </td>
	               <td>{DOWNLOAD_CAT_SUBSUB_DOWNLOADED} </td>
	            </tr>";


$DOWNLOAD_TEMPLATE['categories']['end'] = "
            </tbody>
         </table>\n";

// ##### ------------------------------------------------------------------------------------------


//FIXME - not being utilized at the moment. 

$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHOR_LAN'] 			= "<tr><td style='width:20%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHOR'] 				= "<td style='width:80%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHOREMAIL_LAN'] 		= "<tr><td style='width:20%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHOREMAIL'] 			= "<td style='width:80%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHORWEBSITE_LAN'] 	= "<tr><td style='width:20%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_VIEW_AUTHORWEBSITE'] 		= "<td style='width:80%' class='forumheader3'>{---}</td>";
$DOWNLOAD_WRAPPER['view']['DOWNLOAD_REPORT_LINK'] 				= "<tr><td style='width:20%' class='forumheader3' colspan='2'>{---}</td></tr>";


$DOWNLOAD_TEMPLATE['view']['caption'] = LAN_dl_18;
$DOWNLOAD_TEMPLATE['view']['start'] = "{DOWNLOAD_BREADCRUMB} ";

$DOWNLOAD_TEMPLATE['view']['item'] = "
      <div style='text-align:center'>
		   <table class='table table-striped fborder' style='".USER_WIDTH."'>
		      <colgroup>
		         <col style='width:30%;'>
		         <col style='width:70%;'>
		      </colgroup>
		      <tr>
		         <td colspan='2' class='fcaption' style='text-align:left;'>
		            <h4>{DOWNLOAD_VIEW_NAME} {DOWNLOAD_ADMIN_EDIT}</h4>
		         </td>
		      </tr>
		      {DOWNLOAD_VIEW_AUTHOR_LAN}
		      {DOWNLOAD_VIEW_AUTHOR}
		      {DOWNLOAD_VIEW_AUTHOREMAIL_LAN}
		      {DOWNLOAD_VIEW_AUTHOREMAIL}
		      {DOWNLOAD_VIEW_AUTHORWEBSITE_LAN}
		      {DOWNLOAD_VIEW_AUTHORWEBSITE}
		      <tr>
   		      <td class='forumheader3'>{DOWNLOAD_VIEW_DESCRIPTION_LAN}</td>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_DESCRIPTION}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_IMAGE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_IMAGE}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_FILESIZE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_FILESIZE}</td>
		      </tr>
		      <tr>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_DATE_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_DATE=long}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_REQUESTED_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_REQUESTED}</td>
		      </tr>
		      <tr>
   		      <td class='forumheader3'>{DOWNLOAD_VIEW_LINK_LAN}</td>
	   	      <td class='forumheader3'>{DOWNLOAD_VIEW_LINK}</td>
		      </tr>
		      <tr>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_RATING_LAN}</td>
		         <td class='forumheader3'>{DOWNLOAD_VIEW_RATING}</td>
		      </tr>
			{DOWNLOAD_REPORT_LINK}
		   </table>
		   
		</div>\n";

$DOWNLOAD_TEMPLATE['view']['end'] = "";


$DOWNLOAD_TEMPLATE['view']['nextprev'] = "
<div style='text-align:center'>
	<table style='".USER_WIDTH."'>
	<tr>
	<td style='width:40%;'>{DOWNLOAD_VIEW_PREV}</td>
	<td style='width:20%; text-align: center;'>{DOWNLOAD_BACK_TO_LIST}</td>
	<td style='width:40%; text-align: right;'>{DOWNLOAD_VIEW_NEXT}</td>
	</tr>
	</table>
</div>\n";

$DOWNLOAD_TEMPLATE['view']['nextprev'] = '
    <ul class="pager">
    <li class="previous">
    {DOWNLOAD_VIEW_PREV}
    </li>
    <li class="next">
    {DOWNLOAD_VIEW_NEXT}
    </li>
    </ul>
    <div class="text-center">{DOWNLOAD_BACK_TO_LIST}</div>
';

// ##### ------------------------------------------------------------------------------------------

$DOWNLOAD_TEMPLATE['list']['start'] = "{DOWNLOAD_BREADCRUMB}
      <div style='text-align:center'>
         <form method='post' action='".e_SELF."?".e_QUERY."'>
            <table class='table table-striped fborder' style='".USER_WIDTH."'>\n
               <colgroup>
                  <col style='width:35%;'/>
                  <col style='width:15%;'/>
                  <col style='width:20%;'/>
                  <col style='width:10%;'/>
                  <col style='width:5%;'/>
                  <col style='width:10%;'/>
                  <col style='width:5%;'/>
               </colgroup>
               <tr>
                  <th>{DOWNLOAD_LIST_CAPTION=name}</th>
                  <th>{DOWNLOAD_LIST_CAPTION=datestamp}</th>
                  <th>{DOWNLOAD_LIST_CAPTION=author}</th>
                  <th>{DOWNLOAD_LIST_CAPTION=filesize}</th>
                  <th>{DOWNLOAD_LIST_CAPTION=requested}</th>
                  <th>{DOWNLOAD_LIST_CAPTION=rating}</th>
                  <th class='text-center'>{DOWNLOAD_LIST_CAPTION=link}</th>
               </tr>";

               
               
$DOWNLOAD_TEMPLATE['list']['item'] = "
		         <tr>
		            <td>
		               {DOWNLOAD_LIST_NEWICON} {DOWNLOAD_LIST_NAME}
		            </td>
		            <td>
		               {DOWNLOAD_LIST_DATESTAMP}
		            </td>
		            <td>
		               {DOWNLOAD_LIST_AUTHOR}
		            </td>
		            <td>
		               {DOWNLOAD_LIST_FILESIZE}
		            </td>
		            <td>
		               {DOWNLOAD_LIST_REQUESTED}
		            </td>
		            <td>
		               {DOWNLOAD_LIST_RATING}
		            </td>
		            <td class='text-center'>
		               {DOWNLOAD_LIST_LINK}
		            </td>
		         </tr>";

		         
		         
$DOWNLOAD_TEMPLATE['list']['end'] = "
		         <tr>
		            <td class='forumheader3' colspan='7' style='text-align:right;'><small class='muted text-muted'>{DOWNLOAD_LIST_TOTAL_AMOUNT} {DOWNLOAD_LIST_TOTAL_FILES}</small></td>
		         </tr>
		      </table>
		   </form>
		</div>\n";



$DOWNLOAD_TEMPLATE['list']['nextprev'] = "		
			<div class='text-center'>
				{DOWNLOAD_BACK_TO_CATEGORY_LIST}
				<br />
				<br />
				{DOWNLOAD_LIST_NEXTPREV}
			</div>";

/*	
$sc_style['DOWNLOAD_LIST_NEXTPREV']['pre'] = "<div class='nextprev'>";
$sc_style['DOWNLOAD_LIST_NEXTPREV']['post'] = "	</div>";
*/		
			
// ##### ------------------------------------------------------------------------------------------			
			
			
$DOWNLOAD_TEMPLATE['mirror']['start'] = "{DOWNLOAD_BREADCRUMB}
	   <table class='table table-striped'>
	      <colgroup>
	         <col style='width:1%'/>
	         <col style='width:29%'/>
	         <col style='width:40%'/>
	         <col style='width:20%'/>
	         <col style='width:10%'/>
	      </colgroup>
	      <tr>
	         <th class='fcaption'>{DOWNLOAD_MIRROR_REQUEST_ICON}</th>
	         <th class='fcaption' colspan='5'><h4>{DOWNLOAD_MIRROR_REQUEST}</h4></th>
	      </tr>
	      <tr>
	         <th class='forumheader' colspan='2'>".LAN_dl_68."</th>
	         <th class='forumheader'>".LAN_dl_71."</th>
	         <th class='forumheader'>".LAN_dl_70."</th>
	         <th class='forumheader'>".LAN_dl_21."</th>
	         <th class='forumheader'>".LAN_dl_32."</th>
	      </tr>
	";			
			
			
$DOWNLOAD_TEMPLATE['mirror']['item']  = "
	      <tr>
	         <td>{DOWNLOAD_MIRROR_IMAGE}</td>
	         <td>
	            {DOWNLOAD_MIRROR_NAME}<br />
	            <small>
                  {DOWNLOAD_MIRROR_REQUESTS}
                  <br/>{DOWNLOAD_TOTAL_MIRROR_REQUESTS}
               </small>
	         </td>
	         <td>{DOWNLOAD_MIRROR_DESCRIPTION}</td>
	         <td>{DOWNLOAD_MIRROR_LOCATION}</td>
	         <td>{DOWNLOAD_MIRROR_FILESIZE}</td>
	         <td class='center text-center'>{DOWNLOAD_MIRROR_LINK}</td>
	      </tr>
	";

$DOWNLOAD_TEMPLATE['mirror']['end'] = "
	   </table>
	";			


?>