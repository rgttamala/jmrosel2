<?php



namespace App\Http\Controllers;

use App\Transaction;
use App\Cargo;
use App\Driver;
use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Input;

class TransactionController extends Controller
{

    public function index()
    {

        $startDate = Carbon::now(); //returns current day
        $startMonth = $startDate->firstOfMonth();  
        $endMonth = $startDate->lastOfMonth();  
        
        $clientRate = Transaction::whereMonth('traveldate', $startMonth)
        ->whereMonth('traveldate', $endMonth)
        ->sum('client_rate');       

        $clientBalance = Transaction::whereMonth('traveldate', $startMonth)
        ->whereMonth('traveldate', $endMonth)
        ->sum('client_balance');    

        $subconRate = Transaction::whereMonth('traveldate', $startMonth)
        ->whereMonth('traveldate', $endMonth)
        ->sum('subcon_rate');       

        $subconBalance = Transaction::whereMonth('traveldate', $startMonth)
        ->whereMonth('traveldate', $endMonth)
        ->sum('subcon_balance');   

        return view('admin.transaction')->with(
            [
            'transactions'=> Transaction::all(), 
            'cargos'=>Cargo::all(),
            'clientRate' => $clientRate,
            'clientBalance' => $clientBalance,
            'subconRate' => $subconRate,
            'subconBalance' => $subconBalance
            ]);

    }
   
    public function getTransaction(){
        $transaction = Transaction::get();
        return json_encode(array('data'=>$transaction));
    }


    public function create()
    {
        $cargos = Cargo::all();
        return view('includes.add_transaction')->with('cargos', $cargos);

    }


    public function store(Request $request)
    {
        $transactions = new Transaction;
        $transactions->traveldate = $request->traveldate;
        $transactions->cargo_id = $request->cargo;
        $transactions->docs = $request->docs;
        $transactions->trucking = $request->trucking;
        $transactions->platenumber = $request->platenumber;
        $transactions->client_rate = $request->client_rate;
        $transactions->subcon_rate = $request->subcon_rate;


        $transactions->client_partial = $request->client_partial;
        $transactions->client_full = $request->client_full;
        $transactions->subcon_partial = $request->subcon_partial;
        $transactions->subcon_full = $request->subcon_full;
        
        if ($transactions->client_partial == 'Unpaid') {
           $transactions->client_balance = $transactions->client_rate;
        }

        if ($transactions->subcon_partial == 'Unpaid') {
            $transactions->subcon_balance = $transactions->subcon_rate;
        }


        $transactions->save();
        

        return redirect()->route('transactions.index')->with('success', 'Cargo Transactions Has Been Created Successfully');
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('admin.cargos.edit',compact('transaction','id'));
    }


    public function update(Request $request, Transaction $transaction)
    {

        $transaction->client_partial = $request->client_partial;
        $transaction->client_partial_date = $request->client_partial_date;
        $transaction->client_partial_amount = $request->client_partial_amount;
        $transaction->client_full = $request->client_full;
        $transaction->client_full_date = $request->client_full_date;
        $transaction->client_full_amount = $request->client_full_amount;
        $transaction->subcon_partial = $request->subcon_partial;
        $transaction->subcon_partial_date = $request->subcon_partial_date;
        $transaction->subcon_partial_amount = $request->subcon_partial_amount;
        $transaction->subcon_full = $request->subcon_full;
        $transaction->subcon_full_date = $request->subcon_full_date;
        $transaction->subcon_full_amount = $request->subcon_full_amount;
        $transaction->save();

        if ($transaction->client_partial == 'Unpaid') {
            $transaction->client_balance = $transaction->client_rate;
            $transaction->save();
        }

        if ($transaction->client_partial == 'Paid' ) {
            $transaction->client_balance = $transaction->client_rate * .50;
            $transaction->save();
        }


        if ($transaction->client_full == 'Paid' && $transaction->client_partial == 'Paid' ) {
            $transaction->client_balance = 0;
            $transaction->save();
        }

        



        if ($transaction->subcon_partial == 'Unpaid') {
            $transaction->subcon_balance = $transaction->subcon_rate;
            $transaction->save();
        }

        if ($transaction->subcon_partial == 'Paid' ) {
            $transaction->subcon_balance = $transaction->subcon_rate * .50;
            $transaction->save();
        }


        if ($transaction->subcon_full == 'Paid' && $transaction->subcon_partial == 'Paid' ) {
            $transaction->subcon_balance = 0;
            $transaction->save();
        }



        return redirect()->route('transactions.index')->with('success', 'Payment Has Been Modified Successfully');
    }

        public function destroy(Transaction $transaction)
        {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaction Has Been Deleted Successfully');
        }


}




