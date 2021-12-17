@extends('admin.layout.master')

@section('title')
    <title>Products</title>
@endsection

@section('content')
    <section>
        <div class="lg:flex xl:flex gap-3">
            <div class="lg:w-1/3 xl:w-1/3">
                <div class=" bg-white rounded w-full">
                    <h1 class="text-center font-bold text-2xl border-b-2 border-gray-300 text-gray-600 py-2 ">ADD PARTICULAR
                    </h1>
                    <form action="{{ route('particular.action') }}" method="post">
                        @csrf
                        <div class="p-4">
                            <label for="title">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title"
                                    class="w-full px-2 py-1 border-2 border-gray-300 rounded">
                                @error('title')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="uppercase px-5 py-1 rounded w-full mt-4 bg-green-600 text-white">submit</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="lg:w-2/3 xl:w-2/3">
                <div class="p-4 shadow-lg rounded-lg bg-white">

                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th class="text-left" data-priority="2">ST</th>
                                <th class="text-left" data-priority="4">Title</th>
                                <th class="text-left" data-priority="4">Created</th>


                                <th class="text-left" data-priority="5">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($part)
                                @foreach ($part as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td class="">
                                            {{-- <a href="{{}}"><i class="fas fa-edit"></i></a> --}}
                                            <a href="{{ route('particular.delete', $item->id) }}"><i
                                                    class="fas fa-trash text-red-500"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                            @endif


                            <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
