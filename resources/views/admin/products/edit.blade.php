@extends('admin.layouts.app')

@section('title', 'Edit Product')

@push('styles')
<style>
.product-edit-wrapper {
    padding: 25px;
    background: #f8f9fa;
    min-height: 100vh;
}

.product-edit-header {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.product-edit-header h1 {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 28px;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 10px 0 0 0;
}

.breadcrumb-item a {
    color: #fe5716;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: #e54e14;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #6c757d;
}

.form-section-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.form-section-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 20px;
}

.form-section-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 18px;
}

.form-section-body {
    padding: 25px;
}

.form-label {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: #ffffff;
}

.form-control:focus, .form-select:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
    background: #ffffff;
}

.form-text {
    color: #6c757d;
    font-size: 12px;
    margin-top: 5px;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.form-check-input:checked {
    background-color: #fe5716;
    border-color: #fe5716;
}

.form-check-input:focus {
    border-color: #fe5716;
    box-shadow: 0 0 0 0.2rem rgba(254, 87, 22, 0.15);
}

.form-check-label {
    color: #2c3e50;
    font-weight: 500;
    font-size: 14px;
}

.btn-form-submit {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-form-submit:hover {
    background: linear-gradient(135deg, #e54e14, #fe5716);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(254, 87, 22, 0.3);
}

.btn-form-cancel {
    background: #6c757d;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 14px;
}

.btn-form-cancel:hover {
    background: #545b62;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.product-image-preview {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

.gallery-preview {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
}

.gallery-preview img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    border: 2px solid #e9ecef;
}

.product-edit-sidebar {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
}

.product-edit-sidebar-header {
    background: linear-gradient(135deg, #fe5716, #ff7a3d);
    color: white;
    padding: 15px 20px;
}

.product-edit-sidebar-header h6 {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.product-edit-sidebar-body {
    padding: 20px;
}

.product-stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
}

.product-stat-item {
    text-align: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.product-stat-value {
    font-size: 18px;
    font-weight: 700;
    color: #fe5716;
    display: block;
}

.product-stat-label {
    color: #6c757d;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.product-meta-details {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
}

.product-meta-details small {
    color: #6c757d;
    font-size: 11px;
    line-height: 1.4;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-up {
    animation: fadeInUp 0.6s ease-out;
}

@media (max-width: 768px) {
    .product-edit-wrapper {
        padding: 15px;
    }
    
    .product-edit-header h1 {
        font-size: 24px;
    }
    
    .form-section-body {
        padding: 20px;
    }
    
    .product-stats-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .product-edit-wrapper {
        padding: 10px;
    }
    
    .product-edit-header h1 {
        font-size: 20px;
    }
    
    .form-section-body {
        padding: 15px;
    }
    
    .btn-form-submit,
    .btn-form-cancel {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
@endpush

@section('content')
<div class="product-edit-wrapper">
    <!-- Page Header -->
    <div class="product-edit-header">
        <h1><i class="fas fa-edit me-2"></i>Edit Product: {{ $product->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <!-- Product Details -->
<<<<<<< HEAD
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-info-circle me-2"></i>Product Details</h5>
                    </div>
                    <div class="form-section-body">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
>>>>>>> origin/main
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Product Category *</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="subcategory_id" class="form-label">Subcategory</label>
                                    <select class="form-select @error('subcategory_id') is-invalid @enderror" 
                                            id="subcategory_id" name="subcategory_id">
                                        <option value="">Select Subcategory</option>
                                        @if(isset($subcategories))
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" 
                                                    {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('subcategory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="brand_id" class="form-label">Brand</label>
                                    <select class="form-select @error('brand_id') is-invalid @enderror" 
                                            id="brand_id" name="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" 
                                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Title *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">URL</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug', $product->slug) }}" 
                                   placeholder="Auto-generated from product title">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to auto-generate from product title</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="sku" class="form-label">Product SKU *</label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" 
                                           id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                                    <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                           id="stock_quantity" name="stock_quantity" 
                                           value="{{ old('stock_quantity', $product->stock_quantity) }}" 
                                           min="0" required>
                                    @error('stock_quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="manufactured_date" class="form-label">Manufactured Date</label>
                                    <input type="date" class="form-control @error('manufactured_date') is-invalid @enderror" 
                                           id="manufactured_date" name="manufactured_date" 
                                           value="{{ old('manufactured_date', $product->manufactured_date?->format('Y-m-d')) }}">
                                    @error('manufactured_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" 
                                           id="expiry_date" name="expiry_date" 
                                           value="{{ old('expiry_date', $product->expiry_date?->format('Y-m-d')) }}">
                                    @error('expiry_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="6" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="additional_information" class="form-label">Additional Information</label>
                            <textarea class="form-control @error('additional_information') is-invalid @enderror" 
                                      id="additional_information" name="additional_information" rows="4">{{ old('additional_information', $product->additional_information) }}</textarea>
                            @error('additional_information')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('weight') is-invalid @enderror" 
                                       id="weight" name="weight" value="{{ old('weight', $product->weight) }}" 
                                       step="0.01" min="0">
                                <span class="input-group-text">kg</span>
                            </div>
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Product Price Details -->
<<<<<<< HEAD
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-dollar-sign me-2"></i>Product Price Details</h5>
                    </div>
                    <div class="form-section-body">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Price Details</h5>
                    </div>
                    <div class="card-body">
>>>>>>> origin/main
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               id="price" name="price" value="{{ old('price', $product->price) }}" 
                                               step="0.01" min="0" required>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control @error('sale_price') is-invalid @enderror" 
                                               id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" 
                                               step="0.01" min="0">
                                    </div>
                                    @error('sale_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave empty if not on sale</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Product Image -->
<<<<<<< HEAD
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-image me-2"></i>Upload Product Image</h5>
                    </div>
                    <div class="form-section-body">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Upload Product Image</h5>
                    </div>
                    <div class="card-body">
>>>>>>> origin/main
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Upload JPG, PNG, GIF (Max: 2MB)</div>
                            @if($product->image)
                                <div class="mt-2">
<<<<<<< HEAD
                                    <small class="form-text">Current image:</small><br>
                                    <img src="{{ Storage::url($product->image) }}" alt="Current Image" 
                                         class="product-image-preview">
=======
                                    <small class="text-muted">Current image:</small><br>
                                    <img src="{{ Storage::url($product->image) }}" alt="Current Image" 
                                         style="max-width: 100px; max-height: 100px;" class="rounded">
>>>>>>> origin/main
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Gallery Images</label>
                            <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                                   id="gallery" name="gallery[]" accept="image/*" multiple>
                            @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Upload multiple images for product gallery</div>
                            @if($product->gallery && count($product->gallery) > 0)
                                <div class="mt-2">
<<<<<<< HEAD
                                    <small class="form-text">Current gallery:</small><br>
                                    <div class="gallery-preview">
                                        @foreach($product->gallery as $galleryImage)
                                            <img src="{{ Storage::url($galleryImage) }}" alt="Gallery Image">
=======
                                    <small class="text-muted">Current gallery:</small><br>
                                    <div class="d-flex flex-wrap gap-2 mt-1">
                                        @foreach($product->gallery as $galleryImage)
                                            <img src="{{ Storage::url($galleryImage) }}" alt="Gallery Image" 
                                                 style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
>>>>>>> origin/main
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
<<<<<<< HEAD
                <div class="form-section-card">
                    <div class="form-section-header">
                        <h5><i class="fas fa-search me-2"></i>SEO Information</h5>
                    </div>
                    <div class="form-section-body">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">SEO Information</h5>
                    </div>
                    <div class="card-body">
>>>>>>> origin/main
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                                   id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" 
                                   maxlength="255">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <textarea class="form-control @error('meta_keywords') is-invalid @enderror" 
                                      id="meta_keywords" name="meta_keywords" rows="3" 
                                      placeholder="Separate keywords with commas">{{ old('meta_keywords', $product->meta_keywords) }}</textarea>
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                      id="meta_description" name="meta_description" rows="3" 
                                      maxlength="500">{{ old('meta_description', $product->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Product Settings -->
<<<<<<< HEAD
                <div class="product-edit-sidebar">
                    <div class="product-edit-sidebar-header">
                        <h6><i class="fas fa-cog me-2"></i>Product Settings</h6>
                    </div>
                    <div class="product-edit-sidebar-body">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Settings</h5>
                    </div>
                    <div class="card-body">
>>>>>>> origin/main
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Lower numbers appear first</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                       value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active Status</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Featured Product</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_healthy" name="is_healthy" 
                                       value="1" {{ old('is_healthy', $product->is_healthy) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_healthy">Healthy Product</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_deal_of_week" name="is_deal_of_week" 
                                       value="1" {{ old('is_deal_of_week', $product->is_deal_of_week) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_deal_of_week">Deal of the Week</label>
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.products.index') }}" class="btn-form-cancel">Cancel</a>
                            <button type="submit" class="btn-form-submit">Update Product</button>
=======
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-success">Update Product</button>
>>>>>>> origin/main
                        </div>
                    </div>
                </div>

                <!-- Current Image -->
                @if($product->image)
<<<<<<< HEAD
                <div class="product-edit-sidebar">
                    <div class="product-edit-sidebar-header">
                        <h6><i class="fas fa-image me-2"></i>Current Image</h6>
                    </div>
                    <div class="product-edit-sidebar-body text-center">
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Current Image</h5>
                    </div>
                    <div class="card-body text-center">
>>>>>>> origin/main
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                             style="max-width: 100%; height: 200px; object-fit: cover;" 
                             class="rounded">
                    </div>
                </div>
                @endif

                <!-- Product Statistics -->
<<<<<<< HEAD
                <div class="product-edit-sidebar">
                    <div class="product-edit-sidebar-header">
                        <h6><i class="fas fa-chart-bar me-2"></i>Product Statistics</h6>
                    </div>
                    <div class="product-edit-sidebar-body">
                        <div class="product-stats-grid">
                            <div class="product-stat-item">
                                <span class="product-stat-value">{{ $product->stock_quantity }}</span>
                                <span class="product-stat-label">Current Stock</span>
                            </div>
                            <div class="product-stat-item">
                                <span class="product-stat-value">₹{{ $product->price }}</span>
                                <span class="product-stat-label">Current Price</span>
                            </div>
                            @if($product->sale_price)
                            <div class="product-stat-item">
                                <span class="product-stat-value text-success">₹{{ $product->sale_price }}</span>
                                <span class="product-stat-label">Sale Price</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="product-meta-details">
                            <small>
                                <strong>Created:</strong> {{ $product->created_at->format('M d, Y') }}<br>
                                <strong>Last Updated:</strong> {{ $product->updated_at->format('M d, Y') }}
                            </small>
=======
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Current Stock:</span>
                            <span class="fw-bold">{{ $product->stock_quantity }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Current Price:</span>
                            <span class="fw-bold">₹{{ $product->price }}</span>
                        </div>
                        @if($product->sale_price)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Sale Price:</span>
                            <span class="fw-bold text-success">₹{{ $product->sale_price }}</span>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between mb-2">
                            <span>Created:</span>
                            <span>{{ $product->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Last Updated:</span>
                            <span>{{ $product->updated_at->format('M d, Y') }}</span>
>>>>>>> origin/main
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<<<<<<< HEAD
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animations to page elements
    const header = document.querySelector('.product-edit-header');
    const formSections = document.querySelectorAll('.form-section-card');
    const sidebars = document.querySelectorAll('.product-edit-sidebar');
    
    if (header) header.classList.add('animate-fade-up');
    
    formSections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('animate-fade-up');
        }, index * 150);
    });
    
    sidebars.forEach((sidebar, index) => {
        setTimeout(() => {
            sidebar.classList.add('animate-fade-up');
        }, index * 200);
    });
    
    // Auto-generate slug from product name
=======
<script>
document.addEventListener('DOMContentLoaded', function() {
>>>>>>> origin/main
    // Auto-generate slug from product name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        if (!slugInput.value || slugInput.dataset.autoGenerated !== 'false') {
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });
    
    slugInput.addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });
    
    // Validate expiry date
    const manufacturedDateInput = document.getElementById('manufactured_date');
    const expiryDateInput = document.getElementById('expiry_date');
    
    function validateDates() {
        if (manufacturedDateInput.value && expiryDateInput.value) {
            if (new Date(expiryDateInput.value) <= new Date(manufacturedDateInput.value)) {
                expiryDateInput.setCustomValidity('Expiry date must be after manufactured date');
            } else {
                expiryDateInput.setCustomValidity('');
            }
        }
    }
    
    manufacturedDateInput.addEventListener('change', validateDates);
    expiryDateInput.addEventListener('change', validateDates);

    // Handle category change to load subcategories
    const categorySelect = document.getElementById('category_id');
    const subcategorySelect = document.getElementById('subcategory_id');

    categorySelect.addEventListener('change', function() {
        const categoryId = this.value;
        
        // Clear subcategory options
        subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
        
        if (categoryId) {
            fetch(`{{ url('admin/categories/subcategories') }}/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(subcategory => {
                        const option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subcategorySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading subcategories:', error);
                });
        }
    });
});
</script>
<<<<<<< HEAD
@endpush
=======
>>>>>>> origin/main
@endsection
