@extends('myerrors.error-layout')

@section('title', __('Unprocessable Entity'))
@section('code', '422')
@section('message', __('Unprocessable Entity'))
@section('message_2', 'You do not have permission to access that.')
