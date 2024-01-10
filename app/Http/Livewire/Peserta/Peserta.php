<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use App\Models\BukuInduk;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class Peserta extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    public $perPage = 10;
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
    public $tps;
    public $upline;
    public $idData;

    public function render()
    {

        return view('livewire.peserta.peserta', [
            'bukuInduk' => BukuInduk::where('referal', auth()->user()->name)->search($this->search)->paginate($this->perPage),
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
        } else if($result == null) {
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
                    'referal' => auth()->user()->name,
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

    public function edit($id)
    {
        $peserta = BukuInduk::where('no', $id)->first();

        $nama_kab = Regency::where('name', $peserta->kabupaten)->first();
        $nama_kec = District::where('name', $peserta->kecamatan)->first();
        $nama_desa = Village::where('name', $peserta->desa)->first();

        $this->idData = $peserta->no;
        $this->nama = $peserta->nama;
        $this->kelamin = $peserta->kelamin;
        $this->tempat_ttl = $peserta->tempat_ttl;
        $this->kabupaten = $peserta->kabupaten;
        $this->tanggal_lahir = $peserta->tanggal_lahir;
        $this->ktp = $peserta->ktp;
        $this->aktif_organisasi = $peserta->aktif_organisasi;
        $this->nbm = $peserta->nbm;
        $this->kabupaten = $nama_kab->id;
        $this->kecamatan = $nama_kec->id;
        $this->desa = $nama_desa->id;
        $this->domisili = $peserta->domisili;
        $this->pendidikan = $peserta->pendidikan;
        $this->status = $peserta->status;
        $this->status_sosial = $peserta->status_sosial;
        $this->pekerjaan = $peserta->pekerjaan;
        $this->no_hp = $peserta->no_hp;
        $this->upline = $peserta->referal;
        $this->tps = $peserta->tps;
    }


    public function closeAdd()
    {
        $this->reset();
    }
    public function close()
    {
        $this->reset();
    }

    public function update()
    {
        try {
            $namakabupaten = Regency::where('id', $this->kabupaten)->first();
            $namakecamatan = District::where('id', $this->kecamatan)->first();
            $namadesa = Village::where('id', $this->desa)->first();

            Bukuinduk::where('no', $this->idData)->update([
                'nama' => $this->nama,
                'ktp' => $this->ktp,
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
                'referal' => $this->upline,
                'tps' => $this->tps,
            ]);
            $this->sendAlert('success', 'Berhasil diupdate!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage(), 'top-end');
        }
    }

    public function remove($id)
    {
        try {
            BukuInduk::where('no', $id)->delete();
            $this->sendAlert('success', 'Berhasil dihapus!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage(), 'top-end');
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
