<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE `{$installer->getTable('videogallery/videos')}` (
      `video_id` int(11) NOT NULL AUTO_INCREMENT,
      `video_product_id` int(11) NOT NULL,
      `video_url` varchar(50) NOT NULL,
      `video_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `video_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
       PRIMARY KEY (`video_id`)
       ) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
");
$installer->endSetup();
?>