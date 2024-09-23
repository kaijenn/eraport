<?php

namespace App\Controllers;
use App\Models\M_raport;
use TCPDF\TCPDF;

class Home extends BaseController
{
	public function dashboard()
	{
        $model = new M_raport;
        $session = session();
        $data['username'] = $session->get('username');
        $model = new M_raport;
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('dashboard', $data);
		echo view('footer');
	}

    public function login()
	{

        $model = new M_raport;
        
        $id_user = session()->get('id');
        
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        
        
		echo view ('header', $data);
		echo view('login');
		
	}
	public function aksi_login()
{
    $yo = $this->request->getPost('username');
    $ga = $this->request->getPost('password');

    $captcha_response = $this->request->getPost('g-recaptcha-response');
        $backup_captcha = $this->request->getPost('backup_captcha');

        if (empty($captcha_response) && empty($backup_captcha)) {
            return redirect()->to('home/login')->with('error', 'CAPTCHA is required.');
        }

        // Validate reCAPTCHA
        if (!empty($captcha_response)) {
            $secret_key = '6LcjvksqAAAAAABnqX1dQuBRlaK4ar8k2kNtHNV0';
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha_response");
            $response_keys = json_decode($response, true);

            if (intval($response_keys["success"]) !== 1) {
                return redirect()->to('home/login')->with('error', 'reCAPTCHA validation failed.');
            }
        }

        // Validate offline CAPTCHA
        if (!empty($backup_captcha)) {
            // Validate the backup CAPTCHA here (e.g., by checking against a stored value or a generated value)
            // Assuming validateOfflineCaptcha is a method that verifies the backup CAPTCHA
            if (!$this->validateOfflineCaptcha($backup_captcha)) {
                return redirect()->to('home/login')->with('error', 'Offline CAPTCHA validation failed.');
            }
        }

    $where = array(
        'username' => $yo,
        'password' => md5($ga),
    );

    $model = new M_raport();
    $check = $model->getWhere('user', $where);
	if ($check > 0) {
        session()->set('username', $check->username);
        session()->set('id', $check->id_user);
        session()->set('status', $check->status);
        return redirect()->to('home/dashboard');
    } else {
        return redirect()->to('home/login');
    }
}

private function validateOfflineCaptcha($captchaInput)
    {
        // Ambil CAPTCHA yang disimpan di session
        $storedCaptcha = session()->get('captcha_code');

        // Bandingkan input pengguna dengan CAPTCHA yang disimpan (peka huruf besar/kecil)
        return $captchaInput === $storedCaptcha;
    }
    public function generateCaptcha()
    {
        $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        // Store the CAPTCHA code in the session
        session()->set('captcha_code', $code);

        // Generate the image
        $image = imagecreatetruecolor(120, 40);
        $bgColor = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);
        imagestring($image, 5, 10, 10, $code, $textColor);

        // Set the content type header - in this case image/png
        header('Content-Type: image/png');

        // Output the image
        imagepng($image);

        // Free up memory
        imagedestroy($image);
    }


    public function logout()

    {
        session()->destroy();
        return redirect()->to('home/login');
    }
	public function guru()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('guru');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('guru', $data);
		echo view('footer');
	}



	public function aksi_t_guru()
    {
        $yoga = $this->request->getPost('nama_guru');
        $cahya = $this->request->getPost('nik');
        $oga = $this->request->getPost('jkelamin');
     

        $darren = array(
            'nama_guru' => $yoga,
            'nik' => $cahya,
            'jenis_kelamin' => $oga,
            



        );
        $model = new M_raport;
        $model->tambah('guru', $darren);
        return redirect()->to('home/guru');
    }

	public function aksi_e_guru()
{
    $model = new M_raport();
    $nama_guru = $this->request->getPost('nama_guru');
    $nik = $this->request->getPost('nik');
    $jenis_kelamin = $this->request->getPost('jkelamin');
    $id = $this->request->getPost('id_guru'); // Ensure this matches the form input name

    $where = array('id_guru' => $id);

    $isi = array(
        'nama_guru' => $nama_guru,
        'nik' => $nik,
        'jenis_kelamin' => $jenis_kelamin,
    );

    $model->edit('guru', $isi, $where);

    return redirect()->to('home/guru');
}

