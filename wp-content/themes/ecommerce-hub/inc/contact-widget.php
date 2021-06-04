<?php
/**
 * Custom Contact us Widget
 */

class Ecommerce_Hub_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Ecommerce_Hub_Contact_Widget', 
			__('TG: Contact us', 'ecommerce-hub'),
			array( 'description' => __( 'Widget for contact us section in sidebar', 'ecommerce-hub' ), ) 
		);
	}
	
	public function widget( $args, $instance ) {
		?>
		<div class="widget">
			<?php
			$title = apply_filters('widget_title', esc_html($instance['title']));
			$phone = apply_filters('widget_phone', esc_html($instance['phone']));
			$email = apply_filters('widget_email', esc_html($instance['email']));
			$address = apply_filters('widget_address', esc_html($instance['address']));
			$timing = apply_filters('widget_timing', esc_html($instance['timing']));

	        echo '<div class="custom-contact-us">';
		        if(!empty($title) ){ ?><h3 class="custom_title"><?php echo esc_html($instance['title']); ?></h3><?php } ?>
		        <?php if(!empty($phone) ){ ?><p><span class="custom_details"><?php esc_html_e('Phone Number: ','ecommerce-hub'); ?></span><span class="custom_desc"><?php echo esc_html($instance['phone']); ?></span></p><?php } ?>
		        <?php if(!empty($email) ){ ?><p><span class="custom_details"><?php esc_html_e('Email ID: ','ecommerce-hub'); ?></span><span class="custom_desc"><?php echo esc_html($instance['email']); ?></span></p><?php } ?>
		        <?php if(!empty($address) ){ ?><p><span class="custom_details"><?php esc_html_e('Address: ','ecommerce-hub'); ?></span><span class="custom_desc"><?php echo esc_html($instance['address']); ?></span></p><?php } ?> 
		        <?php if(!empty($timing) ){ ?><p><span class="custom_details"><?php esc_html_e('Time: ','ecommerce-hub'); ?></span><span class="custom_desc"><?php echo esc_html($instance['timing']); ?></span></p><?php } ?>
	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	 
	public function form( $instance ) {

		$title= ''; $phone= ''; $email = ''; $address = ''; $timing = ''; 
		
		isset($instance['title']) ? $title = $instance['title'] : null;
		isset($instance['phone']) ? $phone = $instance['phone'] : null;
		isset($instance['email']) ? $email = $instance['email'] : null;
		isset($instance['address']) ? $address = $instance['address'] : null;
		isset($instance['timing']) ? $timing = $instance['timing'] : null;
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','ecommerce-hub'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','ecommerce-hub'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','ecommerce-hub'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','ecommerce-hub'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','ecommerce-hub'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($timing); ?>">
    	</p>
		
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();	
		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
		$instance['phone'] = (!empty($new_instance['phone']) ) ? strip_tags($new_instance['phone']) : '';
		$instance['email'] = (!empty($new_instance['email']) ) ? strip_tags($new_instance['email']) : '';
		$instance['address'] = (!empty($new_instance['address']) ) ? strip_tags($new_instance['address']) : '';
		$instance['timing'] = (!empty($new_instance['timing']) ) ? strip_tags($new_instance['timing']) : '';
        
		return $instance;
	}
}

function ecommerce_hub_contact_custom_load_widget() {
	register_widget( 'Ecommerce_Hub_Contact_Widget' );
}
add_action( 'widgets_init', 'ecommerce_hub_contact_custom_load_widget' );