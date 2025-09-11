@extends('shop.layouts.app')

@section('title')
Create Purchase
@endsection
@section('shop')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Create Purchase</h3>
                        @can('view purchase')
                        <a href="{{ route('shop.purchases.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('shop.purchases.store') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body row">


                        <div class="form-group col-lg-6">
                                <label for="product_id">Product Name<span class="text-danger">*</span></label>
                                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                                    @foreach($product as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="unit_id">Unit Name<span class="text-danger">*</span></label>
                                <select name="unit_id" id="unit_id" class="form-control @error('unit_id') is-invalid @enderror" required>
                                    @foreach($unit as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('unit_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="purchases_date">Purchase Date <span class="text-danger">*</span></label>
                                <input type="date"  value="{{ date('Y-m-d') }}"  name="purchases_date" id="purchases_date"
                                    class="form-control @error('purchases_date') is-invalid @enderror" required>
                                @error('purchases_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="qty">Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="qty" id="qty"
                                    class="form-control @error('qty') is-invalid @enderror" required>
                                @error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="buy_price">Buy Price <span class="text-danger">*</span></label>
                                <input type="text" name="buy_price" id="buy_price"
                                    class="form-control @error('buy_price') is-invalid @enderror" required>
                                @error('buy_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="vat">VAT (%) <span class="text-secondary">(Optional)</span></label>
                                <input type="text" name="vat" id="vat"
                                    class="form-control @error('vat') is-invalid @enderror">
                                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="final_price">Final Price <span class="text-danger">*</span></label>
                                <input type="text" name="final_price" id="final_price"
                                    class="form-control @error('final_price') is-invalid @enderror" readonly>
                                @error('final_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="per_product_price">Per Product Price <span class="text-danger">*</span></label>
                                <input type="text" name="per_product_price" id="per_product_price"
                                    class="form-control @error('per_product_price') is-invalid @enderror" readonly>
                                @error('per_product_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <!-- <div class="form-group col-lg-6">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                            </div> -->
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
    $(document).ready(function () {

    function calculate() {
        let qty = parseFloat($("#qty").val()) || 0;
        let buyPrice = parseFloat($("#buy_price").val()) || 0;
        let vat = parseFloat($("#vat").val()) || 0;

        // Final Price = buyPrice + vat
        let finalPrice = buyPrice + vat;

        // Per Product Price = finalPrice / qty
        let perProductPrice = qty > 0 ? (finalPrice / qty) : 0;

        // শুধু final_price আর per_product_price সবসময় decimal সহ show করবে
        $("#final_price").val(finalPrice.toFixed(2));
        $("#per_product_price").val(perProductPrice.toFixed(2));
    }

    // টাইপ করার সময় শুধু হিসাব হবে
    $("#qty, #buy_price, #vat").on("input", function () {
        calculate();
    });

    // ফিল্ড থেকে বের হলে (blur) decimal format হবে
    $("#buy_price, #vat").on("blur", function () {
        let val = parseFloat($(this).val()) || 0;
        $(this).val(val.toFixed(2));
        calculate(); // আবার হিসাব করব
    });

});

</script>
@endsection