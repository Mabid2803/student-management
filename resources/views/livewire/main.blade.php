<div style="margin-top: 3%; width: 85%; display: flex; flex-wrap: wrap;" class="container">
    @foreach($classData as $class)
        <button wire:click="$set('classId', {{$class->id}})" data-bs-toggle="modal" data-bs-target="#StudentDetailsModal">
            <ul style="display: flex; list-style: none; padding: 5px;">
                <li style="margin-right: 10px">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 43px">{{$class->class}}</h5>
                        </div>
                    </div>
                </li>
            </ul>
        </button>
    @endforeach

        <div wire:ignore.self class="modal fade" id="StudentDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Students</h5>
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
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
