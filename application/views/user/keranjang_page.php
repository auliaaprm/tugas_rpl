<?= form_open(base_url()."user/keranjang", '', $hidden ?? null); ?>
<div class="row">
	<div class="col-12">
		<label class="mr-2"><strong>Metode Shipment</strong></label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<?php foreach ($shipment_list as $list): ?>
				<label class="btn btn-secondary">
					<input type="radio" class="metode-shipment" name="shipment" id="option1" value="<?= $list['id_shipment'] ?>" autocomplete="off" required="required"> <?= $list['nama_shipment'] ?>
				</label>
			<?php endforeach ?>
		</div>
	</div>

	<div class="col-12 my-3">
		<label class="mr-2"><strong>Metode Bayar</strong></label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<?php $i = 1; foreach ($pembayaran_list as $list): ?>
				<label class="btn btn-secondary">
					<input type="radio" class="metode-bayar" name="bayar" id="option<?=$i?>" value="<?= $list['id_bayar'] ?>" autocomplete="off" required="required"> <?= $list['nama_metode'] ?>
				</label>
			<?php $i++; endforeach ?>
		</div>
	</div>

	<div class="col-12 my-4">
		<label><strong>Pesanan Kamu</strong></label><br>
		<?php if (!empty($pesanan_list)): ?>
			<?php
				$subtotal = 0;
			?>
			<?php foreach ($pesanan_list as $list): ?>
				<?php
					$subtotal += $list['total_harga'];
				?>
				<div class="d-flex my-2">
					<div class="total-item mr-3 p-2" style="border: 1px solid">
						<?= $list['total_item'] ?>x
					</div>
					<div class="d-flex flex-column mr-auto">
						<div>
							<strong><?= $list['nama_menu'] ?></strong>
						</div>
						<div>
							<?= $list['keterangan'] ?: "tidak ada keterangan" ?>
						</div>
					</div>
					<div class="total-harga">
						Rp <?= number_format($list['total_harga'],0,".",".") ?>
					</div>
				</div>
			<?php endforeach ?>
			
			<hr>

			<div class="d-flex flex-column">
				<div class="d-flex">
					<div class="mr-auto">
						SUBTOTAL
					</div>
					<div>
						Rp <?= number_format($subtotal,0,".",".") ?>
					</div>
				</div>
				<div class="d-flex">
					<div class="mr-auto">
						TAX (10%)
					</div>
					<div>
						<?php $tax = 10/100 * $subtotal; ?>
						Rp <?=  number_format($tax,0,".",".") ?>
					</div>
				</div>
				<div class="d-flex">
					<div class="mr-auto">
						ONGKOS KIRIM (FLAT)
					</div>
					<div class="ongkir-value" style="text-decoration:line-through;">
						<?php $ongkir = 10000;  ?>
						Rp <?= number_format($ongkir,0,".",".") ?>
					</div>
				</div>
			</div>

			<hr>

			<div class="d-flex flex-column">
				<div class="d-flex">
					<div class="mr-auto">
						<strong>TOTAL HARGA</strong>
					</div>
					<div>
						<?php $total_bayar = $subtotal+$tax;  ?>
						Rp <span class='total-harga-value' data-value="<?= $total_bayar ?>"><?= number_format($total_bayar,0,".",".") ?></span>
					</div>
				</div>
			</div>
		<?php else: ?>
			<h5>Keranjang kamu masih kosong</h5>
		<?php endif ?>
	</div>

	<button class="btn btn-primary btn-block mt-5" type="submit">Pesan Sekarang</button>
</div>
<?= form_close(); ?>