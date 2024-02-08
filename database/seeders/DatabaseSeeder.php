<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AlatAngkut;
use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\JenisPerdin;
use App\Models\Kegiatan;
use App\Models\Ketentuan;
use App\Models\Lama;
use App\Models\LevelAdmin;
use App\Models\Pegawai;
use App\Models\Wilayah;
use App\Models\Pangkat;
use App\Models\Seksi;
use App\Models\UangHarian;
use App\Models\UangPenginapan;
use App\Models\UangTransport;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LevelAdmin::create([
            'nama' => 'Admin',
            'slug' => 'admin',
        ]);
        LevelAdmin::create([
            'nama' => 'Operator',
            'slug' => 'operator',
        ]);
        LevelAdmin::create([
            'nama' => 'Super Operator',
            'slug' => 'super-operator',
        ]);
        LevelAdmin::create([
            'nama' => 'Approval',
            'slug' => 'approval',
        ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level_admin_id' => 1,
        ]);
        User::create([
            'username' => 'ADM-SEKSI-1',
            'password' => bcrypt('admin'),
            'level_admin_id' => 2,
        ]);

        Bidang::create([
            'nama' => 'BIDANG BINA MARGA',
            'slug' => 'bidang-bina-marga',
            'jenis' => 'BIDANG',
            'author_id' => 1,
        ]);
        Bidang::create([
            'nama' => 'BIDANG JASA KONSTRUKSI',
            'slug' => 'bidang-jasa-konstruksi',
            'jenis' => 'BIDANG',
            'author_id' => 1,
        ]);

        Seksi::create([
            'nama' => 'Koordinasi dan Sinkronisasi Perencanaan Tata Pangkat',
            'slug' => 'koordinasi-dan-sinkronisasi-perencanaan-tata-pangkat',
            'bidang_id' => 1,
            'author_id' => 1,
        ]);
        Seksi::create([
            'nama' => 'PELAKSANAAN PJPA',
            'slug' => 'pelaksanaan-pjpa',
            'bidang_id' => 2,
            'author_id' => 1,
        ]);

        Kegiatan::create([
            'nama' => 'Koordinasi dan Konsultasi ke Dalam dan Keluar Daerah pada UPTD Pengelolaan Daerah Aliran Sungai Cidurian-Cisadane',
            'slug' => 'koordinasi-dan-konsultasi-ke-dalam-dan-keluar-daerah-pada-uptd-pengelolaan-daerah-aliran-sungai-cidurian-cisadane',
            'seksi_id' => 1,
            'author_id' => 1,
        ]);
        Kegiatan::create([
            'nama' => 'Koordinasi dan Konsultasi ke Dalam dan Keluar Daerah pada UPTD Pengelolaan Jalan Dan Jembatan Tangerang',
            'slug' => 'koordinasi-dan-konsultasi-ke-dalam-dan-keluar-daerah-pada-uptd-pengelolaan-jalan-dan-jembatan-tangerang',
            'seksi_id' => 2,
            'author_id' => 1,
        ]);

        JenisPerdin::create([
            'nama' => 'Perjalanan Dinas Dalam Kota',
            'slug' => 'perjalanan-dinas-dalam-kota',
            'no_rek' => '5.1.02.04.01.0003',
            'author_id' => 1,
        ]);
        JenisPerdin::create([
            'nama' => 'Perjalanan Dinas Biasa',
            'slug' => 'perjalanan-dinas-biasa',
            'no_rek' => '5.1.02.04.01.0001',
            'author_id' => 1,
        ]);

        Wilayah::create([
            'nama' => 'Banten',
            'slug' => 'banten',
            'jenis_perdin_id' => 1,
            'author_id' => 1,
        ]);
        Wilayah::create([
            'nama' => 'BALI',
            'slug' => 'bali',
            'jenis_perdin_id' => 2,
            'author_id' => 1,
        ]);

        Golongan::create([
            'nama' => 'Eselon I',
            'slug' => 'eselon-i',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon II',
            'slug' => 'eselon-ii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon III',
            'slug' => 'eselon-iii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon IV',
            'slug' => 'eselon-iv',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan IV',
            'slug' => 'golongan-iv',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan III',
            'slug' => 'golongan-iii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan II',
            'slug' => 'golongan-ii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan I',
            'slug' => 'golongan-i',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Non ASN',
            'slug' => 'non-asn',
            'author_id' => 1,
        ]);

        Pangkat::create([
            'nama' => 'I - A - Juru Muda',
            'slug' => 'i-a-juru-muda',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'I - B - Juru Muda Tk. I',
            'slug' => 'i-b-juru-muda-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'I - C - Juru',
            'slug' => 'i-c-juru',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'I - D - Juru Tk. I',
            'slug' => 'i-d-juru-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'II - A - Pengatur Muda',
            'slug' => 'ii-a-pengatur-muda',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'II - B - Pengatur Muda Tk. I',
            'slug' => 'ii-b-pengatur-muda-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'II - C - Pengatur',
            'slug' => 'ii-c-pengatur',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'II - D - Pengatur Tk. I',
            'slug' => 'ii-d-pengatur-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'III - A - Penata Muda',
            'slug' => 'iii-a-penata-muda',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'III - B - Penata Muda Tk. I',
            'slug' => 'iii-b-penata-muda-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'III - C - Penata',
            'slug' => 'iii-c-penata',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'III - D - Penata Tk. I',
            'slug' => 'iii-d-penata-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'IV - A - Pembina',
            'slug' => 'iv-a-pembina',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'IV - B - Pembina Tk. I',
            'slug' => 'iv-b-pembina-tk.-i',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'IV - C - Pembina Utama Muda',
            'slug' => 'iv-c-pembina-utama-muda',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'IV - D - Pembina Utama Madya',
            'slug' => 'iv-d-pembina-utama-madya',
            'author_id' => 1,
        ]);
        Pangkat::create([
            'nama' => 'IV - E - Pembina Utama',
            'slug' => 'iv-e-pembina-utama',
            'author_id' => 1,
        ]);

        Jabatan::create([
            'nama' => 'KEPALA BIDANG',
            'slug' => 'kepala-bidang',
            'author_id' => 1,
        ]);
        Jabatan::create([
            'nama' => 'Non ASN',
            'slug' => 'non-asn',
            'author_id' => 1,
        ]);
        Jabatan::create([
            'nama' => 'KEPALA DINAS PUPR',
            'slug' => 'kepala-dinas-pupr',
            'author_id' => 1,
        ]);

        Ketentuan::create([
            'author_id' => 1,
        ]);
        Ketentuan::create([
            'author_id' => 1,
        ]);

        Pegawai::create([
            'nama' => 'Acep Wahidiat',
            'slug' => 'acep-wahidiat',
            'nip' => '198512142014091001',
            'email' => 'example@gmail.com',
            'no_hp' => '083812233445',
            'seksi_id' => 1,
            'golongan_id' => 1,
            'pangkat_id' => 1,
            'jabatan_id' => 1,
            'pptk' => 0,
            'ketentuan_id' => 1,
            'author_id' => 1,
        ]);
        Pegawai::create([
            'nama' => 'Adhia Muharditia, ST',
            'slug' => 'adhia-muharditia,-st',
            'nip' => '199406112019031005',
            'email' => 'examplee@gmail.com',
            'no_hp' => '0838122334455',
            'seksi_id' => 2,
            'golongan_id' => 2,
            'pangkat_id' => 2,
            'jabatan_id' => 2,
            'pptk' => 1,
            'ketentuan_id' => 2,
            'author_id' => 1,
        ]);

        AlatAngkut::create([
            'nama' => 'Pesawat',
            'slug' => 'pesawat',
            'tiket' => 1,
            'author_id' => 1,
        ]);
        AlatAngkut::create([
            'nama' => 'Mobil',
            'slug' => 'mobil',
            'tiket' => 0,
            'author_id' => 1,
        ]);

        UangHarian::create([
            'keterangan' => 'U Harian Dinas luar',
            'slug' => 'u-harian-dinas-luar',
            'wilayah_id' => 1,
            'eselon_i' => 150000,
            'eselon_ii' => 150000,
            'eselon_iii' => 150000,
            'eselon_iv' => 150000,
            'golongan_iv' => 150000,
            'golongan_iii' => 150000,
            'golongan_ii' => 150000,
            'golongan_i' => 150000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);
        UangHarian::create([
            'keterangan' => 'U Harian Dinas Luar (Kunjungan Kerja)',
            'slug' => 'u-harian-dinas-luar-(kunjungan-kerja)',
            'wilayah_id' => 2,
            'eselon_i' => 150000,
            'eselon_ii' => 150000,
            'eselon_iii' => 150000,
            'eselon_iv' => 150000,
            'golongan_iv' => 150000,
            'golongan_iii' => 150000,
            'golongan_ii' => 150000,
            'golongan_i' => 150000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);

        UangTransport::create([
            'wilayah_id' => 1,
            'alat_angkut_id' => 1,
            'slug' => 'uang-transport-1',
            'harga_tiket' => 100000,
            'eselon_i' => 550000,
            'eselon_ii' => 520000,
            'eselon_iii' => 490000,
            'eselon_iv' => 450000,
            'golongan_iv' => 400000,
            'golongan_iii' => 400000,
            'golongan_ii' => 400000,
            'golongan_i' => 400000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);
        UangTransport::create([
            'wilayah_id' => 2,
            'alat_angkut_id' => 2,
            'slug' => 'uang-transport-2',
            'harga_tiket' => 100000,
            'eselon_i' => 490000,
            'eselon_ii' => 460000,
            'eselon_iii' => 430000,
            'eselon_iv' => 390000,
            'golongan_iv' => 350000,
            'golongan_iii' => 350000,
            'golongan_ii' => 350000,
            'golongan_i' => 350000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);

        UangPenginapan::create([
            'keterangan' => 'U Harian Dinas luar',
            'slug' => 'u-harian-dinas-luar',
            'wilayah_id' => 1,
            'eselon_i' => 150000,
            'eselon_ii' => 150000,
            'eselon_iii' => 150000,
            'eselon_iv' => 150000,
            'golongan_iv' => 150000,
            'golongan_iii' => 150000,
            'golongan_ii' => 150000,
            'golongan_i' => 150000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);
        UangPenginapan::create([
            'keterangan' => 'U Harian Dinas Luar (Kunjungan Kerja)',
            'slug' => 'u-harian-dinas-luar-(kunjungan-kerja)',
            'wilayah_id' => 2,
            'eselon_i' => 150000,
            'eselon_ii' => 150000,
            'eselon_iii' => 150000,
            'eselon_iv' => 150000,
            'golongan_iv' => 150000,
            'golongan_iii' => 150000,
            'golongan_ii' => 150000,
            'golongan_i' => 150000,
            'non_asn' => 150000,
            'author_id' => 1,
        ]);

        Lama::create([
            'lama_hari' => 2,
            'author_id' => 1,
        ]);
        Lama::create([
            'lama_hari' => 3,
            'author_id' => 1,
        ]);
    }
}
