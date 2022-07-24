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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary">GridStack.js</div>
                <div class="card-body">
                    <body>
                    <div class="gridly">
                        <div class="brick small">teste1</div>
                        <div class="brick small">teste2</div>
                        <div class="brick large">teste3</div>
                        <div class="brick small">teste4</div>
                        <div class="brick small">teste5</div>
                        <div class="brick large">teste6</div>
                    </div>
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

    $('.gridly').gridly({
        base: 60, // px
        gutter: 20, // px
        columns: 12
    });
</script>

<style type="text/css">
    .gridly {
        position: relative;
        width: 960px;
    }
    .brick.small {
        width: 140px;
        height: 140px;
    }
    .brick.large {
        width: 300px;
        height: 300px;
    }
    .brick{
        border: 5px solid;
    }
</style>
@endsection
