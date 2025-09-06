@extends('admin.layouts.app')
@section('title')Shop List @endsection
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Shop List</h3>
                        @can('create shop')
                        <a href="{{ route('admin.shops.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add Shop</a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($data as $item)
                                @can('view shop')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url($item->image) }}" width="50" height="50">
                                    </td>
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
                                        @can('edit shop')
                                        <a href="{{ route('admin.shops.edit', $item->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.shops.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete shop')
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.shops.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endcan
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
                url: "{{ route('admin.shops.status.update') }}",
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