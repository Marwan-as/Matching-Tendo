@extends('layouts.user')

@section('title')
    Matching Outfits
@endsection

@section('content')
    <main class="matching-outfits-cont">
        
        @auth
        <div class="submitted">
            <a href="{{ route('user.profile') }}">
                <button>{{ $user->name }}Submitted Outfits</button>
            </a>
        </div>
        @endauth

        <div class="left-section">

            <script type="text/javascript">
                function alert()
                msg = "Please Login to submit your desired outfit!";
                alert(msg);
            </script>

            <form action="{{ route('outfits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                <img class="main-img-top" src="" alt="">
            </div>
            <div class="bottom-image">
                <img class="main-img" src="" alt="">
            </div>
        </div>
    </main>

        <div class="btn">
            <button @auth type="submit" @else onclick="alert()" type="button" @endauth class="submit-btn">SUBMIT</button>
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
