<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

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
    </style>

</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class ="page-header">


                <div class ="container-fluid">
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
                            <span style="padding-right:15px;">
                                <label>Category name</label>
                                <input type="text" name="category" required>
                            </span>
                            <input class="btn btn-primary" type="submit" value="Add Category">
                        </form>
                    </div>

                </div>


            </div>




            @include('admin.footer')
</body>

</html>
