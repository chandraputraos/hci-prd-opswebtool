<?php require '../db_schema/pgid_oasys.php';
$connect_oci=connect();

$contractor =$_GET["range"];

$query=oci_parse($connect_oci, "select contract_number, created_date, status, is_error,DBMS_LOB.substr(description,200) as description from oa_contract_info_log
where status = 'FAILED' and created_date > $contractor order by created_date DESC ");






    OCIExecute($query);

    while ($row=oci_fetch_assoc($query)) {
        foreach($row as $item) {}


        $result[]=$row;
    };


    echo $data=json_encode($result, JSON_NUMERIC_CHECK);


    ?>