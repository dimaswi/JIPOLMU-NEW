<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\BukuInduk;
use App\Models\User;

class Downline extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    public $perPage = 10;

    public function render()
    {
        return view('livewire.peserta.downline', [
            'datas' => User::where('referal', auth()->user()->name)->select()->search($this->search)->paginate($this->perPage),
            'admins' => User::search($this->search)->paginate($this->perPage),
        ]);
    }

    public function showDetails($id)
    {
        return redirect()->to("admin/downline/pemilih/$id");
    }
}
