<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Carbon\Carbon; 
use Illuminate\Http\Request;

class homeController extends Controller
{
    // home dashboard
    public function home(){ 
        // Data for the week
        $startWeekDate = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endWeekDate = Carbon::now()->endOfWeek()->format('Y-m-d');

        // data for month
        $startMonthDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endMonthDate = Carbon::now()->endOfMonth()->format('Y-m-d');

        // total Expense 
        $totalExpense = Expense::all()->sum('amount'); 

        $expensesThisWeek = Expense::whereBetween('dateOfExpense', [$startWeekDate, $endWeekDate])->sum('amount');    
        $expensesThisMonth = Expense::whereBetween('dateOfExpense', [$startMonthDate, $endMonthDate])->sum('amount');    
        

        return view('home', ['expenseThisWeek' => $expensesThisWeek, 'expenseThisMonth' => $expensesThisMonth, 'totalExpense' => $totalExpense]); 
    }
}
