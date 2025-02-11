@extends('layouts.app')

@section('template_title')
    {{ $ejercicio->name ?? __('Show') . " " . __('Ejercicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ejercicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ejercicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Muscular Id:</strong>
                                    {{ $ejercicio->musculare->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $ejercicio->nombre }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
