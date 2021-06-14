@extends('myerrors.error-layout')

@section('title', __('Bad Request'))
@section('code', '400')
@section('message', __('Bad Request'))
@section('message_2', 'Something wrong with URL or parameters')
