@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">About Text</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                            <p>{{ $message }}</p>

                        </div>

                    @endif

                        <form action="{{route('about.update.submit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{$about->title}}" name="title" placeholder="Enter Title" class="form-control">
                            </div>

                            <div class="form-group">

                                <textarea style="line-height: 22px;height: 200px;" placeholder="Enter Description" class="form-control" name="description" id="description" rows="5">{{$about->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$about->mission_vision_title}}" name="mission_vision_title" placeholder="Enter Mission and Vision Title" class="form-control">
                            </div>
                            <div class="form-group">

                                <textarea style="line-height: 22px;height: 200px;" placeholder="Enter Mission Vision Description" class="form-control" name="mission_vision_description" id="mission_vision_description" rows="5">{{$about->mission_vision_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('about.update')}}" class="btn iq-bg-danger">cancel</a>

                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">About Image
                            <button type="button" class="btn btn-primary btnView">Add New</button>
                        </h4>

                    </div>
                </div>
                <div class="iq-card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($about_images as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img width="150" src="{{asset($item->image)}}" alt="Image"></td>
                                <td>
                                    <button data-id="{{$item->id}}" type="button" class="btn btn-primary updateModal">Update</button>
                                    <a class="btn btn-danger" href="#" onclick="return checkDelete('{{route('about.image.delete',$item->id)}}')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                {{$about_images->links()}}
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
{{-- new image modal--}}
    <div class="modal fade bd-example-modal-lg" id="about_image" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New About Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('about.image.submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{--about image update--}}
    <div class="modal fade bd-example-modal-lg" id="about_image_update" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update About Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('about.image.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_image_id" id="update_image_id">
                        <div class="form-group">
                            <div class="custom-file">
                                <input required type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('additionalJS')
    <script>
        $(function() {
            $('.btnView').click(function () {
                $('#about_image').modal('show');
            });
            $('.updateModal').click(function () {
                $('#about_image_update').modal('show');

                var id = $(this).data('id');
                $('#update_image_id').val(id);


            });
        });
    </script>
@endsection

