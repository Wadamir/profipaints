UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost:8000', 'https://e-tp.ru');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000','https://e-tp.ru');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://e-tp.ru');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://e-tp.ru');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://e-tp.ru');
UPDATE wp_comments SET comment_author_email = REPLACE(comment_author_email, 'http://localhost:8000', 'https://e-tp.ru');