<?php if (!defined('OT_VERSION')) exit('No direct script access allowed');
/**
 * Text Block Option.
 * 20120312: FZSM added macro capability and shortcode processing
 * use #option_name# to get the option value.
 *
 * @access public
 * @since 1.0.0
 *
 * @param array $value
 * @param array $settings
 * @param int $int
 *
 * @return string
 */
function option_tree_textblock( $value, $settings, $int ) 
{ 
?>
  <div class="option option-textblock">
    <!-- <h3 class="text-title"><?php echo htmlspecialchars_decode( $value->item_title ); ?></h3> -->
    <div class="section">
      <div class="text_block">
        <?php 
  	
		$theme_options=get_option('option_tree');
		$macro_value= stripslashes( $value->item_desc );
		
		//loop options to replace option keys for values properly
		foreach ($theme_options as $key => $value)
		{
			$macro_value=str_replace("#$key#","$value",$macro_value);
		}
		echo do_shortcode(htmlspecialchars_decode ($macro_value,ENT_QUOTES));
		?>
      </div>
    </div>
  </div>
<?php
}