      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Tahun Ajaran</h3>
              
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">TAHUN AJARAN</h4>
                    <a class="nav-link text-Headings my-2" href="#" data-toggle="modal" data-target="#tambahPaketModal">
    <span class="mdi mdi-plus"></span> Tambah Tahun Ajaran
</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            
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
                  <td><?= $key->tahun_ajaran?></td>
                 
                  
                  <td>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" onclick="editPaket(<?= $key->id_tahun_ajaran ?>, '<?= $key->tahun_ajaran ?>')">
                    Edit
                </button>
                <a href="<?= base_url('home/hapus_tahun_ajaran/' . $key->id_tahun_ajaran) ?>">
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
        <h5 class="modal-title">Edit Tahun Ajaran</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_tahun_ajaran') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" id="id_tahun_ajaran" name="id_tahun_ajaran">
          <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
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
        <h5 class="modal-title">Tambah Tahun Ajaran</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="tambahPaketForm" action="<?= base_url('home/aksi_t_tahun_ajaran') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
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
  function editPaket(id, nama) {
    document.getElementById('id_tahun_ajaran').value = id;
    document.getElementById('tahun_ajaran').value = nama;
   
  }
</script>