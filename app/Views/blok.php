      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Blok</h3>
              
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">BLOK SPH</h4>
                    <a class="nav-link text-Headings my-2" href="#" data-toggle="modal" data-target="#tambahPaketModal">
    <span class="mdi mdi-plus"></span> Tambah Blok
</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Blok</th>
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
                  <td><?= $key->nama_blok?></td>
                  
                  
                  <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" onclick="editPaket(<?= $key->id_blok ?>, '<?= $key->nama_blok ?>')">
                    Edit
                </button>
                <a href="<?= base_url('home/hapus_blok/' . $key->id_blok) ?>">
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
        <h5 class="modal-title">Edit Blok</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_blok') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="id_blok" name="id_blok">
          <div class="form-group">
            <label for="nama_blok">Nama blok</label>
            <input type="text" class="form-control" id="nama_blok" name="nama_blok" required>
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
        <h5 class="modal-title">Tambah Blok</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="tambahPaketForm" action="<?= base_url('home/aksi_t_blok') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_blok">Nama Blok</label>
            <input type="text" class="form-control" id="nama_blok" name="nama_blok" required>
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
  function editPaket(id, nama) {
  document.getElementById('id_blok').value = id;
  document.getElementById('nama_blok').value = nama;
}

</script>