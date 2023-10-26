<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        h2 {
            color: #007BFF;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dear Resident: {{ $user->name }},</h2>
        <p>{!! nl2br($emailContent) !!}</p>
        <p><a href="{{ $linkEnglish }}">Link in English</a></p>
        <br><p><a href="{{ $linkSpanish }}">Link in Spanish</a></p>
    </div>
</body>
</html>