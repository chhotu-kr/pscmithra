<div>
{{json_encode($data['questionslist'][$question_no])}}
{{$question_no}}

<style type="text/css">
    .flex {
  display: flex;
}
.quize-page {
    padding: 50px 0;
    position: relative;
}
.quize-page:before {
    content: '';
        position: absolute;
    width: 37%;
    height: 100%;
    background: #f0f0f0;
    z-index: -1;
    top: 0;
    right: 0;
}
#regForm {
  background-color: #ffffff;
      padding: 20px;
}

#regForm  h1 {
  text-align: left;  
  font-size: 22px;
}


/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: contents;
  border: 1px solid #dbd6e0;
    padding: 10px;
    margin-bottom: 15px;
}

#prevBtn {
  background-color: #4c7bcd;
    border: 0;
    height: 50px;
    border-radius: 5px;
    color: #fff;
    padding: 0 20px;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

.quize-page [type="radio"]:checked+label:after {
      background-color: #4c7bcd;
    width: 100%;
    height: 100%;
    border-radius: 0;
    left: 0;
    top: 0;
    z-index: -1;
    color: #fff;
  
}
.quize-page input[type="radio"]~label::before {
    border: 1px solid #dcdfe0;
    border-radius: 50%;
    opacity: 0;
}
p.quition-para{
    color: #000;
    font-size: 18px;
    margin-bottom: 10px;
}
.quize-page .tab .form-group label {
       width: 100%;
    position: relative;
    z-index: 1;
    padding: 5px 0 5px 10px;
    color: #fff;
    background: #787575;
}
.quize-page .tab .form-group {
    margin-bottom: 20px;
    border: 1px solid #d5cfcf;
    position: relative;
}
.quize-page .quition-no h5 {

}
.user-profile {
display: flex;
}
.user-profile .left-user img {
    width: 90px;
    margin-right: 20px;
}
.user-attempt-question {
    padding-left: 20px;
}
.user-attempt-question .left-right h4 {
    margin: 0;
    margin-top: 18px;
}
.legent-section {
      margin-top: 20px;
}
.legent-section .answerd {

}
.legent-section .answerd .answer-box {
      display: flex;
    justify-content: space-between;
}
.legent-section .answerd .answer-box p {
  width: 49%;
    margin: 0;
    background: #4c7bcd;
    margin-bottom: 10px;
    padding: 6px;
    color: #fff;
    border-radius: 5px;
    text-align: center;
    position: relative;
}
.legent-section .answerd .answer-box p span {
  width: 30px;
    display: inline-block;
    position: absolute;
    left: 0;
    top: 0;
    height: 38px;
    line-height: 38px;
}
.quition-number-plate {

}
.quition-no-box-section {
  height: 185px;
    overflow: auto;
}
.quition-no-box-section span {
  background: #2196f3;
    width: 40px;
    display: inline-block;
    margin: 10px 20px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    color: #fff;
}
.four-btn {
  margin-top: 20px;
    border-top: 1px solid #dcd1d1;
    padding-top: 10px;
}
.four-btn a {
      width: 49%;
    border: 2px solid #00b0ff;
    margin-bottom: 10px;
    text-align: center;
    padding: 5px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    background: #0595d6;
}

 .option p{
    font-size: var(--font-size-b1);
    line-height: var(--line-height-b1);
    font-weight: 400;
    color: white;
    margin: 0 0 0px !important;
} 

.btn-group-vertical.special {
  display: flex;
}

.special .btn {
    /* background-color: #787575; */
  flex: 1
}

button:active::before {
   background-color: #dd4814;
}
</style>

<div class="quize-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form id="regForm">
                  <div class="tab curent">
                    <div class="quition-no">
                        <h5>1/5</h5>
                    </div>
                    <p class="quition-para">{!!$data['questionslist'][$question_no]['question'][0]['Questionin']!!}</p>


                    <div class="btn-group-vertical special btn-group-lg  "class="vh"  role="group">
  <button type="button" class="btn mt-4">Left</button>
  <button type="button" class="btn mt-4">Middle</button>
  <button type="button" class="btn btn-default">Right</button>
</div>



                    <div class="form-group">
                      <input type="radio" id="1">
                      <label  class= "option" for="1">
                        <div wire:click.prevent="onSelect({{1}})" >
                        {!!$data['questionslist'][$question_no]['question'][0]['option1']!!}
                        </div></label>
                    </div>
                    <div class="form-group" wire:click.prevent="onSelect({{2}})">
                      <input type="radio" id="2" class="vh" name="mca">
                      <label class= "option" for="2">{!!$data['questionslist'][$question_no]['question'][0]['option2']!!}</label>
                    </div>
                    <div class="form-group" wire:click.prevent="onSelect({{3}})">
                      <input type="radio" id="3" class="vh" name="mca">
                      <label class= "option" for="3">{!!$data['questionslist'][$question_no]['question'][0]['option3']!!}</label>
                    </div>
                    <div class="form-group" wire:click.prevent="onSelect({{4}})">
                      <input type="radio" id="4" class="vh" name="mca">
                      <label class= "option" for="4">{!!trim($data['questionslist'][$question_no]['question'][0]['option4'])!!}</label>
                    </div>
                  </div>

                  <div style="overflow:auto;">
                  <div style="float:right;">
                    @if ($question_no != 0)
                        <button type="button" class="me-2" id="prevBtn" type="button"
                            wire:click.prevent="prev()">Previous</button>
                    @endif

{{$question_no }}{{ count($data['questionslist'])}}

@if($question_no == (count($data['questionslist'])-1))
<button class="education-btn btn-medium" wire:click.prevent="" type="button" id="nextBtn">
                        Submit</button>
@else
                    <button class="education-btn btn-medium" wire:click.prevent="next()" type="button" id="nextBtn">Save &
                        Next</button>
                        @endif
                </div>
                  </div>
                  <!-- Circles which indicates the steps of the form: -->
                  
                </form>
            </div>
            <div class="col-lg-4">
                <div class="user-attempt-question">
                    <div class="user-profile">
                        
                        <div class="left-right">    
                            <div class="time-section">
                                <span>Time Left : <b>10: 59</b></span>
                            </div>
                        </div>
                    </div>
                   

                    <div class="quition-number-plate">
                      <h4>Your are Viewing LR Section Question Palltte:</h4>
                      <div class="quition-no-box-section">
                      @foreach ( $data['questionslist'] as $item)
@if($item['s']=="false")
    <a wire:click.prevent="jump({{ $loop->index}})"><span style="background: #9e9e9e;" >{{ $loop->index+1 }}</span></a>
    @else

    @if( empty( $item['optSel']))
    <a wire:click.prevent="jump({{ $loop->index}})"><span style="background: #d70b0b;" >{{ $loop->index+1 }}</span></a>
@else
<a wire:click.prevent="jump({{ $loop->index}})"><span style="background: #3ca440;" >{{ $loop->index+1 }}</span></a>
    @endif
@endif    
      @endforeach 
                      </div>
                    </div>
                    <div class="legent-section">
                      <h4>Legend</h4>
                      <div class="answerd">
                        <div class="answer-box">
                          <p><span style="background: #3ca440;"> {{$a}}</span>Answered</p>
                          <p><span style="background: #d70b0b;">{{$w}}</span> Not Answered</p>
                        </div>
                        <div class="answer-box">
                          <p><span style="background: #9e9e9e;">{{$u}}</span> Not Visited</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>