<div class="row">
	<div class="offset-2 col-8">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between" style="width: 60%">
					<img src="<?= base_url()."assets/img/kopcus.png" ?>" style="width: 10%">
					<h4 class="align-self-center">
						<strong><?= strtoupper("member card") ?></strong>
					</h4>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $member_details['nama_member'] ?></h5>
				<p class="card-text"><?= date("d F Y",strtotime($member_details['tgl_lahir'])) ?></p>
				<br>
				<div class="d-flex">
					<div class="d-flex flex-column mr-auto">
						<p class="card-text">
							<?= strtoupper("Silver") ?>
						</p>
						<p>
							<strong>Level 2</strong>
						</p>
					</div>

					<div class="d-flex flex-column">
						<p class="card-text">
							<?= strtoupper("poin saat ini") ?>
						</p>
						<p>
							<strong>2000 PT</strong>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<ul class="nav nav-pills nav-fill mt-5">
	<li class="nav-item">
		<a class="nav-link active" id="pills-pencapaian-tab" data-toggle="pill" href="#pills-pencapaian" role="tab" aria-controls="pills-pencapaian" aria-selected="true">Pencapaian Kamu</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="pills-keuntungan-tab" data-toggle="pill" href="#pills-keuntungan" role="tab" aria-controls="pills-keuntungan" aria-selected="false">Keuntungan Member</a>
	</li>
</ul>
<div class="tab-content mt-4" id="pills-tabContent">
	<div class="tab-pane fade show active" id="pills-pencapaian" role="tabpanel" aria-labelledby="pills-pencapaian-tab">
		<label>
			Progress kamu selama ini
		</label>
		<div class="progress" style="height: 30px; border-radius: 0.8rem">
			<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
		</div>
		<p class="mt-3">
			kumpulkan lebih banyak ...
		</p>
	</div>

	<div class="tab-pane fade" id="pills-keuntungan" role="tabpanel" aria-labelledby="pills-keuntungan-tab">
		keuntungan member
	</div>
</div>