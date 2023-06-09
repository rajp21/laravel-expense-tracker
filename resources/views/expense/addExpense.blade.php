@extends('layout/master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row ">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Expense</h4>
                  </div>
                  <div class="card-body">
                        @if (request()->session()->has('success'))
                              <div class="alert alert-success mt-2">
                                  {{request()->session()->get('success')}}
                              </div>
                          @endif
                        <form action="{{route('save-expense')}}" method="POST">
                          @csrf
                        <div class="form-group">
                          <label>Expense Title *</label>
                          <input type="text" class="form-control" name="expenseTitle" required>
                        </div>
                        <div class="form-group">
                          <label>Expense Amount *</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                {{-- <i class="fas fa-phone"></i> --}}
                                <b>₹</b>
                              </div>
                            </div>
                            <input type="text" class="form-control" name="amount" required  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Description (optional)</label>
                          <div class="input-group">
                            <textarea name="description" id="description" class="form-control"></textarea>
                          </div>
                          <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Mark As * </label>
                          <div class="input-group">
                            <select class="form-control" name="markAs" required>
                                <option value="">Not Selected</option>
                                <option value="unNecessary">Neccessary</option>
                                <option value="unnecessary">Un-neccessary</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                            <label>Expense On * </label>
                            <div class="input-group">
                              <select class="form-control" name="expenseOn" required>
                                  <option value="">Not Selected</option>
                                  @foreach ($expTypes as $type)
                                    <option value="{{$type->id}}">{{$type->expenseType}}</option>                                    
                                  @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label>Expense Category * </label>
                            <div class="input-group">
                              <select class="form-control" name="expenseType" required>
                                  <option value="">Not Selected</option>
                                  <option value="fixed">Fixed</option>
                                  <option value="notfixed">Not Fixed</option>
                              </select>
                            </div>
                          </div>
                        
                        <div class="form-group">
                          <label>Date of Expense (optional) </label>
                          <input type="date" name="dateOfExpense" class="form-control datemask" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="form-group">
                          <label>Mode Of Expense * </label>
                          <select class="form-control" name="modeOfExpense" required>
                             <option value="">Not Selected</option>
                             <option value="online">Online</option>
                             <option value="offline">Offline</option>
                             <option value="card">Card</option>
                          </select>

                        </div>

                        
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                      </div>
                    </div>    

                </div>

            </div>
        </section>
    </div>
@endsection


