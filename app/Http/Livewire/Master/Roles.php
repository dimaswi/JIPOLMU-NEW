<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use App\Models\Role as ModelRole;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use App\Models\Permission as ModelPermission;

class Roles extends Component
{    
    use WithPagination;
    use LivewireAlert;
    public $search = '';
    public $perPage = 5;
    public $name;
    public $permission = [];
    public $idData;

    public function render()
    {

        return view('livewire.master.roles', [
            'role' => ModelRole::search($this->search)->paginate($this->perPage),
            'permissions' => ModelPermission::all(),
        ]);
    }

    public function save()
    {
        try {
            $role = Role::create(['name' => $this->name]);
            $this->sendAlert('success', 'Berhasil disimpan!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage() , 'top-end');
        }

        $this->reset();
    }

    public function edit($id)
    {
        $role = ModelRole::find($id);

        $this->idData = $role->id;
        $this->name = $role->name;

    }

    public function close()
    {
        $this->reset();
    }

    public function update()
    {
        $role = Role::find($this->idData);
        $role->givePermissionTo($this->permission);

        try {
            ModelRole::where('id', $this->idData)->update([
                'name' => $this->name,
            ]);

            $role = Role::find($this->idData);
            $role->givePermissionTo($this->permission);
            $this->sendAlert('success', 'Berhasil diupdate!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage() , 'top-end');
        }
    }

    public function remove($id)
    {
        try {
            ModelRole::where('id', $id)->delete();
            $this->sendAlert('success', 'Berhasil dihapus!!', 'top-end');
        } catch (\Throwable $th) {
            $this->sendAlert('error', $th->getMessage() , 'top-end');
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
