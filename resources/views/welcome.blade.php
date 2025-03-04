<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            line-height: 1.6;
            
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            padding: 2rem;
        }

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-bottom: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .product-form {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
        }

        .mb {
            margin-bottom: 1.25rem;
            position: relative;
        }

        label {
            font-size: 0.9rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
            color: #444;
        }

        input[type="text"], input[type="url"] {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 0.375rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border-color 0.2s ease;
        }

        input[type="text"]:focus, input[type="url"]:focus {
            outline: none;
            border-color: #007bff;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                max-width: 100%;
            }

            .product-form {
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.25rem;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($location as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->country }}</td>
                        <td>{{ $prod->village }}</td>
                        <td>
                        <a href="{{ url('/edit-location/' . $prod->id) }}" class="btn btn-primary">
                          <button style="border: none; border-radius: .25rem; padding: .25rem .5rem; background-color: #007bff; color: whitesmoke;">Edit</button></a>
                          <form action="{{ url('/delete-location/' . $prod->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                    @method('DELETE') 
    <button type="submit" style="border: none; border-radius: .25rem; padding: .25rem .5rem; background-color: red; color: whitesmoke;">
        Delete
    </button>
</form>

                       </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="product-form">
            <h2>Product List</h2>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/store-location') }}" method="POST">
                @csrf

                <div class="mb">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" required>
                </div>

                <div class="mb">
                    <label for="district">District (Optional)</label>
                    <input type="text" name="district" id="district">
                </div>

                <div class="mb">
                    <label for="village">Village</label>
                    <input type="text" name="village" id="village" required>
                </div>

                <div class="mb">
                    <label for="image_url">Image URL</label>
                    <input type="url" name="image_url" id="image_url" required>
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
