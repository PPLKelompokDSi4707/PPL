<h1>Data User</h1>

<a href="/users/create">Tambah User</a>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

@foreach($users as $user)
<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>
    <td>
        <a href="/users/{{ $user->id }}/edit">Edit</a>

        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>