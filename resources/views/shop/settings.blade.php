@extends('shop.layouts.app')
@section('title')
Profile Setting
@endsection

@section('shop')


<section class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-7 m-auto">
                <!-- jquery validation -->
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Profile Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('shop.profile.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            @if ($errors->any())
                            <ul class="mb-3">
                                @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif


                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ auth('shop')->user()->name }}" readonly required>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ auth('shop')->user()->email }}" readonly required>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ auth('shop')->user()->phone }}" required>
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ auth('shop')->user()->address }}" required>
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Profile Image</label>


                                <!-- File Input -->
                                <input type="file" value="{{ auth('shop')->user()->image }}"
                                    class="form-control p-1 @error('image') is-invalid @enderror"
                                    name="image"
                                    id="image"
                                    accept="image/*">

                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!-- Preview New Image -->
                                <!-- Current Stored Image -->
                                @if(auth('shop')->user()->image)
                                <div class="mt-2">
                                    <img id="preview-image" src="{{ Storage::url(auth('shop')->user()->image) }}"
                                        alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                </div>
                                @else
                                <div class="mt-2">
                                    <img id="preview-image" src=""
                                        alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                </div>
                                @endif

                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

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
@endsection