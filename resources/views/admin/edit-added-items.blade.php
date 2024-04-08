@extends('layouts.admin')

@section('title')
    EDIT
@endsection

@section('content')
    <div class="add-new-cont">
        <div class="center-cont">
            <h1>EDIT ITEM</h1>
            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="name-cont">

                    <label for="name">ITEM NAME: &nbsp;</label>
                    <input required value="{{$item->name }}" type="text" name="name" class="item-name" placeholder="Item Name">

                </div>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
                <div class="select-cont">
                    <label for="type">ITEM TYPE: &nbsp;</label>
                    <select required name="type" id="type">

                        <option disabled>--Choose type--</option>
                        <option {{$item->type === 'top' ? 'selected':''}} value="top">Top</option>
                        <option {{$item->type === 'bottom' ? 'selected':''}} value="bottom">Bottom</option>
                    </select>

                </div>
                @error('type')
                    <div>{{ $message }}</div>
                @enderror

                <div class="pic-cont">
                    <label for="img">UPLOAD NEW IMAGE:&nbsp; </label>
                    <input type="file" name="img" >
                </div>
                @error('img')
                    <div>{{ $message }}</div>
                @enderror

                <label for="image">PREVIOUSLY UPLOADED: &nbsp;</label>

                <img name="image" src="/storage/img/{{ $item->img }}" alt="item">
                <button type="submit" class="btn-action">
                    SUBMIT
                </button>
            </form>



        </div>

    </div>
@endsection
