@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="edit_name" class="form-control" id="">
                                    <input type="hidden" name="edit_id" class="form-control" id="">
                                    <span class="nameErr text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="edit_price" class="form-control" id="">
                                    <span class="priceErr text-danger"></span>
                                </div>
                
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-select" multiple="multiple" name="edit_category[]" id="edit_cat">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="catErr text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <div id="updateImg"></div>
                                    <input type="file" name="image[]" class="form-control" id="" multiple>
                                    <span class="imageErr text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="edit_desc" class="form-control" id=""></textarea>
                                    <span class="descErr text-danger"></span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="updatePro" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <label for="">Select Category</label>
                    <select class="form-select" multiple="multiple" name="category[]">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <span class="catErr text-danger"></span>
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

    <hr>
    <div class="row pt-4">
        <div class="col">
            <h3 class="text-center">Product List</h3>
            <table id="products" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Description</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add data using ajax

        $(document).ready(function() {

            $("#submitForm").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "{{ url('products') }}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.errors) {
                            $(".nameErr").html(res.errors.name);
                            $(".priceErr").html(res.errors.price);
                            $(".catErr").html(res.errors.category);
                            $(".imageErr").html(res.errors.image);
                            $(".descErr").html(res.errors.desc);
                        }
                        if (res.message) {
                            toastr.success(res.message);
                            $('#submitForm').trigger("reset");
                            table.ajax.reload();
                        }
                    }
                });

                
            });

            // get products from data ajax

            var table = $('#products').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('product-list') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'desc', name: 'desc'},
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return `<button data-id=${row.id} class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal" id="editPro">Edit</button>`
                        }
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return `<button data-id=${row.id} class="btn btn-sm btn-danger" id="deleteBtn">Delete</button>`
                        }
                    },
                ],
            });

            // Delete Product using ajax

            $(document).on('click', '#deleteBtn', function() {
                var url = "{{url('/')}}/";
                var token = $("meta[name='csrf-token']").attr("content");
                if (confirm("Are you sure you want to delete??")) {
                    $.ajax({
                        url: url+"products"+"/"+$(this).data('id'),
                        type: "DELETE",
                        data: {
                            "id": $(this).data('id'),
                            "_token":token
                        },
                        success: function(res) {
                            console.log(res);
                            toastr.success(res.message);
                            table.ajax.reload();
                        }
                    });
                }
            });

            // Edit Products

            $(document).on('click', '#editPro', function() {
                var cat_id =  $(this).data('id');
                var url="{{url('/')}}/";
                $.ajax({
                    url: url+"products"+"/"+cat_id+"/edit",
                    method: "GET",
                    data: {
                        "id": $(this).data('id')
                    },
                    success: function(res) {
                        $("#edit_cat option").each(function(index,element){
                            $(res.product[0].categories).each(function(i,e){
                                if(parseInt(element.value) == e.category_id){
                                    $('#edit_cat').append( '<option value="'+element.value+'" selected>'+$("#edit_cat option[value="+element.value+"]").text()+'</option>' );
                                }


                         });

                        });
                        $('input[name="edit_id"]').val(res.product[0].id);
                        $('input[name="edit_name"]').val(res.product[0].name);
                        $('input[name="edit_price"]').val(res.product[0].price);
                        $('textarea[name="edit_desc"]').val(res.product[0].desc);
                    }
                });
            });

            $(document).on('click','#updatePro',function() {
                var url="{{url('/')}}/";
                if(confirm('Are you sure you want to update')){
                   
                    $.ajax({
                        url: url+"products"+"/"+$(this).val(),

                        data: $("#updateForm").serialize(),
                        success: function(res){
                            console.log(res);
                            table.ajax.reload();
                            $('#exampleModal').modal('hide');
                        }
                    });
                }
            });

            // 


        });



        
    </script>
@endsection
