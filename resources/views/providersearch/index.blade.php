@extends('layouts.providersearch')

@section('content')
    <the-provider-search csrf="{{csrf_token()}}"></the-provider-search>

@endsection

