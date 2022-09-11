@extends('user.dashboard')
@section('pscmithra')
    @livewire('user.mocktest-result',['testid' => $testid,'examinationId' => $examinationId])
@endsection
