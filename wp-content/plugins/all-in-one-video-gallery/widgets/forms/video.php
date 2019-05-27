<?php

/**
 * Admin form: Video player widget.
 *
 * @link    https://plugins360.com
 * @since   1.0.0
 *
 * @package All_In_One_Video_Gallery
 */
?>

<div class="aiovg aiovg-widget-form aiovg-widget-form-video">
	<div class="aiovg-widget-field aiovg-widget-field-title">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" class="widefat aiovg-widget-input-title" value="<?php esc_attr_e( $instance['title'] ); ?>" />
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-id">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'id' ) ); ?>"><?php _e( 'Select Video', 'all-in-one-video-gallery' ); ?></label> 
		<select name="<?php esc_attr_e( $this->get_field_name( 'id' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'id' ) ); ?>" class="widefat aiovg-widget-input-id">
			<option value="0">-- <?php _e( 'Latest Video', 'all-in-one-video-gallery' ); ?> --</option>
			<?php
			$query = array( 
				'post_type'      => 'aiovg_videos', 
				'posts_per_page' => 500 ,
				'orderby'        => 'title', 
				'order'          => 'ASC', 
				'post_status'    => 'publish' 
			);		
			$videos = get_posts( $query );
			
			foreach ( $videos as $video ) {	
				printf(
					'<option value="%d"%s>%s</option>', 
					$video->ID, 
					selected( $video->ID, (int) $instance['id'], false ), 
					esc_html( $video->post_title )
				);
			}
			?>
		</select>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-width">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'width' ) ); ?>"><?php _e( 'Width', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'width' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'width' ) ); ?>" class="widefat aiovg-widget-input-width" value="<?php esc_attr_e( $instance['width'] ); ?>" />
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-ratio">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'ratio' ) ); ?>"><?php _e( 'Ratio', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'ratio' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'ratio' ) ); ?>" class="widefat aiovg-widget-input-ratio" value="<?php esc_attr_e( $instance['ratio'] ); ?>" />
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-autoplay">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'autoplay' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'autoplay' ) ); ?>" class="aiovg-widget-input-autoplay" value="1" <?php checked( 1, $instance['autoplay'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'autoplay' ) ); ?>"><?php _e( 'Autoplay', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-loop">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'loop' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'loop' ) ); ?>" class="aiovg-widget-input-loop" value="1" <?php checked( 1, $instance['loop'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'loop' ) ); ?>"><?php _e( 'Loop', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<label class="aiovg-widget-label aiovg-widget-label-header"><?php _e( 'Player Controls', 'all-in-one-video-gallery' ); ?></label>

	<div class="aiovg-widget-field aiovg-widget-field-playpause">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'playpause' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'playpause' ) ); ?>" class="aiovg-widget-input-playpause" value="1" <?php checked( 1, $instance['playpause'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'playpause' ) ); ?>"><?php _e( 'Play / Pause', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-current">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'current' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'current' ) ); ?>" class="aiovg-widget-input-current" value="1" <?php checked( 1, $instance['current'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'current' ) ); ?>"><?php _e( 'Current Time', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-progress">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'progress' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'progress' ) ); ?>" class="aiovg-widget-input-progress" value="1" <?php checked( 1, $instance['progress'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'progress' ) ); ?>"><?php _e( 'Progressbar', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-duration">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'duration' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'duration' ) ); ?>" class="aiovg-widget-input-duration" value="1" <?php checked( 1, $instance['duration'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'duration' ) ); ?>"><?php _e( 'Duration', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-tracks">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'tracks' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'tracks' ) ); ?>" class="aiovg-widget-input-tracks" value="1" <?php checked( 1, $instance['tracks'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'tracks' ) ); ?>"><?php _e( 'Subtitles', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-volume">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'volume' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'volume' ) ); ?>" class="aiovg-widget-input-volume" value="1" <?php checked( 1, $instance['volume'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'volume' ) ); ?>"><?php _e( 'Volume', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-fullscreen">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'fullscreen' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'fullscreen' ) ); ?>" class="aiovg-widget-input-fullscreen" value="1" <?php checked( 1, $instance['fullscreen'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'fullscreen' ) ); ?>"><?php _e( 'Fullscreen', 'all-in-one-video-gallery' ); ?></label>
	</div>
</div>