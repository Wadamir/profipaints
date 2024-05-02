<?php

/**
 *Template Name: Frontpage
 *
 * @package OnePress
 */

get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">
        <?php

        do_action('onepress_frontpage_before_section_parts');

        if (!has_action('onepress_frontpage_section_parts')) {

            $sections = apply_filters('onepress_frontpage_sections_order', array(
                'about2', 'aboutus',  'features', 'buy', 'modules',  'about', 'videolightbox', 'gallery', 'counter', 'team',  'news', 'form', 'contact'
            ));

            foreach ($sections as $section) {
                /**
                 * Load section if active
                 *
                 * @since 2.1.1
                 */
                if (Onepress_Config::is_section_active($section)) {
                    onepress_load_section($section);
                }
            }
        } else {
            do_action('onepress_frontpage_section_parts');
        }

        do_action('onepress_frontpage_after_section_parts');

        ?>
    </main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>