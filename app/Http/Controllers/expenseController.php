<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType; 
use App\Models\Expense; 
use Carbon\Carbon; 


class expenseController extends Controller
{
    // 

    public function addExpense(){ 
        $expTypes = ExpenseType::get(); 
        
      
        
        return view('expense/addExpense', ['expTypes' => $expTypes]); 
    }


    public function addExpenseType(){ 
       
        return view('expense/addExpenseType');
    }

    // save expense type --- post method for the add expense type
    public function saveExpenseType(Request $request){ 
        $request->validate([
            'expenseType' => 'required'
        ]); 

        // check weather expense type is already present or not 
        try { 
            $type = ExpenseType::where('expenseType', $request->expenseType)->first(); 

            if($type){ 
                $request->session()->flash('error', 'Type already exists'); 
                return redirect()->back(); 
            }

        }catch(\Exception $e){ 
            $request->session()->flash('error', 'Something went wrong'); 
            return redirect()->back();
        }

        // store the request type
        try{

            $expenseType = new ExpenseType();     
            $expenseType->expenseType = strtolower($request->expenseType); 
            $expenseType->save();     
            $request->session()->flash('success', "Expense Type Added Successfully");    


            
        }catch(\Exception $e) { 
            $request->session()->flash('success', "Something went wrong");    
        }

        return redirect()->back(); 
    }

    public function saveExpense(Request $request) { 
        $request->validate([
            'expenseTitle' => 'required|min:3', 
            'amount' => 'required', 
            'markAs' => 'required', 
            'expenseOn' => 'required', 
            'modeOfExpense' => 'required',
            'expenseType' => 'required'
        ]); 

        // addming data to expense 



        $expense = new Expense; 

        $dateInput = $request->dateOfExpense; 
        $date; 
        if($dateInput) { 
          $date = Carbon::createFromFormat('Y-m-d', $dateInput); 
        }else { 
            $date = Carbon::now(); 
            $date = $date->format('Y-m-d');
        }

        

        $expense->expenseTitle = strtolower($request->expenseTitle); 
        $expense->amount = $request->amount; 
        $expense->markAs = strtolower($request->markAs); 
        $expense->expenseOn = $request->expenseOn; 
        $expense->dateOfExpense = $date; 
        $expense->modeOfExpense = strtolower($request->modeOfExpense); 
        $expense->expenseType  = strtolower($request->expenseType); 
        $expense->save(); 
        
        $request->session()->flash('success', "Expense Added successfully"); 
        return redirect()->back();        
    }


    public function viewExpense(Request $request){ 
        $expenses = Expense::paginate(2); 
        return view('expense/viewExpense', ['expenses' => $expenses]); 
    }
}
