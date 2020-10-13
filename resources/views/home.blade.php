@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-3">
               @include('layouts.navigation')
           </div>
           <div id= "show_content" class="col-md-9 col-offset-3">
               <!-- List all the reservations -->
               <h3>Latest Reservations</h3>
           </div>
       </div>
   </div>
@endsection
