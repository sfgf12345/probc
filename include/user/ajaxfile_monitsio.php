<?php
include 'include/config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($db_konek,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (nama_perusahaan like '%".$searchValue."%' or 
        jenis_vendor like '%".$searchValue."%' or 
        status_pengajuan like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($db_konek,"select count(*) as allcount from pengajuan");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($db_konek,"select count(*) as allcount from pengajuan WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from pengajuan WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db_konek, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"nama_perusahaan"=>$row['nama_perusahaan'],
    		"jenis_vendor"=>$row['jenis_vendor'],
    		"status_pengajuan"=>$row['status_pengajuan']
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
