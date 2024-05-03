<?php
$id       = get_theme_mod('onepress_about2_id', esc_html__('about2', 'onepress'));
$disable  = get_theme_mod('onepress_about2_disable') == 1 ? true : false;
$meta_class = get_theme_mod('onepress_about2_meta') == 1 ? 'onepress-meta' : '';
$section_classes = esc_attr(apply_filters('onepress_section_class', "section-about2 section-padding onepage-section {$meta_class}", 'about2'));
$title    = get_theme_mod('onepress_about2_title', esc_html__('about2', 'onepress'));
$subtitle = get_theme_mod('onepress_about2_subtitle', esc_html__('Why choose Us', 'onepress'));
$layout = intval(get_theme_mod('onepress_about2_layout', 4));
// $layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_about2_data();
if (!$disable && !empty($data)) {
    $desc = get_theme_mod('onepress_about2_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
        <section id="<?php echo ($id !== '') ? esc_attr($id) : 'about2'; ?>" <?php do_action('onepress_section_atts', 'about2'); ?> class="<?php echo $section_classes; ?>">
        <?php } ?>
        <?php do_action('onepress_section_before_inner', 'about2'); ?>
        <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'about2')); ?>">
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
                <div id="about2-carousel" class="about2-carousel row">
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
                        <div class="col-12 col-md-6 col-lg-<?php echo $layout ?> mb-10">
                            <div class="about2-item meta-color h-100">
                                <div class="about2-content">
                                    <div class="about2-media text-center"><?php echo $media; ?></div>
                                    <div class="about2-item-content"><?php echo apply_filters('the_content', $f['desc']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // end loop about2

                    ?>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'about2'); ?>

        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>