<?php
$id       = get_theme_mod('onepress_aboutus_id', esc_html__('aboutus', 'onepress'));
$disable  = get_theme_mod('onepress_aboutus_disable') == 1 ? true : false;
$title    = get_theme_mod('onepress_aboutus_title', esc_html__('aboutus', 'onepress'));
$subtitle = get_theme_mod('onepress_aboutus_subtitle', esc_html__('Why choose Us', 'onepress'));
$layout = intval(get_theme_mod('onepress_aboutus_layout', 12));
// $layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_aboutus_data();
if (!$disable && !empty($data)) {
    $desc = get_theme_mod('onepress_aboutus_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
        <section id="<?php if ($id != '') {
                            echo esc_attr($id);
                        } ?>" <?php do_action('onepress_section_atts', 'aboutus'); ?> class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-aboutus section-padding onepage-section', 'aboutus')); ?> section-meta">
        <?php } ?>
        <?php do_action('onepress_section_before_inner', 'aboutus'); ?>
        <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'aboutus')); ?>">
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
                <div id="aboutus-carousel" class="aboutus-carousel row">
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
                    ?>
                        <div class="col-12 col-md-<?php echo $layout ?> d-flex align-items-stretch">
                            <div class="aboutus-item meta-color h-100">
                                <div class="aboutus-content">
                                    <h3><?php echo esc_html($f['title']); ?></h3>
                                    <p class="subtitle"><?php echo esc_html($f['subtitle']); ?></p>
                                    <div class="aboutus-item-content"><?php echo apply_filters('the_content', $f['desc']); ?></div>
                                </div>
                                <div class="aboutus-media">
                                    <?php echo $media; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // end loop aboutus

                    ?>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'aboutus'); ?>

        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>