<?php
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

class _MtExport_Skin extends Skin
{
	function get_default_name()
	{
		return 'Export Movable Type';
	}
	function get_default_type()
	{
		return 'feed';
	}
}
?>