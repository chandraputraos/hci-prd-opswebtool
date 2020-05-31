<?php require '../db_schema/pgid_mobapp.php';
$connect_oci=connect();

$range_id=$_GET["range"];;

$query=oci_parse($connect_oci, "SELECT PD.contract_number,ca.status_desc, to_char(ca.created_date,'DD-MON-YY HH24:MI:SS') AS created_date from APP_MOBILE.MOB_CLIENT_ALDI CA
join app_pportal.pp_contract_Data PD on ca.application_code=PD.contract_number where ca.created_date >=$range_id and pd.status='IN_PREPROCESS'AND CA.STATUS_DESC='Waiting for pre-approval'");




    OCIExecute($query);

    while ($row=oci_fetch_assoc($query)) {
        foreach($row as $item) {}


        $result[]=$row;
    }

    ;


    echo $data=json_encode($result, JSON_NUMERIC_CHECK);


    ?>