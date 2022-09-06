<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label>Type</label>
                <select wire:modal="module" name="type" id="selected" class="form-select">
                    <option value="0">Select Type</option>
                    <option value="voice">voice</option>
                    <option value="text">text</option>
                    <option value="quiz">quiz</option>
                    <option value="video">video</option>
                </select>
            </div>
        </div>
        
    </div>

    @if(type=="video"|| type=="voice"){
      
    
        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label>Url</label>
                                    <input type="text" name="url" class="form-control">
                                </div>
                            </div>
                       
    
    }

  
        
    @endif
</div>
