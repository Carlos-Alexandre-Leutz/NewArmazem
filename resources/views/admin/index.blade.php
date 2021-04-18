@extends('layout.admin')
@section('content')
    <section class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a class="btn btn-primary"
                   href="{{ url('admin/categorias/nova' . ($isSubcategory?'?subcategory='.$category->code:'')) }}"><i
                        class="fas fa-plus"></i>
                    @if($isSubcategory)
                        Adicionar Sub-Categoria
                    @else
                        Adicionar Categoria
                    @endif
                </a>
                @if($isSubcategory)
                    <a href="/admin" class="btn btn-link"><i class="fas fa-arrow-left"></i> Categorias</a>
                @else
                    <div class="alert alert-danger text-danger mt-3">
                        <i class="mdi mdi-alert"></i> Categorias sem subcategorias não apareceção no site.
                    </div>
                    <div class="alert alert-danger text-danger mt-3 font-weight-bold">
                        <i class="mdi mdi-alert"></i> Para gerenciamento de produtos, acesse a a subcategoria da
                        categoria abaixo clicando em <span style="font-size:20px;"><i
                                class="mdi mdi-file-tree"></i></span>
                    </div>

                @endif
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md-12">


            <div class="card mb-4">
                <div class="card-block">
                    <h3 class="card-title">
                        @if($isSubcategory)
                            Sub-Categorias &raquo; {{ $category->name }}
                        @else
                            Categorias
                        @endif
                    </h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                @if($isSubcategory)
                                    <th>Código</th>
                                @else
                                    <th>Identificador</th>
                                @endif
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th class="text-center">Status</th>
                                @if($isSubcategory)
                                    <th class="text-center">Produtos</th>
                                @endif
                                <th class="product-action"><i class="mdi mdi-dots-horizontal"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->code }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="text-center">{{ $category->status == '1' ? 'Ativo' : 'Inativo' }}</td>
                                    @if($isSubcategory)
                                        <td class="text-center">
                                            <a class="products-link"
                                               href="{{ url('/admin/produtos/' .$category->code) }}"
                                               title="Ver todos os produtos">
                                                <i class="mdi mdi-format-list-bulleted"></i> Produtos
                                            </a>
                                        </td>
                                    @endif
                                    <td class="product-action">
                                        <a href="{{ url('/admin/categorias/' . $category->code . '/editar' . ($isSubcategory ? '?subcategory=1':'')) }}"
                                           title="Editar Categoria">
                                            <i class="mdi mdi-circle-edit-outline"></i>
                                        </a>
                                        @if(!$isSubcategory)
                                            <a href="{{ url('/admin/subcategorias/' . $category->code . '/?link=category') }}"
                                               title="Sub-categorias">
                                                <i class="mdi mdi-file-tree"></i>
                                            </a>
                                        @endif
                                        <a href="{{ url('/admin/categorias/' . $category->code . '/remover') }}"
                                           title="Remover Categoria">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                        {{--                    <a href="{{ url('/admin/produtos/' . $category->code . '/novo?link=category') }}" title="Adicionar Produto">--}}
                                        {{--                      <i class="mdi mdi-plus"></i>--}}
                                        {{--                    </a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
