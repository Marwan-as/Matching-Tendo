@extends('layouts.user')

@section('title')
    Matching Outfits
@endsection

@section('content')
<div class="back-btn">
    <a href="{{ route('user.profile') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </a>
</div>
    <main class="matching-outfits-cont">
        <div class="left-section">
            <form action="{{ route('user.update', $outfit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="categories">
                    <li class="top">TOP</li>
                    <li class="bottom">BOTTOM</li>
                </ul>

                <ul class="items-to-select top-items">
                    @foreach ($top as $top)
                        <li>
                            <label for="{{ $top->id }}">
                                <img src="/storage/img/{{ $top->img }}" alt="">
                                <input  type="radio" name="top" value="{{ $top->id }}" id="{{ $top->id }}" hidden>
                            </label>
                        </li>
                    @endforeach
                </ul>

                <ul class="items-to-select bottom-items">
                    @foreach ($bottom as $bottom)
                        <li>
                            <label for="{{ $bottom->id }}">
                                <img src="/storage/img/{{ $bottom->img }}" alt="">
                                <input  type="radio" name="bottom" value="{{ $bottom->id }}" id="{{ $bottom->id }}" hidden>
                            </label>
                        </li>
                    @endforeach
                </ul>

        </div>

        <div class="right-section">
            <div class="top-image">
                <img class="main-img-top" src="/storage/img/{{ $outfit->top->img }}" alt="">
            </div>
            <div class="bottom-image">
                <img class="main-img" src="/storage/img/{{ $outfit->bottom->img }}" alt="">
            </div>
        </div>
    </main>

    <div class="btn">
        <button type="submit" class="submit-btn">Update</button>
    </div>
    </form>

    <script>
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $( "#save-resource" ).click(function() {
        // $.ajax({
        //         url: '{{ env('APP_URL') }}/',
        //         type: 'POST',
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "top_id": "{{ $top->id }}",
        //             "bottom_id": "{{ $bottom->id }}",
        //         },
        //         success: function (result) {
        //             swal("Saved", "This resource was added to your list of saved resources", "success")
        //         },
        //         error: function (result) {
        //             swal(({
        //         title: "Oops",
        //         text: "We ran into an issue trying to save this resource",
        //         icon: "error",
        //         button: "Dismiss",
        //     }))
        //         }
        //     });
        // });

        const bottom = document.querySelector(".bottom");
        const topText = document.querySelector(".top");
        const topItems = document.querySelector(".top-items");
        const bottomItems = document.querySelector(".bottom-items");

        topText.addEventListener("click", () => {
            topItems.classList.add("open-items-top");
        });
        bottom.addEventListener("click", () => {
            topItems.classList.remove("open-items-top");
        });
        bottom.addEventListener("click", () => {
            topItems.classList.add("close-items-top");
        });
        bottom.addEventListener("click", () => {
            bottomItems.classList.add("open-items-bottom");
        });
        topText.addEventListener("click", () => {
            bottomItems.classList.remove("open-items-bottom");
        });
        topText.addEventListener("click", () => {
            bottomItems.classList.add("close-items-bottom");
        });

        document.querySelectorAll(".top-items li img").forEach(image => {
            image.onclick = () => {
                document.querySelector('.main-img-top').src = image.getAttribute('src');
            }
        });
        document.querySelectorAll(".bottom-items li img").forEach(image => {
            image.onclick = () => {
                document.querySelector('.main-img').src = image.getAttribute('src');
            }
        });
    </script>
@endsection
