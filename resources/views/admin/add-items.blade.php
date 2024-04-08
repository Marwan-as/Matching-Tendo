@extends('layouts.admin')

@section('title')
    ADD ITEMS
@endsection

@section('content')
    <div class="add-items">
        <h1>ADD ITEMS</h1>
        <a href="{{ route('items.create') }}">
            <button class="btn-action">ADD NEW ITEM</button>
        </a>
    </div>

    <table id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>names</th>
                <th>image</th>
                <th>type</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img class="add-img" src="storage/img/{{ $item->img }}" alt="">
                    </td>
                    <td>{{ $item->type }}</td>
                    <td class="td-a">
                        <a href="{{ route('items.show', $item) }}">
                            <button class="btn-action">View</button>
                        </a>
                        <a href="{{ route('items.edit', $item) }}">
                            <button class="btn-action">Edit</button>
                        </a>
                        <form action="{{route('items.destroy', $item->id)}}"  method="POST" class="inline-form">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('ARE YOU SURE?')" class="btn-action red-bg">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
