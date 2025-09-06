@extends('shop.layouts.app')

@section('title')
Create Unit
@endsection
@section('shop')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Create Unit</h3>
                        @can('view unit')
                        <a href="{{ route('shop.units.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('shop.units.store') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body row">
                            

                            <div class="form-group col-lg-12">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-12">
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

@endsection