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
                                  <option value="commute">Commute (Travel)</option>
                                  <option value="rent">Rent </option>
                                  <option value="messFood">Food (Mess)</option>
                                  <option value="healthyAddonFood">Food ( Healthy Addon )</option>
                                  <option value="junkFood">Food ( Junk Food ) </option>
                                  <option value="necessaryShopping">Shopping (necessary)</option>
                                  <option value="unnecessaryShopping">Shopping (Unnecessary)</option>
                                  <option value="mobileRecharge">Mobile Recharge</option>
                                  <option value="other">Other</option>
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
                            <button class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>    

                </div>

            </div>
        </section>
    </div>
@endsection


