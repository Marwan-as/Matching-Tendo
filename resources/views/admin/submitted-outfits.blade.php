@extends('layouts.admin')

@section('title')
    SUBMITTED OUTFITS
@endsection

@section('content')
    <table id="myTable">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Top Name</th>
                <th>Bottom Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outfits as $outfit)
            <tr>

                <td>{{ $outfit->user->name }}</td>
                <td>{{ $outfit->user->email }}</td>
                <td>{{ $outfit->top->name }}</td>
                <td>{{ $outfit->bottom->name }}</td>
                <td>
                    <a href="{{ route('outfits.show', $outfit->id)}}">
                        <button class="view-outfit">VIEW</button>
                    </a>
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
