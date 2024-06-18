<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
        .div_center {
            text-align: center;
            margin: auto;
        }

        .cat_label {
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: white;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            border: 1px solid white;
        }

        th {
            background-color: skyblue;
            padding: 10px;
        }

        tr {
            border: 1px solid white;
            padding: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="div_center">
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">x</button>
                                </div>
                            @endif
                        </div>

                        <h1 class="cat_label">Add Category</h1>

                        <form action="{{ url('add_category') }}" method="POST">
                            @csrf
                            <span style="padding-right: 15px;">
                                <label>Category name</label>
                                <input type="text" name="category" required>
                            </span>
                            <input class="btn btn-primary" type="submit" value="Add Category">
                        </form>

                        <div>
                            <table class="center">
                                <tr>
                                    <th>Category name</th>
                                    <th>Action</th>
                                </tr>

                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->cat_title }}</td>
                                        <td>
                                            <a onclick="confirmation(event)" class="btn btn-danger"
                                                href="{{ url('cat_delete', $data->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.footer')

            <script>
                function confirmation(ev) {
                    ev.preventDefault();
                    var urlToredirect = ev.currentTarget.getAttribute('href');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = urlToredirect;
                        }
                    });
                }
            </script>
</body>

</html>
