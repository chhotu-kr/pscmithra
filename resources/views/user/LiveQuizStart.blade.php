@extends('user.dashboard')
@section('pscmithra')

    <div class="quize-page">
        <div class="container">
            {{-- {{ dd($data['examinationId']) }} --}}
            @livewire('user.live-quiz-start', ['testId' => $data['testId'], 'examinationId' => $data['examinationId']])
        
        </div>
    </div>

    @endsection
