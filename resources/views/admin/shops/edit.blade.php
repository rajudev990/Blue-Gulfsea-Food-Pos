@extends('admin.layouts.app')
@section('title')Update Shop @endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Shop</h3>
                        @can('view shop')
                        <a href="{{ route('admin.shops.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.shops.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label for="name">Shop Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                             <div class="form-group col-lg-6">
                                <label for="email">Shop Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone">Shop Phone <span class="text-black-50">(optional)</span></label>
                                <input type="phone" id="phone" name="phone" value="{{ $data->phone }}" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="address">Shop Address <span class="text-black-50">(optional)</span></label>
                                <input type="address" id="address" name="address" value="{{ $data->address }}" class="form-control @error('address') is-invalid @enderror">
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                             <div class="form-group col-lg-6">
                                <label for="status">Shop Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ $data->status==1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $data->status==0 ? 'selected' : '' }}>InActive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="image">Image <span class="text-black-50">(optional)</span></label>
                                <input type="file" id="image" name="image" value="{{ $data->image }}" class="form-control p-1 @error('image') is-invalid @enderror">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                <div class="mt-2">
                                    @if($data->image)
                                    <img src="{{ Storage::url($data->image) }}" id="preview-image" alt="" style="width:100px;height:100px;border:1px dashed #000;">
                                    @else 
                                    <img src="" id="preview-image" alt="" style="display: none;width:100px;height:100px;border:1px dashed #000;">
                                    @endif
                                </div>
                            </div>
                           
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection