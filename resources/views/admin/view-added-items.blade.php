@extends('layouts.admin')

@section('title')
VIEW ADDED
@endsection

@section('content')

<div class="add-new-cont">

    <div class="center-cont">
        <h1>VIEW ITEM</h1>
        <h2>NAME: <span>{{$item->name}}</span></h2>
        <h2>TYPE: <span>{{$item->type}}</span></h2>
        <img src="/storage/img/{{$item->img}}" alt="">
    </div>

</div>



@endsection
