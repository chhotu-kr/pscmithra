{{-- 
<form id="regForm" action="">
    <h1>Quizes </h1>

    {{-- {{ json_encode($data) }} --}}
    <!-- One "tab" for each step in the form: -->
    {{-- <div class="tab">
        <div style="display: flex;flex-direction:row">
            <div class="quition-no me-5">
                <h4> {{ $question_no + 1 }} </h4>
            </div>
            <div>
                <p class="quition-para">
                    {{ json_encode($data['questionslist'][$question_no]['question'][0]['Questionin']) }}</p>
            </div>
        </div>
        <div class="form-group"  wire:click.prevent="onSelect({{ 1 }})" >
            <input type="radio" id="1" class="vh" name="options">
            <label
                for="1">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option1']) }}</label>

        </div>
        <div class="form-group" wire:click.prevent="onSelect({{ 2 }})"  >
            <input type="radio" id="2" class="vh" name="options">
            <label
                for="2">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option2']) }}</label>
        </div>
        <div class="form-group" wire:click.prevent="onSelect({{ 3 }})"  >
            <input type="radio" id="3" class="vh" name="options">
            <label
                for="3">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option3']) }}</label>
        </div>
        <div class="form-group" wire:click.prevent="onSelect({{ 4 }})"  >
            <input type="radio" id="4" class="vh" name="options">
            <label
                for="4">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option4']) }}</label>
        </div>
    </div>



    <div style="overflow:auto;">
        <div style="float:right;">
            @if ($question_no != 0)
                <button type="button" class="me-2" id="prevBtn" type="button"
                    wire:click.prevent="prev()">Previous</button>
            @endif
            <button class="education-btn btn-medium" wire:click.prevent="next()" type="button" id="nextBtn">Save &
                Next</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;display: none;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>  --}}


{{ json_encode($data['questionslist'][$question_no]) }}

<div class="row">
    <div class="col-md-8">

        <form id="regForm" action="">
            <h1>Quizes </h1>
        
            
            <div class="tab">
                <div style="display: flex;flex-direction:row">
                    <div class="quition-no me-5">
                        <h4> {{ $question_no + 1 }} </h4>
                    </div>
                    <div>
                        <p class="quition-para">
                            {{ json_encode($data['questionslist'][$question_no]['question'][0]['Questionin']) }}</p>
                    </div>
                </div>
                <div class="form-group"  wire:click.prevent="onSelect({{ 1 }})" >
                    <input type="radio" id="1" class="vh" name="options">
                    <label
                        for="1">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option1']) }}</label>
        
                </div>
                <div class="form-group" wire:click.prevent="onSelect({{ 2 }})"  >
                    <input type="radio" id="2" class="vh" name="options">
                    <label
                        for="2">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option2']) }}</label>
                </div>
                <div class="form-group" wire:click.prevent="onSelect({{ 3 }})"  >
                    <input type="radio" id="3" class="vh" name="options">
                    <label
                        for="3">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option3']) }}</label>
                </div>
                <div class="form-group" wire:click.prevent="onSelect({{ 4 }})"  >
                    <input type="radio" id="4" class="vh" name="options">
                    <label
                        for="4">{{ json_encode($data['questionslist'][$question_no]['question'][0]['option4']) }}</label>
                </div>
            </div>
        
        
        
            <div style="overflow:auto;">
                <div style="float:right;">
                    @if ($question_no != 0)
                        <button type="button" class="me-2" id="prevBtn" type="button"
                            wire:click.prevent="prev()">Previous</button>
                    @endif
                    <button class="education-btn btn-medium" wire:click.prevent="next()" type="button" id="nextBtn">Save &
                        Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;display: none;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
        
    </div>
    <div class="col-lg-4">

        <div class="user-attempt-question">
            <div class="user-profile">
                <div class="left-user">
                    <img src="img/man-avatar-profile1.png">
                </div>
                <div class="left-right">
                    <h4>Amit Kumar</h4>
                    <div class="time-section">
                        <span>Time Left : <b id="countdown">10:20</b></span>
                    </div>
                </div>
            </div>
            <div class="legent-section">
                <h4>Legend</h4>
                <div class="answerd">
                    <div class="answer-box">
                        <p><span style="background: #3ca440;">5</span> Answered</p>
                        <p><span style="background: #d70b0b;">2</span> Not Answered</p>
                    </div>
                    <div class="answer-box">
                        <p><span style="background: #ff5722;">50</span> Marked</p>
                        <p><span style="background: #9e9e9e;">3</span> Not Visited</p>
                    </div>
                </div>
            </div>

            <div class="quition-number-plate">
                <h4>Your are Viewing LR Section Question Palltte:</h4>
                <div class="quition-no-box-section">
                    @foreach ( $data['questionslist'] as $item)
                    <span>{{ $loop->index+1 }}</span>
                    @endforeach 
                   
                </div>
            </div>
            <div class="four-btn">
                <a href="">Question Paper</a>
                <a href="">Instructions</a>
                <a href="">Profile</a>
                <a href="">Submit</a>
            </div>

        </div>

    </div>
</div>