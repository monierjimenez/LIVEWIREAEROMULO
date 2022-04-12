<!-- Modal name: myModalLabel-->
<div class="modal fade" id="myModalICC" tabindex="-1" role="dialog" aria-labelledby="myModalICC" aria-hidden="true">
  <form method="get" action="{{ route('admin.productcombo') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalICC">Add "Product to Combo".</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-12 {{ $errors->has('products_id') ? 'has-error' : '' }}">
                  <label>Products</label>
                    <select name="products_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select products" style="width: 100%;">
                        @foreach( $productsall as $productall )
                            <option value="{{ $productall->id }}"
                                {{ old('products_id', in_array($productall->id, explode(".", $product->products_id)) )  ? 'selected' : ''}}>
                                {{ $productall->name }}
                            </option>
                        @endforeach
                    </select>
                  {!! $errors->first('products_id', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!--<button class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
          <input id="product_id" name="product_id" type="hidden" value="{{$product->id}}">
          <button class="btn btn-primary">Add Product</button>
        </div>
      </div>
    </div>
  </form>
</div>
