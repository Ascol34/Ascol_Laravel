<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      min-height: 100vh;
    }

    table {
      border: .125rem solid;
      border-collapse: collapse;
      margin-bottom: 2rem;

      th {
        border: .125rem solid;
        padding: .25rem 1rem;
      }
      td {
        border: .0625rem solid;
      }
    }

    form {
      border: .125rem solid;
      border-radius: .5rem;
      padding: 2rem 1rem;
    }

    mb {
      display: flex;
      align-items: center;
      position: relative;
    }

    form label {
      position: absolute;
      transform: translateY(-.125rem);
      transform: translateX(.5rem);
      border-radius: .5rem;
      background-color: black;
      color: whitesmoke;
      font-size: x-small;
      padding: .125rem .25rem;
    }

    form input {
      padding: .5rem 1rem;
      margin: .25rem;
    }

    form button {
      background-color: transparent;
      padding: .25rem .75rem;
      border: .125rem solid;
      border-radius: .25rem;
    }
    </style>
</head>
<body>
  <div class="container">
    <table>
        <thead class="table-head">
            <th>S.N</th>
            <th>Name</th>
            <th>Desc</th>
        </thead>
        <tbody>
        @foreach($location as $prod)
        <tr>
          <td>{{ $prod->id }}</td>
          <td>{{ $prod->country }}</td>
          <td>{{ $prod->village }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <div class="product-form">
    <h2>Product List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ url('/store-location') }}" method="POST">
    @csrf
    <div class="mb">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="country" id="country" class="form-control" required>
    </div>

    <div class="mb">
        <label for="district" class="form-label">District (Optional)</label>
        <input type="text" name="district" id="district" class="form-control">
    </div>

    <div class="mb">
        <label for="village" class="form-label">Village</label>
        <input type="text" name="village" id="village" class="form-control" required>
    </div>

    <div class="mb">
        <label for="image_url" class="form-label">Image URL</label>
        <input type="url" name="image_url" id="image_url" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>