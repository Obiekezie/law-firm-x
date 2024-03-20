@extends('layouts.app')

@section('content')

<div class="container">


        <div class="row">
            @include('includes.sidebar')
            <div class="col-md-8">
                
            <h1>Welcome to {{ config('constants.options.company_name')}}</h1>
    
</div>
</div>
</div>





@endsection()
