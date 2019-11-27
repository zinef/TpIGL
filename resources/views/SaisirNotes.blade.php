@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Saisir Notes') }}</div>

                <div class="card-body">
                    <form method="POST" action="/saisirnotes/{{$id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('CI') }}</label>

                            <div class="col-md-6">
                                <input id="ci" type="number" min="0" max="20" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>

                                @error('ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cc" class="col-md-4 col-form-label text-md-right">{{ __('CC') }}</label>

                            <div class="col-md-6">
                                <input id="cc" type="number" min="0" max="20" class="form-control @error('cc') is-invalid @enderror" name="cc" value="{{ old('cc') }}" required autocomplete="cc" autofocus>

                                @error('cc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="cf" class="col-md-4 col-form-label text-md-right">{{ __('CF') }}</label>

                            <div class="col-md-6">
                                <input id="cf" type="number"  min="0" max="20"  class="form-control @error('cf') is-invalid @enderror" name="cf" required autocomplete="cf">

                                @error('cf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('OK') }}
                                </button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
