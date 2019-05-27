<?php

/**
 * Admin form: Videos widget.
 *
 * @link    https://plugins360.com
 * @since   1.0.0
 *
 * @package All_In_One_Video_Gallery
 */
?>

<div class="aiovg aiovg-widget-form aiovg-widget-form-videos aiovg-template-<?php esc_attr_e( $instance['template'] ); ?>">
	<?php foreach ( $this->fields['videos'] as $key => $section ) :	?>
		<div class="aiovg-widget-section aiovg-widget-section-<?php esc_attr_e( $key ); ?>">
			<div class="aiovg-widget-section-header"><?php echo wp_kses_post( $section['title'] ); ?></div>
			
			<?php
			foreach ( $section['fields'] as $field ) :
				$field_name = sanitize_text_field( $field['name'] );
				?>
				<div class="aiovg-widget-field aiovg-widget-field-<?php esc_attr_e( $field_name ); ?>">
					<?php if ( 'categories' == $field['type'] ) : ?>
						<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>"><?php esc_html_e( $field['label'] ); ?></label> 
						<ul id="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>" class="widefat aiovg-widget-input-<?php esc_attr_e( $field_name ); ?> aiovg-checklist">
							<?php
							$args = array(
								'taxonomy'      => 'aiovg_categories',
								'selected_cats' => array_map( 'intval', $instance[ $field_name ] ),
								'walker'        => new AIOVG_Walker_Terms_Checklist( $this->get_field_name( $field_name ) ),
								'checked_ontop' => false
							); 

							wp_terms_checklist( 0, $args );
							?>
						</ul>
					<?php elseif ( 'text' == $field['type'] || 'url' == $field['type'] || 'number' == $field['type'] ) : ?>
						<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>"><?php esc_html_e( $field['label'] ); ?></label> 
						<input type="text" name="<?php esc_attr_e( $this->get_field_name( $field_name ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>" class="widefat aiovg-widget-input-<?php esc_attr_e( $field_name ); ?>" value="<?php esc_attr_e( $instance[ $field_name ] ); ?>" />
					<?php elseif ( 'select' == $field['type'] ) : ?>
						<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>"><?php esc_html_e( $field['label'] ); ?></label>
						<select name="<?php esc_attr_e( $this->get_field_name( $field_name ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>" class="widefat aiovg-widget-input-<?php esc_attr_e( $field_name ); ?>"> 
							<?php				
								foreach( $field['options'] as $key => $value ) {
									printf( '<option value="%s"%s>%s</option>', $key, selected( $key, $instance[ $field_name ], false ), $value );
								}
							?>
						</select>
					<?php elseif ( 'checkbox' == $field['type'] ) : ?>
						<input type="checkbox" name="<?php esc_attr_e( $this->get_field_name( $field_name ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>" class="aiovg-widget-input-<?php esc_attr_e( $field_name ); ?>" value="1" <?php checked( 1, $instance[ $field_name ] ); ?> />
						<label for="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>"><?php esc_html_e( $field['label'] ); ?></label>
					<?php elseif ( 'color' == $field['type'] ) : ?>
						<label class="aiovg-widget-label" for="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>"><?php esc_html_e( $field['label'] ); ?></label> 
						<input type="text" name="<?php esc_attr_e( $this->get_field_name( $field_name ) ); ?>" id="<?php esc_attr_e( $this->get_field_id( $field_name ) ); ?>" class="widefat aiovg-widget-input-<?php esc_attr_e( $field_name ); ?> aiovg-color-picker-field" value="<?php esc_attr_e( $instance[ $field_name ] ); ?>" />
					<?php endif; ?>

					<?php if ( ! empty( $field['description'] ) ) : // Description ?>
						<div class="aiovg-widget-field-description"><?php echo wp_kses_post( $field['description'] ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>				
	<?php endforeach; ?>
</div>