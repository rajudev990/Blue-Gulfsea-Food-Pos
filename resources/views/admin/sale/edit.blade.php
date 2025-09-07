@extends('admin.layouts.app')

@section('title')
Update Sales
@endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Sales</h3>
                        @can('view sales')
                        <a href="{{ route('admin.sales.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.sales.update',$data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label for="shop_id">Shop<span class="text-danger">*</span></label>
                                <select name="shop_id" id="shop_id" class="form-control @error('shop_id') is-invalid @enderror" required>
                                    @foreach($shop as $item)
                                    <option value="{{$item->id}}" {{$data->shop_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('shop_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="customer_id">Customer<span class="text-danger">*</span></label>
                                <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror" required>
                                    @foreach($customer as $item)
                                    <option value="{{$item->id}}" {{$data->customer_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('customer_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="voucher_no">Voucher No <span class="text-secondary">(Optional)</span></label>
                                <input value="{{$data->voucher_no}}" type="number" name="voucher_no" id="voucher_no"
                                    class="form-control @error('voucher_no') is-invalid @enderror">
                                @error('voucher_no') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="sale_date">Sale Date <span class="text-danger">*</span></label>
                                <input value="{{$data->sale_date}}" type="date" name="sale_date" id="sale_date"
                                    class="form-control @error('sale_date') is-invalid @enderror" required>
                                @error('sale_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>



                            <div class="form-group col-lg-6">
                                <label for="vat">VAT (%) <span class="text-secondary">(Optional)</span></label>
                                <input value="{{$data->vat}}" type="number" name="vat" id="vat"
                                    class="form-control @error('vat') is-invalid @enderror">
                                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="price"> Price <span class="text-danger">*</span></label>
                                <input value="{{$data->price}}" type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" required>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
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