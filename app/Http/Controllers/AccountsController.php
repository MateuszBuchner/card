<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccountRequest;
use Symfony\Component\VarDumper\VarDumper;
use Iban\Validation\Validator;
use Iban\Validation\Iban;
class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($numb=null , $ibanViolation=null)
    {
        return view('index', [
            'accounts' => Account::all(),
            'numb'  => $numb,
            'ibanViolation' => $ibanViolation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account($request->all());
        $spaceNumber = $account->card;

        $iban = new Iban($spaceNumber);
        $validator = new Validator();

        if (!$validator->validate($iban)) {
            foreach ($validator->getViolations() as $violation) {
            }
        } else {
            echo "Prawidłowy numer konta";
            $account->card = str_replace(' ','',$account->card);
            $account->save();
            $violation = null;
        }

        $format_iban = null;

        if (strlen($iban) >= 28)
        {
            $format_iban =
            substr($iban, -34, -32) . " " .
            substr($iban, -32) . " ";
        }

        return $this->index()->with(["numb" => $format_iban, "ibanViolation" => $violation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
