<!-- Modal name: myModalLabel-->
<div class="modal fade" id="myModalStock" tabindex="-1" role="dialog" aria-labelledby="myModalStock" aria-hidden="true">
  <form method="get" action="{{ route('admin.productstock', '#add-stock') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalStock">Add "Stock Product".</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-12 {{ $errors->has('amount') ? 'has-error' : '' }}">
                  <label>Amount</label>
                    <input name='amount' placeholder="Product quantity" class="form-control" value="{{ old('amount') }}">
                  {!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
                </div>

                  <div class="col-xs-12 {{ $errors->has('cost_price') ? 'has-error' : '' }}">
                      <label>Cost</label>
                      <input name='cost_price' placeholder="Product cost" class="form-control" value="{{ old('cost_price', $product->cost_price) }}">
                      {!! $errors->first('cost_price', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!--<button class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
          <input id="productstock_id" name="productstock_id" type="hidden" value="{{$product->id}}">
          <button class="btn btn-primary">Add Stock</button>
        </div>
      </div>
    </div>
  </form>
</div>
