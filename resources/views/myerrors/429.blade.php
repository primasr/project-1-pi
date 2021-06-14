@extends('myerrors.error-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('message_2', 'Something went wrong. Please try again with less input')
