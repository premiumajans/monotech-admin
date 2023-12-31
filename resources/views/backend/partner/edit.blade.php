@extends('master.backend')
@section('title',__('backend.partner'))
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="card">
                            <form action="{{ route('backend.partner.update',$id) }}" class="needs-validation" novalidate
                                  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @include('backend.templates.components.card-col-12',['variable' => 'partner'])
                                    @include('backend.templates.components.multi-lan-tab')
                                    <div class="tab-content p-3 text-muted">
                                        @foreach(active_langs() as $lan)
                                            <div class="tab-pane @if($loop->first) active show @endif"
                                                 id="{{ $lan->code }}"
                                                 role="tabpanel">
                                                <div class="form-group row">
                                                    <div class="mb-3">
                                                        <label>@lang('backend.name') <span class="text-danger">*</span></label>
                                                        <input name="name[{{ $lan->code }}]" type="text"
                                                               class="form-control"
                                                               required=""
                                                               value="{{ $partner->translate($lan->code)->name ?? __('backend.translation-not-found') }}">
                                                        {!! validation_response('backend.name') !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>@lang('backend.description') <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="description[{{ $lan->code }}]"
                                                                  id="elm{{$lan->code}}1"
                                                                  class="form-control"
                                                                  required="">{!! $partner->translate($lan->code)->description ?? __('backend.translation-not-found') !!}</textarea>
                                                        {!! validation_response('backend.description') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="mb-3">
                                                <label>@lang('backend.photo') <span
                                                        class="text-danger">*</span></label>
                                                <input name="photo" type="file" class="form-control mb-2">
                                                @if(file_exists($partner->photo))
                                                    <img src="{{ asset($partner->photo) }}" class="form-control w-100">
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label>@lang('backend.photos')</label>
                                                <input type="file" class="form-control mb-2" id="photos" name="photos[]"
                                                       multiple>
                                                <div id="image-preview-container" class="d-flex flex-wrap"></div>
                                                @if($partner->photos()->exists())
                                                    <div class="d-flex"
                                                         style="min-height: 150px; overflow: hidden; margin-bottom: 10px;border: 1px solid black; flex-wrap:wrap">
                                                        @foreach($partner->photos()->get() as $photo)
                                                            <div style="position:relative;" class="wraper col-2 m-3">
                                                                <img src="{{ asset($photo->photo) }}"
                                                                     style="height: 200px; width: 200px; object-fit: cover;">
                                                                <a style="position: absolute; right:5px; top:5px"
                                                                   type="button" class="btn btn-danger"
                                                                   href="{{ route('backend.deletePhoto',['model' => 'Partner','id' => $photo->id]) }}">X</a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                @include('backend.templates.components.buttons')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @livewireScripts
    @include('backend.templates.components.tiny')
    @include('backend.templates.components.preview-images')
@endsection
