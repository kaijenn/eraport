      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Siswa</h3>
              
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">SISWA SPH</h4>
                    <a class="nav-link text-Headings my-2" href="#" data-toggle="modal" data-target="#tambahPaketModal">
    <span class="mdi mdi-plus"></span> Tambah Siswa
</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Rombel</th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
              $no = 1;
              foreach ($yoga as $key) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key->nama_siswa?></td>
                  <td><?= $key->nis?></td>
                  <td><?= $key->tgl_lahir?></td>
                  <td><?= $key->nama_rombel?></td>
                  
                  <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" 
    onclick="editPaket(<?= $key->id_siswa ?>, '<?= $key->nama_siswa ?>', '<?= $key->nis ?>', '<?= $key->tgl_lahir ?>', '<?= $key->id_rombel ?>')">
    Edit
</button>

<a href="<?= base_url('home/hapus_siswa/' . $key->id_siswa) ?>">
                    <button class="btn btn-warning">
                      <i class="now-ui-icons ui-1_check"></i> Hapus
                    </button>
                  </a>

			            
			          </td>	
                  <td>
		        </td>
                </tr>
              <?php } ?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          </div>

          <div class="modal fade" id="editPaketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_siswa') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="id_siswa" name="id_siswa">
          <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
          </div>
          <div class="form-group">
            <label for="nama_jurusan">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" required>
          </div>
          <div class="form-group">
            <label for="nama_jurusan">Tanggal Lahir</label>
            <input type="text" class="form-control" id="tgllahir" name="tgllahir" required>
          </div>
          <div class="form-group">
    <label for="nama_rombel">Nama Rombel</label>
    <select class="form-control" id="nama_rombel" name="nama_rombel" required>
        <?php foreach ($rombel as $r) : ?>
            <option value="<?= $r->id_rombel ?>" <?= (isset($selected_rombel) && $selected_rombel == $r->id_rombel) ? 'selected' : '' ?>>
                <?= $r->nama_rombel ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Tambah Guru -->
<div class="modal fade" id="tambahPaketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="tambahPaketForm" action="<?= base_url('home/aksi_t_siswa') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
          </div>
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" required>
          </div>
          <div class="form-group">
            <label for="tgllahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
          </div>
          <div class="form-group">
    <label for="nama_rombel">Nama Rombel</label>
    <select class="form-control" id="nama_rombel" name="nama_rombel" required>
        <option value="">Pilih Rombel</option>
        <?php foreach ($rombel as $r) : ?>
            <option value="<?= $r->id_rombel ?>"><?= $r->nama_rombel ?></option>
        <?php endforeach; ?>
    </select>
</div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Optional: Popper.js for Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script>
function editPaket(id_siswa, nama_siswa, nis, tgllahir, nama_rombel) {
    document.getElementById('id_siswa').value = id_siswa;
    document.getElementById('nama_siswa').value = nama_siswa;
    document.getElementById('nis').value = nis;
    document.getElementById('tgllahir').value = tgllahir;

    // Set the selected value for the select element
    var selectElement = document.getElementById('nama_rombel');
    selectElement.value = nama_rombel;
}


</script>