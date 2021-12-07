@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/talkroom.css">
        <title>talkroom</title>
        <!-- Fonts -->
        
    </head>
    
    <body>
        @foreach($talks as $talk)
        <a href="">{{ $talk->title }}</a>
        @endforeach
    </body>

@endsection