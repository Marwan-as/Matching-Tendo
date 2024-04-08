@extends('layouts.admin')

@section('title')
VIEW
@endsection

@section('content')


<div class="back-btn">
    <a href="{{ route('submitted-outfits') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </a>
</div>
<div class="view-cont">

    <h1>SUBMITTED BY: <span>{{ $outfit->user->name }}</span></h1>

    <h1>EMAIL: <span>{{ $outfit->user->email }}</span></h1>



    <div class="inner-cont">

        <img  class="top-img" src="/storage/img/{{ $outfit->top->img }}" alt="">

        <img class="bottom-img" src="/storage/img/{{ $outfit->bottom->img }}" alt="">
    </div>



</div>



@endsection
