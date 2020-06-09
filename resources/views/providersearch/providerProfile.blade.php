@extends('layouts.providersearch')

@section('content')


    <provider-search-provider-profile provider="{{$provider}}" csrf="{{csrf_token()}}"></provider-search-provider-profile>

@endsection
