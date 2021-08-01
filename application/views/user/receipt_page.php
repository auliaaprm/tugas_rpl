<div class="row mb-5">
	<div class="col-12">
		<div class="text-center">
			<img src="<?= base_url()."assets/img/kopcus.png" ?>" style="width: 20%">
		</div>

		<div class="text-center my-4">
			<?= APP_NAME ?><br>
			Jl. Arya Kemuning no. 81, Pekiringan,<br>
			Kesambi, Kota Cirebon, Jawa Barat 45131,<br>
			Kota Cirebon, Jawa Barat 45131<br>
			081231231
		</div>

		<div class="d-flex">
			<div class="mr-auto"><?= date("d M Y",strtotime($pesanan_list[0]['receipt_created_date'])) ?></div>
			<div><?= date("H:i", strtotime($pesanan_list[0]['receipt_created_date'])) ?></div>
		</div>

		<div class="d-flex">
			<div class="mr-auto">Receipt Number</div>
			<div><?= $pesanan_list[0]['receipt_number'] ?></div>
		</div>

		<div class="d-flex">
			<div class="mr-auto">Collected By</div>
			<div>Kopcus Cirebon</div>
		</div>

		<hr>
	</div>

	<div class="col-12">
		<p class="text-center">*<strong><?= $pesanan_list[0]['nama_shipment'] ?></strong>*</p>
	</div>

	<div class="col-12">
		<?php if (!empty($pesanan_list)): ?>
			<?php
				$subtotal = 0;
			?>
			<?php foreach ($pesanan_list as $list): ?>
				<?php
					$subtotal += $list['total_harga'];
				?>
				<div class="d-flex flex-column my-2">
					<div>
						<?= $list['nama_menu'] ?>
					</div>

					<div class="d-flex">
						<div class="total-item mr-3">
							<?= $list['total_item'] ?>x
						</div>
						<div class="mr-auto">
							@ Rp <?= number_format($list['harga_menu'],0,".",".") ?>
						</div>
						<div class="total-harga">
							Rp <?= number_format($list['total_harga'],0,".",".") ?>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			
			<hr>

			<div class="d-flex flex-column">
				<div class="d-flex">
					<div class="mr-auto">
						Subtotal
					</div>
					<div>
						Rp <?= number_format($subtotal,0,".",".") ?>
					</div>
				</div>
				<div class="d-flex">
					<div class="mr-auto">
						Tax (10%)
					</div>
					<div>
						<?php $tax = 10/100 * $subtotal; ?>
						Rp <?=  number_format($tax,0,".",".") ?>
					</div>
				</div>

				<?php if ($list['id_shipment'] == 3): ?>
					<div class="d-flex">
						<div class="mr-auto">
							Ongkos Kirim (FLAT)
						</div>
						<div class="ongkir-value">
							<?php $ongkir = 10000;  ?>
							Rp <?= number_format($ongkir,0,".",".") ?>
						</div>
					</div>
				<?php endif ?>
			</div>

			<hr>

			<div class="d-flex flex-column">
				<div class="d-flex">
					<div class="mr-auto">
						<strong>Total Harga</strong>
					</div>
					<div>
						<?php $total_harga = $subtotal+$tax+($ongkir ?? 0);  ?>
						Rp <span class='total-harga-value' data-value="<?= $total_harga ?>"><?= number_format($total_harga,0,".",".") ?></span>
					</div>
				</div>
				<div class="d-flex">
					<div class="mr-auto">
						<strong class="mr-3">Total Bayar</strong>
						<span class="p-1" style="border: solid 1px; border-radius: 4px"><?= $list['nama_metode'] ?></span>
					</div>
					<div>
						<?php $total_bayar = $total_harga  ?>
						Rp <span class='total-harga-value' data-value="<?= $total_bayar ?>"><?= number_format($total_bayar,0,".",".") ?></span>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>

	<div class="col-12">
		<hr>
		<div class="text-left">
			<img src="<?= base_url()."assets/img/kopcus.png" ?>" class="mr-3" style="width: 7%"> KOPICHUSEYOID
		</div>
		<hr>
		<div>
			<small>
				Notes<br>
				Thank you bla bla bla
			</small>
		</div>
	</div>
</div>