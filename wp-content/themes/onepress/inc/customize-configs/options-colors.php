<?php
/*
 Colors
----------------------------------------------------------------------*/
$wp_customize->add_section(
    'onepress_colors_settings',
    array(
        'priority'    => 4,
        'title'       => esc_html__('Site Colors', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_options',
    )
);

// Primary Text Color
$wp_customize->add_setting(
    'onepress_primary_text_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#1B1D21',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_primary_text_color',
        array(
            'label'       => esc_html__('Primary Text Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 1,
        )
    )
);

// Secondary Text Color
$wp_customize->add_setting(
    'onepress_secondary_text_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#4F5151',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_secondary_text_color',
        array(
            'label'       => esc_html__('Secondary Text Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 2,
        )
    )
);

$wp_customize->add_setting(
    'onepress_accent_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#EF6333',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_accent_color',
        array(
            'label'       => esc_html__('Primary Accent Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 3,
        )
    )
);

$wp_customize->add_setting(
    'onepress_secondary_accent_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#C0141E',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_secondary_accent_color',
        array(
            'label'       => esc_html__('Secondary Accent Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 4,
        )
    )
);

/**
 * Background Color
 *
 * @since 2.2.1
 */
$wp_customize->add_setting(
    'onepress_background_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#FCFCFC',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_background_color',
        array(
            'label'       => esc_html__('Background Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 5,
        )
    )
);

/**
 * Background Color
 *
 * @since 2.2.1
 */
$wp_customize->add_setting(
    'onepress_background_meta_color',
    array(
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'default'              => '#E6E6E6',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'onepress_background_meta_color',
        array(
            'label'       => esc_html__('Background Dark Color', 'onepress'),
            'section'     => 'onepress_colors_settings',
            'description' => '',
            'priority'    => 6,
        )
    )
);
