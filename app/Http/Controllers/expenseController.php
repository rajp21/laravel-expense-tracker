<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType; 


class expenseController extends Controller
{
    // 

    public function addExpense(){ 
        return view('expense/addExpense'); 
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

}
