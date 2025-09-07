@extends('admin.layouts.app')

@section('title')
Create Stock
@endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Create Stock</h3>
                        @can('view stock')
                        <a href="{{ route('admin.stocks.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.stocks.store') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label for="sale_id">Sale<span class="text-danger">*</span></label>
                                <select name="sale_id" id="sale_id" class="form-control @error('sale_id') is-invalid @enderror" required>
                                    @foreach($sale as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('sale_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="product_id">Product<span class="text-danger">*</span></label>
                                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                                    @foreach($product as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="unit_id">Unit<span class="text-danger">*</span></label>
                                <select name="unit_id" id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" required>
                                    @foreach($unit as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('unit_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="qty">Quantity <span class="text-secondary">(Optional)</span></label>
                                <input type="number" name="qty" id="qty"
                                    class="form-control @error('qty') is-invalid @enderror">
                                @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="price"> Price <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" required>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
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