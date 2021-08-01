<?php if ($this->session->flashdata('notif')): ?>
	<div class="alert alert-<?= $this->session->flashdata('notif')['result']; ?>" role="alert">
		<?= $this->session->flashdata('notif')['message']; ?>
	</div>
<?php endif ?>
<div class="p-3">
	<?= form_open(base_url("user/member/daftar"), 'class=user', $hidden ?? null); ?>
	<h4>Pendaftaran Member</h4>
	<hr>
		<div class="form-group">
			<label>Nama Member</label>
			<input type="text" class="form-control form-control-user" id="nama_member" name="nama_member" placeholder="Nama member" autofocus="autofocus" value="<?= $this->session->userdata()['nama']; ?>" required>
		</div>
		<div class="form-group">
			<label>Nomor Handphone</label>
			<input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor Handphone" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= $this->session->userdata()['email']; ?>" required>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<br>
			<div class="row">
				<div class="col-sm-1">
					<input type="radio" id="jk_pria" name="jenis_kelamin" value="pria" required>
					<label for="jk_pria">Pria</label><br>
				</div>
				<div class="col-sm-1">
					<input type="radio" id="jk_wanita" name="jenis_kelamin" value="wanita">
					<label for="jk_wanita">Wanita</label><br>
				</div>
			</div>
			
		</div>
		<button type="submit" class="btn btn-primary btn-user btn-block">
			Daftar
		</button>
	<?= form_close(); ?>
</div>