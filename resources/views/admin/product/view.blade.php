@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h4 class="page-title"> Product details </h4>
                        </div>
                        <div class="col-8 text-end">
                            <a href="{{route('admin.product.index')}}" class="btn btn-dark btn-sm float-end px-3">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card main-card">
                   <div class="p-4">
                       <div class="sidebar-layout">
                           <div class="toggle-body">
                               <div class="pro-create">
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $product->name??'' }}" readonly />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Price <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" name="price" value="{{ $product->price??'' }}" readonly />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Category <span class="text-danger">*</span></label>
                                                <input type="text" name="category" class="form-control" value="{{ $product->category??'' }}" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Stock <span class="text-danger">*</span></label>
                                                <input type="text" name="stock" class="form-control" value="{{ $product->stock??''  }}" readonly />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label"> Image </label>
                                                @if(!empty($product->image))
                                                    <a href="{{ asset('assets/img/products/'. $product->image) }}" target="__blank"><img src="{{ asset('assets/img/products/'. $product->image) }}" height="50" width="80" att="img"/></a>
                                                @else
                                                    <a href="{{ asset('assets/img/default.jpg') }}" target="__blank"><img src="{{ asset('assets/img/default.jpg') }}" height="50" width="80" att="img"/></a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Description </label>
                                                <textarea class="form-control" name="description" rows="3" readonly>{{ $product->description??'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

