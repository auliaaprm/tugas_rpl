<?= form_open(base_url()."user/keranjang", '', $hidden ?? null); ?>
<div class="row">
	<div class="col-12">
		<label class="mr-2"><strong>Metode Shipment</strong></label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<?php $i = 1; foreach ($shipment_list as $list): ?>
				<label class="btn btn-secondary">
					<input type="radio" class="metode-shipment" name="shipment" id="option_shipment<?=$i?>" value="<?= $list['id_shipment'] ?>" autocomplete="off" required="required"> <?= $list['nama_shipment'] ?>
				</label>
			<?php $i++; endforeach ?>
		</div>
	</div>

	<div class="col-12 my-3">
		<label class="mr-2"><strong>Metode Bayar</strong></label><br>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<?php $i = 1; foreach ($pembayaran_list as $list): ?>
				<label class="btn btn-secondary">
					<input type="radio" class="metode-bayar" name="bayar" id="option_bayar<?=$i?>" value="<?= $list['id_bayar'] ?>" autocomplete="off" required="required"> <?= $list['nama_metode'] ?>
				</label>
			<?php $i++; endforeach ?>
		</div>
	</div>

	<div class="col-12 my-4">
		<label>
			<strong class="mr-4"><h4>Pesanan Kamu</h4></strong>
			<a class="small" data-toggle="modal" data-target="#keranjang_modal" style="cursor: pointer;">update keranjang</a>
		</label>
		<br>
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

<!-- keranjang Modal-->
<div class="modal fade" id="keranjang_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Keranjang</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open(base_url()."user/keranjang/update", '', $hidden ?? null);?>
				<?php foreach ($pesanan_list as $list): ?>
					<input type="hidden" name="id_pesanan[]" value="<?= $list['id_pesanan'] ?>">
					<div class="d-flex mt-2 align-items-center">
						<img src="<?= base_url("assets/menu/${list['gambar_menu']}") ?>" style="width: 20%">
						<div class="d-flex flex-column mx-3 mr-auto">
							<span><?= $list['nama_menu'] ?></span>
							<span>Rp <?= number_format($list['harga_menu'],0,".",".") ?></span>
						</div>
						<div class="d-flex align-items-center">
							<button type="button" class="btn btn-dark btn-hapus-item">Hapus</button>
							<div class="input-group ml-3">
								<div class="input-group-prepend">
									<span class="input-group-text unselectable btn-decrease-item" style="cursor: pointer;">-</span>
								</div>
								<input type="number" class="form-control text-center amount-item" aria-label="Amount" name="total_item[]" value="<?= $list['total_item'] ?>" min="0" max="100">
								<div class="input-group-append">
									<span class="input-group-text unselectable btn-add-item" style="cursor: pointer;">+</span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<input class="btn btn-primary" type="submit" value="Update">
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>