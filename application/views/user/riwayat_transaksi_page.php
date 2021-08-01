<ul class="nav nav-pills nav-fill">
	<li class="nav-item">
		<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pembelian</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Reservasi</a>
	</li>
</ul>

<div class="tab-content mt-4" id="pills-tabContent">
	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		<?php if (!empty($pesanan_list)): ?>
			<?php foreach ($pesanan_list as $list): ?>
				<a href="<?= base_url()."user/receipt?number=${list['receipt_number']}" ?>" class="clickable-div">
					<div class="d-flex flex-column my-3 p-3" style="border: 1px solid;">
						<div class="d-flex">
							<span class="mr-auto"><strong>Nomor Nota</strong></span>
							<span><?= $list['receipt_number'] ?></span>
						</div>
						<div class="d-flex">
							<span class="mr-auto"><strong>Tanggal Pesan</strong></span>
							<span><?= date("d M Y H:i", strtotime($list['receipt_created_date'])) ?></span>
						</div>
						<div class="d-flex">
							<span class="mr-auto"><strong>Total Harga</strong></span>
							<?php
								$tax = 10/100;
								$list['total_pembelian'] += ($list['total_pembelian']*$tax);
								if ($list['id_shipment'] == 3) {
									$list['total_pembelian'] += 10000;
								}
							?>
							<span>Rp <?= number_format($list['total_pembelian'],0,".",".") ?></span>
						</div>
					</div>
				</a>
			<?php endforeach ?>
		<?php else: ?>
			Belum ada riwayat pembelian
		<?php endif ?>
	</div>
	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		profile
	</div>
	<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>