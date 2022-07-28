@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header bg-secondary">Grid.js</div>--}}
{{--                <div class="card-body">--}}
{{--                    <body>--}}
{{--                        <div id="wrapper"></div>--}}
{{--                    </body>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

<script>
    $.ajax({
        url: "{{route('grid')}}",
        method: "GET",
        success: (data) => {
            new gridjs.Grid({
                language: {
                    'search': {
                        'placeholder': 'Procurar...'
                    },
                    'pagination': {
                        'previous': '<️',
                        'next': '>',
                        'showing': 'Mostrando',
                        'results': () => 'Encontrados'
                    }
                },
                columns: ["Name", "Email"],
                data: data,
                search: {
                    enabled: true
                },
                pagination: {
                    enabled: true,
                    limit: 10,
                    summary: false
                }
            }).render(document.getElementById("wrapper"));
        },
        error: () => {
            console.error("Server error, check your response");
        },
    });


</script>
@endsection
