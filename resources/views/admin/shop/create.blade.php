@extends('admin.layouts.app')

@section('title')
Create shops
@endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Create shops</h3>
                        @can('view shop')
                        <a href="{{ route('admin.shops.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.shops.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control @error('Phone') is-invalid @enderror" required>
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>



                            <div class="form-group col-lg-12">
                                <label for="address">Address </label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="password">Password </label>
                                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="image">Image </label>
                                <input type="file" name="image" id="image" class="  p-1 form-control @error('image') is-invalid @enderror">
                                <img id="preview-image" src="#" width="80px" height="70px" class="mt-2 d-none" alt="Preview">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let preview = document.getElementById('preview-image');
            preview.src = e.target.result;
            preview.classList.remove('d-none'); // Hide remove kore show korbe
        }
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>

@endsection
@endsection