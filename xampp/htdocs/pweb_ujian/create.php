<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $npm = isset($_POST['npm']) ? $_POST['npm'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    $stmt = $pdo->prepare('INSERT INTO ujian VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $email, $kelas, $npm, $created]);
    $msg = 'Berhasil dibuat!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Nama</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="nama" placeholder="Ksatria Batang Hitam" id="nama">
        <label for="email">Email</label>
        <label for="phone">Kelas</label>
        <input type="text" name="email" placeholder="konakterus@example.com" id="email">
        <input type="text" name="kelas" placeholder="3IA00" id="kelas">
        <label for="title">NPM</label>
        <label for="created">Created</label>
        <input type="text" name="npm" placeholder="50042069" id="npm">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>