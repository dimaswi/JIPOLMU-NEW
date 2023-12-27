<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\BukuInduk;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;

class Formulir extends Component
{
    use LivewireAlert;
    public $nama;
    public $tempat_ttl;
    public $tanggal_lahir;
    public $kelamin;
    public $kabupaten;
    public $kecamatan;
    public $desa;
    public $domisili;
    public $aktif_organisasi;
    public $nbm;
    public $pekerjaan;
    public $pendidikan;
    public $no_hp;
    public $status;
    public $status_sosial;
    public $ktp;
    public $upline;
    public $tps;
    public function render()
    {
        return view('livewire.form.formulir', [
            'kabupatens' => Regency::where('province_id', 35)->get(),
            'kecamatans' => District::where('regency_id', $this->kabupaten)->get(),
            'desas' => Village::where('district_id', $this->kecamatan)->get(),
        ]);
    }
    public function save()
    {
        $result = DB::table('tb_buku_induk')->where('ktp' , $this->ktp)->first();

        if ($result != null) {
            $this->sendAlert('error', 'Data KTP sudah ada!!', 'top-end');
        } else {
            try {
                $last_no_register = BukuInduk::orderBy('no', 'desc')->first();
                $namakabupaten = Regency::where('id', $this->kabupaten)->first();
                $namakecamatan = District::where('id', $this->kecamatan)->first();
                $namadesa = Village::where('id', $this->desa)->first();
                $validate = $this->validate([
                    'kabupaten' => 'required',
                    'kecamatan' => 'required',
                    'desa' => 'required',
                    'domisili' => 'required',
                    'no_hp' => 'required',
                ]);
    
                BukuInduk::create([
                    'no_register' => str_pad($last_no_register->no_register + 1, 6, '0', STR_PAD_LEFT),
                    'nama' => $this->nama,
                    'kelamin' => $this->kelamin,
                    'tempat_ttl' => $this->tempat_ttl,
                    'tanggal_lahir' => $this->tanggal_lahir,
                    'kabupaten' => $namakabupaten->name,
                    'kecamatan' => $namakecamatan->name,
                    'desa' => $namadesa->name,
                    'domisili' => $this->domisili,
                    'pendidikan' => $this->pendidikan,
                    'pekerjaan' => $this->pekerjaan,
                    'aktif_organisasi' => $this->aktif_organisasi,
                    'nbm' => $this->nbm,
                    'no_hp' => $this->no_hp,
                    'status' => $this->status,
                    'status_sosial' => $this->status_sosial,
                    'ktp' => $this->ktp,
                    'referal' => $this->upline,
                    'tps' => $this->tps,
                ]);
    
                $this->reset();
                $this->sendAlert('success', 'Berhasil disimpan!!', 'top-end');
            } catch (\Throwable $th) {
    
                $validate = $this->validate([
                    'kabupaten' => 'required',
                    'kecamatan' => 'required',
                    'desa' => 'required',
                    'domisili' => 'required',
                    'no_hp' => 'required',
                ]);
    
    
                $this->sendAlert('error', $th->getMessage(), 'top-end');
            }
        }
    }

    public function sendAlert($tipo, $texto, $posicion)
    {
        $this->alert($tipo, $texto, [
            'position' =>  $posicion,
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}
