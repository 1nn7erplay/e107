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
 * $URL$
 * $Id$
 */

if (!defined('e107_INIT')) { exit; }

e107::css('inline','
	a.e-wysiwyg-toggle { margin-top:5px }
');

$pref = e107::getPref();

if((e_WYSIWYG && check_class($pref['post_html'])) || strpos(e_SELF,"tinymce4/admin_config.php") )
{
	if(e_PAGE != 'image.php')
	{
		//e107::js('tinymce','tiny_mce.js','jquery');
		//e107::js('tinymce','wysiwyg.php','jquery',5);
		
		e107::js('url', "//tinymce.cachefly.net/4.0/tinymce.min.js");
		e107::js('tinymce4','wysiwyg.php','jquery',5);
	//	e107::js('inline', "
   //   			 tinymce.init({selector:'.e-wysiwyg'});
   //     ");
				
		
	}
	else
	{
	//	e107::js('tinymce','tiny_mce_popup.js','jquery');
	}
	
	if(ADMIN)
	{
	    $insert = "$('#'+id).after('<div>";
	 //   $insert .= "<a href=\"#\" id=\"' + id + '\" class=\"e-wysiwyg-toggle btn btn-inverse btn-mini\">Switch to bbcode<\/a>";
        
	     if(e_PAGE == 'mailout.php')
        {
            $insert .= "&nbsp;&nbsp;<a href=\"#\" class=\"btn btn-mini tinyInsert\" data-value=\"|USERNAME|\" >".LAN_MAILOUT_16."<\/a>";
            $insert .= "<a href=\"#\" class=\"btn btn-mini tinyInsert\"     data-value=\"|DISPLAYNAME|\" >".LAN_MAILOUT_14."<\/a>";
            $insert .= "<a href=\"#\" class=\"btn btn-mini tinyInsert\"     data-value=\"|SIGNUP_LINK|\" >".LAN_MAILOUT_17."<\/a>";
            $insert .= "<a href=\"#\" class=\"btn btn-mini tinyInsert\"     data-value=\"|USERID|\" >".LAN_MAILOUT_18."<\/a>";           
        }
        
	    $insert .= "</div>');";
        
		define("SWITCH_TO_BB",$insert);	
	
    }
	else 
	{
		define("SWITCH_TO_BB","");
	}
    	
//	print_a($_POST);
	
	// <div><a href='#' class='e-wysiwyg-switch' onclick=\"tinyMCE.execCommand('mceToggleEditor',false,'".$tinyMceID."');expandit('".$toggleID."');\">Toggle WYSIWYG</a></div>
	
	
	e107::js('inline',"
	
	$(function() {
	                
	            

	    
		
			$('.e-wysiwyg').each(function() {
													
				var id = $(this).attr('id'); // 'e-wysiwyg';
				".SWITCH_TO_BB."
		    //	alert(id);
		     	$('#bbcode-panel-'+id+'--preview').hide();
		       			
			});
			
			$('.tinyInsert').click(function() {
                                            
                var val = $(this).attr('data-value'); 
                top.tinymce.activeEditor.execCommand('mceInsertContent',0,val);
                return false;       
            });
            
         /*
            $('img.tinyInsertEmote').live('click',function() {
                        
                         var src = $(this).attr('src');     
                           alert(src); 
                     //  var html = '<img src=\''+src +'\' alt=\'emote\' />';
                       tinyMCE.execCommand('mceInsertRawHTML',false, 'hi there');
                       ;
                       $('.mceContentBody', window.top.document).tinymce().execCommand('mceInsertContent',false,src);
         
                      //   tinyMCE.selectedInstance.execCommand('mceInsertContent',0,src);                
                                      
                         $('#uiModal').modal('hide');
                         return true;       
                     });*/
         
           
						
				
			// When new tab is added - convert textarea to TinyMce. 
			$('.e-tabs-add').on('click',function(){
				
				alert('New Page Added'); // added for delay - quick and dirty work-around. XXX fixme
				
				var idt = $(this).attr('data-target'); // eg. news-body	
				var ct = parseInt($('#e-tab-count').val());
				var id = idt + '-' + ct;
				$('#bbcode-panel-'+id+'--preview').hide();
				".SWITCH_TO_BB."
				top.tinymce.activeEditor.execCommand('mceAddControl', false, id);
			});
				
				
		 	$('a.e-wysiwyg-toggle').toggle(function(){
		 			var id = $(this).attr('id'); // eg. news-body	
		 			$('#bbcode-panel-'+id+'--preview').show();
		 			$(this).text('Switch to wysiwyg');
		           tinymce.activeEditor.execCommand('mceRemoveControl', false, id);
			}, function () {
					 var id = $(this).attr('id');
					 $('#bbcode-panel-'+id+'--preview').hide();
					 $(this).text('Switch to bbcode');
		            tinymce.activeEditor.execCommand('mceAddControl', false, id);
			});	
			
			$('.e-dialog-save').click(function(){
				
				var html = $('#html_holder').val();	
				
				if(html === undefined)
				{
					return;
				}
				
			//	tinyMCE.execCommand('mceInsertContent',false,html);
				top.tinymce.activeEditor.execCommand('mceInsertRawHTML',false,html);
				top.tinymce.activeEditor.windowManager.close();
	
			});
			
			$('.e-dialog-close').click(function(){
				
				top.tinymce.activeEditor.windowManager.close();
			});
			
			
							
					
				
			
	});
	
	
	
	
	","jquery");
	
	
}


?>