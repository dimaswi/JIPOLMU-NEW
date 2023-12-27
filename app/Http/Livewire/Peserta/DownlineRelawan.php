<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\BukuInduk;
use App\Models\User;

class DownlineRelawan extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    public $perPage = 10;
    public $uid;

    public function mount($id)
    {
        $this->uid = $id;
    }
    

    public function render()
    {
        $user = User::find($this->uid);

        return view('livewire.peserta.downline-relawan', [
            'datas' => BukuInduk::where('referal', $user->name)->search($this->search)->paginate($this->perPage),
        ]);
    }
}
