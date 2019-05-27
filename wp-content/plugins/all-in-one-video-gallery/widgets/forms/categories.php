<?php

/**
 * Admin form: Categories widget.
 *
 * @link    https://plugins360.com
 * @since   1.0.0
 *
 * @package All_In_One_Video_Gallery
 */
?>

<div class="aiovg aiovg-widget-form aiovg-widget-form-categories aiovg-template-<?php esc_attr_e( $instance['template'] ); ?>">
	<div class="aiovg-widget-field aiovg-widget-field-title">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" class="widefat aiovg-widget-input-title" value="<?php esc_attr_e( $instance['title'] ); ?>">
	</div>	

	<div class="aiovg-widget-field aiovg-widget-field-child_of">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'child_of' ) ); ?>"><?php _e( 'Select Parent', 'all-in-one-video-gallery' ); ?></label> 
		<?php
			wp_dropdown_categories( array(
				'show_option_none'  => '-- ' . __( 'Select Parent', 'all-in-one-video-gallery' ) . ' --',
				'option_none_value' => 0,
				'taxonomy'          => 'aiovg_categories',
				'name' 			    => $this->get_field_name( 'child_of' ),
				'class'             => 'widefat aiovg-widget-input-child_of',
				'orderby'           => 'name',
				'selected'          => (int) $instance['child_of'],
				'hierarchical'      => true,
				'depth'             => 10,
				'show_count'        => false,
				'hide_empty'        => false,
			) );
		?>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-template">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'template' ) ); ?>"><?php _e( 'Select Template', 'all-in-one-video-gallery' ); ?></label>
		<select name="<?php esc_attr_e( $this->get_field_name( 'template' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'template' ) ); ?>" class="widefat aiovg-widget-input-template"> 
			<?php
				$options = array(
					'grid' => __( 'Grid', 'all-in-one-video-gallery' ),
					'list' => __( 'List', 'all-in-one-video-gallery' )	
				);
			
				foreach( $options as $key => $value ) {
					printf( '<option value="%s"%s>%s</option>', $key, selected( $key, $instance['template'], false ), $value );
				}
			?>
		</select>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-columns">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'columns' ) ); ?>"><?php _e( 'Columns', 'all-in-one-video-gallery' ); ?></label> 
		<input type="text" name="<?php esc_attr_e( $this->get_field_name( 'columns' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'columns' ) ); ?>" class="widefat aiovg-widget-input-columns" value="<?php esc_attr_e( $instance['columns'] ); ?>" />
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-orderby">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'orderby' ) ); ?>"><?php _e( 'Order By', 'all-in-one-video-gallery' ); ?></label>
		<select name="<?php esc_attr_e( $this->get_field_name( 'orderby' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'orderby' ) ); ?>" class="widefat aiovg-widget-input-orderby"> 
			<?php
				$options = array(
					'id'    => __( 'ID', 'all-in-one-video-gallery' ),
					'count' => __( 'Count', 'all-in-one-video-gallery' ),
					'name'  => __( 'Name', 'all-in-one-video-gallery' ),
					'slug'  => __( 'Slug', 'all-in-one-video-gallery' )	
				);
			
				foreach( $options as $key => $value ) {
					printf( '<option value="%s"%s>%s</option>', $key, selected( $key, $instance['orderby'], false ), $value );
				}
			?>
		</select>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-order">
		<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( 'order' ) ); ?>"><?php _e( 'Order', 'all-in-one-video-gallery' ); ?></label>
		<select name="<?php esc_attr_e( $this->get_field_name( 'order' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'order' ) ); ?>" class="widefat aiovg-widget-input-order"> 
			<?php
				$options = array(
					'asc'  => __( 'ASC', 'all-in-one-video-gallery' ),
					'desc' => __( 'DESC', 'all-in-one-video-gallery' )
				);
			
				foreach( $options as $key => $value ) {
					printf( '<option value="%s"%s>%s</option>', $key, selected( $key, $instance['order'], false ), $value );
				}
			?>
		</select>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-hierarchical">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'hierarchical' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'hierarchical' ) ); ?>" class="aiovg-widget-input-hierarchical" value="1" <?php checked( 1, $instance['hierarchical'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'hierarchical' ) ); ?>"><?php _e( 'Show Hierarchy', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-show_description">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'show_description' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'show_description' ) ); ?>" class="aiovg-widget-input-show_description" value="1" <?php checked( 1, $instance['show_description'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'show_description' ) ); ?>"><?php _e( 'Show Description', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-show_count">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'show_count' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'show_count' ) ); ?>" class="aiovg-widget-input-show_count" value="1" <?php checked( 1, $instance['show_count'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'show_count' ) ); ?>"><?php _e( 'Show Videos Count', 'all-in-one-video-gallery' ); ?></label>
	</div>

	<div class="aiovg-widget-field aiovg-widget-field-hide_empty">
		<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( 'hide_empty' ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( 'hide_empty' ) ); ?>" class="aiovg-widget-input-hide_empty" value="1" <?php checked( 1, $instance['hide_empty'] ); ?> />
		<label for="<?php esc_attr_e( $this->get_field_id( 'hide_empty' ) ); ?>"><?php _e( 'Hide Empty Categories', 'all-in-one-video-gallery' ); ?></label>
	</div>
</div>