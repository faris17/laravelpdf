<html>
    <head>
        <title>Laravel PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-5">
            <form action="{{ route('user.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button class="btn btn-info" class="form-control"> Upload</button>
            </form>
            <a href="{{ route('user.pdf') }}">
                <button class='btn btn-primary'>Generate PDF</button>
            </a>
            &nbsp;
            <a href="{{ route('user.export')}}">
                <button class='btn btn-success'>Excel</button>
            </a>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $row)
                      <tr>
                          <td>{{$row->id}}</td>
                          <td><a href="{{route('user.product', $row->id)}}" target="_blank">{{$row->name}}</a></td>
                          <td>{{$row->email}}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>

        </div>

    </body>
</html>