public function hapus_guru($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_guru' => $id);
    $model->hapus('guru', $where);

    return redirect()->to('Home/guru');
}

public function mapel()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('mapel');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('mapel', $data);
		echo view('footer');
	}



	public function aksi_t_mapel()
    {
        $yoga = $this->request->getPost('nama_mapel');
      
     

        $darren = array(
            'nama_mapel' => $yoga,
            'kkm' => '75',
            



        );
        $model = new M_raport;
        $model->tambah('mapel', $darren);
        return redirect()->to('home/mapel');
    }

	public function aksi_e_mapel()
{
    $model = new M_raport();
    $nama_mapel = $this->request->getPost('nama_mapel');
    $nik = $this->request->getPost('nik');
    $jenis_kelamin = $this->request->getPost('jkelamin');
    $id = $this->request->getPost('id_mapel'); // Ensure this matches the form input name

    $where = array('id_mapel' => $id);

    $isi = array(
        'nama_mapel' => $nama_mapel,
        'nik' => $nik,
        'jenis_kelamin' => $jenis_kelamin,
    );

    $model->edit('mapel', $isi, $where);

    return redirect()->to('home/mapel');
}
public function hapus_mapel($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_mapel' => $id);
    $model->hapus('mapel', $where);

    return redirect()->to('Home/mapel');
}

public function kelas()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('kelas');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('kelas', $data);
		echo view('footer');
	}



	public function aksi_t_kelas()
    {
        $yoga = $this->request->getPost('nama_kelas');
        $cahya = $this->request->getPost('nik');
        $oga = $this->request->getPost('jkelamin');
     

        $darren = array(
            'nama_kelas' => $yoga,
            'nik' => $cahya,
            'jenis_kelamin' => $oga,
            



        );
        $model = new M_raport;
        $model->tambah('kelas', $darren);
        return redirect()->to('home/kelas');
    }

	public function aksi_e_kelas()
{
    $model = new M_raport();
    $nama_kelas = $this->request->getPost('nama_kelas');
   
    $id = $this->request->getPost('id_kelas'); // Ensure this matches the form input name

    $where = array('id_kelas' => $id);

    $isi = array(
        'nama_kelas' => $nama_kelas,
      
    );

    $model->edit('kelas', $isi, $where);

    return redirect()->to('home/kelas');
}
public function hapus_kelas($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_kelas' => $id);
    $model->hapus('kelas', $where);

    return redirect()->to('Home/kelas');
}

public function jurusan()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('jurusan');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('jurusan', $data);
		echo view('footer');
	}



	public function aksi_t_jurusan()
    {
        $yoga = $this->request->getPost('nama_jurusan');
       
     

        $darren = array(
            'nama_jurusan' => $yoga,
           
            



        );
        $model = new M_raport;
        $model->tambah('jurusan', $darren);
        return redirect()->to('home/jurusan');
    }

	public function aksi_e_jurusan()
{
    $model = new M_raport();
    $nama_jurusan = $this->request->getPost('nama_jurusan');
    
    $id = $this->request->getPost('id_jurusan'); // Ensure this matches the form input name

    $where = array('id_jurusan' => $id);

    $isi = array(
        'nama_jurusan' => $nama_jurusan,
       
    );

    $model->edit('jurusan', $isi, $where);

    return redirect()->to('home/jurusan');
}
public function hapus_jurusan($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_jurusan' => $id);
    $model->hapus('jurusan', $where);

    return redirect()->to('Home/jurusan');
}


