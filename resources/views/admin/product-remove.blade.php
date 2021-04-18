@extends('layout.admin')
@section('content')
  <section class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-block">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="card-title">{{$product->code}}</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="alert bg-danger" role="alert">
                <div>
                  <em class="fa fa-minus-circle mr-2"></em>
                  Deseja realmente excluir este produto?
                </div>
              </div>
              <form action="{{ url('/admin/produtos/' . $product->code . '/remover') }}" method="post">
                {{ csrf_field() }}
                <div class="text-right">
                  <a href="{{ $backUrl }}" class="btn btn-link">Não, quero voltar</a>
                  <button class="btn btn-primary"><i></i>Sim, pode excluir</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection