<?php

namespace App\Http\Livewire;

use App\Models\add_stundent;
use App\Models\attendance;
use App\Models\Classes;
use Livewire\Component;

class Manageattendance extends Component
{
    public $classId, $class_id, $date;
    public $attendances = [];

    public function __construct($id = null)
    {
        $all_student = add_stundent::where('classId', 'LIKE', "%$this->classId%")->orderBy('id')->get();
        foreach ($all_student as $student) {
            $this->attendances[$student->id] = 'present';
        }
    }

    public function studentAttendanceData()
    {
        $students = add_stundent::where('classId', $this->classId)->get();
        foreach ($students as $student) {
            $attendance = new attendance();
            $attendance->student_id = $student->id;
            $attendance->classId = $this->classId;
            $attendance->status = $this->attendances[$student->id];
            $attendance->save();
        }
        session()->flash('message', 'Attendance Completed');
    }

    public function render()
    {
        $attendance = attendance::where('ClassId', $this->class_id)->whereDate('created_at', $this->date)->get();
        $all_class = Classes::all();
        $all_student = add_stundent::where('classId', 'LIKE', "%$this->classId%")->orderBy('id')->get();
        return view('livewire.manageattendance', ['classes' => $all_class, 'student' => $all_student, 'attendance' => $attendance]);
    }
}
