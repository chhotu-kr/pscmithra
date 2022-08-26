<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="container">
        <div class="row">
            @foreach ($examination as $item)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                           {{$examination->exam_name}} 
                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</div>
