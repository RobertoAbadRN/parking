<h1>Welcome to our platform</h1>
<p>Dear {{ $user->name }},</p>
<p>Your account has been successfully created. Here are your login details:</p>
<ul>
    <li>Username: {{ $user->user }}</li>
    <li>Email: {{ $user->email }}</li>
    <li>Password: {{ $user->password }}</li>
</ul>
<p>Please keep this information safe and secure.</p>
<p>Thank you for joining us!</p>
