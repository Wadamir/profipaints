<?php
$id       = get_theme_mod('onepress_features_id', esc_html__('features', 'onepress'));
$disable  = get_theme_mod('onepress_features_disable') == 1 ? true : false;
$title    = get_theme_mod('onepress_features_title', esc_html__('Features', 'onepress'));
$subtitle = get_theme_mod('onepress_features_subtitle', esc_html__('Why choose Us', 'onepress'));
$layout = intval(get_theme_mod('onepress_features_layout', 4));
$layout_col = 12 / $layout;
if (onepress_is_selective_refresh()) {
    $disable = false;
}
$data  = onepress_get_features_data();
if (!$disable && !empty($data)) {
    $desc = get_theme_mod('onepress_features_desc');
?>
    <?php
    foreach ($data as $k => $f) {
        $media = '';
        $f =  wp_parse_args($f, array(
            'icon_type' => 'icon',
            'icon' => 'gg',
            'image' => '',
            'image2' => '',
            'image3' => '',
            'link' => '',
            'link_text' => '',
            'title' => '',
            'subtitle' => '',
            'desc' => '',
        ));
        // var_dump($f);
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
            } else {
                $media2 = '';
            }
        }
        if ($f['image3']) {
            $url3 = onepress_get_media_url($f['image3']);
            $image3_alt = get_post_meta($f['image3']['id'], '_wp_attachment_image_alt', true);
            if ($url3) {
                $media3 = '<span class="icon-image"><img src="' . esc_url($url3) . '" alt="' . $image3_alt . '"></span>';
            } else {
                $media3 = '';
            }
        }
    ?>
        <div class="modal fade" id="feature-item-content-<?php echo $k ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="feature-item meta-color">
                        <div class="row">
                            <div class="feature-media col-12 col-md-4">
                                <div class="feature-image product-carousel owl-theme owl-carousel owl-hidden">
                                    <?php echo $media; ?>
                                    <?php echo ($f['image2']) ? $media2 : ''; ?>
                                    <?php echo ($f['image3']) ? $media3 : ''; ?>
                                </div>
                            </div>
                            <div class="feature-inner-content col-12 col-md-8">
                                <p class="subtitle h5 mb-2"><?php echo esc_html($f['subtitle']); ?></p>
                                <?php echo apply_filters('the_content', $f['desc']); ?>
                                <?php if ($f['link'] && $f['link__text']) { ?>
                                    <a href="<?php echo $f['link'] ?>" class="external_link" target="_blank"><?php echo $f['link__text'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } // end loop features
    ?>
<?php } ?>