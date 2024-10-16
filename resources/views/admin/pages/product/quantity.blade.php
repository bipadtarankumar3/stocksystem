@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="" class="browser-default-validation">
        <div class="row">
           
            <div class="col-md-12">
                <div class="card">
                    {{-- <h5 class="card-header">Publish</h5> --}}
                    <div class="card-body">
                        <div class="float-right my-2 text-right" style="text-align: right">
                            <a href="{{URL::to('admin/product/quantityAdd')}}"><button type="button" class="btn btn-warning">Add stock</button></a>
                            <!--<a href="{{URL::to('admin/product/list')}}"><button type="button" class="btn btn-success">Product</button></a>-->
                            
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Warehouse Name</th>
                                        <th>Product Name</th>
                                        
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href=""><i class="fa fa-solid fa-pen-to-square"></i></a>
                                            <a href="" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>ML</td>
                                        <td>STEAM IRON 300L (A) (MAX)

                                        </td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <a href=""><i class="fa fa-solid fa-pen-to-square"></i></a>
                                            <a href="" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>NG</td>
                                        <td>C/M ''10'' 1200W (PILY)
                                        </td>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <a href=""><i class="fa fa-solid fa-pen-to-square"></i></a>
                                            <a href="" onclick="deleteConfirmation(event)"><i class="fa fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>SB
                                        </td>
                                        <td>1.5 S/DRIVER (GOOD)
                                        </td>
                                        <td>1000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
 
            </div>
            
        </div>
    </form>
</div>

@endsection