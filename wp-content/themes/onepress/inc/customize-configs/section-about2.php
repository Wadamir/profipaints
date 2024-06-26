<?php

/**
 * Section: About 2
 */
$wp_customize->add_panel(
    'onepress_about2',
    array(
        'priority'        => 150,
        'title'           => esc_html__('Раздел: Наши преимущества', 'onepress'),
        'description'     => '',
        'active_callback' => 'onepress_showon_frontpage'
    )
);

$wp_customize->add_section(
    'onepress_about2_settings',
    array(
        'priority'    => 3,
        'title'       => esc_html__('Section Settings', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_about2',
    )
);

// Show Content
$wp_customize->add_setting(
    'onepress_about2_disable',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_about2_disable',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Hide this section?', 'onepress'),
        'section'     => 'onepress_about2_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Meta Color Content
$wp_customize->add_setting(
    'onepress_about2_meta',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_about2_meta',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Темный цвет?', 'onepress'),
        'section'     => 'onepress_about2_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Section ID
$wp_customize->add_setting(
    'onepress_about2_id',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => esc_html__('about2', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_about2_id',
    array(
        'label'         => esc_html__('Section ID:', 'onepress'),
        'section'         => 'onepress_about2_settings',
        'description'   => esc_html__('The section ID should be English character, lowercase and no space.', 'onepress')
    )
);

// Title
$wp_customize->add_setting(
    'onepress_about2_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('about2', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_about2_title',
    array(
        'label'         => esc_html__('Section Title', 'onepress'),
        'section'         => 'onepress_about2_settings',
        'description'   => '',
    )
);

// Sub Title
$wp_customize->add_setting(
    'onepress_about2_subtitle',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Section subtitle', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_about2_subtitle',
    array(
        'label'         => esc_html__('Section Subtitle', 'onepress'),
        'section'         => 'onepress_about2_settings',
        'description'   => '',
    )
);

// Description
$wp_customize->add_setting(
    'onepress_about2_desc',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(new OnePress_Editor_Custom_Control(
    $wp_customize,
    'onepress_about2_desc',
    array(
        'label'         => esc_html__('Section Description', 'onepress'),
        'section'         => 'onepress_about2_settings',
        'description'   => '',
    )
));

// about2 layout
$wp_customize->add_setting(
    'onepress_about2_layout',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '3',
    )
);

$wp_customize->add_control(
    'onepress_about2_layout',
    array(
        'label'         => esc_html__('About 2 Layout Setting', 'onepress'),
        'section'         => 'onepress_about2_settings',
        'description'   => '',
        'type'          => 'select',
        'choices'       => array(
            '3' => esc_html__('4 Columns', 'onepress'),
            '4' => esc_html__('3 Columns', 'onepress'),
            '6' => esc_html__('2 Columns', 'onepress'),
        ),
    )
);


// onepress_add_upsell_for_section( $wp_customize, 'onepress_about2_settings' );


$wp_customize->add_section(
    'onepress_about2_content',
    array(
        'priority'    => 6,
        'title'       => esc_html__('Section Content', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_about2',
    )
);

// about2 content
$wp_customize->add_setting(
    'onepress_about2_boxes',
    array(
        //'default' => '',
        'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
        'transport' => 'refresh', // refresh or postMessage
    )
);

$wp_customize->add_control(
    new Onepress_Customize_Repeatable_Control(
        $wp_customize,
        'onepress_about2_boxes',
        array(
            'label'         => esc_html__('Элемент', 'onepress'),
            'description'   => '',
            'section'       => 'onepress_about2_content',
            'live_title_id' => 'title', // apply for unput text and textarea only
            'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
            'max_item'      => 124, // Maximum item can add
            'limited_msg'     => wp_kses_post(__('Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/onepress-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=onepress_customizer#get-started">OnePress Plus</a> to be able to add more items and unlock other premium about2!', 'onepress')),
            'fields'    => array(
                'image'  => array(
                    'title' => esc_html__('Иконка', 'onepress'),
                    'type'  => 'media',
                ),
                'desc'  => array(
                    'title' => esc_html__('Description', 'onepress'),
                    'type'  => 'editor',
                ),
            ),

        )
    )
);
