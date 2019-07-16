@extends('adminbackend')
@section('content')
<section class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <h5 class="card-header">
                <i class="zmdi zmdi-badge-checkzmdi-hc-fw"></i>
                <b>
                <h5>
                            <div class="card-body">
                            <img src="{{ asset('assets/img/artikel/'.$artikel->foto.'') }}"
                            style ="width:300px;" class="float-left rounded m-r-30 m-b-10">
                                        <p> judul : {{ $artikel->judul }} </p>   
                                         <p>nama :  {{ $artikel->user->name }}</p>
                                           <p>konten : {!! $artikel->konten !!}</p>
                            <br>
                            <p>
                            Kategori :
                            <button class="btn btn-sm btn-rounded btn-info">
                            {{ $artikel->kategori->nama }}
                            </button>
                            </p>
                            <p> Tag :
                            @foreach($artikel->tag as $data)
                            <button class="btn btn-sm btn-rounded btn-success">
                            {{ $data->nama_tag}}
                            </button>
                            @endforeach
                            </p>
                            <p>
                            Tanggal : {{$artikel->created_at->format('D M Y H:i:s')}} WIB
                            </p>
                            <p>
                            <a href="#"
                            class="btn btn-outline btn-block btn-rounded btn-info">
                            <i class="la la-paper-plane"> </i>Lihat Artikel <i
                            class="zmdi zmdi-airplane zmdi-hc-fw"></i>
                            </a>

                        </p>
                        </div>
                    </div>
                </div>
                </div>
            </section>
@endsection
