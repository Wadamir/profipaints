<?php
$id                         = get_theme_mod('onepress_form_id', esc_html__('form', 'onepress'));
$disable                    = get_theme_mod('onepress_form_disable') == 1 ? true : false;
$meta_class                 = get_theme_mod('onepress_form_meta') == 1 ? 'onepress-meta' : '';
$section_classes            = esc_attr(apply_filters('onepress_section_class', "section-form section-padding onepage-section {$meta_class}", 'form'));
$title                      = get_theme_mod('onepress_form_title', esc_html__('Get in touch', 'onepress'));
$subtitle                   = get_theme_mod('onepress_form_subtitle', esc_html__('Section subtitle', 'onepress'));

$onepress_form_cf7           = get_theme_mod('onepress_form_cf7');
$onepress_form_cf7_disable   = get_theme_mod('onepress_form_cf7_disable');
$onepress_form_text          = get_theme_mod('onepress_form_text');
$onepress_contact_form_title = get_theme_mod('onepress_contact_form_title');
$onepress_contact_form_text  = get_theme_mod('onepress_contact_form_text');

if (onepress_is_selective_refresh()) {
    $disable = false;
}

if ($onepress_form_cf7 || $onepress_form_text || $onepress_contact_form_title || $onepress_contact_form_text) {
    $desc = wp_kses_post(get_theme_mod('onepress_form_desc'));
?>
    <?php if (!$disable) : ?>
        <?php if (!onepress_is_selective_refresh()) { ?>
            <section id="<?php echo ($id !== '') ? esc_attr($id) : 'form'; ?>" <?php do_action('onepress_section_atts', 'form'); ?> class="<?php echo $section_classes; ?>">
            <?php } ?>
            <?php do_action('onepress_section_before_inner', 'form'); ?>
            <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'form')); ?>">
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
                <div class="row">
                    <?php if ($onepress_form_cf7_disable != '1') : ?>
                        <?php if (isset($onepress_form_cf7) && $onepress_form_cf7 != '') { ?>
                            <div class="form-form col-sm-6 wow slideInUp">
                                <?php echo do_shortcode(wp_kses_post($onepress_form_cf7)); ?>
                            </div>
                        <?php } else { ?>
                            <div class="form-form col-sm-6 wow slideInUp">
                                <br>
                                <small>
                                    <i><?php printf(esc_html__('You can install %1$s plugin and go to Customizer &rarr; Section: form &rarr; Section Content to show a working form form here.', 'onepress'), '<a href="' . esc_url('https://wordpress.org/plugins/pirate-forms/', 'onepress') . '" target="_blank">form Form 7</a>'); ?></i>
                                </small>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                    <?php if ($onepress_contact_form_title != '' || $onepress_contact_form_text != '') { ?>
                        <div class="col-sm-6 wow slideInUp">
                            <?php if ($onepress_contact_form_title) { ?>
                                <h3><?php echo wp_kses_post($onepress_contact_form_title) ?></h3>
                            <?php } ?>
                            <?php if ($onepress_contact_form_text) { ?>
                                <p>
                                    <?php echo wp_kses_post($onepress_contact_form_text) ?>
                                </p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php do_action('onepress_section_after_inner', 'form'); ?>
            <?php if (!onepress_is_selective_refresh()) { ?>
            </section>
        <?php } ?>
<?php endif;
}
