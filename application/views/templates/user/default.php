<?php
	$this->load->view('templates/user/header.php', $data ?? null, FALSE);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title_page ?? $title ?></h1>
	<?php
		$this->load->view("user/{$view_file}", $data ?? null, FALSE);
	?>
</div>
<!-- /.container-fluid -->

<?php
	$this->load->view('templates/user/footer.php', $data ?? null, FALSE);
?>
