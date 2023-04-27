<div>
    <div  style="margin-top: 5px" class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left"><strong>All Students</strong></h5>
                        <select wire:model="search" style="margin-left: 35%; height: 30px; font-size: 15px ; padding: 1px 30px 1px 5px " name="class" id="class">
                            <option value="" selected="">Class</option>
                            @foreach($classes as $all_classes)
                                <option value="{{$all_classes->id}}">{{$all_classes->class}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal"
                                style="float: right">Add New Student
                        </button>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}
                                <button style="float: right" type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">X</button>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($student->count() > 0)
                                @foreach($student as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->fatherName}}</td>
                                        <td>{{$student->classDetails->class}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td style="text-align: center">
                                            <button class="btn btn-sm btn-primary view" data-name-type="{{ $student->name }}" data-fatherName-type="{{ $student->fatherName }}" data-email-type="{{ $student->email }}" data-phone-type="{{ $student->phone }}" data-class-type="{{ $student->classDetails->class }}" value="{{ $student->id }}">View</button>
                                            <button class="btn btn-sm btn-secondary edit" wire:click="editStudent({{ $student->id }})">Edit</button>
                                            <button class="btn btn-sm btn-danger delete" onclick="return confirm('Are you sure delete student?')" wire:click="deleteStudent({{ $student->id }})">Delete</button>
                                        </td>
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
        <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storeStudentData">
                            <div style="margin-top: 5px" class="form-group row">
                                <label for="name" class="col-3">Name</label>
                                <div class="col-9">
                                    <input type="text" id="name" class="form-control" wire:model="name">
                                    @error('name')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 5px" class="form-group row">
                                <label for="fatherName" class="col-3">Father Name</label>
                                <div class="col-9">
                                    <input type="text" id="fatherName" class="form-control" wire:model="fatherName">
                                    @error('fatherName')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 5px" class="form-group row">
                                <label for="email" class="col-3">Email</label>
                                <div class="col-9">
                                    <input type="email" id="email" class="form-control" wire:model="email">
                                    @error('email')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 5px" class="form-group row">
                                <label for="class" class="col-3">Class</label>
                                <div class="col-9">
                                    <select wire:model="classId" class="form-control" name="class" id="class">
                                        <option value="" selected="">Add a Class</option>
                                        @foreach($classes as $all_classes)
                                            <option value="{{$all_classes->id}}">{{$all_classes->class}}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 5px" class="form-group row">
                                <label for="phone" class="col-3">Phone</label>
                                <div class="col-9">
                                    <input type="number" id="phone" class="form-control" wire:model="phone">
                                    @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top: 5px" class="form-group row">
                                <div class="col-9">
                                    <button type="submit" data-bs-dismiss="modal" aria-hidden="true" style="background-color: green" class="btn btn-success">Add Student</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="names" class="col-3">Name</label>
                            <div class="col-9">
                                <input type="text" id="names" class="form-control" readonly>
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="father_name" class="col-3">Father Name</label>
                            <div class="col-9">
                                <input type="text" id="father_name" class="form-control" readonly>
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="emails" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="emails" class="form-control" readonly>
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="classes" class="col-3">Class</label>
                            <div class="col-9">
                                <input type="text" id="classes" class="form-control" readonly>
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="phones" class="col-3">Phone</label>
                            <div class="col-9">
                                <input type="number" id="phones" class="form-control" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editStudentData">
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="name" class="col-3">Name</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control" wire:model.defer="name">
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="fatherName" class="col-3">Father Name</label>
                            <div class="col-9">
                                <input type="text" id="fatherName" class="form-control" wire:model.defer="fatherName">
                                @error('fatherName')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="email" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="email" class="form-control" wire:model.defer="email">
                                @error('email')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="class" class="col-3">Class</label>
                            <div class="col-9">
                                <select wire:model.defer="classId" class="form-control" name="class" id="class">
                                    @foreach($classes as $all_classes)
                                        <option value="{{$all_classes->id}}">{{$all_classes->class}}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="phone" class="col-3">Phone</label>
                            <div class="col-9">
                                <input type="number" id="phone" class="form-control" wire:model.defer="phone">
                                @error('phone')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <div class="col-9">
                                <button type="submit" data-bs-dismiss="modal" aria-hidden="true" style="background-color: green" class="btn btn-success">Add Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

