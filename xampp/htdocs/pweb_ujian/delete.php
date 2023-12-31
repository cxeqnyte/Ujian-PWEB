<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM ujian WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Peserta dengan ID itu tidak ada!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM ujian WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Peserta itu telah dihapus!';
        } else {
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('ID tidak dispesifikasi!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Menghapus Peserta #<?=$contact['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apa Anda yakin ingin menghapus peserta #<?=$contact['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Ya</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">Tidak</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>