<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'firassehhh','nipd'=>'112','alamat'=>'Cibay','mata_kuliah'=>'ipa'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'usman','nipd'=>'212','alamat'=>'Ranca kacuat','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Atos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tsm = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Sepeda Motor'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $firas = mahasiswa::create(array(
        'nama_mahasiswa'=> 'firas','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));

        $ahmad = mahasiswa::create(array(
        'nama_mahasiswa'=> 'ahmad','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));
        $iki = mahasiswa::create(array(
        'nama_mahasiswa'=> 'iki','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $tsm->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');

        wali::create(array(
        'nama'=>'Bpk.ucup',
        'alamat'=>'rancamanyar',
        'id_mahasiswa'=>$firas->id
        ));
        wali::create(array(
        'nama'=>'Bpk.ciko',
        'alamat'=>'bandung kulon',
        'id_mahasiswa'=>$ahmad->id
        ));
        wali::create(array(
        'nama'=>'Bpk.Agung',
        'alamat'=>'cimenyan',
        'id_mahasiswa'=>$iki->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$ipa = matkul::create(array('nama_matkul'=>'ipa','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$firas->matkul()->attach($ipa->id);
        $firas->matkul()->attach($kimia->id);
		$ahmad->matkul()->attach($kimia->id);
		$iki->matkul()->attach($ipa->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
