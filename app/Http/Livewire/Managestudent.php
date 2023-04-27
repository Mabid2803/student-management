<?php

namespace App\Http\Livewire;

use App\Models\add_stundent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Managestudent extends Component
{
    public $name, $fatherName, $email, $classId, $phone, $search, $editId;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'fatherName' => 'required',
            'email' => 'required|email',
            'classId' => 'required|numeric',
            'phone' => 'required|numeric'
        ]);
    }
    public function empty()
    {
        $this->name = "";
        $this->fatherName = "";
        $this->email = "";
        $this->classId = "";
        $this->phone = "";
        $this->editId = "";
    }
    public function storeStudentData()
    {
        $this->validate([
            'name' => 'required',
            'fatherName' => 'required',
            'email' => 'required|email',
            'classId' => 'required|numeric',
            'phone' => 'required|numeric'
        ]);
        $user = Auth::user('id');
        $user_id = $user->id;
        $addStudent = add_stundent::create(['name' => $this->name, 'fatherName' => $this->fatherName, 'email' => $this->email, 'classId' => $this->classId, 'phone' => $this->phone, 'user_id' => $user_id]);
        $addStudent->save();
        session()->flash('message', 'Student Added Successfully');
        $this->empty();
    }

    public function editStudent($id)
    {
        $student = add_stundent::where('id', $id)->first();
        $this->editId = $student->id;
        $this->name = $student->name;
        $this->fatherName = $student->fatherName;
        $this->classId = $student->classId;
        $this->phone = $student->phone;
        $this->email = $student->email;
    }
    public function editStudentData()
    {
        $this->validate([
            'name' => 'required',
            'fatherName' => 'required',
            'email' => 'required|email',
            'classId' => 'required|numeric',
            'phone' => 'required|numeric'
        ]);
        $user = Auth::user('id');
        $user_id = $user->id;
        $editStudent = add_stundent::where('id', $this->editId)->first();
        $editStudent->name = $this->name;
        $editStudent->fatherName = $this->fatherName;
        $editStudent->classId = $this->classId;
        $editStudent->email = $this->email;
        $editStudent->phone = $this->phone;
        $editStudent->save();
        session()->flash('message', 'Student Edit Successfully');
        $this->empty();
    }
    public function deleteStudent($id)
    {
        $delete_student = add_stundent::find($id);
        $student_id = $delete_student->id;
        $delete_student->delete();
        session()->flash('message', 'Student Deleted Successfully');
    }
    public function render()
    {
        $all_class = Classes::all();
        $all_student = add_stundent::where('classId','LIKE',"%$this->search%")->orderBy('id')->get();
        return view('livewire.managestudent', ['classes' => $all_class, 'student' => $all_student]);
    }
}
