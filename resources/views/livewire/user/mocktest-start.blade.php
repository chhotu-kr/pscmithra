<form id="regForm" action="">
    <h1>Quizes </h1>

    {{-- {{ json_encode($data) }} --}}
    <!-- One "tab" for each step in the form: -->
    {{ json_encode($data['questionslist'][$question_no]) }}
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
