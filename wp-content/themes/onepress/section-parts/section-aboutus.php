<?php
$id       = get_theme_mod('onepress_aboutus_id', esc_html__('aboutus', 'onepress'));
$disable  = get_theme_mod('onepress_aboutus_disable') == 1 ? true : false;
$meta_class = get_theme_mod('onepress_aboutus_meta') == 1 ? 'onepress-meta' : '';
$section_classes = esc_attr(apply_filters('onepress_section_class', "section-aboutus section-padding onepage-section {$meta_class}", 'aboutus'));
$title    = get_theme_mod('onepress_aboutus_title', esc_html__('aboutus', 'onepress'));
$subtitle = get_theme_mod('onepress_aboutus_subtitle', esc_html__('Why choose Us', 'onepress'));
$description = get_theme_mod('onepress_aboutus_desc');
$image = get_theme_mod('onepress_aboutus_image');
$background_image = '';
if ($image) {
    $media = '<img src="' . esc_url($image) . '">';
    $background_image = ' style="background-image:url(' . esc_url($image) . ');"';
}

$layout = intval(get_theme_mod('onepress_aboutus_layout', 12));
// $layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
// $data  = onepress_get_aboutus_data();
if (!$disable) {
    $desc = get_theme_mod('onepress_aboutus_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
        <section id="<?php echo ($id !== '') ? esc_attr($id) : 'aboutus'; ?>" <?php do_action('onepress_section_atts', 'aboutus'); ?> class="<?php echo $section_classes; ?>">
        <?php } ?>
        <?php do_action('onepress_section_before_inner', 'aboutus'); ?>
        <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'aboutus')); ?>">
            <?php if ($title ||  $subtitle || $desc) { ?>
                <div class="section-title-area">
                    <?php if ($subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($subtitle) . '</h5>'; ?>
                    <?php if ($title != '') echo '<h2 class="section-title">' . esc_html($title) . '</h2>'; ?>
                </div>
            <?php } ?>
            <div class="section-content">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php if ($desc) {
                            echo '<div class="aboutus-section-desc">' . apply_filters('onepress_the_content', wp_kses_post($desc)) . '</div>';
                        } ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="aboutus-bg" <?php echo $background_image ?>></div>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'aboutus'); ?>
        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>