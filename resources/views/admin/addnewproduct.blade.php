<x-adminHeader parent="Ecommerce" pagename="Add Product" />

<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr />
        <div class="form-body mt-4">
            <form action="{{URL::to('wa-admin/addproduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Product Title</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Product Images</label>
                                <input name="image" id="image-uploadify" type="file" accept=".jpeg, .png, .jpg, .gif">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="inputPrice" name="price" min="1" placeholder="00.00" step=".01">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCompareatprice" class="form-label">Offer Price</label>
                                    <input type="number" class="form-control" id="inputCompareatprice" min="1"
                                        placeholder="00.00" name="offerprice" step=".01">
                                </div>

                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">Product Category</label>

                                    @foreach ($procats as $cat)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $cat['id'] }}"
                                                name="procats[]" id="procatid{{ $cat['id'] }}">
                                            <label class="form-check-label"
                                                for="procatid{{ $cat['id'] }}">{{ $cat['name'] }}</label>
                                        </div>
                                    @endforeach



                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </form>
        </div>
    </div>
</div>

<x-adminFooter />
