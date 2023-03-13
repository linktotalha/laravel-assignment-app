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
                            <form id="updateForm">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" name="edit_name" class="form-control" id="">
                                    <span class="nameErr text-danger"></span>
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
                            <button type="button" id="updateCategory" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h3 class="text-center">Add Category</h3>
            <form id="submitForm">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="name" class="form-control" id="">
                    <span class="nameErr text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" class="form-control" id=""></textarea>
                    <span class="descErr text-danger"></span>
                </div>
                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row pt-4">
        <div class="col">
            <h3 class="text-center">Category List</h3>
            <table id="categories" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add data using ajax
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "{{ url('categories') }}",
                    data: $("#submitForm").serialize(),
                    success: function(res) {
                        if (res.errors) {
                            $(".nameErr").html(res.errors.name);
                            $(".descErr").html(res.errors.desc);
                        }
                        if (res.message) {
                            toastr.success(res.message);
                            $('#submitForm').trigger("reset");
                            $(".nameErr").html("");
                            $(".descErr").html("");
                            table.ajax.reload();
                        }
                    }
                });

            });

            var table = $('#categories').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('category-list') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'desc', name: 'desc'},
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return `<button data-id=${row.id} class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal" id="editCat">Edit</button>`
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

            // Edit Category display values in modal

            $(document).on('click', '#editCat', function() {
                var cat_id =  $(this).data('id');
                var url="{{url('/')}}/";
                $.ajax({
                    url: url+"categories"+"/"+cat_id+"/edit",
                    method: "GET",
                    data: {
                        "id": $(this).data('id')
                    },
                    success: function(res) {
                        $('input[name="edit_id"]').val(res.category.id);
                        $('input[name="edit_name"]').val(res.category.name);
                        $('textarea[name="edit_desc"]').val(res.category.desc);
                        $('#updateCategory').val(res.category.id);
                    }
                });
            });

            // Delete data using ajax
            $(document).on('click', '#deleteBtn', function() {
                var url = "{{url('/')}}/";
                var token = $("meta[name='csrf-token']").attr("content");
                if (confirm("Are you sure you want to delete??")) {
                    $.ajax({
                        url: url+"categories"+"/"+$(this).data('id'),
                        type: "DELETE",
                        data: {
                            "id": $(this).data('id'),
                            "_token":token
                        },
                        success: function(res) {
                            toastr.success(res.message);
                            table.ajax.reload();
                        }
                    });
                }
            });

            // update the category
            $(document).on('click','#updateCategory',function() {
                var url = "{{url('/')}}/";
                if(confirm('Are you sure you want to update')){
                    $.ajax({
                        method: 'PUT',
                        url: url+"categories"+"/"+$(this).val(),
                        data: $("#updateForm").serialize(),
                        success: function(res){
                            toastr.success(res.message);
                            table.ajax.reload();
                            $('#exampleModal').modal('hide');
                        }
                    });
                }
            });
        });
    </script>
@endsection
