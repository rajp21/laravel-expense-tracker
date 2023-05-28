@extends('layout/master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row ">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                     <form action="{{route('save-expense-type')}}" method="POST">
                        @csrf
                      <div class="card-header">
                        <h4>Add Expense</h4>
                      </div>
                      <div class="card-body">
                        @if (request()->session()->has('success'))
                            <div class="alert alert-success mt-2">
                            {{request()->session()->get('success')}}
                          </div>
                        @endif

                        @if (request()->session()->has('error'))
                            <div class="alert alert-danger mt-2">
                               {{request()->session()->get('error')}}
                            </div>
                        @endif


                        <div class="form-group">
                          <label>Add Expense Type *</label>
                          <input type="text" class="form-control" name="expenseType" required>
                        </div>
                        <div class="text-center"> 
                            <button class="btn btn-primary">Save</button>
                        </div>
                      </form>
                      </div>
                </div>


            </div>
        </section>
    </div>
@endsection


