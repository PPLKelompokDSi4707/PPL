<h1>Data User</h1>

@foreach($users as $user)
<p>{{ $user->name }} - {{ $user->email }} - {{ $user->role }}</p>
@endforeach