public function rombel()
	{
		$model = new M_raport;
        $data['kelas'] = $model->tampil('kelas');
        $data['jurusan'] = $model->tampil('jurusan');
        $data['yoga'] = $model->join3tbl(
            'rombel',
            'kelas',
            'jurusan',
            'rombel.id_kelas=kelas.id_kelas',
            'rombel.id_jurusan=jurusan.id_jurusan'
            
        );
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();
        
        
		echo view('header', $data);
		echo view('menu');
		echo view('rombel', $data);
		echo view('footer');
	}



	public function aksi_t_rombel()
{
    $nama_rombel = $this->request->getPost('nama_rombel');
    $id_kelas = $this->request->getPost('id_kelas');
    $id_jurusan = $this->request->getPost('id_jurusan');

    $data = array(
        'nama_rombel' => $nama_rombel,
        'id_kelas' => $id_kelas,
        'id_jurusan' => $id_jurusan,
    );

    $model = new M_raport();
    $model->tambah('rombel', $data);

    return redirect()->to('home/rombel');
}


	public function aksi_e_rombel()
{
    $model = new M_raport();  // Assuming M_raport is your model class

    // Get form data
    $id_rombel = $this->request->getPost('id_rombel');  // Ensure this matches the form input name
    $nama_rombel = $this->request->getPost('nama_rombel');
    $id_kelas = $this->request->getPost('id_kelas');    // Get selected kelas ID from dropdown
    $id_jurusan = $this->request->getPost('id_jurusan'); // Get selected jurusan ID from dropdown

    // Define where condition
    $where = ['id_rombel' => $id_rombel];

    // Define data to update
    $isi = [
        'nama_rombel' => $nama_rombel,
        'id_kelas' => $id_kelas,      // Update id_kelas
        'id_jurusan' => $id_jurusan,  // Update id_jurusan
    ];

    // Perform the update operation
    $model->edit('rombel', $isi, $where);

    // Redirect back to the rombel page
    return redirect()->to('home/rombel')->with('success', 'Rombel updated successfully');
}

public function hapus_rombel($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_rombel' => $id);
    $model->hapus('rombel', $where);

    return redirect()->to('Home/rombel');
}


public function siswa()
{
    $model = new M_raport;
    $data['yoga'] = $model->join1tbl('siswa', 'rombel', 'siswa.id_rombel=rombel.id_rombel');
    $data['rombel'] = $model->tampil('rombel');

    // Assuming you have a way to get the selected rombel id for editing
    $data['selected_rombel'] = $this->request->getPost('id_rombel') ?: ''; // Default to '' if not set
    $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

    echo view('header', $data);
    echo view('menu');
    echo view('siswa', $data);
    echo view('footer');
}





	public function aksi_t_siswa()
    {
        $yoga = $this->request->getPost('nama_siswa');
        $yoga1 = $this->request->getPost('nis');
        $yoga2 = $this->request->getPost('tgllahir');
        $yoga3 = $this->request->getPost('nama_rombel');
       
     

        $darren = array(
            'nama_siswa' => $yoga,
            'nis' => $yoga1,
            'tgl_lahir' => $yoga2,
            'id_rombel' => $yoga3,
           
            



        );
        $model = new M_raport;
        $model->tambah('siswa', $darren);
        return redirect()->to('home/siswa');
    }

	public function aksi_e_siswa()
{
    $model = new M_raport();
    $nama_siswa = $this->request->getPost('nama_siswa');
    $nis = $this->request->getPost('nis');
    $tgl_lahir = $this->request->getPost('tgllahir');
    $id_rombel = $this->request->getPost('nama_rombel'); // Ensure this is the ID of rombel
    $id = $this->request->getPost('id_siswa'); 

    $where = array('id_siswa' => $id);

    $isi = array(
        'nama_siswa' => $nama_siswa,
        'nis' => $nis,
        'tgl_lahir' => $tgl_lahir,
        'id_rombel' => $id_rombel,
    );

    $model->edit('siswa', $isi, $where);

    // Redirect to the 'home/siswa' page with the updated information
    return redirect()->to('home/siswa');
}
public function hapus_siswa($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_siswa' => $id);
    $model->hapus('siswa', $where);

    return redirect()->to('Home/siswa');
}
public function blok()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('blok');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('blok', $data);
		echo view('footer');
	}



	public function aksi_t_blok()
    {
        $yoga = $this->request->getPost('nama_blok');
    
        $darren = array(
            'nama_blok' => $yoga,
       
            



        );
        $model = new M_raport;
        $model->tambah('blok', $darren);
        return redirect()->to('home/blok');
    }

	public function aksi_e_blok()
{
    $model = new M_raport();
    $nama_blok = $this->request->getPost('nama_blok');
    $id = $this->request->getPost('id_blok'); // Ensure this matches the form input name

    $where = array('id_blok' => $id);

    $isi = array(
        'nama_blok' => $nama_blok,
     
    );

    $model->edit('blok', $isi, $where);

    return redirect()->to('home/blok');
}
public function hapus_blok($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_blok' => $id);
    $model->hapus('blok', $where);

    return redirect()->to('Home/blok');
}

