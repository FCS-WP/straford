<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Icons_Manager;

   $this->add_render_attribute('wrapper', 'class', ['gsc-services-group layout-grid']);
   if($settings['style'] == 'style-1'){
      $this->add_render_attribute('wrapper', 'class', ['no-gutter']);
   }
   //add_render_attribute grid
   $this->get_grid_settings();
?>

<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
   <div <?php echo $this->get_render_attribute_string('grid') ?>>
      <?php foreach ($settings['services_content'] as $item): ?>
         <div class="item-columns">
            <?php include $this->get_template('general/services-group/item.php'); ?>
         </div>
      <?php endforeach; ?>
   </div>   
</div>
