@extends('adminbackend')
@section('css')
<link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
<script src="{{asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    <i class="la la-desktop">
                        </i> Artikel
                    </h5>
                     <div class="card-body">
                        <form action = "{{route('artikel.update',$artikel->id)}}" method="post" enctype="multipart/form-data">
                            <input type ="hidden" value="PATCH" name="_method">
                                {{ csrf_field() }}
                                 <div class="form-group">
                                <label>Judul</label>
                             <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                 name="judul" placeholder="{{ $artikel->judul }}" required>

                         </div>
                         <div class="form-group">
                            <label>Foto</label>
                            @if(isset($artikel)&& $artikel->foto)
                                <p>
                                    <img src="{{ asset('assets/img/artikel/'.$artikel->foto.'')}}"
                                    style="margin-top:15px;margin-buttom:15px;
                                    max-height:100px; border:1px; border-color:black;">
                                </p>
                            @endif
                            <input type="file" class="form-control
                            @error('foto') is-invalid @enderror"
                            name="foto" value="{{ $artikel->foto }}">


                         </div>
                         <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control
                                    @error('kategori') is-invalid @enderror"
                                    name="id_kategori" required>
                                @foreach ($kategori as $data)
                                     <option value="{{ $data->id }}"
                                        @if ($data->id == $artikel->id_kategori)  selected="selected" @endif>
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>

                             </div>
                        <div class="form-group">
                                <label>Tag</label>
                                <select class="form-control
                                    @error('tag') is-invalid @enderror"
                                    id="s2_demo3" multiple="multiple"
                                    name="tag[]" required>
                                @foreach ($tag as $data)
                                    <option value="{{ $data->id }}" {{ (in_array($data->id, $select)) ? 'selected="selected"' : '' }} >
                                        {{ $data->nama_tag }}
                                    </option>
                                @endforeach
                                </select>

                            </div>
                        <div class="from-group">
                            <label>Konten</label>
                            <textarea id="editor1" class="form-control
                            @error('konten') is invalid @enderror"
                            name="konten" required>{{$artikel->konten}}
                        </textarea>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline
                            btn-primary btn-rounded btn-block">
                            simpan
                        </button>
                        </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</section>

@endsection