public function tahun_ajaran()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('tahun_ajaran');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('tahun_ajaran', $data);
		echo view('footer');
	}



	public function aksi_t_tahun_ajaran()
    {
        $yoga = $this->request->getPost('tahun_ajaran');
       
     

        $darren = array(
            
            'tahun_ajaran' => $yoga,
          
        );


        $model = new M_raport;
        $model->tambah('tahun_ajaran', $darren);
        return redirect()->to('home/tahun_ajaran');
    }

	public function aksi_e_tahun_ajaran()
{
    $model = new M_raport();
    $tahun_ajaran = $this->request->getPost('tahun_ajaran');
    $id = $this->request->getPost('id_tahun_ajaran'); // Ensure this matches the form input name

    $where = array('id_tahun_ajaran' => $id);

    $isi = array(
        'tahun_ajaran' => $tahun_ajaran,
      
    );

    $model->edit('tahun_ajaran', $isi, $where);

    return redirect()->to('home/tahun_ajaran');
}
public function hapus_tahun_ajaran($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_tahun_ajaran' => $id);
    $model->hapus('tahun_ajaran', $where);

    return redirect()->to('Home/tahun_ajaran');
}

public function semester()
	{
		$model = new M_raport;
		$data['yoga'] = $model->tampil('semester');
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

		echo view('header', $data);
		echo view('menu');
		echo view('semester', $data);
		echo view('footer');
	}



	public function aksi_t_semester()
    {
        $yoga = $this->request->getPost('semester');
       
     

        $darren = array(
            
            'semester' => $yoga,
          
        );


        $model = new M_raport;
        $model->tambah('semester', $darren);
        return redirect()->to('home/semester');
    }

	public function aksi_e_semester()
{
    $model = new M_raport();
    $semester = $this->request->getPost('semester');
    $id = $this->request->getPost('id_semester'); // Ensure this matches the form input name

    $where = array('id_semester' => $id);

    $isi = array(
        'semester' => $semester,
        
      
    );

    $model->edit('semester', $isi, $where);

    return redirect()->to('home/semester');
}
public function hapus_semester($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_semester' => $id);
    $model->hapus('semester', $where);

    return redirect()->to('Home/semester');
}
public function buat_jadwal()
{
    $model = new M_raport;
    $data['blok'] = $model->tampil('blok');
    $data['rombel'] = $model->tampil('rombel');
    $data['guru'] = $model->tampil('guru');
    $data['mapel'] = $model->tampil('mapel');
    $data['tahun_ajaran'] = $model->tampil('tahun_ajaran'); // Fetch data from the 'tahun_ajaran' table
    $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();



    echo view('header', $data);
    echo view('menu');
    echo view('buat_jadwal', $data);
    echo view('footer');
}


public function aksi_t_jadwal() 
{
    $model = new M_raport;
    
    // Get the 'id_blok', 'id_rombel', and 'id_tahun_ajaran' values from the form
    $id_blok = $this->request->getPost('id_blok');
    $id_rombel = $this->request->getPost('id_rombel');
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');

    // Loop through each session (1 to 5)
    for ($i = 1; $i <= 5; $i++) {
        $id_guru = $this->request->getPost('guru' . $i);
        $id_mapel = $this->request->getPost('mapel' . $i);
        $sesi = $i;

        // Prepare data for each session
        $data = [
            'id_blok' => $id_blok,  // Include id_blok
            'id_rombel' => $id_rombel,
            'id_tahun_ajaran' => $id_tahun_ajaran, // Include id_tahun_ajaran
            'id_guru' => $id_guru,
            'id_mapel' => $id_mapel,
            'sesi' => $sesi
        ];

        // Insert data into the 'jadwal' table
        $model->tambah('jadwal', $data);
    }

    return redirect()->to('home/buat_jadwal');
}


public function lihat_jadwal()
{
    $model = new M_raport(); 
    $where = array('id_user' => session()->get('id'));
  $data['erwin'] = $model->tampil('rombel');
$data['yoga'] = $model->tampil('blok');
$data['yoga1'] = $model->tampil('tahun_ajaran');
$data['mapel'] = $model->tampil('mapel');  // Fetch Mata Pelajaran data
$data['guru'] = $model->tampil('guru');   
$where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

    echo view('header', $data);
    echo view('menu');
    echo view('lihat_jadwal', $data);
    echo view('footer');
}

