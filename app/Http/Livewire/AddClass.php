<?php

namespace App\Http\Livewire;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddClass extends Component
{
    public $class_name;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'class_name' => 'required'
        ]);
    }

    public function storeClassData()
    {
        $this->validate([
            'class_name' => 'required'
        ]);
        if ($this->class_name == "")
        {
            return;
        }
        else
        {
            $user = Auth::user('id');
            $user_id = $user->id;
            $createdClass = Classes::create(['class' => $this->class_name, 'user_id' => $user_id]);
            $createdClass->save();
            session()->flash('message', 'Class Added Successfully');
            $this->class_name = "";
        }
    }

    public function deleteClass($id)
    {
        $deleteClass = Classes::find($id);
        $deleteClass->delete();
        session()->flash('message', 'Class Deleted Successfully');
    }
    public function render()
    {
        $all_class = Classes::all();
        return view('livewire.add-class', ['classes' => $all_class]);
    }
}
