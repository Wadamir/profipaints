<?php
$id       = get_theme_mod('onepress_features_id', esc_html__('features', 'onepress'));
$disable  = get_theme_mod('onepress_features_disable') == 1 ? true : false;
$title    = get_theme_mod('onepress_features_title', esc_html__('Features', 'onepress'));
$subtitle = get_theme_mod('onepress_features_subtitle', esc_html__('Why choose Us', 'onepress'));
$layout = intval(get_theme_mod('onepress_features_layout', 4));
// var_dump(get_theme_mod('onepress_features_layout'));
// $layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_features_data();
if (!$disable && !empty($data)) {
    $desc = get_theme_mod('onepress_features_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
        <section id="<?php if ($id != '') {
                            echo esc_attr($id);
                        } ?>" <?php do_action('onepress_section_atts', 'features'); ?> class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-features section-padding onepage-section', 'features')); ?>">
        <?php } ?>
        <?php do_action('onepress_section_before_inner', 'features'); ?>
        <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'features')); ?>">
            <?php if ($title ||  $subtitle || $desc) { ?>
                <div class="section-title-area">
                    <?php if ($subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($subtitle) . '</h5>'; ?>
                    <?php if ($title != '') echo '<h2 class="section-title">' . esc_html($title) . '</h2>'; ?>
                    <?php if ($desc) {
                        echo '<div class="section-desc">' . apply_filters('onepress_the_content', wp_kses_post($desc)) . '</div>';
                    } ?>
                </div>
            <?php } ?>
            <div class="section-content">
                <div id="products-carousel" class="features-carousel row">
                    <?php
                    foreach ($data as $k => $f) {
                        $media = '';
                        $f =  wp_parse_args($f, array(
                            'icon_type' => 'icon',
                            'icon' => 'gg',
                            'image' => '',
                            'link' => '',
                            'title' => '',
                            'subtitle' => '',
                            'desc' => '',
                        ));
                        if ($f['image']) {
                            $url = onepress_get_media_url($f['image']);
                            $image_alt = get_post_meta($f['image']['id'], '_wp_attachment_image_alt', true);
                            if ($url) {
                                $media = '<span class="icon-image"><img src="' . esc_url($url) . '" alt="' . $image_alt . '"></span>';
                            }
                        }
                        if ($f['image2']) {
                            $url2 = onepress_get_media_url($f['image2']);
                            $image2_alt = get_post_meta($f['image2']['id'], '_wp_attachment_image_alt', true);
                            if ($url2) {
                                $media2 = '<span class="icon-image"><img src="' . esc_url($url2) . '" alt="' . $image2_alt . '"></span>';
                            }
                        }
                        if ($f['image3']) {
                            $url3 = onepress_get_media_url($f['image3']);
                            $image3_alt = get_post_meta($f['image3']['id'], '_wp_attachment_image_alt', true);
                            if ($url3) {
                                $media3 = '<span class="icon-image"><img src="' . esc_url($url3) . '" alt="' . $image3_alt . '"></span>';
                            }
                        }
                    ?>
                        <div class="col-6 col-md-6 col-lg-<?php echo $layout ?> d-flex align-items-stretch">
                            <div class="feature-item meta-color h-100" data-bs-toggle="modal" data-bs-target="#feature-item-content-<?php echo $k ?>">
                                <h3><?php echo esc_html($f['title']); ?></h3>
                                <div class="feature-media">
                                    <?php echo $media; ?>
                                </div>
                                <p class="subtitle"><?php echo esc_html($f['subtitle']); ?></p>
                            </div>
                        </div>
                    <?php
                    } // end loop features

                    ?>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'features'); ?>

        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>