public function getEditData($id_jadwal)
{
    // Load the model
    $model = new M_raport();

    // Get the specific jadwal
    $jadwal = $model->getJadwalById($id_jadwal);

    // Get all mapel and guru
    $mapel = $model->tampil('mapel'); // Fetch all data from 'mapel' table
    $guru = $model->tampil('guru'); // Fetch all data from 'guru' table

    // Return JSON data
    return $this->response->setJSON([
        'jadwal' => $jadwal,
        'mapel' => $mapel,
        'guru' => $guru
    ]);
}




public function getData()
{
    // Mendapatkan data yang dikirimkan melalui permintaan POST
    $id_rombel = $this->request->getPost('rombel');
    $id_blok = $this->request->getPost('blok');
    $id_tahun_ajaran = $this->request->getPost('tahun_ajaran');

    // Memanggil model untuk mendapatkan data jadwal
    $model = new M_raport();
    $data = $model->getJadwal($id_rombel, $id_blok, $id_tahun_ajaran);

    // Mengembalikan data dalam format JSON
    return $this->response->setJSON($data);
}

public function hapus_jadwal() {
    $id_rombel = $this->request->getPost('id_rombel');
    $id_blok = $this->request->getPost('id_blok');
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');

    // Memanggil model untuk menghapus jadwal
    $model = new M_raport();
    $result = $model->hapus_jadwal($id_rombel, $id_blok, $id_tahun_ajaran);

    // Mengembalikan respons dalam format JSON
    return $this->response->setJSON(['success' => $result]);
}
public function update_jadwal() {
    $id_jadwal = $this->request->getPost('id_jadwal');
    $sesi = $this->request->getPost('sesi');
    $nama_mapel = $this->request->getPost('nama_mapel');
    $nama_guru = $this->request->getPost('nama_guru');

    $model = new M_raport();
    $result = $model->updateJadwal($id_jadwal, $sesi, $nama_mapel, $nama_guru);

    $this->response->setJSON(['success' => $result]);
}

public function edit_jadwal($id_jadwal)
{
    // Inisialisasi model
    $model = new M_raport();

    // Fetch Mata Pelajaran dan Guru dari tabel terkait
    $data['mapel'] = $model->tampil('mapel');  // Mengambil data Mata Pelajaran
    $data['guru'] = $model->tampil('guru');    // Mengambil data Guru

    // Ambil data jadwal berdasarkan ID jadwal yang akan diedit
    $data['jadwal'] = $model->get_jadwal_by_id($id_jadwal);

    // Cek apakah jadwal ditemukan
    if (!$data['jadwal']) {
        // Jika tidak ditemukan, tampilkan error atau redirect
        return redirect()->to('/home/jadwal')->with('error', 'Jadwal tidak ditemukan.');
        
    }
    $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

    // Render views dengan data yang ada
    echo view('header', $data);
    echo view('menu');
    echo view('e_jadwal', $data);  // Mengirim data ke view e_jadwal
    echo view('footer');
}

public function aksi_e_jadwal()
{
    $model = new M_raport(); // Ensure M_raport is your model for 'jadwal' table
    $nama_mapel = $this->request->getPost('id_mapel');
    $nama_guru = $this->request->getPost('id_guru');
    $id_jadwal = $this->request->getPost('edit_id_jadwal'); // Ensure this matches the form input name

    $where = array('id_jadwal' => $id_jadwal);

    $isi = array(
        'id_mapel' => $nama_mapel,
        'id_guru' => $nama_guru,
    );

    $model->edit('jadwal', $isi, $where);

    return redirect()->to('home/lihat_jadwal'); // Redirect to the jadwal view page
}

