<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>

    <!-- Include CSS -->
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

        .form_container {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            border: 1px solid white;
            background-color: #f5f5f5;
        }

        .form_container input[type="text"] {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form_container input[type="submit"] {
            margin-top: 20px;
        }

        .alert {
            margin-bottom: 20px;
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

                        <h1 class="cat_label">Edit Category</h1>

                        <div class="form_container">
                            <!-- Formulir Edit Kategori -->
                            <form action="{{ url('update_category', $data->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <div>
                                    <label for="category">Category Name</label>
                                    <input type="text" name="cat_name" id="category" value="{{ $data->cat_title }}"
                                        required>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Update Category">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>
