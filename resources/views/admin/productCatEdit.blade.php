<x-adminHeader parent="Ecommerce" pagename="Category"/>

<hr/>
<div class="row">
    
    <div class="col-xl-6">
        
        <div class="card">
            <div class="card-body">
                <form method="POST" action="addprocats">
                    @csrf
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Add New </h5>
                    </div>
                </div>
                <hr/>
                <label for="formFile" class="form-label">Category Name</label>
                <input class="form-control form-control-lg mb-3 @error('name') is-invalid @enderror" name="name" type="text" placeholder="Type Name" value="{{old('name')}}">
                @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                
                <label for="formFile" class="form-label">Status</label>
                <select class="form-select form-select-lg mb-3 @error('status') is-invalid @enderror" name="status">
                    <option selected value="">Choose an Option</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                <button class="btn btn-lg btn-success">Submit</button>
                </form>
            </div>
        </div>
        

    </div>

    <div class="col-xl-6">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Categories</h5>
                </div>
            </div>
            <hr/>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$cats->isEmpty())
                        @foreach ($cats as $cat)
                              
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            
                            <td>{{$cat['name']}}</td>
                            <td>
                                <div class="badge rounded-pill @if ($cat['status']=='1') bg-light-success text-success @else bg-light-warning text-warning @endif  w-100">@if($cat['status']=='1') Active @else Inactive  @endif </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class="bx bxs-trash"></i></a>
                                    <a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class="bx bxs-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        @else

                        <tr>
                            <td colspan="4">No result to show yet</td>
                        </tr>

                        @endif

                        
                      
                    </tbody>
                </table>
                
            </div>
            <br/>
                {{ $cats->links()}}
        </div>
        </div>
    </div>
</div>
<!--end row-->

<x-adminFooter />
