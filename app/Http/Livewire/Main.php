<?php

namespace App\Http\Livewire;

use App\Models\add_stundent;
use App\Models\Classes;
use Livewire\Component;

class Main extends Component
{
    public $classId;

    public function render()
    {
        $student = add_stundent::where('ClassId', $this->classId)->get();
        $classData = Classes::all();
        return view('livewire.main', ['classData' => $classData, 'student' =>$student]);
    }
}

