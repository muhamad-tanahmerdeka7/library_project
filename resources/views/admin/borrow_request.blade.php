<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .center {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 60px;
        }

        th {
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
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

                    <table class="center">
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Book Title</th>
                            <th>Quantity</th>
                            <th>Borrow Status</th>
                            <th>Book Image</th>
                        </tr>

                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->user->email }}</td>
                                <td>{{ $data->user->phone }}</td>
                                <td>{{ $data->book->title }}</td>
                                <td>{{ $data->book->quantity }}</td>
                                <td>{{ $data->status }}</td>

                                <td>
                                    <img style="height: 120 px; width: 80x;" src="book/{{ $data->book->book_img }}"
                                        alt="">
                                </td>


                            </tr>
                        @endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>



    @include('admin.footer')
</body>

</html>
