<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Expired</title>
    <script>
        // Force redirect to login when session expires (419)
        window.location.href = "{{ route('login') }}";
    </script>
</head>
<body>
    <div style="font-family: sans-serif; text-align: center; padding: 50px;">
        <h1>Page Expired</h1>
        <p>Your session has expired. Redirecting to login...</p>
        <a href="{{ route('login') }}">Click here if you are not redirected</a>
    </div>
</body>
</html>
