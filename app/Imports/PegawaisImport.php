<?php

namespace App\Imports;

use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Ketentuan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Seksi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PegawaisImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $slug = SlugService::createSlug(Pegawai::class, 'slug', $row['nama']);
        $author_id = auth()->user()->id;

        $jabatan = Jabatan::where('slug', 'non-asn')->first();
        if (isset($row['jabatan'])) {
            $jabatan = Jabatan::where('nama', 'LIKE', '%' . $row['jabatan'] . '%')->first();
            $jabatan = $jabatan ?? Jabatan::where('slug', 'non-asn')->first();
        }

        $seksi_id = null;
        if (isset($row['seksi'])) {
            $seksi = Seksi::where('nama', 'LIKE', '%' . $row['seksi'] . '%')->first();
            $seksi_id = $seksi ? $seksi->id : null;
        }

        $bidang_id = null;
        if (isset($row['bidang'])) {
            $bidang = Bidang::where('nama', 'LIKE', '%' . $row['bidang'] . '%')->first();
            $bidang_id = $bidang ? $bidang->id : null;
        }

        $golongan_id = null;
        if (isset($row['golongan'])) {
            $golongan = Golongan::where('nama', 'LIKE', '%' . $row['golongan'] . '%')->first();
            $golongan_id = $golongan ? $golongan->id : null;
        }

        $pangkat_id = null;
        if (isset($row['pangkat'])) {
            $pangkat = Pangkat::where('nama', 'LIKE', '%' . $row['pangkat'] . '%')->first();
            $pangkat_id = $pangkat ? $pangkat->id : null;
        }

        if (str_contains($jabatan->slug, 'non-asn')) {
            $golongan_id = Golongan::where('slug', 'non-asn')->first()->id;
        }

        $pptk = isset($row['pptk']) && str_contains($row['pptk'], 'Ya') ? 1 : 0;

        $ketentuan = Ketentuan::create(['author_id' => $author_id]);

        $pegawaiData = [
            'nama'  => $row['nama'],
            'slug' => $slug,
            'nip' => $row['nip'] ?? null,
            'email' => $row['email'] ?? null,
            'no_hp' => $row['no_hp'] ?? null,
            'jabatan_id' => $jabatan->id,
            'seksi_id' => $seksi_id,
            'bidang_id' => $bidang_id,
            'golongan_id' => $golongan_id,
            'pangkat_id' => $pangkat_id,
            'pptk' => $pptk,
            'ketentuan_id' => $ketentuan->id,
            'author_id' => $author_id,
            'created_at' => now(),
        ];

        return new Pegawai($pegawaiData);
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|min:3|max:100',
            'jabatan' => 'required',
            'nip' => 'nullable|unique:pegawais',
            'email' => 'nullable|email|unique:pegawais',
            'no_hp' => 'nullable|unique:pegawais',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong.',
            'nama.min' => 'Nama minimal harus mengandung :min karakter.',
            'nama.max' => 'Nama maksimal harus mengandung :max karakter.',
            'jabatan.required' => 'Jabatan tidak boleh kosong.',
            'nip.unique' => 'NIP sudah digunakan.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'no_hp.unique' => 'Nomor HP sudah digunakan.'
        ];
    }
}
