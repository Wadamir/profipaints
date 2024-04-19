<?php

/**
 * Section: Contact
 */
$wp_customize->add_panel(
    'onepress_form',
    array(
        'priority'        => 270,
        'title'           => esc_html__('Раздел: Форма', 'onepress'),
        'description'     => '',
        'active_callback' => 'onepress_showon_frontpage'
    )
);

$wp_customize->add_section(
    'onepress_form_settings',
    array(
        'priority'    => 3,
        'title'       => esc_html__('Section Settings', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_form',
    )
);

// Show Content
$wp_customize->add_setting(
    'onepress_form_disable',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_form_disable',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Hide this section?', 'onepress'),
        'section'     => 'onepress_form_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Meta Color Content
$wp_customize->add_setting(
    'onepress_form_meta',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_form_meta',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Темный цвет?', 'onepress'),
        'section'     => 'onepress_form_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Section ID
$wp_customize->add_setting(
    'onepress_form_id',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => esc_html__('form', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_form_id',
    array(
        'label'     => esc_html__('Section ID:', 'onepress'),
        'section'         => 'onepress_form_settings',
        'description'   => esc_html__('The section ID should be English character, lowercase and no space.', 'onepress')
    )
);

// Title
$wp_customize->add_setting(
    'onepress_form_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Get in touch', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_form_title',
    array(
        'label'     => esc_html__('Section Title', 'onepress'),
        'section'         => 'onepress_form_settings',
        'description'   => '',
    )
);

// Sub Title
$wp_customize->add_setting(
    'onepress_form_subtitle',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Section subtitle', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_form_subtitle',
    array(
        'label'     => esc_html__('Section Subtitle', 'onepress'),
        'section'         => 'onepress_form_settings',
        'description'   => '',
    )
);

// Description
$wp_customize->add_setting(
    'onepress_form_desc',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(new OnePress_Editor_Custom_Control(
    $wp_customize,
    'onepress_form_desc',
    array(
        'label'         => esc_html__('Section Description', 'onepress'),
        'section'         => 'onepress_form_settings',
        'description'   => '',
    )
));


// onepress_add_upsell_for_section( $wp_customize, 'onepress_form_settings' );


$wp_customize->add_section(
    'onepress_form_content',
    array(
        'priority'    => 6,
        'title'       => esc_html__('Section Content', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_form',
    )
);

// Address Box
$wp_customize->add_setting(
    'onepress_contact_form_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_contact_form_title',
    array(
        'label'         => esc_html__('Contact Box Title', 'onepress'),
        'section'         => 'onepress_form_content',
        'description'   => '',
    )
);

// Contact Text
$wp_customize->add_setting(
    'onepress_contact_form_text',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(new OnePress_Editor_Custom_Control(
    $wp_customize,
    'onepress_contact_form_text',
    array(
        'label'         => esc_html__('Contact Text', 'onepress'),
        'section'         => 'onepress_form_content',
        'description'   => '',
    )
));

// hr
$wp_customize->add_setting('onepress_form_text_hr', array('sanitize_callback' => 'onepress_sanitize_text'));
$wp_customize->add_control(new OnePress_Misc_Control(
    $wp_customize,
    'onepress_form_text_hr',
    array(
        'section'     => 'onepress_form_content',
        'type'        => 'hr'
    )
));
// Contact form 7 guide.
$wp_customize->add_setting(
    'onepress_form_cf7_guide',
    array(
        'sanitize_callback' => 'onepress_sanitize_text'
    )
);
$wp_customize->add_control(new OnePress_Misc_Control(
    $wp_customize,
    'onepress_form_cf7_guide',
    array(
        'section'     => 'onepress_form_content',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Paste your form shortcode from contact form plugin here, e.g <code>[wpforms  id="123"]</code>', 'onepress')
    )
));
/// Contact Form 7 Shortcode
$wp_customize->add_setting(
    'onepress_form_cf7',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_form_cf7',
    array(
        'label'         => esc_html__('Contact Form Shortcode.', 'onepress'),
        'section'         => 'onepress_form_content',
        'description'   => '',
    )
);

// Show CF7
$wp_customize->add_setting(
    'onepress_form_cf7_disable',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_form_cf7_disable',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Hide contact form completely.', 'onepress'),
        'section'     => 'onepress_form_content',
        'description' => esc_html__('Check this box to hide contact form.', 'onepress'),
    )
);
