<?php require '../db_schema/pgid_oasys.php';
$connect_oci=connect();

$contractor =$_GET["contract"];

$query=oci_parse($connect_oci, "select contract_code, notification_type, to_char(notification_dtime,'DD-MON-YY HH24:MI:SS')  AS notification_dtime 
from oa_application_notification where contract_code = :contractor");


oci_bind_by_name($query, ':contractor', $contractor);


    OCIExecute($query);

    while ($row=oci_fetch_assoc($query)) {
        foreach($row as $item) {}


        $result[]=$row;
    };


    echo $data=json_encode($result, JSON_NUMERIC_CHECK);


    ?>