@extends('Components.base_without_navigator')

@section('header')
    <a href="{{ route('profile') }}" class="back-arrow"
        style="font-size: 20px; margin-right: 20px; cursor: pointer; text-decoration: none; color: #333;">
        <i class="fa fa-chevron-left"></i>
    </a>
    <div class="menu-title" style="font-size: 18px; font-weight: bold; color: #333;">Kata Sandi</div>
@endsection

@section('content')
    <div class="container">
    </div>
@endsection

@push('after-script')
@endpush
