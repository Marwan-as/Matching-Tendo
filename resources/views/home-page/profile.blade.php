<head>
    <title>TENDO-{{ $user->name }} OUTFITS</title>
    @include('partials._scripts-dash')
    @include('partials._scripts')
</head>

    @include('partials._header')

    <div class="back-btn">
        <a href="{{ route('home') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>

@unless (count($outfits) == 0)

    <table id="myTable">
        <thead>
            <tr>
                <th>Top Name</th>
                <th>Bottom Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($outfits as $outfit)
            <tr>
                <td>{{ $outfit->top->name }}</td>
                <td>{{ $outfit->bottom->name }}</td>
                <td>
                    <a href="{{ route('user.show', $outfit->id)}}">
                        <button class="view-outfit">VIEW</button>
                    </a>
                    <form action="{{ route('user.destroy', $outfit->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-dark" type="submit" onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('user.edit', $outfit->id) }}">
                        <button class="btn btn-dark">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

        @else
        <div class="zero-outfits">
            <p>
                Zero Outfits Submitted
            </p>
        </div>
    </table>

@endunless

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

