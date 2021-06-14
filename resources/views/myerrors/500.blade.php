@extends('myerrors.error-layout')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
@section('message_2', 'Something went wrong. Please try again')
