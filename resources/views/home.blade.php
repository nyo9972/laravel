@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary">Grid.js</div>
                <div class="card-body">
                    <body>
                        <div id="wrapper"></div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
        columns: ["Name", "Email", "Phone Number"],
        data: [
            ["John", "john@example.com", "(353) 01 222 3333"],
            ["Mark", "mark@gmail.com", "(01) 22 888 4444"],
            ["Eoin", "eoin@gmail.com", "0097 22 654 00033"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Afshin", "afshin@mail.com", "(353) 22 87 8356"]
        ],
        search: {
            enabled: true
        },
        pagination: {
            enabled: true,
            limit: 10,
            summary: false
        }
    }).render(document.getElementById("wrapper"));

</script>
@endsection
