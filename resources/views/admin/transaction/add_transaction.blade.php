@extends('admin.layout.master')

@section('title')
    <title>Add Transaction</title>
@endsection

@section('content')
    @can('admin')
        <section>
            <div class="p-5 bg-white rounded-md">
                <form action="{{ route('transaction.action') }}" method="post">
                    @csrf
                    <h1 class="text-2xl font-bold uppercase mb-4 text-gray-600">Add Transaction</h1>
                    <div class="">
                        <label for="transaction_no" class="text-gray-600">Transaction number</label>
                        <div>
                            <input type="text" readonly name="transaction_no" id="transaction_no"
                                class="px-2 py-1 rounded border-2 border-gray-300 w-full mt-2 auto-transaction">

                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                        <div class="">
                            <label for="date" class="text-gray-600">Date <span class="text-red-500">*</span></label>
                            <div>
                                <input required type="date" name="date" id="date"
                                    class="px-2 py-1 rounded border-2 border-gray-300 w-full mt-2 ">
                            </div>
                            @error('date')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="transaction_type" class="text-gray-600">Transaction Type <span
                                    class="text-red-500">*</span></label>
                            <div>
                                <select type="text" name="transaction_type" id="transaction_type"
                                    class="px-2 py-1 rounded border-2 border-gray-300 w-full mt-2 ">
                                    <option value="income">Income</option>
                                    <option value="expanse">Expanse</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                        <div class="">
                            <label for="particular" class="text-gray-600">Particular <span
                                    class="text-red-500">*</span></label>
                            <div>
                                <select type="text" name="particular" id="particular"
                                    class="px-2 py-1 rounded border-2 border-gray-300 w-full mt-2 ">
                                    @if ($part)
                                        @foreach ($part as $item)
                                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label for="date" class="text-gray-600">Amount <span class="text-red-500">*</span></label>
                            <div>
                                <input required type="text" name="amount" id="amount"
                                    class="px-2 py-1 rounded border-2 border-gray-300 w-full mt-2 ">
                            </div>
                            @error('amount')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="px-5 py-1 bg-green-500 rounded text-white mt-4 shadow-md">SUBMIT</button>
                </form>
            </div>
        </section>
    @endcan
@endsection

@section('head')

    <style>


    </style>
@endsection

@section('script')
    <script>
        let tr = $('.auto-transaction')
        let rand = Math.floor(Math.random() * 10000000)
        tr.val(rand);
    </script>
@endsection
