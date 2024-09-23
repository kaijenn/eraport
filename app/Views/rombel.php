      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Rombel</h3>
              
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ROMBEL SPH</h4>
                    <a class="nav-link text-Headings my-2" href="#" data-toggle="modal" data-target="#tambahPaketModal">
    <span class="mdi mdi-plus"></span> Tambah Rombel
</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Rombel</th>
                            <th>Nama Kelas</th>
                            <th>Nama Jurusan</th>
                            
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
                  <td><?= $key->nama_rombel?></td>
                  <td><?= $key->nama_kelas?></td>
                  <td><?= $key->nama_jurusan?></td>
                  
                  <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" 
        onclick="editPaket(<?= $key->id_rombel ?>, '<?= $key->nama_rombel ?>', <?= $key->id_kelas ?>, <?= $key->id_jurusan ?>)">
    Edit
</button>

<a href="<?= base_url('home/hapus_rombel/' . $key->id_rombel) ?>">
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

          <!-- Edit Modal -->
          <div class="modal fade" id="editPaketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Rombel</h5> <!-- Updated the title for clarity -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_rombel') ?>" method="post"> <!-- Ensure the action points to aksi_e_rombel -->
        <div class="modal-body">
          <input type="hidden" id="id_rombel" name="id_rombel">

          <!-- Nama Rombel Input -->
          <div class="form-group">
            <label for="nama_rombel">Nama Rombel</label>
            <input type="text" class="form-control" id="nama_rombel" name="nama_rombel" required>
          </div>

          <!-- Kelas Dropdown -->
          <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <select class="form-control" id="id_kelas" name="id_kelas" required>
              <option value="">Pilih Kelas</option>
              <?php foreach ($kelas as $key): ?>
                <option value="<?= $key->id_kelas ?>" <?= isset($current_kelas) && $current_kelas == $key->id_kelas ? 'selected' : '' ?>>
                  <?= $key->nama_kelas ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Jurusan Dropdown -->
          <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <select class="form-control" id="id_jurusan" name="id_jurusan" required>
              <option value="">Pilih Jurusan</option>
              <?php foreach ($jurusan as $key): ?>
                <option value="<?= $key->id_jurusan ?>" <?= isset($current_jurusan) && $current_jurusan == $key->id_jurusan ? 'selected' : '' ?>>
                  <?= $key->nama_jurusan ?>
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
<<div class="modal fade" id="tambahPaketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Rombel</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="tambahPaketForm" action="<?= base_url('home/aksi_t_rombel') ?>" method="post">
        <div class="modal-body">
          <!-- Nama Rombel Input -->
          <div class="form-group">
            <label for="nama_rombel">Nama Rombel</label>
            <input type="text" class="form-control" id="nama_rombel" name="nama_rombel" required>
          </div>
          
          <!-- Kelas Dropdown -->
          <div class="form-group">
            <label for="inputKelas">Kelas</label>
            <select class="form-control" name="id_kelas" required>
              <option value="">Pilih Kelas</option>
              <?php foreach ($kelas as $key): ?>
                <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Jurusan Dropdown -->
          <div class="form-group">
            <label for="inputJurusan">Jurusan</label>
            <select class="form-control" name="id_jurusan" required>
              <option value="">Pilih Jurusan</option>
              <?php foreach ($jurusan as $key): ?>
                <option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
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

</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Optional: Popper.js for Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script>
  function editPaket(id_rombel, nama_rombel, id_kelas, id_jurusan) {
    document.getElementById('id_rombel').value = id_rombel;
    document.getElementById('nama_rombel').value = nama_rombel; // Set the current Nama Rombel
    document.getElementById('id_kelas').value = id_kelas;       // Set the selected Kelas
    document.getElementById('id_jurusan').value = id_jurusan;   // Set the selected Jurusan
  }
</script>

