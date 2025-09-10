@extends('shop.layouts.app')

@section('title')
Product List
@endsection
@section('shop')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>

                        <a href="{{ route('shop.products.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Shop</th>
                                    <th>Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->shop?->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <label class="switch">
                                            <input type="checkbox"
                                                class="status-toggle"
                                                data-id="{{ $item->id }}"
                                                {{ $item->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('shop.products.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                        <form id="delete-form-{{ $item->id }}" action="{{ route('shop.products.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        // Event delegation দিয়ে status toggle handle করা
        $(document).on('change', '.status-toggle', function() {
            let checkbox = $(this);
            let id = checkbox.data('id');
            let status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('shop.products.status.update') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(res) {
                    Swal.fire({
                        icon: res.status == 1 ? 'success' : 'warning',
                        title: res.status == 1 ? 'Status has been activated.' : 'Status has been deactivated.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'There was a problem updating the status.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    checkbox.prop('checked', !status); // rollback
                }
            });
        });

    });
</script>
@endsection