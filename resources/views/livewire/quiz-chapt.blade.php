<div>
    {{-- Do your work, then step back. --}}
    <div class="col-lg-12">

        @foreach ($quizchapters as $item)
       @livewire('quiz-chapter', ["id"=>$item['id'],"Name"=>$item['name']] ,key($item['id']))
        @endforeach
     </div>
</div>
