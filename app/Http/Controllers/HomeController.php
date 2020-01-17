<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Log;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function get_log(Request $request)
    {
        if ($request->ajax()) {
            $data = Log::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('list');
    }

    public function get_inventory(Request $request)
    {
        if ($request->ajax()) {
            $data = Item::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="view/' . $row->item_id . '"class="edit btn btn-primary btn-sm">View Detail</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('list');
    }
    public function view($id)
    {
        $item = Item::find($id);
        $hashed_email = hash('sha1', $item->email);
        $hashed_id = hash('sha1', $item->item_serial);
        $json = json_encode(array('email' => $item->email, 'serial' => $item->item_serial));
        $hashedJson = json_encode(array('email' => $hashed_email, 'serial' => $hashed_id));
        return view('view')->with('item', $item)->with('hashEmail', $hashed_email)->with('hashId', $hashed_id)->with('jsonFormat', $json)->with('jsonHashed', $hashedJson);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ownerName' => 'required',
            'email' => 'required',
            'item_type' => 'required',
            'item_serial' => 'required'
        ]);

        $item = new Item;
        $item->owner_name = $request->input('ownerName');
        $item->email = $request->input('email');
        $item->item_type = $request->input('item_type');
        $item->item_serial = $request->input('item_serial');
        $item->save();

        return redirect('/home')->with('success', 'Successfully added.');
    }

    function exportData()
    {
        return Excel::download(new DataExport, 'log.xlsx');
    }
}
class DataExport implements FromCollection,WithHeadings
{
    function collection()
    {
        return Log::all();
    }
    public function headings(): array
    {
        return [
            'history id',
            'owner name',
            'owner email',
            'owner item',
            'owner item S/N',
            'borrower email',
            'timestamp',

        ];
    }
}
