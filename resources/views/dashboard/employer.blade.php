@extends('layouts.app')

@section('content')
<h1>{{ Auth::user()->name }}</h1>
<div>
    @foreach ($emprofile as $item)
        <div class="card p-3">
            <h5>Contact Number: {{$item->employer_num}}</h5>
            <h5>Address: {{$item->employer_address}}</h5>
            <h5>Industry: {{$item->employer_industry}}</h5>
        </div>
        <hr> 
        <div class="">
            <h3>Company Overview</h3>
            <p>{{$item->employer_overview}}</p>
            <h3>Benefits</h3>
            <p>{{$item->benefits}}</p>
            <h3>Work Hours</h3>
            <p>{{$item->work_hours}}</p>
        </div>
    @endforeach
</div>

<div>
    <a href="" class="btn btn-primary">Edit Profile</a>
</div>





    
@endsection