@extends('app')

@section('content')
<div class="starter-template">
    <h1>Form</h1>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form id="formData" class="form-horizontal" action="{{route('store')}}">

                <div class="form-group">
                    <label for="product_name">Product name</label>
                    <input type="text" class="form-control" id="product_name" name="product" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="qnt">Quantity in stock</label>
                    <input type="number" class="form-control" id="qnt" name="qnt" placeholder="Quantity in stock">
                </div>
                <div class="form-group">
                    <label for="price">Price per item</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price per item">
                </div>

                <button id="submit" type="submit" class="btn btn-default">Submit</button>

            </form>

            <h2>Results from XML file</h2>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        
                        <th>Product name</th>
                        <th>Quantity in stock</th>
                        <th>Price per item</th>
                        <th>Time</th>
                        <th> Total value number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="dataTable">

                </tbody>

            </table>

        </div>
        <div class="col-md-3"></div>
    </div>

</div>
</div>
@stop
@section('scripts')
@parent
<script src="{{asset('assets/site/js/function.js')}}"></script>
@stop