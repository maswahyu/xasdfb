Update dari tobi

#MySQL table settings

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_mobile', 'Banner Mypoint Mobile', 'HOME', 'Home', '', NULL, 'image', '/storage/news/tenor.gif', '0', '2', '1', NULL, NULL)


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_dekstop', 'Banner Mypoint Desktop', 'HOME', 'Home', '', NULL, 'image', '/storage/news/tenor.gif', '0', '2', '1', NULL, NULL)


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_title', 'Banner Mypoint Title', 'HOME', 'Home', '', NULL, 'textinput', 'Menangkan Hadiah Menarik <br>\r\nTiap Bulan!', '0', '2', '1', NULL, NULL);

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_summary', 'Banner Mypoint Summary', 'HOME', 'Home', '', NULL, 'textinput', 'Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!', '0', '2', '1', NULL, NULL);


#MySQL new table

- 2021_03_19_162026_create_news_read_more_table.php
- 2021_03_19_162403_create_news_banner_table.php