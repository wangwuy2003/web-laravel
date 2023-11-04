<a href="{{ route('course.create') }}">
    Thêm
</a>

<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Created At</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    @foreach($data as $each)
        <tr>
            <td>{{ $each->id }}</td>
            <td>{{ $each->name }}</td>
            <td>
                {{ $each->year_created_at }}
            </td>
            <td>
                <form action="{{ route('course.destroy', ['course' => $each->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
            <td>
                <a href="{{ route('course.edit', $each) }}">
                    Edit
                </a>
            </td>
        </tr>
    @endforeach
</table>
