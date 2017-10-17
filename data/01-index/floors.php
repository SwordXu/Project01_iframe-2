<?php
header(
  "Content-Type:application/json;charset=UTF-8");
$output=[/*
  recommendedItems:[],
  newArrivalItems:[],
  topSaleItems:[]
*/];
require_once("../init.php");
$sql="SELECT title,details,pic,price,href FROM xz_index_product where seq_recommended>0 order by seq_recommended LIMIT 6";
$output["recommendedItems"]=sql_execute($sql);

$sql="SELECT title,details,pic,price,href FROM xz_index_product where seq_new_arrival>0 order by seq_new_arrival LIMIT 6";

$output["newArrivalItems"]=sql_execute($sql);

$sql="SELECT title,details,pic,price,href FROM xz_index_product where seq_top_sale>0 order by seq_top_sale LIMIT 6";

$output["topSaleItems"]=sql_execute($sql);

echo json_encode($output);
