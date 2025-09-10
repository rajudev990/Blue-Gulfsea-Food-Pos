@extends('shop.layouts.app')

@section('title')
Update Purchase
@endsection
@section('shop')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Purchase</h3>
                        @can('view purchase')
                        <a href="{{ route('shop.purchases.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('shop.purchases.update',$data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">


                         <div class="form-group col-lg-6">
                                <label for="product_id">Product<span class="text-danger">*</span></label>
                                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                                    @foreach($product as $item)
                                    <option value="{{$item->id}}" {{$data->product_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="unit_id">Unit<span class="text-danger">*</span></label>
                                <select name="unit_id" id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" required>
                                    @foreach($unit as $item)
                                    <option value="{{$item->id}}" {{$data->unit_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('unit_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="product_date">Purchase Date <span class="text-secondary">(Optional)</span></label>
                                <input value="{{$data->product_date}}" type="date" name="product_date" id="product_date"
                                    class="form-control @error('product_date') is-invalid @enderror">
                                @error('product_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="qty">Quantity <span class="text-danger">*</span></label>
                                <input value="{{$data->qty}}" type="number" name="qty" id="qty"
                                    class="form-control @error('qty') is-invalid @enderror" required>
                                @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="buy_price">Buy Price <span class="text-danger">*</span></label>
                                <input value="{{$data->buy_price}}" type="number" name="buy_price" id="buy_price"
                                    class="form-control @error('buy_price') is-invalid @enderror" required>
                                @error('buy_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="vat">VAT (%) <span class="text-secondary">(Optional)</span></label>
                                <input value="{{$data->vat}}" type="number" name="vat" id="vat"
                                    class="form-control @error('vat') is-invalid @enderror">
                                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="final_price">Final Price <span class="text-danger">*</span></label>
                                <input value="{{$data->final_price}}" type="number" name="final_price" id="final_price"
                                    class="form-control @error('final_price') is-invalid @enderror" required>
                                @error('final_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="per_product_price">Per Product Price <span class="text-danger">*</span></label>
                                <input value="{{$data->per_product_price}}" type="number" name="per_product_price" id="per_product_price"
                                    class="form-control @error('per_product_price') is-invalid @enderror" required>
                                @error('per_product_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{$data->status==1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$data->status==0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
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