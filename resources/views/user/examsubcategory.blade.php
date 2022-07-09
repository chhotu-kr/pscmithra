{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PSc-Mithra</title>
    <!-- CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('exam.category') }}" class="nav-link text-white fw-bold">Mock
                        Test</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white fw-bold">Quizes</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white fw-bold">Live Exam</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white fw-bold">Study material</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card mt-3">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($category as $cat)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#rocking{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{ $cat->category }}
                                    </button>
                                </h2>
                                @foreach ($cat->subcat as $sub)
                                    <div id="rocking{{ $loop->parent->iteration }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a href="{{ route('exam.subcategory') }}"
                                                class="nav-link">{{ $sub->subcategory }}</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    @foreach ($subcategory as $item)
                        <div class="col-3">

                            <div class="card mt-3">
                                <div class="card-body">
                                    <p> Cayegory-{{ $item->category->category }}</p>

                                    <p> subCategory-{{ $item->subcategory }}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html> --}}
