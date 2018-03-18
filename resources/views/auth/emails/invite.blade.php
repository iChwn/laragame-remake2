<p>
	Hallo{{ $admin->name }}
</p>
<p>
	Admin kami telah mendaftarkan email Anda {{ $admin->email }} ke Larapus. Untuk Login,
Silahkan kunjungi <a href="{{ $login = url('/admin-l') }}"></a>. Login dengan email Anda dan Password
<strong> {{$password}} </strong>
</p>

<p>
	Jika Anda ingin mengubah password, silahkan kunjungi 
	<a href="{{ $reset = url('password/reset') }}"> {{$reset}} </a> dan masukan Email Anda
</p>