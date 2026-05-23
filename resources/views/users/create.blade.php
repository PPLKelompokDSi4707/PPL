<h1>Tambah User</h1>

<form method="POST" action="/users">
@csrf

<input type="text" name="name" placeholder="Nama">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">

<select name="role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
</select>

<button type="submit">Simpan</button>
</form>