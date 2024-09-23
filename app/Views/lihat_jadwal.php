<div class="main-panel">
    <div class="content-wrapper">
        <div class="pagetitle">
            <h1>Tampil Jadwal</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Tampil Jadwal</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rombel">Rombel</label>
                            <select class="form-control" name="rombel" id="rombel">
                                <option value="">Pilih</option>
                                <?php foreach ($erwin as $key): ?>
                                    <option value="<?= $key->id_rombel ?>"><?= $key->nama_rombel ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blok">Blok</label>
                            <select class="form-control" name="blok" id="blok">
                                <option value="">Pilih</option>
                                <?php foreach ($yoga as $key): ?>
                                    <option value="<?= $key->id_blok ?>"><?= $key->nama_blok ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">Pilih</option>
                                <?php foreach ($yoga1 as $key): ?>
                                    <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php
      if (session()->get('status') == 'admin'){
        ?>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn btn-danger" id="hapusJadwal">Hapus Jadwal</button>
                            </div>
                            <?php 
      } else {

      }
?>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="card shadow mb-4">
                                <table class="table align-items-center table-flush" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-14">Sesi</th>
                                            <th class="font-14">Mata Pelajaran</th>
                                            <th class="font-14">Nama Guru</th>
                                            <th class="font-14">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jadwalBody">
                                        <!-- Schedule data will be loaded here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col-12 -->
        </div>
    </div> <!-- /.row -->
</div> <!-- /.content-wrapper -->
<?php
      if (session()->get('status') == 'admin'){
        ?>
<!-- Edit Jadwal Modal -->
<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editJadwalForm" action="<?= base_url('home/aksi_e_jadwal') ?>" method="post">
                    <input type="hidden" id="edit_id_jadwal" name="edit_id_jadwal">
                    <div class="form-group">
                        <label for="edit_sesi">Sesi</label>
                        <input type="text" class="form-control" id="edit_sesi" name="edit_sesi" readonly>
                    </div>
                    <div class="form-group">
                        <label for="id_mapel">Nama mapel</label>
                        <select class="form-control" id="id_mapel" name="id_mapel" required>
                            <option value="">Pilih mapel</option> <!-- Opsi default -->
                            <?php foreach ($mapel as $key): ?>
                                <option value="<?= $key->id_mapel ?>" <?= (isset($current_mapel) && $current_mapel == $key->id_mapel) ? 'selected' : '' ?>>
                                    <?= $key->nama_mapel ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_guru">Nama guru</label>
                        <select class="form-control" id="id_guru" name="id_guru" required>
                            <option value="">Pilih guru</option> <!-- Opsi default -->
                            <?php foreach ($guru as $key): ?>
                                <option value="<?= $key->id_guru ?>" <?= (isset($current_guru) && $current_guru == $key->id_guru) ? 'selected' : '' ?>>
                                    <?= $key->nama_guru ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveEdit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
      } else {

      }
?>


<!-- Include JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#rombel, #blok, #tahun_ajaran').change(function() {
            var id_rombel = $('#rombel').val();
            var id_blok = $('#blok').val();
            var id_tahun_ajaran = $('#tahun_ajaran').val();

            if (id_rombel && id_blok && id_tahun_ajaran) {
                $.ajax({
                    url: '<?= base_url('home/getData') ?>',
                    type: 'POST',
                    data: {
                        rombel: id_rombel,
                        blok: id_blok,
                        tahun_ajaran: id_tahun_ajaran
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#jadwalBody').empty();
                        $.each(response, function(index, jadwal) {
                            $('#jadwalBody').append(
    '<tr>' +
    '<td>' + jadwal.sesi + '</td>' +
    '<td>' + jadwal.nama_mapel + '</td>' +
    '<td>' + jadwal.nama_guru + '</td>' +
    '<td><button class="btn btn-warning btn-edit" data-id="' + jadwal.id_jadwal + '" data-sesi="' + jadwal.sesi + '" data-id_mapel="' + jadwal.id_mapel + '" data-id_guru="' + jadwal.id_guru + '">Edit</button></td>' +
    '</tr>'
);

                        });

                        // Add event listener for edit buttons
                        $('.btn-edit').click(function() {
    var id_jadwal = $(this).data('id');
    var sesi = $(this).data('sesi');
    var current_mapel = $(this).data('id_mapel'); // Pastikan ini ID mapel
    var current_guru = $(this).data('id_guru'); // Pastikan ini ID guru
    showEditPopup(id_jadwal, sesi, current_mapel, current_guru);
});

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error: ' + textStatus + ' : ' + errorThrown);
                    }
                });
            } else {
                $('#jadwalBody').html('<tr><td colspan="4" class="text-center">Silakan pilih semua filter.</td></tr>');
            }
        });

        $('#hapusJadwal').click(function() {
            var id_rombel = $('#rombel').val();
            var id_blok = $('#blok').val();
            var id_tahun_ajaran = $('#tahun_ajaran').val();

            if (id_rombel && id_blok && id_tahun_ajaran) {
                if (confirm('Apakah Anda yakin ingin menghapus semua jadwal untuk rombel ' + id_rombel + ' dan blok ' + id_blok + ' dan tahun ajaran ' + id_tahun_ajaran + '?')) {
                    $.ajax({
                        url: '<?= base_url('home/hapus_jadwal') ?>',
                        type: 'POST',
                        data: {
                            id_rombel: id_rombel,
                            id_blok: id_blok,
                            id_tahun_ajaran: id_tahun_ajaran
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                alert('Jadwal berhasil dihapus.');
                                $('#rombel, #blok, #tahun_ajaran').trigger('change'); // Refresh jadwal
                            } else {
                                alert('Gagal menghapus jadwal.');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('AJAX Error: ' + textStatus + ' : ' + errorThrown);
                        }
                    });
                }
            } else {
                alert('Pilih rombel, blok, dan tahun ajaran terlebih dahulu.');
            }
        });

        function showEditPopup(id_jadwal, sesi, id_mapel, id_guru) {
    $('#edit_id_jadwal').val(id_jadwal);
    $('#edit_sesi').val(sesi);
    
    // Set id_mapel dan id_guru untuk ditandai sebagai selected
    $('#id_mapel').val(id_mapel); // Set id_mapel yang dipilih
    $('#id_guru').val(id_guru); // Set id_guru yang dipilih
    console.log("ID Jadwal:", id_jadwal);
    console.log("Sesi:", sesi);
    console.log("ID Mapel:", id_mapel);
    console.log("ID Guru:", id_guru);
    $('#editJadwalModal').modal('show');
}


        $('#saveEdit').click(function() {
            var id_jadwal = $('#edit_id_jadwal').val();
            var sesi = $('#edit_sesi').val();
            var nama_mapel = $('#id_mapel').val();
            var nama_guru = $('#id_guru').val();

            $.ajax({
                url: '<?= base_url('home/update_jadwal') ?>',
                type: 'POST',
                data: {
                    id_jadwal: id_jadwal,
                    sesi: sesi,
                    id_mapel: nama_mapel,
                    id_guru: nama_guru
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Jadwal berhasil diperbarui.');
                        $('#editJadwalModal').modal('hide');
                        $('#rombel, #blok, #tahun_ajaran').trigger('change'); // Refresh jadwal
                    } else {
                        alert('Gagal memperbarui jadwal.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error: ' + textStatus + ' : ' + errorThrown);
                }
            });
        });
    });
</script>
