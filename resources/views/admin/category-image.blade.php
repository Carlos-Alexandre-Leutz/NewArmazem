@extends('layout.admin')
@section('content')
  <section class="row">
    <div class="col-md-12">
      <div class="form-group">
        <a href="{{ url('/admin') }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Categorias</a>
      </div>
    </div>
  </section>
  <section class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-block">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="card-title">{{$category->name}}</h3>
            </div>
          </div>
          <div class="row">
            @forelse($images as $image)
              <div class="col-sm-2"><img src="{{ asset('images/produtos/marked/category-' . $image->image) }}" width="100%"></div>
            @empty
              <div class="col-sm-12">
                <div class="alert bg-info">
                  <h4>Nenhum produto cadastrado</h4>
                  Esta categoria não possui produtos cadastrados ainda, por este motivo não há imagens para selecionar e ela não está sendo exibida no site.
                </div>
                <div class="form-group">
                  <a class="btn btn-primary" href="/admin/produtos/{{$category->code}}/novo"><i class="fas fa-plus"></i> Adicionar Produto</a>
                </div>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection