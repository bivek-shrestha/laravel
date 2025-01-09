@extends('admin.templates.edit')

@push('styles')
@endpush

@section('form_content')
    @include('admin.slider.form', ['action' => 'edit'])
@endsection

@push('scripts')
@endpush
