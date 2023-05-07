

<p>Dear{{ $name }} your account register successfully from IIT</p>
<br>
<p>User Name: {{ $email }}</p><br>
<p>Password: {{ $password }}</p><br>
<p>Please click this button to verify your email  <a href="{{ route('verify.email', ['v_code' => $v_code, 'email' => $email]) }}"><button>Verify</button></a>

</p>