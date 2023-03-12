@extends('layouts.frontend')


@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h3 class="text-center">Product Detail</h3>
        </div>
        <hr>
        <div class="col-md-6">
            @foreach ($product->images as $image)
                <img src="{{ asset('images/' . $image->image) }}" height="250" width="250" />
            @endforeach
        </div>
        <div class="col-md-6">
            <strong>Name:</strong> {{ $product->name }}<br>
            <strong>Categories:</strong>
            @foreach ($product->categories as $cat)
                {{ $cat->name }},
            @endforeach
            <br>
            <strong>Price:</strong> {{ $product->price }}<br>
            <strong>Description:</strong> {{ $product->desc }}<br>
        </div>
        <hr>
        <div class="col-md-6">
            <h3>Add Comments</h3>
            @if (Auth::check())
                <form id="comment-form">
                    @csrf
                    <label>Add Comment</label><br>
                    <input type="hidden" name="pro_id" value="{{ $product->id }}">
                    <textarea name="comment" id="comment"></textarea><br>
                    <span class="commentErr text-danger"></span>
                    <button class="btn btn-primary">Add</button>
                </form>
            @endif
        </div>

        <div class="col-md-6">
            <div id="comments">
                <h3>All comments</h3>
            </div>
        </div>
    </div>

    <hr>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#comment-form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                console.log(formData)

                $.ajax({
                    url: "{{ url('add_comment') }}",
                    type: 'POST',
                    data: formData,
                    success: function(res) {
                        if (res.error) {
                            $('.commentErr').html(res.error.comment);
                        }
                        if (res.message) {
                            toastr.success(res.message);
                            $('#comment-form').trigger('reset');
                            loadcomments();
                        }
                    }
                });
            });

            // load comments
            function loadcomments() {
                $.ajax({
                    url: "{{ url('comments') }}"+"/"+ "{{$product->id}}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Iterate over the comments and display them in the container
                        $.each(data.comments, function(i, c) {
                            console.log(c.users)
                            $('#comments').append(
                                '<div><strong>' + c.users.name + '</strong></div>'+
                                '<div>' + c.comment + '</div>'+
                                '<hr>'
                                );
                        });
                    }
                });
            }
            loadcomments();
        });
    </script>
@endsection
