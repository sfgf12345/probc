

<div class="col-md-12">
    <h3>Halaman User</h3>
    <br>
    
    <br><br>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>id Inventaris</th>
                        <th>Tempat Penyimpanan</th>
                        
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql = mysqli_query($db_konek, "SELECT * FROM inventaris");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $idInventaris = $ambil_data['id_inventaris'];       
                        $tempatPenyimpanan = $ambil_data['tempat'];

                    ?>

                    <tr>
                    
                        <td><?= $idInventaris ?></td>
                        <td><?= $tempatPenyimpanan ?></td>
                        
                    </tr>

                        <?php 
                            }      // penutup while, kenapa pake php baru biar tabel diatas gak susah bikinnya
                        ?>

                </table>
            </div>
        </div>
    </div>
</div>

     <!-- pada baris ke 40-43 tanda tanya nya  untuk mencetak data di dlm browser, sama dengan echo -->