@extends('layout.admin')
@section('content')
  <form action="{{ url('/admin/banner/salvar') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <section class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-block">
            <h3 class="card-title">Banner</h3>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 150px;">Imagem</th>
                  <th>
                    Texto
                    <em style="font-weight: normal">(Evite textos longos)</em>
                  </th>
                  <th>
                    Link
                    <em style="font-weight: normal">(Copie e cole o link!)</em>
                  </th>
                  <th>Ordem</th>
                  <th style="width: 50px;">Exibir</th>
                </tr>
                </thead>
                <tbody>



                @foreach($banners as $banner)
                  <tr>
                    <input type="hidden" name="id[]" value="{{ $banner->id }}">
                    <td class="text-center">
                      <a href="{{ asset('banner/' . $banner->image)}}" target="_blank">
                        <img src="{{ asset('banner/' . $banner->image) }}" id="target-image-{{$banner->id}}" style="max-width: 100%"/></a>
                      <input type="file" name="image[]" id="image-{{$banner->id}}" class="change-banner-image">
                      <label class="btn btn-primary" for="image-{{ $banner->id }}" style="margin-top: 5px;" >trocar</label>
                    </td>
                    <td class="align-middle">
                      <input class="form-control" type="text" name="title[]" value="{{ $banner->title }}" style="margin-bottom: 3px;">
                      <input class="form-control" type="text" name="subtitle[]" value="{{ $banner->subtitle }}">
                    </td>
                    <td class="align-middle"><input class="form-control" type="text" name="link[]" value="{{ $banner->link }}"></td>
                    <td class="align-middle">
                      <select name="order[]" id="order-{{$banner->order}}" class="custom-select banner-order">
                        <option value="1" {{ $banner->order == '1' ? 'selected="selected"' : '' }}>1</option>
                        <option value="2" {{ $banner->order == '2' ? 'selected="selected"' : '' }}>2</option>
                        <option value="3" {{ $banner->order == '3' ? 'selected="selected"' : '' }}>3</option>
                        <option value="4" {{ $banner->order == '4' ? 'selected="selected"' : '' }}>4</option>
                        <option value="5" {{ $banner->order == '5' ? 'selected="selected"' : '' }}>5</option>
                      </select>
                    </td>
                    <td class="text-center align-middle">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="status-{{ $banner->id }}" name="status-{{ $banner->id }}" class="custom-control-input"
                               value="1" {{ $banner->status == '1'?'checked="checked"':'' }}>
                        <label class="custom-control-label" for="status-{{ $banner->id }}"></label>
                      </div>
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
    <section class="row">
      <div class="col-md-12">
        <div class="form-group">
          <button class="btn btn-primary"><i class="fas fa-save"></i> Salvar Alterações</button>
        </div>
      </div>
    </section>
  </form>
@endsection
