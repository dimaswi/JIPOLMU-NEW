<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;

class DownlineKoordinator extends Component
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
        $data = User::where('id', $this->uid)->first();

        return view('livewire.peserta.downline-koordinator', [
            'datas' => User::where('referal', $data->name)->select()->search($this->search)->paginate($this->perPage)
        ]);
    }

    public function showDetails($id)
    {
        return redirect()->to("admin/downline/pemilih/$id");
    }
}
