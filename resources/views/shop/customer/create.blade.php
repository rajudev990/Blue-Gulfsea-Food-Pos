@extends('shop.layouts.app')
@section('title')Add Customer @endsection
@section('shop')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Customer</h3>

                        <a href="{{ route('shop.customers.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('shop.customers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="card-body row">

                            <div class="form-group col-lg-6">
                                <label for="name"> Name <span class="text-black-50">(optional)</span></label>
                                <input type="name" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email"> Email <span class="text-black-50">(optional)</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="phone"> Phone <span class="text-danger">*</span></label>
                                <input type="phone" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" required>
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="address"> Address <span class="text-black-50">(optional)</span></label>
                                <input type="address" id="address" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="status"> Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="image">Image <span class="text-black-50">(optional)</span></label>
                                <input type="file" id="image" name="image" value="{{ old('image') }}" class="form-control p-1 @error('image') is-invalid @enderror">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                <div class="mt-2">
                                    <img src="" id="preview-image" alt="" style="display: none;width:100px;height:100px;border:1px dashed #000;">
                                </div>
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