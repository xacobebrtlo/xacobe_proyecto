<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            {{-- <label for="muscular_id" class="form-label">{{ __('Muscular Id') }}</label>
            <input type="text" name="muscular_id" class="form-control @error('muscular_id') is-invalid @enderror" value="{{ old('muscular_id', $ejercicio?->muscular_id) }}" id="muscular_id" placeholder="Muscular Id">
            {!! $errors->first('muscular_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!} --}}
            {{ Form::label('musculares') }}
            {{ Form::select('muscular_id', $musculares, $ejercicio->muscular_id, ['class' => 'form-control' . ($errors->has('muscular_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el grupo muscular']) }}
            {!! $errors->first('muscular_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $ejercicio?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
