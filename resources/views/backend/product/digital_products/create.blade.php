@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h5">{{translate('Add New Digital Product')}}</h5>
    </div>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <form class="form form-horizontal mar-top" action="{{route('digitalproducts.store')}}" method="POST"
                  enctype="multipart/form-data" id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('General')}}</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="top" class="col-lg-2 col-from-label">{{translate('Type Of Product')}}</label>
                            <div class="col-lg-8">
                                    <select id="top" class="form-control" name="type_of_product" required>
                                        <option value="digital" selected="">Digital Product</option>
                                        <option value="services">Professional Services</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Product Name')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name"
                                       placeholder="{{translate('Product Name')}}" required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-lg-2 col-from-label">{{translate('Category')}}</label>
                            <div class="col-lg-8">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                        required>
                                    @foreach(\App\Category::where('digital', 1)->get() as $category)
                                        <option value="{{$category->id}}">{{ $category->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{ translate('Product File')}}</label>
                            <div class="col-lg-8">
                                <div class="custom-file">
                                    <label class="custom-file-label">
                                        <input type="file" name="file" class="custom-file-input" required>
                                        <span class="custom-file-name">{{ translate('Choose file') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Tags')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control aiz-tag-input" name="tags[]"
                                       placeholder="{{ translate('Type to add a tag') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Images')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"
                                   for="signinSrEmail">{{translate('Main Images')}}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image"
                                     data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="photos" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}}
                                <small>(290x300)</small>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image"
                                     data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="thumbnail_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Meta Tags')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('SEO Title')}}</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="meta_title"
                                       placeholder="{{translate('SEO Title')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Description')}}</label>
                            <div class="col-lg-8">
                                <textarea name="meta_description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"
                                   for="signinSrEmail">{{ translate('SEO Image') }}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image"
                                     data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="meta_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Price')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Unit price')}}</label>
                            <div class="col-lg-8">
                                <input type="number" min="0" value="0" step="0.01"
                                       placeholder="{{translate('Unit price')}}" name="unit_price" class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Purchase price')}}</label>
                            <div class="col-lg-8">
                                <input type="number" min="0" value="0" step="0.01"
                                       placeholder="{{translate('Purchase price')}}" name="purchase_price"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Tax')}}</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" value="0" step="0.01" placeholder="{{translate('Tax')}}"
                                       name="tax" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control aiz-selectpicker" name="tax_type">
                                    <option value="amount">{{translate('Flat')}}</option>
                                    <option value="percent">{{translate('Percent')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Discount')}}</label>
                            <div class="col-lg-6">
                                <input type="number" min="0" value="0" step="0.01"
                                       placeholder="{{translate('Discount')}}" name="discount" class="form-control"
                                       required>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control aiz-selectpicker" name="discount_type">
                                    <option value="amount">{{translate('Flat')}}</option>
                                    <option value="percent">{{translate('Percent')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Information')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-from-label">{{translate('Description')}}</label>
                            <div class="col-lg-9">
                                <textarea class="aiz-text-editor" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-right">
                    <button type="submit" name="button" class="btn btn-primary">{{ translate('Save Product') }}</button>
                </div>
            </form>
        </div>
    </div>


@endsection
