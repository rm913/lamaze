<?php
/** List with all available otw sitebars
  *
  *
  */
global $_wp_column_headers;

$_wp_column_headers['toplevel_page_otw-sbm'] = array(
	'id' => __( 'Sidebar ID' ),
	'title' => __( 'Title' ),
	'description' => __( 'Description' )

);

$otw_sidebar_list = get_option( 'otw_sidebars' );

$message = '';
$massages = array();
$messages[1] = 'Sidebar saved.';
$messages[2] = 'Sidebar deleted.';
$messages[3] = 'Sidebar activated.';
$messages[4] = 'Sidebar deactivated.';

if( isset( $_GET['message'] ) && isset( $messages[ $_GET['message'] ] ) ){
	$message .= $messages[ $_GET['message'] ];
}

$filtered_otw_sidebar_list = array();

if( is_array( $otw_sidebar_list ) && count( $otw_sidebar_list ) ){
	foreach( $otw_sidebar_list as $sidebar_key => $sidebar_item ){
		if( $sidebar_item['replace'] == '' ){
			$filtered_otw_sidebar_list[ $sidebar_key ] = $sidebar_item;
		}
	}
}

?>
<div class="updated"><p>Check out the <a href="http://otwthemes.com/online-documentation-widgetize-pages-light/?utm_source=wp.org&utm_medium=admin&utm_content=docs&utm_campaign=wpl">Online documentation</a> for this plugin<br /><br /> Upgrade to the full version of <a href="http://codecanyon.net/item/sidebar-widget-manager-for-wordpress/2287447?ref=OTWthemes">Sidebar and Widget Manager</a> | <a href="http://otwthemes.com/demos/1ts/?item=Sidebar%20Widget%20Manager&utm_source=wp.org&utm_medium=admin&utm_content=upgrade&utm_campaign=wpl">Demo site</a><br /><br />
<a href="http://otwthemes.com/widgetizing-pages-in-wordpress-can-be-even-easier-and-faster?utm_source=wp.org&utm_medium=admin&utm_content=site&utm_campaign=wpl">Create responsive layouts in minutes, drag & drop interface, feature rich.</a></p></div>
<?php if ( $message ) : ?>
<div id="message" class="updated"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div class="wrap">
	<div id="icon-edit" class="icon32"><br/></div>
	<h2>
		<?php _e('Available Custom Sidebars') ?>
		<a class="button add-new-h2" href="<?php echo admin_url( 'admin.php?page=otw-wpl-add'); ?>">Add New</a>
	</h2>
	
	<form class="search-form" action="" method="get">
	</form>
	
	<br class="clear" />
	<?php if( is_array( $filtered_otw_sidebar_list ) && count( $filtered_otw_sidebar_list ) ){?>
	<table class="widefat fixed" cellspacing="0">
		<thead>
			<tr>
				<?php foreach( $_wp_column_headers['toplevel_page_otw-sbm'] as $key => $name ){?>
					<th><?php echo $name?></th>
				<?php }?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<?php foreach( $_wp_column_headers['toplevel_page_otw-sbm'] as $key => $name ){?>
					<th><?php echo $name?></th>
				<?php }?>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach( $filtered_otw_sidebar_list as $sidebar_item ){?>
				<tr>
					<?php foreach( $_wp_column_headers['toplevel_page_otw-sbm'] as $column_name => $column_title ){
						
						$edit_link = admin_url( 'admin.php?page=otw-wpl&amp;action=edit&amp;sidebar='.$sidebar_item['id'] );
						$delete_link = admin_url( 'admin.php?page=otw-wpl-action&amp;sidebar='.$sidebar_item['id'].'&amp;action=delete' );
						
						switch($column_name) {
							
							case 'cb':
									echo '<th scope="row" class="check-column"><input type="checkbox" name="itemcheck[]" value="'. esc_attr($sidebar_item['id']) .'" /></th>';
								break;
							case 'id':
									echo '<td><strong><a href="'.$edit_link.'" title="'.esc_attr(sprintf(__('Edit &#8220;%s&#8221;'), $sidebar_item['id'])).'">'.$sidebar_item['id'].'</a></strong><br />';
									
									echo '<div class="row-actions">';
									echo '<a href="'.$edit_link.'">' . __('Edit') . '</a>';
									echo ' | <a href="'.$delete_link.'">' . __('Delete'). '</a>';
									echo '</div>';
									
									echo '</td>';
								break;
							case 'title':
									echo '<td>'.$sidebar_item['title'].'</td>';
									
								break;
							case 'description':
									echo '<td>'.$sidebar_item['description'].'</td>';
								break;
							
						}
					}?>
				</tr>
			<?php }?>
		</tbody>
	</table>
	<div class="updated einfo"><p><?php _e( 'Create as many sidebars as you need. Then add them in your pages/posts/template files. Here is how you can add sidebars:<br /><br />&nbsp;- page/post bellow content using the Grid Manager metabox when you edit your page<br />&nbsp;- page/post content - select the sidebar you want to insert from the Insert Sidebar ShortCode button in your page/post editor.<br />&nbsp;- page/post content - copy the shortcode and paste it in the editor of a page/post.<br />&nbsp;- any page template using the do_shortcode WP function.<br /><br />Use the Sidebar ID to build your shortcodes.<br />Example: [otw_is sidebar=otw-sidebar-1] ' );?></p></div>
	<?php }else{ ?>
		<p><?php _e('No custom sidebars found.')?></p>
	<?php } ?>
</div>