public function penilaian()
{
    $model = new M_raport;
    $where = array('id_user' => session()->get('id'));
    
    // Get the user-specific penilaian data with joins
    $data['yoga'] = $model->getPenilaianWithJoins($where);
    $data['tahun_ajaran'] = $model->tampil('tahun_ajaran');
    $data['semester'] = $model->tampil('semester');
    $data['blok'] = $model->tampil('blok');
    $data['siswa'] = $model->tampil('siswa');
    $data['mapel'] = $model->tampil('mapel');
    $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

                
    
    // Load the views with the resulting data
    echo view('header', $data);
    echo view('menu');
    echo view('penilaian', $data);
    echo view('footer');
}

    public function tambah_penilaian()
	{
        $model = new M_raport;
		$data['tahun_ajaran'] = $model->tampil('tahun_ajaran');
        $data['semester'] = $model->tampil('semester');
        $data['blok'] = $model->tampil('blok');
        $data['siswa'] = $model->tampil_siswa();
        $data['mapel'] = $model->tampil('mapel');
        $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();


		echo view('header', $data);
		echo view('menu');
		echo view('t_penilaian', $data);
		echo view('footer');
	}

    public function aksi_t_penilaian()
{
    // Get input values from the form
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');
    $id_semester = $this->request->getPost('id_semester');
    $id_blok = $this->request->getPost('id_blok');
    $id_siswa = $this->request->getPost('id_siswa');
    $id_mapel = $this->request->getPost('id_mapel');
    $nilai_tugas = $this->request->getPost('nilaitugas');
    $nilai_midblok = $this->request->getPost('nilaimid');
    $nilai_finalblok = $this->request->getPost('nilaifinal');

    // Get the logged-in user ID from the session
    $id_user = session()->get('id'); // Assuming 'id' is stored in session
    
    // Calculate total nilai (average)
    $total_nilai = ($nilai_tugas + $nilai_midblok + $nilai_finalblok) / 3;

    // Determine predikat based on total nilai
    if ($total_nilai > 92) {
        $predikat = 'A';
    } elseif ($total_nilai > 83) {
        $predikat = 'B';
    } elseif ($total_nilai >= 75) {
        $predikat = 'C';
    } else {
        $predikat = 'D';
    }

    // Prepare data for insertion
    $data = [
        'id_tahun_ajaran' => $id_tahun_ajaran,
        'id_semester' => $id_semester,
        'id_blok' => $id_blok,
        'id_siswa' => $id_siswa,
        'id_mapel' => $id_mapel,
        'nilai_tugas' => $nilai_tugas,
        'nilai_midblok' => $nilai_midblok,
        'nilai_finalblok' => $nilai_finalblok,
        'total_nilai' => $total_nilai, // Include total nilai
        'predikat' => $predikat,       // Include predikat
        'id_user' => $id_user          // Add id_user from session
    ];

    // Insert the data using the model
    $model = new M_raport();
    $inserted = $model->tambah('penilaian', $data);

    // Check if insertion was successful and redirect
    if ($inserted) {
        return redirect()->to('home/penilaian')->with('success', 'Data penilaian berhasil ditambahkan');
    } else {
        return redirect()->to('home/penilaian')->with('error', 'Gagal menambahkan data penilaian');
    }
}

public function aksi_e_penilaian()
{
    $model = new M_raport();
    
    // Retrieve POST data from the form
    $id_penilaian = $this->request->getPost('id_penilaian'); // Ensure this matches the form input name
    $id_tahun_ajaran = $this->request->getPost('id_tahun_ajaran');
    $id_semester = $this->request->getPost('id_semester');
    $id_siswa = $this->request->getPost('id_siswa');
    $id_mapel = $this->request->getPost('id_mapel');
    $nilai_tugas = $this->request->getPost('nilai_tugas');
    $nilai_midblok = $this->request->getPost('nilai_midblok');
    $nilai_finalblok = $this->request->getPost('nilai_finalblok');

    // Prepare the data for updating
    $data = array(
        'id_tahun_ajaran' => $id_tahun_ajaran,
        'id_semester' => $id_semester,
        'id_siswa' => $id_siswa,
        'id_mapel' => $id_mapel,
        'nilai_tugas' => $nilai_tugas,
        'nilai_midblok' => $nilai_midblok,
        'nilai_finalblok' => $nilai_finalblok,
        'total_nilai' => ($nilai_tugas + $nilai_midblok + $nilai_finalblok) / 3 // Calculate total score
    );

    // Define the condition for the update
    $where = array('id_penilaian' => $id_penilaian);

    // Perform the update
    $model->edit('penilaian', $data, $where);

    // Redirect after the update
    return redirect()->to('home/penilaian');
}

public function hapus_penilaian($id)
{
    $model = new M_raport();
    // $this->logUserActivity('Menghapus Pemesanan Permanent');
    $where = array('id_penilaian' => $id);
    $model->hapus('penilaian', $where);

    return redirect()->to('Home/penilaian');
}

