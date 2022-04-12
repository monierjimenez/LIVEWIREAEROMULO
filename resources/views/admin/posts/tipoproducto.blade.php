<select name="tipo_producto" class="form-control select2" >
    <option value="">Seleccione una categoria</option>
    @foreach( $tipos as $tipo )
        <option value="{{ $tipo->id }}" {{ old('tipo_producto') == $tipo->id ? 'selected' : ''}}>
            {{ $tipo->name }}</option>
    @endforeach
        </select>



