<?php
$id       = get_theme_mod('onepress_counter_id', esc_html__('counter', 'onepress'));
$disable  = get_theme_mod('onepress_counter_disable') == 1 ? true : false;
$title    = get_theme_mod('onepress_counter_title', esc_html__('Our Numbers', 'onepress'));
$subtitle = get_theme_mod('onepress_counter_subtitle', esc_html__('Section subtitle', 'onepress'));
$onepress_counter_answer = get_theme_mod('onepress_counter_answer');
$onepress_counter_btn_text = get_theme_mod('onepress_counter_btn_text');
$onepress_counter_form = get_theme_mod('onepress_counter_form');
if (onepress_is_selective_refresh()) {
	$disable = false;
}

// Get counter data
$boxes = onepress_get_section_counter_data();
//var_dump($boxes);
if (!empty($boxes)) {
	$desc = wp_kses_post(get_theme_mod('onepress_counter_desc'));
?>
	<?php if ($disable != '1') : ?>
		<?php if (!onepress_is_selective_refresh()) { ?>
			<section id="<?php if ($id != '') {
								echo esc_attr($id);
							} ?>" <?php do_action('onepress_section_atts', 'counter'); ?> class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-counter  section-meta section-padding onepage-section', 'counter')); ?>">
			<?php } ?>
			<?php do_action('onepress_section_before_inner', 'counter'); ?>
			<div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'counter')); ?>">
				<?php if ($title || $subtitle || $desc) { ?>
					<div class="section-title-area">
						<?php if ($subtitle != '') {
							echo '<h5 class="section-subtitle">' . esc_html($subtitle) . '</h5>';
						} ?>
						<?php if ($title != '') {
							echo '<h2 class="section-title">' . esc_html($title) . '</h2>';
						} ?>
						<?php if ($desc) {
							echo '<div class="section-desc">' . apply_filters('onepress_the_content', $desc) . '</div>';
						} ?>
					</div>
				<?php } ?>
				<form id="calculate">
					<div class="row">
						<?php
						$col = 6;
						$num_col = 2;
						$n = (is_array($boxes) && !empty($boxes)) ? count($boxes) : 1;
						if ($n < 4) {
							switch ($n) {
								case 3:
									$col = 6;
									$num_col = 2;
									break;
								case 2:
									$col = 6;
									$num_col = 2;
									break;
								default:
									$col = 12;
									$num_col = 1;
							}
						}
						$j = 0;
						$counter = 0;
						foreach ($boxes as $i => $box) {
							$box = wp_parse_args(
								$box,
								array(
									'title' => '',
									'number' => '',
									'unit_before' => '',
									'unit_after' => '',
								)
							);

							$class = 'col-sm-6 col-md-' . $col;
							if ($j >= $num_col) {
								$j = 1;
								$class .= ' clearleft';
							} else {
								$j++;
							}
						?>
							<div class="<?php echo esc_attr($class); ?>">
								<div class="calculate_item mb-3">
									<?php if ($box['unit_before'] === 'checkbox') { ?>
										<div class="my-form-check form-group">
											<input id="calculate_input_<?php echo $counter; ?>" class="form-check-input" name="<?php echo esc_html($box['unit_after']); ?>" type="<?php echo esc_html($box['unit_before']); ?>" value=''>
											<label for="calculate_input_<?php echo $counter; ?>" class="counter_title form-check-label"><?php echo esc_html($box['title']); ?></label>
										</div>
									<?php } elseif ($box['unit_before'] === 'number') { ?>
										<label for="calculate_input_<?php echo $counter; ?>" class="counter_title form-label"><?php echo esc_html($box['title']); ?></label>
										<input id="calculate_input_<?php echo $counter; ?>" class="form-control" name="<?php echo esc_html($box['unit_after']); ?>" type="<?php echo esc_html($box['unit_before']); ?>" min="0" max="1000" value='0'>
									<?php } ?>
								</div>
							</div>
						<?php
							$counter++;
						} // end foreach
						echo '<input id="calculate_input_answer" class="form-control" name="answer" type="hidden" value="' . $onepress_counter_answer . '">';
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="text-center"><button type="submit" id="calculate_btn" class="btn btn-theme-primary-outline"><?php echo esc_html($onepress_counter_btn_text) ?></button></div>
						</div>
					</div>
				</form>
				<div id="heat_cost" class="row mt-3" style="display:none;">
					<div class="col-12">
						<div class="card p-4">
							<div class="card-body">
								<h5 class="card-title">Примерная стоимость работ: <span id="heat_cost_text" class="card-text text-success"></span> руб</h5>
								<hr />
								<div class="test" style="max-width:400px; margin: 0 auto;">
									<?php echo do_shortcode($onepress_counter_form) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php do_action('onepress_section_after_inner', 'counter'); ?>
			<?php if (!onepress_is_selective_refresh()) { ?>
			</section>
		<?php } ?>
<?php endif;
}
