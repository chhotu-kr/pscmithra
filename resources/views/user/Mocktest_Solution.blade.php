@extends('user.dashboard')
@section('pscmithra')

    <div class="quize-page">
        <div class="container">
               @livewire('user.mocktest-solution',['testid' => $testid ,'examinationId' => $examinationId])
        </div>
    </div>

    @endsection
