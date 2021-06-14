@extends('myerrors.error-layout')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('message_2', 'Please input your Personal Access Token correctly')
