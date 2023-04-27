<div>
    <div  style="margin-top: 5px" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}
                            <button style="float: right" type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">X</button>
                        </div>
                    @endif
                    <div class="card-header">
                        <h5 style="float: left; margin-top: 5px"><strong>Take Attendance</strong></h5>
                        <select wire:model="classId" style="margin-left: 71%; height: 30px; font-size: 15px ; padding: 1px 30px 1px 5px" name="class" id="class">
                            <option value="" selected="">Class</option>
                            @foreach($classes as $all_classes)
                                <option value="{{$all_classes->id}}">{{$all_classes->class}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#studentAttendanceModal"
                                style="float: right; margin-right: 15px"><strong>Take Attendance</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div  style="margin-top: 5px" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left; margin-top: 5px"><strong>Attendance Details</strong></h5>
                        <select wire:model="class_id" style="margin-left: 30%; height: 30px; font-size: 15px ; padding: 1px 30px 1px 5px" name="class" id="class">
                            <option selected value="">Class</option>
                            @foreach($classes as $all_classes)
                                <option value="{{$all_classes->id}}">{{$all_classes->class}}</option>
                            @endforeach
                        </select>
                        <input type="date" wire:model="date" style="margin-left: 1%; height: 30px; font-size: 15px ; padding: 1px 5px 1px 5px">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center">
                        <thead class="table-dark" >
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">status</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($attendance->count() > 0)
                            @foreach($attendance as $attendanceData)
                                <tr>
                                    <td>{{$attendanceData->studentDetails->name}}</td>
                                    <td>{{$attendanceData->studentDetails->fatherName}}</td>
                                    <td>{{$attendanceData->classDetails->class}}</td>
                                    <td>{{$attendanceData->status}}</td>
                                    <td>{{$attendanceData->created_at->toDatestring()}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" style="text-align: center"><small>No Student Found</small></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="studentAttendanceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Take Attendance {{$classId}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead style="text-align: center" class="table-dark">
                        <tr>
                            <th scope="col" hidden="">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Attendance</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center">
                        @if($classId != "")
                            @if($student->count() > 0)
                                @foreach($student as $student)
                                    <tr>
                                        <td style="margin-top: 20px" wire:model="studentId" hidden="">{{$student->id}}</td>
                                        <td wire:model="name">{{$student->name}}</td>
                                        <td wire:model="fatherName">{{$student->fatherName}}</td>
                                        <td wire:model="classId">{{$student->classDetails->class}}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="{{$student->id}}" id="present{{$student->id}}" wire:model.lazy="attendances.{{$student->id}}" value="present">
                                                <label class="btn-sm btn-outline-primary" for="present{{$student->id}}">Present</label>
                                                <input type="radio" class="btn-check" name="{{$student->id}}" id="absent{{$student->id}}" wire:model.lazy="attendances.{{$student->id}}" value="absent">
                                                <label class="btn-sm btn-outline-primary" for="absent{{$student->id}}">Absent</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center"><small>No Student Found</small></td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="4" style="text-align: center"><small>Select Class</small></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div style="margin-top: 5px" class="form-group row">
                        <div class="col-9">
                            <button type="submit" wire:click="studentAttendanceData" data-bs-dismiss="modal" aria-hidden="true" style="background-color: green" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

