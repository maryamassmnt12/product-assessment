@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h4 class="page-title">Add New Product </h4>
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
                                <form id="addproduct" action="{{ route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                       <div class="row">
                                         
                                           <div class="col-md-4">
                                                <div class="form-wrap">
                                                        <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                           </div>

                                            <div class="col-md-4">
                                                <div class="form-wrap">
                                                    <label class="col-form-label">Price <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="price" value="{{old('price')}}" />
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-wrap">
                                                        <label class="col-form-label">Category <span class="text-danger">*</span></label>
                                                        <input type="text" name="category" class="form-control" value="{{old('category')}}" />
                                                        @error('category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                           </div>

                                           <div class="col-md-4">
                                                <div class="form-wrap">
                                                        <label class="col-form-label">Stock <span class="text-danger">*</span></label>
                                                        <input type="text" name="stock" class="form-control" value="{{old('stock')}}" />
                                                        @error('stock')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                           </div>

                                            <div class="col-md-4">
                                                <div class="form-wrap">
                                                    <label class="col-form-label"> Upload Image </label>
                                                    <input type="file" class="form-control" name="image"/>
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                           
                                            <div class="col-md-12">
                                                <div class="form-wrap">
                                                        <label class="col-form-label">Description </label>
                                                        <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                            </div>
                                         
                                       </div>
                                       <div class="submit-button text-end mt-4">
                                            <button type="submit" class="btn btn-primary btn-large">Add Product</button>
                                       </div>
                                   </form>
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

