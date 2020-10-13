@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-6 col-offset-3">
            <!-- List all the reservations -->
            <h3>Create New Student</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <ul>
                        <li class="alert alert-danger" style="color: #bb0000">{{ $error }}</li>
                    </ul>
                @endforeach
            @endif
            <form action="/students" method="post">
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Ruth">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">LastName</label>
                            <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Johnson">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender">ClassName</label>
                    <select name="classname" class="form-control" id="classname">
                        <option>Form 1A</option>
                        <option>Form 1B</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Select Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option>Female</option>
                        <option>Male</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Student Code</label>
                            <input name="studentcode" type="text" class="form-control" id="studentcode" placeholder="N0125590N">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input name="dob" type="text" class="form-control" id="dob" placeholder="DD/MM/YYYY">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-outline-success">CREATE</button>
                </form-group>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection