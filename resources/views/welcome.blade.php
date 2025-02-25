<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <table>
    <thead>
        <th>
            vb
        </th>
        <th>dfd</th>

        <th>
            dx
        </th>
        <th>xdg</th>
    </thead>
    <tbody>
        @foreach($location as $prod)
        <tr>
            <td>
                {{ $prod->id }}
            </td>
            <td>
                {{ $prod->country }}
            </td>
            <td>
                {{ $prod->village }}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</body>
</html>