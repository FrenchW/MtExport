<?php
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
$type_list = array();
$disp_title = array();
$type_list[] = "'comment'";
$disp_title[] = T_("Comments");

$post_ID = $Item->ID;
$CommentList = new CommentList2( $Blog );
// Filter list:
$CommentList->set_filters( array(
		'types' => array( 'comment' ),
		'statuses' => array ( 'published' ),
		'post_ID' => $post_ID,
		'order' => 'DESC',
		'comments' => $MaxComments,
	) );

// Get ready for display (runs the query):
$CommentList->display_init();

while( $Comment = & $CommentList->get_next() )
  {
			$Comment->get_Item();
    echo "COMMENT:\n";
    echo "AUTHOR: "; $Comment->author(); echo "\n";
    echo "DATE: "; $Comment->time( 'r', true ); echo "\n"; 
    echo "URL: "; $Comment->author_url('','','',$makelink=false); echo "\n";
    $Comment->content();
    echo "\n-----\n";
  }
?>
