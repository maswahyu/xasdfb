Update dari tobi

#MySQL table settings

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_mobile', 'Banner Mypoint Mobile', 'HOME', 'Home', '', NULL, 'image', '/storage/news/tenor.gif', '0', '2', '1', NULL, NULL)


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_dekstop', 'Banner Mypoint Desktop', 'HOME', 'Home', '', NULL, 'image', '/storage/news/tenor.gif', '0', '2', '1', NULL, NULL)


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_title', 'Banner Mypoint Title', 'HOME', 'Home', '', NULL, 'textinput', 'Menangkan Hadiah Menarik <br>\r\nTiap Bulan!', '0', '2', '1', NULL, NULL);

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_mypoint_summary', 'Banner Mypoint Summary', 'HOME', 'Home', '', NULL, 'textinput', 'Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!', '0', '2', '1', NULL, NULL);


#MySQL new table

- 2021_03_19_162026_create_news_read_more_table.php
- 2021_03_19_162403_create_news_banner_table.php -> Cancel


#new Mysql table settings

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_type', 'Banner My Point ?', 'DETAIL POST', 'Banner Type
', 'banner mypoint / reguler ?', NULL, 'checkswitch', '1', '1', '1', '1', NULL, NULL);


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_post_mobile', 'Banner Mobile', 'DETAIL POST', 'Bottom right', '', NULL, 'image', '/storage/news/tenor.gif', '3', '2', '1', NULL, NULL);


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_post_dekstop', 'Banner Desktop', 'DETAIL POST', 'Bottom right', '', NULL, 'image', '/storage/news/tenor.gif', '2', '2', '1', NULL, NULL);


INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_post_title', 'Banner Title', 'DETAIL POST', 'Bottom right', '', NULL, 'textinput', 'Menangkan Hadiah Menarik <br>\r\nTiap Bulan!', '4', '2', '1', NULL, NULL);

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_post_summary', 'Banner Summary', 'DETAIL POST', 'Bottom right', '', NULL, 'textinput', 'Ingin dapat hadiah eksklusif tiap bulannya? yuk daftar jadi member LAZONE.ID sekarang dan kumpukan terus poin mu!', '5', '2', '1', NULL, NULL);

INSERT INTO `settings` (`id`, `key`, `name`, `group`, `section`, `help`, `placeholder`, `type`, `value`, `sort`, `sort_group`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'banner_post_url', 'Banner Url', 'DETAIL POST', 'Bottom right', '', NULL, 'textinput', 'https://new.lazone.saga.id/points', '6', '2', '1', NULL, NULL);
