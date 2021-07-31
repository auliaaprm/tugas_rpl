<div class="row">
<?php foreach ($menu_list as $list): ?>
	<div class="col-sm-6 col-lg-2 p-2">
		<div class="card">
			<img class="card-img-top" src="<?= base_url()."assets/menu/${list['gambar_menu']}" ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><strong><?= $list['nama_menu'] ?></strong></h5>
				<p class="card-text">Rp <?= number_format($list['harga_menu'],0,".",".") ?></p>
				<a href="#" class="btn btn-success btn-block">Tambah Pesanan</a>
			</div>
		</div>
	</div>
<?php endforeach ?>
</div>