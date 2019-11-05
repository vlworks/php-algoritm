<?php

$sqlGetAll = "SELECT 
`tableData`.`id_category`,
`tableData`.`category_name`,
`tableTree`.`parent_id`, 
`tableTree`.`child_id`, 
`tableTree`.`level`
FROM `categories_db` AS `tableData`
JOIN `category_links` AS `tableTree` 
  ON `tableData`.`id_category` = `tableTree`.`child_id`
WHERE `tableTree`.`child_id` = 1 ";

$sqlReadyTable = "SELECT 
`tableData`.`category_name`,
`tableTree`.`parent_id`, 
`tableTree`.`level`
FROM `categories_db` AS `tableData`
JOIN `category_links` AS `tableTree` 
  ON `tableData`.`id_category` = `tableTree`.`child_id`
WHERE 1 ";


