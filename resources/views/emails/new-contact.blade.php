<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact</title>
</head>
<body>
    <table>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key }}:</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>