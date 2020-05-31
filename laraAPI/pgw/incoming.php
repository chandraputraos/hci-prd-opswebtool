<?php

require '../db_schema/pgid_usr.php';
$connect_oci = connect();


$partner_id = $_GET["partner_id"];
$date = $_GET["date"];
$date2 = $_GET["date2"];



$query = oci_parse($connect_oci,"select *  from APP_gateway.pgw_payment 
where partner_id = :partner_id AND CRE_TMS BETWEEN '{$date}' AND '{$date2}'");

oci_bind_by_name($query, ':partner_id', $partner_id);


OCIExecute($query);
while ($row = oci_fetch_assoc($query))
	{
	foreach($row as $item)
		{
		}
	
	
	 $result[]=$row;
		};

		
echo $data = json_encode( $result, JSON_NUMERIC_CHECK);

	
?>