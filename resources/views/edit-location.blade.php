<!-- resources/views/edit-location.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .product-form {
            border: .125rem solid;
            padding: 1.5rem 1rem;
            border-radius: .5rem;
        }

        .heading {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .inputs {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .input {
            display: flex;
            align-items: center;
        }

        .input label {
            position: absolute;
            transform: translateY(-2.25em);
            background-color: black;
            color: whitesmoke;
            padding: .25rem .5rem;
            border-radius: .5rem;
            font-size: x-small;
        }

        .input input {
            padding: .5rem .75rem;
            border: none;
            border-bottom: .125rem solid;
        }

        .update-btn {
            width: 100%;
            padding: .5rem 0;
            background-color: transparent;
            border-radius: .25rem;
            border: .125rem solid black;
        }

        .update-btn:hover {
            background-color: black;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-form">
            <h2 class="heading">Edit Location</h2>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/update-location/' . $location->id) }}" method="POST">
                @csrf
                <div class="inputs">
                    <div class="input country">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" value="{{ $location->country }}" required>
                    </div>
                    <div class="input district">
                        <label for="district">District (Optional)</label>
                        <input type="text" name="district" id="district" value="{{ $location->district }}">
                    </div>
                    <div class="input village">
                        <label for="village">Village</label>
                        <input type="text" name="village" id="village" value="{{ $location->village }}" required>
                    </div>
                    <div class="input url">
                        <label for="image_url">Image URL</label>
                        <input type="url" name="image_url" id="image_url" value="{{ $location->image_url }}" required>
                    </div>
                </div>
                <button type="submit" class="update-btn">Update Location</button>
            </form>
        </div>
    </div>
</body>
</html>
