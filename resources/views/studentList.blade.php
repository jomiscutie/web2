@extends('base')
@section('title', 'Student Lists')

<div>
    <!-- Display Status Message -->
    @if(session('success'))
    <div class="alert alert-success" id="success">
        {{ Session::get('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" id="danger">
        {{ Session::get('error') }}
    </div>
    @endif

    <!-- Display Student Lists Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;"><strong>Student Lists</strong></h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#studentListsModal">
                            Add New Student
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td style="text-align: center;">{{ $student->id }}</td>
                                    <td style="text-align: center;">{{ $student->name }}</td>
                                    <td style="text-align: center;">{{ $student->age }}</td>
                                    <td style="text-align: center;">
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">
                                            Edit
                                        </button>
                                        
                                        <!-- Delete Form -->
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Student Modal -->
                                <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editStudentModalLabel">Edit Student</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="age" class="form-label">Age</label>
                                                        <input type="number" class="form-control" name="age" value="{{ $student->age }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="studentListsModal" tabindex="-1" aria-labelledby="studentListsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="studentListsModalLabel">Add New Student</h1>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" value="{{ old('age') }}" placeholder="Enter Age" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>