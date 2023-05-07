<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url("siswa"); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/materi"); ?>">Mata Pelajaran</a></div>
                <div class="breadcrumb-item"><a href="<?= site_url("siswa/submateri/" . $submateri['id_materi']); ?>">Materi</a></div>
                <div class="breadcrumb-item">Media</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Latihan</h2>
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h6>Setelah belajar melalui media yang kamu pilih, lanjutkan pembelajaran dengan menyelesaikan latihan!</h6>
                        </div>
                        <div class="card-footer text-left">
                            <a href="<?= site_url('siswa/latihan' . '/' . $id_submateri); ?>"><button class="btn btn-primary">Mulai Latihan</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="section-title">Daftar Media</h2>
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h6>Silahkan pilih media yang ingin anda gunakan untuk belajar</h6>
                        </div>
                        <select class="form-control" id="detail_media" name="detail_media">
                            <option disabled selected>Klik Disini Untuk Pilih Media</option>
                            <option value="pdf">PDF</option>
                            <option value="ppt">PPT</option>
                            <option value="video">VIDEO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="pakai_media" class="col-auto">
            <div id='tutorial-pdf-responsive' class='custom1'>
                <div class='custom2'>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('detail_media').addEventListener('change', function() {
                fetch("<?= base_url('siswa/detail_media/' . $id_submateri . '/') ?>" + this.value, {
                    fetch("<?= base_url('siswa/detail_media/' . $id_submateri . '/') ?>" + this.value, {
                        method: 'GET',
                    }).then((response) => response.text())
                    .then((data) => {
                        document.getElementById('pakai_media').innerHTML = data
                    })
                })
</script>