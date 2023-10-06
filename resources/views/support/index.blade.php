@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')

<div class="container">
    <div class="row">

        <div class="col-12">
            <div>
                <span class="h1">Fale Conosco!</span>
            </div>
            <div>
                <small class="h5">Se está precisando de ajuda? Mande agora mesmo um email! Preencha o campo abaixo com sua dúvida, vamos olhar assim que possível.</small>
            </div>
            <div>
                <form action="">
                    <div class="mb-3">
                      <label for="" class="form-label"></label>
                      <textarea class="form-control" name="" id="" rows="25"></textarea>
                      <button class="btn btn-outline-primary mt-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</div>

@endsection