public function raport()
{
    $model = new M_raport;
    
    $where = array('id_setting' => '1');
    $data['yogi'] = $model->getWhere1('setting', $where)->getRow();
    // Get the user-specific penilaian data with joins
    $data['siswa'] = $model->tampil_siswa();
    $data['tahun_ajaran'] = $model->tampil('tahun_ajaran');
    $data['semester'] = $model->tampil('semester');
    $data['blok'] = $model->tampil('blok');
    
    // Load the views with the resulting data
    echo view('header', $data);
    echo view('menu');
    echo view('raport', $data);
    echo view('footer');
}

public function aksi_laporan_pdf()
{
    if (session()->get('id') > 0) {
        helper('permission'); // Ensure helper is loaded

        // Check if the user has permission for 'laporan'
            $pdf = new \TCPDF();
            $model = new M_raport();

            // Get input values from the request
            $id_siswa = $this->request->getGet('id_siswa');
            $id_tahun_ajaran = $this->request->getGet('id_tahun_ajaran');
            $id_semester = $this->request->getGet('id_semester');
            $id_blok = $this->request->getGet('id_blok');

            // Retrieve the necessary data with joins
            $data['penilaian'] = $model->getPenilaianData($id_siswa, $id_tahun_ajaran, $id_semester, $id_blok);

            // Set up PDF metadata
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Raport Siswa');
            $pdf->SetSubject('Raport');
            $pdf->SetKeywords('Raport, PDF');
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // Set margins and add a page
            $pdf->SetMargins(5, 5, 5); // Left, Top, Right
            $pdf->AddPage();

            // Set font and content
            $pdf->SetFont('helvetica', '', 10); // Font size 10px
            $html = view('print_raport', $data); // Replace with your view

            // Output the HTML content in PDF
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output PDF
            $pdf->Output('raport.pdf', 'I');
            exit();
        } else {
            return redirect()->to('home/error');
        }
    }


    public function setting()
    {if (session()->get('id') > 0) {
        helper('permission'); // Pastikan helper dimuat

        // Cek apakah user memiliki hak akses untuk 'pemesanan'
       
           
                $model = new M_raport;
                // $this->logUserActivity('Masuk ke setting');
                $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

               
                echo view('header', $data);
                echo view('menu');
                echo view('setting', $data);
                echo view('footer');
           
            
        
    }
}
    public function aksi_e_setting()
    {
        $model = new M_raport();
        // $this->logUserActivity('Melakukan Setting');
        $namaWebsite = $this->request->getPost('namawebsite');
        $id = $this->request->getPost('id');
        $id_user = session()->get('id');
        $where = array('id_setting' => '1');

        $data = array(
            'nama_website' => $namaWebsite,
            'update_by' => $id_user,
            'update_at' => date('Y-m-d H:i:s')
        );

        // Cek apakah ada file yang diupload untuk favicon
        $favicon = $this->request->getFile('img');
        if ($favicon && $favicon->isValid() && !$favicon->hasMoved()) {
            // Beri nama file unik
            $faviconNewName = $favicon->getRandomName();
            // Pindahkan file ke direktori public/images
            $favicon->move(WRITEPATH . '../public/images', $faviconNewName);

            // Tambahkan nama file ke dalam array data
            $data['tab_icon'] = $faviconNewName;
        }

        // Cek apakah ada file yang diupload untuk logo
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            // Beri nama file unik
            $logoNewName = $logo->getRandomName();
            // Pindahkan file ke direktori public/images
            $logo->move(WRITEPATH . '../public/images', $logoNewName);

            // Tambahkan nama file ke dalam array data
            $data['logo_website'] = $logoNewName;
        }

        // Cek apakah ada file yang diupload untuk logo
        $login = $this->request->getFile('login');
        if ($login && $login->isValid() && !$login->hasMoved()) {
            // Beri nama file unik
            $loginNewName = $login->getRandomName();
            // Pindahkan file ke direktori public/images
            $login->move(WRITEPATH . '../public/images', $loginNewName);

            // Tambahkan nama file ke dalam array data
            $data['login_icon'] = $loginNewName;
        }

        $model->edit('setting', $data, $where);

        // Optionally set a flash message here
        return redirect()->to('home/setting');
    }
}


