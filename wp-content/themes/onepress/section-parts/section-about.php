<?php
$id       = get_theme_mod('onepress_about_id', esc_html__('about', 'onepress'));
$disable  = get_theme_mod('onepress_about_disable') == 1 ? true : false;
$meta_class = get_theme_mod('onepress_about_meta') == 1 ? 'onepress-meta' : '';
$section_classes = esc_attr(apply_filters('onepress_section_class', "section-about section-padding onepage-section {$meta_class}", 'about'));
$title    = get_theme_mod('onepress_about_title', esc_html__('about', 'onepress'));
$subtitle = get_theme_mod('onepress_about_subtitle', esc_html__('Why choose Us', 'onepress'));
$layout = intval(get_theme_mod('onepress_about_layout', 4));
if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_about_data();
if (!$disable && !empty($data)) {
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
                    <?php if ($desc) {
                        echo '<div class="section-desc">' . apply_filters('onepress_the_content', wp_kses_post($desc)) . '</div>';
                    } ?>
                </div>
            <?php } ?>
            <div class="section-content">
                <div id="about-carousel" class="about-carousel row">
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
                            <div class="about-item meta-color h-100" data-bs-toggle="modal" data-bs-target="#about-item-content-<?php echo $k ?>">
                                <div class="about-content">
                                    <h2><?php echo esc_html($f['title']); ?></h2>
                                    <p class="subtitle text-italic h4"><?php echo esc_html($f['subtitle']); ?></p>
                                    <div class="about-item-content"><?php echo apply_filters('the_content', $f['desc']); ?></div>
                                </div>
                                <div class="about-media">
                                    <?php echo $media; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } // end loop about
                    ?>
                </div>
            </div>
        </div>
        <?php do_action('onepress_section_after_inner', 'about'); ?>

        <?php if (!onepress_is_selective_refresh()) { ?>
        </section>
    <?php } ?>
<?php } ?>