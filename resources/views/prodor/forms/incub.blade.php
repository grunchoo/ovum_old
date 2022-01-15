<form action="{{ route("prodordet.incubacion") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <p>Lote</p>
        <select name="lote_id" id="lote" class="form-control">
            @foreach($lote as $id => $lote)
                <option value="{{ $id }}">
                    {{ $lote }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <label for="lote_stock"></label>
        <select name="lote_stock_id" id="lote_stock" class="form-control">
            <option value=""></option>
        </select>
        @if($errors->has('lote_stock_id'))
            <p class="help-block">
                {{ $errors->first('lote_stock_id') }}
            </p>
        @endif
    </div>



