<?php

/**
 * Admin form: Search widget.
 *
 * @link    https://plugins360.com
 * @since   1.0.0
 *
 * @package All_In_One_Video_Gallery
 */
?>

<div class="aiovg aiovg-widget-form aiovg-widget-form-search">
	<div class="aiovg-widget-field aiovg-widget-field-title">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" class="widefat aiovg-widget-input-title" value="<?php esc_attr_e( $instance['title'] ); ?>" />
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-template">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'template' ) ); ?>"><?php _e( 'Select Template', 'all-in-one-video-gallery' ); ?></label>
		<select name="<?php esc_attr_e( $this->get_field_name( 'template' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'template' ) ); ?>" class="widefat aiovg-widget-input-template"> 
			<?php
				$options = array(
					'vertical'   => __( 'Vertical', 'all-in-one-video-gallery' ),
					'horizontal' => __( 'Horizontal', 'all-in-one-video-gallery' )	
				);
			
				foreach( $options as $key => $value ) {
					printf( '<option value="%s"%s>%s</option>', $key, selected( $key, $instance['template'], false ), $value );
				}
			?>
		</select>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-has_category">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'has_category' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'has_category' ) ); ?>" class="aiovg-widget-input-has_category" value="1" <?php checked( 1, $instance['has_category'] ); ?> /> 
		<label for="<?php esc_attr_e( $this->get_field_id( 'has_category' ) ); ?>"><?php _e( 'Search By Categories', 'all-in-one-video-gallery' ); ?></label>
	</div>
</div>