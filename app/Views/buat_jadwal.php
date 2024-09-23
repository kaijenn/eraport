<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Buat Jadwal</h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form class="form-sample" action="<?= base_url('home/aksi_t_jadwal') ?>" method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Blok</label>
                    <select class="form-control" name="id_blok" required>
                      <option value="">Pilih Blok</option>
                      <?php foreach ($blok as $key): ?>
                        <option value="<?= $key->id_blok ?>"><?= $key->nama_blok ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Rombel</label>
                    <select class="form-control" name="id_rombel" required>
                      <option value="">Pilih Rombel</option>
                      <?php foreach ($rombel as $r): ?>
                        <option value="<?= $r->id_rombel ?>"><?= $r->nama_rombel ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Tahun Ajaran</label>
                    <select class="form-control" name="id_tahun_ajaran" required>
                      <option value="">Pilih Tahun Ajaran</option>
                      <?php foreach ($tahun_ajaran as $ta): ?>
                        <option value="<?= $ta->id_tahun_ajaran ?>"><?= $ta->tahun_ajaran ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Session fields aligned horizontally -->
              <div class="row vertical-align">
                <div class="col-md-12">
                  <!-- Repeat for each session (1 to 5) -->
                  <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="form-group row">
                      <label class="col-sm-1 col-form-label">Sesi <?= $i ?></label>
                      <div class="col-sm-5">
                        <select class="form-control" name="guru<?= $i ?>" required>
                          <option value="">Pilih Guru Sesi <?= $i ?></option>
                          <?php foreach ($guru as $g): ?>
                            <option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-5">
                        <select class="form-control" name="mapel<?= $i ?>" required>
                          <option value="">Pilih Mapel Sesi <?= $i ?></option>
                          <?php foreach ($mapel as $m): ?>
                            <option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  <?php endfor; ?>
                </div>
              </div>

              <button type="submit" class="btn btn-warning">Simpan Jadwal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Custom CSS to align the form fields -->
<style>
  .vertical-align .form-group.row {
    margin-bottom: 10px; /* Adjust spacing between fields */
  }
</style>
