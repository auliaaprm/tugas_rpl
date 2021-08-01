<?php if (!empty($reservasi_details)): ?>
	<div class="offset-md-3 col-5 p-4" style="border: solid 1px;">
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Kode Reservasi</strong></span>
			<span><?= $reservasi_details['kode_reservasi'] ?></span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Untuk Tanggal</strong></span>
			<span><?= date("d/M/Y", strtotime($reservasi_details['tgl_rsv'])) ?></span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Jumlah Orang</strong></span>
			<span><?= $reservasi_details['jumlah_org'] ?> orang</span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Nomor Meja</strong></span>
			<span><?= $reservasi_details['no_meja'] ?></span>
		</div>
		
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Nama</strong></span>
			<span><?= $reservasi_details['nama'] ?></span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Nomor Handphone</strong></span>
			<span><?= $reservasi_details['no_hp'] ?></span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Email</strong></span>
			<span><?= $reservasi_details['email'] ?></span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Down Payment</strong></span>
			<span><span class="p-1" style="border: solid 1px; border-radius: 4px"><?= $reservasi_details['nama_metode'] ?></span> Lunas</span>
		</div>
		<div class="d-flex mt-2">
			<span class="mr-auto"><strong>Tanggal Reservasi</strong></span>
			<span><?= date("d/M/Y H:i", strtotime($reservasi_details['reservasi_created_date'])) ?></span>
		</div>
	</div>
<?php else: ?>
	Anda belum melakukan reservasi
<?php endif ?>