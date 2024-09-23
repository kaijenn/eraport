      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Guru</h3>
              
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">GURU GURU SPH</h4>
                    <a class="nav-link text-Headings my-2" href="#" data-toggle="modal" data-target="#tambahPaketModal">
    <span class="mdi mdi-plus"></span> Tambah Guru
</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
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
                  <td><?= $key->nama_guru?></td>
                  <td><?= $key->nik?></td>
                  <td><?= $key->jenis_kelamin?></td>
                  
                  <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" onclick="editPaket(<?= $key->id_guru ?>, '<?= $key->nama_guru ?>', '<?= $key->nik ?>', '<?= $key->jenis_kelamin ?>')">

                    Edit
                </button>
                <a href="<?= base_url('home/hapus_guru/' . $key->id_guru) ?>">
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
        <h5 class="modal-title">Edit Guru</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_guru') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="id_guru" name="id_guru">
          <div class="form-group">
            <label for="nama_guru">Nama Guru</label>
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
          </div>
          <div class="form-group">
            <label for="jkelamin">Jenis Kelamin</label>
            <select class="form-control" id="jkelamin" name="jkelamin" required>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <h5 class="modal-title">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="tambahPaketForm" action="<?= base_url('home/aksi_t_guru') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_guru">Nama Guru</label>
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
          </div>
          <div class="form-group">
  <label for="jkelamin">Jenis Kelamin</label>
  <select class="form-control" id="jkelamin" name="jkelamin" required>
    <option value="Pria">Pria</option>
    <option value="Wanita">Wanita</option>
  </select>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  function editPaket(id, nama, nik, jenis_kelamin) {
    document.getElementById('id_guru').value = id;
    document.getElementById('nama_guru').value = nama;
    document.getElementById('nik').value = nik;
    document.getElementById('jkelamin').value = jenis_kelamin;
  }
</script>