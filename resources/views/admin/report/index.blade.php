@extends('admin.layout.master')

@section('title')
    <title>Reports</title>
@endsection

@section('content')
    <div>
        <ul class="bg-blue-900 py-2 flex justify-start rounded">

            <li class="text-white mx-2 dailey-li cursor-pointer border-b-2 border-white">Dailay</li>
            <li class="text-white mx-2 monthly-li cursor-pointer">Monthly</li>
        </ul>
        {{-- dailey --}}
        <div class="dailey-div">
            <section class="bg-white">
                <div class="p-4 shadow-lg rounded-lg">
                    <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                        <h1 class="text-2xl font-semibold text-gray-600">Dailey reports</h1>

                    </div>
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th class="text-left" data-priority="4">SL</th>
                                <th class="text-left" data-priority="4">Date</th>
                                <th class="text-left" data-priority="2">Particular</th>
                                <th class="text-left" data-priority="4">Income</th>
                                <th class="text-left" data-priority="4">Expanse</th>
                                <th class="text-left" data-priority="4">Balance</th>


                            </tr>
                        </thead>
                        <tbody>
                            @if ($dailey)
                                <tr>
                                    @foreach ($dailey as $item)
                                        <td>{{ $item->transaction_no }}</td>
                                        <td>
                                            {{ $item->date }}
                                        </td>
                                        <td>{{ $item->particular }}</td>
                                        <td class="income-td">
                                            {{ $item->transaction_type == 'income' ? $item->amount : '0' }}</td>
                                        <td class="expanse-td">
                                            {{ $item->transaction_type == 'expanse' ? $item->amount : '0' }}</td>
                                        <td id="balance" style="display: table-cell"></td>
                                </tr>

                            @endforeach
                            @endif


                            <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        {{-- monthly --}}
        <div class="monthly-div hidden">
            <section class="bg-white">
                <div class="p-4 shadow-lg rounded-lg">
                    <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                        <h1 class="text-2xl font-semibold text-gray-600">Monthly reports</h1>

                    </div>
                    <table id="example2" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th class="text-left" data-priority="4">SL</th>
                                <th class="text-left" data-priority="4">Date</th>
                                <th class="text-left" data-priority="2">Particular</th>
                                <th class="text-left" data-priority="4">Income</th>
                                <th class="text-left" data-priority="4">Expanse</th>
                                <th class="text-left" data-priority="4">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($monthly)
                                <tr>
                                    @foreach ($monthly as $item)
                                        <td>{{ $item->transaction_no }}</td>
                                        <td>
                                            {{ $item->date }}
                                        </td>
                                        <td>{{ $item->particular }}</td>
                                        <td class="income-month-td">
                                            {{ $item->transaction_type == 'income' ? $item->amount : '0' }}</td>
                                        <td class="expanse-month-td">
                                            {{ $item->transaction_type == 'expanse' ? $item->amount : '0' }}</td>
                                        <td id="balance-monthly" style="display: table-cell"></td>
                                </tr>

                            @endforeach
                            @endif

                            <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('head')
    <style>
        /*Overrides for Tailwind CSS */
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

    </style>

@endsection

@section('script')
    <script>
        $(document).on('click', '.monthly-li', function() {
            $('.monthly-div').removeClass('hidden')
            $('.dailey-div').addClass('hidden')
            $(this).addClass('border-b-2 border-white')
            $('.dailey-li').removeClass('border-b-2 border-white')
        })
        $(document).on('click', '.dailey-li', function() {
            $('.dailey-div').removeClass('hidden')
            $('.monthly-div').addClass('hidden')
            $(this).addClass('border-b-2 border-white')
            $('.monthly-li').removeClass('border-b-2 border-white')
        })
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
    <script>
        let income = []
        income = $('.income-td').text()
        let expanse = $('.expanse-td').text()


        var incomes = Array();
        $(".income-td").each(function(i, v) {
            incomes[i] = parseInt($(this).text());
        })


        let sumOfIncomes = sum(incomes)


        var expanses = Array();
        $(".expanse-td").each(function(i, v) {
            expanses[i] = parseInt($(this).text());
        })
        let sumOfExpanse = sum(expanses)

        function sum(numbers) {
            return numbers.reduce((accumulator, current) => {
                return accumulator += current;
            });
        };

        let balance = sumOfIncomes - sumOfExpanse
        $('#balance').text(balance)
    </script>
    <script>
        // let incomem = []
        // incomem = $('.income-month-td').text()
        // let expansem = $('.expanse-month-td').text()


        var incomesm = Array();
        $(".income-month-td").each(function(i, v) {
            incomesm[i] = parseInt($(this).text());
        })


        let sumOfIncomesm = sum(incomesm)


        var expansesm = Array();
        $(".expanse-month-td").each(function(i, v) {
            expansesm[i] = parseInt($(this).text());
        })
        let sumOfExpansem = summ(expansesm)

        function summ(numbers) {
            return numbers.reduce((accumulator, current) => {
                return accumulator += current;
            });
        };

        let balancem = sumOfIncomesm - sumOfExpansem
        console.log(balancem)
        $('#balance-monthly').text(balancem)
    </script>
@endsection
