<?php
$id       = get_theme_mod('onepress_about_id', esc_html__('about', 'onepress'));
$disable  = get_theme_mod('onepress_about_disable') == 1 ? true : false;
$meta_class = get_theme_mod('onepress_about_meta') == 1 ? 'onepress-meta' : '';
$section_classes = esc_attr(apply_filters('onepress_section_class', "section-about section-padding onepage-section {$meta_class}", 'about'));
$title    = get_theme_mod('onepress_about_title', esc_html__('about', 'onepress'));
$subtitle = get_theme_mod('onepress_about_subtitle', esc_html__('Why choose Us', 'onepress'));
$description = get_theme_mod('onepress_about_desc');
$image = get_theme_mod('onepress_about_image');
$background_image = '';
if ($image) {
    $media = '<img src="' . esc_url($image) . '">';
    $background_image = ' style="background-image:url(' . esc_url($image) . ');"';
}

$layout = intval(get_theme_mod('onepress_about_layout', 12));
$form = get_theme_mod('onepress_about_form');
// $layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
// $data  = onepress_get_about_data();
if (!$disable) {
    $desc = get_theme_mod('onepress_about_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
        <section id="<?php echo ($id !== '') ? esc_attr($id) : 'about'; ?>" <?php do_action('onepress_section_atts', 'about'); ?> class="<?php echo $section_classes; ?>">
        <?php } ?>
        <?php do_action('onepress_section_before_inner', 'about'); ?>
        <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'about')); ?>">
            <?php if ($title ||  $subtitle || $desc) { ?>
                <div class="section-title-area">
                    <?php if ($subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($subtitle) . '</h5>'; ?>
                    <?php if ($title != '') echo '<h2 class="section-title">' . esc_html($title) . '</h2>'; ?>
                </div>
            <?php } ?>
            <div class="section-content about-content">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php if ($desc) {
                            echo '<div class="section-desc">' . apply_filters('onepress_the_content', wp_kses_post($desc)) . '</div>';
                        } ?>
                        <?php if ($form) { ?>
                            <div class="about-form">
                                <a href="#" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#about-modal"><?php echo esc_html__('Оставить заявку', 'onepress'); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="about-bg" <?php echo $background_image ?>></div>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'about'); ?>
        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>