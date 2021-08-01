<?php if ($this->session->flashdata('notif')): ?>
	<div class="alert alert-<?= $this->session->flashdata('notif')['result']; ?>" role="alert">
		<?= $this->session->flashdata('notif')['message']; ?>
	</div>
<?php endif ?>
<div class="p-3">
	<?= form_open(base_url("user/reservasi"), 'class=user', $hidden ?? null); ?>
		<div class="form-group">
			<label>Tanggal Reservasi</label>
			<input type="date" class="form-control form-control-user" id="tgl_rsv" name="tgl_rsv" placeholder="Tanggal Reservasi" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="jumlah_orang">Jumlah Orang</label>
				<select class="form-control" name="jumlah_org" id="jumlah_orang" style="border-radius: 10rem;height: 3.12rem; font-size: .8rem">
					<?php for($i=1; $i <= 30; $i++): ?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="nomor_meja">Nomor Meja</label>
				<select class="form-control" name="no_meja" id="nomor_meja" style="border-radius: 10rem;height: 3.12rem; font-size: .8rem">
					<?php for($i=1; $i <= 30; $i++): ?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
		</div>
		<h4 class="mt-4 mb-3"><strong><?= strtoupper("Koordinasi") ?></strong></h4>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control form-control-user" id="nama_member" name="nama" placeholder="Nama" autofocus="autofocus" value="<?= $this->session->userdata()['nama'] ?? null; ?>" required>
		</div>
		<div class="form-group">
			<label>Nomor Handphone</label>
			<input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="<?= $this->session->userdata()['no_hp'] ?? null; ?>" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= $this->session->userdata()['email'] ?? null; ?>" required>
		</div>

		<div class="form-group">
			<label class="mr-2">Metode Bayar</label><br>
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
				<?php $i = 1; foreach ($pembayaran_list as $list): ?>
					<label class="btn btn-secondary">
						<input type="radio" class="metode-bayar" name="bayar" id="option<?=$i?>" value="<?= $list['id_bayar'] ?>" autocomplete="off" required="required"> <?= $list['nama_metode'] ?>
					</label>
				<?php $i++; endforeach ?>
			</div>
		</div>

		<button type="submit" class="btn btn-primary btn-user btn-block mt-4">
			Reservasi Sekarang
		</button>
	<?= form_close(); ?>
</div>