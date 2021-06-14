@extends('myerrors.error-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('message_2', 'Please input your Username and Repository Name correctly')
{{-- @section('message_3', "Username and Repository named $username/$repo_name can't be found") --}}
@section('username', "$username")
@section('repo_name', "$repo_name")
