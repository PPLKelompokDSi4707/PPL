<h1>Edit User</h1>

<form method="POST" action="/users/{{ $user->id }}">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $user->name }}">
<input type="email" name="email" value="{{ $user->email }}">

<select name="role">
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
</select>

<button type="submit">Update</button>
</form>