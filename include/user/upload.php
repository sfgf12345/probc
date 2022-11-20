<?php

include 'include/config.php';

$id_user = $_SESSION['id_user'];


//iujp
if (isset($_POST['submit']))
{
    $iujp = $_FILES['iujp']['name'];
    $surat_pengesahan = $_FILES['surat_pengesahan']['name'];
    $rencana_k3l = $_FILES['rencana_k3l']['name'];
    $dokumen_kontrak = $_FILES['dokumen_kontrak']['name'];
    $hasil_evaluasi = $_FILES['hasil_evaluasi']['name'];
    $simak_k3l = $_FILES['simak_k3l']['name'];

    //upload file
    if($iujp != '')
    {
        $ext = pathinfo($iujp, PATHINFO_EXTENSION);
        $ext = pathinfo($surat_pengesahan, PATHINFO_EXTENSION);
        $ext = pathinfo($rencana_k3l, PATHINFO_EXTENSION);
        $ext = pathinfo($dokumen_kontrak, PATHINFO_EXTENSION);
        $ext = pathinfo($hasil_evaluasi, PATHINFO_EXTENSION);
        $ext = pathinfo($simak_k3l, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id_upload) as id_upload from upload';
            $result = mysqli_query($db_konek, $sql);
            if (count((array)$result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $iujp = ($row['id']+1) . '-' . $iujp;
                $surat_pengesahan = ($row['id']+1) . '-' . $surat_pengesahan;
                $rencana_k3l = ($row['id']+1) . '-' . $rencana_k3l;
                $dokumen_kontrak = ($row['id']+1) . '-' . $dokumen_kontrak;
                $hasil_evaluasi = ($row['id']+1) . '-' . $hasil_evaluasi;
                $simak_k3l = ($row['id']+1) . '-' . $simak_k3l;
            }
            else
                $iujp = '1' . '-' . $iujp;
                $surat_pengesahan = '1' . '-' . $surat_pengesahan;
                $rencana_k3l = '1' . '-' . $rencana_k3l;
                $dokumen_kontrak = '1' . '-' . $dokumen_kontrak;
                $hasil_evaluasi = '1' . '-' . $hasil_evaluasi;
                $simak_k3l = '1' . '-' . $simak_k3l;

            //set target directory
            $path = 'D:\FADHIL ZUHAIRSYAH\SEM 7 (PT Berau Coal)\PT Berau Coal\Project\Hasil upload dari website probc/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['iujp']['tmp_name'],($path . $iujp));
            move_uploaded_file($_FILES['surat_pengesahan']['tmp_name'],($path . $surat_pengesahan));
            move_uploaded_file($_FILES['rencana_k3l']['tmp_name'],($path . $rencana_k3l));
            move_uploaded_file($_FILES['dokumen_kontrak']['tmp_name'],($path . $dokumen_kontrak));
            move_uploaded_file($_FILES['hasil_evaluasi']['tmp_name'],($path . $hasil_evaluasi));
            move_uploaded_file($_FILES['simak_k3l']['tmp_name'],($path . $simak_k3l));
            
            // insert file details into database
            $sql2 = "INSERT INTO upload(id_user,iujp, surat_pengesahan, rencana_k3l, dokumen_kontrak, hasil_evaluasi, simak_k3l) VALUES('$id_user','$iujp','$surat_pengesahan','$rencana_k3l','$dokumen_kontrak','$hasil_evaluasi','$simak_k3l')";
            mysqli_query($db_konek, $sql2);
            echo "
            <script type='text/javascript'>
                window.location.href = '?page=user/notif_send.php';
            </script> 
            ";        
        }
        else
        {
            echo "
            <script type='text/javascript'>
                window.location.href = '?page=user/notif_send.php';
            </script> 
            ";
        }
    }
    else
        echo "
        <script type='text/javascript'>
            window.location.href = '?page=user/notif_send.php';
        </script> 
        ";
}
?>