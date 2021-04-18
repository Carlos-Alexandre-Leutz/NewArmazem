@extends('layout.admin')
@section('content')
    <section class="row">
        <div class="col-md-12">
            <div class="form-group">
                @if($isSubcategory)
                <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> SubCategorias</a>
                @else
                <a href="{{ url('/admin') }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Categorias</a>
                @endif
                {{--                <a class="btn btn-primary" href="/admin/categorias/nova"><i class="fas fa-plus"></i> Adicionar Categoria</a>--}}
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-block">

                    <h3 class="card-title">Editar
                        @if($isSubcategory)
                            SubCategoria
                        @else
                            Categoria
                        @endif
                    </h3>

                    @if(request()->has('save'))
                        <div class="alert alert-success">

                            <p>
                                <i class="fa fa-info-circle"></i> Categoria foi salva com sucesso!

                            </p>

                        </div>
                    @endif

                    <form class="form-horizontal" id="saveCategoryForm" action="{{ url('/admin/categorias/salvar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>

                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status0" name="status" class="custom-control-input" value="1" {{ ($category->status == '1') ? 'checked="checked"' :'' }}>
                                    <label class="custom-control-label" for="status0">Exibir no site</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status1" name="status" class="custom-control-input" value="0" {{ ($category->status == '0') ? 'checked="checked"' :'' }}>
                                    <label class="custom-control-label" for="status1">Não</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="code">Código</label>

                                <div class="col-12 no-padding">
                                    <input name="code_old" type="hidden" value="{{ $category->code }}">
                                    <input id="code" name="code" type="text" placeholder="Código da categoria" class="form-control" value="{{ $category->code }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="name">Nome</label>

                                <div class="col-12 no-padding">
                                    <input id="name" name="name" type="text" placeholder="Nome da categoria" class="form-control" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="description">Descrição</label>

                                <div class="col-12 no-padding">
                                    <input id="description" name="description" type="text" placeholder="Uma frase com 60 caracteres que descreve a categoria..." maxlength="60" class="form-control" value="{{ $category->description }}">
                                </div>
                            </div>
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-12 widget-right no-padding">
                                    <button type="button" id="submitButton" class="btn btn-primary btn-md float-right"><i class="fas fa-save"></i> Salvar Categoria</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
      jQuery(function () {
        $('#submitButton').click(function (e) {

          var $code = $('#code');
          var $name = $('#name');
          var $description = $('#description');

          var code = $code.val().toLowerCase();
          var name = $name.val();
          var description = $description.val();

          if (code.length < 2) {
            alert('Código da categoria deve ser maior ou igual a 2 caracteres');
            $code.focus();
            return false;
          }

          if (name.length < 3) {
            alert('Nome da categoria deve ser maior ou igual a 3 caracteres');
            $name.focus();
            return false;
          }

          if (description.length < 30) {
            alert('Descrição da categoria deve ser maior ou igual a 30 caracteres');
            $description.focus();
            return false;
          }

          $('#saveCategoryForm').submit();
        });
      });
    </script>
@endsection
