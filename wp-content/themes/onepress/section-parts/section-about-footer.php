<?php
$id       = get_theme_mod('onepress_about_id', esc_html__('about', 'onepress'));
$disable  = get_theme_mod('onepress_about_disable') == 1 ? true : false;
$meta_class = get_theme_mod('onepress_about_meta') == 1 ? 'onepress-meta' : '';
$section_classes = esc_attr(apply_filters('onepress_section_class', "section-about section-padding onepage-section {$meta_class}", 'about'));
$title    = get_theme_mod('onepress_about_title', esc_html__('about', 'onepress'));
$subtitle = get_theme_mod('onepress_about_subtitle', esc_html__('Why choose Us', 'onepress'));

if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_about_data();
if (!$disable && !empty($data)) {
    $desc = get_theme_mod('onepress_about_desc');
?>
    <?php if (!onepress_is_selective_refresh()) { ?>
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
                'form' => '',
            ));
            if ($f['image']) {
                $url = onepress_get_media_url($f['image']);
                $image_alt = get_post_meta($f['image']['id'], '_wp_attachment_image_alt', true);
                if ($url) {
                    $media = '<span class="icon-image"><img src="' . esc_url($url) . '" alt="' . $image_alt . '"></span>';
                }
            }
        ?>
            <div class="modal fade" id="about-item-content-<?php echo $k ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-wide">
                    <div class="modal-content modal-content-high">
                        <div class="modal-header">
                            <h3><?php echo esc_html($f['title']); ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1561_14432)">
                                            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="#1B1D21"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1561_14432">
                                                <rect width="24" height="24" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="about-item meta-color h-100">
                                <div class="about-content">
                                    <h2 class="d-none"><?php echo esc_html($f['title']); ?></h2>
                                    <p class="subtitle text-italic h4 d-none"><?php echo esc_html($f['subtitle']); ?></p>
                                    <div class="about-item-content"><?php echo apply_filters('the_content', $f['desc']); ?></div>
                                </div>
                                <?php if ($f['form']) { ?>
                                    <div class="form">
                                        <?php echo do_shortcode(wp_kses_post($f['form'])); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="about-media d-none">
                                <?php echo $media; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } // end loop about
        ?>
    <?php } ?>
<?php } ?>