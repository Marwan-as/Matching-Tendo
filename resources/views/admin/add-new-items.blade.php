@extends('layouts.admin')

@section('title')
    ADD
@endsection

@section('content')
    <div class="add-new-cont">
        <div class="center-cont">
            <h1>ADD ITEM</h1>
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name-cont">

                    <label for="name">ITEM NAME: &nbsp;</label>
                    <input required type="text" name="name" class="item-name" placeholder="Item Name">

                </div>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror

                <div class="select-cont">
                    <label for="type">ITEM TYPE: &nbsp;</label>
                    <select required name="type" id="type">

                        <option selected disabled>--Choose type--</option>
                        <option value="top">Top</option>
                        <option value="bottom">Bottom</option>
                    </select>

                </div>
                @error('type')
                    <div>{{ $message }}</div>
                @enderror
                <div class="pic-cont">
                    <label for="img">ITEM IMAGE:&nbsp; </label>
                    <input type="file" name="img" required>
                </div>
                @error('img')
                    <div>{{ $message }}</div>
                @enderror
                <button type="submit" class="btn-action">
                    SUBMIT
                </button>
            </form>



        </div>

    </div>
@endsection
