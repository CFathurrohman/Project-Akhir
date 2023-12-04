<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/transition.css">
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-6 g-4">
        <?php foreach ($data['buku'] as $buku) : ?>
            <div class="transition">
            <div class="col">
                <div class="card">
                    <img src="<?= $buku['gambar_buku']; ?>" class="card-img-top" alt="" style="width: 195px; height: 300px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['nama_buku']; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted"><?= $buku['nama_kategori']; ?></small>
                            </li>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['penulis']; ?></small>
                            </li>
                            <li class="list-group-item"><small class="text-muted"><?= $buku['tahun_terbit']; ?></small>
                            </li>
                        </ul>
                        <div class="card-body text-end">
                            <a href="<?= BASEURL; ?>/buku/read/<?= $buku['id']; ?>" class="btn btn-outline-info">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

