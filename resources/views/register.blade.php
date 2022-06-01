<html>
    <head>
        <title>Laravel PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    </head>
    <body>
        <div class="container mt-5">
            <h2>Register User</h2>
            <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="namelHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <input type="file" name="image" id='image' class='form-control p-5'>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script>
                const inputElement = document.querySelector('input[id="image"]');

                // Create a FilePond instance
                const pond = FilePond.create(inputElement);

                FilePond.setOptions({
                    server: {
                        url: "{{ route('upload.user') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token()}}'
                        }
                    }
                })
        </script>
    </body>
</html>
