@extends('layout/master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>All Expenses</h4>
                      <div class="card-header-form">
                        <form>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <tr>
                            <th class="text-center">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                  class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Expense Title</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>markAs</th>
                            <th>Expense On</th>
                            <th>Date of Expense</th>
                            <th>Mode of Expense</th>
                            
                          </tr>

                          @foreach ($expenses as $expense)
                            <tr>
                                <td class="p-0 text-center">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                    id="checkbox-1">
                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                </div>
                                </td>
                                <td>{{$expense->expenseTitle}}</td>
                                <td class="align-middle">
                                    {{$expense->amount}}
                                </td>
                                <td>
                                    {{$expense->description?$expense->description:"-"}}
                                </td>
                                <td>{{$expense->markAs}}</td>
                                <td>
                                    {{$expense->expenseOn}}
                                </td>
                                <td>{{$expense->dateOfExpense}}</td>
                                <td>{{$expense->modeOfExpense}}</td>
                            </tr>                              
                          @endforeach
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </section>
    </div>

@endsection