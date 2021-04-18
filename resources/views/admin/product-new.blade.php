@extends('layout.admin')
@section('content')

    <section class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ $backUrl }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-block">

                    <h3 class="card-title">Adicionar Produto</h3>

                    <form class="form-horizontal" id="saveProductForm" action="{{ url('/admin/produtos/salvar') }}"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="previous_link" value="{{ $previousLink }}">
                        {{ csrf_field() }}
                        <fieldset>

                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status0" name="status" class="custom-control-input"
                                           checked="checked" value="1">
                                    <label class="custom-control-label" for="status0">Exibir no site</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status1" name="status" class="custom-control-input"
                                           value="0">
                                    <label class="custom-control-label" for="status1">Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="category">Categoria</label>

                                <div class="col-12 no-padding">
                                    <select name="category" id="category" class="form-control">
                                        @foreach($categories as $cat)
                                            @if($cat->category)
                                                <option
                                                    value="{{$cat->code}}" <?php if ($cat->code == $category->code) {
                                                    echo 'selected="selected"';
                                                } ?>>{{$cat->name}} ({{$cat->code}})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="code">Código</label>

                                <div class="col-12 no-padding">
                                    <input id="code" name="code" type="text" placeholder="Código do produto"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="image">Foto</label>

                                <div class="col-12 no-padding">
                                    <div class="custom-file">
                                        <input id="image" name="image" type="file" class="custom-file-input">
                                        <label class="custom-file-label" for="image">Escolha uma foto</label>
                                    </div>
                                </div>
                                <div id="image_file" style="font-style: italic; padding: 5px;"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="description">Cores</label>
                                <div class="col-12 no-padding">
                                    <div class="input-group mb-3" style="max-width: 300px;">
                                        <input value="ffffff" id="colorInput"
                                               class="form-control jscolor {width:101, padding:0, shadow:false, borderWidth:0, backgroundColor:'transparent', insetColor:'#000'}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button" id="addColor">Adicionar
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <em class="form-text">Selecione uma core e clique em Adicionar</em>
                                    </div>
                                    <input type="hidden" name="colors" id="colors" value="[]">

                                    @php
                                        $colors = json_decode('[]');
                                    @endphp

                                    <div class="row p-3 @if(count($colors) === 0) d-none @endif" id="colorsContainer">
                                        @foreach($colors as $color)
                                            <div class="color col-1 p-3 mb-3 border" data-color="{{ $color }}"
                                                 style="background-color: {{ $color }};"></div>
                                        @endforeach
                                    </div>
                                    <div class="px-0 @if(count($colors) === 0) d-none @endif" id="removeColorMsg"
                                         style="margin-top: -25px;">
                                        <small class="form-text font-weight-bold"><span
                                                class="mdi mdi-trash-can"></span> Duplo clique na cor para
                                            remover</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-12 control-label no-padding" for="description">Descrição</label>

                                <div class="col-12 no-padding">
                                    <textarea class="form-control" id="description" name="description"
                                              placeholder="Informações do produto não aceitam formatação, somente quebra de linha..."
                                              rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-12 widget-right no-padding">
                                    <button type="button" id="submitButton" class="btn btn-primary btn-md float-right">
                                        <i class="fas fa-save"></i> Salvar Produto
                                    </button>
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
    <script type="text/javascript">

        jQuery(function () {
            $('#addColor').click(function () {
                var $colorInput = $('#colorInput');
                var color = $colorInput.val().toLocaleLowerCase();
                var $colors = $('#colors');
                var colors = JSON.parse($colors.val());
                $('#colorsContainer').removeClass('d-none');
                $('#removeColorMsg').removeClass('d-none');
                $('#colorsContainer').append('<div class="color col-1 p-3 mb-3 border" data-color="#' + color + '" style="background-color: #' + color + ';"></div>');
                colors.push('#' + color);
                $colors.val(JSON.stringify(colors));
            });

            $(document).on('dblclick', '.color', function () {
                var $this = $(this);
                var confirma = confirm('Remover?');
                var $colors = $('#colors');
                var colors = JSON.parse($colors.val());

                if (confirma) {
                    var color = $this.data('color');

                    var _colors = colors.filter(c => {
                        return c !== color;
                    });

                    $colors.val(JSON.stringify(_colors));
                    $this.remove();
                }
            });

            $('#category').change(function () {

                var $code = $('#code');
                var $category = $('#category');

                var code = $code.val().toLowerCase();
                var category = $category.val().toLowerCase() + "_";

                var testCode = new RegExp("^" + category);

                if (!testCode.test(code)) {
                    $code.val(category);
                }

                $code.focus();
            });

            $('#code').click(function () {

                var $code = $('#code');
                var $category = $('#category');

                var code = $code.val().toLowerCase();
                var category = $category.val().toLowerCase() + "_";

                var testCode = new RegExp("^" + category);

                if (!testCode.test(code)) {
                    $(this).val(category);
                }

            });

            $('#image').change(function () {

                $('#image_file').html('');

                var _URL = window.URL || window.webkitURL;

                var $image = $(this);

                var minWidth = 640;
                var image, file;

                if ((file = this.files[0])) {
                    image = new Image();
                    image.src = _URL.createObjectURL(file);
                    image.onload = function () {

                        var width = this.width;
                        var height = this.height;
                        var check = 'largura';

                        if (height > width) {
                            width = height;
                            check = 'altura';
                        }

                        if (width < minWidth) {
                            alert('Imagem deve ter no mínimo 640px de ' + check);
                            $image.focus();
                        } else {
                            var imageSplit = $image.val().split('\\');
                            $('#image_file').html('Arquivo <b>' + imageSplit[imageSplit.length - 1] + '</b> selecionado');
                        }
                    };
                }
            });

            $('#submitButton').click(function (e) {

                var $code = $('#code');
                var $category = $('#category');

                var code = $code.val().toLowerCase();
                var category = $category.val().toLowerCase() + "_";

                var testCode = new RegExp("^" + category);

                if (!testCode.test(code)) {
                    alert('Código do produto deve começar com "' + category + '"');
                    $code.val(category).focus();
                    return false;
                }

                if (code === category) {
                    alert('Informe o código do produto completo');
                    $code.val(category).focus();
                    return false;
                }

                if ($('#image_file').html() === '') {
                    return false;
                }

                $('#saveProductForm').submit();
            });
        });
    </script>
@endsection
