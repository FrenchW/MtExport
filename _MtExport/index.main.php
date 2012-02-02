<?php

$MaxItems = 500;
$MaxComments = 500;

if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

init_MainList( $MaxItems );

while( $Item = & mainlist_get_item() )
	{
		locale_temp_switch( $Item->locale );
		echo 'AUTHOR: '; $Item->get_creator_User()->nick_name(); echo "\n"; 
		echo 'TITLE: '; $Item->title(array('link_type'=> 'none')); echo "\n"; 
		echo 'BASENAME: '; echo $Item->urltitle; echo "\n"; 
		echo 'DATE: '; $Item->issue_date( array(
						'before'      => '',
						'after'       => '',
						'date_format' => 'r',
   						'use_GMT'     => true,
					) ); echo "\n"; 
		echo "STATUS: publish\n";
		echo 'PRIMARY CATEGORY: '; $Item->main_category(); echo "\n"; 
		$Item->categories( array(
					'before'          => 'CATEGORY: ',
					'after'           => '',
					'include_main'    => false,
					'include_other'   => true,
					'include_external'=> true,
					'before_main'     => '',
					'after_main'      => '',
					'before_other'    => '',
					'after_other'     => '',
					'before_external' => '',
					'after_external'  => '',
					'link_categories' => false,
					'separator'       => "\nCATEGORY: ",
					'format'          => 'htmlbody', // TODO: "xml" eats away the tags!!
				) ); echo "\n"; 
		$i = 0;
		echo 'TAGS: ';
		foreach( $Item->get_tags() as $tag )
			{
				if( $i++ > 0 )
				{
					echo ', ';
				}
				echo htmlspecialchars($tag);
			}; echo "\n";
		echo "-----\n";
		echo "BODY: \n";
		echo $Item->get_prerendered_content('htmlbody' ); echo "\n";
		$disp_comments = 1;     
		$disp_comment_form = 0; 
		$disp_trackbacks = 0;  
		$disp_trackback_url = 0;
		$disp_pingbacks = 0;
		echo "\n-----\n";
		require( dirname(__FILE__).'/comments.main.php' );
		locale_restore_previous();
		echo "--------\n";
	}	
?>
