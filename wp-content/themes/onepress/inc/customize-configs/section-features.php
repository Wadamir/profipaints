<?php

/**
 * Section: Features
 */
$wp_customize->add_panel(
    'onepress_features',
    array(
        'priority'        => 150,
        'title'           => esc_html__('Раздел: Товары', 'onepress'),
        'description'     => '',
        'active_callback' => 'onepress_showon_frontpage'
    )
);

$wp_customize->add_section(
    'onepress_features_settings',
    array(
        'priority'    => 3,
        'title'       => esc_html__('Section Settings', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_features',
    )
);

// Show Content
$wp_customize->add_setting(
    'onepress_features_disable',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_features_disable',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Hide this section?', 'onepress'),
        'section'     => 'onepress_features_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Meta Color Content
$wp_customize->add_setting(
    'onepress_features_meta',
    array(
        'sanitize_callback' => 'onepress_sanitize_checkbox',
        'default'           => '',
    )
);
$wp_customize->add_control(
    'onepress_features_meta',
    array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Темный цвет?', 'onepress'),
        'section'     => 'onepress_features_settings',
        // 'description' => esc_html__('Check this box to hide this section.', 'onepress'),
    )
);

// Section ID
$wp_customize->add_setting(
    'onepress_features_id',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => esc_html__('features', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_id',
    array(
        'label'         => esc_html__('Section ID:', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => esc_html__('The section ID should be English character, lowercase and no space.', 'onepress')
    )
);

// Title
$wp_customize->add_setting(
    'onepress_features_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Features', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_title',
    array(
        'label'         => esc_html__('Section Title', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
);

// Sub Title
$wp_customize->add_setting(
    'onepress_features_subtitle',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Section subtitle', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_subtitle',
    array(
        'label'         => esc_html__('Section Subtitle', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
);

// Description
$wp_customize->add_setting(
    'onepress_features_desc',
    array(
        'sanitize_callback' => 'onepress_sanitize_text',
        'default'           => '',
    )
);
$wp_customize->add_control(new OnePress_Editor_Custom_Control(
    $wp_customize,
    'onepress_features_desc',
    array(
        'label'         => esc_html__('Section Description', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
));

// Features layout
$wp_customize->add_setting(
    'onepress_features_layout',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '3',
    )
);

$wp_customize->add_control(
    'onepress_features_layout',
    array(
        'label'         => esc_html__('Features Layout Setting', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
        'type'          => 'select',
        'choices'       => array(
            '3' => esc_html__('4 Columns', 'onepress'),
            '4' => esc_html__('3 Columns', 'onepress'),
            '6' => esc_html__('2 Columns', 'onepress'),
        ),
    )
);

// Tab 1 title
$wp_customize->add_setting(
    'onepress_features_tab1_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Информация о товаре', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_tab1_title',
    array(
        'label'         => esc_html__('Информация о товаре', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
);

// Tab 2 title
$wp_customize->add_setting(
    'onepress_features_tab2_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Сертификаты', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_tab2_title',
    array(
        'label'         => esc_html__('Сертификаты', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
);

// Tab 3 title
$wp_customize->add_setting(
    'onepress_features_tab3_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Техничка', 'onepress'),
    )
);
$wp_customize->add_control(
    'onepress_features_tab3_title',
    array(
        'label'         => esc_html__('Техничка', 'onepress'),
        'section'         => 'onepress_features_settings',
        'description'   => '',
    )
);

// onepress_add_upsell_for_section( $wp_customize, 'onepress_features_settings' );


$wp_customize->add_section(
    'onepress_features_content',
    array(
        'priority'    => 6,
        'title'       => esc_html__('Section Content', 'onepress'),
        'description' => '',
        'panel'       => 'onepress_features',
    )
);

// Features content
$wp_customize->add_setting(
    'onepress_features_boxes',
    array(
        //'default' => '',
        'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
        'transport' => 'refresh', // refresh or postMessage
    )
);

$wp_customize->add_control(
    new Onepress_Customize_Repeatable_Control(
        $wp_customize,
        'onepress_features_boxes',
        array(
            'label'         => esc_html__('Features content', 'onepress'),
            'description'   => '',
            'section'       => 'onepress_features_content',
            'live_title_id' => 'title', // apply for unput text and textarea only
            'title_format'  => esc_html__('[live_title]', 'onepress'), // [live_title]
            'max_item'      => 124, // Maximum item can add
            'limited_msg'     => wp_kses_post(__('Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/onepress-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=onepress_customizer#get-started">OnePress Plus</a> to be able to add more items and unlock other premium features!', 'onepress')),
            'fields'    => array(
                'title'  => array(
                    'title' => esc_html__('Title', 'onepress'),
                    'type'  => 'text',
                ),
                'subtitle'  => array(
                    'title' => esc_html__('Subtitle', 'onepress'),
                    'type'  => 'text',
                ),
                // 'icon_type'  => array(
                //     'title' => esc_html__('Custom icon', 'onepress'),
                //     'type'  => 'select',
                //     'options' => array(
                //         'icon' => esc_html__('Icon', 'onepress'),
                //         'image' => esc_html__('image', 'onepress'),
                //     ),
                // ),
                // 'icon'  => array(
                //     'title' => esc_html__('Icon', 'onepress'),
                //     'type'  => 'icon',
                //     'required' => array('icon_type', '=', 'icon'),
                // ),
                'image'  => array(
                    'title' => esc_html__('Основное фото', 'onepress'),
                    'type'  => 'media',
                    // 'required' => array('icon_type', '=', 'image'),
                ),
                'image2'  => array(
                    'title' => esc_html__('Доп. фото 1 (в окне)', 'onepress'),
                    'type'  => 'media',
                    // 'required' => array('icon_type', '=', 'image'),
                ),
                'image3'  => array(
                    'title' => esc_html__('Доп. фото 2 (в окне)', 'onepress'),
                    'type'  => 'media',
                    // 'required' => array('icon_type', '=', 'image'),
                ),
                'desc'  => array(
                    'title' => esc_html__('Description', 'onepress'),
                    'type'  => 'editor',
                ),
                // hr
                'divider' => array(
                    'type'    => 'hr-bold'
                ),
                'certificates_title'  => array(
                    'label' => esc_html__('Сертификаты', 'onepress'),
                    'type'  => 'subheader',
                ),
                // hr
                'divider1' => array(
                    'type'    => 'hr'
                ),
                'link1'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link1__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider2' => array(
                    'type'    => 'hr'
                ),
                'link2'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link2__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider3' => array(
                    'type'    => 'hr'
                ),
                'link3'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link3__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider4' => array(
                    'type'    => 'hr'
                ),
                'link4'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link4__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider5' => array(
                    'type'    => 'hr'
                ),
                'link5'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link5__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider6' => array(
                    'type'    => 'hr'
                ),
                'link6'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link6__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider7' => array(
                    'type'    => 'hr'
                ),
                'link7'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link7__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider8' => array(
                    'type'    => 'hr'
                ),
                'link8'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link8__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider9' => array(
                    'type'    => 'hr'
                ),
                'link9'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link9__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'divider10' => array(
                    'type'    => 'hr'
                ),
                'link10'  => array(
                    'title' => esc_html__('Ссылка на сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'link10__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),

                // Technical docs

                // hr
                'tech_divider' => array(
                    'type'    => 'hr-bold'
                ),
                'tech_title'  => array(
                    'label' => esc_html__('Техничка', 'onepress'),
                    'type'  => 'subheader',
                ),
                // hr
                'tech_divider1' => array(
                    'type'    => 'hr'
                ),
                'tech_link1'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link1__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider2' => array(
                    'type'    => 'hr'
                ),
                'tech_link2'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link2__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider3' => array(
                    'type'    => 'hr'
                ),
                'tech_link3'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link3__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider4' => array(
                    'type'    => 'hr'
                ),
                'tech_link4'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link4__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider5' => array(
                    'type'    => 'hr'
                ),
                'tech_link5'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link5__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider6' => array(
                    'type'    => 'hr'
                ),
                'tech_link6'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link6__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider7' => array(
                    'type'    => 'hr'
                ),
                'tech_link7'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link7__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider8' => array(
                    'type'    => 'hr'
                ),
                'tech_link8'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link8__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider9' => array(
                    'type'    => 'hr'
                ),
                'tech_link9'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link9__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
                // hr
                'tech_divider10' => array(
                    'type'    => 'hr'
                ),
                'tech_link10'  => array(
                    'title' => esc_html__('Ссылка на тех. сертификат', 'onepress'),
                    'type'  => 'text',
                ),
                'tech_link10__text'  => array(
                    'title' => esc_html__('Текст ссылки', 'onepress'),
                    'type'  => 'text',
                ),
            ),

        )
    )
);
