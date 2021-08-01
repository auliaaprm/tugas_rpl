<a href="<?= base_url()."user/keranjang" ?>" class="btn btn-primary btn-icon-split btn-sm my-2 mb-3">
	<span class="icon text-white-50">
		<i class="fa fa-shopping-cart"></i>
	</span>
	<span class="text">Lihat Keranjang</span>
</a>
<div class="row">
<?php foreach ($menu_list as $list): ?>
	<div class="col-sm-6 col-lg-2 p-2">
		<div class="card" data-id="<?= $list['id_menu'] ?>">
			<img class="card-img-top" src="<?= base_url()."assets/menu/${list['gambar_menu']}" ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><strong><?= $list['nama_menu'] ?></strong></h5>
				<p class="card-text">Rp <?= number_format($list['harga_menu'],0,".",".") ?></p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text unselectable btn-decrease-item" style="cursor: pointer;">-</span>
					</div>
					<input type="number" class="form-control text-center amount-item" aria-label="Amount" value="1" min="1" max="100">
					<div class="input-group-append">
						<span class="input-group-text unselectable btn-add-item" style="cursor: pointer;">+</span>
					</div>
				</div>
				<a href="#" class="btn-add-to-cart btn btn-success btn-block">Tambah ke keranjang</a>
			</div>
		</div>
	</div>
<?php endforeach ?>
</div>