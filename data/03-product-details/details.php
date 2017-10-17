<?php
/**
* 根据产品编号lid查询商品的所有信息
* 参数： lid
* 返回：{
*     "details":{ ..., "picList":[{},...] }
*     "family":{ "fid":.., "fname":.., "laptopList":[ {"lid":..,"spec":..},... ]}
*  }
*/

header("Content-Type:application/json;charset=UTF-8");
require_once("../init.php");
@$lid=$_REQUEST["lid"];
if(!$lid) $lid=1;

$output=[
  "details"=>[],
  "family"=>[]
];

$sql="SELECT * FROM xz_laptop where lid=$lid";
$output["details"]=sql_execute($sql)[0];

$sql="SELECT * FROM xz_laptop_pic where laptop_id=$lid order by pid";
$output["details"]["picList"]=sql_execute($sql);

$fid=$output["details"]["family_id"];
$sql="SELECT * FROM xz_laptop_family where fid=$fid";
$output["family"]=sql_execute($sql)[0];

$sql="SELECT lid,spec FROM xz_laptop where family_id=$fid";
$output["family"]["laptopList"]=sql_execute($sql);
echo json_encode($output);
