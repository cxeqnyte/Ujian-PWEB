<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
        $npm = isset($_POST['npm']) ? $_POST['npm'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        $stmt = $pdo->prepare('UPDATE ujian SET id = ?, nama = ?, email = ?, kelas = ?, npm = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $email, $kelas, $npm, $created, $_GET['id']]);
        $msg = 'Berhasil Diperbarui!';
    }
    $stmt = $pdo->prepare('SELECT * FROM ujian WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Peserta dengan ID itu tidak ada!');
    }
} else {
    exit('ID tidak dispesifikasi!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Memperbarui Peserta #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" placeholder="Ksatria Batang Hitam" value="<?=$contact['nama']?>" id="nama">
        <label for="email">Email</label>
        <label for="phone">Kelas</label>
        <input type="text" name="email" placeholder="konakterus@example.com" value="<?=$contact['email']?>" id="email">
        <input type="text" name="kelas" placeholder="3IA00" value="<?=$contact['kelas']?>" id="kelas">
        <label for="title">NPM</label>
        <label for="created">Created</label>
        <input type="text" name="npm" placeholder="50042069" value="<?=$contact['npm']?>" id="npm">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>