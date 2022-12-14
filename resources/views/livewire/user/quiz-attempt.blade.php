<div class="container mt-5 ">
    <div id="tab-1" class="tab-content current">
        <div class="row">
            {{-- {{ $data }} --}}
            @foreach ($data as $item)
                <div class="col-lg-3 col-md-6">

                    <div class="card p-3">
                        <div class="card-body">
                            <div class="content">
                                <h5 class="title ">{{ $item['name'] }}</h5>
                                <ul class="Attempt-sec">
                                    <li class="flex ttc mv-0-67 mv-0-50-l "><span>Questions: </span><span
                                            class="ml-auto">{{ $item['totalQues'] }}</span></li>
                                    <li class="flex mv-0-67 mv-0-50-l "><span>Max Marks: </span><span
                                            class="ml-auto">{{ $item['totalQues'] }}</span></li>
                                    <li class="flex mv-0-67 mv-0-50-l "><span>Time: </span><span
                                            class="ml-auto">{{ $item['totalTimeinMints'] }}</span></li>
                                </ul>

                                @if ($item['type'] == 'Start')
                                    <a class="education-btn btn-medium w-100" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop"
                                        wire:click.prevent="itemId('{{ $item['id'] }}')">{{ $item['type'] }}<i
                                            class="icon-4"></i></a>
                                    <div wire:ignore.self class="modal fade" id="staticBackdrop"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Select Language
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($item['languages'] as $o)
                                                        <div class="form-check languagelabel">
                                                           <input class="form-check-input" type="checkbox"
                                                                name="flexRadioDefault"
                                                                @if ($lang == $o['id']) @checked($checked) @endif
                                                                id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault"
                                                                wire:click.prevent="selectLang('{{ $o['id'] }}')">
                                                                {{ $o['name'] }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <span class="text-danger ms-4"> {!! Session::get('select') !!}</span>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" wire:click.prevent="checkLogin()"
                                                        class="education-btn btn-small btn-primary">Continue</button>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @elseif($item['type'] == 'Buy')
                                    <a class="education-btn btn-medium w-100">{{ $item['type'] }}<i
                                            class="icon-4"></i></a>
                                @elseif($item['type'] == 'resume')
                                    <a class="education-btn btn-medium w-100"
                                        wire:click.prevent="resume('{{ $item['testId'] }}')">Resume<i
                                            class="icon-4"></i></a>
                                @else
                                    <a class="education-btn btn-medium w-100"
                                        wire:click.prevent="result('{{ $item['testId'] }}')">{{ $item['type'] }}<i
                                            class="icon-4"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {{ dd($data) }} --}}
    </div>
</div>
