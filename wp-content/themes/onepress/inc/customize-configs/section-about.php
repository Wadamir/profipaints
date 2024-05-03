<?php

/**
 * Section: About
 */
$wp_customize->add_panel(
    'onepress_about',
    array(
        'priority'        => 150,
        'title'           => esc_html__('Раздел: Для корп. клиентов', 'onepress'),
        'description'     => '',
        'active_callback' => 'onepress_showon_frontpage'
    )
);

$wp_customize->add_section(
    'onepress_about_settings',
    array(
        'priority'    => 3,
        'title'       => esc_html__('Section Settings', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_about',
    )
);

// Show Content
$wp_customize->add_setting(
    'onepress_about_disable',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_about_disable',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Hide this section?', 'onepress'),
        'section'     => 'onepress_about_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Meta Color Content
$wp_customize->add_setting(
    'onepress_about_meta',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_about_meta',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Темный цвет?', 'onepress'),
        'section'     => 'onepress_about_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Section ID
$wp_customize->add_setting(
    'onepress_about_id',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => esc_html__('about', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_about_id',
    array(
        'label'         => esc_html__('Section ID:', 'onepress'),
        'section'         => 'onepress_about_settings',
        'description'   => esc_html__('The section ID should be English character, lowercase and no space.', 'onepress')
    )
);

// Title
$wp_customize->add_setting(
    'onepress_about_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('about', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_about_title',
    array(
        'label'         => esc_html__('Section Title', 'onepress'),
        'section'         => 'onepress_about_settings',
        'description'   => '',
    )
);

// // Sub Title
// $wp_customize->add_setting(
//     'onepress_about_subtitle',
//     array(
//         'sanitize_callback' => 'sanitize_text_field',
//         'default'           => esc_html__('Section subtitle', 'onepress'),
//     )
// );
// $wp_customize->add_control(
//     'onepress_about_subtitle',
//     array(
//         'label'         => esc_html__('Section Subtitle', 'onepress'),
//         'section'         => 'onepress_about_settings',
//         'description'   => '',
//     )
// );

// Description
$wp_customize->add_setting(
    'onepress_about_desc',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(new OnePress_Editor_Custom_Control(
    $wp_customize,
    'onepress_about_desc',
    array(
        'label'         => esc_html__('Section Description', 'onepress'),
        'section'         => 'onepress_about_settings',
        'description'   => '',
    )
));

// Image
$wp_customize->add_setting(
    'onepress_about_image',
    array(
        'sanitize_callback' => 'esc_url',
        'default'           => '',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'onepress_about_image',
        array(
            'label'       => esc_html__('Section Image', 'onepress'),
            'section'     => 'onepress_about_settings',
            'description' => '',
        )
    )
);

// Form cf7
$wp_customize->add_setting(
    'onepress_about_form',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_about_form',
    array(
        'label'         => esc_html__('Форма', 'onepress'),
        'section'         => 'onepress_about_settings',
        'description'   => '',
    )
);
