
<?php 
	include 'include/config.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Perusahaan</th>
				<th>Jenis Vendor</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($db_konek,"select * from pengajuan");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama_perusahaan']; ?></td>
					<td><?php echo $d['jenis_vendor']; ?></td>
					<td><?php echo $d['status_pengajuan']; ?></td>
				</tr>
				<?php 
			}
			?>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Diminta", "Diterima", "Ditolak"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($db_konek,"select * from pengajuan where status_pengajuan='Diminta'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($db_konek,"select * from pengajuan where status_pengajuan='Diterima'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($db_konek,"select * from pengajuan where status_pengajuan='Ditolak'");
					echo mysqli_num_rows($jumlah_fisip);
					?>
					],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)',

					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
                    'rgba(255,99,132,1)',

					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

        <div >
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Jenis Vendor</th>
                    <th>Status Pengajuan</th>
                </tr>
                </thead>
                
            </table>
        </div>
        
        <!-- Script -->
        <script>
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'include/user/ajaxfile_monitsio.php'
                },
                'columns': [
                    { data: 'nama_perusahaan' },
                    { data: 'jenis_vendor' },
                    { data: 'status_pengajuan' },
                ]
            });
        });
        </script>