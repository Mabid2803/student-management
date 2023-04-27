<div>
    <div  style="margin-top: 5px; width: 40%" class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left"><strong>All Classes</strong></h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal"
                                style="float: right">Add New Class
                        </button>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}
                                <button style="float: right" type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">X</button>
                            </div>
                        @endif
                        <table class="table table-bordered" style="text-align: center">
                            <thead class="table-dark" >
                            <tr>
                                <th scope="col">Class</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($classes->count() > 0)
                                @foreach($classes as $classesData)
                                    <tr>
                                        <td>{{$classesData->class}}</td>
                                        <td style="text-align: center">
                                            <button class="btn btn-sm btn-danger delete" onclick="return confirm('Are you sure delete category?')" wire:click="deleteClass({{ $classesData->id }})">Delete</button>
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
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeClassData">
                        <div style="margin-top: 5px" class="form-group row">
                            <label for="className" class="col-3">Class:</label>
                            <div class="col-9">
                                <input type="text" id="className" class="form-control" wire:model="class_name">
                                @error('class_name')
                                <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 5px" class="form-group row">
                            <div class="col-9">
                                <button type="submit" data-bs-dismiss="modal" aria-hidden="true" style="background-color: green" class="btn btn-success">Add Class</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
