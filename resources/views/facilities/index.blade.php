<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
</head>
<body>
    <h1>Facilities</h1>
    <ul>
        @foreach ($facilities as $facility)
            @if ($facility->name)
              <li>{{ $facility->name }}</li>
            @endif
        @endforeach
    </ul>
</body>
</html>