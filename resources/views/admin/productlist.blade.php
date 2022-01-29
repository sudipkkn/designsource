<x-adminHeader parent="Ecommerce" pagename="Products List" />

<div class="row">
    <div class="col">
        <div class="card radius-10 mb-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">All Products</h5>
                    </div>
                    <div class="ms-auto">
                        <a href="{{URL::to('wa-admin/addnewproduct')}}" class="btn btn-primary btn-sm radius-30">Add New Product</a>
                    </div>
                </div>

               <div class="table-responsive mt-3">
                   <table class="table align-middle mb-0">
                       <thead class="table-light">
                           <tr>
                               <th>Product</th>
                               <th>Last Modified</th>
                               <th>Price</th>
                               <th>Status</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>

                            @foreach ($data as $product)

                           <tr>
                               <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        <img src="{{asset('uploaded/'.$product['image'])}}" alt="{{$product['name']}}">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{$product['name']}}</h6>
                                    </div>
                                </div>
                               </td>
                               <td>{{ $product->updated_at->format('D, d M Y, h:i a') }}</td>
                               <td>#{{$product['price']}}</td>
                               <td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
                               
                               <td>
                                <div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class="bx bxs-trash"></i></a>
                                    <a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class="bx bxs-edit"></i></a>
                                </div>
                               </td>
                           </tr>

                           @endforeach
                           
                       </tbody>
                   </table>
               </div>
                
            </div>
        </div>
    </div>
</div>

<x-adminFooter />
