
{{--  @section('content')  --}}

<head>
    <title>TENDO-VIEW OUTFIT</title>
        @include('partials._scripts-dash')
        @include('partials._scripts')
</head>

        @include('partials._header')

<div class="back-btn">
    <a href="{{ route('user.profile') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </a>
</div>
<div class="view-cont">

    <h1>Top: <span>{{ $outfit->top->name }}</span></h1>

    <h1>Bottom: <span>{{ $outfit->bottom->name }}</span></h1>

    <div class="inner-cont">

        <img  class="top-img" src="/storage/img/{{ $outfit->top->img }}" alt="">

        <img class="bottom-img" src="/storage/img/{{ $outfit->bottom->img }}" alt="">
    </div>

</div>

@include('partials._footer')



{{--  @endsection  --}}
