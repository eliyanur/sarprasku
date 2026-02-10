<h1>Dashboard Petugas</h1>
<p>Halo Petugas</p>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" style="background:red;color:white;padding:5px 10px;border:none;border-radius:5px;">
        Logout
    </button>
</form>
