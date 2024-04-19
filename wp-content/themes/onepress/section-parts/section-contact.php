<?php
$id                 = get_theme_mod('onepress_contact_id', esc_html__('contact', 'onepress'));
$disable            = get_theme_mod('onepress_contact_disable') == 1 ? true : false;
$meta_class         = get_theme_mod('onepress_contact_meta') == 1 ? 'onepress-meta' : '';
$section_classes    = esc_attr(apply_filters('onepress_section_class', "section-contact section-padding onepage-section {$meta_class}", 'contact'));
$title              = get_theme_mod('onepress_contact_title', esc_html__('Get in touch', 'onepress'));
$subtitle           = get_theme_mod('onepress_contact_subtitle', esc_html__('Section subtitle', 'onepress'));

$onepress_contact_cf7           = get_theme_mod('onepress_contact_cf7');
$onepress_contact_cf7_disable   = get_theme_mod('onepress_contact_cf7_disable');
$onepress_contact_text          = get_theme_mod('onepress_contact_text');
$onepress_contact_address_title = get_theme_mod('onepress_contact_address_title');
$onepress_contact_address       = get_theme_mod('onepress_contact_address');
$onepress_contact_phone         = get_theme_mod('onepress_contact_phone');
$onepress_contact_phone_text    = (get_theme_mod('onepress_contact_phone_text') != '') ? get_theme_mod('onepress_contact_phone_text') : esc_html__('Phone', 'onepress');
$onepress_contact_email         = get_theme_mod('onepress_contact_email');
$onepress_contact_email_text    = (get_theme_mod('onepress_contact_email_text') != '') ? get_theme_mod('onepress_contact_email_text') : esc_html__('Email', 'onepress');
$onepress_contact_whatsapp      = get_theme_mod('onepress_contact_whatsapp');
$onepress_contact_whatsapp_text = (get_theme_mod('onepress_contact_whatsapp_text') != '') ? get_theme_mod('onepress_contact_whatsapp_text') : esc_html__('WhatsApp', 'onepress');
$onepress_contact_telegram      = get_theme_mod('onepress_contact_telegram');
$onepress_contact_telegram_text = (get_theme_mod('onepress_contact_telegram_text') != '') ? get_theme_mod('onepress_contact_telegram_text') : esc_html__('Telegram', 'onepress');

$onepress_contact_yamap         = get_theme_mod('onepress_contact_yamap');
$onepress_contact_yamap_disable = get_theme_mod('onepress_contact_yamap_disable');

if (onepress_is_selective_refresh()) {
    $disable = false;
}

$icon_address = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_1456_5073)">
<path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM7 9C7 6.24 9.24 4 12 4C14.76 4 17 6.24 17 9C17 11.88 14.12 16.19 12 18.88C9.92 16.21 7 11.85 7 9Z" fill="#1B1D21"/><path d="M12 11.5C13.3807 11.5 14.5 10.3807 14.5 9C14.5 7.61929 13.3807 6.5 12 6.5C10.6193 6.5 9.5 7.61929 9.5 9C9.5 10.3807 10.6193 11.5 12 11.5Z" fill="#1B1D21"/></g><defs><clipPath id="clip0_1456_5073"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>';
$icon_marker = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>';
$icon_phone = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>';
$icon_whatsapp = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>';
$icon_telegram = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/></svg>';
$icon_email = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>';

if ($onepress_contact_cf7 || $onepress_contact_text || $onepress_contact_address_title || $onepress_contact_phone || $onepress_contact_email || $onepress_contact_telegram || $onepress_contact_whatsapp) {
    $desc = wp_kses_post(get_theme_mod('onepress_contact_desc'));
?>
    <?php if (!$disable) : ?>
        <?php if (!onepress_is_selective_refresh()) { ?>
            <section id="<?php echo ($id !== '') ? esc_attr($id) : 'contact'; ?>" <?php do_action('onepress_section_atts', 'contact'); ?> class="<?php echo $section_classes; ?>">
            <?php } ?>
            <?php do_action('onepress_section_before_inner', 'contact'); ?>
            <div class="<?php echo esc_attr(apply_filters('onepress_section_container_class', 'container', 'contact')); ?>">
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
                    <?php if ($onepress_contact_cf7_disable != '1') : ?>
                        <?php if (isset($onepress_contact_cf7) && $onepress_contact_cf7 != '') { ?>
                            <div class="contact-form col-sm-6 wow slideInUp">
                                <?php echo do_shortcode(wp_kses_post($onepress_contact_cf7)); ?>
                            </div>
                        <?php } else { ?>
                            <div class="contact-form col-sm-6 wow slideInUp">
                                <br>
                                <small>
                                    <i><?php printf(esc_html__('You can install %1$s plugin and go to Customizer &rarr; Section: Contact &rarr; Section Content to show a working contact form here.', 'onepress'), '<a href="' . esc_url('https://wordpress.org/plugins/pirate-forms/', 'onepress') . '" target="_blank">Contact Form 7</a>'); ?></i>
                                </small>
                            </div>
                        <?php } ?>
                    <?php endif; ?>

                    <div class="col-sm-6 wow slideInUp">
                        <div class="address-box-text">
                            <?php
                            if ($onepress_contact_text != '') {
                                echo apply_filters('onepress_the_content', wp_kses_post(trim($onepress_contact_text)));
                            }
                            ?>
                        </div>
                        <div class="address-box">
                            <h3><?php if ($onepress_contact_address_title != '') {
                                    echo wp_kses_post($onepress_contact_address_title);
                                } ?></h3>

                            <?php if ($onepress_contact_address != '') : ?>
                                <div class="address-contact">
                                    <span class="svg_icon"><?php echo $icon_marker; ?></span>
                                    <div class="address-content"><?php echo wp_kses_post($onepress_contact_address); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if ($onepress_contact_phone != '') : ?>
                                <a href='tel:<?php echo $onepress_contact_phone; ?>' class="address-contact">
                                    <span class="address-contact-icon"><?php echo $icon_phone; ?></span>
                                    <span class="address-content"><?php echo wp_kses_post($onepress_contact_phone_text); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($onepress_contact_whatsapp != '') : ?>
                                <a href='https://wa.me/<?php echo $onepress_contact_whatsapp; ?>' class="address-contact">
                                    <span class="address-contact-icon"><?php echo $icon_whatsapp; ?></span>
                                    <div class="address-content"><?php echo wp_kses_post($onepress_contact_whatsapp_text); ?></div>
                                </a>
                            <?php endif; ?>

                            <?php if ($onepress_contact_telegram != '') : ?>
                                <a href='https://t.me/<?php echo $onepress_contact_telegram; ?>' class="address-contact">
                                    <span class="address-contact-icon icon-telegram"><?php echo $icon_telegram; ?></span>
                                    <span class="address-content"><?php echo wp_kses_post($onepress_contact_telegram_text); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($onepress_contact_email != '') : ?>
                                <a href="mailto:<?php echo antispambot($onepress_contact_email); ?>" class="address-contact">
                                    <span class="address-contact-icon icon-email"><?php echo $icon_email; ?></span>
                                    <span class="address-content"><?php echo antispambot($onepress_contact_email_text); ?> </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($onepress_contact_yamap && $onepress_contact_yamap_disable != '1') : ?>
                        <div class="col-sm-6 wow slideInUp">
                            <div class="contact-map">
                                <iframe src="<?php echo $onepress_contact_yamap; ?>" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php do_action('onepress_section_after_inner', 'contact'); ?>
            <?php if (!onepress_is_selective_refresh()) { ?>
            </section>
        <?php } ?>
<?php endif;
}
