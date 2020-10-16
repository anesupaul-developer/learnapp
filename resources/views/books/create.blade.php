@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.navigation')
        </div>
        <div id="show_content" class="col-md-6 col-offset-3">
            <!-- List all the reservations -->
            <h3>Create New Book</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <ul>
                        <li class="alert alert-danger" style="color: #bb0000">{{ $error }}</li>
                    </ul>
                @endforeach
            @endif
            <form action="/books" method="post">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="The Rise of Xhaka Zulu">
                    </div>  

                    <div class="form-group col-md-12">
                        <label for="author">Author</label>
                        <input name="author" type="text" class="form-control" id="author" placeholder="Charles Mungwadi">
                    </div>  

                    <div class="form-group col-md-12">
                        <label for="barcode">BarCode</label>
                        <input name="barcode" type="text" class="form-control" id="title" placeholder="T009876M">
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