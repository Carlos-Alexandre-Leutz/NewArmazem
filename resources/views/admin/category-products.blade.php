@extends('layout.admin')
@section('content')
    <section class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" id="category" value="{{ $category->code }}">
                <a class="btn btn-primary" href="/admin/produtos/{{ $category->code }}/novo"><i class="fas fa-plus"></i> Adicionar Produto</a>
                <a href="{{ url('/admin') }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Categorias</a>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">{{ $category->name }}</h3>
                        </div>
                        <div class="col-sm-6">
                            @if($products->count()>0)
                                <form action="">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Digite o código do produto">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">Procurar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Imagem</th>
                                <th>Capa da Categoria</th>
                                <th>Capa da SubCategoria</th>
                                <th class="text-center">Status</th>
                                <th class="product-action"><i class="mdi mdi-dots-horizontal"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->code }}</td>
                                    <td>
                                        <img src="{{ asset('images/produtos/marked/' . $product->image) }}" width="60"/>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                type="radio" id="status-{{ $product->code }}"
                                                name="image" class="custom-control-input category-image" data-category="1"
                                                value="{{ $product->image }}" {{ ($parentCategory->image == $product->image) ? 'checked="checked"' : '' }}>
                                            <label class="custom-control-label" for="status-{{ $product->code }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input
                                                type="radio" id="substatus-{{ $product->code }}"
                                                name="subimage" class="custom-control-input category-image" data-category="0"
                                                value="{{ $product->image }}" {{ ($category->image == $product->image) ? 'checked="checked"' : '' }}>
                                            <label class="custom-control-label" for="substatus-{{ $product->code }}"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $product->status == '1' ? 'Ativo' : 'Inativo' }}</td>
                                    <td class="product-action">

                                        <a href="{{ url('/admin/produtos/' . $product->code . '/editar') }}" title="Editar Produto">
                                            <i class="mdi mdi-circle-edit-outline"></i>
                                        </a>
                                        <a href="{{ url('/admin/produtos/' . $product->code . '/remover') }}" title="Remover Remover">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum produto cadastrado para esta categoria.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">

      jQuery(function () {

        $('.category-image').click(function () {

          var category_image = $(this).val();
          var category = parseInt($(this).data('category'));
          var confirmText = category > 0 ? 'Categoria' : 'Sub-Categoria';
          var confirmation = confirm('Deseja marcar esta imagem como capa da ' + confirmText + '?');

          if (confirmation) {
            $.ajax({
              type: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: {
                imagem: category_image,
                category: category,
              },
              url: '/admin/categorias/' + $('#category').val() + '/imagem'
            }).done(function () {
              // alert('Imagem alterada com sucesso!');
            }).fail(function () {
              alert('Falha ao alterar a imagem.');
            });
          } else {
            return false;
          }
        });
      });
    </script>
@endsection
