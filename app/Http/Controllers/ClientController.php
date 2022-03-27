<?php
namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * ClientController contains all the functions related to client
 *
 * @category Class
 * @package  MyPackage
 * @author   Harish Thagunna <thagunnaharish23@gmail.com>
 * @license  GNU General Public License
 * @link     http://www.localhost.com/
 */

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = [];
        if (($open = fopen("client_data.csv", "r")) !== false) {

            while (($client_data = fgetcsv($open, 1000, ",")) !== false) {
                $clients[] = $client_data;               
            }
            fclose($open);
        }

        // echo "<pre>";
        // print_r($clients);
        $data['clients'] = $this->paginate($clients);
        // dd($data);
        $data['clients']->setPath('/clients');
        // $data['clients']->setPath(url() . '/clients');
        return view('client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|max:6',
            'address' => 'required',
            'dob' => 'required|date|before:today',
            'nationality' => 'required|string|max:20',
            'education_background' => 'required|string|max:255',
            'mode_of_contact' => 'required|string|max:20',
            ]
        );
        // dd($request->all());
        $file_open = fopen('client_data.csv', "a");
        $no_of_rows = count(file('client_data.csv'));
        
        if ($no_of_rows > 1) {
            $no_of_rows = ($no_of_rows - 1) + 1;
        }
        $form_data = array(
            'id'  => $no_of_rows,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'education_background' => $request->education_background,
            'mode_of_contact' => $request->mode_of_contact,
        );
        if (fputcsv($file_open, $form_data)) {
            return redirect()->route('client.index')->with('success', 'Client added successfully.');
        } else {
            return redirect()->back('client.index')->with('error', 'Sorry, there was problem while adding client');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }


}
