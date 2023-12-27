<?php

namespace App\Http\Livewire\Master;

use App\Exports\UsersExport;
use App\Models\Admin;
use App\Models\Bagian;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    public $perPage = 5;
    public $name;
    public $username;
    public $no_hp;
    public $password;
    public $role;
    public $idData;
    public $status;
    public $referal;
    public function render()
    {
        return view('livewire.master.users', [
            'user' => User::search($this->search)->paginate($this->perPage),
        ]);
    }

    public function save()
    {
        try {

            $validate = $this->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]);


            $user = User::create([
                    'name' => $this->name,
                    'username' => $this->username,
                    'password' => Hash::make($this->password),
                    'role' => $this->role,
                    'phone' => $this->no_hp,
                    'referal' => auth()->user()->name,
                ]);

            Admin::create([
                'user_id' => $user->id
            ]);

            $this->reset();
            $this->sendAlert('success', 'Berhasil disimpan!!', 'top-end');
        } catch (\Throwable $th) {

            $validate = $this->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]);

            $this->sendAlert('error', $th->getMessage(), 'top-end');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        $this->idData = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->no_hp = $user->phone;
        $this->status = $user->status;
        $this->role = $user->role;
        $this->referal = $user->referal;
    }

    public function close()
    {
        $this->reset();
    }

    public function update()
    {
        try {
            $validate = $this->validate([
                'name' => 'required',
                'username' => 'required',
                'role' => 'required',
            ]);

            User::where('id', $this->idData)->update([
                'name' => $this->name,
                'username' => $this->username,
                'phone' => $this->phone,
                'status' => $this->status,
                'role' => $this->role,
                'referal' => $this->referal,
            ]);
            $this->sendAlert('success', 'Berhasil diupdate!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage(), 'top-end');
        }
    }

    public function remove($id)
    {
        try {
            User::where('id', $id)->delete();
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

    public function export()
    {
        return Excel::download(new UsersExport, 'username.xlsx');
    }
}
