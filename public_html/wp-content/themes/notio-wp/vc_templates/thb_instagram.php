<?php function thb_instagram( $atts, $content = null ) {
    extract(shortcode_atts(array(
	   	'username'			=> '',
	   	'number' 			=> '',
	   	'link' 				=> '',
		'columns' 			=> '6'
    ), $atts));
    
	switch($columns) {
		case 2:
			$col = 'medium-6';
			break;
		case 3:
			$col = 'medium-4';
			break;
		case 4:
			$col = 'medium-6 large-3';
			break;
		case 5:
			$col = 'thb-five';
			break;
		case 6:
			$col = 'medium-4 large-2';
			break;
	  }
 	$output = $out ='';
	$username = strtolower($username);

	//if (false === ($instagram = get_transient('instagram-media-'.sanitize_title_with_dashes($username)))) {

		$remote = wp_remote_get('http://instagram.com/'.trim($username));

		if (is_wp_error($remote))
			return new WP_Error('site_down', __('Unable to communicate with Instagram.', 'bronx'));

		if ( 200 != wp_remote_retrieve_response_code( $remote ) )
			return new WP_Error('invalid_response', __('Instagram did not return a 200.', 'bronx'));

		$shards = explode('window._sharedData = ', $remote['body']);
		$insta_json = explode(';</script>', $shards[1]);
		$insta_array = json_decode($insta_json[0], TRUE);

		if (!$insta_array)
			return new WP_Error('bad_json', __('Instagram has returned invalid data.', 'bronx'));

		$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
		
		$instagram = array();

		foreach ($images as $image) {
				$image['link'] = $image['code'];
				$image['display_src'] = $image['display_src'];

				$instagram[] = array(
					'link'          => $image['link'],
					'large'         => $image['display_src']
				);
		}

		$instagram = base64_encode( serialize( $instagram ) );
		set_transient('instagram-media-'.sanitize_title_with_dashes($username), $instagram, apply_filters('null_instagram_cache_time', HOUR_IN_SECONDS*2));
	//}

	$instagram = unserialize( base64_decode( $instagram ) );
	
	$media_array = array_slice($instagram, 0, $number);
	?>
	<div class="thb-portfolio"><?php
				foreach ($media_array as $item) {
					echo '<figure class="small-12 '.$col.' columns">';
					if ($link == 'true') {
					echo '<a href="https://instagram.com/p/'. $item['link'] .'" target="_blank">';
					}
					echo '<img src="'. esc_url($item['large']) .'" />';
					if ($link) {
					echo '</a>';
					}
					echo '</figure>';
				}
				?>
	</div>
	<?php
}
add_shortcode('thb_instagram', 'thb_instagram');
