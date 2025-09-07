@extends('admin.layouts.app')

@section('title')
Create Purchase
@endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Create Purchase</h3>
                        @can('view purchase')
                        <a href="{{ route('admin.purchases.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.purchases.store') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label for="shop_id">Shop<span class="text-danger">*</span></label>
                                <select name="shop_id" id="shop_id" class="form-control @error('shop_id') is-invalid @enderror" required>
                                    @foreach($shop as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('shop_id') <span class="text-danger">{{$message}}</span> @enderror
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
                                <label for="product_date">Product Date <span class="text-secondary">(Optional)</span></label>
                                <input type="date" name="product_date" id="product_date"
                                    class="form-control @error('product_date') is-invalid @enderror" >
                                @error('product_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="qty">Quantity <span class="text-secondary">(Optional)</span></label>
                                <input type="number" name="qty" id="qty"
                                    class="form-control @error('qty') is-invalid @enderror" >
                                @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="buy_price">Buy Price <span class="text-danger">*</span></label>
                                <input type="number"  name="buy_price" id="buy_price"
                                    class="form-control @error('buy_price') is-invalid @enderror" required>
                                @error('buy_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="vat">VAT (%) <span class="text-secondary">(Optional)</span></label>
                                <input type="number"  name="vat" id="vat"
                                    class="form-control @error('vat') is-invalid @enderror" >
                                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="final_price">Final Price <span class="text-danger">*</span></label>
                                <input type="number"  name="final_price" id="final_price"
                                    class="form-control @error('final_price') is-invalid @enderror" required>
                                @error('final_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="per_product_price">Per Product Price <span class="text-danger">*</span></label>
                                <input type="number"  name="per_product_price" id="per_product_price"
                                    class="form-control @error('per_product_price') is-invalid @enderror" required>
                                @error('per_product_price') <span class="text-danger">{{ $message }}</span> @enderror
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

@endsection