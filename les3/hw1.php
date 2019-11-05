<?php


$connect = mysqli_connect('localhost', 'root', '', 'algoritm') or die('Not connection');

$query = "SELECT * FROM categories_links";

$sqlGetAll = "SELECT 
`tableData`.`category_name`,
`tableTree`.`parent_id`, 
`tableTree`.`level`
FROM `categories_db` AS `tableData`
JOIN `category_links` AS `tableTree` 
  ON `tableData`.`id_category` = `tableTree`.`child_id`
WHERE 1 ";


$result = mysqli_query($connect, $sqlGetAll);
$cats = [];
while ($cat = mysqli_fetch_assoc($result)) {
    $cats[$cat['parent_id']][$cat['level']] = $cat;
}
mysqli_close($connect);

echo "<pre>";
print_r($cats);
//die();

function buildTree($cats, $parent_id)
{

    if (is_array($cats) && isset($cats[$parent_id])) {
        $tree = "<ul>";
        foreach ($cats[$parent_id] as $cat) {
            $tree .= "<li>" . $cat['name'];
            $tree .= buildTree($cats, $cat['id']);
            $tree .= "</li>";
        }
        $tree .= "</ul>";
        return $tree;
    }
}

echo buildTree($cats, 0);
