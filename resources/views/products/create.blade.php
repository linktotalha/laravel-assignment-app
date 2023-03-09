@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Add Product</h3>
            <form id="submitForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="">
                    <span class="nameErr text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" id="">
                    <span class="priceErr text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image[]" class="form-control" id="" multiple>
                    <span class="imageErr text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" class="form-control" id=""></textarea>
                    <span class="descErr text-danger"></span>
                </div>
                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        // Add data using ajax
        $.noConflict();

        $(document).ready(function() {

            $("#submitForm").on('submit',function(e){
                e.preventDefault();
                // var formData = new FormData(this);
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });


                $.ajax({
                    method: "POST",
                    url: "{{ url('products/create') }}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        console.log(res.errors);
                        if (res.errors) {
                            $(".nameErr").html(res.errors.name);
                            $(".priceErr").html(res.errors.price);
                            $(".imageErr").html(res.errors.image);
                            $(".descErr").html(res.errors.desc);
                        }
                        if (res.message) {
                            toastr.success(res.message);
                            $('#submitForm').trigger("reset");
                            // table.ajax.reload();
                        }
                    }
                });

                
            });

            // 

            // $("#submitBtn").click(function() {
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     console.log($("#submitForm").serialize());
            //     $.ajax({
            //         method: "POST",
            //         url: "{{ url('products/create') }}",
            //         data: $("#submitForm").serialize(),
            //         success: function(res) {
            //             console.log(res.errors);
            //             if (res.errors) {
            //                 $(".nameErr").html(res.errors.name);
            //                 $(".priceErr").html(res.errors.price);
            //                 $(".imageErr").html(res.errors.image);
            //                 $(".descErr").html(res.errors.desc);
            //             }
            //             if (res.message) {
            //                 toastr.success(res.message);
            //                 $('#submitForm').trigger("reset");
            //                 // table.ajax.reload();
            //             }
            //         }
            //     });

            // });
        });
    </script>
@endsection
