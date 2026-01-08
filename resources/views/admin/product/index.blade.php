@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card main-card">
                    <div class="card-body">
                        <div class="search-section">
                            <div class="row">
                                <div class="col-md-5 col-sm-4">
                                    <h4 class="page-title">Products</h4>
                                </div>
                                <div class="col-md-7 col-sm-8">
                                    <div class="export-list text-sm-end">
                                        <ul>
                                            <li>
                                                <a href="{{ route('admin.product.create')}}" class="btn btn-primary "><i class="ti ti-square-rounded-plus"></i>Add Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="filter-section filter-flex">
                            <div class="sortby-list filters">
                                <form action="{{ route('admin.product.import')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="file" name="file" required>
                                    <button type="submit" class="btn btn-info"><i class="ti ti-package-export"></i>Import</button>
                                </form>
                            </div>
                           {{-- <div class="mb-3">
                                <a href="javascript:void(0);" class="btn btn-info export-file"><i class="ti ti-package-export"></i> Export</a>
                            </div> --}}
                        </div>

                        <div class="table-responsive custom-table">
                            <table class="table"  >
                                <thead class="thead-light">
                                    <tr>
                                        <th class="no-sort" style="width: 50px;">S.No.</th>
                                        <th class="no-sort">Name</th>
                                        <th class="no-sort">Price</th>
                                        <th>Category</th>
                                        <th class="no-sort">Stock</th>
                                        <th class="no-sort">Image</th>
                                        <th class="no-sort">Description</th>
                                        <th class="no-sort">Created At</th>
                                        <th class="text-end no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                  @if($products->isNotEmpty())
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $products->firstItem() + $key }}</td>
                                        <td>{{ $product->name??'' }}</td>
                                        <td>{{ $product->price??'' }}</td>
                                        <td>{{ $product->category??'' }}</td>
                                        <td>{{ $product->stock??'' }}</td>
                                        <td>
                                            @if(!empty($product->image))
                                                <a href="{{ asset('assets/img/products/'. $product->image) }}" target="__blank"><img src="{{ asset('assets/img/products/'. $product->image) }}" height="50" width="80" att="img"/></a>
                                            @else
                                                <a href="{{ asset('assets/img/default.jpg') }}" target="__blank"><img src="{{ asset('assets/img/default.jpg') }}" height="50" width="80" att="img"/></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($product->description))
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $product->description }}">
                                                    {{ \Illuminate\Support\Str::limit($product->description, 50) }}
                                                </span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($product->created_at)) }}</td>
                                        <td class="text-end">
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('admin.product.show', base64_encode($product->id))}}"><i class="ti ti-eye text-blue-light"></i> View Details</a>
                                                    <a class="dropdown-item" href="{{ route('admin.product.edit', base64_encode($product->id))}}"><i class="ti ti-edit text-blue"></i> Edit Product Detail</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-url="{{ route('admin.product.destroy', base64_encode($product->id))}}" id="show-delete"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                            </table>
                        </div>
                     
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="datatable-length"></div>
                            </div>
                            <div class="col-md-6">
                                {{ $products->links() }}
                                <div class="datatable-paginate"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
<script>
    {{--//Export
    $('.export-file').on('click', function() {

        var url = "{{ route('admin.product.export')}}";

        // Redirect to the URL
        window.location.href = url;
    }); --}}
</script>
@endsection+
